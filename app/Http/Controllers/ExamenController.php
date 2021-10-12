<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Examen;
use App\Models\Opleidingen;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;


class ExamenController extends Controller
{
    public function p1(Request $request){
        $request->session()->flush();
        return view('p1');
    }

    public function p2(Request $request){
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'studentnummer' => 'required|max:9|string',
        ]);

        if(!isset($request->voornaam) && !isset($request->achternaam) && !isset($request->studentnummer)){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->session()->put('voornaam', $request->voornaam);
        $request->session()->put('achternaam', $request->achternaam);
        $request->session()->put('studentnummer', $request->studentnummer);

        // $studentData = $request->session()->all();

        $opleidingen = Opleidingen::get();
        return view('p2', compact('opleidingen'));
    }

    public function p3(Request $request){
        $validated = $request->validate([
            'opleiding' => 'required|max:255|string',
        ]);
        $opleiding = Opleidingen::where('opleiding_naam', $request->opleiding)->get();
        // dd($opleiding[0]);
        $request->session()->put('opleiding', $request->opleiding);
        $request->session()->put('crebo_nr', $opleiding[0]['crebo_nr']);

        if(null == $request->session()->get('voornaam') || null == $request->session()->get('achternaam') || null == $request->session()->get('studentnummer') || null == $request->session()->get('opleiding')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $crebo_nr = $request->session()->get('crebo_nr');

       $examens = Examen::where('crebo_nr', $crebo_nr)->orderBy('vak', 'asc')->get();
        
        return view('p3', compact('examens'));
    }

    public function p4(Request $request){
        $validated = $request->validate([
            'examen' => 'required',
        ]);

        $request->session()->put('examen', $request->examen);

        if(null == $request->session()->get('voornaam') || null == $request->session()->get('achternaam') || null == $request->session()->get('studentnummer') || null == $request->session()->get('opleiding') || null == $request->session()->get('examen')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return view('p4');
    }
    
    public function p5(){
        return view('p5');
    }
}
