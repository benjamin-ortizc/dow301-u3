<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditarImagenRequest extends FormRequest
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
            'nuevo_titulo' => 'required|string|max:20|min:1',
            'confirmar' => 'required',
        ];
    }

    public function messages()
    {
        return [
          'nuevo_titulo.required' => 'El campo del nuevo titulo es obligatorio',
            'nuevo_titulo.string' => 'El campo del nuevo titulo debe ser una cadena de caracteres',
            'nuevo_titulo.max' => 'El campo del nuevo titulo no puede contener mas de 20 caracteres',
            'nuevo_titulo.min' => 'El campo del nuevo titulo debe contener al menos 1 caracter',
            'confirmar.required' => 'Debes confirmar que quieres editar la imagen',
        ];
    }
}
