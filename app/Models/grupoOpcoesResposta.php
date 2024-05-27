<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grupoOpcoesResposta extends Model
{
    use HasFactory;

    protected $fillable = ['codGrupoOpcRespostas', 'codTeste'];

    public function perguntas() {
        return $this->belongsTo(Perguntas::class);
    }

    public function opcoesRespostas() {
        return $this->belongsTo(OpcoesRespostas::class);
    }
}
