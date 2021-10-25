<?php

namespace App\Http\Controllers;

use App\Models\Opleidingen;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class FormHandlerController extends Controller
{
    
    public function f2(Request $request){
        $validated = $request->validate([
            'voornaam' => 'required|max:255|string',
            'achternaam' => 'required|max:255|string',
            'studentnummer' => 'required|max:9|string',
        ]);
        
        if(!isset($request->voornaam) 
        || !isset($request->achternaam) 
        || !isset($request->studentnummer)){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $request->session()->put('voornaam', $request->voornaam);
        $request->session()->put('achternaam', $request->achternaam);
        $request->session()->put('studentnummer', $request->studentnummer);

        return redirect('p2');
    }

    public function f3(Request $request){
        $validated = $request->validate([
            'crebo_nr' => 'required|max:5|string',
        ],
        [
            'crebo_nr.required' => 'Het opleidingen veld is verplicht!',
        ]);
        
        if(!isset($request->crebo_nr) 
        || null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $opleiding = Opleidingen::where('crebo_nr', $request->crebo_nr)->get();

        $request->session()->put('crebo_nr', $request->crebo_nr);
        $request->session()->put('opleiding', $opleiding[0]->opleiding);

        return redirect('p3');
    }

    public function f4(Request $request){
        $validated = $request->validate([
            'examen' => 'required|max:255|string',
        ]);

        if(!isset($request->examen) 
        || null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        $data = explode(" - ", $request->examen);

        $request->session()->put('vak', $data[0]);
        $request->session()->put('examen', $data[1]);
        
        return redirect('p4');
    }

    public function f5(Request $request){
        if(null == $request->session()->get('voornaam')
        || null == $request->session()->get('achternaam') 
        || null == $request->session()->get('studentnummer')
        || null == $request->session()->get('crebo_nr')
        || null == $request->session()->get('opleiding')
        || null == $request->session()->get('vak')
        || null == $request->session()->get('examen')){
            $request->session()->flush();
            abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        }

        return redirect('p5');
    }

    public function f6(Request $request){
        $validated = $request->validate([
            'faciliteitenpas' => 'required|max:3',
            'opmerkingen' => 'max:1000',
        ]);

        if(isset($request->faciliteitenpas)){$request->session()->put('faciliteitenpas', $request->faciliteitenpas);}
        if(isset($request->opmerkingen)){$request->session()->put('opmerkingen', $request->opmerkingen);}

        return redirect('p6');
    }

    public function f7(Request $request){
        // if(null == $request->session()->get('voornaam')
        // || null == $request->session()->get('achternaam') 
        // || null == $request->session()->get('studentnummer')
        // || null == $request->session()->get('crebo_nr')
        // || null == $request->session()->get('opleiding')
        // || null == $request->session()->get('vak')
        // || null == $request->session()->get('examen')
        // || null == $request->session()->get('datum')
        // || null == $request->session()->get('tijd')
        // || null == $request->session()->get('faciliteitenpas')){
        //     $request->session()->flush();
        //     abort_if(Gate::denies('user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        // }

        $student_nr = $request->session()->get('studentnummer');
        $details = [];
        
           
            \Mail::to($student_nr.'@st.deltion.nl')->send(new \App\Mail\MyTestMail($details));
           
            dd("Email is Sent.");
    }
}
