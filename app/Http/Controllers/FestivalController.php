<?php

namespace App\Http\Controllers;

use App\Http\Requests\Festival\FestivalRequest;
use App\Models\Festival;
use Illuminate\Http\Request;
use Image;
use App\Helpers\Filters\FrameResizesEncodingFilter;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Film  $film
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
        $validated_festival = $request->validated();
        $festival = Festival::create($validated_festival);

        $path = 'covers/' . $festival->slug_name . "-" . $festival->id;
        $festival->cover = $path;
        $festival->save();


        Image::make($request->file('cover'))->filter(new FrameResizesEncodingFilter($request->file('cover')->extension(), storage_path('app/public/festivals/' . $path)));

        return response()->redirectToRoute('admin.rassegne.index');
    }
}
