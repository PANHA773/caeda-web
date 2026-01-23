<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    public function definition()
    {
        $title = $this->faker->sentence(rand(6, 10));
        $tags = $this->faker->randomElements(['#Research', '#AI', '#Education', '#Event', '#Grant', '#Campus'], rand(1,3));
        
        $userNames = ['Research Department', 'Dr. Sarah Chen', 'Student Council', 'CAEDA Library', 'Tech Club', 'Faculty Board'];
        $userRoles = ['Official Page', 'Professor of AI', 'Student Organization', 'Official Page', 'Student Club', 'Administration'];
        $userAvatars = [
            'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'https://images.unsplash.com/photo-1494790108755-2616b786d4d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
            'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
        ];
        
        $userIndex = $this->faker->numberBetween(0, count($userNames) - 1);
        
        $user = [
            'name' => $userNames[$userIndex],
            'avatar' => $userAvatars[$this->faker->numberBetween(0, count($userAvatars) - 1)],
            'role' => $userRoles[$userIndex],
            'time' => $this->faker->randomElement(['1h', '2h', '4h', '6h', '1d', '2d']),
            'verified' => $this->faker->boolean(60),
        ];

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100, 999),
            'excerpt' => $this->faker->sentence(12),
            'content' => $this->faker->paragraphs(rand(3,6), true),
            'image' => 'https://picsum.photos/seed/' . $this->faker->unique()->numberBetween(1,1000) . '/1200/800',
            'user' => $user,
            'likes' => $this->faker->numberBetween(0, 1000),
            'comments' => $this->faker->numberBetween(0, 200),
            'shares' => $this->faker->numberBetween(0, 50),
            'is_liked' => $this->faker->boolean(20),
            'tags' => $tags,
            'published_at' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
