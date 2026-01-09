<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactMethod;

class ContactMethodSeeder extends Seeder
{
    public function run(): void
    {
        $contacts = [
            [
                'title' => 'Main Campus',
                'icon' => 'fas fa-map-marker-alt',
                'content' => 'Building 123, Street 456<br>Phnom Penh, Cambodia',
                'color' => 'from-blue-500 to-cyan-500',
                'action' => 'Get Directions',
                'action_icon' => 'fas fa-directions'
            ],
            [
                'title' => 'Phone Number',
                'icon' => 'fas fa-phone',
                'content' => '+855 23 456 789<br>+855 12 345 678 (Mobile)',
                'color' => 'from-purple-500 to-pink-500',
                'action' => 'Call Now',
                'action_icon' => 'fas fa-phone-alt'
            ],
            [
                'title' => 'Email Address',
                'icon' => 'fas fa-envelope',
                'content' => 'info@caeda.edu.kh<br>admissions@caeda.edu.kh',
                'color' => 'from-green-500 to-teal-500',
                'action' => 'Send Email',
                'action_icon' => 'fas fa-paper-plane'
            ],
            [
                'title' => 'Office Hours',
                'icon' => 'fas fa-clock',
                'content' => 'Mon - Fri: 8:00 AM - 5:00 PM<br>Sat: 9:00 AM - 1:00 PM',
                'color' => 'from-orange-500 to-red-500',
                'action' => 'Schedule Call',
                'action_icon' => 'fas fa-calendar-alt'
            ],
        ];

        foreach ($contacts as $contact) {
            ContactMethod::create($contact);
        }
    }
}
