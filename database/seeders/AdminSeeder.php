<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin Perusahaan
        Admin::create([
            'name' => 'Admin ArtaOtto',
            'email' => 'admin@artaotto.com',
            'password' => Hash::make('password123'),
            'role' => 'company',
        ]);

        // Developer
        Admin::create([
            'name' => 'Developer ArtaOtto',
            'email' => 'dev@artaotto.com',
            'password' => Hash::make('devpass123'),
            'role' => 'developer',
        ]);
    }
}
