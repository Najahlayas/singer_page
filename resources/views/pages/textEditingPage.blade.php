@extends('layouts.site-template')


@section('title','Add New Article')


@section('content')
<form id="newsForm" enctype="multipart/form-data" action="{{ route('news.store') }}" method="POST">
    @csrf

<div class="flex flex-col items-start">
    <input type="file" name="image" class="m-5">
    <input type="text" name="title" class="m-5 border-2">
</div>

    <!-- Hidden input to store the editor HTML -->
    <input type="hidden" name="body" id="news-content">

    <div class="w-full bg-neutral-secondary-medium border border-default-medium rounded-base">
        <!-- ... (Paste your Toolbar HTML here) ... -->
        <x-partials.text-editor />
        <div class="px-4 py-2 bg-neutral-primary rounded-b-lg">
            <div id="wysiwyg-example"></div>
        </div>
    </div>

    <div class="flex items-end justify-end w-full">
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">
        حفظ الخبر
    </button>
    </div>
</form>

@push('scripts')
    @vite(['resources/js/editor.js'])
@endpush
@endsection
