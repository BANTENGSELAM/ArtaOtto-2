<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat 3 Brands
        $brands = [
            Brand::create(['name' => 'KLinikKu']),
            Brand::create(['name' => 'DentalPro']),
            Brand::create(['name' => 'GigiSehat'])
        ];

        // 2. Buat 8 Products terkait dengan Brands yang diacak
        $productsData = [
            ['name' => 'Kursi Gigi Elektrik Premium', 'description' => 'Kursi gigi dengan teknologi elektrik terbaru dan fitur pijat.', 'stock' => 5],
            ['name' => 'Lampu Operasi LED', 'description' => 'Lampu operasi dengan pencahayaan LED super terang dan dingin.', 'stock' => 12],
            ['name' => 'Alat Scaling Ultrasonik', 'description' => 'Membersihkan karang gigi lebih cepat dan tidak sakit.', 'stock' => 20],
            ['name' => 'Kamera Intraoral HD', 'description' => 'Diagnosis lebih mudah dengan kamera resolusi tinggi.', 'stock' => 8],
            ['name' => 'Set Alat Cabut Gigi Lengkap', 'description' => 'Set stainless steel tahan karat 15 buah.', 'stock' => 30],
            ['name' => 'Kompresor Udara Dental', 'description' => 'Kompresor tanpa oli, tidak bising, dan awet.', 'stock' => 4],
            ['name' => 'Sterilisator Autoclave', 'description' => 'Alat sterilisasi uap untuk menjaga kebersihan instrumen.', 'stock' => 6],
            ['name' => 'Mesin X-Ray Gigi Portabel', 'description' => 'Radiasi rendah, presisi tinggi.', 'stock' => 3],
        ];

        foreach ($productsData as $index => $data) {
            $product = Product::create([
                'brand_id' => $brands[$index % 3]->id, // Rotasi brand 0, 1, 2
                'name' => $data['name'],
                'description' => $data['description'],
                'stock' => $data['stock'],
                'is_hidden' => false,
            ]);

            // Default image placeholder for demonstration
            // Since we don't have actual images uploaded by the seeder, just leave them empty for now
            // To be totally clean, they won't have images unless uploaded 
        }

        // Add 1 Hidden Product for testing
        Product::create([
            'brand_id' => $brands[0]->id,
            'name' => 'Produk Rahasia (Discontinued)',
            'description' => 'Ini adalah produk yang disembunyikan dan tidak boleh dibeli.',
            'stock' => 0,
            'is_hidden' => true,
        ]);

        // Seed Admins
        $this->call(AdminSeeder::class);
    }
}
