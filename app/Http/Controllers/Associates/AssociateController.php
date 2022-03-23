<?php

namespace App\Http\Controllers\Associates;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AssociateController extends Controller
{
    public function index() {
        return response()->view('admin.Associates.table-pending-associates', [
            'users' => User::select('*')
                ->orderByRaw('accepted IS NULL DESC')
                ->orderBy('accepted','DESC')
                ->orderBy('associate')->get(),
        ]);
    }
}
