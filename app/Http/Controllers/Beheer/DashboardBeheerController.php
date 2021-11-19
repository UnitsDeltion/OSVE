<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\User;
use App\Models\Opleidingen;
use App\Models\GeplandeExamens;

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

        foreach($examens as $examen){
            foreach($users as $user){
                if($examen->geplande_docenten == $user->email){
                    $examen->geplande_docenten = $user->voornaam . " " . $user->achternaam;
                }
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
