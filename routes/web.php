<?php

use App\Models\Event;
use App\Models\Film;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
        return view('home', [
            'days' => Event::with('film')
                ->where('date','>=', today())
                ->orderBy('date')->orderBy('time')->get()
                ->groupBy('date')->slice(0,5),
        ]);
});
