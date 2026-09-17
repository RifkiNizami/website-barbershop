<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_layanan',
        'kategori',
        'harga',
        'durasi',
        'deskripsi',
        'is_active',
    ];

    protected $casts = [
        'harga' => 'integer',
        'durasi' => 'integer',
        'is_active' => 'boolean',
    ];
}
