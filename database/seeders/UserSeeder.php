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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@animerch.com',
            'password' => Hash::make('password'),
        ]);

        // Demo user
        User::create([
            'name' => 'Demo User',
            'email' => 'demo@animerch.com',
            'password' => Hash::make('demo123'),
        ]);
    }
}
