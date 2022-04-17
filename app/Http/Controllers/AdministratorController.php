<?php

namespace App\Http\Controllers;

use App\Http\Requests\Administrator\AdministratorRequest;
use App\Http\Requests\Administrator\UpdateAdministratorRequest;
use App\Mail\prova;
use App\Models\Administrator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdministratorController extends Controller
{
    public function index()
    {
        $io = Auth::guard('admin')->user();
        return response()
            ->view('admin.administrator-index', [
                'administrators' => Administrator::query()->where('id', '!=', $io->id)->where('big_boss', '==', false)->get(),
            ]);
    }

    public function create()
    {
        return response()
            ->view('admin.ContentManager.administrator-form');
    }

    public function store(AdministratorRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $administrator = new Administrator($validated);
        $administrator->save();

        // TODO: implementare mail registrazione utente
        Mail::to('mila.muhianov@gmail.com')->send(new prova());

        return response()->redirectToRoute('admin.administrator.index');
    }

    public function edit(Administrator $administrator)
    {
        return response()->view('admin.ContentManager.administrator-form', [
            'administrator' => $administrator,
        ]);
    }

    public function update(UpdateAdministratorRequest $request, Administrator $administrator)
    {
        $validated = $request->validated();
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            $validated['password'] = $administrator->password;
        }
        $administrator->update($validated);

        return response()->redirectToRoute('admin.administrator.index');
    }

    public function destroy(Administrator $administrator, Request $request)
    {
        $administrator->delete();
        return response()->redirectToRoute('admin.administrator.index');
    }
}
