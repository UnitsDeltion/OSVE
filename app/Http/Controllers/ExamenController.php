<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Examen;
use App\Models\Opleidingen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;

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
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $opleidingen = Opleidingen::get();
        
        return view('p2', compact('opleidingen'));
    }

    public function p3(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $crebo_nr = $request->session()->get('crebo_nr');
        $examens = Examen::where('crebo_nr', $crebo_nr)->orderBy('vak', 'asc')->get();

        return view('p3', compact('examens'));
    }

    public function p4(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam')
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')){
            $validated = $request->validate([
                'vak' => 'required|max:255|string',
                'examen' => 'required|max:255|string',
            ]);
            dd("s");

            $vak = $request->session()->get('vak');
            $examen = $request->session()->get('examen');

            if(null == $request->session()->get('voornaam') 
            || null == $request->session()->get('achternaam') 
            || null == $request->session()->get('studentnummer') 
            || null == $request->session()->get('opleiding')
            || null == $request->session()->get('crebo_nr')
            || null == $request->session()->get('vak')
            || null == $request->session()->get('examen')){
                $request->session()->flush();
                abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            }
        }

        $validated = $request->validate([
            'vak' => 'required',
            'examen' => 'required',
        ]);
        
        $request->session()->put('vak', $request->vak);
        $request->session()->put('examen', $request->examen);
        
        if(null == $request->session()->get('voornaam') 
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer') 
        || null == $request->session()->get('opleiding') 
        || null == $request->session()->get('crebo_nr') 
        || null == $request->session()->get('vak') 
        || null == $request->session()->get('examen')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $vak = $request->session()->get('vak');
        $examen = $request->session()->get('examen');

        return view('p4')
            ->with(compact('vak'))
            ->with(compact('examen'));
    }
    
    public function p5(){
        return view('p5');
    }
}
