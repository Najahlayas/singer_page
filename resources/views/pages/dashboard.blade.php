@extends('layouts.site-template')

@section('title', 'Dashboard')

@section('content')

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <x-small-card number="{{ $works }}" label="الاعمال الفنية"
            svgIcon="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z"
            iconColor="text-purple-700" iconBgColor="bg-purple-300" link="/works" />


        <x-small-card number="{{ $permissions }}" label="الصلاحيات"
            svgIcon="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z"
            iconColor="text-orange-600" iconBgColor="bg-orange-300" link="/permissions" />


        <x-small-card number="{{ $roles }}" label="الادوار"
            svgIcon="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"
            iconColor="text-green-700" iconBgColor="bg-green-300" link="/roles" />

    </div>



    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">


        {{-- Welcome Card --}}

        <x-large-card>

            <div class="flex flex-col items-center justify-center text-center">

                <h3 class="text-xl font-bold mb-2">
                    مرحباً بك في لوحة التحكم
                </h3>


                <p class="text-gray-500 mb-4">
                    من هنا يمكنك إدارة المستخدمين والأدوار
                </p>


                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZGhZDucviAt1l8J23PFaPte3ak2siFmkBNdE--7H-IA&s=10"
                    class="rounded-full w-24 h-24 object-cover">

            </div>

        </x-large-card>




        {{-- Latest News --}}

        <x-large-card title="آخر الأخبار المضافة">

            <x-slot name="action">

                <a href="/news" class="text-sm text-purple-600 hover:underline">
                    عرض الكل
                </a>

            </x-slot>


            <div class="space-y-6">


                @foreach ($latestNews as $latest)
                    <x-partials.dashboard-news-card link="{{ route('news.show', $latest->id) }}"
                        image="{{ $latest->image }}" title="{{ $latest->title }}" date="{{ $latest->updated_at }}" />
                @endforeach


            </div>


        </x-large-card>





        {{-- Chart --}}

        <x-large-card>


            <div>

                <h5 class="text-2xl font-semibold">
                    معدل الأفكار
                </h5>


                <p class="text-gray-500">
                    خلال هذا الأسبوع
                </p>


            </div>



            <div class="py-5">

                <canvas id="ideasChart"></canvas>

            </div>



            <div class="flex justify-between items-center border-t pt-4">


                <span class="text-sm text-gray-500">
                    آخر 7 أيام
                </span>


                <a href="/news" class="text-purple-600 text-sm font-bold">
                    عرض الأخبار
                </a>


            </div>



        </x-large-card>



    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
        const labels = @json($ideasChart->pluck('day'));


        const data = @json($ideasChart->pluck('total'));



        new Chart(document.getElementById('ideasChart'), {


            type: 'line',


            data: {


                labels: labels,


                datasets: [{


                    label: 'عدد الأفكار',


                    data: data,


                    borderWidth: 2,


                    tension: 0.4


                }]


            },


            options: {


                responsive: true,


                scales: {


                    y: {


                        beginAtZero: true


                    }


                }


            }


        });
    </script>



@endsection
