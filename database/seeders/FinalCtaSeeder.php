<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FinalCta;

class FinalCtaSeeder extends Seeder
{
    public function run(): void
    {
        FinalCta::create([
            'stat_1_number' => '50K+',
            'stat_1_label'  => 'Active Members',

            'stat_2_number' => '500+',
            'stat_2_label'  => 'Companies',

            'stat_3_number' => '95%',
            'stat_3_label'  => 'Success Rate',

            'title' => 'Ready to Transform Your Career?',
            'highlight_text' => 'Career',
            'description' => 'Join our community of successful professionals today and start your journey',

            'primary_button_text' => 'Start 7-Day Free Trial',
            'secondary_button_text' => 'Schedule a Demo',

            'is_active' => true,
        ]);
    }
}
