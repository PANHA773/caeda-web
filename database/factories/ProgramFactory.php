<?php

// database/factories/ProgramFactory.php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Program;

class ProgramFactory extends Factory
{
    protected $model = Program::class;

    public function definition()
    {
        $categories = [
            'Information Technology', 'Business & Management', 'Marketing',
            'Data Science', 'Design', 'Cybersecurity', 'Healthcare', 'Education'
        ];

        $levels = ['beginner', 'intermediate', 'advanced', 'expert'];
        $modes = ['online', 'offline', 'hybrid'];
        $badges = ['Popular', 'Trending', 'New', 'Limited', 'Early Bird', null];
        $badgeColors = ['bg-red-500', 'bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-yellow-500'];

        $title = $this->faker->unique()->sentence(4);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraphs(3, true),
            'short_description' => $this->faker->sentence(12),
            'duration' => $this->faker->randomElement(['6 Months', '1 Year', '2 Years', '4 Years', '12 Weeks']),
            'level' => $this->faker->randomElement($levels),
            'students' => $this->faker->numberBetween(50, 2000),
            'rating' => $this->faker->randomFloat(2, 3.5, 5.0), // 2 decimal places for precision
            'image' => 'https://source.unsplash.com/1200x800/?education,course&sig=' . $this->faker->unique()->numberBetween(1, 1000),
            'category' => $this->faker->randomElement($categories),
            'mode' => $this->faker->randomElement($modes),
            'tuition' => $this->faker->randomFloat(2, 500, 10000),
            'discount' => $this->faker->optional(0.3)->randomFloat(2, 100, 2000),
            'badge' => $this->faker->optional(0.4)->randomElement($badges),
            'badge_color' => $this->faker->optional(0.4)->randomElement($badgeColors),
            'is_featured' => $this->faker->boolean(30),
            'is_active' => $this->faker->boolean(90),
            'sort_order' => $this->faker->numberBetween(0, 100),
            'start_date' => $this->faker->dateTimeBetween('+1 month', '+1 year'),
            'application_deadline' => $this->faker->dateTimeBetween('now', '+6 months'),
            'metadata' => [
                'credits' => $this->faker->numberBetween(30, 120),
                'prerequisites' => $this->faker->words(3),
                'projects' => $this->faker->numberBetween(3, 10),
            ],
        ];
    }
}
