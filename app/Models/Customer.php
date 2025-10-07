<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // <-- Pastikan ini ada

class Customer extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guard = 'customer';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * PERBAIKAN UTAMA:
     * Fungsi ini akan secara otomatis mengenkripsi (hash) nilai password
     * setiap kali Anda mencoba menyimpannya ke database.
     * Ini adalah cara paling aman dan standar di Laravel.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}