<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
            ],
            'email'=>[
                'required',
                Rule::unique('users')->ignore($this->route('empleado')),
            ]

        ];
    }

    public function messages()
    {
        return [
            'name.required' => "El nombre del nuevo empleado es obligatorio.",
            'email.required' => "El email del nuevo empleado es obligatorio.",
            'email.unique' => "El email del nuevo empleado ya ha sido registrado.",
        ];
    }
}
