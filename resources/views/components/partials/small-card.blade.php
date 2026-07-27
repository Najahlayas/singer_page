@props(['number', 'label', 'link', 'svgIcon', 'iconColor' => 'text-gray-800', 'iconBgColor' => 'bg-gray-300'])

<div class="w-full bg-white border border-gray-200 rounded-xl shadow-sm p-4 sm:p-6">
    <div class="flex items-center justify-between mb-6">
        <div class="text-right">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-900">
                {{ $number }}
            </h2>

            <p class="text-sm text-gray-500 mt-1 whitespace-normal sm:whitespace-nowrap">
                {{ $label }}
            </p>
        </div>

        <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-lg {{ $iconBgColor }} flex items-center justify-center shrink-0">
            <svg class="w-5 h-5 sm:w-6 sm:h-6 {{ $iconColor }}" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="{{ $svgIcon }}" />
            </svg>
        </div>
    </div>

    <div class="flex justify-start" dir="ltr">
        <a href="{{ $link }}"
            class="flex items-center gap-1 text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>

            عرض الكل
        </a>
    </div>
</div>
