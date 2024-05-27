<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class gruposDeTestes extends Model
{
    use HasFactory;

    protected $fillable = [
        'codGrupo', 
        'nomeGrupo', 
        'slug', 
        'memoInterno', 
        'descricaoExterna', 
        'imagemGrupo', 
        'precoGrupo', 
        'isActive'
        ];

    public function testes(): BelongsToMany
     {
        return $this->belongsToMany(Testes::class);
    }

    public function gruposTestes_testes(): HasMany    
        {
            return $this->hasMany(grupos_de_testesTestes::class);
    }
}
