<?php

namespace App\Http\Controllers;

use App\Models\inscrire;
use App\Models\paiement;
use App\Models\apprenant;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    
    public function paiement()
    {
        $paiements = paiement::all();
        $inscrires = inscrire::all();
        return view('paiement', compact('paiements','inscrires'));
    }

    public function store(Request $request)
    {
        $val = $request->apprenant_id;
        $tbl = explode("-",$val);
        $montant_du = 0;
        if($tbl[1] == "A"){
            $montant_du = 135000;
        }elseif($tbl[1] == "B"){
            $montant_du = 95000;
        }elseif($tbl[1] == "C"){
            $montant_du = 120000;
        }
        $paiement = new paiement;
        $paiement->datepaiement = $request->datepaiement;
        $paiement->montant = $request->montant;
        $paiement->montant_du = $montant_du;
        $paiement->apprenant_id = $tbl[0];

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
