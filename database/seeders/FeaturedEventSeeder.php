<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FeaturedEvent;

class FeaturedEventSeeder extends Seeder
{
    public function run(): void
    {
        FeaturedEvent::create([
            'title' => 'Annual Tech Innovation Summit 2024',
            'description' => 'Join 1000+ tech leaders, innovators, and entrepreneurs for 3 days of groundbreaking talks, workshops, and networking.',
            'location' => 'Convention Center, Phnom Penh',
            'start_date' => '2024-12-15',
            'start_time' => '09:00:00',
            'speakers_count' => 50,
            'sessions_count' => 75,
            'attendees_count' => 1000,
            'is_active' => true,
        ]);
    }
}
