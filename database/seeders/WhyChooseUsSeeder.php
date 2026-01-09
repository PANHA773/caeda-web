<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WhyChooseUs;

class WhyChooseUsSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'badge' => 'CAMPUS PERKS',
                'title' => 'Study Power Boost',
                'description' => 'Specially brewed for concentration and focus during study sessions.',
                'icon' => 'fas fa-bolt',
                'order' => 1,
            ],
            [
                'badge' => 'CAMPUS PERKS',
                'title' => 'Free High-Speed WiFi',
                'description' => 'Unlimited high-speed internet for all your research and assignments.',
                'icon' => 'fas fa-wifi',
                'order' => 2,
            ],
            [
                'badge' => 'CAMPUS PERKS',
                'title' => 'Group Study Friendly',
                'description' => 'Large tables, power outlets, and quiet zones for productive group work.',
                'icon' => 'fas fa-users',
                'order' => 3,
            ],
        ];

        foreach ($items as $item) {
            WhyChooseUs::create($item);
        }
    }
}