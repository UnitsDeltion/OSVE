<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Models\GeplandeExamens;
use App\Http\Controllers\Controller;


class GeplandeExamensBeheerController extends Controller
{
    public function bevestigExamen($id){

        //Haalt hte gepland examen record op
        $geplandExamen = GeplandeExamens::where('id', $id)->first();

        //Zet de waarde van doc_bevestigd op 1 zodat hij door de docent is bevestigd
        $geplandExamen['doc_bevestigd'] = 1;

        //Slaat de record op in de db
        $geplandExamen->save();

        //Stuurt terug nar dashboard
        return redirect('dashboard'); 
    } 
}
