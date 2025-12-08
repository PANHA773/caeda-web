<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TeamMember;

class TeamMembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data to prevent duplicates
        TeamMember::truncate();

        $defaultPhoto = '/assets/img/default-team.png';

        $members = [
            [
                'name' => 'Dr. Sarah Johnson',
                'position' => 'University President',
                'photo' => $defaultPhoto,
                'bio' => 'Dr. Johnson leads CAEDA with vision and dedication to Buddhist education.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Prof. Michael Chen',
                'position' => 'Academic Dean',
                'photo' => $defaultPhoto,
                'bio' => 'Prof. Chen oversees the academic programs and faculty development.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Emma Rodriguez',
                'position' => 'Faculty Head - IT',
                'photo' => $defaultPhoto,
                'bio' => 'Dr. Rodriguez leads the IT & Computer Science faculty with innovative teaching.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Prof. David Wilson',
                'position' => 'Faculty Head - Philosophy',
                'photo' => $defaultPhoto,
                'bio' => 'Prof. Wilson heads the Philosophy faculty and research programs.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Dr. Maria Garcia',
                'position' => 'Research Director',
                'photo' => $defaultPhoto,
                'bio' => 'Dr. Garcia manages research initiatives and collaborations.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Prof. James Anderson',
                'position' => 'Student Affairs',
                'photo' => $defaultPhoto,
                'bio' => 'Prof. Anderson supports student programs and campus activities.',
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
