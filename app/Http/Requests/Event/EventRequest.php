<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'seats' => 'required|numeric',
            'tag' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'info' => 'array',
            'info.*' => 'array:tag,body',
            'info.*.*' => 'required|string',
        ];
    }

    public function attributes()
    {
        return [
            'date' => 'data',
            'time' => 'orario',
            'seats' => 'posti',
            'tag' => 'etchetta',
            'description' => 'descrizione',
            'info' => 'informazioni',
        ];
    }
}
