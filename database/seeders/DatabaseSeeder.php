<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create or retrieve default admin (avoids duplicate email error)
        Admin::firstOrCreate(
            ['email' => 'admin@gmail.com'],  // Unique key to check
            [
                'username' => 'admin',
                'password' => 'password'  // Hashed automatically; updates if new
            ]
        );

        // Create sample services (use firstOrCreate similarly if needed)
        Service::firstOrCreate(
            ['name' => 'Wash & Fold'],
            [
                'description' => 'Standard washing and folding service',
                'price' => 5.00,
                'duration_days' => 1
            ]
        );

        Service::firstOrCreate(
            ['name' => 'Dry Clean'],
            [
                'description' => 'Professional dry cleaning for delicate items',
                'price' => 15.00,
                'duration_days' => 2
            ]
        );

        Service::firstOrCreate(
            ['name' => 'Ironing'],
            [
                'description' => 'Pressing and ironing service',
                'price' => 3.00,
                'duration_days' => 1
            ]
        );
    }
}