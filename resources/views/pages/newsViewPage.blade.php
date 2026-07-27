@extends('layouts.site-template')
{{-- @extends('layouts.app') --}}

@section('title', $post->title) {{-- Show the article title in the browser tab --}}

@section('content')
    {{-- @section('page') --}}



    <div class="mt-10 p-4 w-full flex justify-end">
        <a href="{{ route('news.index') }}" class="text-brand hover:underline">
            العودة إلى الأخبار ←
        </a>
    </div>

    <div class="flex flex-row gap-6">

        <a href="{{ route('news.edit', $post) }}"
            class="btn flex items-center gap-2 text-white bg-blue-600 box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">

            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>

            تعديل

        </a>
        <div class="flex items-center border border-red-200 rounded-md px-2 py-1 hover:bg-red-50 transition">

            <x-delete-form route="{{ route('news.destroy', $post->id) }}" type="الخبر" id="{{ $post->id }}" />

            <span class="mr-1 text-xs text-red-600">
                حذف
            </span>

        </div>

    </div>
    <div class="max-w-5xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-10">

            {{-- 1. Large Image --}}
            <img class="w-full h-auto rounded-base mb-8" src="{{ $post->image }}" alt="{{ $post->title }}" />

            {{-- 2. Title --}}
            <h1 class="text-4xl font-bold text-heading mb-6">{{ $post->title }}</h1>

            {{-- 3. Body Content (Show the full text) --}}
            <div class="prose prose-lg max-w-none text-body">
                {!! $post->body !!}
            </div>

        </div>
    </div>
    @push('modals')
        <x-layouts.popup-template title="هل انت متأكد من حذف هذا العمل؟" id="delete-post-modal-{{ $post->id }}">
            <div class="w-full flex justify-center items-center space-x-4 border-t border-default pt-4 md:pt-6 gap-3">
                <form method="POST" action="{{ route('news.destroy', $post) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="w-fit text-center px-4 py-2 text-sm text-black hover:text-red-600 border border-default rounded-base  flex items-center hover:bg-red-100 gap-2">
                        <span>
                            حذف
                        </span>
                    </button>
                </form>
                <button data-modal-target="delete-post-modal-{{ $post->id }}"
                    data-modal-hide="delete-post-modal-{{ $post->id }}" type="button"
                    class="w-fit text-center px-4 py-2 text-sm text-black hover:bg-gray-100 flex items-center border border-default rounded-base  gap-2">
                    <span>
                        الغاء
                    </span>
                </button>
            </div>
        </x-layouts.popup-template>
    @endpush

@endsection
