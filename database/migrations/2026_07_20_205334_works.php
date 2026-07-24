<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // {{-- album art, Song image, album title, song title, audio url --}}
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->string('album_art')->nullable();
            $table->string('song_image')->nullable();
            $table->string('album_title');
            $table->string('song_title');
            $table->string('audio_url');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('works');
    }
};
