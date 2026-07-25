@extends('layouts.site-template')


@section('title','news')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    {{-- btn to add news --}}
    <div class="flex justify-end m-4">
    <a href="{{ route('news.create') }}" class="inline-flex items-center text-white bg-brand hover:bg-brand-strong border border-transparent shadow-xs font-medium rounded-base text-sm px-4 py-2.5">
    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="64px" height="64px" fill="none" viewBox="0 0 32 32">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2 L16 30 M2 16 L30 16"/>
    </svg>
   <span class="flex-1 text-center whitespace-nowrap p-2">
    اضف خبر جديد
</span>
    </a>
    </div>



    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 p-4">
    @foreach ($news as $post)
    <div>
    <x-partials.news-card  :post="$post"/>
    </div>
    @endforeach
    </div>
    </div>
    </div>
    </div>

{{-- @push('modals')
<x-layouts.popup-template title="هل انت متأكد من حذف هذا الخبر؟" id="delete-news-modal-{{ $work->id }}">
    <div class="w-full flex justify-center items-center space-x-4 border-t border-default pt-4 md:pt-6 gap-3">
    <form method="POST" action="{{ route('news.destroy', $work) }}">
            @csrf
            @method('DELETE')
             <button type="submit" class="w-fit text-center px-4 py-2 text-sm text-black hover:text-red-600 border border-default rounded-base  flex items-center hover:bg-red-100 gap-2">
                <span>
                    حذف
                </span>
            </button>
            </form>
            <button data-modal-target="delete-news-modal-{{ $work->id }}" data-modal-hide="delete-news-modal-{{ $work->id }}" type="button" class="w-fit text-center px-4 py-2 text-sm text-black hover:bg-gray-100 flex items-center border border-default rounded-base  gap-2">
                <span>
                    الغاء
                </span>
            </button>
    </div>
    </x-layouts.popup-template>

<x-layouts.popup-template title="تعديل على خبر " id="edit-news-modal-{{ $work->id }}">
        <form action="{{ route('news.update', $work->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    <div class="col-span-2">
                        <label for="album_title" class="block mb-2.5 text-sm font-medium text-heading">اسم الالبوم</label>
                        <input type="text" value="{{ $work->album_title }}" name="album_title" id="album_title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type album title" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="song_title" class="block mb-2.5 text-sm font-medium text-heading">اسم الاغنية</label>
                        <input type="text" value="{{ $work->song_title }}" name="song_title" id="song_title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type song title" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="song_image" class="block mb-2.5 text-sm font-medium text-heading">رابط صورة الاغنية</label>
                        <input type="text" value="{{ $work->song_image }}" name="song_image" id="song_image" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type song image url" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="album_art" class="block mb-2.5 text-sm font-medium text-heading">رابط صورة الالبوم</label>
                        <input type="text" value="{{ $work->album_art }}" name="album_art" id="album_art" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type album image url" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="audio_url" class="block mb-2.5 text-sm font-medium text-heading">رابط الاغنية</label>
                        <input type="text" value="{{ $work->audio_url }}" name="audio_url" id="audio_url" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type audio url" required="">
                    </div>

                    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 gap-3">
                    <button type="submit" class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                    حفظ
                    </button>
                    <button data-modal-hide="edit-work-modal-{{ $work->id }}" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">الغاء</button>
                </div>
            </form>
    </x-layouts.popup-template>
    @endpush --}}
@endsection
