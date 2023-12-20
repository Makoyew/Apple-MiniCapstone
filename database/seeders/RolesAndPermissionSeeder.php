<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'name' => 'Costumer',
            'email' => 'costumer@gmail.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
        ]);

        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'costumer']);

        $user1->assignRole($admin);
        $user2->assignRole($user);
    }
}
