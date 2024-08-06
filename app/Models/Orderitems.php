<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'testes_id',
        'codTeste',
        'unitPrice',
        'quantity',
        'itemTotal',
        'testeStatus'
    ];

    public function order() {
        return $this->belongsTo(Orders::class);
    }

    public function testes() {
        return $this->belongsTo(Testes::class);
    }

    public function pergunta() {
        return $this->hasManyThrough(Perguntas::class, Testes::class);
    }

    public function useranswers() {
        return $this->hasMany(Useranswers::class);
    }
}
