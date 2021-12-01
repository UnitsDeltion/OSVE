<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
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
