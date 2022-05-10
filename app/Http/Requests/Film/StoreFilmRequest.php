<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class StoreFilmRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //TODO: add max size file
        return [
            'title' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'poster' => 'required|image|mimes:jpg,jpeg,png,webp|max:6200',
            'frame' => 'required|image|mimes:jpg,jpeg,png,webp|max:6200',
            'director' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'trailer' => 'nullable|url|string|max:255',
            'info' => 'array',
            'info.*' => 'required|string',
            'events' => 'array',
            'events.*' => 'array:date,time',
            'events.*.date' => 'required|date',
            'events.*.time' => 'required|date_format:H:i',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'titolo',
            'tag' => 'etichetta',
            'poster' => 'locandina',
            'frame' => 'frame',
            'synopsis' => 'sinossi',
            'info' => 'informazioni',
            'events' => 'eventi',
        ];
    }

    public function messages()
    {
        return [
            'poster.mimes' => 'formato non supportato!',
            'frame.mimes' => 'formato non supportato!',
        ];
    }
}
