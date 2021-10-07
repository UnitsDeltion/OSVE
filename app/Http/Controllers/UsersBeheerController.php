<?php

namespace App\Http\Controllers\Beheer;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Controller;

class UsersBeheerController extends Controller{
    
    public function index(){
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::with('roles')->get();

        return view('beheer.users.index', compact('users'));
    }

    public function show(User $user){
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('beheer.users.show', compact('user'));
    }

    public function edit(User $user){
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $roles = Role::pluck('title', 'id');

        $user->load('roles');

        return view('beheer.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user){
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (User::where('id', $request->user->id)->exists()) {
            $user = User::find($request->user->id);

            $user->voornaam = is_null($request->voornaam) ? $user->voornaam : $request->voornaam;
            $user->achternaam = is_null($request->achternaam) ? $user->achternaam : $request->achternaam;
            $user->adres = is_null($request->adres) ? $user->adres : $request->adres;
            $user->postcode = is_null($request->postcode) ? $user->postcode : $request->postcode;
            $user->plaatsnaam = is_null($request->plaatsnaam) ? $user->plaatsnaam : $request->plaatsnaam;
            $user->land = is_null($request->land) ? $user->land : $request->land;
            $user->telefoonnummer = is_null($request->telefoonnummer) ? $user->telefoonnummer : $request->telefoonnummer;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();
        }
        $user->roles()->sync($request->input('roles', []));

        return redirect()->route('beheer.users.index')->with('success','Gebruiker bijgewerkt');
    }

    public function destroy(User $user){
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if (User::where('id', $user->id)->exists()) {
            $user = User::find($user->id);

            if($user->status == 0){
                $user->status = 1;
                $user->save();

                return redirect()->route('beheer.users.index')->with('success', 'Gebruiker geactiveerd');
            }elseif($user->status == 1){
                $user->status = 0;
                $user->save();

                return redirect()->route('beheer.users.index')->with('success', 'Gebruiker gedeactiveerd');
            }
        }

        return redirect()->route('beheer.users.index');
    }
}
