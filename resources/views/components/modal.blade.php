@props(['id', 'title' => 'تعديل'])


<div id="{{ $id }}" class="hidden fixed inset-0 bg-black/40 flex items-center justify-center z-50">


    <div class="bg-white rounded-xl p-6 w-full max-w-md">


        <div class="flex justify-between items-center mb-5">

            <h2 class="font-bold text-lg">
                {{ $title }}
            </h2>


            <button onclick="closeModal('{{ $id }}')" class="text-gray-500">

                ✕

            </button>

        </div>


        {{ $slot }}


    </div>


</div>
