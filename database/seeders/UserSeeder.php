<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@animerch.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'),
            ]
        );

        // Demo user
        User::updateOrCreate(
            ['email' => 'demo@animerch.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('demo123'),
            ]
        );

        // New Dummy user
        User::updateOrCreate(
            ['email' => 'dummy@animerch.com'],
            [
                'name' => 'Dummy User',
                'password' => Hash::make('password123'),
            ]
        );
    }
}
