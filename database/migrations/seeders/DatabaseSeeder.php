<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat admin default
        Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'username' => 'admin',
                'password' => Hash::make('password') // Enkripsi password di sini
            ]
        );

        // Buat layanan contoh
        Service::firstOrCreate(['name' => 'Wash & Fold'], [
            'description' => 'Standard washing and folding service',
            'price' => 15000,
            'duration_days' => 1
        ]);
        Service::firstOrCreate(['name' => 'Dry Clean'], [
            'description' => 'Professional dry cleaning for delicate items',
            'price' => 25000,
            'duration_days' => 2
        ]);
        Service::firstOrCreate(['name' => 'Ironing'], [
            'description' => 'Pressing and ironing service',
            'price' => 10000,
            'duration_days' => 1
        ]);
    }
}