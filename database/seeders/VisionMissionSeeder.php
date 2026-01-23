<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisionMission;

class VisionMissionSeeder extends Seeder
{
    public function run(): void
    {
        VisionMission::create([
            'type' => 'vision',
            'description' => 'To create a world where quality education is accessible to every person, regardless of socio-economic background, geographic location, or cultural heritage.',
            'is_active' => true,
        ]);

        VisionMission::create([
            'type' => 'mission',
            'description' => 'Our mission is to bridge educational gaps by providing inclusive, equitable, and high-quality learning opportunities for everyone through innovative programs and international collaboration.',
            'is_active' => true,
        ]);
    }
}
