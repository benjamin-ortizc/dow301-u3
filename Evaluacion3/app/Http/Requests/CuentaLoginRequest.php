<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaLoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'username' => 'required|alpha|max:20|min:1|exists:cuentas,user',
            'password' => 'required|string|min:1',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'El campo usuario es obligatorio',
            'username.alpha' => 'El campo usuario solo puede contener letras',
            'username.max' => 'El campo usuario no puede contener mas de 20 caracteres',
            'username.min' => 'El campo usuario debe contener al menos 1 caracter',
            'username.exists' => 'El usuario ingresado no existe',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser una cadena de caracteres',
            'password.min' => 'El campo contraseña debe contener al menos 1 caracter',
        ];
    }
}
