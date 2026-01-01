<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Milestone;

class MilestoneSeeder extends Seeder
{
    public function run(): void
    {
        $milestones = [
            [
                'year' => '2023',
                'title' => 'Global Innovation Award',
                'description' => 'Recognized as #1 Most Innovative University by Global Education Forum',
                'icon' => '🚀',
                'color' => 'bg-gradient-to-br from-blue-500 to-cyan-500',
                'achievements' => ['AI Research Excellence', 'Digital Transformation Leader'],
                'order' => 1,
            ],
            [
                'year' => '2022',
                'title' => 'Triple Accreditation',
                'description' => 'Achieved accreditation from three major international education bodies',
                'icon' => '⭐',
                'color' => 'bg-gradient-to-br from-purple-500 to-pink-500',
                'achievements' => ['Quality Assurance Award', 'International Standards'],
                'order' => 2,
            ],
            [
                'year' => '2021',
                'title' => 'Research Breakthrough',
                'description' => 'Published groundbreaking research in Nature and Science journals',
                'icon' => '🔬',
                'color' => 'bg-gradient-to-br from-emerald-500 to-green-500',
                'achievements' => ['50+ Publications', 'Global Recognition'],
                'order' => 3,
            ],
        ];

        foreach ($milestones as $milestone) {
            Milestone::create($milestone);
        }
    }
}
