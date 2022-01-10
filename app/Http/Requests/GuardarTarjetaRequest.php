<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarTarjetaRequest extends FormRequest
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
            'categoria' => 'required',
            'subcategoria' => 'required',
            'nombre' => 'required',
            'rfc' => 'required',
            'telefono' => 'required',
            'contacto' => 'required',
            'tel_contacto' => 'required',
            'email_contacto' => 'required|email|unique:tarjetas',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'email.email' => 'El email debe ser una dirección de :attribute válida.',
            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute ya ha sido registrado.',
            'rfc.unique' => 'El :attribute ya ha sido registrado.',
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre del usuario',
            'email' => 'correo electronico',
            'rfc' => 'RFC'
        ];
    }
}
