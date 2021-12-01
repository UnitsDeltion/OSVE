<?php
// npm install --save-dev prettier @prettier/plugin-php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\Opleidingen;
use App\Models\ExamenMoment;
use App\Models\GeplandeExamens;
use App\Models\GeplandeExamensTokens;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

//Token generatie
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FormHandlerController extends Controller
{
    public function f2(Request $request)
    {
        $request->validate([
            "voornaam" => "required|max:255|string",
            "achternaam" => "required|max:255|string",
            "studentnummer" => "required|max:9|string",
            "klas" => "required|max:9|string",
            "faciliteitenpas" => "required|max:3",
        ]);

        $request->session()->put("voornaam", $request->voornaam);
        $request->session()->put("achternaam", $request->achternaam);
        $request->session()->put("studentnummer", $request->studentnummer);
        $request->session()->put("klas", $request->klas);
        $request->session()->put("faciliteitenpas", $request->faciliteitenpas);

        return redirect("p2");
    }

    public function f3(Request $request)
    {
        $request->validate(
            ["opleiding_id" => "required|max:5|string"],
            ["opleiding_id.required" => "Het opleidingen veld is verplicht!"]
        );

        $opleiding = Opleidingen::where("id", $request->opleiding_id)->first();

        $request->session()->put("opleiding_id", $request->opleiding_id);
        $request->session()->put("crebo_nr", $opleiding->crebo_nr);
        $request->session()->put("opleiding", $opleiding->opleiding);

        return redirect("p3");
    }

    public function f4(Request $request)
    {
        $request->validate([
            "examen" => "required|max:255|string",
        ]);

        $data = explode(" - ", $request->examen);

        $request->session()->put("vak", $data[0]);
        $request->session()->put("examen", $data[1]);

        return redirect("p4");
    }

    public function f5(Request $request)
    {
        $request->validate([
            "examenMoment" => "required|max:255|string",
        ]);

        $data = explode(" - ", $request->examenMoment);

        $request->session()->put("datum", $data[0]);
        $request->session()->put("tijd", $data[1]);

        return redirect("p5");
    }

    //Examen inplannen
    public function f6(Request $request)
    {
        //Haalt examen id op voor relatie
        $examenId = Examen::where([
            "opleiding_id" => $request->session()->get("opleiding_id"),
            "vak" => $request->session()->get("vak"),
            "examen" => $request->session()->get("examen"),
        ])->first()->id;

        //Haalt examen moment id op voor relatie
        $examenMomentId = ExamenMoment::where([
            "examenid" => $examenId,
            "datum" => $request->session()->get("datum"),
            "tijd" => $request->session()->get("tijd"),
        ])->first()->id;

        $studentnummer = $request->session()->get("studentnummer");

        //Controleert of er al een examen met zelfde gegevens bestaat, zoja; stuurt door naar p9 met error
        $examenCheck = GeplandeExamens::where([
            "studentnummer" => $request->session()->get("studentnummer"),
            "examen" => $examenId,
            "examen_moment" => $examenMomentId,
        ])->exists();

        if ($examenCheck) {
            $request->session()->put("title", "Examen al ingepland");
            $request
                ->session()
                ->put(
                    "message",
                    "Het is niet mogelijk vaker voor hetzelfde examen in te plannen. Probeer het opnieuw of neem contact op met je docent."
                );
            $request->session()->put("error", "Err: dubbele data.");
            return redirect("p9");
        }

        //Plant examen in
        $gepland_examen_id = GeplandeExamens::create([
            "voornaam" => $request->session()->get("voornaam"),
            "achternaam" => $request->session()->get("achternaam"),
            "faciliteitenpas" => $request->session()->get("faciliteitenpas"),
            "studentnummer" => $studentnummer,
            "klas" => $request->session()->get("klas"),
            "opleiding_id" => $request->session()->get("opleiding_id"),
            "examen" => $examenId,
            "examen_moment" => $examenMomentId,
            "std_bevestigd" => 0,
            "doc_bevestigd" => 0,
        ])->id;

        //Tijd/datum wanneer token is gemaakt
        $cre_date = time();
        //Tijd/datum wanneer token verloopt
        $exp_date = strtotime("+1 day", $cre_date); //config toevoegen

        //Maakt token voor bevestiging
        $token = Hash::make($studentnummer);
        //Vervang ongeldige karakters in token door random nummer
        $token = str_replace(
            [":", "\\", "/", "*", "@", "&", "?", "."],
            rand(0, 9),
            $token
        );

        //Maakt token db row aan
        GeplandeExamensTokens::create([
            "gepland_examen_id" => $gepland_examen_id,
            "token" => $token,
            "exp_date" => $exp_date,
        ]);
        

        //Zet token in sessie voor email view
        $request->session()->put("token", $token);
        \Mail::to($studentnummer . "@st.deltion.nl")->send(
            new \App\Mail\examenInplannen()
        );

        //Zet data in sessie voor p7 pagina
        $request->session()->put("studentnummer", $studentnummer);

        return redirect("p6");
    }

    //Tokens
    public function f7(Request $request)
    {
        if (null == $request->token) {
            $request->session()->put("title", "Ongeldige token");
            $request
                ->session()
                ->put(
                    "message",
                    "Probeer het opnieuw of neem contact op met je docent."
                );
            $request->session()->put("error", "Err: request/parameter leeg.");
            return redirect("p8");
        }

        //Haalt de token data op basis van de token
        $tokenData = GeplandeExamensTokens::where(
            "token",
            $request->token
        )->first();

        //Als query leeg is laat error zien
        if (!isset($tokenData)) {
            $request->session()->put("title", "Ongeldige token");
            $request
                ->session()
                ->put(
                    "message",
                    "Probeer het opnieuw of neem contact op met je docent."
                );
            $request->session()->put("error", "Err: invalid_token/not found.");
            return redirect("p8");
        }

        //Verloop datum
        $exp_date = $tokenData["exp_date"];
        //Hudige datum
        $crt_date = time();

        //Token verschil = token verlopen tijd - huidige tijd
        $dateDiff = $exp_date - $crt_date;

        //Als het verschil in de min staat is de token verlopen en laat error zien
        //Wat nu? Verwijder afspraak/token of nieuwe token genereren?
        if ($dateDiff < 0) {
            $request->session()->put("title", "Ongeldige token");
            $request
                ->session()
                ->put(
                    "message",
                    "De tijd om het examen te bevestigen is verlopen. Probeer het opnieuw of neem contact op met je docent."
                );
            $request->session()->put("error", "Err: token verlopen.");

            $tokenData->delete();

            $examen = GeplandeExamens::where(
                "id",
                $tokenData->gepland_examen_id
            )->first();
            $examen->delete();

            return redirect("p8");
        }

        //Haalt het geplande examen op, op basis van het id uit de token
        $geplandExamen = GeplandeExamens::where(
            "id",
            $tokenData->gepland_examen_id
        )->first();

        //Als query leeg is laat error zien
        if (!isset($geplandExamen)) {
            $request->session()->put("title", "Ongeldige token");
            $request
                ->session()
                ->put(
                    "message",
                    "Probeer het opnieuw of neem contact op met je docent."
                );
            $request
                ->session()
                ->put("error", "Err: geen ingepland examen gevonden.");
            return redirect("p8");
        }

        //Zet examen op actief en sla het op
        $geplandExamen->std_bevestigd = 1;
        $geplandExamen->save();

        //Verwijderd de token uit de db
        $tokenData->delete();

        $request->session()->put("title", "Examen ingepland");
        $request
            ->session()
            ->put(
                "message",
                "Voordat het examen definitief is ingepland moet deze nog worden goedgekeurd door een docent. Zodra dit is gebeurt ontvang je een bevestiging."
            );
        return redirect("p8");
    }
}
