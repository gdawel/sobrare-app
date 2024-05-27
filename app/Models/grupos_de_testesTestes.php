<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class grupos_de_testesTestes extends Model
{
    use HasFactory;

    protected $fillable = [ 'grupos_de_testes_id', 'testes_id' ];

    public function gruposTestes(): BelongsTo
    {
        return $this->belongsTo(gruposDeTestes::class);
    }
 
    public function testes(): BelongsTo
    {
        return $this->belongsTo(Testes::class);
    }
}
