<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء الصلاحيات
        $permissions = [

            'عرض الأعمال',
            'إضافة عمل فني',
            'تعديل عمل فني',
            'حذف عمل فني',
            'إدارة المستخدمين',
            'إدارة التصنيفات',

        ];

        foreach ($permissions as $permission) {

            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => 'web',
            ]);

        }

        // إنشاء الأدوار
        $admin = Role::firstOrCreate([
            'name' => 'مدير',
            'guard_name' => 'web',
        ]);

        $user = Role::firstOrCreate([
            'name' => 'مستخدم',
            'guard_name' => 'web',
        ]);

        // إعطاء المدير جميع الصلاحيات
        $admin->syncPermissions(Permission::all());

        // إعطاء المستخدم صلاحية عرض الأعمال فقط
        $user->syncPermissions([
            'عرض الأعمال',
        ]);
    }
}
