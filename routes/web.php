<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\Associates\AssociateController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FestivalController;
use App\Mail\prova;
use App\Models\Event;
use App\Models\Festival;
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


//------------- PUBLIC ROUTES -----------------

Route::get('/', function () {
    return view('home', [
        'title' => 'Apollo 11 - Programmazione',
        'days' => Event::with('film','festival')
            ->where('date','>=', today())
            ->orderBy('date')->orderBy('time')->get()
            ->groupBy('date')->slice(0,5),
    ]);
})->name('home_page');

Route::get('/film/{title}/{event}', function ($title, Event $event) {
    $festival = $event->festival;
    $film = $event->film()->get()->first();
    return view('event-info', [
        'title' => "{$film->title} Date e Orari - Apollo 11",
        'event' => $event,
        'film' => $film,
        'rassegna' => $festival,
        'other_dates' => $film->events()
            ->select('date','time', 'id')
            ->where('date','>=',today())
            ->orderBy('date')->orderBy('time')
            ->get()->groupBy('date'),
    ]);
})->whereNumber('event')->name('film.info');

/*
Route::get('/rassegne', function () {
    return view('rassegne-index', [
        'title' => "Rassegne - Apollo 11",
        'rassegne' => Festival::paginate(),
    ]);
})->name('rassegne.index');
*/

Route::get('/rassegne/{name}/{festival}', function ($name, Festival $festival){
    $events = $festival->events()
        ->where('date','>=',today())
        ->orderBy('date')
        ->orderBy('time')->get();
    return view('rassegne-show', [
        'title' => "{$festival->name} - Apollo 11",
        'rassegna' => $festival,
        'events' => $events,
    ]);
})->name('rassegne.show');

Route::get('/chi-siamo', function() {
   return view('chi-siamo', [
       'title' => 'Chi siamo - Apollo 11',
   ]);
})->name('chi-siamo');

Route::get('/contatti', function() {
    return view('contatti', [
        'title' => 'Contatti - Apollo 11',
    ]);
})->name('contatti');

Route::get('/soci/info', [UserController::class, 'index'])->name('soci.info');

// TODO: RIATTIVARE QUESTE ROUTE
//Route::get('/soci/modulo', [UserController::class, 'create']);

//Route::post('/soci/store', [UserController::class, 'store']);

// TODO: ELIMINARE
/* PROVA INVIO MAIL
Route::get('/mail/prova', function () {
    Mail::to('pollo@argentino.com')->send(new prova());
});
*/

/*
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->name('verification.verify');
*/

//----------- ADMIN ROUTES -------------------

Route::middleware('auth:admin')->prefix('/admin')->name('admin.')->group(function () {

    Route::get('/login', [AdminController::class, 'loginForm'])->name('login.form')->withoutMiddleware('auth:admin')->middleware('guest:admin');

    Route::post('/login', [AdminController::class, 'login'])->name('login')->withoutMiddleware('auth:admin')->middleware('guest:admin');

    Route::get('/', function () { return redirect('/admin/film');});

    //Route::get('/soci', [AssociateController::class, 'index'])->name('soci.index');

    //Route::get('/soci/search', [AssociateController::class, 'search'])->name('soci.search');

    //Route::get('/booking', [BookingController::class, 'index'])->name('booking.index');

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/logout', [ProfileController::class, 'logOut'])->name('profile.logout');

    Route::resource('administrator', AdministratorController::class)->middleware('isBigBoss');

    Route::resource('rassegne', FestivalController::class);

    //TODO ELEMINATE USELESS ROUTE
    Route::resource('film', FilmController::class);

    Route::resource('film.events', EventController::class);
});

