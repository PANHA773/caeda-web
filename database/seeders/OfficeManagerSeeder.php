<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OfficeManager;

class OfficeManagerSeeder extends Seeder
{
    public function run(): void
    {
        $managers = [
            [
                'name' => "Mr. Seam Lyhournang",
                'position' => "Head of Office of Administration and Education of CAEDA",
                'image' => "/assets/Lyhournang Seam.jpg",
                'gradient' => "from-blue-500 to-indigo-600",
                'order' => 1
            ],
            [
                'name' => "Miss. Von Sina",
                'position' => "Head of Office of Account and Finance of CAEDA",
                'image' => "/assets/Sina Von.jpg",
                'gradient' => "from-purple-500 to-pink-600",
                'order' => 2
            ],
            // Add others similarly...
        ];

        foreach($managers as $manager) {
            OfficeManager::create($manager);
        }
    }
}
