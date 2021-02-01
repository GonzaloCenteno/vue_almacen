<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AreasRequest extends FormRequest
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
            'are_descripcion' => ['required', Rule::unique('tblareas_are')->ignore($this->id,'are_id')],
            'are_abreviatura' => 'required|max:3'
        ];
    }

    public function messages()
    {
        return [
            'are_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'are_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'are_abreviatura.required' => 'EL CAMPO ABREVIATURA ES OBLIGATORIO',
            'are_abreviatura.max' => 'EL CAMPO SOLO PUEDE TENER 3 CARACTERES'
        ];
    }
}
