<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DeviceRequest extends FormRequest
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

            ],
            'folio' => [
                Rule::unique('dispositivos')->ignore($this->route('device')),
            ],
            'precio_unitario' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => "El nombre del nuevo dispositivo es obligatorio.",
            'folio.unique' => "El folio ya se encuentra registrado",
            'precio_unitario.required' => "El precio del nuevo dispositivo es obligatorio.",
        ];
    }
}
