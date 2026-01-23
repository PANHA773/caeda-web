<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Donation;

class DonationSeeder extends Seeder
{
    public function run(): void
    {
        Donation::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john@example.com',
            'phone' => '0123456789',
            'amount' => 100,
            'cause' => 'Education',
            'payment_method' => 'card',
            'recurring' => true,
        ]);

        Donation::create([
            'first_name' => 'Jane',
            'last_name' => 'Smith',
            'email' => 'jane@example.com',
            'amount' => 50,
            'cause' => 'Nutrition',
            'payment_method' => 'paypal',
            'recurring' => false,
        ]);
    }
}
