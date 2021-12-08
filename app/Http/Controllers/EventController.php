<?php

namespace App\Http\Controllers;

use App\Http\Requests\Event\EventRequest;
use App\Models\Event;
use App\Models\Film;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function index(Film $film)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function create(Film $film)
    {
        return response()->view('admin.ContentManager.events-form', [
            'events' => $film->events()->where('date', '>=', today())->get(),
            'film' => $film,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     */
    public function store(Request $request, Film $film)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);
        $event = new Event();
        $event->date = $validated['date'];
        $event->time = $validated['time'];
        $event->film_id = $film->id;
        $event->save();
        return response()->redirectToRoute('film.events.create', ['film' => $film->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film, Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film, Event $event)
    {
        return response()->view('admin.ContentManager.event-form',['film' => $film, 'event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @param  \App\Models\Event  $event
     *
     */
    public function update(EventRequest $request, Film $film, Event $event)
    {
        $validated = $request->validated();
        $event->update($validated);
        return response()->redirectToRoute('film.events.create', ['film' => $film->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @param  \App\Models\Event  $event
     *
     */
    public function destroy(Film $film, Event $event)
    {
        $event->delete();
        return response()->redirectToRoute('film.events.create', ['film' => $film->id]);
    }
}