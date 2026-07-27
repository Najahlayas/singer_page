@extends('layouts.site-template')


{{-- @section('title', 'roles') --}}
@section('page-title')
    الأدوار
@endsection

@section('title')
    الأدوار
@endsection

@section('content')


    <div class="p-6 max-w-7xl mx-auto" dir="rtl">



        <x-header title="الأدوار" breadcrumb="الرئيسية / الأدوار">

            <x-actions-button target="create-role" />

        </x-header>



        <x-search action="{{ route('roles.index') }}" placeholder="ابحث عن دور..." value="{{ request('search') }}" />




        <x-table>


            <x-slot name="headers">

                <th class="py-4 px-6 font-semibold">
                    اسم الدور
                </th>


                <th class="py-4 px-6 font-semibold">
                    عدد المستخدمين
                </th>


                <th class="py-4 px-6 font-semibold">
                    الصلاحيات
                </th>


                <th class="py-4 px-6 font-semibold">
                    الإجراءات
                </th>


            </x-slot>




            <x-slot name="rows">


                @forelse($roles as $role)
                    <tr class="hover:bg-gray-50">



                        <td class="py-4 px-6 font-medium">

                            {{ $role->name }}

                        </td>




                        <td class="py-4 px-6">

                            {{ $role->users_count }}

                        </td>



                        <td class="py-4 px-6">

                            <x-dropdown>

                                <x-slot:trigger>
                                    <button
                                        class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-sm flex items-center gap-1">

                                        {{ $role->permissions->count() }} صلاحيات

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </x-slot:trigger>


                                <x-slot:content>
                                    <ul class="text-sm space-y-1 text-center">

                                        @foreach ($role->permissions as $permission)
                                            <li class="border-b pb-1">
                                                {{ $permission->name }}
                                            </li>
                                        @endforeach

                                    </ul>
                                </x-slot:content>

                            </x-dropdown>

                        </td>




                        <td class="py-4 px-6">


                            <div class="flex gap-2">



                                <x-edit-button target="edit-role-{{ $role->id }}" />

                                <x-delete-form :route="route('roles.destroy', $role->id)" type="الدور" :id="$role->id" />
                            </div>


                        </td>



                    </tr>



                @empty


                    <tr>

                        <td colspan="4" class="text-center py-6">

                            لا توجد بيانات

                        </td>

                    </tr>
                @endforelse


            </x-slot>


        </x-table>




        <div class="mt-4">

            {{ $roles->links() }}

        </div>




        @foreach ($roles as $role)
            <x-modal id="edit-role-{{ $role->id }}" title="تعديل الدور">

                <form action="{{ route('roles.update', $role->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            اسم الدور
                        </label>

                        <input name="name" value="{{ $role->name }}" class="w-full border rounded-lg p-2">
                    </div>


                    <div class="mb-3">

                        <label class="block mb-2 text-sm">
                            الصلاحيات
                        </label>

                        <div class="grid grid-cols-2 gap-2">

                            @foreach ($permissions as $permission)
                                <label class="flex items-center gap-2 cursor-pointer">

                                    <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                        class="appearance-auto w-4 h-4" @checked($role->permissions->contains('name', $permission->name))>

                                    <span>
                                        {{ $permission->name }}
                                    </span>

                                </label>
                            @endforeach

                        </div>
                    </div>


                    <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                        حفظ
                    </button>

                </form>

            </x-modal>
        @endforeach
        <x-modal id="create-role" title="إضافة دور">

            <form action="{{ route('roles.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        اسم الدور
                    </label>

                    <input name="name" type="text" class="w-full border rounded-lg p-2" required>
                </div>


                <div class="mb-3">

                    <label class="block mb-2 text-sm">
                        الصلاحيات
                    </label>


                    <div class="grid grid-cols-2 gap-2">

                        @foreach ($permissions as $permission)
                            <label class="flex items-center gap-2">

                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                    class="appearance-auto w-4 h-4">
                                <span>
                                    {{ $permission->name }}
                                </span>

                            </label>
                        @endforeach

                    </div>

                </div>


                <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    حفظ
                </button>

            </form>

        </x-modal>


    </div>


@endsection
