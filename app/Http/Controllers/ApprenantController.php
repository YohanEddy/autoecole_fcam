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
        $inscrires = inscrire::all();
        $sessions = session::all();
        return view('inscription1', compact('inscrires','sessions'));
    }

    public function create()
    {
        return view('inscription');
    }
    
    public function edit(inscrire $inscrire)
    {
        $inscrires = inscrire::all();
        $sessions = session::all();
        //$apprenants = apprenant::all();
        return view('inscription1', compact("inscrires","sessions"));
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
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8',
            'email' => 'required|email',
            'attentes' => 'required',
            'cnxance_centre' => 'required',
            'date_inscrip' => 'required',
            'periode' => 'required',
            'modalite' => 'required'
        ]);

        $apprenant = new apprenant;
        $apprenant->nameapp = $request->nameapp;
        $apprenant->prenomapp = $request->prenomapp;
        $apprenant->sexe = $request->sexe;
        $apprenant->datenaiss = $request->datenaiss;
        $apprenant->profession = $request->profession;
        $apprenant->lieunaiss = $request->lieunaiss;
        $apprenant->domicile = $request->domicile;
        $apprenant->nationalite = $request->nationalite;
        $apprenant->telephone = $request->telephone;
        $apprenant->email = $request->email;
        $apprenant->attentes = $request->attentes;
        $apprenant->cnxance_centre = $request->cnxance_centre;
        $apprenant->date_inscrip = $request->date_inscrip;
        $apprenant->save();

        $inscrire = new inscrire;
        $inscrire->periode = $request->periode;
        $inscrire->modalite = $request->modalite;
        $inscrire->type_formation = $request->type_formation;
        $inscrire->session_id = $request->session;
        $apr = DB::table('apprenants')->latest()->first('id');
        
        $inscrire->apprenant_id = ($apr==null) ? 0 : ($apr->id);
        
        $inscrire->save();
        //print_r($apprenant);
        return redirect()->route('inscription');
        
    } 

    public function show(apprenant $apprenant)
    {
        return view('apprenant.show', compact($apprenant));
    }

    public function update(Request $request, inscrire $inscrire)
    {
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
            'email' => 'required|email',
            'attentes' => 'required',
            'cnxance_centre' => 'required',
            'date_inscrip' => 'required',
            'periode' => 'required',
            'modalite' => 'required'
        ]);
        $inscrire->apprenant->nameapp = $request->nameapp;
        $inscrire->apprenant->prenomapp = $request->prenomapp;
        $inscrire->apprenant->sexe = $request->sexe;
        $inscrire->apprenant->datenaiss = $request->datenaiss;
        $inscrire->apprenant->profession = $request->profession;
        $inscrire->apprenant->lieunaiss = $request->lieunaiss;
        $inscrire->apprenant->domicile = $request->domicile;
        $inscrire->apprenant->nationalite = $request->nationalite;
        $inscrire->apprenant->telephone = $request->telephone;
        $inscrire->apprenant->email = $request->email;
        $inscrire->apprenant->attentes = $request->attentes;
        $inscrire->apprenant->cnxance_centre = $request->cnxance_centre;
        $inscrire->apprenant->date_inscrip = $request->date_inscrip;

        $inscrire->periode = $request->periode;
        $inscrire->modalite = $request->modalite;
        $inscrire->type_formation = $request->type_formation;
        $inscrire->session_id = $request->session;

        $inscrire->apprenant->update();
        $resultat2 = $inscrire->update();
        if($resultat2 == true)
        {
            $message_type = 'success';
            $message = "Operation effectuer avec succès";
        }else{}
        return redirect()->route('inscription')->with($message_type, $message);
    }

    public function destroy(inscrire $inscrire) 
    {
        //$inscrire->apprenant->participer->delete();
        $inscrire->session->delete();
        $inscrire->apprenant->delete();

        return redirect()->route('inscription');
    }
}
