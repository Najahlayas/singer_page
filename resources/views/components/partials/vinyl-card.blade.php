{{-- album art, Song image, album title, song title, audio url --}}
@props(['work'])

<div x-data="{ isPlaying: false }" class="vinyl-card max-w-full"
    style="background-image: url('{{ $work->album_art }}'); background-size: cover; background-position: center;">


    <div class="album-art-container">

        <x-dropdown align="right" width="24">

            <x-slot name="trigger">

                <div class="flex items-center cursor-pointer">

                    <svg fill="#000000" width="24px" height="24px" viewBox="0 0 52 52">
                        <path d="M26,16a8,8,0,1,1,8-8A8,8,0,0,1,26,16Z" />
                        <path d="M26,34a8,8,0,1,1,8-8A8,8,0,0,1,26,34Z" />
                        <path d="M26,52a8,8,0,1,1,8-8A8,8,0,0,1,26,52Z" />
                    </svg>

                </div>

            </x-slot>


            <x-slot name="content">

                <x-edit-button target="edit-work-{{ $work->id }}" label="تعديل" :iconOnly="false" />

                <div class="flex items-center w-full">
                    <x-delete-form :route="route('works.destroy', $work->id)" type="العمل" :id="$work->id" label="حذف" />
                </div>

            </x-slot> </x-dropdown>



        <div class="vinyl-record" :class="isPlaying ? 'spin' : ''">

            <img src="{{ $work->song_image }}" alt="Vinyl Record" class="record-image">

            <div class="record-center"></div>

        </div>


    </div>



    <div class="card-details">

        <div class="title-window">

            <h3 title="{{ $work->song_title }}" class="song-title cursor-default"
                :class="isPlaying ? 'title-hover' : ''">

                {{ $work->song_title }}

            </h3>

        </div>



        <div class="title-window">

            <p title="{{ $work->album_title }}" class="album-name cursor-default"
                :class="isPlaying ? 'title-hover' : ''">

                {{ $work->album_title }}

            </p>

        </div>



        <audio @play="isPlaying = true" @pause="isPlaying = false" @ended="isPlaying = false" controls
            src="{{ asset($work->audio_url) }}" class="audio-player h-auto max-w-full">
        </audio>


    </div>


</div>
