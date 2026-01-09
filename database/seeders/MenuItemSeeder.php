<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MenuItem;

class MenuItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['menu_category_id' => 1, 'title' => 'Classic Espresso', 'description' => 'A single shot of our finest espresso', 'price' => 3.00, 'image' => 'menus/espresso.jpg', 'rating' => 4.8, 'reviews' => 156, 'order' => 1],
            ['menu_category_id' => 1, 'title' => 'Double Shot Espresso', 'description' => 'Two shots for an extra caffeine boost', 'price' => 3.50, 'image' => 'menus/espresso.jpg', 'rating' => 4.9, 'reviews' => 248, 'order' => 2],
            ['menu_category_id' => 2, 'title' => 'Iced Americano', 'description' => 'Espresso shots poured over ice', 'price' => 3.75, 'image' => 'menus/iced.jpg', 'rating' => 4.7, 'reviews' => 189, 'order' => 1],
            ['menu_category_id' => 2, 'title' => 'Cold Brew', 'description' => 'Slow-steeped for 24 hours', 'price' => 4.50, 'image' => 'menus/coldbrew.jpg', 'rating' => 4.9, 'reviews' => 234, 'order' => 2],
            ['menu_category_id' => 3, 'title' => 'Matcha Latte', 'description' => 'Japanese green tea powder with milk', 'price' => 5.00, 'image' => 'menus/matcha.jpg', 'rating' => 4.9, 'reviews' => 245, 'order' => 1],
            ['menu_category_id' => 4, 'title' => 'Croissant', 'description' => 'Buttery, flaky French pastry', 'price' => 2.50, 'image' => 'menus/croissant.jpg', 'rating' => 4.8, 'reviews' => 278, 'order' => 1],
            ['menu_category_id' => 5, 'title' => 'Avocado Toast', 'description' => 'Smashed avocado on artisanal bread', 'price' => 6.50, 'image' => 'menus/avocado_toast.jpg', 'rating' => 4.8, 'reviews' => 189, 'order' => 1],
            ['menu_category_id' => 6, 'title' => 'CAEDA Caramel Dream', 'description' => 'Our signature caramel-infused espresso', 'price' => 6.50, 'image' => 'menus/caramel_dream.jpg', 'rating' => 4.9, 'reviews' => 312, 'order' => 1],
        ];

        foreach ($items as $data) {
            MenuItem::updateOrCreate(
                ['menu_category_id' => $data['menu_category_id'], 'title' => $data['title']],
                $data
            );
        }
    }
}
