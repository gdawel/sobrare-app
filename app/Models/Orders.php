<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'orderDate',
        'grand_total',
        'paymentMethod',
        'paymentStatus',
        'orderStatus',
        'notes'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function orderclientdetail() {
        return $this->hasOne(Orderclientdetails::class);
    }

    public function orderitem() {
        return $this->hasMany(Orderitems::class);
    }

    public function historicomedico() {
        return $this->hasOne(Historicomedicos::class);
    }
}
