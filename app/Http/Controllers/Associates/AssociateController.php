<?php

namespace App\Http\Controllers\Associates;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AssociateController extends Controller
{
    public function index() {
        $query = User::select('*');
        if (request('search')) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }
        return response()->view('admin.Associates.table-pending-associates', [
            'users' => $query
                ->orderByRaw('accepted IS NULL DESC')
                ->orderBy('accepted','DESC')
                ->orderBy('associated_at')->get(),
        ]);
    }

    public function create() {
        return response()->view('admin.Associates.soci-form');
    }

    public function store() {

    }

    public function ajaxSearch() {
        dd(request());
    }
}
