<?php

// database/seeders/ImpactStorySeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ImpactStory;

class ImpactStorySeeder extends Seeder
{
    public function run(): void
    {
        ImpactStory::insert([
            [
                'name' => 'Maria, 8',
                'story' => 'I used to work on the streets. Now I go to school every day and dream of becoming a doctor.',
                'image' => 'impact/maria.jpg',
                'impact' => 'Education Program',
                'color' => 'from-blue-500 to-cyan-500',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'David, 6',
                'story' => 'The community kitchen saved me from hunger. Now I have energy to play and learn.',
                'image' => 'impact/david.jpg',
                'impact' => 'Nutrition Program',
                'color' => 'from-green-500 to-emerald-500',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Sophia, 10',
                'story' => 'After getting proper medical care, I can run and play with my friends again.',
                'image' => 'impact/sophia.jpg',
                'impact' => 'Healthcare Program',
                'color' => 'from-red-500 to-pink-500',
                'order' => 3,
                'is_active' => true,
            ],
        ]);
    }
}
