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
}
