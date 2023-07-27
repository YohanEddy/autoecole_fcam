<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;
use App\Models\participer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParticiperController extends Controller
{
    public function participer()
    {
        $participers = participer::all();
        $apprenants = apprenant::all();
        $cours = cour::all();
        $sessions = session::all();
        return view('participer', compact('participers', 'apprenants', 'cours', 'sessions'));
    }

    //public const participer = '/participers';

    public function store(Request $request)
    {
        $rules = [
            'date_cour'     => 'bail|required',
            'session_id'    => 'bail|required',
            'apprenant_id'  => 'bail|required',
            'cour_id'       => 'bail|required',
        ];

        $messages = [
            'date_cour'     => 'La date est requise',
            'session_id'    => 'La session est requise',
            'apprenant_id'  => 'l\'apprenant est requis',
            'cour_id'       => 'Le cour est requis',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $participer = new participer;
        $participer->date_cour = $request->date_cour;
        $participer->session_id = $request->session_id;
        $participer->apprenant_id = $request->apprenant_id;
        $participer->cour_id = $request-> cour_id;


        $participer->save();

        return redirect()->route('participer')->with('success','Enregistrement éffectuer avec succès');
    }

    public function edit(participer $participer)
    {
        $apprenants = apprenant::all();
        $sessions = session::all();
        $cours = cour::all();
        $participers = participer::all();
        return view('participer', compact("participers", "participer", "apprenants","sessions", "cours"));
    }

    public function update(Request $request, participer $participer)
    {
        $message = "";
        $message_type = "";
        $rules = [
            'date_cour'     => 'bail|required',
            'session_id'    => 'bail|required',
            'apprenant_id'  => 'bail|required',
            'cour_id'       => 'bail|required',
        ];

        $messages = [
            'date_cour'     => 'La date est requise',
            'session_id'    => 'La session est requise',
            'apprenant_id'  => 'l\'apprenant est requis',
            'cour_id'       => 'Le cour est requis',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $participer->date_cour = $request->date_cour;
        $participer->session_id = $request->session_id;
        $participer->apprenant_id = $request->apprenant_id;
        $participer->cour_id = $request-> cour_id;

        $participer->update();
        $resultat = $participer->update();
        if($resultat == true){
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        }else{
            // message d'echec
        }
        return redirect()->route('participer')->with($message_type, $message);
    }

    public function destroy(participer $participer)
    {
        //$participer->apprenants()->delete();
        $participer->delete();
        
        return redirect()->route('participer');
    }
}
