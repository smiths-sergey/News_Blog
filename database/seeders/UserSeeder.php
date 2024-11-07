<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();

        $admins = User::factory(2)->create();
        foreach ($admins as $admin) {
            $admin->roles()->attach($adminRole);
        }

        $users = User::factory(8)->create();
        foreach ($users as $user) {
            $user->roles()->attach($userRole);
        }
    }
}
