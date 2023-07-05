<?php

namespace App\Http\Controllers;

use App\Models\inscrire;
use App\Models\paiement;
use App\Models\apprenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaiementController extends Controller
{
    
    public function paiement()
    {
        $paiements = paiement::all();
        $inscrires = inscrire::all();
        $result = DB::select("SELECT paiements.apprenant_id, paiements.montant_du, sum(montant) AS totalPaye, apprenants.* 
                            FROM paiements, apprenants 
                            WHERE paiements.apprenant_id=apprenants.id 
                            GROUP BY paiements.apprenant_id, paiements.montant_du");
        // dd($result);
        return view('paiement', compact('paiements','inscrires', 'result'));
    }

    public function store(Request $request)
    {
        $inscription = inscrire::where('apprenant_id', $request->apprenant_id)->first();
        $result = DB::select('SELECT paiements.apprenant_id, sum(montant) AS totalPaye, apprenants.* FROM paiements, apprenants WHERE paiements.apprenant_id=apprenants.id GROUP BY paiements.apprenant_id');
        // dd($result);
        $montant_du = 0;
        if($inscription->type_formation == "A"){
            $montant_du = 135000;
        }elseif($inscription->type_formation == "B"){
            $montant_du = 12000;
        }elseif($inscription->type_formation == "C"){
            $montant_du = 95000;
        }elseif($inscription->type_formation == "D"){
            $montant_du = 55000;
        }
        $paiement = new paiement;
        $paiement->datepaiement = $request->datepaiement;
        $paiement->montant = $request->montant;
        $paiement->montant_du = $montant_du;
        $paiement->apprenant_id = $request->apprenant_id;

        $paiement->save();

        return redirect()->route('paiement')->with('success','Enregistrement éffectuer avec succès');
    }

    public function edit(paiement $paiement)
    {
        $paiements = paiement::all();
        return view('paiement', compact("paiements", "paiement"));
    }

    public function show($id){
        $paiements = paiement::where('apprenant_id', $id)->get();
        return view('paiement-detail', compact('paiements'));
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
