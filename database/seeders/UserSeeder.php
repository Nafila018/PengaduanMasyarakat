<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ADMIN
        User::create([
            'name' => 'Administrator',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1234'),
            'role' => 'admin',
        ]);

        // CAMAT
        User::create([
            'name' => 'Pak Camat',
            'email' => 'camat@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'camat',
        ]);
    }
}