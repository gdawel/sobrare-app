<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ControleRelatorios extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'testes_id',
        'orders_id',
        'orderItem_id',
        'file_path',
        'status'

    ];

    public function user() {
        return $this->belongsTo(User::class);
    }


    public function testes()
     {
        return $this->belongsTo(Testes::class);
    }

}
