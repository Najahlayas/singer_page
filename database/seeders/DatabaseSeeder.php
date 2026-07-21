<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Work;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'password' => bcrypt('password'),
            'email' => 'admin@email.com',
        ]);

        Work::factory(3)->create([
        // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art' => 'https://placehold.co/200/green/white',
        'song_image' => 'https://placehold.co/200/pink/white',
        'album_title' => 'Test Album',
        'song_title' => 'Test Song',
        'audio_url' => 'storage/audio/test-audio.mp3',
        ]);

        Work::factory(3)->create([
        // {{-- album art, Song image, album title, song title, audio url --}}
        'album_art' => 'https://placehold.co/200/red/white',
        'song_image' => 'https://placehold.co/200/blue/white',
        'album_title' => 'Test Album',
        'song_title' => 'Test Song',
        'audio_url' => 'storage/audio/test-audio.mp3',
        ]);
    }
}
