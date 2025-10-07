<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | Opsi ini mengontrol guard dan password reset default untuk aplikasi Anda.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Di sini kita mendefinisikan setiap "guard" autentikasi.
    | 'web' adalah untuk Admin, dan 'customer' adalah untuk Pelanggan.
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admins', // Guard 'web' menggunakan provider 'admins'
        ],

        'customer' => [
            'driver' => 'session',
            'provider' => 'customers', // Guard 'customer' menggunakan provider 'customers'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | Provider memberi tahu guard di mana harus mencari data pengguna.
    | Provider 'admins' mencari di model Admin, 'customers' mencari di model Customer.
    |
    */

    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'customers' => [
            'driver' => 'eloquent',
            'model' => App\Models\Customer::class,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        // Konfigurasi reset password untuk provider default (bisa disesuaikan jika perlu)
        'users' => [
            'provider' => 'customers', // Default ke customers untuk 'lupa password'
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => 10800,

];