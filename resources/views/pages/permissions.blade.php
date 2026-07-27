@extends('layouts.site-template')


{{-- @section('title', 'permissions') --}}
@section('page-title')
    الصلاحيات
@endsection

@section('title')
    الصلاحيات
@endsection

@section('content')

    <div class="p-6 max-w-7xl mx-auto" dir="rtl">


        <x-header title="الصلاحيات" breadcrumb="الرئيسية / الصلاحيات">

            <x-actions-button target="create-permission" />

        </x-header>



        <x-search action="{{ route('permissions.index') }}" placeholder="ابحث عن صلاحية..." value="{{ request('search') }}" />





        <x-table>


            <x-slot name="headers">


                <th class="py-4 px-6 font-semibold">
                    اسم الصلاحية
                </th>


                <th class="py-4 px-6 font-semibold">
                    الوصف
                </th>


                <th class="py-4 px-6 font-semibold">
                    الأدوار المرتبطة
                </th>


                <th class="py-4 px-6 font-semibold">
                    الإجراءات
                </th>


            </x-slot>





            <x-slot name="rows">


                @forelse($permissions as $permission)
                    <tr class="hover:bg-gray-50">



                        <td class="py-4 px-6 font-medium">

                            {{ $permission->name }}

                        </td>




                        <td class="py-4 px-6 text-gray-600">

                            {{ $permission->description ?? '---' }}

                        </td>


                        <td class="py-4 px-6">

                            <x-dropdown>

                                <x-slot:trigger>
                                    <button
                                        class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-lg text-sm flex items-center gap-1">

                                        {{ $permission->roles->count() }} أدوار

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                        </svg>

                                    </button>
                                </x-slot:trigger>

                                <x-slot:content>
                                    <ul class="text-sm space-y-1 text-center">
                                        @foreach ($permission->roles as $role)
                                            <li class="border-b pb-1">
                                                {{ $role->name }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </x-slot:content>

                            </x-dropdown>
                        </td>




                        <td class="py-4 px-6">
                            <div class="flex gap-2">

                                <x-edit-button target="edit-permission-{{ $permission->id }}" /> <x-delete-form
                                    :route="route('permissions.destroy', $permission->id)" type="الصلاحية" :id="$permission->id" />

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

            {{ $permissions->links() }}

        </div>





        @foreach ($permissions as $permission)
            <x-modal id="edit-permission-{{ $permission->id }}" title="تعديل الصلاحية">


                <form action="{{ route('permissions.update', $permission->id) }}" method="POST">


                    @csrf

                    @method('PUT')



                    <label>

                        اسم الصلاحية

                    </label>


                    <input name="name" value="{{ $permission->name }}" class="w-full border rounded-lg p-2 mt-2">




                    <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">

                        حفظ

                    </button>



                </form>



            </x-modal>
        @endforeach

        <x-modal id="create-permission" title="إضافة صلاحية">

            <form action="{{ route('permissions.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        اسم الصلاحية
                    </label>

                    <input name="name" type="text" class="w-full border rounded-lg p-2" required>
                </div>

                <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    حفظ
                </button>

            </form>

        </x-modal>



    </div>

@endsection
