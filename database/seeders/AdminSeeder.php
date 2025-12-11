<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admins = [
            [
                'name' => 'Admin User',
                'email' => 'admin@caeda.com',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@caeda.com',
                'password' => Hash::make('superadmin123'),
                'email_verified_at' => now(),
            ],
        ];

        foreach ($admins as $admin) {
            User::create($admin);
        }
    }
}
