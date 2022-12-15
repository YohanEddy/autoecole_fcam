<?php

namespace App\Http\Controllers;

use App\Models\session;
use Illuminate\Http\Request;


class SessionController extends Controller
{
    //
    public function session()
    {
        //$session = session::all();
        $sessions = session::all();
        return view('session', compact('sessions', 'session'));
    }

    //public const session = '/sessions';

    public function store(Request $request)
    {
        $session = new Session;
        $session->intitule = $request->intitule;
        $session->type_permis = $request->type_permis;

        $session->save();

        return redirect()->route('session');
    }

    public function edit(session $session)
    {
        
        //$session = session::findOrFail($session);
        $sessions = session::all();
        return view('session', compact( "sessions" ));
    }

    public function update(Request $request, session $session)
    {
        $message = "";
        $message_type = "";
        $request->validate([
            'intitule' => 'required'
        ]);

        $session->type_permis = $request->type_permis;
        $session->intitule = $request->intitule;

        $resultat = $session->update();
        if($resultat == true){
            $message_type = 'success';
            $message = "Operation effectuer avec succès.";
        }else{
            // message d'echec
        }
        return redirect()->route('session')->with($message_type, $message);
    }

    public function destroy(session $session)
    {
        $session->apprenants()->delete();
        $session->delete();
        
        return redirect()->route('session');
    }
}
