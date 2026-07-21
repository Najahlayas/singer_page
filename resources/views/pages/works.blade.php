@extends('layouts.site-template')


@section('title','works')

@section('content')
<div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
    <div class="flex justify-end m-4">
    <button data-modal-target="add-user-modal" data-modal-toggle="add-user-modal"  type="button" class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
    <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="64px" height="64px" fill="none" viewBox="0 0 32 32">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 2 L16 30 M2 16 L30 16"/>
    </svg>
   <span class="flex-1 text-center whitespace-nowrap p-2">
    اضف عمل جديد
</span>
</button>
    </div>
    <x-layouts.popup-template title="اضافة عمل جديد" id="add-user-modal">
        <form action="#">
                <div class="grid gap-4 grid-cols-2 py-4 md:py-6">
                    <div class="col-span-2">
                        <label for="album-title" class="block mb-2.5 text-sm font-medium text-heading">اسم الالبوم</label>
                        <input type="text" name="album-title" id="album-title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type album title" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="song-title" class="block mb-2.5 text-sm font-medium text-heading">اسم الاغنية</label>
                        <input type="text" name="song-title" id="song-title" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type song title" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="song-image-url" class="block mb-2.5 text-sm font-medium text-heading">رابط صورة الاغنية</label>
                        <input type="text" name="song-image-url" id="song-image-url" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type song image url" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="album-image-url" class="block mb-2.5 text-sm font-medium text-heading">رابط صورة الالبوم</label>
                        <input type="text" name="album-image-url" id="album-image-url" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type album image url" required="">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="audio-url" class="block mb-2.5 text-sm font-medium text-heading">رابط الاغنية</label>
                        <input type="text" name="audio-url" id="audio-url" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="Type audio url" required="">
                    </div>

                    <div class="flex items-center space-x-4 border-t border-default pt-4 md:pt-6 gap-3">
                    <button type="submit" class="inline-flex items-center  text-white bg-brand hover:bg-brand-strong box-border border border-transparent focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                        <svg class="w-4 h-4 me-1.5 -ms-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14m-7 7V5"/></svg>
                        اضافة
                    </button>
                    <button data-modal-hide="crud-modal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">الغاء</button>
                </div>
            </form>
    </x-layouts.popup-template>


    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
<div class="grid grid-cols-2 md:grid-cols-3 gap-8 p-4">
    @foreach ($works as $work)
    <div>
    <x-partials.vinyl-card :title="$work->song_title" :artist="$work->album_title" :isPlaying="false" />
    </div>
    @endforeach
    </div>
    </div>
    </div>
@endsection
