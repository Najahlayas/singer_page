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
@endsection
