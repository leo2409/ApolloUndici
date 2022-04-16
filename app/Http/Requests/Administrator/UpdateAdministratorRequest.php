<?php

namespace App\Http\Requests\Administrator;

use App\Models\Administrator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateAdministratorRequest extends FormRequest
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
            'username' => 'required|string|max:255|unique:administrators,username,'. $this->administrator->id,
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nome',
            'username' => 'username',
            'email' => 'email',
            'password' => 'password',
        ];
    }
}
