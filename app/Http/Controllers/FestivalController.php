<?php

namespace App\Http\Controllers;

use App\Http\Requests\Festival\FestivalRequest;
use App\Http\Requests\Festival\UpdateFestivalRequest;
use App\Models\Festival;
use Illuminate\Http\Request;
use Image;
use App\Helpers\Filters\FrameResizesEncodingFilter;
use Storage;
use Str;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()
            ->view('admin.ContentManager.rassegne-index', [
                'rassegne' => Festival::query()->orderBy('updated_at','desc')->paginate(),
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
            ->view('admin.ContentManager.rassegna-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     */
    public function store(FestivalRequest $request)
    {
        $validated_festival = $request->safe()->except(['cover']);
        $request->safe()->only(['cover']);
        $festival = Festival::create($validated_festival);

        if (Festival::query()->where('name', '=', $validated_festival['name'])->count() > 1) {
            $festival->slug = Str::slug($festival->name, '-') . '-' . $festival->id;
        } else {
            $festival->slug = Str::slug($festival->name, '-');
        }

        $festival->makeDirectoryFestival($festival->slug);

        $path = "app/public/festivals/{$festival->slug}/cover";
        $festival->save();
        Image::make($request->file('cover'))->filter(new FrameResizesEncodingFilter( storage_path($path)));

        return response()->redirectToRoute('admin.rassegne.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Festival  $rassegna
     * @return \Illuminate\Http\Response
     */
    public function edit(Festival $rassegne)
    {
        return response()->view('admin.ContentManager.rassegna-form', [
            'rassegna' => $rassegne,
        ]);
    }

    public function update(UpdateFestivalRequest $request, Festival $rassegne)
    {
        $validated = $request->safe()->except(['cover']);
        $cover = $request->safe()->only(['cover']);
        $rassegne->name = $validated['name'];
        $rassegne->description = $validated['description'];

        if (Festival::query()->where('name', '==', $validated['name'])->count() > 1) {
            $slug = STR::slug($rassegne->name, '-') . '-' . $rassegne->id;
        } else {
            $slug = STR::slug($rassegne->name, '-');
        }

        $rassegne->renameDirectoryFestival($slug);
        $rassegne->slug = $slug;

        if (isset($cover)) {
            $path = "app/public/festivals/{$rassegne->slug}/cover";
            $rassegne->deleteCover();
            Image::make($request->file('cover'))->filter(new FrameResizesEncodingFilter( storage_path($path)));
        }

        $rassegne->save();
        return response()->redirectToRoute('admin.rassegne.index');
    }

    public function destroy(Festival $rassegne, Request $request)
    {
        $rassegne->delete();
        return response()->redirectToRoute('admin.rassegne.index');
    }
}
