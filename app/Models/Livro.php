<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [ 'numeroPaginas','genero', 'titulo','autor_id'];

    public function rules(){
        return [
            'numeroPaginas' =>'required|integer|Validar_numero_paginas',
            'genero' => 'required|string',
            'titulo' => 'required|string' ,
            'autor_id' => 'exists:autores,id'
        ];
    }

    public function autores(){
        return $this->belongsTo('App\Models\Autor');
    }
}
