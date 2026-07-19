@props(['link', 'label', 'active' => false, 'svgIcon'])

<li>
    <a href="{{ $link }}" @class([
            'nav-link flex items-center px-2 py-1.5 rounded-base text-white',
            'active-link' => $active,
        ])>

        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $svgIcon }}" />
        </svg>

        <span class="flex-1 ms-3 whitespace-nowrap">{{ $label }}</span>
    </a>
</li>
