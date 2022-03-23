<?php

namespace App\Http\Controllers;

use App\Http\Requests\Film\StoreFilmRequest;
use App\Http\Requests\Film\UdateFilmRequest;
use App\Models\Event;
use App\Models\Film;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Image;
use App\Helpers\Filters;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->view('admin.home', [
                'films' => Film::with('events')->orderBy('updated_at','desc')->paginate(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()
                    ->view('admin.ContentManager.film-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(StoreFilmRequest $request)
    {
        $validated_film = $request->safe()->only(['title', 'tag', 'poster', 'synopsis', 'info']);
        $validated_events = $request->safe()->collect()->only(['events'])->first();

        $film = Film::create($validated_film);
        $path = 'posters/' . str_replace(" ", "-", $validated_film['title']) . "-" . $film->id;
        $film->poster = $path;
        $film->save();
        Image::make($request->file('poster'))->filter(new Filters\ResizesEncodingFilter($request->file('poster')->extension(), storage_path('app/public/' . $path)));

        if ($validated_events) {
            foreach ($validated_events as $event) {
                $event = new Event($event);
                $event->film_id = $film->id;
                $event->save();
            }
        }

        return response()->redirectToRoute('admin.film.events.create', ['film' => $film->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        return response()
            ->view('admin.ContentManager.film-form', [
                'film' => $film,
                'events' => $film->events()->get(),
                'other_dates' => $film->events()->select('date','time')
                                    ->orderBy('date')->orderBy('time')
                                    ->get()->groupBy('date'),
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        return response()->view('admin.ContentManager.film-form', [
            'film' => $film,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     *
     */
    public function update(UdateFilmRequest $request, Film $film)
    {
        $validated = $request->validated();
        if (isset($validated['poster'])) {
            $film->deletePoster();
        }
        $film->title = $validated['title'];
        $film->synopsis = $validated['synopsis'];
        $film->tag = $validated['tag'];
        if (isset($validated['info'])) {
            $film->info = $validated['info'];
        }
        if (isset($validated['poster'])) {
            $path = 'posters/' . str_replace(" ", "-", $validated['title']) . "-" . $film->id;
            Image::make($request->file('poster'))
                ->filter(new Filters\ResizesEncodingFilter($request->file('poster')->extension(), storage_path('app/public/' . $path)));
            $film->poster = $path;
        }
        $film->save();
        return response()->redirectToRoute('admin.film.index');
    }


    public function destroy(Film $film, Request $request)
    {
        $film->events()->delete();
        $film->delete();
        return response()->redirectToRoute('admin.film.index');
    }
}
