<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use Illuminate\Http\Request;
use App\Models\RegelementBeheer;
use App\Http\Controllers\Controller;

class RegelementBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regelement = RegelementBeheer::get()->first();

        return view('beheer.regelement.index')->with(compact('regelement'));
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

        if (RegelementBeheer::where('id', '1')->exists()) {
            $regelement = RegelementBeheer::find('1');

            $regelement->regelement = is_null($request->regelement) ? $regelement->regelement : $request->regelement;
            $regelement->save();
        }

        return redirect()->route('regelementen.index')->with('success','Regelement bijgewerkt');
    }
}
