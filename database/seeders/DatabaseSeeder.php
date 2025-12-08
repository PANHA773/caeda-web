<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StaffSeeder::class,
            TeamMembersSeeder::class,
            CoreValuesSeeder::class,

            ProgramSeeder::class,
            // EventSeeder::class,
          
          

            CommitteeMemberSeeder::class,
            OfficeManagerSeeder::class,
            FacultiesSeeder::class,
            AboutContentSeeder::class,
        ]);
    }
}
