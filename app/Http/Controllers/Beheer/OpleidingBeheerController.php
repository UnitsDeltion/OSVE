<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Models\Opleidingen;
use App\Http\Controllers\Controller;
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

        $validated = $request->validate([
            'crebo_nr' => 'required|String',
            'opleiding' => 'required|String',
        ]);

        Opleidingen::create([
            'crebo_nr' => $request->crebo_nr,
            'opleiding' => $request->opleiding,
        ]);

        return redirect()->route('opleidingen.index')->with('success','Gebruiker aangemaakt');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($crebo_nr)
    {
        
        $opleiding = Opleidingen::find($crebo_nr);
        return view('beheer.opleidingen.edit', compact('opleiding'));
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
            $validated = $request->validate([
            'crebo_nr' => 'required|max:5|string',
            'opleiding' => 'required|max:255|string',
        ]);

        if (Opleidingen::where('crebo_nr', $crebo_nr)->exists()) {
            $opleiding = Opleidingen::find($crebo_nr);

            $opleiding->crebo_nr = is_null($request->crebo_nr) ? $opleiding->crebo_nr : $request->crebo_nr;
            $opleiding->opleiding = is_null($request->opleiding) ? $opleiding->opleiding : $request->opleiding;
            $opleiding->save();

            return redirect()->route('opleidingen.index')->with('success','Opleiding aangepast');
        }else {
            return redirect()->route('opleidingen.index')->with('error','Opleiding niet gevonden.');
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

        $opleiding = Opleidingen::find($crebo_nr);
        $opleiding->delete();

        return redirect()->route('opleidingen.index')->with('success','Opleiding verwijderd');
    }
}
