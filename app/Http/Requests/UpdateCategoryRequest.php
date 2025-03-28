<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "nombre" => "string|max:255|unique:categorias",
            "descripcion" => "string|max:255"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            "nombre.string" => "El nombre debe ser una cadena de texto",
            "nombre.max" => "El nombre no debe exceder los 255 caracteres",
            "nombre.unique" => "El nombre ya está en uso",
            "descripcion.string" => "La descripción debe ser una cadena de texto",
            "descripcion.max" => "La descripción no debe exceder los 255 caracteres"
        ];
    }
}
