<?php

namespace Database\Seeders;

use App\Models\PerformanceMetric;
use App\Models\GrowthStat;
use Illuminate\Database\Seeder;

class ProgressMetricsSeeder extends Seeder
{
    public function run()
    {
        $metrics = [
            ['label' => 'Research Excellence', 'value' => 95, 'color' => '#3b82f6', 'order' => 1],
            ['label' => 'Student Satisfaction', 'value' => 98, 'color' => '#10b981', 'order' => 2],
            ['label' => 'Graduate Employment', 'value' => 96, 'color' => '#8b5cf6', 'order' => 3],
            ['label' => 'International Diversity', 'value' => 85, 'color' => '#f59e0b', 'order' => 4],
            ['label' => 'Digital Innovation', 'value' => 92, 'color' => '#ef4444', 'order' => 5],
        ];

        foreach ($metrics as $metric) {
            PerformanceMetric::create($metric);
        }

        $growthStats = [
            ['label' => 'Student Enrollment', 'value' => '45%', 'trend' => 'up', 'icon' => 'users', 'order' => 1],
            ['label' => 'Research Funding', 'value' => '60%', 'trend' => 'up', 'icon' => 'dollar-sign', 'order' => 2],
            ['label' => 'International Students', 'value' => '35%', 'trend' => 'up', 'icon' => 'globe', 'order' => 3],
            ['label' => 'Faculty Publications', 'value' => '28%', 'trend' => 'up', 'icon' => 'book', 'order' => 4],
        ];

        foreach ($growthStats as $stat) {
            GrowthStat::create($stat);
        }
    }
}
