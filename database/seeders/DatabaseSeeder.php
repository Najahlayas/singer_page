<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionSeeder::class,
        ]);

        // المدير
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'),
            'status' => 'active',
        ]);

        $admin->assignRole('مدير');


        // المستخدمون
        $users = [
            [
                'name' => 'Ahmed Ali',
                'email' => 'ahmed@email.com',
            ],
            [
                'name' => 'Mohamed Salem',
                'email' => 'mohamed@email.com',
            ],
            [
                'name' => 'Sara Ahmed',
                'email' => 'sara@email.com',
            ],
            [
                'name' => 'Fatima Ali',
                'email' => 'fatima@email.com',
            ],
            [
                'name' => 'Omar Khaled',
                'email' => 'omar@email.com',
            ],
            [
                'name' => 'Nour Hassan',
                'email' => 'nour@email.com',
            ],
        ];


        foreach ($users as $data) {

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
                'status' => 'active',
            ]);

            $user->assignRole('مستخدم');
        }
    }
}
