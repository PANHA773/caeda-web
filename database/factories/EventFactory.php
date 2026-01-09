<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Event;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        $title = $this->faker->sentence(rand(3,6));
        $types = ['conference','workshop','networking','webinar'];
        $type = $this->faker->randomElement($types);
        $tags = ['Popular','Sold Out','Free','Early Bird','Career','New'];

        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . $this->faker->unique()->numberBetween(100,999),
            'description' => $this->faker->paragraphs(rand(2,4), true),
            'date' => $this->faker->dateTimeBetween('now', '+90 days')->format('Y-m-d'),
            'time' => $this->faker->time('h:i A'),
            'location' => $this->faker->randomElement(['Convention Center, Phnom Penh', 'Digital Innovation Hub', 'Tech Campus Lab 3', 'Online', 'Career Center Hall']),
            'type' => $type,
            'seats' => $this->faker->numberBetween(0, 500),
            'speakers' => $this->faker->numberBetween(1, 50),
            'image' => 'https://picsum.photos/seed/' . $this->faker->unique()->numberBetween(1,1000) . '/1000/600',
            'tag' => $this->faker->randomElement($tags),
            'is_featured' => $this->faker->boolean(20),
        ];
    }
}
