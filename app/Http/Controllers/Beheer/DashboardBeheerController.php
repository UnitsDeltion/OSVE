<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\User;
use App\Models\Opleidingen;
use App\Models\GeplandeExamens;

use DateTime;
use Bouncer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class DashboardBeheerController extends Controller
{
    public function index()
    {
        $users = User::all();
        $examens = Examen::all();
        $examenMomenten = ExamenMoment::orderBy('examenid', 'asc')->get();

        foreach($examens as $examen){
            foreach($users as $user){
                if($examen->geplande_docenten == $user->email){
                    $examen->geplande_docenten = $user->voornaam . " " . $user->achternaam;
                }
            }

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

        //Tijdelijk tot de relatie erin zit
        foreach($geplandeExamens as $geplandExamen){
            $examen = Examen::where('id', $geplandExamen->examen)->first();
            $examenMoment = ExamenMoment::where('id', $geplandExamen->examen_moment)->first();

            $geplandExamen->gepland_examen = $examen->examen;
            $geplandExamen->datum = $examenMoment->datum;
            $geplandExamen->tijd = $examenMoment->tijd;
        }
        
        $user = \Auth::user();
        
        // Bouncer::allow('docent')->to('examen-beheer');
        // Bouncer::allow('opleidingsmanager')->to('examen-beheer');
        // Bouncer::allow('opleidingsmanager')->to('everything');
        // Bouncer::assign('docent')->to($user);
        // Bouncer::assign('opleidingsmanager')->to($user);

        return view('dashboard.index')
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
