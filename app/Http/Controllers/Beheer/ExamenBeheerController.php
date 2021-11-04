<?php

namespace App\Http\Controllers\Beheer;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\ExamenMoment;

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

        return view('beheer.examens.create');
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
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);

        $examen->vak = $request->vak;
        $examen->examen = $request->examen;
        $examen->crebo_nr = $request->crebo_nr;
        $examen->plaatsen = $request->plaatsen;
        $examen->geplande_docenten = $request->geplande_docenten;
        $examen->examen_opgeven_begin = $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = $request->examen_opgeven_eind;
        $examen->uitleg = $request->uitleg;
        $examen->save();
        
        $moment->examenid = $examen->id;
        $moment->datum = $request->datum;
        $moment->tijd = $request->tijd;
        $moment->save();
        
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

        $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->toArray();
        $examen = $examen[0];

        return view('beheer.examens.show')->with(compact('examen'));
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

        $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->toArray();
        $examen = $examen[0];
        // dd($examen);
                 
        return view('beheer.examens.edit')->with(compact('examen'));
        
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
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);
        
    if (Examen::where('id', $id)->exists()) {
        $examen = Examen::find($id);
        $examen->vak = is_null($request->vak) ? $examen->vak : $request->vak;
        $examen->examen = is_null($request->examen) ? $examen->examen : $request->examen;
        $examen->crebo_nr = is_null($request->crebo_nr) ? $examen->crebo_nr : $request->crebo_nr;
        $examen->plaatsen = is_null($request->plaatsen) ? $examen->plaatsen : $request->plaatsen;
        $examen->geplande_docenten = is_null($request->geplande_docenten) ? $examen->geplande_docenten : $request->geplande_docenten;
        $examen->examen_opgeven_begin = is_null($request->examen_opgeven_begin) ? $examen->examen_opgeven_begin : $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = is_null($request->examen_opgeven_eind) ? $examen->examen_opgeven_eind : $request->examen_opgeven_eind;
        $examen->uitleg = is_null($request->uitleg) ? $examen->uitleg : $request->uitleg;
        $examen->save();
        
        $moment = ExamenMoment::find($id);
        $moment->datum = is_null($request->datum) ? $moment->datum : $request->datum;
        $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
        $moment->save();
        
            return redirect()->route('examens.index')->with('success','Examen aangepast.');
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

        
        $examen = Examen::find($id);
        $examen->delete();
        

        return redirect()->route('examens.index')->with('success','Examen verwijderd.');
    }


    public function examenMomentCreate(Request $request, $id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examen = Examen::where('id', $id)->get()->toArray();
        $examen = $examen[0];

        return view('beheer.moments.create')->with(compact('examen'));
    }

    public function examenMomentStore(Request $request, Examen $examen, ExamenMoment $moment)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
        ]);
        $moment->examenid = $request->id;
        $moment->datum = $request->datum;
        $moment->tijd = $request->tijd;
        $moment->save();

        return redirect()->route('examens.index')->with('success','Examen moment toegevoegd.');
    }
}