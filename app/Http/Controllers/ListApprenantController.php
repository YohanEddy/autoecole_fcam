<?php

namespace App\Http\Controllers;

use App\Models\inscrire;
use App\Models\apprenant;
use Illuminate\Http\Request;

class ListApprenantController extends Controller
{
    //
    public function liste_apprenant()
    {
        $apprenants = apprenant::all();
        $inscrires = inscrire::all();
        return view('list_apprenant', compact('inscrires', 'apprenants'));
    }
}
