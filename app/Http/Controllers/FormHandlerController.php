<?php

namespace App\Http\Controllers;

use App\Models\Opleidingen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use App\Models\ExamenMoment;
use App\Models\Examen;
use App\Models\GeplandeExamens;
use App\Models\GeplandeExamensTokens;

//Token generatie
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class FormHandlerController extends Controller
{
    
    public function f2(Request $request){
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'studentnummer' => 'required|max:9|string',
            'klas' => 'required|max:9|string',
        ]);
        
        if(!isset($request->voornaam) 
        || !isset($request->achternaam) 
        || !isset($request->studentnummer)
        || !isset($request->klas)){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->session()->put('voornaam', $request->voornaam);
        $request->session()->put('achternaam', $request->achternaam);
        $request->session()->put('studentnummer', $request->studentnummer);
        $request->session()->put('klas', $request->klas);

        return redirect('p2');
    }

    public function f3(Request $request){
        $validated = $request->validate([
            'crebo_nr' => 'required|max:5|string',
        ],
        [
            'crebo_nr.required' => 'Het opleidingen veld is verplicht!',
        ]);
        
        if(!isset($request->crebo_nr) 
        || null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('klas')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $opleiding = Opleidingen::where('crebo_nr', $request->crebo_nr)->get();

        $request->session()->put('crebo_nr', $request->crebo_nr);
        $request->session()->put('opleiding', $opleiding[0]->opleiding);

        return redirect('p3');
    }

    public function f4(Request $request){
        $validated = $request->validate([
            'examen' => 'required|max:255|string',
        ]);

        if(!isset($request->examen) 
        || null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('klas')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $data = explode(" - ", $request->examen);

        $request->session()->put('vak', $data[0]);
        $request->session()->put('examen', $data[1]);
        
        return redirect('p4');
    }

    public function f5(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('klas')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return redirect('p5');
    }

    public function f6(Request $request){
        $validated = $request->validate([
            'faciliteitenpas' => 'required|max:3',
            'opmerkingen' => 'max:1000',
        ]);

        if(isset($request->faciliteitenpas)){$request->session()->put('faciliteitenpas', $request->faciliteitenpas);}
        if(isset($request->opmerkingen)){$request->session()->put('opmerkingen', $request->opmerkingen);}

        return redirect('p6');
    }

    public function f7(Request $request){
        // if(null == $request->session()->get('voornaam')
        // || null == $request->session()->get('achternaam') 
        // || null == $request->session()->get('studentnummer')
        // || null == $request->session()->get('klas')
        // || null == $request->session()->get('crebo_nr')
        // || null == $request->session()->get('opleiding')
        // || null == $request->session()->get('vak')
        // || null == $request->session()->get('examen')
        // || null == $request->session()->get('datum')
        // || null == $request->session()->get('tijd')
        // || null == $request->session()->get('faciliteitenpas')){
        //     $request->session()->flush();
        //     abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // }

        //Tijdelijk, tot p4 werkt
        $request->session()->put('datum', '2021-11-20');
        $request->session()->put('tijd', '12:30:00');
        
        //Haalt examen id op voor relatie
        $examenId = Examen::where([
            'crebo_nr' => $request->session()->get('crebo_nr'),
            'vak' => $request->session()->get('vak'),
            'examen' => $request->session()->get('examen')
        ])->get();

        $examenId = $examenId[0]['id'];

        //Haalt examen moment id op voor relatie
        $examenMomentId = ExamenMoment::where([
            'examenid'  => $examenId,
            'datum'     => $request->session()->get('datum'),
            'tijd'      => $request->session()->get('tijd')
        ])->get();

        $examenMomentId = $examenMomentId[0]['id'];

        $studentnummer = $request->session()->get('studentnummer');

        //Plant examen in 
        $gepland_examen_id = GeplandeExamens::create([
            'voornaam'          =>      $request->session()->get('voornaam'),
            'achternaam'        =>      $request->session()->get('achternaam'),
            'faciliteitenpas'   =>      $request->session()->get('faciliteitenpas'),
            'studentnummer'     =>      $studentnummer,
            'klas'              =>      $request->session()->get('klas'),
            'crebo_nr'          =>      $request->session()->get('crebo_nr'),
            'examen'            =>      $examenId,
            'examen_moment'     =>      $examenMomentId,
            'opmerkingen'       =>      $request->session()->get('opmerkingen'),
            'active'            =>      0,
        ])->id;

        //Tijd/datum wanneer token is gemaakt
        $cre_date = time();
        //Tijd/datum wanneer token verloopt
        $exp_date = strtotime('+1 day', $cre_date);

        //Maakt token voor bevestiging
        $token = Hash::make($studentnummer);
        //Vervang ongeldige karakters in token door random nummer
        $token = str_replace([':', '\\', '/', '*', '@', '&', '?', '.'], rand(0,9), $token);

        //Maakt token db row aan
        GeplandeExamensTokens::create([
            'gepland_examen_id' => $gepland_examen_id,
            'token'             => $token,
            'cre_date'          => $cre_date,
            'exp_date'          => $exp_date
        ]);

        //Zet token in sessie voor email view
        $request->session()->put('token', $token);
        $details = [];
        \Mail::to($studentnummer.'@st.deltion.nl')->send(new \App\Mail\MyTestMail($details));

        //Maakt sessie leeg
        $request->session()->flush();

        //Zet data in sessie voor p7 pagina
        $request->session()->put('succes', true);
        $request->session()->put('studentnummer', $studentnummer);

        return redirect('p7');
    }
}
