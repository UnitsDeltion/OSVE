<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\Opleidingen;

class ExamenMomentBeheerController extends Controller
{
    public function create(Request $request, $id)
    {
        $examen = Examen::where('id', $id)->get()->first()->toArray();

        return view('beheer.moments.create')->with(compact('examen'));
    }

    public function store(Request $request, Examen $examen, ExamenMoment $moment, $id)
    { 
        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
            'plaatsen' => 'required'
        ]);

        $moment->examenid = $request->id;
        $moment->datum = $request->datum;
        $moment->tijd = $request->tijd;
        $moment->plaatsen = $request->plaatsen;

        $moment->save();

        return redirect()->route('examens.show', $id)->with('success','Examen moment toegevoegd.');
    }

    public function edit(Request $request, $id)
    {
        $moment = ExamenMoment::where('id', $id)->first()->toArray();
        $examen = Examen::where( 'id', $moment['examenid'])->first()->toArray();

        return view('beheer.moments.edit')->with(compact('examen', 'moment'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
        ]);
        
        if(ExamenMoment::where('id', $id)->exists()){
            $moment = ExamenMoment::find($id);
            $moment->datum = is_null($request->datum) ? $moment->datum : $request->datum;
            $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
            $moment->plaatsen = is_null($request->plaatsen) ? $moment->plaatsen : $request->plaatsen;
            $moment->save();
            $examenId = $moment->examenid;
            
            return redirect()->route('examens.show', $examenId)->with('success','Examen moment aangepast.');
        }else{
            return redirect()->route('examens.index')->with('error','Examen moment niet gevonden.');
        }
    }

    public function delete($id)
    {
        $moment = ExamenMoment::find($id);

        return view('beheer.moments.delete', compact('moment'));
    }

    public function destroy($id)
    {
        if (ExamenMoment::where('id', $id)->exists()) {
            $moment = ExamenMoment::find($id);
            $examenId = $moment->examenid;
            $moment->delete();
        
            return redirect()->route('examens.show', $examenId)->with('success','Examen moment verwijderd.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen moment niet gevonden.');
        }
    }
}
