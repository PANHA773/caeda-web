<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        Contact::create([
            'first_name' => 'Jane',
            'last_name'  => 'Doe',
            'email'      => 'jane@example.com',
            'phone'      => '+85512345678',
            'subject'    => 'Course Information',
            'message'    => 'I would like to know more about your courses.',
            'newsletter' => true,
        ]);
    }
}
