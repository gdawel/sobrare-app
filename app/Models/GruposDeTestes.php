<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class GruposDeTestes extends Model
{
    use HasFactory;

    protected $fillable = [
        'codGrupo', 
        'nomeGrupo', 
        'slug', 
        'descricaoCurta', 
        'descricaoLonga', 
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
            return $this->hasMany(Grupos_de_testesTestes::class);
    }
}
