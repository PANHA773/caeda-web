<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [
            [
                'name' => 'Faculty of Philosophy, Religion and Law',
                'description' => 'Focuses on philosophy, religious studies, and law education.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Faculty of Educational Sciences and Literature',
                'description' => 'Covers teacher education, pedagogy, and literature.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Faculty of Pali Sanskrit and Foreign Languages',
                'description' => 'Specializes in classical languages and modern foreign languages.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Faculty of Information Technology & Computer Science',
                'description' => 'Offers programs in IT, software development, and computer science.',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($faculties as $faculty) {
            Faculty::create($faculty);
        }
    }
}
