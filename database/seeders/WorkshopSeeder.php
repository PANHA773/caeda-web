<?php

// database/seeders/WorkshopSeeder.php
namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;

class WorkshopSeeder extends Seeder
{
    public function run(): void
    {
        Workshop::insert([
            [
                'title' => 'Web Development Fundamentals',
                'category' => 'technology',
                'instructor' => 'Dr. Sarah Johnson',
                'date' => '2024-03-15',
                'duration' => '3 hours',
                'level' => 'Beginner',
                'image' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c',
                'video' => 'https://www.youtube.com/watch?v=ubipXO53jUQ',
                'description' => 'Learn the basics of web development including HTML, CSS, and JavaScript fundamentals.',
                'attendees' => 45,
                'rating' => 4.8,
                'instructor_image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330',
                'order' => 1,
            ],
            [
                'title' => 'Buddhist Philosophy in Modern Life',
                'category' => 'buddhist',
                'instructor' => 'Ven. Dr. Somnang Pich',
                'date' => '2024-03-20',
                'duration' => '2 hours',
                'level' => 'All Levels',
                'image' => 'https://images.unsplash.com/photo-1547981609-4b6bf67b9d7a',
                'video' => 'https://www.youtube.com/watch?v=ubipXO53jUQ',
                'description' => 'Explore how ancient Buddhist teachings can be applied to contemporary challenges.',
                'attendees' => 32,
                'rating' => 4.9,
                'instructor_image' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698',
                'order' => 2,
                
            ],
        ]);
    }
}

