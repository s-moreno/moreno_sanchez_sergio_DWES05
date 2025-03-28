<?php

namespace App\Http\Requests;

class UpdateProductRequest extends ApiFormRequest
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
            'nombre' => 'string|max:255|unique:productos',
            'stock_actual' => 'integer|min:0',
            'stock_minimo' => 'integer|min:1',
            'id_categoria' => 'integer|exists:categorias,id_categoria'
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
            'nombre.string' => 'El nombre debe ser una cadena de texto',
            'nombre.max' => 'El nombre no debe exceder los 255 caracteres',
            'nombre.unique' => 'El nombre ya está en uso',
            'stock_actual.integer' => 'El stock actual debe ser un número entero',
            'stock_actual.min' => 'El stock actual debe ser mayor o igual a 0',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero',
            'stock_minimo.min' => 'El stock mínimo debe ser mayor o igual a 1',
            'id_categoria.integer' => 'La categoría debe ser un número entero',
            'id_categoria.exists' => 'La categoría no existe'
        ];
    }
}
