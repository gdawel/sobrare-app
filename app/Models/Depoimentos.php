<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depoimentos extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'nome',
        'titulo',
        'foto',
        'depoimento',
        'ativo'

    ];

    public function getDepoimentos()
    {
        $depoimentos = Depoimentos::query()->where('ativo', 'true');

        return $depoimentos;
    }
}
