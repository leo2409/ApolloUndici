<?php

namespace App\Http\Requests\Film;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFilmRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'frame' => 'nullable|image|mimes:jpg,jpeg,png,webp',
            'director' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'trailer' => 'nullable|url|string|max:255',
            'info' => 'array',
            'info.*' => 'required|string',
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
        ];
    }
}
