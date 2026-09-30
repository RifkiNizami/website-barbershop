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

    /**
     * Relasi Eloquent ORM: Booking milik satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    /**
     * Relasi Eloquent ORM: Booking memiliki satu Payment
     */
    public function payment()
    {
        return $this->hasOne(Payment::class, 'booking_id', 'id');
    }

    /**
     * Contoh Eloquent Query Scope
     */
    public function scopeActive($query)
    {
        return $query->whereIn('status', ['confirmed', 'pending']);
    }
}
