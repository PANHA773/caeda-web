<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    public function definition()
    {
        // random chance to be linked to a real user
        $user = null;
        if ($this->faker->boolean(40) && User::count() > 0) {
            $user = User::inRandomOrder()->first();
        }

        return [
            'news_id' => News::inRandomOrder()->first()->id ?? 1,
            'user_id' => $user->id ?? null,
            'name' => $user->name ?? $this->faker->name(),
            'email' => $user->email ?? $this->faker->safeEmail(),
            'content' => $this->faker->sentences(rand(1,3), true),
            'is_approved' => true,
            'created_at' => now()->subDays(rand(0,90)),
            'updated_at' => now(),
        ];
    }
}
