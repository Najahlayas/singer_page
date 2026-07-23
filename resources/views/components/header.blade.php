@props(['title' => '', 'breadcrumb' => ''])

<div class="flex flex-col md:flex-row md:items-top md:justify-between mb-6">
    <div>
        <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
            {{ $title }}
        </h1>
        <p class="text-sm text-gray-500 mt-1">{{ $breadcrumb }}</p>
    </div>
    <div class="fixed top-5 left-1/2 -translate-x-1/2 z-[100]">

        @if (session('success'))
            <x-toast type="success" message="{{ session('success') }}" />
        @endif

        @if (session('error'))
            <x-toast type="danger" message="{{ session('error') }}" />
        @endif

    </div>
    <div class="mt-4 md:mt-0">
        {{ $slot }}
    </div>
</div>
