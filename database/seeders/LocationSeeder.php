<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    public function run(): void
    {
        Location::create([
            'title'       => 'Location',
            'description' => 'CAEDA University Campus<br>Building B, Ground Floor<br>Next to the Library',
            'icon'        => 'fas fa-map-marker-alt',
            'color'       => 'text-amber-500',
            'order'       => 1,
            'status'      => true,
        ]);

        Location::create([
            'title'       => 'Hours',
            'description' => 'Weekdays: 6:30 AM - 10:00 PM<br>Weekends: 8:00 AM - 8:00 PM<br><span class="text-amber-600 font-bold">Exam Period: 24 HOURS</span>',
            'icon'        => 'fas fa-clock',
            'color'       => 'text-amber-500',
            'order'       => 2,
            'status'      => true,
        ]);

        Location::create([
            'title'       => 'Contact',
            'description' => '+855 12 345 678<br>cafe@caeda.edu.kh',
            'icon'        => 'fas fa-phone',
            'color'       => 'text-amber-500',
            'order'       => 3,
            'status'      => true,
        ]);
    }
}
