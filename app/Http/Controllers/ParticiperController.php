<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;
use App\Models\participer;
use Illuminate\Http\Request;

class ParticiperController extends Controller
{
    public function participer()
    {
        $par = participer::all();
        $apprenants = apprenant::all();
        $cours = cour::all();
        $sesions = session::all();
        return view('participer', compact('apprenants','cours','sesions','par'));
    }

    public const participer = '/participers';

    public function store(Request $request)
    {


        $participer = new participer;
        $participer->date_cour = $request->date_cour;
        $participer->session_id = $request->session_id;
        $participer->apprenant_id = $request->apprenant_id;
        $participer->cour_id = $request-> cour_id;


        $participer->save();

        return redirect()->route('participer');
    }
}
