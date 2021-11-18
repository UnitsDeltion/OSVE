<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use Illuminate\Http\Request;
use App\Models\ReglementenBeheer;
use App\Http\Controllers\Controller;

class ReglementenBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reglementen = ReglementenBeheer::get()->first();

        return view('beheer.reglementen.index')->with(compact('reglementen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'regelement' => 'required|max:255|URL',
        ]);

        if (ReglementenBeheer::where('id', '1')->exists()) {
            $regelement = ReglementenBeheer::find('1');

            $regelement->regelement = is_null($request->regelement) ? $regelement->regelement : $request->regelement;
            $regelement->save();
        }

        return redirect()->route('regelementen.index')->with('success','Regelement bijgewerkt');
    }
}
