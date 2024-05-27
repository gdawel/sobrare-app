<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcoesRespostas extends Model
{
    use HasFactory;

    protected $fillable = [
        'grupo_opcoes_respostas_id',
        'numSeqResp',
        'textoResposta',
        'valorResposta',
        'requer_comentarios',
        'requer_complemento',
        'tipoOpcaoResposta',
        'inputType' 
    ];

    public function grupoOpcoesRespostas() {
        return $this->belongsTo(grupoOpcoesResposta::class);
    }
}
