<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <div class="overflow-x-auto">
        <table class="w-full text-right border-collapse">
            <thead>
                <tr class="border-b border-gray-100 text-gray-500 text-sm bg-gray-50/50">
                    {{ $headers ?? '' }}
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-sm text-gray-700">
                {{ $rows ?? $slot }}
            </tbody>
        </table>
    </div>
</div>
