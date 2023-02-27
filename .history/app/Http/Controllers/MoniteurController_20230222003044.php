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
        // dd($moniteurs);
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
        $request->validate([
            'matricule' => 'required|unique:moniteurs',
            'nom_moniteur' => 'required',
            'prenom_moniteur' => 'required',
            'sexe' => 'required',
            'date_naiss' => 'required',
            'lieunaiss' => 'required',
            'domicile_moniteur' => 'required',
            'nationalite' => 'required',
            'email' => 'required|email',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8'
        ]);
        $moniteur = new Moniteur;
        $moniteur->matricule = $request->matricule;
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

        return redirect()->back()->with('message', 'success');
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
        $message = "";
        $message_type = "";
        $request->validate([
            'matricule' => 'required|unique:moniteurs',
            'nom_moniteur' => 'required',
            'prenom_moniteur' => 'required',
            'sexe' => 'required',
            'date_naiss' => 'required',
            'lieunaiss' => 'required',
            'domicile_moniteur' => 'required',
            'nationalite' => 'required',
            'email' => 'required|email|unique:moniteurs',
            'telephone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8'
        ]);
        // if($validator->fails()){
        //     return redirect()->route('moniteur')->withErrors($validator)->withInput();
        // }
        $moniteur->nom_moniteur = $request->nom_moniteur;
        $moniteur->prenom_moniteur = $request->prenom_moniteur;
        $moniteur->sexe = $request->sexe;
        $moniteur->date_naiss = $request->date_naiss;
        $moniteur->lieunaiss = $request->lieunaiss;
        $moniteur->domicile_moniteur = $request->domicile_moniteur;
        $moniteur->telephone = $request->telephone;
        $moniteur->nationalite = $request->nationalite;
        $moniteur->email = $request->email;

        $resultat = $moniteur->update();
        if ($resultat == true) {
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        } else {
            // message d'echec
        }
        return redirect()->back()->with($message_type, $message);
    }


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
