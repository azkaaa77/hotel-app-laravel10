<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',   // <<< PASTIKAN INI ADA
        'room_id',
        'nama',
        'email',
        'telepon',
        'check_in',
        'check_out',
        'status',    // <<< PASTIKAN INI ADA
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user() // Relasi ke model User
    {
        return $this->belongsTo(User::class);
    }
}