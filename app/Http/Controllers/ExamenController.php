<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Examen;
use App\Models\Opleidingen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ExamenController extends Controller
{
    public function p1(Request $request){
        $request->session()->forget('voornaam');
        $request->session()->forget('achternaam');
        $request->session()->forget('studentnummer');
        $request->session()->forget('opleiding');
        $request->session()->forget('crebo_nr');
        $request->session()->forget('vak');
        $request->session()->forget('examen');

        return view('p1');
    }

    public function p2(Request $request){
        $request->session()->forget('crebo_nr');
        $request->session()->forget('opleiding');

        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')){
            $request->session()->flush();
           }

        $opleidingen = Opleidingen::get();
        
        return view('p2', compact('opleidingen'));
    }

    public function p3(Request $request){
        $request->session()->forget('vak');
        $request->session()->forget('examen');

        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')){
            $request->session()->flush();
        }

        $examens = Examen::where('crebo_nr', $request->session()->get('crebo_nr'))->orderBy('vak', 'asc')->get();

        return view('p3', compact('examens'));
    }

    public function p4(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')){
            $request->session()->flush();
        }

        $vak = $request->session()->get('vak');
        $examen = $request->session()->get('examen');

        return view('p4')
            ->with(compact('vak'))
            ->with(compact('examen'));
    }
    
    public function p5(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')){
            $request->session()->flush();
        }

        return view('p5');
    }
    
    public function p6(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')
        || null == $request->session()->get('faciliteitenpas')){
            $request->session()->flush();
        }

        $voornaam           =   $request->session()->get('voornaam');
        $achternaam         =   $request->session()->get('achternaam');
        $studentnummer      =   $request->session()->get('studentnummer');
        $opleiding          =   $request->session()->get('opleiding');
        $vak                =   $request->session()->get('vak');
        $examen             =   $request->session()->get('examen');
        $datum              =   $request->session()->get('datum');
        $tijd               =   $request->session()->get('tijd');
        $faciliteitenpas    =   $request->session()->get('faciliteitenpas');
        $opmerkingen        =   $request->session()->get('opmerkingen');

        return view('p6')
            ->with(compact('voornaam'))
            ->with(compact('achternaam'))
            ->with(compact('studentnummer'))
            ->with(compact('opleiding'))
            ->with(compact('vak'))
            ->with(compact('examen'))
            ->with(compact('datum'))
            ->with(compact('tijd'))
            ->with(compact('faciliteitenpas'))
            ->with(compact('opmerkingen'));
    }

    public function p7(Request $request){
        if(null == $request->session()->get('succes')
        || null == $request->session()->get('studentnummer')){
            $request->session()->flush();
        }

        $studentnummer = $request->session()->get('studentnummer');

        return view('p7')
            ->with(compact('studentnummer'));
    }
}
