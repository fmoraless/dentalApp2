<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePaciente extends FormRequest
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
            'rut' => 'required|unique:pacientes|cl_rut',
            'nombres' => 'required|string|min:3',
            'apellido_paterno' => 'required|string|min:3',
            'telefono' => 'required|regex:/^(\+569)[0-8]{8}$/'
        ];
    }
}
