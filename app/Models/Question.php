<?php

namespace App\Models;

use App\Models\Test;
use App\Models\Answeroption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'sequencia',
        'enunciado',
        'sexo',
        'codGrupoOpcRespostas'
    ];

    public function test() {
        return $this->belongsTo(Test::class);
    }

    public function gruposOpcRespostas () {
        return $this->hasMany(GruposOpcRespostas::class);
    }

    public function opcRespostas() {
        return $this->hasManyThrough(Answeroption::class, GruposOpcRespostas::class);
    }
}
