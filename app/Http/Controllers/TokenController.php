<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function checkToken(Request $request){
        $studentnummer = $request->studentnummer;
        $token = $request->token;

        dd($studentnummer, $token);
    }
}
