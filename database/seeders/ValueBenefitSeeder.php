<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ValueBenefit;

class ValueBenefitSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            'Royal and Governmental Endorsement',
            'National Accreditation',
            'Recognition by the Ministry of Education and Sports',
            'Cultural and Religious Accreditation',
            'Inclusivity and Outreach',
            'International Association of Universities Membership',
            'Global Recognition in Key Databases',
            'International Accreditations and Recognitions',
            'Sustainability of Educational Programs',
            'Collaboration with Stakeholders',
            'Empowerment of Educators and Communities',
            'Advocacy for Systemic Change',
            'Premier Membership in Times Higher Education',
            'Recognition by University Grants Commission of Sri Lanka',
            'Curriculum Quality and Supervision',
            'Pathways to Advanced Degrees',
        ];

        foreach ($values as $index => $value) {
            ValueBenefit::create([
                'title' => $value,
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);
        }
    }
}
