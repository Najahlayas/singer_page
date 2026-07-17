@props(['title' => null])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl shadow p-6']) }}>
    {{-- Header Section: Only shows if a title or action slot exists --}}
    @if($title || isset($action))
        <div class="flex justify-between items-center mb-6">
            @if($title)
                <h3 class="text-lg font-bold">{{ $title }}</h3>
            @endif

            @if(isset($action))
                <div>{{ $action }}</div>
            @endif
        </div>
    @endif

    {{-- Main Content --}}
    <div>
        {{ $slot }}
    </div>
</div>