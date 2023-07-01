<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BanImagenRequest extends FormRequest
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
            'motivo_ban' => 'required|string|min:1',
            'confirmar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'motivo_ban.required' => 'El campo del motivo es obligatorio',
            'motivo_ban.string' => 'El campo del motivo debe ser una cadena de caracteres',
            'motivo_ban.min' => 'El campo del motivo debe contener al menos 1 caracter',
            'confirmar.required' => 'Debes confirmar que quieres banear la imagen',
        ];
    }
}
