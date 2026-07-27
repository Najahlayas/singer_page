@extends('layouts.site-template')

{{-- @section('title', 'works') --}}
@section('page-title')
    الأعمال
@endsection

@section('title')
    الأعمال
@endsection

@section('content')
    <div class="p-6 max-w-7xl mx-auto" dir="rtl">

        @role('admin')
            <x-header title="الأعمال" breadcrumb="الرئيسية / الأعمال">

                <x-actions-button target="create-work" />

            </x-header>



            {{-- Add Work Modal --}}
            <x-modal id="create-work" title="إضافة عمل">

                <form action="{{ route('works.store') }}" method="POST">

                    @csrf


                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            اسم الالبوم
                        </label>

                        <input type="text" name="album_title" class="w-full border rounded-lg p-2" required>
                    </div>



                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            اسم الاغنية
                        </label>

                        <input type="text" name="song_title" class="w-full border rounded-lg p-2" required>
                    </div>



                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            رابط صورة الاغنية
                        </label>

                        <input type="url" name="song_image" class="w-full border rounded-lg p-2" required>
                    </div>



                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            رابط صورة الالبوم
                        </label>

                        <input type="url" name="album_art" class="w-full border rounded-lg p-2" required>
                    </div>



                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            رابط الاغنية
                        </label>

                        <input type="url" name="audio_url" class="w-full border rounded-lg p-2" required>
                    </div>



                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                        حفظ

                    </button>


                </form>

            </x-modal>
        @endrole





        {{-- Works --}}
        <div class="bg-white shadow-xl rounded-lg p-6 mt-6">


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-4">


                @foreach ($works as $work)
                    <div class="relative">


                        {{-- Card only --}}
                        <x-partials.vinyl-card :work="$work" />

                    </div>




                    @role('admin')
                        {{-- Edit Modal --}}
                        <x-modal id="edit-work-{{ $work->id }}" title="تعديل العمل">


                            <form action="{{ route('works.update', $work->id) }}" method="POST">


                                @csrf
                                @method('PUT')



                                <div class="mb-3">

                                    <label class="block mb-1 text-sm">
                                        اسم الالبوم
                                    </label>

                                    <input type="text" name="album_title" value="{{ $work->album_title }}"
                                        class="w-full border rounded-lg p-2" required>

                                </div>




                                <div class="mb-3">

                                    <label class="block mb-1 text-sm">
                                        اسم الاغنية
                                    </label>

                                    <input type="text" name="song_title" value="{{ $work->song_title }}"
                                        class="w-full border rounded-lg p-2" required>

                                </div>




                                <div class="mb-3">

                                    <label class="block mb-1 text-sm">
                                        رابط صورة الاغنية
                                    </label>

                                    <input type="url" name="song_image" value="{{ $work->song_image }}"
                                        class="w-full border rounded-lg p-2" required>

                                </div>




                                <div class="mb-3">

                                    <label class="block mb-1 text-sm">
                                        رابط صورة الالبوم
                                    </label>

                                    <input type="url" name="album_art" value="{{ $work->album_art }}"
                                        class="w-full border rounded-lg p-2" required>

                                </div>




                                <div class="mb-3">

                                    <label class="block mb-1 text-sm">
                                        رابط الاغنية
                                    </label>

                                    <input type="url" name="audio_url" value="{{ $work->audio_url }}"
                                        class="w-full border rounded-lg p-2" required>

                                </div>




                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                                    حفظ

                                </button>


                            </form>


                        </x-modal>
                    @endrole
                @endforeach


            </div>
            <div class="mt-4">
                {{ $works->links() }}
            </div>

        </div>


    </div>
@endsection
