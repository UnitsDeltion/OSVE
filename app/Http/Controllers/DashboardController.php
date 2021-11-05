<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use App\Models\User;
use App\Models\Opleidingen;
use App\Models\GeplandeExamens;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all();
        $examens = Examen::all();

        foreach($examens as $examen){
            foreach($users as $user){
                if($examen->geplande_docenten == $user->email){
                    $examen->geplande_docenten = $user->voornaam . " " . $user->achternaam;
                }
            }
        }

        $opleidingen = Opleidingen::all();
        $geplandeExamens = GeplandeExamens::all();

        return view('dashboard.index')
            ->with(compact('examens'))
            ->with(compact('opleidingen'))
            ->with(compact('geplandeExamens'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        dd($request->all());

        // abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        // $filters = GeplandeExamens::findOrFail($request->klas);

        // return view('dashboard.filter', compact('filters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function query(Request $request)
    {
        $request->klas;
        //dd($request);
        $klassen = DB::table('geplande_examen')
            ->select('*')->where('klas', 'like', "%$request->klas%")
            ->get();
        dd($klassen);    

    }


}
