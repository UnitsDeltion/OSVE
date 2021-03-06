<?php

namespace App\Http\Controllers\Beheer;

use Bouncer;
use App\Models\Examen;
use App\Models\ExamenMoment;
use App\Models\Opleidingen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ExamenBeheerController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}
        
            $examens = (new Examen())->with( 'examen_moments')->where('active', '=', 1)->get()->toArray();

            $inactiveExamens = (new Examen())->with( 'examen_moments')->where('active', '=', 0)->get()->toArray();

            return view('beheer.examens.index')->with(compact('examens', 'inactiveExamens'));
    }

    public function create()
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

        
        $opleidingen = Opleidingen::all()->toArray();
        return view('beheer.examens.create', compact('opleidingen'));
    }

    public function store(Request $request, Examen $examen, ExamenMoment $moment)
    {
        $this->validate($request, [
            'vak' => 'required',
            'examen' => 'required',
            'opleiding_id' => 'required|integer',
            'vak_docent' => 'required',
        ]);

        $examen->vak = $request->vak;
        $examen->examen = $request->examen;
        $examen->opleiding_id = $request->opleiding_id;
        $examen->vak_docent = $request->vak_docent;
        $examen->uitleg = $request->uitleg;
        $examen->save();
        
        return redirect()->route('examens.index')->with('success','Examen toegevoegd.');
    }

    public function show(Request $request, $id)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            $opleidingen = Opleidingen::all()->toArray();
            $examen = Examen::where('id', $id)->with('examen_moments')->get()->first()->toArray();

                return view('beheer.examens.show')->with(compact('examen', 'opleidingen'));
    }

    public function edit( Request $request, $id)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            $opleidingen = Opleidingen::all();
            $examen = Examen::where('id', $id)->with( 'examen_moments')->get()->first()->toArray();

        return view('beheer.examens.edit')->with(compact('examen', 'opleidingen'));
    }

    public function update(Request $request, $id)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            $bouncer = Bouncer::is($user)->a('opleidingsmanager');

            if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

                $this->validate($request, [
                    'vak' => 'required',
                    'examen' => 'required',
                    'opleiding_id' => 'required|integer',
                    'vak_docent' => 'required',
                ]);
                
                if (Examen::where('id', $id)->exists()) {
                    $examen = Examen::find($id);
                    $examen->vak = is_null($request->vak) ? $examen->vak : $request->vak;
                    $examen->examen = is_null($request->examen) ? $examen->examen : $request->examen;
                    $examen->opleiding_id = is_null($request->opleiding_id) ? $examen->opleiding_id : $request->opleiding_id;
                    $examen->vak_docent = is_null($request->vak_docent) ? $examen->vak_docent : $request->vak_docent;
                    $examen->uitleg = is_null($request->uitleg) ? $examen->uitleg : $request->uitleg;
                    $examen->save();
                    
                    return redirect()->route('examens.show', $id)->with('success','Examen aangepast.');
                }else {
                    return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
                }
    }

    public function returndelete($id)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            $examen = Examen::find($id);

            return view('beheer.examens.returndelete', compact('examen'));
    }


    public function delete($id)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            $examen = Examen::find($id);

            return view('beheer.examens.delete', compact('examen'));
    }

    public function destroy($id, ExamenMoment $moment)
    {
        $user = \Auth::user();
        if(!$user){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

            // $bouncer = Bouncer::is($user)->a('opleidingsmanager');

            //     if(!$bouncer){abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');}

                    if (Examen::where('id', $id)->exists()) {
                        $examen = Examen::find($id);
            
                        if ($examen->active == 1){$examen->active = 0; $examen->save();
                        }elseif ($examen->active == 0){$examen->active = 1; $examen->save();}

                        return redirect()->route('examens.index')->with('success','Examen verwijderd.');
                    }else{
                        return redirect()->route('examens.index')->with('error','Examen niet gevonden.');
                    }
    }
}