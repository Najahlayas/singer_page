<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsArticle extends Model
{
    protected $table = "news";
    protected $fillable = [
    // {{-- album art, Song image, album title, song title, audio url --}}
        'image',
        'title',
        'body',
        // 'created_at',
        // 'updated_at',
    ];
}
