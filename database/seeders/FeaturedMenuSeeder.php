<?php

// database/seeders/FeaturedMenuSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedMenu;

class FeaturedMenuSeeder extends Seeder
{
    public function run(): void
    {
        FeaturedMenu::create([
            'title' => 'Double Shot Espresso',
            'badge' => 'BESTSELLER',
            'image' => 'menus/espresso.jpg',
            'price' => 3.50,
            'old_price' => 4.00,
            'description' => 'Two shots of our finest espresso.',
            'rating' => 4.5,
            'reviews' => 248,
            'order' => 1,
        ]);

        FeaturedMenu::create([
            'title' => 'Vanilla Cappuccino',
            'badge' => 'STUDENT PICK',
            'image' => 'menus/cappuccino.jpg',
            'price' => 4.75,
            'description' => 'Smooth espresso with vanilla.',
            'rating' => 5.0,
            'reviews' => 312,
            'order' => 2,
        ]);

        FeaturedMenu::create([
            'title' => 'Iced Caramel Macchiato',
            'badge' => 'TRENDING',
            'image' => 'menus/iced.jpg',
            'price' => 5.25,
            'description' => 'Cold brew with caramel drizzle.',
            'rating' => 4.5,
            'reviews' => 189,
            'order' => 3,
        ]);
    }
}
