<?php

namespace App\Http\Controllers;

use App\Models\moniteur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

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
            'matricule'         => 'required|unique:moniteurs',
            'nom_moniteur'      => 'required',
            'prenom_moniteur'   => 'required',
            'sexe'              => 'required',
            'date_naiss'        => 'required',
            'lieunaiss'         => 'required',
            'domicile_moniteur' => 'required',
            'nationalite'       => 'required',
            'email'             => 'required|email',
            'telephone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8'
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
        $rules = [
            'matricule'         => 'required|unique:moniteurs',
            'nom_moniteur'      => 'required',
            'prenom_moniteur'   => 'required',
            'sexe'              => 'required',
            'date_naiss'        => 'required',
            'lieunaiss'         => 'required',
            'domicile_moniteur' => 'required',
            'nationalite'       => 'required',
            'email'             => 'required|email',
            'telephone'         => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8'
        ];
        $messages = [
            'matricule.required'        => 'Le matricule est requis.',
            'matricule.unique'          => 'Le nupmero de matricule existe déjà.',
            'nom_moniteur.required'     => 'Le nom du moniteur est requis.',
            'prenom_moniteur.required'  => 'Le prénom du moniteur est requis.',
            'sexe.required'             => 'Le sexe est requis.',
            'date_naiss.required'       => 'La date de naissance est requis.',
            'lieunaiss.required'        => 'Le lieu de naissance est requis.',
            'domicile_moniteur.required'    => 'L\'adresse du domicile est requis.',
            'nationalite.required'          => 'La nationalité est requis.',
            'email.required'                => 'L\'adresse email est requis.',
            'email.email'                   => 'L\'adresse email est incorrect.',
            'telephone.required'            => 'Le numero de téléphone est requis.',
            'telephone.regex'               => 'Le numéro de téléphone doit être composer uniquement de chiffre.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            dd($message);

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
            return redirect('moniteur')->with($message_type, $message);
        }
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
