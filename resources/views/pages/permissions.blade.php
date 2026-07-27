@extends('layouts.site-template')


{{-- @section('title', 'permissions') --}}
@section('page-title')
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

                            <x-dropdown-list count="{{ $permission->roles->count() }}" text="أدوار">

                                @foreach ($permission->roles as $role)
                                    <li class="border-b pb-1">
                                        {{ $role->name }}
                                    </li>
                                @endforeach

                            </x-dropdown-list>

                        </td>




                        <td class="py-4 px-6">

                            <div class="flex gap-2">

                                <x-edit-button target="edit-permission-{{ $permission->id }}" />

                                <x-delete-form route="{{ route('permissions.destroy', $permission->id) }}" type="الصلاحية"
                                    id="{{ $permission->id }}" />

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
