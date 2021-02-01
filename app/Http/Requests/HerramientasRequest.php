<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class HerramientasRequest extends FormRequest
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
            'her_nombre' => ['required', Rule::unique('tblherramientas_her')->ignore($this->id,'her_id')],
            'her_descripcion' => 'required',
            'uni_id' => 'required|exists:tblunidades_uni,uni_id',
        ];
    }

    public function messages()
    {
        return [
            'her_nombre.required' => 'EL CAMPO NOMBRE ES OBLIGATORIO',
            'her_nombre.unique' => 'ESTE REGISTRO YA FUE INGRESADO',
            'her_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'uni_id.required' => 'DEBE SELECCIONAR UNA UNIDAD',
            'uni_id.exists' => 'NO EXISTE ESTE REGISTRO EN NUESTRA BASE'
        ];
    }
}
