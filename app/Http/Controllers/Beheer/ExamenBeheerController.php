<?php

namespace App\Http\Controllers\Beheer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\Opleidingen;

class ExamenBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $examens = (new Examen())->with( 'examen_moments')->get()->toArray();
        // $examens = (new Examen())->get()->toArray();
        //dd ($examens);
        return view('beheer.examens.index')->with(compact('examens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $opleidingen = Opleidingen::all()->toArray();
        //dd($opleidingen);
        return view('beheer.examens.create', compact('opleidingen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Examen $examen, ExamenMoment $moment)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'vak' => 'required',
            'examen' => 'required',
            'crebo_nr' => 'required|integer|digits:5',
            'datum' => 'required',
            // 'tijd' => 'required',
            // 'plaatsen' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);

        $examen->vak = $request->vak;
        $examen->examen = $request->examen;
        $examen->crebo_nr = $request->crebo_nr;
        $examen->geplande_docenten = $request->geplande_docenten;
        $examen->examen_opgeven_begin = $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = $request->examen_opgeven_eind;
        $examen->uitleg = $request->uitleg;
        $examen->datum = $request->datum;
        $examen->save();
        
        // $moment->examenid = $examen->id;
        // $moment->tijd = $request->tijd;
        // $moment->plaatsen = $request->plaatsen;
        // $moment->save();
        
        return redirect()->route('examens.index')->with('success','Examen toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opleidingen = Opleidingen::all()->toArray();

        $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->toArray();
        $examen = $examen[0];

        return view('beheer.examens.show')->with(compact('examen', 'opleidingen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opleidingen = Opleidingen::all()->toArray();

        $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->toArray();
        $examen = $examen[0];
        // dd($examen);
                 
        return view('beheer.examens.edit')->with(compact('examen', 'opleidingen'));
        
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'vak' => 'required',
            'examen' => 'required',
            'crebo_nr' => 'required|integer|digits:5',
            'datum' => 'required',
            // 'tijd' => 'required',
            // 'plaatsen' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);
        
    if (Examen::where('id', $id)->exists()) {
        $examen = Examen::find($id);
        $examen->vak = is_null($request->vak) ? $examen->vak : $request->vak;
        $examen->examen = is_null($request->examen) ? $examen->examen : $request->examen;
        $examen->crebo_nr = is_null($request->crebo_nr) ? $examen->crebo_nr : $request->crebo_nr;
        $examen->geplande_docenten = is_null($request->geplande_docenten) ? $examen->geplande_docenten : $request->geplande_docenten;
        $examen->examen_opgeven_begin = is_null($request->examen_opgeven_begin) ? $examen->examen_opgeven_begin : $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = is_null($request->examen_opgeven_eind) ? $examen->examen_opgeven_eind : $request->examen_opgeven_eind;
        $examen->uitleg = is_null($request->uitleg) ? $examen->uitleg : $request->uitleg;
        $examen->datum = is_null($request->datum) ? $examen->datum : $request->datum;
        $examen->save();
        
        // $moment = ExamenMoment::find($id);
        // $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
        // $moment->plaatsen = is_null($request->plaatsen) ? $moment->plaatsen : $request->plaatsen;
        // $moment->save();
        
            return redirect()->route('examens.show', $id)->with('success','Examen aangepast.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ExamenMoment $moment)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Examen::where('id', $id)->exists()) {
            $examen = Examen::find($id);
            $examen->delete();
        

        return redirect()->route('examens.index')->with('success','Examen verwijderd.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
        }
    }


    public function examenMomentCreate(Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examen = Examen::where('id', $id)->get()->toArray();
        $examen = $examen[0];

        return view('beheer.moments.create')->with(compact('examen'));
    }

    public function examenMomentEdit(Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $examen = Examen::where('id', $id)->get()->toArray();
        // // dd($examen);
        // $examen = $examen[0];
        $moment = ExamenMoment::where('id', $id)->first()->toArray();
        $examen = Examen::where( 'id', $moment['examenid'])->first()->toArray();
     

        return view('beheer.moments.edit')->with(compact('examen', 'moment'));
    }


    public function examenMomentDelete($id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');


    }

    public function examenMomentStore(Request $request, Examen $examen, ExamenMoment $moment, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'tijd' => 'required',
            'plaatsen' => 'required'
        ]);
        $moment->examenid = $request->id;
        $moment->tijd = $request->tijd;
        $moment->plaatsen = $request->plaatsen;
        $moment->save();

        return redirect()->route('examens.show', $id)->with('success','Examen moment toegevoegd.');
    }

    public function examenMomentUpdate(Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
        ]);
        
    if (Examen::where('id', $id)->exists()) {
        
        $moment = ExamenMoment::find($id);
        $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
        $moment->plaatsen = is_null($request->plaatsen) ? $moment->plaatsen : $request->plaatsen;
        $moment->save();
        
            return redirect()->route('examens.show', $id)->with('success','Examen moment aangepast.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen moment niet gevonden.');
        }
    }
}