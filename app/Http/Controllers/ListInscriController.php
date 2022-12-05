<?php

namespace App\Http\Controllers;

use App\Models\apprenant;
use Illuminate\Http\Request;

class ListInscriController extends Controller
{
    //
    public function liste_inscrit()
    {
        $apprenants = apprenant::all();
        return view('liste_inscrit', compact('apprenants'));
    }
}
