<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .active-link {
            background-color: #5D5FEF;
        }
    </style>
    <title>Dashboard</title>
</head>

<body>
    <header class="h-16 bg-white shadow flex items-center justify-between px-6">

        <button id="menu-btn" class="p-2 rounded hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <h2 class="text-xl font-bold">
            لوحة التحكم
        </h2>

    </header>

    <aside id="default-sidebar"
        class="fixed top-0 right-0 z-50 w-64 h-full translate-x-full transition-transform duration-300">
        <div class="h-full px-3 py-4 overflow-y-auto bg-gray-800 border-e border-purple-800">

            <div class="flex items-center justify-between mb-6">

                <h2 class="text-xl font-bold text-white">
                    اسم الموقع
                </h2>

                <button id="close-btn" class="p-2 rounded-lg hover:bg-gray-700 transition-colors text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

            </div>

            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg>

                        <span class="ms-3">الرئيسية</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2"
                                d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">المستخدمون</span>

                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">الادوار</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z" />
                        </svg>


                        <span class="flex-1 ms-3 whitespace-nowrap">الصلاحيات</span>
                    </a>
                </li>
                <hr class="my-5 border-gray-100">
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z" />
                        </svg>


                        <span class="ms-3">الاعمال الفنية</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M13.5 8H4m0-2v13a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1h-5.032a1 1 0 0 1-.768-.36l-1.9-2.28a1 1 0 0 0-.768-.36H5a1 1 0 0 0-1 1Z" />
                        </svg>


                        <span class="ms-3">التصنيفات </span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                        </svg>


                        <span class="ms-3">الرسائل</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link flex items-center px-2 py-1.5 text-white rounded-base">
                        <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M6 4v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2m6-16v2m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v10m6-16v10m0 0a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m0 0v2" />
                        </svg>


                        <span class="ms-3">الاعدادات</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center px-2 py-1.5 text-body rounded-base hover:bg-neutral-tertiary hover:text-fg-brand group text-red-600">
                        <svg class="w-6 h-6 text-red-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2" />
                        </svg>

                        <span class="flex-1 ms-3 whitespace-nowrap">تسجيل الخروج </span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>

    <main class="p-6">
        <div class="grid grid-cols-3 gap-6">

            <div class="bg-white rounded-xl shadow h-40"></div>

            <div class="bg-white rounded-xl shadow h-40"></div>

            <div class="bg-white rounded-xl shadow h-40"></div>

        </div>

        <div class="grid grid-cols-4 gap-6 mt-6">

            <div class="col-span-2 bg-white rounded-xl shadow h-60"></div>

            <div class="bg-white rounded-xl shadow h-60"></div>

            <div class="bg-white rounded-xl shadow h-60"></div>

        </div>

    </main>
    {{--  active +Sidebar  --}}
    <script>
        const navLinks = document.querySelectorAll('.nav-link');

        navLinks.forEach(link => {
            link.addEventListener('click', function() {

                navLinks.forEach(item => {
                    item.classList.remove('active-link');
                });

                this.classList.add('active-link');

            });
        });

        const sidebar = document.getElementById("default-sidebar");
        const menuBtn = document.getElementById("menu-btn");
        const closeBtn = document.getElementById("close-btn");

        menuBtn.addEventListener("click", () => {
            sidebar.classList.remove("translate-x-full");
        });

        closeBtn.addEventListener("click", () => {
            sidebar.classList.add("translate-x-full");
        });
    </script>

</body>

</html>
