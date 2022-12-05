<?php

namespace App\Http\Controllers;

use App\Models\cour;
use App\Models\session;
use App\Models\apprenant;

use Illuminate\Http\Request;


class CourController extends Controller
{
    public function pgr_cour()
    {
        $cours = cour::all();
        return view('pgr_cour', compact('cours'));
    }

    public const cour = '/programmer_cours';

    public function store(Request $request)
    {
        $cour = new cour;
        $cour->lib_cour = $request->lib_cour;
        $cour->type_cour = $request->type_cour;

        $cour->save();
        

        return redirect()->route('pgr-cour');
    }
}
