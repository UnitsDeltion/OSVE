<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeplandeExamens;
use App\Models\GeplandeExamensTokens;

class TokenController extends Controller
{
    // public function checkToken(Request $request){
    //     if(null == $request->token){
    //         dd('Ongeldige token, probeer het opnieuw of neem contact op met je docent. Err: request/parameter leeg');
    //     };

    //     //Haalt de token data op basis van de token
    //     $tokenData = GeplandeExamensTokens::where('token', $request->token)->get();

    //     //Als query leeg is laat error zien
    //     if(!isset($tokenData[0])){
    //         dd('Ongeldige token, probeer het opnieuw of neem contact op met je docent. Err: invalid_token/not found');
    //     }

    //     $tokenData = $tokenData[0];

    //     //Verloop datum
    //     $exp_date = $tokenData['exp_date'];
    //     //Hudige datum
    //     $crt_date = time();

    //     //Token verschil = token verlopen tijd - huidige tijd
    //     $dateDiff = $exp_date - $crt_date;

    //     //Als het verschil in de min staat is de token verlopen en laat error zien
    //     //Wat nu? Verwijder afspraak/token of nieuwe token genereren?
    //     if($dateDiff < 0){
    //         dd('Ongeldige token, probeer het opnieuw of neem contact op met je docent. Err: token_expired');
    //     }

    //     //Haalt het geplande examen op, op basis van het id uit de token
    //     $geplandExamen = GeplandeExamens::where('id', $tokenData->gepland_examen_id)->get();

    //     //Als query leeg is laat error zien
    //     if(!isset($geplandExamen[0])){
    //         dd('Ongeldige token, probeer het opnieuw of neem contact op met je docent. Err: geen ingepland examen gevonden');
    //     }
        
    //     $geplandExamen = $geplandExamen[0];

    //     //Zet examen op actief en sla het op
    //     $geplandExamen->active = 1;
    //     $geplandExamen->save();

    //     //Verwijderd de token uit de db
    //     $tokenData->delete();

    //     $request->session()->put('succes', true);
    //     return redirect('p9'); 
    // }
}
