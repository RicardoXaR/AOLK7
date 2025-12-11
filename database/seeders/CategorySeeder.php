<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Environment',
            'Education',
            'Health & Wellness',
            'Animal Welfare',
            'Humanitarian & Social Services',
            'Disaster & Crisis Response',
            'Rights, Justice & Advocacy',
            'Arts, Culture & Community',
            'Faith-Based',
            'Technology & Research',
        ];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }
    }
}
