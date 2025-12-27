<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking; // Import model Booking
use Carbon\Carbon; // Import Carbon untuk tanggal

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada room dengan ID 1 di tabel rooms Anda
        // Jika tidak ada, ubah room_id ini ke ID room yang valid
        Booking::create([
            'room_id' => 1, // Ganti dengan ID room yang valid di tabel 'rooms' Anda
            'nama' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'telepon' => '081234567890',
            'check_in' => Carbon::now()->addDays(2)->format('Y-m-d'),
            'check_out' => Carbon::now()->addDays(5)->format('Y-m-d'),
            // Tambahkan kolom lain jika ada di $fillable Booking Anda
        ]);

        Booking::create([
            'room_id' => 2, // Contoh booking kedua dengan room_id berbeda
            'nama' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'telepon' => '087654321098',
            'check_in' => Carbon::now()->addDays(10)->format('Y-m-d'),
            'check_out' => Carbon::now()->addDays(12)->format('Y-m-d'),
        ]);
    }
}