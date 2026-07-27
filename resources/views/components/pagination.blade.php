@props(['currentPage' => 1, 'lastPage' => 5])

<div class="flex items-center justify-between mt-4">
    <div class="flex items-center gap-1">
        <button
            class="px-4 py-2 border border-gray-200 bg-white text-gray-600 rounded-lg text-sm hover:bg-gray-50 transition-colors">
            السابق
        </button>

        @for ($i = 1; $i <= $lastPage; $i++)
            @if ($i == $currentPage)
                <button class="w-10 h-10 bg-indigo-600 text-white rounded-lg text-sm font-medium shadow-sm">
                    {{ $i }}
                </button>
            @else
                <button
                    class="w-10 h-10 border border-gray-200 bg-white text-gray-600 rounded-lg text-sm hover:bg-gray-50 transition-colors">
                    {{ $i }}
                </button>
            @endif
        @endfor

        <button
            class="px-4 py-2 border border-gray-200 bg-white text-gray-600 rounded-lg text-sm hover:bg-gray-50 transition-colors">
            التالي
        </button>
    </div>
</div>
