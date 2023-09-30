<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLivroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = auth('api')->user();

        // Verifique se o usuário é um administrador
        if ($user && $user->administrador) {
            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'numeroPaginas' => 'sometimes|integer|Validar_numero_paginas',
            'genero' => 'sometimes|string',
            'titulo' => 'sometimes|string' ,
            'autor_id' => 'sometimes|exists:autores,id'
        ];
    }
}
