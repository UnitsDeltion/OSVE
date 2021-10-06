<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Examen;

class ExamenController extends Controller
{
    public function p1(){
        return view('p1');
    }

    public function p2(){
        return view('p2');
    }

    public function p3(){
        $examens = Examen::all();
        //dd($examen);
        return view('p3', compact('examens'));
    }

    public function p4(){
        return view('p4');
    }
    
    public function p5(){
        return view('p5');
    }
}
