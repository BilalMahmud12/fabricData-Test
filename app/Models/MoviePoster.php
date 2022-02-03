<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MoviePoster extends Model
{
    use HasFactory;

    protected $fillable = [ 'poster_url'];

    // Relations to other models

    public function movie() :BelongsTo
    {
        return $this->belongsTo(Movie::class);
    }
}
