<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'admin']);
        Role::firstOrCreate(['name' => 'user']);

        $admin = User::firstOrCreate(
            ['email' => 'admin123@gmail.com'],
            ['name' => 'Admin', 'password' => bcrypt('admin123')]
        );

        $user = User::firstOrCreate(
            ['email' => 'user123@gmail.com'],
            ['name' => 'User', 'password' => bcrypt('user123')]
        );

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
