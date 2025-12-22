<?php

// database/seeders/SocialLinkSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    public function run(): void
    {
        $socials = [
            [
                'platform'   => 'Facebook',
                'icon'       => 'fab fa-facebook-f',
                'color'      => 'bg-blue-600 hover:bg-blue-700',
                'url'        => 'https://facebook.com',
                'is_active'  => true,
                'sort_order' => 1,
            ],
            [
                'platform'   => 'Twitter',
                'icon'       => 'fab fa-twitter',
                'color'      => 'bg-sky-500 hover:bg-sky-600',
                'url'        => 'https://twitter.com',
                'is_active'  => true,
                'sort_order' => 2,
            ],
            [
                'platform'   => 'Instagram',
                'icon'       => 'fab fa-instagram',
                'color'      => 'bg-pink-600 hover:bg-pink-700',
                'url'        => 'https://instagram.com',
                'is_active'  => true,
                'sort_order' => 3,
            ],
            [
                'platform'   => 'LinkedIn',
                'icon'       => 'fab fa-linkedin-in',
                'color'      => 'bg-blue-700 hover:bg-blue-800',
                'url'        => 'https://linkedin.com',
                'is_active'  => true,
                'sort_order' => 4,
            ],
            [
                'platform'   => 'YouTube',
                'icon'       => 'fab fa-youtube',
                'color'      => 'bg-red-600 hover:bg-red-700',
                'url'        => 'https://youtube.com',
                'is_active'  => true,
                'sort_order' => 5,
            ],
            [
                'platform'   => 'Telegram',
                'icon'       => 'fab fa-telegram',
                'color'      => 'bg-blue-500 hover:bg-blue-600',
                'url'        => 'https://telegram.org',
                'is_active'  => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($socials as $social) {
            SocialLink::create($social);
        }
    }
}
