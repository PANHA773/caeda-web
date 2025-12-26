<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Goal;
use App\Models\Strategy;

class GoalStrategySeeder extends Seeder
{
    public function run(): void
    {
        $goals = [
            ['title' => 'Increase Access', 'description' => 'Expand educational opportunities by developing infrastructure and resources for remote and under-represented areas.', 'icon' => '🚀', 'order' => 1],
            ['title' => 'Improve Quality', 'description' => 'Enhance education through teacher training, quality materials, and innovative teaching methods.', 'icon' => '⭐', 'order' => 2],
            ['title' => 'Support Community Engagement', 'description' => 'Foster local involvement and ownership of educational programs for long-term sustainability.', 'icon' => '🤝', 'order' => 3],
            ['title' => 'Monitor and Evaluate', 'description' => 'Conduct continuous assessment to measure impact and make necessary program adjustments.', 'icon' => '📊', 'order' => 4],
        ];

        foreach ($goals as $goal) {
            Goal::create($goal);
        }

        $strategies = [
            ['title' => 'Partnership Building', 'description' => 'Form strategic alliances with NGOs, government bodies, and private sector stakeholders.', 'icon' => '🌐', 'order' => 1],
            ['title' => 'Technology Integration', 'description' => 'Use digital platforms and technology to bridge geographical gaps in education.', 'icon' => '💻', 'order' => 2],
            ['title' => 'Capacity Building', 'description' => 'Focus on training and professional development for teachers and administrators.', 'icon' => '🎯', 'order' => 3],
            ['title' => 'Advocacy & Policy Work', 'description' => 'Influence educational policies and secure funding for under-represented areas.', 'icon' => '⚖️', 'order' => 4],
        ];

        foreach ($strategies as $strategy) {
            Strategy::create($strategy);
        }
    }
}
