<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    // Beritahu Laravel bahwa primary key-nya adalah user_id
    protected $primaryKey = 'user_id';

    // Beritahu Laravel untuk tidak mencari kolom updated_at
    const UPDATED_AT = null;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}
