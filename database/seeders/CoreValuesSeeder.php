<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CoreValue;

class CoreValuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $values = [
            [
                'title' => 'Wisdom & Knowledge',
                'description' => 'Pursuing academic excellence while integrating Buddhist wisdom.',
                'icon' => '📚',
                'color' => 'from-blue-500 to-cyan-500',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Compassion',
                'description' => 'Promoting kindness, empathy, and respect across all communities.',
                'icon' => '❤️',
                'color' => 'from-red-500 to-pink-500',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Integrity',
                'description' => 'Encouraging honesty, responsibility, and ethical decision-making.',
                'icon' => '🛡️',
                'color' => 'from-green-500 to-emerald-500',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Innovation',
                'description' => 'Supporting creativity and modern solutions to global challenges.',
                'icon' => '💡',
                'color' => 'from-yellow-400 to-orange-500',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CoreValue::create($value);
        }
    }
}
