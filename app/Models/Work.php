<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{

    use HasFactory;
    protected $fillable = [
    // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art',
        'song_image',
        'album_title',
        'song_title',
        'audio_url',
    ];
}
