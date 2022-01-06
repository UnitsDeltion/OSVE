<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Examen;
use App\Models\Opleidingen;
use App\Models\ExamenMoment;
use App\Models\GeplandeExamens;
use App\Models\Reglement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class OSVEController extends Controller
{
    public function redirect(){
        return redirect('/');
    }

    //Home pagina
    public function p1(Request $request)
    {
        Session::forget(['voornaam', 'achternaam', 'studentnummer', 'klas', 'faciliteitenpas', 'opleiding_id', 'crebo_nr', 'opleiding', 'vak', 'examen', 'datum', 'tijd', 'token']);

        return view("p1");
    }

    //Opleidingen
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

    //Examen
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

        $examens = Examen::where([
            "opleiding_id" => $request->session()->get("opleiding_id"),
            "active" => '1'
        ])
            ->orderBy("vak", "asc")->with('examen_moments')
            ->get();

        $moments = ExamenMoment::all();
        return view("p3", compact("examens", "moments"));
    }

    //Examen moment
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

        //Haalt het ID van het examen op, aangezien examen en vak strings zijn kunnen deze niet worden gebruikt
        $examenId = Examen::where([
            "opleiding_id" => $request->session()->get("opleiding_id"),
            "vak" => $request->session()->get("vak"),
            "examen" => $request->session()->get("examen"),
        ])->first()->id;

        //Haalt alle examenmomenten op waarbij het aantal plaatsen gelijk of groter is dan 1
        $examenMomenten = examenMoment::where([
                ['examenid', $examenId],
                ['plaatsen', '>=', 1]
            ])
            ->orderBy("datum", "asc")->get();


        //Maakt een leeg array aan die door de foreach wordt gevuld
        //ExamenChecked zijn alle examenMomenten waarbij de huidige datum tussen het opgeven begin en eind ligt en waar nog plek is
        $examenChecked = array();

        foreach($examenMomenten as $examenMoment){
            //Maakt examen check variabelen aan waarmee gecontrolleert wordt of de huidige datum tussen de start en eind datum ligt
            $huidigeDatum = strtotime(date('d-m-Y'));
            $startDatum = strtotime(date('d-m-Y', strtotime($examenMoment['examen_opgeven_begin']))); 
            $eindDatum = strtotime(date('d-m-Y', strtotime($examenMoment['examen_opgeven_eind']))); 

            //Controleert of de huidige datum tussen de start en eind datum liggen
            if($huidigeDatum >= $startDatum && $huidigeDatum <= $eindDatum){
                //Telt het aantal records
                $plaatsenCount = GeplandeExamens::where([
                    ['examen', $examenMoment->examenid],
                    ['std_bevestigd', '1']
                ])->count();

                //Beschikbare plaatsen is het aantal plaatsen in het moment min het aantal geplande examens
                $examenMoment->plaatsen = $examenMoment->plaatsen - $plaatsenCount;
                
                //Als er de count gelijk of groter is dan 1 zet het moment in de examenChecked array
                if($examenMoment->plaatsen >= 1){
                    //pushed gechecked array
                    array_push($examenChecked, $examenMoment);
                }                          
            }
        }

        $examenMomenten = $examenChecked;

        return view("p4")
            ->with(compact("vak"))
            ->with(compact("examen"))
            ->with(compact("examenMomenten"));
    }

    //Overzicht
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
        $reglement = Reglement::get()->first();

        //Haalt de session data op in een collections
        $sessionData = collect(session()->all());
        //Filtert de collection behalve login gegevens
        $data = $sessionData->except(["_previous", "_flash", "_token"]);

        return view("p5")->with(compact("data", "reglement"));
    }

    //Inplannen bevestigd
    public function p6(Request $request)
    {
        if (null == $request->session()->get("studentnummer")) {
            $request->session()->flush();
            abort_if(
                Gate::denies("user_access"),
                Response::HTTP_FORBIDDEN,
                "403 Forbidden"
            );
        }

        $studentnummer = $request->session()->get("studentnummer");

        return view("p6")->with(compact("studentnummer"));
    }

    //p7 token page/check -> FormHandlerController

    //Success of fallback pagina
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
