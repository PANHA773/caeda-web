<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Leadership;


public function run()
{
    Leadership::insert([
        ['name' => 'Dr. Sarah Johnson', 'role' => 'University President', 'order' => 1],
        ['name' => 'Prof. Michael Chen', 'role' => 'Academic Dean', 'order' => 2],
        ['name' => 'Dr. Emma Rodriguez', 'role' => 'Faculty Head - IT', 'order' => 3],
        // add more...
    ]);
}

