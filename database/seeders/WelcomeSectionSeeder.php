<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WelcomeSection;

class WelcomeSectionSeeder extends Seeder
{
    public function run(): void
    {
        // Ensure only ONE active welcome section
        WelcomeSection::query()->update(['is_active' => false]);

        WelcomeSection::create([
            'title' => 'Welcome to CAEDA',

            'description' => [
                'The Cambodia-ASEAN Educational Development Association is dedicated to building high-quality human capital for Cambodia and the region.',
                'Guided by the vision of empowering youth with essential 21st-century skills, we focus on strengthening foreign languages, digital competency, leadership, and innovation.',
                'By bridging academic knowledge with real labor-market demands, CAEDA strives to prepare future leaders who can contribute to national development and ASEAN integration with confidence and purpose.',
            ],

            'signature_name'  => 'H.T. Samdolfe',
            'signature_title' => 'President',

            'image' => 'https://st3.depositphotos.com/3049830/15926/i/450/depositphotos_159267468-stock-photo-group-of-asian-students-in.jpg',

            'badges' => [
                [
                    'text'  => 'Excellence',
                    'color' => '#facc15', // Tailwind yellow-400
                ],
                [
                    'text'  => 'Quality',
                    'color' => '#f87171', // Tailwind red-400
                ],
            ],

            'stats' => [
                [
                    'number' => '50+',
                    'label'  => 'Years of Excellence',
                ],
                [
                    'number' => '10K+',
                    'label'  => 'Students Graduated',
                ],
            ],

            'is_active' => true,
        ]);
    }
}
