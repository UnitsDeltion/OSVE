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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $examen = Examen::where('id', $id)->get()->toArray();
        $examen = $examen[0];

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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $examen = Examen::where('id', $id)->get()->toArray();
        // // dd($examen);
        // $examen = $examen[0];
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
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $this->validate($request, [
            'datum' => 'required',
            'tijd' => 'required',
            'plaatsen' => 'required|integer',
        ]);
        
    if (Examen::where('id', $id)->exists()) {
        
        $moment = ExamenMoment::find($id);
        $moment->datum = is_null($request->datum) ? $moment->datum : $request->datum;
        $moment->tijd = is_null($request->tijd) ? $moment->tijd : $request->tijd;
        $moment->plaatsen = is_null($request->plaatsen) ? $moment->plaatsen : $request->plaatsen;
        $moment->save();
        
            return redirect()->route('examens.show', $id)->with('success','Examen moment aangepast.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen moment niet gevonden.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    }
}
