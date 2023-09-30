<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;
    protected $fillable = [ 'numeroPaginas','genero', 'titulo','autor_id'];



    public function autores(){
        return $this->belongsTo('App\Models\Autor');
    }
}
