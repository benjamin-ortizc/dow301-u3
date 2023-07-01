<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuentaRegisterRequest extends FormRequest
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
            'nombre' => 'required|alpha|max:20|min:1',
            'apellido' => 'required|alpha|max:20|min:1',
            'username' => 'required|string|max:20|min:1|unique:cuentas,user',
            'password' => 'required|string|min:6|max:100|same:password2',
            'perfil_id' => 'exists:perfiles,id',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre es obligatorio',
            'nombre.alpha' => 'El campo nombre solo puede contener letras',
            'nombre.max' => 'El campo nombre no puede contener mas de 20 caracteres',
            'nombre.min' => 'El campo nombre debe contener al menos 1 caracter',
            'apellido.required' => 'El campo apellido es obligatorio',
            'apellido.alpha' => 'El campo apellido solo puede contener letras',
            'apellido.max' => 'El campo apellido no puede contener mas de 20 caracteres',
            'apellido.min' => 'El campo apellido debe contener al menos 1 caracter',
            'username.required' => 'El campo usuario es obligatorio',
            'username.string' => 'El campo usuario debe ser una cadena de caracteres',
            'username.max' => 'El campo usuario no puede contener mas de 20 caracteres',
            'username.min' => 'El campo usuario debe contener al menos 1 caracter',
            'username.unique' => 'El usuario ingresado ya existe',
            'password.required' => 'El campo contraseña es obligatorio',
            'password.string' => 'El campo contraseña debe ser una cadena de caracteres',
            'password.max' => 'El campo contraseña no puede contener mas de 100 caracteres',
            'password.min' => 'El campo contraseña debe contener al menos 6 caracteres',
            'password.same' => 'Las contraseñas no coinciden',
        ];
    }
}
