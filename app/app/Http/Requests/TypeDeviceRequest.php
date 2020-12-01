<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TypeDeviceRequest extends FormRequest
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
            'nombre' => [
                'required',
                Rule::unique('type_devices')->ignore($this->route('type_device')),
            ]
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => "El nombre del nuevo tipo de dispositivo es obligatorio.",
            'nombre.unique' => "El nombre del nuevo tipo de dispositivo ya ha sido registrado.",
        ];
    }
}
