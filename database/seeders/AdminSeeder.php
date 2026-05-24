<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
             'name' => 'Admin User',
            'username' => 'admin',
            'avatar' => null,
            'phone' => '9876543210',
            'address' => 'Kochi, Kerala',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
