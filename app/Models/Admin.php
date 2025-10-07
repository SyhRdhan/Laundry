<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash; // <-- Tambahkan ini

class Admin extends Authenticatable {
    use Notifiable;

    protected $fillable = ['username', 'email', 'password'];

    protected $hidden = ['password'];

    /**
     * Selalu enkripsi password saat disimpan.
     */
    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}