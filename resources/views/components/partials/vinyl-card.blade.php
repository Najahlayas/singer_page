{{-- album art, Song image, album title, song title, audio url --}}


<div x-data="{ isPlaying: false }"  class="vinyl-card h-auto max-w-full" style="background-image: url('https://placehold.co/200/green/white'); background-size: cover; background-position: center;">
    <div class="album-art-container">
        <div class="vinyl-record" :class="isPlaying ? 'spin' : ''">
            <img src="https://placehold.co/200/blue/yellow" alt="Vinyl Record" class="record-image">
            <div class="record-center"></div>
        </div>
    </div>
    <div class="card-details">
        <h3 class="song-title">{{ $title }}</h3>
        <p class="album-title">{{ $artist }}</p>
            <audio
            @play="isPlaying = true"
            @pause="isPlaying = false"
            @ended="isPlaying = false"
            controls src="{{ asset('storage/audio/test-audio.mp3') }}" class="audio-player h-auto max-w-full"></audio>
    </div>
</div>
