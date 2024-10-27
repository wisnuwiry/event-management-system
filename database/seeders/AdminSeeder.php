<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('rahasia123'), // Replace 'password' with a secure password
            'nik' => '1234567890',
            'phone' => '123456789',
            'role' => 'admin',
            'expired_date' => now()->addYear(),
            'avatar' => 'avatars/admin.png',
        ]);
    }
}
