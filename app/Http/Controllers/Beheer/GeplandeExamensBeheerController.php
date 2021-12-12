<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\GeplandeExamens;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GeplandeExamensBeheerController extends Controller
{
    public function index(Request $request){
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

        $geplandeExamens = GeplandeExamens::all();
        
        //Vervangt gepland_examen, datum en tijd door het examen / examenmoment tijd
        foreach($geplandeExamens as $geplandExamen){
            $examen = Examen::where('id', $geplandExamen->examen)->first();
            $examenMoment = ExamenMoment::where('id', $geplandExamen->examen_moment)->first();

            $geplandExamen->vak = $examen->vak;
            $geplandExamen->gepland_examen = $examen->examen;
            $geplandExamen->datum = $examenMoment->datum;
            $geplandExamen->tijd = $examenMoment->tijd;
        }

        return view('beheer.geplandeExamens.index')
            ->with(compact('geplandeExamens'));
    }
    
    public function bevestigExamen(Request $request)
    {
        $request->validate([
            "examenBevestigen" => "required",
        ]);

        $data = explode(", ", $request->examenBevestigen);

        foreach ($data as $examen) {
            //Haalt hte gepland examen record op
            $geplandExamen = GeplandeExamens::where("id", $examen)->first();

            //Zet de waarde van doc_bevestigd op 1 zodat hij door de docent is bevestigd
            $geplandExamen["doc_bevestigd"] = 1;

            //Slaat de record op in de db
            $geplandExamen->save();

            //Bevestigings mail naar student
            \Mail::to($geplandExamen["studentnummer"] . "@st.deltion.nl")->send(
                new \App\Mail\examenIngepland()
            );
        }
        
        //Stuurt terug naar dashboard
        return redirect("/beheer/dashboard");
    }

    public function delete($id)
    {
        $geplandExamen = GeplandeExamens::find($id);

        return view('beheer.geplandeExamens.delete', compact('geplandExamen'));
    }
    
    public function destroy($id)
    {
        $geplandExamen = GeplandeExamens::find($id);
        $geplandExamen->delete();

        return redirect()->route('geplandeExamens.index')->with('success','Examen afspraak verwijderd');
    }
}
