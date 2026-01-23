<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TimelineEvent;

class TimelineEventSeeder extends Seeder
{
    public function run(): void
    {
        TimelineEvent::insert([
            [
                'title' => 'Event Planning',
                'date' => '2024-09-15',
                'description' => 'Initial planning and conceptualization of event themes and objectives.',
                'status' => 'completed',
                'icon' => 'fas fa-calendar-check',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Speaker Confirmations',
                'date' => '2024-10-10',
                'description' => 'Finalizing speaker lineup and session topics.',
                'status' => 'completed',
                'icon' => 'fas fa-microphone',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Early Bird Registration',
                'date' => '2024-11-01',
                'description' => 'Early bird tickets available at 30% discount.',
                'status' => 'active',
                'icon' => 'fas fa-ticket-alt',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Event Days',
                'date' => '2024-12-15', // use start date of event
                'description' => 'Three days of conferences, workshops, and networking.',
                'status' => 'upcoming',
                'icon' => 'fas fa-users',
                'sort_order' => 4,
                'is_active' => true,
            ],
        ]);
    }
}
