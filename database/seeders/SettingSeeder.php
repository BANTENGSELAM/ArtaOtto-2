<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'hero_title', 'value' => 'Welcome to <span class="text-[#F47C21]">ArtaOtto</span>'],
            ['key' => 'hero_desc', 'value' => 'Kami adalah mitra strategis Anda dalam menyediakan peralatan kedokteran gigi tercanggih. Dengan fokus pada kualitas dan inovasi, kami memastikan setiap klinik memiliki instrumen terbaik.'],
            ['key' => 'hero_logo_1', 'value' => 'images/LogoArtaWarna.png'],
            ['key' => 'hero_logo_2', 'value' => 'images/LogoArtaWarna.png'],
            ['key' => 'hero_logo_3', 'value' => 'images/LogoArtaWarna.png'],
        ];

        foreach ($settings as $setting) {
            \App\Models\Setting::updateOrCreate(
                ['key' => $setting['key']],
                ['value' => $setting['value']]
            );
        }
    }
}
