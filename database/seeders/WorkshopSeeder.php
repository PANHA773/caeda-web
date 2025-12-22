<?php

namespace Database\Seeders;

use App\Models\Workshop;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WorkshopSeeder extends Seeder
{
    public function run()
    {
        $workshops = [
            [
                'title' => 'Mindfulness Meditation for Beginners',
                'category' => 'buddhist',
                'instructor' => 'Dr. Ananda Sharma',
                'date' => Carbon::now()->addDays(7),
                'duration' => '2 hours',
                'level' => 'beginner',
                'image' => 'images/meditation.jpg',
                'video' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
                'description' => 'Learn the basics of mindfulness meditation and how to incorporate it into your daily life. Perfect for beginners who want to start their meditation journey.',
                'short_description' => 'Introduction to mindfulness meditation practices',
                'objectives' => 'Understand meditation basics, Learn breathing techniques, Practice mindfulness',
                'attendees' => 156,
                'rating' => 4.8,
                'price' => 29.99,
                'seats_available' => 25,
                'is_featured' => true,
                'location' => 'Online',
                'language' => 'en',
            ],
            [
                'title' => 'Web Development with Laravel',
                'category' => 'technology',
                'instructor' => 'John Developer',
                'date' => Carbon::now()->addDays(14),
                'duration' => '4 weeks',
                'level' => 'intermediate',
                'image' => 'images/laravel.jpg',
                'video' => 'https://www.youtube.com/embed/ImtZ5yENzgE',
                'description' => 'Master Laravel framework for building modern web applications. Learn MVC architecture, authentication, and deployment.',
                'short_description' => 'Complete Laravel course for web developers',
                'objectives' => 'Build RESTful APIs, Implement authentication, Deploy applications',
                'attendees' => 289,
                'rating' => 4.9,
                'price' => 99.99,
                'seats_available' => 15,
                'is_featured' => true,
                'location' => 'Online',
                'language' => 'en',
            ],
            [
                'title' => 'Buddhist Philosophy 101',
                'category' => 'buddhist',
                'instructor' => 'Ven. Bhikkhu Bodhi',
                'date' => Carbon::now()->addDays(3),
                'duration' => '3 hours',
                'level' => 'all',
                'image' => 'images/buddhism.jpg',
                'video' => 'https://www.youtube.com/embed/tgbNymZ7vqY',
                'description' => 'Explore the fundamental teachings of Buddhism including the Four Noble Truths and the Eightfold Path.',
                'short_description' => 'Introduction to Buddhist philosophy and teachings',
                'attendees' => 204,
                'rating' => 4.7,
                'price' => 0,
                'seats_available' => 50,
                'is_featured' => false,
                'location' => 'Online',
                'language' => 'en',
            ],
            [
                'title' => 'Data Science with Python',
                'category' => 'technology',
                'instructor' => 'Dr. Sarah Chen',
                'date' => Carbon::now()->addDays(21),
                'duration' => '6 weeks',
                'level' => 'advanced',
                'image' => 'images/datascience.jpg',
                'video' => 'https://www.youtube.com/embed/Lh-bC8a8kog',
                'description' => 'Advanced data analysis and machine learning techniques using Python and popular libraries.',
                'short_description' => 'Advanced data science and machine learning course',
                'attendees' => 178,
                'rating' => 4.6,
                'price' => 149.99,
                'seats_available' => 12,
                'is_featured' => true,
                'location' => 'Online',
                'language' => 'en',
            ],
            [
                'title' => 'Creative Writing Workshop',
                'category' => 'creative',
                'instructor' => 'Emily Writer',
                'date' => Carbon::now()->addDays(10),
                'duration' => '2 weeks',
                'level' => 'beginner',
                'image' => 'images/writing.jpg',
                'video' => null,
                'description' => 'Unlock your creative potential and learn the art of storytelling through various writing exercises and techniques.',
                'short_description' => 'Creative writing and storytelling workshop',
                'attendees' => 89,
                'rating' => 4.5,
                'price' => 49.99,
                'seats_available' => 20,
                'is_featured' => false,
                'location' => 'In-person',
                'language' => 'en',
            ],
            [
                'title' => 'Yoga and Wellness Retreat',
                'category' => 'wellness',
                'instructor' => 'Priya Wellness',
                'date' => Carbon::now()->addDays(30),
                'duration' => 'Weekend',
                'level' => 'all',
                'image' => 'images/yoga.jpg',
                'video' => 'https://www.youtube.com/embed/VaoV1PrYft4',
                'description' => 'A weekend retreat focusing on yoga, meditation, and holistic wellness practices for mind and body balance.',
                'short_description' => 'Weekend wellness and yoga retreat',
                'attendees' => 142,
                'rating' => 4.9,
                'price' => 199.99,
                'seats_available' => 8,
                'is_featured' => true,
                'location' => 'Retreat Center',
                'language' => 'en',
            ],
        ];

        foreach ($workshops as $workshop) {
            // Generate slug from title
            $workshop['slug'] = \Illuminate\Support\Str::slug($workshop['title']);
            
            // Ensure we have status set
            $workshop['status'] = 'active';
            $workshop['registration_open'] = true;
            
            Workshop::create($workshop);
        }
    }
}