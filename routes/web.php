<?php

use App\Http\Controllers\Associates\AssociateController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Mail\prova;
use App\Models\Event;
use App\Models\Film;
use App\Http\Requests\User\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;

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
        'title' => 'Apollo 11',
        'days' => Event::with('film')
            ->where('date','>=', today())
            ->orderBy('date')->orderBy('time')->get()
            ->groupBy('date')->slice(0,5),
    ]);
})->name('home_page');

Route::get('/film/{title}/{event}', function ($title, Event $event) {
    $film = $event->film()->get()->first();
    return view('event-info', [
        'title' => "{$film->title} Date e Orari - Apollo 11",
        'event' => $event,
        'film' => $film,
        'other_dates' => $film->events()
            ->select('date','time', 'id')
            ->where('date','>=',today())
            ->orderBy('date')->orderBy('time')
            ->get()->groupBy('date'),
    ]);
})->whereNumber('event')->name('film.info');

Route::get('/soci/info', [UserController::class, 'index']);

Route::get('/soci/modulo', [UserController::class, 'create']);

Route::post('/soci/store', [UserController::class, 'store']);

Route::get('/mail/prova', function () {
    Mail::to('pollo@argentino.com')->send(new prova());
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->name('verification.verify');


Route::prefix('/admin')->group(function () {

    Route::get('/soci', [AssociateController::class, 'index']);

    Route::get('/soci/search', [AssociateController::class, 'search']);

    Route::get('/booking', [BookingController::class, 'index']);

    //TODO ELEMINATE USELESS ROUTE
    Route::resource('film', FilmController::class);

    Route::resource('film.events', EventController::class);
});

