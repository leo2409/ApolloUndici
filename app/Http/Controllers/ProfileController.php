<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show() {
        return response()->view('admin.profile-show', [
            'io' => Auth::guard('admin')->user()
        ]);
    }

    public function logOut() {
        Auth::guard('admin')->logout();
        return response()->redirectToRoute('admin.login.form');
    }
}
