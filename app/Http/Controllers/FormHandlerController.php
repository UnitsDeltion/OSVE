<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class FormHandlerController extends Controller
{
    
    public function f2(Request $request){
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'studentnummer' => 'required|max:9|string',
        ]);
        
        if(!isset($request->voornaam) 
        || !isset($request->achternaam) 
        || !isset($request->studentnummer)){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->session()->put('voornaam', $request->voornaam);
        $request->session()->put('achternaam', $request->achternaam);
        $request->session()->put('studentnummer', $request->studentnummer);

        return redirect('p2');
    }

    public function f3(Request $request){
        $validated = $request->validate([
            'crebo_nr' => 'required|max:255|string',
        ]);
        
        if(!isset($request->crebo_nr) 
        || null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        

        $request->session()->put('crebo_nr', $request->crebo_nr);
        $request->session()->put('opleiding_naam', $request->opleiding_naam);

        return redirect('p3');
    }
}
