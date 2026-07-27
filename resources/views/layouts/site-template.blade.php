@extends('layouts.app')

@section('title', $title ?? 'Default Title')
@section('page')
    <div x-data="{ sidebarOpen: false }">
        {{-- class="h-20 fixed top-0 z-40 w-full bg-white shadow px-6 flex items-center justify-between"> --}}
        <nav class=" h-20 fixed top-0 z-40 w-full  bg-white shadow px-6 sm:w-[calc(100%-16rem)] left-0 items-center">
            <div class="px-3 py-3 lg:px-5">
                <div class="flex items-center justify-between">

                    <div class="flex items-center gap-2 p-4">
                        <button @click="sidebarOpen = !sidebarOpen" class="p-2 text-gray-600 sm:hidden">
                            <svg class="w-6 h-6 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-800 m-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                            </svg>
                            <h4 class="flex justify-center font-bold"> @yield('page-title', 'الرئيسية')
                            </h4>
                        </div>
                    </div>
                    <x-dropdown align="left" width="48">

                        <x-slot name="trigger">

                            <div class="flex items-center">

                                <span class="me-2 text-black text-sm font-medium">
                                    مرحبا، {{ Auth::user()->name }}
                                </span>

                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg">

                            </div>

                        </x-slot>

                        <x-slot name="content">

                            <a href="/profile" class=" block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                الملف الشخصي
                            </a>


                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="block w-full text-right px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    تسجيل الخروج
                                </button>

                            </form>

                        </x-slot>

                    </x-dropdown>
                </div>
            </div>
        </nav>


        <div x-show="sidebarOpen" x-transition:opacity @click="sidebarOpen = false"
            class="fixed inset-0 z-30 bg-gray-900/50 sm:hidden">
        </div>

        <aside id="default-sidebar" :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'"
            class="fixed z-50 top-20 sm:top-0 right-0 sm:z-40 w-64 h-screen transition-transform  sm:translate-x-0"
            aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto border-s bg-gray-800 border-e border-purple-800">
                <div class="flex flex-col items-center justify-center mb-5">
                    <img class="w-36 h-36" src="https://placehold.co/360/purple/white" alt="logo">
                    @role('admin')
                        <h3 class = "text-xl font-bold text-white  p-3">لوحة التحكم</h3>
                    @endrole
                </div>
                <ul class="space-y-2 font-medium">

                    @role('admin')
                        <x-nav-bar-btn link="/dashboard" :active="request()->is('dashboard')" label="الرئيسية"
                            svgIcon="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        <x-nav-bar-btn link="/users" :active="request()->is('users')" label="المستخدمون"
                            svgIcon="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <x-nav-bar-btn link="/roles" :active="request()->is('roles')" label="الادوار"
                            svgIcon="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z" />
                        <x-nav-bar-btn link="/permissions" :active="request()->is('permissions')" label="الصلاحيات"
                            svgIcon="M9.5 11.5 11 13l4-3.5M12 20a16.405 16.405 0 0 1-5.092-5.804A16.694 16.694 0 0 1 5 6.666L12 4l7 2.667a16.695 16.695 0 0 1-1.908 7.529A16.406 16.406 0 0 1 12 20Z" />
                        <hr class="my-5 border-gray-100">
                    @endrole
                    <x-nav-bar-btn link="/news" :active="request()->is('news')" label="الاخبار"
                        svgIcon="M19 7h1v12a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1V5a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h11.5M7 14h6m-6 3h6m0-10h.5m-.5 3h.5M7 7h3v3H7V7Z" />
                    <x-nav-bar-btn link="/works" :active="request()->is('works')" label="الاعمال الفنية"
                        svgIcon="M8 18c0 1.1046-.89543 2-2 2s-2-.8954-2-2 .89543-2 2-2 2 .8954 2 2Zm0 0V6.33333L18 4v11.6667M8 10.3333 18 8m0 8c0 1.1046-.8954 2-2 2s-2-.8954-2-2 .8954-2 2-2 2 .8954 2 2Z" />
                </ul>
            </div>
        </aside>

        <main class="p-6 sm:ms-64 mt-16">
            @yield('content')
        </main>
    </div>
@endsection('page')
