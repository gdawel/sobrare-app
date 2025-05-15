<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TextoResposta extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'codTextoResposta', 
        'textoResposta'
    ];

    /* public function useranswers() {
        return $this->belongsTo(Useranswers::class);
    } */

    public function userAnswers()
{
    return $this->hasMany(Useranswers::class, 'codTextoResposta', 'codTextoResposta');
}
}
