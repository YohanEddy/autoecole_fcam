<?php

namespace App\Http\Controllers;

use App\Models\session;
use App\Models\inscrire;
use App\Models\apprenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class ApprenantController extends Controller
{
    //

    public function inscription1()
    {
        $progress = 1;
        $inscrires = inscrire::all();
        $apprenants = apprenant::all();
        $sessions = session::all();
        return view('inscription1', compact('inscrires','sessions','progress','apprenants'));
    }

    public function create()
    {
        return view('inscription');
    }

    public function edit(inscrire $inscrire)
    {
        $inscrires = inscrire::all();
        $sessions = session::all();
        $apprenant = $inscrire->apprenant;
        return view('inscription1', compact("inscrires","sessions","apprenant", "inscrire"));
    }

    //public const inscription = '/form';

    public function store(Request $request)
    {
        $request->validate([
            'nameapp' => 'required',
            'prenomapp' => 'required',
            'sexe' => 'required',
            'datenaiss' => 'required',
            'profession' => 'required',
            'lieunaiss' => 'required',
            'domicile' => 'required',
            'nationalite' => 'required',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:12',
            //'email' => 'required|email',
            //'attentes' => 'required',
            //'cnxance_centre' => 'required',
            'date_inscrip' => 'required',
            'periode' => 'required',
            'modalite' => 'required',
            'session_id' => 'required|exists:sessions,id',
        ]);

        /**
         * @var \App\Models\apprenant
         */
        $apprenant = apprenant::create($request->all());

        inscrire::create([
            ...$request->all(),
            'apprenant_id' => $apprenant->id,
        ]);

        return redirect()->route('inscription')->with('success', 'Enregistrement éffectué avec succes');

    }

    public function show(apprenant $apprenant)
    {
        return view('apprenant.show', compact($apprenant));
    }

    /* public function update(Request $request, inscrire $inscrire)
    {
        dd($inscrire);
        $message = "";
        $message_type = "";
        $request->validate([
            'nameapp' => 'required',
            'prenomapp' => 'required',
            'sexe' => 'required',
            'datenaiss' => 'required',
            'profession' => 'required',
            'lieunaiss' => 'required',
            'domicile' => 'required',
            'nationalite' => 'required',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            //'email' => 'required|email',
            //'attentes' => 'required',
            //'cnxance_centre' => 'required',
            'date_inscrip' => 'required',
            'periode' => 'required',
            'modalite' => 'required'
        ]);
        // $inscrire->apprenant->nameapp = $request->nameapp;
        // $inscrire->apprenant->prenomapp = $request->prenomapp;
        // $inscrire->apprenant->sexe = $request->sexe;
        // $inscrire->apprenant->datenaiss = $request->datenaiss;
        // $inscrire->apprenant->profession = $request->profession;
        // $inscrire->apprenant->lieunaiss = $request->lieunaiss;
        // $inscrire->apprenant->domicile = $request->domicile;
        // $inscrire->apprenant->nationalite = $request->nationalite;
        // $inscrire->apprenant->telephone = $request->telephone;
        // $inscrire->apprenant->email = $request->email;
        // $inscrire->apprenant->attentes = $request->attentes;
        // $inscrire->apprenant->cnxance_centre = $request->cnxance_centre;
        // $inscrire->apprenant->date_inscrip = $request->date_inscrip;
        $inscrire->apprenant->update($request->all());

        // $inscrire->periode = $request->periode;
        // $inscrire->modalite = $request->modalite;
        // $inscrire->type_formation = $request->type_formation;
        // $inscrire->session_id = $request->session;
        $resultat2 = $inscrire->update($request->all());

        // $inscrire->apprenant->update();
        //  = $inscrire->update();
        if($resultat2 == true)
        {
            $message_type = 'success';
            $message = "Operation effectuer avec succès";
        }else{}
        return redirect()->route('inscription')->with($message_type, $message);
    } */
    // Assurez-vous que le chemin vers votre modèle est correct

public function update(Request $request, $id)
{
    //dd($id);
    $message = "";
    $message_type = "";
    $request->validate([
        // Vos règles de validation ici
        'nameapp' => 'required',
        'prenomapp' => 'required',
        'sexe' => 'required',
        'datenaiss' => 'required',
        'profession' => 'required',
        'lieunaiss' => 'required',
        'domicile' => 'required',
        'nationalite' => 'required',
        'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
        //'email' => 'required|email',
        //'attentes' => 'required',
        //'cnxance_centre' => 'required',
        'date_inscrip' => 'required',
        'periode' => 'required',
        'modalite' => 'required'
    ]);

    try {
        $inscrire = Inscrire::findOrFail($id); // Récupère l'objet ou lance une exception si non trouvé
        $inscrire->apprenant->update($request->all());
        $message_type = 'success';
        $message = "Opération effectuée avec succès";
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        $message_type = 'error';
        $message = "Enregistrement non trouvé";
    }

    return redirect()->route('list_ins')->with($message_type, $message);
}

    public function destroy(inscrire $inscrire)
    {
        //$inscrire->apprenant->participer->delete();
        //$inscrire->session->delete();
        $inscrire->apprenant->delete();

        return redirect()->route('list_ins');
    }
}
