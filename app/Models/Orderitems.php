<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'test_id',
        'unitPrice',
        'quantity',
        'itemTotal'
    ];

    public function order() {
        return $this->belongsTo(Orders::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }
}
