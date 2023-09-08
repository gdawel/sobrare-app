<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug'];

    public function artigo(): BelongsToMany
    {
        return $this->belongsToMany(Artigo::class);
    }
}
