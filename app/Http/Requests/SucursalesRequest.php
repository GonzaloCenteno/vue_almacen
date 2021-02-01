<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SucursalesRequest extends FormRequest
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
            'suc_descripcion' => ['required', Rule::unique('tblsucursales_suc')->ignore($this->id,'suc_id')],
            'suc_direccion' => 'required',
            'suc_abreviatura' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'suc_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'suc_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'suc_direccion.required' => 'EL CAMPO DIRECCION ES OBLIGATORIO',
            'suc_abreviatura.required' => 'EL CAMPO ABREVIATURA ES OBLIGATORIO'
        ];
    }
}
