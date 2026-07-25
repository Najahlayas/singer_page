{{-- @props(['link', 'title', 'date' , 'image'])


<div class="flex items-center gap-3">
    <img href="{{ $link }}" src="{{ $image }}" class="w-10 h-10 rounded-lg">
    <div>
        <p class="text-sm font-medium">{{ $title }}</p>
        <p class="text-xs text-gray-500">{{ $date }}</p>
    </div>
</div> --}}


{{-- <div>


<div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
    <a href="{{ $post->link }}">
        <img class="rounded-base" src="{{ $post->image }}" alt="" />
    </a>
    <a href="#">
        <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading">Streamlining your design process today.</h5>
    </a>
    <p class="mb-6 text-body">{{ $post->title }}</p>
    <a href="{{ $post->link }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
        Read more
        <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
    </a>
</div>
</div> --}}



@props(['post'])
<div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
    {{-- <a href="#"> --}}
        <img class="rounded-base" src="{{  $post->image }}" alt="card image" />
{{-- <img class="rounded-base" src="{{ Storage::url($post->image) }}" alt="card image" /> --}}
        {{-- </a> --}}
        <h5 class="mt-6 mb-2 text-2xl font-semibold tracking-tight text-heading line-clamp-1 leading-normal overflow-hidden">{{  $post->title }}</h5>
    <div class="line-clamp-3 leading-normal overflow-hidden">
        {!! $post->body !!}
    </div>
    <div class="p-3 m-3">
        <a href="{{ route('news.show', $post->id) }}" class="inline-flex items-center text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
            <span class="p-2">
                اقراء المزيد
            </span>
            <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5 mt-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M21,11H5.41l1.3-1.29A1,1,0,0,0,5.29,8.29l-3,3a1,1,0,0,0,0,1.42l3,3a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L5.41,13H21a1,1,0,0,0,0-2Z"/></svg>
        </a>
    </div>
</div>
