<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;
use App\Models\participer;
use Illuminate\Http\Request;

class ParticiperController extends Controller
{
    public function participer()
    {
        $participers = participer::all();
        //$apprenants = apprenant::all();
        //$cours = cour::all();
        //$sesions = session::all();
        return view('participer', compact('participers'));
    }

    //public const participer = '/participers';

    public function store(Request $request)
    {


        $participer = new participer;
        $participer->date_cour = $request->date_cour;
        $participer->session_id = $request->session_id;
        $participer->apprenant_id = $request->apprenant_id;
        $participer->cour_id = $request-> cour_id;


        $participer->save();

        return redirect()->route('participer');
    }

    public function edit(participer $participer)
    {
        $participers = participer::all();
        return view('participer', compact("participers", "participer"));
    }

    public function update(Request $request, participer $participer)
    {
        $message = "";
        $message_type = "";

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
