<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectOverview;

class ProjectOverviewSeeder extends Seeder
{
    public function run(): void
    {
        ProjectOverview::create([
            'title' => 'Project-Based Learning',
            'description' => 'The Project-Based Learning (PBL) approach at PSBU Leadership Academy integrates theoretical knowledge with practical application through hands-on projects. Students engage in collaborative, real-world projects that address current challenges and opportunities in their field of study. PBL enhances critical thinking, problem-solving, and teamwork skills while fostering creativity and innovation. Students develop practical solutions and gain valuable experience that prepares them for successful careers and entrepreneurial endeavors. This ambitious project creates significant opportunities for diverse individuals including school children, teachers, government servants, private sector employees, school leavers, job seekers, and those currently employed who aspire to advance their education and career prospects. The project empowers individuals across various sectors to achieve career development and personal growth, ensuring participants receive qualifications recognized both locally and internationally.',
            'order' => 1,
            'is_active' => true,
        ]);
    }
}
