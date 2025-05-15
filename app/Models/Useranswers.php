<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property array|null opcRespCheckbox
 * @property array|null checkboxTextos
 */
class Useranswers extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'orderitems_id',
        'testes_id',
        'pergunta_id',
        'sequencia',
        'opcoes_respostas_id',
        'opcRespCheckbox',
        'opcRespIntensidade',
        'comentariosCliente',
        'codTextoResposta'
    ];

    public function ordersItem(): BelongsTo {

        return $this->belongsTo(Orderitems::class);
    }

    public function pergunta(): BelongsTo {

        return $this->belongsTo(Perguntas::class);
    }

    public function opcaoResposta(): BelongsTo {

        return $this->belongsTo(OpcoesRespostas::class, 'opcoes_respostas_id');
    }

    /* public function textoResposta(): HasOne {
        return $this->hasOne(TextoResposta::class);
    } */

    public function textoResposta()
{
    return $this->belongsTo(TextoResposta::class, 'codTextoResposta', 'codTextoResposta');
}
}
