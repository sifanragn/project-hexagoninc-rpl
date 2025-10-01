<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guest;

class GuestSeeder extends Seeder
{
    public function run(): void
    {
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
