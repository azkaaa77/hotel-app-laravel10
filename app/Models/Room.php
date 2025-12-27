<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_kamar',
        'gambar',
        'deskripsi',
        'harga',
        'kapasitas',
        'jumlah_tersedia',
        'wifi',
    ];
}