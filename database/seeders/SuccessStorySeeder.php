<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SuccessStory;

class SuccessStorySeeder extends Seeder
{
    public function run(): void
    {
        SuccessStory::insert([
            [
                'name' => 'Alexandra Chen',
                'role' => 'AI Research Lead at Google',
                'achievement' => 'Developed breakthrough AI algorithms used by billions',
                'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330',
                'quote' => 'CAEDA provided the perfect foundation for my AI career. The cutting-edge research facilities and mentorship were invaluable.',
                'year' => 'Class of 2018',
                'order' => 1,
            ],
            [
                'name' => 'Marcus Rodriguez',
                'role' => 'CEO, EduTech Startup',
                'achievement' => 'Raised $25M in Series B funding',
                'image' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e',
                'quote' => 'The entrepreneurship program gave me the confidence and network to build a successful company.',
                'year' => 'Class of 2016',
                'order' => 2,
            ],
            [
                'name' => 'Sophia Williams',
                'role' => 'Lead Designer at Apple',
                'achievement' => 'Redesigned iOS accessibility features',
                'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb',
                'quote' => 'The design thinking approach I learned at CAEDA transformed my creative process and career trajectory.',
                'year' => 'Class of 2019',
                'order' => 3,
            ],
        ]);
    }
}
