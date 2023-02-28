<?php

namespace App\Http\Controllers;

use App\Models\Depence;
use App\Models\session;
use App\Models\moniteur;
use App\Models\apprenant;
use Illuminate\Http\Request;

class EtatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moniteur()
    {
        $moniteurs = moniteur::all();
        return view('etat_moniteur', compact('moniteurs'));
    }
    public function session()
    {
        $sessions = session::all();
        return view('etat_session', compact('sessions'));
    }
    public function apprenant()
    {
        $apprenants = apprenant::all();
        return view('etat_apprenant', compact('apprenants'));
    }
    public function depense()
    {
        $depenses = Depence::all();
        return view('etat_depense', compact('depenses'));
    }
    
}
