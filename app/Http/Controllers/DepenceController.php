<?php

namespace App\Http\Controllers;

use App\Models\Depence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;


class DepenceController extends Controller
{
    public function depences()
    {
        $depences = Depence::all();
        return view('depences' , compact('depences'));
    }

    public const depence = '/depence';

    public function store(Request $request)
    {
        $depence = new Depence;
        $depence->libelle = $request->libelle;
        $depence->montant = $request->montant;
        $depence->date_depence = $request->date_depence;
        $depence->user_id = Auth::id();

        $depence->save();

        return redirect()->route('depence');
    }
}

