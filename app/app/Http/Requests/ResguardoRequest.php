<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ResguardoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return ($this->user()->user_type === User::ROL_ADMIN);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => [
                'required',
            ],
            'device' => [
                'required',

            ],

        ];
    }

    public function messages()
    {
        return [
            'device.required' => "El dispositivo es obligatorio.",
            'user.required' => "El usuario es obligatorio.",

        ];
    }
}
