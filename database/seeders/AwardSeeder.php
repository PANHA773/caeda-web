<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Award;

class AwardSeeder extends Seeder
{
    public function run(): void
    {
        $awards = [
            [
                'title' => 'Global Education Excellence Award 2023',
                'organization' => 'World Education Forum',
                'year' => '2023',
                'category' => 'international',
                'icon' => 'trophy',
                'description' => 'Recognized for outstanding academic programs and student outcomes',
                'color' => 'from-yellow-500 to-orange-500',
                'order' => 1,
            ],
            [
                'title' => 'Digital Innovation Prize',
                'organization' => 'Tech Education Association',
                'year' => '2023',
                'category' => 'innovation',
                'icon' => 'lightbulb',
                'description' => 'Awarded for pioneering digital learning platforms',
                'color' => 'from-blue-500 to-cyan-500',
                'order' => 2,
            ],
            [
                'title' => 'Sustainable Campus Award',
                'organization' => 'Green Education Initiative',
                'year' => '2023',
                'category' => 'education',
                'icon' => 'leaf',
                'description' => 'Leadership in sustainable campus operations',
                'color' => 'from-emerald-500 to-green-500',
                'order' => 3,
            ],
            [
                'title' => 'Research Excellence Award',
                'organization' => 'Academic Research Council',
                'year' => '2022',
                'category' => 'research',
                'icon' => 'flask',
                'description' => 'Outstanding contributions to scientific research',
                'color' => 'from-purple-500 to-pink-500',
                'order' => 4,
            ],
        ];

        foreach ($awards as $award) {
            Award::create($award);
        }
    }
}
