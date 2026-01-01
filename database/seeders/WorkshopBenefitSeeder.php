<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WorkshopBenefit;

class WorkshopBenefitSeeder extends Seeder
{
    public function run(): void
    {
        $benefits = [
            [
                'icon' => '🎯',
                'title' => 'Expert Instructors',
                'description' => 'Learn from industry professionals and academic experts with years of experience',
                'status' => 1
            ],
            [
                'icon' => '📚',
                'title' => 'Practical Skills',
                'description' => 'Hands-on learning with real-world applications and projects',
                'status' => 1
            ],
            [
                'icon' => '🤝',
                'title' => 'Networking',
                'description' => 'Connect with like-minded learners and professionals in your field',
                'status' => 1
            ],
            [
                'icon' => '📜',
                'title' => 'Certification',
                'description' => 'Receive certificates of completion to enhance your professional portfolio',
                'status' => 1
            ]
        ];

        foreach ($benefits as $benefit) {
            WorkshopBenefit::create($benefit);
        }
    }
}
