<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginForm() {
        return response()->view('admin.login');
    }

    /**
     * Log the user in.
     *
     *
     */
    public function login() {
        $validated = request()->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->guard('admin')->attempt($validated)) {
            session()->regenerate();

            return redirect()->route('admin.film.index');
        }

        return back()->withErrors(['login' => 'Non è stato possibile verificare le tue credenziali']);
    }
}
