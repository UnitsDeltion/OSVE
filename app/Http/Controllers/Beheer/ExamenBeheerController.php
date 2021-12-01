<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;
use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\Opleidingen;
use Bouncer;

class ExamenBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $opleidingsmanager = Bouncer::is($user)->a('opleidingsmanager');
        //$docent = Bouncer::is($user)->a('docent');

        $examens = (new Examen())->with( 'examen_moments')->get()->toArray();

        if($opleidingsmanager){
            return view('beheer.examens.index')->with(compact('examens'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }


        $opleidingen = Opleidingen::all()->toArray();
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
        $this->validate($request, [
            'vak' => 'required',
            'examen' => 'required',
            'opleiding_id' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);

        $examen->vak = $request->vak;
        $examen->examen = $request->examen;
        $examen->opleiding_id = $request->opleiding_id;
        $examen->geplande_docenten = $request->geplande_docenten;
        $examen->examen_opgeven_begin = $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = $request->examen_opgeven_eind;
        $examen->uitleg = $request->uitleg;
        $examen->save();
        
        
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
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $opleidingen = Opleidingen::all()->toArray();

        $examen = Examen::where('id', $id)->with('examen_moments')->get()->first()->toArray();

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
        
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            $opleidingen = Opleidingen::all()->toArray();

            $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->first()->toArray();

        return view('beheer.examens.edit')->with(compact('examen', 'opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        
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
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $this->validate($request, [
            'vak' => 'required',
            'examen' => 'required',
            'opleiding_id' => 'required|integer',
            'geplande_docenten' => 'required',
            'examen_opgeven_begin' => 'required',
            'examen_opgeven_eind' => 'required',
        ]);
        
    if (Examen::where('id', $id)->exists()) {
        $examen = Examen::find($id);
        $examen->vak = is_null($request->vak) ? $examen->vak : $request->vak;
        $examen->examen = is_null($request->examen) ? $examen->examen : $request->examen;
        $examen->opleiding_id = is_null($request->opleiding_id) ? $examen->opleiding_id : $request->opleiding_id;
        $examen->geplande_docenten = is_null($request->geplande_docenten) ? $examen->geplande_docenten : $request->geplande_docenten;
        $examen->examen_opgeven_begin = is_null($request->examen_opgeven_begin) ? $examen->examen_opgeven_begin : $request->examen_opgeven_begin;
        $examen->examen_opgeven_eind = is_null($request->examen_opgeven_eind) ? $examen->examen_opgeven_eind : $request->examen_opgeven_eind;
        $examen->uitleg = is_null($request->uitleg) ? $examen->uitleg : $request->uitleg;
        $examen->save();
        
            return redirect()->route('examens.show', $id)->with('success','Examen aangepast.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
        }
    }

    public function delete($id)
    {
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $examen = Examen::find($id);

        return view('beheer.examens.delete', compact('examen'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, ExamenMoment $moment)
    {
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        $opleidingen = Opleidingen::all();

        if($bouncer){
            return view('beheer.opleidingen.index', compact('opleidingen'));
        }else{
            //echo 'not allowed';  
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        if (Examen::where('id', $id)->exists()) {
            $examen = Examen::find($id);
            $examen->delete();
        

        return redirect()->route('examens.index')->with('success','Examen verwijderd.');
        }else {
            return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
        }
    }

}