<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        Testimonial::insert([
            [
                'name' => 'Sokha Rin',
                'role' => 'Software Developer',
                'company' => 'Tech Solutions Inc.',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d',
                'quote' => 'The web development workshop completely transformed my career.',
                'workshop' => 'Web Development Fundamentals',
                'rating' => 5,
                'status' => 1,
            ],
            [
                'name' => 'Bopha Chen',
                'role' => 'Teacher',
                'company' => 'International School',
                'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330',
                'quote' => 'Practical skills I use every day in my classroom.',
                'workshop' => 'Data Science for Educators',
                'rating' => 5,
                'status' => 1,
            ],
            [
                'name' => 'Dara Wilson',
                'role' => 'Researcher',
                'company' => 'University of Phnom Penh',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e',
                'quote' => 'Helped me publish my first academic paper.',
                'workshop' => 'Academic Research Methods',
                'rating' => 4,
                'status' => 1,
            ],
        ]);
    }
}
