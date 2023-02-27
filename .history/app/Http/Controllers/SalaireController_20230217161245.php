<?php

namespace App\Http\Controllers;


use App\Models\fichesalaire;
use Illuminate\Http\Request;

class SalaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fichesalaire');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fichesalaire');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fichesalaire = new fichesalaire;
        $fichesalaire->date_paiement = $request->date_paiement;
        $fichesalaire->sal_net = $request->sal_net;
        $fichesalaire->moniteur_id = $request->moniteur_id;

        $fichesalaire->save();

        return redirect()->route('fichesalaire');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\fichesalaire  $fichesalaire
     * @return \Illuminate\Http\Response
     */
    public function show(fichesalaire $fichesalaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\fichesalaire  $fichesalaire
     * @return \Illuminate\Http\Response
     */
    public function edit(fichesalaire $fichesalaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\fichesalaire  $fichesalaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, fichesalaire $fichesalaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\fichesalaire  $fichesalaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(fichesalaire $fichesalaire)
    {
        $fichesalaire->delete();

        return redirect()->route('fichesalaire');
    }
}
