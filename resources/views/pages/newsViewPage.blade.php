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

        <div class="flex items-center gap-3">

            <x-edit-button :route="route('news.edit', $post->id)" label="تعديل" />
            <x-delete-form :route="route('news.destroy', $post->id)" type="الخبر" :id="$post->id" label="حذف" :iconOnly="false" />
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


@endsection
