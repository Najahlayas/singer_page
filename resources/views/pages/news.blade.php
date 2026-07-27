@extends('layouts.site-template')


{{-- @section('title', 'news') --}}
@section('page-title')
    الأخبار
@endsection

@section('content')
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        {{-- btn to add news --}}
        <x-header title="الأخبار" breadcrumb="الرئيسية / الأخبار">

            <x-actions-button target="create-news" />

        </x-header>


        <x-modal id="create-news" title="إضافة خبر">

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        عنوان الخبر
                    </label>

                    <input type="text" name="title" class="w-full border rounded-lg p-2" required>
                </div>

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        صورة الخبر
                    </label>

                    <input type="file" name="image" class="w-full border rounded-lg p-2" required>
                </div>



                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        محتوى الخبر
                    </label>

                    <textarea name="body" class="w-full border rounded-lg p-2" rows="5" required></textarea>
                </div>


                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    حفظ
                </button>

            </form>

        </x-modal>


        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-8 p-4">
                @foreach ($news as $post)
                    <div>
                        <x-partials.news-card :post="$post" />
                    </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{ $news->links() }}
            </div>
        </div>
    </div>
    </div>
@endsection
