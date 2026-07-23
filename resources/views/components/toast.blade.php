@php

    $styles = [
        'success' => [
            'icon' => 'M5 11.917 9.724 16.5 19 7.5',
            'color' => 'text-green-600 bg-green-100',
        ],

        'danger' => [
            'icon' => 'M6 18 17.94 6M18 18 6.06 6',
            'color' => 'text-red-600 bg-red-100',
        ],

        'warning' => [
            'icon' => 'M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z',
            'color' => 'text-yellow-600 bg-yellow-100',
        ],
    ];

    $style = $styles[$type] ?? $styles['success'];

@endphp



<div id="toast-{{ $type }}"
    class="flex items-center w-full max-w-sm p-4 text-body bg-white rounded-lg shadow border border-gray-200"
    role="alert">


    <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 {{ $style['color'] }} rounded">


        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">


            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $style['icon'] }}" />


        </svg>


    </div>



    <div class="ms-3 text-sm font-normal">

        {{ $message }}

    </div>




    <button type="button" data-dismiss-target="#toast-{{ $type }}"
        class="ms-auto w-8 h-8 flex items-center justify-center rounded hover:bg-gray-100">


        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">


            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />


        </svg>


    </button>


</div>
