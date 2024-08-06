<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderclientdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'orders_id',
        'firstName',
        'lastName',
        'phone',
        'cobranca_cep',
        'cobranca_rua',
        'cobranca_numero',
        'cobranca_complemento',
        'cobranca_bairro',
        'cobranca_cidade',
        'cobranca_estado',
        'cobranca_pais',
        'cobranca_tax_id'
    ];

    public function order() {
        return $this->belongsTo(Orders::class);
    }

    public function pegarNomeCompleto() {
        return "{$this->firstName} {$this->lastName}";
    }


}
