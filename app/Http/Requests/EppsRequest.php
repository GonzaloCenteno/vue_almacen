<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EppsRequest extends FormRequest
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
            'epp_descripcion' => ['required', Rule::unique('tblepps_epp')->ignore($this->id,'epp_id')]
        ];
    }

    public function messages()
    {
        return [
            'epp_descripcion.required' => 'EL CAMPO DESCRIPCION ES OBLIGATORIO',
            'epp_descripcion.unique' => 'ESTE REGISTRO YA FUE INGRESADO'
        ];
    }
}
