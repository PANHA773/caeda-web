<?php

namespace Database\Seeders;

use App\Models\HeroAchievement;
use Illuminate\Database\Seeder;

class HeroAchievementSeeder extends Seeder
{
    public function run()
    {
        HeroAchievement::insert([
            [
                'value' => '50+',
                'label' => 'International Awards',
                'icon' => '🏆',
                'color' => 'bg-gradient-to-br from-yellow-500 to-orange-500',
                'order' => 1
            ],
            [
                'value' => '98%',
                'label' => 'Student Satisfaction',
                'icon' => '⭐',
                'color' => 'bg-gradient-to-br from-blue-500 to-cyan-500',
                'order' => 2
            ],
            [
                'value' => '10K+',
                'label' => 'Global Alumni',
                'icon' => '👥',
                'color' => 'bg-gradient-to-br from-purple-500 to-pink-500',
                'order' => 3
            ],
            [
                'value' => '95%',
                'label' => 'Career Placement',
                'icon' => '📈',
                'color' => 'bg-gradient-to-br from-emerald-500 to-green-500',
                'order' => 4
            ],
        ]);
    }
}
