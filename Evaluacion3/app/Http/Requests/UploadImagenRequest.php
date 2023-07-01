<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadImagenRequest extends FormRequest
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
            'titulo' => 'required|string|max:20|min:1',
            'imagen' => 'bail|required|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El campo del titulo es obligatorio',
            'titulo.string' => 'El campo del titulo debe ser una cadena de caracteres',
            'titulo.max' => 'El campo del titulo no puede contener mas de 20 caracteres',
            'titulo.min' => 'El campo del titulo debe contener al menos 1 caracter',
            'imagen.required' => 'El campo de la imagen es obligatorio',
            'imagen.image' => 'El campo de la imagen debe estar en un formato de imagen',
            'imagen.mimes' => 'El campo de la imagen debe estar en un JPEG, PNG, JPG o GIF',
        ];
    }
}
