<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Models\Opleidingen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class OpleidingBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opleidingen = Opleidingen::all();

        return view('beheer.opleidingen.index', compact('opleidingen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('beheer.opleidingen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $validated = $request->validate([
            'crebo_nr' => 'required|String',
            'opleiding_naam' => 'required|String',
        ]);

        Opleidingen::create([
            'crebo_nr' => $request->crebo_nr,
            'opleiding_naam' => $request->opleiding_naam,
        ]);

        return redirect()->route('beheer.opleidingen.index')->with('success','Gebruiker aangemaakt');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($crebo_nr)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $opleidingen = Opleidingen::find($id);
        return view('beheer.opleidingen.edit', compact('opleidingen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $crebo_nr)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (Opleidingen::where('id', $crebo_nr)->exists()) {
            $opleiding = Opleidingen::find($crebo_nr);

            $opleiding->crebo_nr = is_null($request->crebo_nr) ? $opleiding->crebo_nr : $request->crebo_nr;
            $opleiding->opleiding_naam = is_null($request->opleiding_naam) ? $opleiding->opleiding_naam : $request->opleiding_naam;
            $opleiding->save();

            return redirect()->route('beheer.opleidingen.index')->with('success','Opleiding aangepast');
        }else {
            return redirect()->route('beheer.opleidingen.index')->with('error','Opleiding niet gevonden.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($crebo_nr)
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $opleiding = Opleidingen::find($crebo_nr);
        $opleiding->delete();

        return redirect()->route('beheer.opleidingen.index')->with('success','Opleiding verwijderd');
    }
}
