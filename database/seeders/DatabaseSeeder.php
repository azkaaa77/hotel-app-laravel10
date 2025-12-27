<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use App\Models\User; // Hapus jika tidak men-seed user

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            RoomSeeder::class,    // Panggil RoomSeeder dulu
            BookingSeeder::class, // Lalu panggil BookingSeeder
        ]);
    }
}