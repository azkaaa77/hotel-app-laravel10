<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    public function run(): void
    {
        Room::create([
            'type_kamar' => 'Standard Room', // Pastikan ini 'type_kamar'
            'deskripsi' => 'Kamar standar dengan tempat tidur queen size dan pemandangan kota.',
            'harga' => '300000',
            'kapasitas' => 2, // Pastikan ini ada
            'jumlah_tersedia' => 10, // Pastikan ini ada
            'image' => 'standard_room.jpg', // Pastikan ini 'image'
            'wifi' => 'ya',
        ]);
        // ... data kamar lain ...
    }
}