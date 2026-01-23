<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommitteeMember;

class CommitteeMemberSeeder extends Seeder
{
    public function run(): void
    {
        CommitteeMember::insert([
            [
                'name' => 'Mr. Khim Darath',
                'position' => 'Chair of Advisory Board of Cambodia-ASEAN Educational Development Association',
                'image' => '/assets/Mr.Darat.JPG',
                'gradient' => 'from-purple-500 to-pink-600',
                'order' => 1,
            ],
            [
                'name' => 'Mr. Khim Daro',
                'position' => 'Executive Director of Cambodia-ASEAN Educational Development Association',
                'image' => '/assets/bour-ky.jpg',
                'gradient' => 'from-blue-500 to-cyan-600',
                'order' => 2,
            ],
            // Add others...
        ]);
    }
}
