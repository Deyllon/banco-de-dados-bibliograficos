<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLivroRequest extends FormRequest
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
            'numeroPaginas' => 'required|integer|Validar_numero_paginas',
            'genero' => 'required|string',
            'titulo' => 'required|string' ,
            'autor_id' => 'exists:autores,id'
        ];
    }
}
