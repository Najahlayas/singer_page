@props(['count', 'text'])


<div x-data="{ open: false }" class="relative">

    <button @click="open = !open"
        class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-sm flex items-center gap-1">

        {{ $count }} {{ $text }}

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
            class="w-4 h-4">

            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />

        </svg>

    </button>


    <div x-show="open" @click.outside="open=false" x-transition
        class="mt-2 bg-white border rounded-lg shadow-lg p-3 w-48">


        <ul class="text-sm space-y-1 text-center">

            {{ $slot }}

        </ul>


    </div>


</div>
