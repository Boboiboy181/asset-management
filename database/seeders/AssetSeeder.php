<?php

namespace Database\Seeders;

use App\Models\Asset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Asset::create([
            'name' => 'Office Laptop',
            'image_url' => 'https://picsum.photos/id/1/600/900',
            'value' => 1000,
            'residual_value' => 200,
            'purchased_year' => 2020,
            'expired_year' => 2025,
        ]);

        Asset::create([
            'name' => 'Projector',
            'image_url' => 'https://picsum.photos/id/2/600/900',
            'value' => 800,
            'residual_value' => 100,
            'purchased_year' => 2019,
            'expired_year' => 2024,
        ]);

        Asset::create([
            'name' => 'Conference Room Table',
            'image_url' => 'https://picsum.photos/id/3/600/900',
            'value' => 1500,
            'residual_value' => 300,
            'purchased_year' => 2021,
            'expired_year' => 2031,
        ]);

        Asset::create([
            'name' => 'Printer',
            'image_url' => 'https://picsum.photos/id/4/600/900',
            'value' => 500,
            'residual_value' => 50,
            'purchased_year' => 2018,
            'expired_year' => 2023,
        ]);

        Asset::create([
            'name' => 'Company Car',
            'image_url' => 'https://picsum.photos/id/5/600/900',
            'value' => 25000,
            'residual_value' => 5000,
            'purchased_year' => 2017,
            'expired_year' => 2027,
        ]);
    }
}
