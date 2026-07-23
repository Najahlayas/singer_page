@props([
    'action' => '',
    'placeholder' => 'ابحث...',
    'value' => '',
])


<form method="GET" action="{{ $action }}" class="mb-6">

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-4">

        <div class="relative max-w-md">

            <!-- أيقونة البحث -->
            <span class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400">

                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z">
                    </path>

                </svg>

            </span>


            <input type="text" name="search" value="{{ $value }}" placeholder="{{ $placeholder }}"
                oninput="this.form.submit()"
                class="w-full pr-10 pl-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-indigo-500 text-right">

        </div>

    </div>

</form>
