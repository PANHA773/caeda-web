<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuCategory;

class MenuCategorySeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Hot Coffee',
                'slug' => 'hot-coffee',
                'icon' => 'fas fa-fire',
                'icon_color' => 'text-amber-600',
                'order' => 1,
            ],
            [
                'name' => 'Cold Coffee',
                'slug' => 'cold-coffee',
                'icon' => 'fas fa-snowflake',
                'icon_color' => 'text-blue-600',
                'order' => 2,
            ],
            [
                'name' => 'Tea & More',
                'slug' => 'tea',
                'icon' => 'fas fa-leaf',
                'icon_color' => 'text-green-600',
                'order' => 3,
            ],
            [
                'name' => 'Pastries',
                'slug' => 'pastries',
                'icon' => 'fas fa-cookie-bite',
                'icon_color' => 'text-orange-600',
                'order' => 4,
            ],
            [
                'name' => 'Breakfast',
                'slug' => 'breakfast',
                'icon' => 'fas fa-egg',
                'icon_color' => 'text-yellow-600',
                'order' => 5,
            ],
            [
                'name' => 'Specials',
                'slug' => 'specials',
                'icon' => 'fas fa-crown',
                'icon_color' => 'text-purple-600',
                'order' => 6,
            ],
        ];

        foreach ($data as $item) {
            MenuCategory::updateOrCreate(
                ['slug' => $item['slug']],
                $item
            );
        }
    }
}
