<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate([
            'name' => 'مدير',
            'guard_name' => 'web'
        ]);

        Role::firstOrCreate([
            'name' => 'مستخدم',
            'guard_name' => 'web'
        ]);
    }
}
