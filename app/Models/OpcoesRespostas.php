<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        'validar_complemento',
        'validar_intensidade',
        'tipoOpcaoResposta',
        'inputType' 
    ];

    public function grupoOpcoesRespostas() {
        return $this->belongsTo(GrupoOpcoesResposta::class);
    }

    public function useranswers(): HasMany {
        return $this->hasMany(Useranswers::class, 'opcoes_respostas_id');
    }
}
