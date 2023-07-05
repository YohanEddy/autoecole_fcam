<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\moniteur;
use App\Models\apprenant;
use App\Models\Depence;
use App\Models\participer;

class PostController extends Controller
{


    public function first()
    {
    return view('first');
    }

    public function index()
    {
        $moisEnCours = Carbon::now()->month;
        $dateDuJour = date('Y-m-d');
        $nombre_client = apprenant::count();
        $nombre_moniteur = moniteur::count();
        $depence = Depence::whereMonth('date_depence', $moisEnCours)->get();
        $participers = participer::whereDate('date_cour', $dateDuJour)->get();
        $sommeMontants = $depence->sum('montant');
        return view('index', compact('nombre_client','nombre_moniteur','dateDuJour','participers','depence','sommeMontants'));
    }

    public function authentification()
    {
        return view('authentification');
    }

    public function sample_page()
    {
        return view('sapmle_page');
    }

}