<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class testes extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'codTeste', 
        'nomeTeste', 
        'slug', 
        'memoInterno', 
        'textoIntro', 
        'textoFecha', 
        'textoRodape', 
        'precoTeste', 
        'isActive'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function gruposTestes(): BelongsToMany
    {
        return $this->belongsToMany(gruposDeTestes::class);
    }

    public function perguntas() {
        return $this->hasMany(Perguntas::class);
    }
}
