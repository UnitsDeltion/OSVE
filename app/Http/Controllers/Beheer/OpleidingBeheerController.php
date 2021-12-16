<?php

namespace App\Http\Controllers\Beheer;

use Illuminate\Http\Request;
use App\Models\Opleidingen;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use Bouncer;

class OpleidingBeheerController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

<<<<<<< Updated upstream
        
        $bouncer = Bouncer::is($user)->a('opleidingsmanager');
        if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}
=======
        $bouncer = Bouncer::is($user)->a('beheerder');
>>>>>>> Stashed changes

        $opleidingen = Opleidingen::all();
        return view('beheer.opleidingen.index', compact('opleidingen'));
    }

    public function create()
    {
        return view('beheer.opleidingen.create');
    }

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

        return redirect()->route('opleidingen.index')->with('success','Opleiding aangemaakt');
    }

    public function edit($id)
    { 
        $opleiding = Opleidingen::find($id);
        return view('beheer.opleidingen.edit', compact('opleiding'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'crebo_nr' => 'required|max:5|string',
            'opleiding' => 'required|max:255|string',
        ]);

        if (Opleidingen::where('id', $id)->exists()) {
            $opleiding = Opleidingen::find($id);

            $opleiding->crebo_nr = is_null($request->crebo_nr) ? $opleiding->crebo_nr : $request->crebo_nr;
            $opleiding->opleiding = is_null($request->opleiding) ? $opleiding->opleiding : $request->opleiding;
            $opleiding->save();

            return redirect()->route('opleidingen.index')->with('success','Opleiding aangepast');
        }else {
            return redirect()->route('opleidingen.index')->with('error','Opleiding niet gevonden.');
        }
    }

    public function delete($id)
    {
        $opleiding = Opleidingen::find($id);

        return view('beheer.opleidingen.delete', compact('opleiding'));
    }
    
    public function destroy($id)
    {
        $opleiding = Opleidingen::find($id);
        $opleiding->delete();

        return redirect()->route('opleidingen.index')->with('success','Opleiding verwijderd');
    }
}
