@props([
    'delete' => '#',
])


<div class="flex items-center gap-2">

    <form action="{{ $delete }}" method="POST" onsubmit="return confirmDelete()">

        @csrf
        @method('DELETE')

        <button type="submit" class="p-1.5 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6" />

            </svg>

        </button>

    </form>

</div>
