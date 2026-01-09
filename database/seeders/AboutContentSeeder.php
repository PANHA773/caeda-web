<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutContent;

class AboutContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutContent::create([
            'page_title' => 'About - CAEDA',
            'header_title' => 'About CAEDA',
            'page_description' => 'A premier institution dedicated to providing accessible and quality education rooted in Buddhist principles.',
            'foundation_content' => json_encode([
                ['content' => 'Founded in 1998 to provide high-quality education to Cambodian students.', 'is_special' => false],
                ['content' => 'Our principles are rooted in Buddhist values and ethics.', 'is_special' => true],
                ['content' => 'We aim to nurture future leaders and scholars.', 'is_special' => false],
            ]),
            'today_content' => json_encode([
                'We currently have over 3,000 students enrolled.',
                'Our faculty consists of highly qualified professors and researchers.',
                'We offer programs across four main faculties covering philosophy, IT, languages, and education.'
            ]),
            'mission' => 'To provide accessible, high-quality education while upholding Buddhist wisdom and ethical principles.',
            'vision' => 'To be a leading educational institution recognized nationally and internationally for excellence in teaching, research, and community service.',
            'is_active' => true
        ]);
    }
}
