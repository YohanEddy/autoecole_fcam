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
        $sessions = session::all();
        return view('inscription1', compact('sessions'));
    }
    
    public function edit(apprenant $apprenant)
    {
        $sessions = session::all();
        $apprenants = apprenant::all();
        return view('inscription1', compact("apprenants", "sessions"));
    }

    public const inscription = '/form';

    public function store(Request $request)
    {

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

        $inscrire = new inscrire;
        $inscrire->periode = $request->periode;
        $inscrire->modalite = $request->modalite;
        $inscrire->session_id = $request->session;
        
        $apr = DB::table('apprenants')->latest()->first('id');
        $inscrire->apprenant_id = ($apr->id + 1);
        
        $apprenant->save();
        $inscrire->save();
        return redirect()->route('inscription');
        
    } 

    public function destroy(apprenant $apprenant) 
    {
        $apprenant->participer()->delete();
        $apprenant->sessions()->delete();
        $apprenant->delete();

        return redirect()->route('inscription');
    }
}
