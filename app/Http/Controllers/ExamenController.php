<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Examen;
use App\Models\Opleidingen;
use App\Models\ExamenMoment;
use App\Models\RegelementBeheer;
use App\Models\GeplandeExamens;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ExamenController extends Controller
{
    public function p1(Request $request)
    {
        //Leegt de sessie zodat alle pagina's weer opnieuw doorgelopen moeten worden en er niet meteen van p1 naar p4 gegaan kan worden
        //Haalt eerst de CSRF token op
        $token = $request->session()->get('_token');
        //Leegt alle sessie data
        $request->session()->flush();
        //Zet de CSRF token weer in de sessie
        $request->session()->put('_token', $token);

        $opleidingen = Opleidingen::get();

        return view('p1', compact('opleidingen'));
    }

    public function p2(Request $request)
    {
        if (
            null == $request->session()->get('voornaam') ||
            null == $request->session()->get('achternaam') ||
            null == $request->session()->get('studentnummer') ||
            null == $request->session()->get('klas')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        $opleidingen = Opleidingen::get();

        return view('p2', compact('opleidingen'));
    }

    public function p3(Request $request)
    {
        $request->session()->forget('vak');
        $request->session()->forget('examen');

        if (
            null == $request->session()->get('voornaam') ||
            null == $request->session()->get('achternaam') ||
            null == $request->session()->get('studentnummer') ||
            null == $request->session()->get('klas') ||
            null == $request->session()->get('crebo_nr') ||
            null == $request->session()->get('opleiding')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        $examens = Examen::where(
            'crebo_nr',
            $request->session()->get('crebo_nr')
        )
            ->orderBy('vak', 'asc')
            ->get();

        // dd($examens);

        return view('p3', compact('examens'));
    }

    public function p4(Request $request)
    {
        if (
            null == $request->session()->get('voornaam') ||
            null == $request->session()->get('achternaam') ||
            null == $request->session()->get('studentnummer') ||
            null == $request->session()->get('klas') ||
            null == $request->session()->get('crebo_nr') ||
            null == $request->session()->get('opleiding') ||
            null == $request->session()->get('vak') ||
            null == $request->session()->get('examen')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        $vak = $request->session()->get('vak');
        $examen = $request->session()->get('examen');

        //Haalt het ID van het examen op, aangezien examen en vak strings zijn.
        $examenId = Examen::where([
            'crebo_nr' => $request->session()->get('crebo_nr'),
            'vak' => $request->session()->get('vak'),
            'examen' => $request->session()->get('examen'),
        ])->first()->id;

        //Haalt alle examenmomenten op
        $examenMomenten = examenMoment::where('examenid', $examenId)->get();
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

        return view('p4')
            ->with(compact('vak'))
            ->with(compact('examen'))
            ->with(compact('examenMomenten'));
    }

    public function p5(Request $request)
    {
        if (
            null == $request->session()->get('voornaam') ||
            null == $request->session()->get('achternaam') ||
            null == $request->session()->get('studentnummer') ||
            null == $request->session()->get('klas') ||
            null == $request->session()->get('crebo_nr') ||
            null == $request->session()->get('opleiding') ||
            null == $request->session()->get('vak') ||
            null == $request->session()->get('examen') ||
            null == $request->session()->get('datum') ||
            null == $request->session()->get('tijd')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        return view('p5');
    }

    public function p6(Request $request)
    {
        if (
            null == $request->session()->get('voornaam') ||
            null == $request->session()->get('achternaam') ||
            null == $request->session()->get('studentnummer') ||
            null == $request->session()->get('faciliteitenpas') ||
            null == $request->session()->get('klas') ||
            null == $request->session()->get('crebo_nr') ||
            null == $request->session()->get('opleiding') ||
            null == $request->session()->get('vak') ||
            null == $request->session()->get('examen') ||
            null == $request->session()->get('datum') ||
            null == $request->session()->get('tijd')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        $regelement = RegelementBeheer::get()->first();

        $sessionData = collect(session()->all());
        $data = $sessionData->except(['_previous', '_flash', '_token']);

        //\Mail::to('97071583@gdeltion.nl')->send(new \App\Mail\MyTestMail($details));

        return view('p6')->with(compact('data', 'regelement'));
    }

    public function p7(Request $request)
    {
        if (null == $request->session()->get('studentnummer')) {
            $request->session()->flush();
        }

        $studentnummer = $request->session()->get('studentnummer');

        return view('p7')->with(compact('studentnummer'));
    }

    //p8 token page/check -> FormHandlerController

    public function p9(Request $request)
    {
        if (
            null == $request->session()->get('title') ||
            null == $request->session()->get('message')
        ) {
            $request->session()->flush();
            abort_if(
                Gate::denies('user_access'),
                Response::HTTP_FORBIDDEN,
                '403 Forbidden'
            );
        }

        $title = $request->session()->get('title');
        $message = $request->session()->get('message');

        if (null != $request->session()->get('error')) {
            $error = $request->session()->get('error');
        } else {
            $error = null;
        }

        $request->session()->flush();

        return view('p9')
            ->with(compact('title'))
            ->with(compact('message'))
            ->with(compact('error'));
    }
}
