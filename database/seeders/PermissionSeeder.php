<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'edit posts',
                'guard_name' => 'web',
            ],
            [
                'name' => 'update posts', // Add other permissions as needed
                'guard_name' => 'web',
            ],
            [
                'name' => 'delete posts', // Add other permissions as needed
                'guard_name' => 'web',
            ],
        ]);
    }
}
