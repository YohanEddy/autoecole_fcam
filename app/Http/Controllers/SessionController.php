<?php

namespace App\Http\Controllers;

use App\Models\session;
use Illuminate\Http\Request;


class SessionController extends Controller
{
    //
    public function session()
    {
        $sessions = session::all();
        return view('session', compact('sessions'));
    }

    public const session = '/sessions';

    public function store(Request $request)
    {
        $session = new Session;
        $session->intitule = $request->intitule;
        $session->type_permis = $request->type_permis;

        $session->save();

        return redirect()->route('session');
    }

    public function edit(session $id)
    {
        $sessions = session::find($id);
        return view('session_edit', compact("id", "sessions"));
    }

    public function destroy(session $session)
    {
        $session->apprenants()->delete();
        $session->delete();
        
        return redirect()->route('session');
    }
}
