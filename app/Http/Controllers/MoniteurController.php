<?php

namespace App\Http\Controllers;

use App\Models\moniteur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;

class MoniteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moniteurs = moniteur::all();
        return view('moniteur', compact('moniteurs'));
    }
    public const moniteur = '/moniteur';
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('moniteur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $moniteur = new Moniteur;
        $moniteur->nom_moniteur = $request->nom_moniteur;
        $moniteur->prenom_moniteur = $request->prenom_moniteur;
        $moniteur->sexe = $request->sexe;
        $moniteur->date_naiss = $request->date_naiss;
        $moniteur->lieunaiss = $request->lieunaiss;
        $moniteur->domicile_moniteur = $request->domicile_moniteur;
        $moniteur->telephone = $request->telephone;
        $moniteur->nationalite = $request->nationalite;
        $moniteur->email = $request->email;
        
        $moniteur->save();
        
        return redirect()->route('moniteur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\moniteur  $moniteur
     * @return \Illuminate\Http\Response
     */
    public function show(moniteur $moniteur)
    {
        return view('moniteur.show', compact($moniteur));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\moniteur  $moniteur
     * @return \Illuminate\Http\Response
     */
    public function edit(moniteur $moniteur)
    {
        $moniteurs = moniteur::all();
        //$moniteur = moniteur::where('id', $moniteur)->first();
        return view('moniteur', compact("moniteur", "moniteurs"));
        //return view('moniteur.create');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\moniteur  $moniteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, moniteur $moniteur)
    {
        $moniteur->update([
            "nom_moniteur" => $request->nom_moniteur,
            "prenom_moniteur" => $request->prenom_moniteur,
            "sexe" => $request->sexe,
            "date_naiss" => $request->date_naiss,
            "lieunaiss" => $request->lieunaiss,
            "domicile_moniteur" => $request->domicile_moniteur,
            "telephone" => $request->telephone,
            "nationalite" => $request->nationalite,
            "email" => $request->email,
        ]);
        
        $moniteur->nom_moniteur = $request->nom_moniteur;
        $moniteur->prenom_moniteur = $request->prenom_moniteur;
        $moniteur->sexe = $request->sexe;
        $moniteur->date_naiss = $request->date_naiss;
        $moniteur->lieunaiss = $request->lieunaiss;
        $moniteur->domicile_moniteur = $request->domicile_moniteur;
        $moniteur->telephone = $request->telephone;
        $moniteur->nationalite = $request->nationalite;
        $moniteur->email = $request->email;

        $moniteur->update();
        return redirect()->route('moniteur');
    }
    /*public function update(Request $request): Response
    {
        $moniteur = Moniteur::find($request->id);
        return response($moniteur);
        return redirect()->route('moniteur');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\moniteur  $moniteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(moniteur $moniteur)
    {
        $moniteur->delete();

        return redirect()->route('moniteur');
    }
}
