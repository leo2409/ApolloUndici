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
        return [
            'title' => 'required|string|min:2|max:255',
            'tag' => 'nullable|string|max:255',
            'poster' => 'required|image|mimes:jpg,jpeg,png',
            'synopsis' => 'required|string',
            'info' => 'array',
            'info.*' => 'array:tag,body',
            'info.*.*' => 'required|string|max:255',

            'events' => 'array',
            'events.*' => 'array:date,time',
            'events.*.date' => 'required|date',
            'events.*.time' => 'required|date_format:H:i',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'pollo',
            'tag' => 'etichetta',
            'poster' => 'locandina',
            'synopsis' => 'sinossi',
            'info' => 'informazioni',
            'events' => 'eventi',
        ];
    }
}
