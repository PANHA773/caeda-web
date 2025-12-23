<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroCarousel;

class HeroCarouselSeeder extends Seeder
{
    public function run(): void
    {
        $slides = [
            ['title' => 'Campus 1', 'image' => '/assets/ASEAN-01-01.png', 'order' => 1],
            ['title' => 'Campus 2', 'image' => '/assets/stu-one.jpg', 'order' => 2],
            ['title' => 'Campus 3', 'image' => '/assets/stu-tow.png', 'order' => 3],
        ];

        foreach ($slides as $slide) {
            HeroCarousel::create($slide);
        }
    }
}
