<?php

namespace App\Http\Controllers;

use App\Mail\prova;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Mail;

class UserController extends Controller
{
    public function index()
    {
        return view('soci-info', [
            'title' => 'Soci/Tessere Info - Apollo 11',
        ]);
    }

    public function create()
    {
        return view('auth.modulo-soci', [
            'title' => 'Modulo Soci | Apollo11',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'birthday' => 'required|date',
            'birth_place' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'cap' => 'required|numeric',
            'email' => 'required|email|unique:users,email|confirmed|max:255',
        ]);

        $user = User::create($validated);

        //Mail::mailer('no-reply')->to($user->email)->send(new prova());

        return view('auth.soci-conferma', [
            //TODO: RENDERLO NON INDICIZZABILE
            'mail' => $user->email,
            'title' => 'Conferma invio modulo | Apollo11'
        ]);
    }

    
}
