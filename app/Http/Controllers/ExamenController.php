<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        return view('p2');
    }

    public function p3(){
        return view('p3');
    }

    public function p4(){
        return view('p4');
    }
    
    public function p5(){
        return view('p5');
    }
}
