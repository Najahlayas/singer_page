{{-- album art, Song image, album title, song title, audio url --}}

<div x-data="{ isPlaying: false }"  class="vinyl-card h-auto max-w-full" style="background-image: url('{{ $work->album_art }}'); background-size: cover; background-position: center;">
    <div class="album-art-container">
        <x-dropdown align="right" width='24'>
            <x-slot name="trigger">
            <div class="flex items-center">
            <svg fill="#000000" width="24px" height="24px" viewBox="0 0 52 52" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M26,16a8,8,0,1,1,8-8A8,8,0,0,1,26,16ZM26,4a4,4,0,1,0,4,4A4,4,0,0,0,26,4Z"></path><path d="M26,34a8,8,0,1,1,8-8A8,8,0,0,1,26,34Zm0-12a4,4,0,1,0,4,4A4,4,0,0,0,26,22Z"></path><path d="M26,52a8,8,0,1,1,8-8A8,8,0,0,1,26,52Zm0-12a4,4,0,1,0,4,4A4,4,0,0,0,26,40Z"></path></g></svg>
            </div>
    </x-slot>
    <x-slot name="content">
         <button data-modal-target="edit-work-modal-{{ $work->id }}" data-modal-toggle="edit-work-modal-{{ $work->id }}" type="button" class="w-full text-right px-4 py-2 text-sm text-black hover:bg-gray-100 flex items-center gap-2">
        <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M20.8477 1.87868C19.6761 0.707109 17.7766 0.707105 16.605 1.87868L2.44744 16.0363C2.02864 16.4551 1.74317 16.9885 1.62702 17.5692L1.03995 20.5046C0.760062 21.904 1.9939 23.1379 3.39334 22.858L6.32868 22.2709C6.90945 22.1548 7.44285 21.8693 7.86165 21.4505L22.0192 7.29289C23.1908 6.12132 23.1908 4.22183 22.0192 3.05025L20.8477 1.87868ZM18.0192 3.29289C18.4098 2.90237 19.0429 2.90237 19.4335 3.29289L20.605 4.46447C20.9956 4.85499 20.9956 5.48815 20.605 5.87868L17.9334 8.55027L15.3477 5.96448L18.0192 3.29289ZM13.9334 7.3787L3.86165 17.4505C3.72205 17.5901 3.6269 17.7679 3.58818 17.9615L3.00111 20.8968L5.93645 20.3097C6.13004 20.271 6.30784 20.1759 6.44744 20.0363L16.5192 9.96448L13.9334 7.3787Z" fill="#0F0F0F"></path> </g></svg>
            <span>
    تعديل
</span>
            </button>

            {{-- <form method="POST" action="{{ route('works.destroy', $work) }}"> --}}
            {{-- @csrf --}}
            {{-- @method('DELETE') --}}
             <button data-modal-target="delete-work-modal-{{ $work->id }}" data-modal-toggle="delete-work-modal-{{ $work->id }}" type="button" class="w-full text-right px-4 py-2 text-sm text-red-600 hover:bg-gray-100 flex items-center gap-2">
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 11V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#ff0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                <span>
                    حذف
                </span>
            </button>
            {{-- </form> --}}
    </x-slot>
        </x-dropdown>
        
        <div class="vinyl-record" :class="isPlaying ? 'spin' : ''">
            <img src="{{ $work->song_image }}" alt="Vinyl Record" class="record-image">
            <div class="record-center"></div>
        </div>
    </div>
    <div class="card-details">
        <h3 class="song-title">{{ $work->song_title }}</h3>
        <p class="album-title">{{ $work->album_title }}</p>
            <audio
            @play="isPlaying = true"
            @pause="isPlaying = false"
            @ended="isPlaying = false"
            controls src="{{ asset('storage/audio/test-audio.mp3') }}" class="audio-player h-auto max-w-full"></audio>
    </div>
</div>


