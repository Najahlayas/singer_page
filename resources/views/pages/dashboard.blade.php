@extends('layouts.site-template')

@section('title', 'Dashboard')

@section('content')
    <div class="grid grid-cols-3 gap-6">

        <x-small-card number="86" label="الاعمال الفنية"
            svgIcon="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z"
            iconColor="text-purple-700" iconBgColor="bg-purple-300" link="#" />

        <x-small-card number="18" label="الصلاحيات"
            svgIcon="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z"
            iconColor="text-orange-600" iconBgColor="bg-orange-300" link="#" />


        <x-small-card number="7" label="الادوار"
            svgIcon="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"
            iconColor="text-green-700" iconBgColor="bg-green-300" link="#" />
    </div>


    {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        </div> --}}

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">

        <!-- Card 1: Welcome -->
        <x-large-card class="flex flex-col items-center justify-center text-center">
            <h3 class="text-xl font-bold mb-2">مرحباً بك في لوحة التحكم</h3>
            <p class="text-gray-500 mb-4">من هنا يمكنك إدارة المستخدمين والأدوار</p>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZGhZDucviAt1l8J23PFaPte3ak2siFmkBNdE--7H-IA&s=10"
                class="rounded-full w-24 h-24 object-cover">
        </x-large-card>

        <!-- Card 2: Recent Works -->
        <x-large-card title="آخر الأعمال المضافة">
            <x-slot name="action">
                <a href="#" class="text-sm text-purple-600 hover:underline">عرض الكل</a>
            </x-slot>

        <div class="space-y-6">
            <x-partials.dashboard-news-card link="#" image="https://placehold.co/40/orange/white" title="هدوء البحر" date="25 مايو 2026" />
            <x-partials.dashboard-news-card link="#" image="https://placehold.co/40/green/white" title="تجريد ألوان" date="24 مايو 2026" />
            <x-partials.dashboard-news-card link="#" image="https://placehold.co/40/blue/white" title="لحظة تأمل" date="22 مايو 2026" />
        </div>
    </x-large-card>

    <!-- Card 3: Analytics/Chart -->
    <x-large-card>
        <div class="flex justify-between items-start">
            <div>
                <h5 class="text-2xl font-semibold">32.4k</h5>
                <p class="text-gray-500">Users this week</p>
            <div class="space-y-6">
                <x-news-card link="#" image="https://placehold.co/40/orange/white" title="هدوء البحر"
                    date="25 مايو 2026" />
                <x-news-card link="#" image="https://placehold.co/40/green/white" title="تجريد ألوان"
                    date="24 مايو 2026" />
                <x-news-card link="#" image="https://placehold.co/40/blue/white" title="لحظة تأمل"
                    date="22 مايو 2026" />
            </div>
        </x-large-card>

        <!-- Card 3: Analytics/Chart -->
        <x-large-card>
            <div class="flex justify-between items-start">
                <div>
                    <h5 class="text-2xl font-semibold">32.4k</h5>
                    <p class="text-gray-500">Users this week</p>
                </div>
                <div class="flex items-center text-green-500">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path d="M5 15l7-7 7 7" />
                    </svg>
                    12%
                </div>
            </div>

            <div id="area-chart" class="py-4"></div>

            <div class="flex justify-between items-center border-t pt-4">
                {{-- You could put your dropdown component here --}}
                <button class="text-sm font-medium text-gray-500">Last 7 days</button>
                <a href="#" class="text-purple-600 text-sm font-bold">Users Report</a>
            </div>
        </x-large-card>

    <x-partials.vinyl-card title="هدوء البحر" artist="فنان مجهول" albumCover="album1.jpg" audioUrl="audio1.mp3" :isPlaying="true" />

</div>

@endsection
