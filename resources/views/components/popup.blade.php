@props([
    'title' => '',
])

<div x-show="addUserModal" x-transition style="display:none;"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-sm">

    <div @click.away="addUserModal = false" class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6" dir="rtl">

        <div class="flex justify-between items-center border-b pb-3 mb-5">

            <h2 class="text-lg font-bold text-gray-800">
                {{ $title }}
            </h2>


            <button type="button" @click="addUserModal = false" class="text-gray-400 hover:text-red-500 text-xl">
                ✕
            </button>

        </div>



        {{ $slot }}


    </div>

</div>
