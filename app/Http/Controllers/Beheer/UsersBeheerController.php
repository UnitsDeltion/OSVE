<?php

namespace App\Http\Controllers\Beheer;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Bouncer;


class UsersBeheerController extends Controller{
    
    public function index(){    
        $users = User::all();
        $user = \Auth::user();

        if(!$user){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $bouncer = Bouncer::is($user)->a('opleidingsmanager');

        if(!$bouncer){
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }
        return view('beheer.users.index', compact('users'));
    }

    public function show(Request $request) {
        return redirect('/beheer/users');
    }

    public function create(Request $request, User $user)
    {
        return view('beheer.users.create');
    }

    public function store(Request $request, User $user) 
    {
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'email'=> 'required|unique:users|email',
            'password' => 'required|min:9|string',
            'passwordconfirm' => 'required|min:9|string|same:password',
        ]);

        $user->voornaam = $request->voornaam;
        $user->achternaam = $request->achternaam;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('users.index')->with('success','Gebruiker aangemaakt');
    }

    public function edit(User $user){

        $user->all();

        return view('beheer.users.edit', compact('user'));
    }

    public function update(Request $request, User $user){


        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'email'=> 'required|email',
            // 'roles' => 'required',
        ]);

        if (User::where('id', $request->user->id)->exists()) {
            $user = User::find($request->user->id);

            $user->voornaam = is_null($request->voornaam) ? $user->voornaam : $request->voornaam;
            $user->achternaam = is_null($request->achternaam) ? $user->achternaam : $request->achternaam;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->save();
        }
        //$user->roles()->sync($request->input('roles', []));

        return redirect()->route('users.index')->with('success','Gebruiker bijgewerkt');
    }

    public function destroy(User $user){

        $user->delete();

        return redirect()->route('users.index')->with('success','Gebruiker verwijderd');
    }
}
