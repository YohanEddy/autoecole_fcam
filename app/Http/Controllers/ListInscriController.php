<?php

namespace App\Http\Controllers;

use App\Models\inscrire;
use App\Models\apprenant;
use Illuminate\Http\Request;

class ListInscriController extends Controller
{
    //
    public function liste_inscrit()
    {
        $inscrires = inscrire::all();
        return view('liste_inscrit', compact('inscrires'));
    }
}
