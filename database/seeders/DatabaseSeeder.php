<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Guest;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== Users =====
        User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123456'), // password default
        ]);

        // Tambahan user test
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('123456'),
        ]);

        // ===== Guests =====
        $guests = [
            ['name' => 'Budi', 'email' => 'budi@mail.com'],
            ['name' => 'Siti', 'email' => 'siti@mail.com'],
            ['name' => 'Agni', 'email' => 'agni@mail.com'],
        ];

        foreach ($guests as $guest) {
            Guest::create($guest);
        }
    }
}
