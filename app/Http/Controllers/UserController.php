<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;

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
            'cf' => 'required|string|size:16',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'cap' => 'required|numeric',
            'email' => 'required|email|unique:users,email|max:255',
        ]);

        $user = User::create($validated);
        event(new Registered($user));
        return view('auth.soci-conferma', [
            //TODO: RENDERLO NON INDICIZZABILE
            'mail' => $user->email,
            'title' => 'Conferma invio modulo | Apollo11'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
