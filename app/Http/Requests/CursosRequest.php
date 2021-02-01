<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CursosRequest extends FormRequest
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
            'cur_descripcion' => ['required', Rule::unique('tblcursos_cur')->ignore($this->id,'cur_id')]
        ];
    }

    public function messages()
    {
        return [
            'cur_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'cur_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO'
        ];
    }
}
