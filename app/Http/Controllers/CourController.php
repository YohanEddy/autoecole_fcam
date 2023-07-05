<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;

use Illuminate\Http\Request;


class CourController extends Controller
{
    public function cour()
    {
        $cours = cour::all();
        return view('cour', compact('cours'));
    }

    //public const cour = '/pcours';

    public function store(Request $request)
    {
        $cour = new cour;
        $cour->lib_cour = $request->lib_cour;
        $cour->type_cour = $request->type_cour;

        $cour->save();
        

        return redirect()->route('cour')->with('success', 'Enregistrement éffectué avec succes');
    }

    public function edit(cour $cour)
    {
        $cours = cour::all();
        return view('cour', compact("cours", "cour"));
    }

    public function update(Request $request, cour $cour)
    {
        $message = "";
        $message_type = "";
        $request->validate([
            'type_cour' => 'required',
            'lib_cour' => 'required'
        ]);

        $cour->type_cour = $request->type_cour;
        $cour->lib_cour = $request->lib_cour;

        $cour->update();
        $resultat = $cour->update();
        if($resultat == true){
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        }else{
            // message d'echec
        }
        return redirect()->route('cour')->with($message_type, $message);
    }

    public function destroy(cour $cour)
    {
        //$cour->apprenants()->delete();
        $cour->delete();
        
        return redirect()->route('cour');
    }
}
