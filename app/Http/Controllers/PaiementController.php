<?php

namespace App\Http\Controllers;

use App\Models\paiement;
use App\Models\apprenant;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    
    public function paiement()
    {
        $paiements = paiement::all();
        $apprenants = apprenant::all();
        return view('paiement', compact('paiements','apprenants'));
    }

    public function store(Request $request)
    {
        $paiement = new paiement;
        $paiement->datepaiement = $request->datepaiement;
        $paiement->montant = $request->montant;
        $paiement->apprenant_id = $request->apprenant_id;

        $paiement->save();

        return redirect()->route('paiement');
    }

    public function edit(paiement $paiement)
    {
        $paiements = paiement::all();
        return view('paiement', compact("paiements", "paiement"));
    }

    public function update(Request $request, paiement $paiement)
    {
        $message = "";
        $message_type = "";
        $request->validate([
            'montant' => 'required'
        ]);

        $paiement->apprenant_id = $request->apprenant_id;
        $paiement->datepaiement = $request->datepaiement;
        $paiement->montant = $request->montant;

        $paiement->update();
        $resultat = $paiement->update();
        if($resultat == true){
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        }else{
            // message d'echec
        }
        return redirect()->route('paiement')->with($message_type, $message);
    }

    public function destroy(paiement $paiement)
    {
        //$paiement->apprenants()->delete();
        $paiement->delete();
        
        return redirect()->route('paiement');
    }
}
