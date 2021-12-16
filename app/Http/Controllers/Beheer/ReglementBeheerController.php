<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use App\Models\Opleidingen;
use Illuminate\Http\Request;
use App\Models\Reglement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class ReglementBeheerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

        $bouncer = Bouncer::is($user)->a('beheerder');

        if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}
            $reglement = Reglement::get()->first();

            return view('beheer.reglement.index')->with(compact('reglement'));
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
            'reglement' => 'required|max:255',
        ]);

        if (Reglement::where('id', '1')->exists()) {
            $reglement = Reglement::find('1');

            $reglement->reglement = is_null($request->reglement) ? $reglement->reglement : $request->reglement;
            $reglement->save();
        }

        return redirect()->route('reglement.index')->with('success','Reglement bijgewerkt');
    }
}
