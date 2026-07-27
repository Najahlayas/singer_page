@props(['link', 'title', 'date' , 'image'])


<a href="{{ $link }}" class="p-3">
<div class="flex items-center gap-3">
    <img src="{{ $image }}" class="w-10 h-10 rounded-lg">
    <div>
        <p class="text-sm font-medium">{{ $title }}</p>
        <p class="text-xs text-gray-500">{{ $date }}</p>
    </div>
</div>
</a>
