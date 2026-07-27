@props(['route', 'type', 'id', 'label' => null, 'iconOnly' => true])
<form action="{{ $route }}" method="POST">

    @csrf
    @method('DELETE')


    <button type="button" data-modal-target="delete-modal-{{ $id }}"
        data-modal-toggle="delete-modal-{{ $id }}"
        class="text-red-600 hover:text-red-800 flex items-center gap-2">

        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6" />
        </svg>

        @if ($label)
            <span>
                {{ $label }}
            </span>
        @endif

    </button>


    <div id="delete-modal-{{ $id }}" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">


        <div class="relative p-4 w-full max-w-md max-h-full">

            <div class="relative bg-white border border-gray-200 rounded-lg shadow-sm p-4 md:p-6">


                <button type="button" data-modal-hide="delete-modal-{{ $id }}"
                    class="absolute top-3 end-2.5 text-gray-500 bg-transparent hover:bg-gray-100 hover:text-gray-900 rounded-lg text-sm w-9 h-9 inline-flex justify-center items-center">

                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>



                <div class="p-4 md:p-5 text-center">

                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />

                    </svg>


                    <h3 class="mb-6 text-gray-700 text-base font-medium">
                        هل أنت متأكد أنك تريد حذف {{ $type }}؟
                    </h3>


                    <div class="flex items-center justify-center gap-4">

                        <button type="submit"
                            class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2.5">

                            نعم، حذف

                        </button>


                        <button type="button" data-modal-hide="delete-modal-{{ $id }}"
                            class="text-gray-700 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-4 py-2.5">

                            إلغاء

                        </button>

                    </div>

                </div>

            </div>

        </div>

    </div>

</form>
