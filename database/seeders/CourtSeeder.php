<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Court;

class CourtSeeder extends Seeder
{
    public function run(): void
    {
        Court::create([
            'name'           => 'Lapangan A',
            'type'           => 'badminton',
            'location'       => 'Gor Kelapa Gading',
            'description'    => 'Lapangan indoor berstandar nasional',
            'price_per_hour' => 75000,
            'is_active'      => true,
        ]);

        Court::create([
            'name'           => 'Lapangan B',
            'type'           => 'badminton',
            'location'       => 'Senayan Sport Center',
            'description'    => 'Lantai bagus, pencahayaan excellent',
            'price_per_hour' => 90000,
            'is_active'      => true,
        ]);

        Court::create([
            'name'           => 'Lapangan Tennis 1',
            'type'           => 'tenis',
            'location'       => 'Tennis Indoor Rawamangun',
            'description'    => 'Lapangan tenis berstandar internasional',
            'price_per_hour' => 120000,
            'is_active'      => true,
        ]);
    }
}
