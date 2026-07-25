@extends('layouts.site-template')


@section('title', 'roles')


@section('content')


    <div class="p-6 max-w-7xl mx-auto" dir="rtl">



        <x-header title="الأدوار" breadcrumb="الرئيسية / الأدوار">

            <x-actions-button url="{{ route('roles.create') }}" text="إضافة دور" />

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

                            {{ $role->permissions->count() }}

                            صلاحية

                        </td>





                        <td class="py-4 px-6">


                            <div class="flex gap-2">



                                <x-edit-button target="edit-role-{{ $role->id }}" />



                                <x-delete-form route="{{ route('roles.destroy', $role->id) }}" type="الدور"
                                    id="{{ $role->id }}" />

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



                    <label>
                        اسم الدور
                    </label>


                    <input name="name" value="{{ $role->name }}" class="w-full border rounded-lg p-2 mt-2">



                    <button class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-lg">

                        حفظ

                    </button>



                </form>


            </x-modal>
        @endforeach




    </div>


@endsection
