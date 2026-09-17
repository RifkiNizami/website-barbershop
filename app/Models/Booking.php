<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_code',
        'nama_pelanggan',
        'no_whatsapp',
        'layanan',
        'barber',
        'tanggal',
        'jam',
        'catatan',
        'harga',
        'status',
        'user_id',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'harga' => 'integer',
    ];
}
