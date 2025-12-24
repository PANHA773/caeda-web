<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LeaderTeam;

class LeaderTeamSeeder extends Seeder
{
    public function run(): void
    {
        LeaderTeam::create([
            'name'      => 'Panha Thea',
            'position'  => 'President',
            'image'     => null,
            'gradient'  => 'from-green-500 to-teal-500',
            'order'     => 1,     // ✅ explicit order
            'is_active' => true,
        ]);

        LeaderTeam::create([
            'name'      => 'Sophea Chan',
            'position'  => 'Vice President',
            'image'     => null,
            'gradient'  => 'from-purple-500 to-pink-500',
            'order'     => 2,     // ✅ explicit order
            'is_active' => true,
        ]);
    }
}
