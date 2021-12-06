<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Examen;
use App\Models\Opleidingen;
use App\Models\ExamenMoment;
use App\Models\GeplandeExamens;
use App\Models\ReglementenBeheer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class OSVEController extends Controller
{
    public function redirect(){
        return redirect('/');
    }

    public function p1(Request $request)
    {
        Session::forget(['voornaam', 'achternaam', 'studentnummer', 'klas', 'faciliteitenpas', 'opleiding_id', 'crebo_nr', 'opleiding', 'vak', 'examen', 'datum', 'tijd', 'token']);

        return view("p1");
    }

    public function p2(Request $request)
    {
        $request->session()->forget("opleiding_id");
        $request->session()->forget("crebo_nr");
        $request->session()->forget("opleiding");

        if (
            null == $request->session()->get("voornaam") ||
            null == $request->session()->get("achternaam") ||
            null == $request->session()->get("studentnummer") ||
            null == $request->session()->get("faciliteitenpas") ||
            null == $request->session()->get("klas")
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }

        $opleidingen = Opleidingen::get();

        return view("p2", compact("opleidingen"));
    }

    public function p3(Request $request)
    {
        $request->session()->forget("vak");
        $request->session()->forget("examen");

        if (
            null == $request->session()->get("voornaam") ||
            null == $request->session()->get("achternaam") ||
            null == $request->session()->get("studentnummer") ||
            null == $request->session()->get("faciliteitenpas") ||
            null == $request->session()->get("klas") ||
            null == $request->session()->get("crebo_nr") ||
            null == $request->session()->get("opleiding") ||
            null == $request->session()->get("opleiding_id")
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }


        $examens = Examen::where(
            "opleiding_id",
            $request->session()->get("opleiding_id")
        )
            ->orderBy("vak", "asc")->with('examen_moments')
            ->get();


        $examens = Examen::where(
            "opleiding_id",
            $request->session()->get("opleiding_id")
        )
            ->orderBy("vak", "asc")->with('examen_moments')
            ->get();

        $moments = ExamenMoment::all();

        return view("p3", compact("examens", "moments"));
    }

    public function p4(Request $request)
    {
        $request->session()->forget("datum");
        $request->session()->forget("tijd");

        if (
            null == $request->session()->get("voornaam") ||
            null == $request->session()->get("achternaam") ||
            null == $request->session()->get("studentnummer") ||
            null == $request->session()->get("faciliteitenpas") ||
            null == $request->session()->get("klas") ||
            null == $request->session()->get("crebo_nr") ||
            null == $request->session()->get("opleiding") ||
            null == $request->session()->get("opleiding_id") ||
            null == $request->session()->get("vak") ||
            null == $request->session()->get("examen")
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }

        $vak = $request->session()->get("vak");
        $examen = $request->session()->get("examen");

        //Haalt het ID van het examen op, aangezien examen en vak strings zijn.
        $examenId = Examen::where([
            "opleiding_id" => $request->session()->get("opleiding_id"),
            "vak" => $request->session()->get("vak"),
            "examen" => $request->session()->get("examen"),
        ])->first()->id;

        //Haalt alle examenmomenten op
        $examenMomenten = examenMoment::where([
                ['examenid', $examenId],
                ['plaatsen', '>=', 1]
            ])->orderBy("datum", "asc")->get();

        foreach($examenMomenten as $examenMoment){
            //Haalt het aantal plaatsen uit het examenmoment
            $plaatsen = $examenMoment->plaatsen;

            //Haalt alle geplande examens op die gekoppeld zijn aan dit examenmoment id en is bevestigd door een student
            $geplandeExamens = GeplandeExamens::where([
                ['examen', $examenMoment->examenid],
                ['std_bevestigd', '1']
            ])->get();

            //Telt het aantal records
            $plaatsenCount = count($geplandeExamens);

            //Beschikbare plaatsen = het aantal plaatsen in het moment min het aantal geplande examens
            $examenMoment->plaatsen = $examenMoment->plaatsen - $plaatsenCount;
        }

        $examenMoment = $examenMomenten;

        return view("p4")
            ->with(compact("vak"))
            ->with(compact("examen"))
            ->with(compact("examenMoment"));
    }

    public function p5(Request $request)
    {
        if (
            null == $request->session()->get("voornaam") ||
            null == $request->session()->get("achternaam") ||
            null == $request->session()->get("studentnummer") ||
            null == $request->session()->get("faciliteitenpas") ||
            null == $request->session()->get("klas") ||
            null == $request->session()->get("crebo_nr") ||
            null == $request->session()->get("opleiding") ||
            null == $request->session()->get("vak") ||
            null == $request->session()->get("examen") ||
            null == $request->session()->get("datum") ||
            null == $request->session()->get("tijd")
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }

        //Haalt het examen regelement op
        $reglementen = ReglementenBeheer::get()->first();

        //Haalt de session data op in een collections
        $sessionData = collect(session()->all());
        //Filtert de collection behalve login gegevens
        $data = $sessionData->except(["_previous", "_flash", "_token"]);

        return view("p5")->with(compact("data", "reglementen"));
    }

    public function p6(Request $request)
    {
        if (null == $request->session()->get("studentnummer")) {
            $request->session()->flush();
        }

        $studentnummer = $request->session()->get("studentnummer");

        return view("p6")->with(compact("studentnummer"));
    }

    //p7 token page/check -> FormHandlerController

    public function p8(Request $request)
    {
        if (
            null == $request->session()->get("title") ||
            null == $request->session()->get("message")
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }

        $title = $request->session()->get("title");
        $message = $request->session()->get("message");

        if (null != $request->session()->get("error")) {
            $error = $request->session()->get("error");
        } else {
            $error = null;
        }

        $request->session()->flush();

        return view("p8")
            ->with(compact("title"))
            ->with(compact("message"))
            ->with(compact("error"));
    }
}
