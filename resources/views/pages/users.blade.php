@extends('layouts.site-template')

{{-- @section('title', 'users') --}}
@section('page-title')
    المستخدمون
@endsection

@section('title')
    المستخدمون
@endsection


@section('content')
    <div class="p-6 max-w-7xl mx-auto" dir="rtl">

        <x-header title="المستخدمون" breadcrumb="الرئيسية / المستخدمون">
            <x-actions-button target="create-user" />

        </x-header>

        <x-search action="{{ route('users.index') }}" placeholder="ابحث عن مستخدم..." value="{{ request('search') }}" />

        <x-table>
            <x-slot name="headers">
                <th class="py-4 px-6 font-semibold">الاسم</th>
                <th class="py-4 px-6 font-semibold">البريد الإلكتروني</th>
                <th class="py-4 px-6 font-semibold">الدور</th>
                <th class="py-4 px-6 font-semibold">الحالة</th>
                <th class="py-4 px-6 font-semibold">الإجراءات</th>
            </x-slot>

            <x-slot name="rows">
                @forelse($users as $user)
                    <tr class="hover:bg-gray-50/50 transition-colors">
                        <td class="py-4 px-6 flex items-center gap-3">
                            <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100"
                                class="w-10 h-10 rounded-full object-cover" alt="User">
                            <span class="font-medium text-gray-900">{{ $user->name }}</span>
                        </td>
                        <td class="py-4 px-6 text-gray-500">{{ $user->email }}</td>
                        <td class="py-4 px-6 text-gray-600">
                            {{ $user->getRoleNames()->first() ?? 'بدون دور' }}
                        </td>
                        <td class="py-4 px-6">
                            <span
                                class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-600">نشط</span>
                        </td>
                        <td class="py-4 px-6">

                            <div class="flex items-center gap-2">


                                <x-edit-button target="edit-user-{{ $user->id }}" />


                                <x-delete-form route="{{ route('users.destroy', $user->id) }}" type="المستخدم"
                                    id="{{ $user->id }}" />

                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">لا توجد بيانات متاحة.</td>
                    </tr>
                @endforelse
            </x-slot>
        </x-table>
        @foreach ($users as $user)
            <x-modal id="edit-user-{{ $user->id }}" title="تعديل المستخدم">

                <form action="{{ route('users.update', $user->id) }}" method="POST">

                    @csrf
                    @method('PUT')


                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            الاسم
                        </label>

                        <input name="name" value="{{ $user->name }}" class="w-full border rounded-lg p-2">
                    </div>


                    <div class="mb-3">
                        <label class="block mb-1 text-sm">
                            البريد الإلكتروني
                        </label>

                        <input name="email" value="{{ $user->email }}" class="w-full border rounded-lg p-2">
                    </div>


                    <div class="mb-3">

                        <label class="block mb-1 text-sm">
                            الدور
                        </label>

                        <select name="role" class="w-full border rounded-lg p-2">

                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach

                        </select>

                    </div>


                    <div class="mb-3">

                        <label class="block mb-1 text-sm">
                            الحالة
                        </label>

                        <select name="status" class="w-full border rounded-lg p-2">

                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>
                                نشط
                            </option>


                            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>
                                غير نشط
                            </option>

                        </select>

                    </div>


                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                        حفظ

                    </button>


                </form>

            </x-modal>
        @endforeach

        <x-modal id="create-user" title="إضافة مستخدم">

            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        الاسم
                    </label>

                    <input name="name" type="text" class="w-full border rounded-lg p-2" required>
                </div>


                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        البريد الإلكتروني
                    </label>

                    <input name="email" type="email" class="w-full border rounded-lg p-2" required>
                </div>


                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        كلمة المرور
                    </label>

                    <input name="password" type="password" class="w-full border rounded-lg p-2" required>
                </div>

                <div class="mb-3">
                    <label class="block mb-1 text-sm">
                        الدور
                    </label>

                    <select name="role" class="w-full border rounded-lg p-2" required>
                        <option value="">اختر الدور</option>

                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">
                                {{ $role->name }}
                            </option>
                        @endforeach

                    </select>
                </div>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">
                    حفظ
                </button>

            </form>

        </x-modal>

        <div class="mt-4">
            {{ $users->links() }}
        </div>


    </div>
@endsection
