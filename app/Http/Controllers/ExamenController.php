<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Opleidingen;
use Illuminate\Support\Facades\Validator;

class ExamenController extends Controller
{
    public function p1(){
        return view('p1');
    }

    public function p2(Request $request){
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'studentnummer' => 'required|max:9|string',
        ]);

        $opleidingen = Opleidingen::get();
        return view('p2', compact('opleidingen'));
    }

    public function p3(Request $request){
        $validator = Validator::make($request->all(), [
            'opleiding' => 'required'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withInput();
        }

        dd($request->all());
        return view('p3', compact('examens'));
    }

    public function p4(){
        return view('p4');
    }
    
    public function p5(){
        return view('p5');
    }
}
