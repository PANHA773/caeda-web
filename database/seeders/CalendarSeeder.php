<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calendar;

class CalendarSeeder extends Seeder
{
    public function run(): void
    {
        Calendar::insert([
            [
                'title' => 'Tech Conference 2024',
                'date' => '2024-12-05',
                'time' => '09:00:00',   // 24-hour format
                'description' => 'Annual technology conference',
                'is_active' => true,
            ],
            [
                'title' => 'Startup Pitch Day',
                'date' => '2024-12-12',
                'time' => '14:00:00',   // 02:00 PM
                'description' => 'Pitch your startup ideas',
                'is_active' => true,
            ],
            [
                'title' => 'Design Workshop',
                'date' => '2024-12-20',
                'time' => '10:30:00',   // 10:30 AM
                'description' => 'UI/UX design workshop',
                'is_active' => true,
            ],
        ]);
    }
}
