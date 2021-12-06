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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        
        
        $examen = Examen::where('id', $id)->get()->first()->toArray();

        return view('beheer.moments.create')->with(compact('examen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Examen $examen, ExamenMoment $moment, $id)
    {
        
        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
            'plaatsen' => 'required',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);
        $moment->examenid = $request->id;
        $moment->datum = $request->datum;
        $moment->tijd = $request->tijd;
        $moment->plaatsen = $request->plaatsen;  
        $moment->geplande_docenten = $request->geplande_docenten;
        $moment->examen_opgeven_begin = $request->examen_opgeven_begin;
        $moment->examen_opgeven_eind = $request->examen_opgeven_eind;  
        $moment->save();

        return redirect()->route('examens.show', $id)->with('success','Examen moment toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $moment = ExamenMoment::where('id', $id)->first()->toArray();
        $examen = Examen::where( 'id', $moment['examenid'])->first()->toArray();

        return view('beheer.moments.edit')->with(compact('examen', 'moment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);
        
    if (ExamenMoment::where('id', $id)->exists()) {
        $moment = ExamenMoment::find($id);
        $moment->datum = is_null($request->datum) ? $moment->datum : $request->datum;
        $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
        $moment->plaatsen = is_null($request->plaatsen) ? $moment->plaatsen : $request->plaatsen;
        $moment->geplande_docenten = is_null($request->geplande_docenten) ? $moment->geplande_docenten : $request->geplande_docenten;
        $moment->examen_opgeven_begin = is_null($request->examen_opgeven_begin) ? $moment->examen_opgeven_begin : $request->examen_opgeven_begin;
        $moment->examen_opgeven_eind = is_null($request->examen_opgeven_eind) ? $moment->examen_opgeven_eind : $request->examen_opgeven_eind;
        $moment->save();
        $examenId = $moment->examenid;
        
            return redirect()->route('examens.show', $examenId)->with('success','Examen moment aangepast.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen moment niet gevonden.');
        }
    }

    public function delete($id)
    {
        $moment = ExamenMoment::find($id);

        return view('beheer.moments.delete', compact('moment'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
