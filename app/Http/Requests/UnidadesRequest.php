<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UnidadesRequest extends FormRequest
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
            'uni_descripcion' => ['required', Rule::unique('tblunidades_uni')->ignore($this->id,'uni_id')],
            'uni_abreviatura' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'uni_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'uni_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'uni_abreviatura.required' => 'EL CAMPO ABREVIATURA ES OBLIGATORIO'
        ];
    }
}
