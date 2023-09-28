<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paginas extends Model
{
    use HasFactory;

    protected $fillable = [

        'chave',
        'tituloPagina',
        'imagemPagina',
        'subtituloPagina',
        'conteudoPagina',

    ];

    protected $table = 'paginas';
}
