<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UpcomingWorkshop;

class UpcomingWorkshopSeeder extends Seeder
{
    public function run(): void
    {
        UpcomingWorkshop::insert([
            [
                'title' => 'AI in Education Workshop',
                'date' => '2024-04-20',
                'instructor' => 'Dr. Karl Meneghella',
                'image' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'instructor_image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Buddhist Art and Culture',
                'date' => '2024-04-25',
                'instructor' => 'Ven. Samnang Phally',
                'image' => 'https://images.unsplash.com/photo-1547036967-23d11aacaee0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'instructor_image' => 'https://images.unsplash.com/photo-1545235617-9465d2a55698?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Digital Literacy for Teachers',
                'date' => '2024-05-01',
                'instructor' => 'Ms. Somaly Rin',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'instructor_image' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
