<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use DateTime;
use App\Models\User;
use App\Models\Examen;
use App\Models\Opleidingen;
use App\Models\ExamenMoment;
use App\Models\GeplandeExamens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardBeheerController extends Controller
{
    public function index(Request $request)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

        $examens = Examen::all();
        $examenMomenten = ExamenMoment::orderBy('examenid', 'asc')->get();
        $users = User::all();

        foreach($examens as $examen){
            //Vervang de email die in het examen staat door de voor en achternaam
            foreach($users as $user){
                if($examen->geplande_docenten == $user->email){
                    $examen->geplande_docenten = $user->voornaam . " " . $user->achternaam;
                }
            }

            //Lege data array die wordt gevuld met de eerste en de laatste examen moment datum.
            //Op deze manier kan er op het dashboard gefiltert worden
            $data = array();

            foreach($examenMomenten as $examenMoment){
                //Voor elk examen moment dat bij het examen id hoort
                if($examenMoment->examenid == $examen->id){
                    //zet het examenmoment in de $data array
                    array_push($data, $examenMoment->toArray());
                }
            }

            //Als data in de data array zit
            if($data){
                //Soort de array op basis van datum
                $sortedArr = collect($data)->sortBy('datum')->all();

                //Zet de eerste waarde van de array als startdatum
                $startDatum = current($sortedArr);

                //Zet de laatste waarde van de array als einddatum
                $eindDatum = end($sortedArr);
    
                $examen->startDatum = $startDatum['datum'];
                $examen->eindDatum = $eindDatum['datum'];
            }else{
                //Als er geen examen momenten zijn gevonden bij een examen zet er dan NB van niet beschikbaar in
                $examen->startDatum = 'NB';
                $examen->eindDatum = 'NB';
            }
        }

        $opleidingen = Opleidingen::all();
        $geplandeExamens = GeplandeExamens::all();
        
        //Vervangt gepland_examen, datum en tijd door het examen / examenmoment tijd
        foreach($geplandeExamens as $geplandExamen){
            $examen = Examen::where('id', $geplandExamen->examen)->first();
            $examenMoment = ExamenMoment::where('id', $geplandExamen->examen_moment)->first();

            $geplandExamen->gepland_examen = $examen->examen;
            $geplandExamen->datum = $examenMoment->datum;
            $geplandExamen->tijd = $examenMoment->tijd;
        }

        return view('beheer.dashboard.index')
            ->with(compact('examens'))
            ->with(compact('opleidingen'))
            ->with(compact('geplandeExamens'));
    }

    public function dtDutch(){
        return response()->file(resource_path('/json/datatabels/dutch.json'));
    }

    public function redirect(){
        return redirect('/beheer/dashboard');
    }
}
