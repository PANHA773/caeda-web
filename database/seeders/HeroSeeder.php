<?php

// database/seeders/HeroSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hero;

class HeroSeeder extends Seeder
{
    public function run(): void
    {
        Hero::create([
            'badge_text' => 'MAKE A DIFFERENCE • 501(c)(3) REGISTERED',
            'title' => 'Give Hope to',
            'highlight_title' => 'Helpless Children',
            'subtitle' => 'Your donation provides food, education, healthcare, and hope for children in need.',
            'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80', // Add your image URL here
            'stats' => [
                ['value' => '10K+', 'label' => 'Children Helped', 'icon' => '👶'],
                ['value' => '95%', 'label' => 'Funds to Programs', 'icon' => '📊'],
                ['value' => '50+', 'label' => 'Communities', 'icon' => '🏘️'],
                ['value' => '24/7', 'label' => 'Support', 'icon' => '🕒'],
            ],
            'is_active' => true,
        ]);
    }
}
