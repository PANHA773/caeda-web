<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Speaker;

class SpeakerSeeder extends Seeder
{
    public function run(): void
    {
        Speaker::insert([
            [
                'name' => 'Dr. Sarah Chen',
                'title' => 'AI Research Director, Google',
                'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'topic' => 'The Future of AI Ethics',
                'social' => json_encode(['twitter', 'linkedin', 'github']),
                'is_active' => true,
            ],
            [
                'name' => 'Michael Rodriguez',
                'title' => 'CTO, Blockchain Solutions',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'topic' => 'Web3 and Decentralization',
                'social' => json_encode(['twitter', 'linkedin']),
                'is_active' => true,
            ],
            [
                'name' => 'Emma Wilson',
                'title' => 'Lead UX Designer, Apple',
                'image' => 'https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'topic' => 'Design Systems at Scale',
                'social' => json_encode(['twitter', 'linkedin', 'dribbble']),
                'is_active' => true,
            ],
            [
                'name' => 'James Kim',
                'title' => 'Cybersecurity Expert, NSA',
                'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                'topic' => 'Zero-Trust Security',
                'social' => json_encode(['twitter', 'linkedin']),
                'is_active' => true,
            ],
        ]);
    }
}
