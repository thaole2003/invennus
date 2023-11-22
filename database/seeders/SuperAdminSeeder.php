<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;



class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = Role::firstOrCreate(['name' => 'super-admin']);

        // Create the "super-admin" user
        $superAdmin = User::create([
            'name' => 'Nghiêm Xuân Thái',
            'email' => 'Nghiemthai.nxt46@gmail.com',
            'password' => Hash::make('Nghiemthai.nxt46@gmail.com'),
            'role' => 'admin',
            'phone' => '0332132912'
        ]);
        // Assign the "super-admin" role to the "super-admin" user
        $superAdmin->assignRole($superAdminRole);
    }
}
