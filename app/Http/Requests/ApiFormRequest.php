<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends formRequest
{
    protected function failedValidation(Validator $validator)
    {
        $response = response()->json([
            'status' => 'error',
            'code' => 422,
            'message' => ["Errores semánticos en los campos.", $validator->errors()]
        ], 422);

        throw new HttpResponseException($response);
    }
}
