<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdministrativeUnitRequest extends FormRequest
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
                Rule::unique('unidades_administrativas')->ignore($this->route('administrative_unit')),
            ]
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => "El nombre de la nueva unidad administrativa es obligatorio.",
            'nombre.unique' => "El nombre de la nueva unidad administrativa ya ha sido registrado.",
        ];
    }
}
