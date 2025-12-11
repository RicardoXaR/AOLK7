<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Charity;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class CharitySeeder extends Seeder
{
    public function run(): void
    {
        // 1. DATA MANUAL
        Charity::create([
            'name' => 'Peduli Anak Indonesia Foundation',
            'slug' => Str::slug('Peduli Anak Indonesia Foundation'),
            'description' => 'Membantu pendidikan dan kesehatan anak-anak terlantar di pelosok Nusantara.',
            'country' => 'Indonesia',
            'impact_score' => 95, // Skor Tinggi
            'is_verified' => true,
            'is_high_impact' => true, // Masuk Akal
            'is_trending' => true,
            'official_url' => 'https://pedulianak.org',
        ])->categories()->attach([2, 3]);

        Charity::create([
            'name' => 'Hutan Lestari Kalimantan',
            'slug' => Str::slug('Hutan Lestari Kalimantan'),
            'description' => 'Menjaga paru-paru dunia dengan reboisasi hutan gundul di Kalimantan.',
            'country' => 'Indonesia',
            'impact_score' => 88, // Skor Menengah
            'is_verified' => true,
            'is_high_impact' => false, // Gak dapet bintang (Logic bener)
            'is_trending' => false,
            'official_url' => 'https://hutanlestari.id',
        ])->categories()->attach([1]);

        Charity::create([
            'name' => 'Global Relief Initiative',
            'slug' => Str::slug('Global Relief Initiative'),
            'description' => 'Providing immediate aid to disaster-stricken areas globally.',
            'country' => 'USA',
            'impact_score' => 98,
            'is_verified' => true,
            'is_high_impact' => true,
            'is_trending' => true,
            'official_url' => 'https://globalrelief.org',
        ])->categories()->attach([6]);

        // 2. GENERATE 50 DATA DUMMY
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            $name = $faker->company . ' Foundation';
            $score = $faker->numberBetween(70, 99);
            $isHighImpact = $score >= 90;

            $charity = Charity::create([
                'name' => $name,
                'slug' => Str::slug($name) . '-' . uniqid(),
                'description' => $faker->paragraph(3),
                'country' => $faker->country,
                'impact_score' => $score,
                'is_verified' => $faker->boolean(80),
                'is_high_impact' => $isHighImpact,
                'is_trending' => $faker->boolean(20),
                'official_url' => $faker->url,
            ]);

            $charity->categories()->attach(collect(range(1, 10))->random(rand(1, 3)));
        }
    }
}
