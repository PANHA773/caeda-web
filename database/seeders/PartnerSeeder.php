<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Google',
                'logo' => 'https://www.google.com/favicon.ico',
                'website_url' => 'https://www.google.com',
                'description' => 'Global technology innovator',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Microsoft',
                'logo' => 'https://www.microsoft.com/favicon.ico',
                'website_url' => 'https://www.microsoft.com',
                'description' => 'Leading software and cloud solutions',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Amazon',
                'logo' => 'https://www.amazon.com/favicon.ico',
                'website_url' => 'https://www.amazon.com',
                'description' => 'E-commerce and cloud computing leader',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Apple',
                'logo' => 'https://www.apple.com/favicon.ico',
                'website_url' => 'https://www.apple.com',
                'description' => 'Innovation in technology and design',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Meta',
                'logo' => 'https://www.meta.com/favicon.ico',
                'website_url' => 'https://www.meta.com',
                'description' => 'Social media and metaverse pioneer',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Tesla',
                'logo' => 'https://www.tesla.com/favicon.ico',
                'website_url' => 'https://www.tesla.com',
                'description' => 'Electric vehicles and clean energy',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
