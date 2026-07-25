@extends('layouts.site-template')


@section('title','Add New Article')


@section('content')
{{-- 1. Change Action and Method dynamically --}}
<form id="newsForm"
      enctype="multipart/form-data"
      action="{{ isset($post) ? route('news.update', $post->id) : route('news.store') }}"
      method="POST">

    @csrf
    @if(isset($post))
        @method('PUT')
    @endif

    <div class="flex flex-col items-start gap-4 p-5">
        {{-- 2. Show Image Preview if editing --}}
        @if(isset($post) && $post->image)
            <div class="mb-2">
                <p class="text-sm text-gray-500 mb-1">الصورة الحالية:</p>
                <img src="{{ $post->image }}" class="w-32 h-20 object-cover rounded border">
            </div>
        @endif

        @if(isset($post) && $post->image)
        <label>غير صورة الخبر </label>
        @else
        <label>صورة الخبر</label>
        @endif
        <input type="file" name="image" class="border p-2">

        <label>عنوان الخبر</label>
        {{-- 3. Fill Title input --}}
        <input type="text"
               name="title"
               value="{{ old('title', $post->title ?? '') }}"
               class="w-full border-2 p-2 rounded"
               placeholder="أدخل العنوان هنا">
    </div>

    {{-- 4. Fill Hidden Body Input (Important for Tiptap) --}}
    <input type="hidden" name="body" id="news-content" value="{{ old('body', $post->body ?? '') }}">

    <div class="w-full bg-neutral-secondary-medium border border-default-medium rounded-base">
        <x-partials.text-editor />
        <div class="px-4 py-2 bg-neutral-primary  rounded-b-lg">
            {{-- 5. Inject initial content into the Tiptap div --}}
            <div id="wysiwyg-example"></div>
        </div>
    </div>

    <div class="flex items-end justify-end w-full">
        <button type="submit" class="mt-4 px-6 py-2 bg-blue-600 text-white rounded font-bold">
            {{ isset($post) ? 'تحديث الخبر' : 'حفظ الخبر' }}
        </button>
    </div>
</form>

@push('scripts')
    @vite(['resources/js/editor.js'])
@endpush
@endsection
