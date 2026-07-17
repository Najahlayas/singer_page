<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title> @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>

<body>
    <header class="h-16 bg-white shadow flex items-center justify-between px-6">
        <div class="flex items-center justify-left"> <button id="menu-btn" class="p-2 rounded hover:bg-gray-100"> <svg
                    class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                </svg> </button>
            <h2 class="text-xl font-bold"> الرئيسية </h2>
        </div>

        <div class="flex items-center gap-2.5"> <img class="w-10 h-10 rounded-full"
                src="/docs/images/people/profile-picture-5.jpg" alt="">
            <div class="font-medium text-heading">
                <div>اسم المستخدم</div>
                <div class="text-sm font-normal text-body">email@example.com</div>
            </div>
        </div>
    </header>

    <aside id="default-sidebar"
        class="fixed top-0 right-0 z-50 w-64 h-full translate-x-full transition-transform duration-300">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 border-e border-purple-800"> <button id="close-btn"
                class="text-white hover:text-red-500"> <svg class="w-6 h-6" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg> </button>

            <ul class="space-y-2 font-medium">
                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg> <span class="ms-3">الرئيسية</span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg> <span class="flex-1 ms-3 whitespace-nowrap">المستخدمون</span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg> <span class="flex-1 ms-3 whitespace-nowrap">الادوار</span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z" />
                        </svg> <span class="flex-1 ms-3 whitespace-nowrap">الصلاحيات</span> </a> </li>
                <hr class="my-5 border-gray-100">

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                        </svg> <span class="ms-3">الاخبار </span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z" />
                        </svg> <span class="ms-3">الاعمال الفنية</span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                        </svg> <span class="ms-3">التصنيفات </span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                        </svg> <span class="ms-3">الرسائل</span> </a> </li>

                <li> <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base"> <svg
                            class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2" />
                        </svg> <span class="ms-3">الاعدادات</span> </a> </li>

                <li> <a href="#"
                        class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group text-red-600">
                        <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg> <span class="flex-1 ms-3 whitespace-nowrap">تسجيل الخروج </span> </a> </li>
            </ul>
        </div>
    </aside>

    <main class="p-6">
        <div class="grid grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow h-40">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-8">
                        <div class="text-right">
                            <h2 class="text-3xl font-bold text-gray-900">86</h2>
                            <p class="text-sm text-gray-500 mt-1">الاعمال الفنية</p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-purple-300 flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-700 " aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z" />
                            </svg>
                        </div>

                    </div>
                    <div class="flex justify-start" dir="ltr">
                        <a href="#"
                            class="flex items-center gap-1 text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            عرض الكل
                        </a>
                    </div>

                </div>

            </div>
            <div class="bg-white rounded-xl shadow h-40">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-8">
                        <div class="text-right">
                            <h2 class="text-3xl font-bold text-gray-900">18</h2>
                            <p class="text-sm text-gray-500 mt-1">الصلاحيات </p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-orange-300 flex items-center justify-center">
                            <svg class="w-6 h-6 text-orange-600" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z" />
                            </svg>
                        </div>

                    </div>
                    <div class="flex justify-start" dir="ltr">
                        <a href="#"
                            class="flex items-center gap-1 text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            عرض الكل
                        </a>
                    </div>

                </div>
            </div>
            <div class="bg-white rounded-xl shadow h-40">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
                    <div class="flex items-center justify-between mb-8">
                        <div class="text-right">
                            <h2 class="text-3xl font-bold text-gray-900">7</h2>
                            <p class="text-sm text-gray-500 mt-1">الادوار </p>
                        </div>
                        <div class="w-12 h-12 rounded-lg bg-green-300 flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                            </svg>
                        </div>

                    </div>
                    <div class="flex justify-start" dir="ltr">
                        <a href="#"
                            class="flex items-center gap-1 text-sm font-medium text-purple-600 hover:text-purple-700 transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                            عرض الكل
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white rounded-xl shadow p-6 flex flex-col items-center justify-center">
                <h3 class="text-xl font-bold mb-2">مرحباً بك في لوحة التحكم</h3>
                <p class="text-gray-500 mb-4 text-center">من هنا يمكنك إدارة المستخدمين والأدوار</p>
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZGhZDucviAt1l8J23PFaPte3ak2siFmkBNdE--7H-IA&s=10"
                    class="rounded-full w-24 h-24 object-cover">
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <div class="flex justify-between mb-6">
                    <h3 class="text-lg font-bold">آخر الأعمال المضافة</h3>
                    <a href="#" class="text-sm text-purple-600 hover:underline">عرض الكل</a>
                </div>
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/40" class="w-10 h-10 rounded-lg">
                        <div>
                            <p class="text-sm font-medium">هدوء البحر</p>
                            <p class="text-xs text-gray-500">25 مايو 2026</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/40" alt=" " class="w-10 h-10 rounded-lg">
                        <div>
                            <p class="text-sm font-medium text-gray-900">تجريد ألوان</p>
                            <p class="text-xs text-gray-500">24 مايو 2026</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <img src="https://via.placeholder.com/40" alt=" " class="w-10 h-10 rounded-lg">
                        <div>
                            <p class="text-sm font-medium text-gray-900">لحظة تأمل</p>
                            <p class="text-xs text-gray-500">22 مايو 2026</p>
                        </div>
                    </div>
                </div>
            </div>


            <div
                class="max-w-sm w-full bg-neutral-primary-soft border border-default rounded-base shadow-xs p-4 md:p-6">
                <div class="flex justify-between items-start">
                    <div>
                        <h5 class="text-2xl font-semibold text-heading">32.4k</h5>
                        <p class="text-body">Users this week</p>
                    </div>
                    <div class="flex items-center px-2.5 py-0.5 font-medium text-fg-success text-center">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M12 6v13m0-13 4 4m-4-4-4 4" />
                        </svg>
                        12%
                    </div>
                </div>
                <div id="area-chart"></div>
                <div class="grid grid-cols-1 items-center border-light border-t justify-between">
                    <div class="flex justify-between items-center pt-4 md:pt-6">
                        <!-- Button -->
                        <button id="dropdownDefaultButton" data-dropdown-toggle="lastDaysdropdown"
                            data-dropdown-placement="bottom"
                            class="text-sm font-medium text-body hover:text-heading text-center inline-flex items-center"
                            type="button">
                            Last 7 days
                            <svg class="w-4 h-4 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m19 9-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="lastDaysdropdown"
                            class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-44">
                            <ul class="p-2 text-sm text-body font-medium" aria-labelledby="dropdownDefaultButton">
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Yesterday</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Today</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Last
                                        7 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Last
                                        30 days</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">Last
                                        90 days</a>
                                </li>
                            </ul>
                        </div>
                        <a href="#"
                            class="inline-flex items-center text-fg-brand bg-transparent box-border border border-transparent hover:bg-neutral-secondary-medium focus:ring-4 focus:ring-neutral-tertiary font-medium leading-5 rounded-base text-sm px-3 py-2 focus:outline-none">
                            Users Report
                            <svg class="w-4 h-4 ms-1.5 -me-0.5 rtl:rotate-180" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </main>
</body>

</html>
