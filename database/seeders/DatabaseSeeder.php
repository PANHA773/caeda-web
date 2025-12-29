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

            
            // AdminSeeder::class,
            // UserSeeder::class,
            // StaffSeeder::class,
            // TeamMembersSeeder::class,
            // CoreValuesSeeder::class,
            // ProgramSeeder::class,
            // EventSeeder::class,
            // CommitteeMemberSeeder::class,
            // OfficeManagerSeeder::class,
            // FacultiesSeeder::class,
            // AboutContentSeeder::class,
            // NewsSeeder::class,
            // CommentSeeder::class,
            // PartnerSeeder::class,
            // SocialLinkSeeder::class,
            // ContactMethodSeeder::class,
            // FaqSeeder::class,
            // PricingPlanSeeder::class,
            // FeatureSeeder::class,
            // FooterSeeder::class,
            // CalendarSeeder::class,
            // WorkshopSeeder::class,
            // SpeakerSeeder::class,
            // HeroCarouselSeeder::class,
            // WelcomeSectionSeeder::class,
            // TimelineEventSeeder::class,
            // FeaturedEventSeeder::class,
            // ContactSeeder::class,
            // LeaderTeamSeeder::class,
            // ValueBenefitSeeder::class,
            // ProjectOverviewSeeder::class,
            // VisionMissionSeeder::class,
            // AccreditationSeeder::class,
            // HeroSeeder::class,
            // ImpactStorySeeder::class,
            DonationSeeder::class,
            


        ]);
    }
}
