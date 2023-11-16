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
        DB::table("permissions")->insert([
            ['name' => 'permissions.resource', 'guard_name' => 'web'],
            ['name' => 'roles.resource', 'guard_name' => 'web'],
            ['name' => 'stores.resource', 'guard_name' => 'web'],
            ['name' => 'vendors.resource', 'guard_name' => 'web'],
            ['name' => 'users.resource', 'guard_name' => 'web'],
            ['name' => 'categories.resource', 'guard_name' => 'web'],
            ['name' => 'sizes.resource', 'guard_name' => 'web'],
            ['name' => 'products.resource', 'guard_name' => 'web'],
            ['name' => 'storevariants.resource', 'guard_name' => 'web'],
            ['name' => 'bills.resource', 'guard_name' => 'web'],
            ['name' => 'sales.resource', 'guard_name' => 'web'],
            ['name' => 'inventoryentrys.resource', 'guard_name' => 'web'],
            ['name' => 'post-categories.resource', 'guard_name' => 'web'],
            ['name' => 'ads.resource', 'guard_name' => 'web'],
            ['name' => 'posts.resource', 'guard_name' => 'web'],
        ]);
    }
}
