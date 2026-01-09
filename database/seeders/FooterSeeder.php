<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Footer;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        Footer::create([
            'logo' => 'CAEDA',
            'tagline' => 'Education Of Best',
            'description' => 'Grow your skills with modern technology courses.',
            'social_links' => [
                'facebook' => '#',
                'twitter' => '#',
                'instagram' => '#',
                'youtube' => '#'
            ],
            'quick_links' => [
                ['name' => 'Home', 'route' => 'home'],
                ['name' => 'Courses', 'route' => 'courses'],
                ['name' => 'About', 'route' => 'about'],
                ['name' => 'Contact', 'route' => 'contact'],
            ],
            'contact_info' => [
                'address' => '44 New Design Street, Melbourne',
                'phone' => '(01) 800 433 633',
                'email' => 'info@example.com'
            ]
        ]);
    }
}
