<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'imdb_id',
        'title',
        'year',
        'type'
    ];

    // Relations to other models

    public function poster() :HasOne
    {
        return $this->hasOne(MoviePoster::class);
    }
}
