<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CharityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->company . ' Foundation';
        $score = $this->faker->randomFloat(2, 60, 100);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph(3),
            'official_url' => $this->faker->url,
            'country' => $this->faker->country,

            'impact_score' => $score,
            'vetting_source' => 'Charity Navigator',

            'is_high_impact' => $score >= 90 ? true : false,

            'is_verified' => true,
        ];
    }
}
