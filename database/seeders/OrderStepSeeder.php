<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderStep;

class OrderStepSeeder extends Seeder
{
    public function run(): void
    {
        $steps = [
            [
                'title' => 'Browse Menu',
                'description' => 'View our complete menu online',
                'icon' => 'fas fa-mobile-alt',
                'order' => 1,
                'status' => true,
            ],
            [
                'title' => 'Customize Order',
                'description' => 'Choose your preferences',
                'icon' => 'fas fa-shopping-cart',
                'order' => 2,
                'status' => true,
            ],
            [
                'title' => 'Pick Up & Enjoy',
                'description' => 'Ready when you arrive',
                'icon' => 'fas fa-check-circle',
                'order' => 3,
                'status' => true,
            ],
        ];

        foreach ($steps as $step) {
            OrderStep::create($step);
        }
    }
}
