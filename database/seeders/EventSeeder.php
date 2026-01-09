<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'AI & Machine Learning Summit',
                'description' => 'Explore the latest advancements in artificial intelligence and machine learning with industry experts.',
                'date' => '2024-11-25',
                'time' => '09:00 AM - 05:00 PM',
                'location' => 'Digital Innovation Hub',
                'type' => 'conference',
                'seats' => 45,
                'speakers' => 12,
                'image' => 'https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'Popular',
            ],
            [
                'title' => 'Blockchain Development Workshop',
                'description' => 'Hands-on workshop on building decentralized applications with Ethereum and Solidity.',
                'date' => '2024-12-05',
                'time' => '10:00 AM - 04:00 PM',
                'location' => 'Tech Campus Lab 3',
                'type' => 'workshop',
                'seats' => 30,
                'speakers' => 3,
                'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'Sold Out',
            ],
            [
                'title' => 'Startup Founder Networking',
                'description' => 'Connect with investors, mentors, and fellow entrepreneurs in the startup ecosystem.',
                'date' => '2024-11-30',
                'time' => '06:00 PM - 09:00 PM',
                'location' => 'Innovation Lounge',
                'type' => 'networking',
                'seats' => 100,
                'speakers' => 8,
                'image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'Free',
            ],
            [
                'title' => 'Cybersecurity Threats Webinar',
                'description' => 'Live webinar on emerging cybersecurity threats and defense strategies for modern enterprises.',
                'date' => '2024-12-12',
                'time' => '02:00 PM - 04:00 PM',
                'location' => 'Online',
                'type' => 'webinar',
                'seats' => 500,
                'speakers' => 5,
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'Early Bird',
            ],
            [
                'title' => 'Data Science Career Fair',
                'description' => 'Meet top employers hiring for data science roles and attend career development sessions.',
                'date' => '2024-12-08',
                'time' => '11:00 AM - 04:00 PM',
                'location' => 'Career Center Hall',
                'type' => 'conference',
                'seats' => 200,
                'speakers' => 15,
                'image' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'Career',
            ],
            [
                'title' => 'UI/UX Design Masterclass',
                'description' => 'Advanced design techniques and tools for creating exceptional user experiences.',
                'date' => '2025-01-15',
                'time' => '09:30 AM - 05:30 PM',
                'location' => 'Design Studio 2',
                'type' => 'workshop',
                'seats' => 25,
                'speakers' => 4,
                'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'tag' => 'New',
            ],
        ];

        foreach ($data as $item) {
            Event::updateOrCreate([
                'slug' => Str::slug($item['title']),
            ], $item);
        }

        // add a few random events via factory
        Event::factory()->count(6)->create();
    }
}
