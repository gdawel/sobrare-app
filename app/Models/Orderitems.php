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
}
