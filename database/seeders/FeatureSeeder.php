<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        $features = [
            [
                'title' => 'Expert Instructors',
                'description' => 'Learn from industry professionals with years of experience in their fields',
                'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                'color' => 'from-blue-500 to-cyan-500',
                'sort_order' => 1,
            ],
            [
                'title' => 'Interactive Learning',
                'description' => 'Engage with interactive content, quizzes, and hands-on projects',
                'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                'color' => 'from-purple-500 to-pink-500',
                'sort_order' => 2,
            ],
            [
                'title' => 'Lifetime Access',
                'description' => 'Get lifetime access to course materials and future updates',
                'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                'color' => 'from-green-500 to-teal-500',
                'sort_order' => 3,
            ],
        ];

        foreach ($features as $feature) {
            Feature::create($feature + ['is_active' => true]);
        }
    }
}
