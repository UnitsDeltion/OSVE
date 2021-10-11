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

        $request->session()->put('opleiding', $request->opleiding);

        if(null == $request->session()->get('voornaam') || null == $request->session()->get('achternaam') || null == $request->session()->get('studentnummer') || null == $request->session()->get('opleiding')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        // $studentData = $request->session()->all();

        $examens = '';

        return view('p3', compact('examens'));
    }

    public function p4(){
        return view('p4');
    }
    
    public function p5(){
        return view('p5');
    }
}
