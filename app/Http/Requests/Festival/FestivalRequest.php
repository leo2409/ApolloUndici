<?php

namespace App\Http\Requests\Festival;

use Illuminate\Foundation\Http\FormRequest;

class FestivalRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'cover' => 'required|image|mimes:jpg,jpeg,png,webp',
            'description' => 'required|string',
            'organizers' => 'array',
            'organizers.*' => 'array:tag,body',
            'organizers.*.*' => 'required|string|max:255',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'cover' => 'copertina',
            'description' => 'descrizione',
            'organizers' => 'organizzatori'
        ];
    }
}
