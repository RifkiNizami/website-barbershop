<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';

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

    /**
     * Relasi Eloquent ORM: User memiliki banyak Booking
     */
    public function bookings()
    {
        return $this->hasMany(Booking::class, 'user_id', 'user_id');
    }
}
