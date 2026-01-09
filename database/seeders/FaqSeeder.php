<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faq;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'How do I apply for admission?',
                'answer' => 'You can apply online through our admissions portal, visit our campus, or contact the admissions team. The process typically takes 2-3 weeks.',
                'icon' => 'fas fa-graduation-cap',
                'color' => 'blue'
            ],
            [
                'question' => 'What are the entry requirements?',
                'answer' => 'Requirements vary by program, generally a high school diploma, English proficiency, and completed application form.',
                'icon' => 'fas fa-file-alt',
                'color' => 'purple'
            ],
            [
                'question' => 'Do you offer scholarships?',
                'answer' => 'Yes, we offer merit-based and need-based scholarships evaluated quarterly.',
                'icon' => 'fas fa-award',
                'color' => 'green'
            ],
            [
                'question' => 'Can international students apply?',
                'answer' => 'Absolutely! We provide visa assistance, accommodation support, and orientation programs.',
                'icon' => 'fas fa-globe',
                'color' => 'orange'
            ]
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
