<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the admin user
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Change this to a secure password
        ]);

        // Create roles and permissions if they do not exist
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editPostsPermission = Permission::firstOrCreate(['name' => 'edit posts']);
        $deletePostsPermission = Permission::firstOrCreate(['name' => 'delete posts']);

        // Assign permissions to roles
        $adminRole->givePermissionTo([$editPostsPermission, $deletePostsPermission]);

        // Assign the admin role to the admin user
        $admin->assignRole($adminRole);
    }
}
