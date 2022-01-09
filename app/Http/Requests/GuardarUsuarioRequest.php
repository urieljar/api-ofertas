<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuardarUsuarioRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string'
           // 'password' => 'required|string|min:8'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El :attribute es obligatorio.',
            'email.email' => 'El email debe ser una dirección de :attribute válida.',
            'email.required' => 'El :attribute es obligatorio.',
            'email.unique' => 'El :attribute ya ha sido registrado.',
            'password.required' => 'La :attribute es obligatorio.',
            'password.min' => 'La :attribute debe ser mínimo de 8 caracteres'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'nombre del usuario',
            'email' => 'correo electronico',
            'password' => 'contraseña'
        ];
    }
}
