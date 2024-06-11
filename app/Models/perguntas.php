<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perguntas extends Model
{
    use HasFactory;

    protected $fillable = [
        'testes_id',
        'grupo_opcoes_respostas_id',
        'sequencia',
        'enunciado',
        'sexo',
        'codGrupoOpcRespostas'
    ];

    public function testes() {
        return $this->belongsTo(Testes::class);
    }

    public function grupoOpcoesRespostas () {
        return $this->belongsTo(GrupoOpcoesResposta::class);
    }

    public function opcoesRespostas() {
        return $this->hasManyThrough(OpcoesRespostas::class, GrupoOpcoesResposta::class);
    }
}
