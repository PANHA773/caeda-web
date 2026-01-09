<?php

namespace Database\Seeders;
use App\Models\PricingPlan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PricingPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $plans = [
        [
            'slug' => 'basic',
            'name' => 'Basic',
            'monthly_price' => 9.99,
            'annual_price' => 99.99,
            'description' => 'Perfect for beginners starting their journey',
            'badge' => 'Starter',
            'color' => 'gray',
            'gradient' => 'from-gray-500 to-gray-700',
            'members_count' => '10K+',
            'is_popular' => false,
            'features' => [
                'Access to basic courses',
                'Community support',
                'Weekly Q&A sessions',
                'Basic progress tracking',
                'Email support'
            ],
        ],
        [
            'slug' => 'pro',
            'name' => 'Professional',
            'monthly_price' => 29.99,
            'annual_price' => 299.99,
            'description' => 'Ideal for serious learners and professionals',
            'badge' => 'Most Popular',
            'color' => 'blue',
            'gradient' => 'from-blue-500 to-purple-600',
            'members_count' => '5K+',
            'is_popular' => true,
            'features' => [
                'All Basic features',
                'Unlimited course access',
                'Priority support',
                'Certification programs',
                'Project reviews',
                'Career guidance',
                '1-on-1 mentoring sessions'
            ],
        ],
        [
            'slug' => 'enterprise',
            'name' => 'Enterprise',
            'monthly_price' => 79.99,
            'annual_price' => 799.99,
            'description' => 'For teams and organizations',
            'badge' => 'Teams',
            'color' => 'purple',
            'gradient' => 'from-purple-500 to-pink-600',
            'members_count' => '500+',
            'is_popular' => false,
            'features' => [
                'All Professional features',
                'Team management dashboard',
                'Custom learning paths',
                'API access',
                'Dedicated account manager',
                'White-label options',
                'Advanced analytics',
                'SSO integration'
            ],
        ],
    ];

    foreach ($plans as $planData) {
        $features = $planData['features'];
        unset($planData['features']);

        $plan = PricingPlan::create($planData);

        foreach ($features as $feature) {
            $plan->features()->create(['feature' => $feature]);
        }
    }
}
}
