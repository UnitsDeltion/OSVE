<?php

namespace App\Http\Controllers;

use App\Models\Opleidingen;
use Illuminate\Http\Request;
use App\Models\GeplandeExamen;
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

        $examens = GeplandeExamen::all();
        $opleidingen = Opleidingen::all();

        return view('dashboard.index', compact('examens'), compact('opleidingen'));
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

        // $filters = GeplandeExamen::findOrFail($request->klas);

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
