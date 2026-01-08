<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MemberCompany;

class MemberCompanySeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            ['name'=>'TechCorp','logo'=>'💻','members'=>45,'industry'=>'Technology','color'=>'from-blue-500 to-cyan-500','animation'=>'bounce'],
            ['name'=>'DesignStudio','logo'=>'🎨','members'=>28,'industry'=>'Design','color'=>'from-purple-500 to-pink-500','animation'=>'pulse'],
            ['name'=>'DataInsights','logo'=>'📊','members'=>67,'industry'=>'Analytics','color'=>'from-green-500 to-teal-500','animation'=>'float'],
            ['name'=>'StartupXYZ','logo'=>'🚀','members'=>15,'industry'=>'Startup','color'=>'from-orange-500 to-red-500','animation'=>'shake'],
            ['name'=>'EduTech Pro','logo'=>'📚','members'=>52,'industry'=>'Education','color'=>'from-indigo-500 to-purple-500','animation'=>'spin-slow'],
            ['name'=>'FinancePlus','logo'=>'💰','members'=>38,'industry'=>'Finance','color'=>'from-emerald-500 to-green-500','animation'=>'tilt'],
        ];

        foreach($companies as $company) {
            MemberCompany::create($company);
        }
    }
}
