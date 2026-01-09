<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accreditation;

class AccreditationSeeder extends Seeder
{
    public function run(): void
    {
        $international = [
            "Accreditation Service for International Schools, Colleges and Universities (ASIC)",
            "International Association for Quality Assurance in Pre-Tertiary & Higher Education (QAHE)",
            "World Education Services (WES)",
            "International Network for Quality Assurance Agencies in Higher Education (INQAAHE)"
        ];

        $memberships = [
            "International Association of Universities (IAU)",
            "Times Higher Education (THE)",
            "International Education Accreditation Council (IEAC)",
            "Accreditation Committee of Cambodia (ACC)"
        ];

        foreach ($international as $title) {
            Accreditation::create([
                'title' => $title,
                'type' => 'international',
                'is_active' => true
            ]);
        }

        foreach ($memberships as $title) {
            Accreditation::create([
                'title' => $title,
                'type' => 'membership',
                'is_active' => true
            ]);
        }
    }
}
