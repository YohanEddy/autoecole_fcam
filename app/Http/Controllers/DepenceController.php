<?php

namespace App\Http\Controllers;

use App\Models\Depence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;


class DepenceController extends Controller
{
    public function depences()
    {
        $depences = Depence::all();
        return view('depences', compact('depences'));
    }

    public const depence = '/depence';

    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric',
        ],
        [
            'montant.required' => 'Le champ montant est requis.',
            'montant.numeric' => 'Le champ montant doit contenir un nombre.',
        ]

        );
    
        $depence = new Depence();
        $depence->libelle = $request->libelle;
        $depence->montant = $request->montant;
        $depence->date_depence = $request->date_depence;
        $depence->user_id = Auth::id();

        $depence->save();

        return redirect()->route('depence')->with('success','Enregistrement éffectuer avec succès');
    }

    public function edit(depence $depence)
    {
        $depences = depence::all();
        return view('depences', compact("depences", "depence"));
    }

    public function update(Request $request, depence $depence)
    {
        $message = "";
        $message_type = "";
        $request->validate([
            'montant' => 'required',
            'libelle' => 'required',
            'date_depence' => 'required',
        ]);

        $depence->libelle = $request->libelle;
        $depence->montant = $request->montant;
        $depence->date_depence = $request->date_depence;
        $depence->user_id = Auth::id();

        $depence->update();
        $resultat = $depence->update();
        if($resultat == true){
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        }else{
            // message d'echec
        }
        return redirect()->route('depence')->with($message_type, $message);
    }

    public function destroy($id)
    {

        $depence = depence::find($id);
        $depence->users()->delete();
        if($depence->delete()){
            return response()->json([
                'status' => 200,
                'message'=> "success",
            ]);
        }
        
        // return redirect()->route('session');
        return response()->json([
            'message'=> "error",
        ]);
    }
}