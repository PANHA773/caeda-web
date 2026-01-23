<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Program;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'Bachelor of Science in Computer Science',
                'slug' => 'bachelor-of-science-in-computer-science',
                'description' => 'Comprehensive program covering software development, algorithms, data structures, and modern computing technologies. This program equips students with the skills needed to thrive in the tech industry, including web development, mobile app creation, artificial intelligence, and cloud computing.',
                'short_description' => 'Become a software engineer with our comprehensive CS program',
                'duration' => '4 Years',
                'level' => 'beginner',
                'students' => 1245,
                'rating' => 4.80,
                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Information Technology',
                'mode' => 'offline',
                'tuition' => 4500.00,
                'discount' => 4000.00,
                'badge' => 'Most Popular',
                'badge_color' => 'bg-red-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
                'start_date' => Carbon::now()->addDays(30)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(15)->toDateString(),
                'metadata' => json_encode([
                    'credits' => 120,
                    'prerequisites' => ['High School Diploma', 'Math Background'],
                    'career_paths' => ['Software Developer', 'Data Scientist', 'Systems Analyst'],
                    'faculty_count' => 15,
                    'internship_required' => true
                ])
            ],
            [
                'title' => 'Master of Business Administration',
                'slug' => 'master-of-business-administration',
                'description' => 'Advanced business management program designed for aspiring leaders. This program focuses on strategic decision-making, financial analysis, marketing strategies, and organizational leadership. Learn from industry experts and build a powerful professional network.',
                'short_description' => 'Accelerate your career with our top-ranked MBA program',
                'duration' => '2 Years',
                'level' => 'advanced',
                'students' => 895,
                'rating' => 4.90,
                'image' => 'https://images.unsplash.com/photo-1551434678-e076c223a692?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Business & Management',
                'mode' => 'hybrid',
                'tuition' => 6800.00,
                'discount' => null,
                'badge' => 'Executive',
                'badge_color' => 'bg-purple-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
                'start_date' => Carbon::now()->addDays(45)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(30)->toDateString(),
                'metadata' => json_encode([
                    'credits' => 60,
                    'prerequisites' => ['Bachelor Degree', '2 Years Work Experience'],
                    'specializations' => ['Finance', 'Marketing', 'Entrepreneurship'],
                    'networking_events' => 25,
                    'international_trip' => true
                ])
            ],
            [
                'title' => 'Digital Marketing Certification',
                'slug' => 'digital-marketing-certification',
                'description' => 'Learn modern digital marketing strategies including SEO, social media marketing, content creation, and analytics. Perfect for marketing professionals looking to upgrade their skills or entrepreneurs wanting to grow their business online.',
                'short_description' => 'Master digital marketing in 6 months',
                'duration' => '6 Months',
                'level' => 'intermediate',
                'students' => 1560,
                'rating' => 4.75,
                'image' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Marketing',
                'mode' => 'online',
                'tuition' => 1200.00,
                'discount' => 899.00,
                'badge' => 'Trending',
                'badge_color' => 'bg-green-500',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 3,
                'start_date' => Carbon::now()->addDays(15)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(5)->toDateString(),
                'metadata' => json_encode([
                    'tools' => ['Google Analytics', 'SEMrush', 'Hootsuite'],
                    'certifications' => ['Google Ads', 'Facebook Blueprint'],
                    'projects' => 5,
                    'mentorship' => true
                ])
            ],
            [
                'title' => 'Data Science Bootcamp',
                'slug' => 'data-science-bootcamp',
                'description' => 'Intensive program covering data analysis, machine learning, statistical modeling, and data visualization using Python and R. Designed for professionals transitioning into data science roles.',
                'short_description' => 'Become a data scientist in 12 weeks',
                'duration' => '12 Weeks',
                'level' => 'intermediate',
                'students' => 780,
                'rating' => 4.65,
                'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Data Science',
                'mode' => 'online',
                'tuition' => 2999.00,
                'discount' => 2499.00,
                'badge' => 'Early Bird',
                'badge_color' => 'bg-blue-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 4,
                'start_date' => Carbon::now()->addDays(60)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(45)->toDateString(),
                'metadata' => json_encode([
                    'languages' => ['Python', 'R', 'SQL'],
                    'tools' => ['Jupyter', 'TensorFlow', 'Tableau'],
                    'projects' => 8,
                    'job_guarantee' => true,
                    'career_support' => true
                ])
            ],
            [
                'title' => 'Graphic Design Masterclass',
                'slug' => 'graphic-design-masterclass',
                'description' => 'Comprehensive design program covering principles, tools, and techniques for creating stunning visual content. Learn Adobe Creative Suite, UI/UX design, and branding strategies.',
                'short_description' => 'Master professional graphic design skills',
                'duration' => '8 Months',
                'level' => 'beginner',
                'students' => 920,
                'rating' => 4.55,
                'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Design',
                'mode' => 'hybrid',
                'tuition' => 1800.00,
                'discount' => 1500.00,
                'badge' => 'Creative',
                'badge_color' => 'bg-yellow-500',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
                'start_date' => Carbon::now()->addDays(90)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(75)->toDateString(),
                'metadata' => json_encode([
                    'software' => ['Photoshop', 'Illustrator', 'Figma'],
                    'portfolio_build' => true,
                    'client_projects' => 3,
                    'freelance_guide' => true
                ])
            ],
            [
                'title' => 'Cybersecurity Professional',
                'slug' => 'cybersecurity-professional',
                'description' => 'Advanced cybersecurity program covering network security, ethical hacking, threat analysis, and security protocols. Prepare for industry certifications and high-demand security roles.',
                'short_description' => 'Become a certified cybersecurity expert',
                'duration' => '9 Months',
                'level' => 'expert',
                'students' => 420,
                'rating' => 4.95,
                'image' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                'category' => 'Cybersecurity',
                'mode' => 'online',
                'tuition' => 3500.00,
                'discount' => null,
                'badge' => 'High Demand',
                'badge_color' => 'bg-indigo-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 6,
                'start_date' => Carbon::now()->addDays(120)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(100)->toDateString(),
                'metadata' => json_encode([
                    'certifications' => ['CEH', 'Security+', 'CISSP'],
                    'labs' => 12,
                    'penetration_testing' => true,
                    'job_placement_rate' => 95
                ])
            ]
        ];

        foreach ($programs as $program) {
            // Generate slug if not provided
            if (!isset($program['slug']) || empty($program['slug'])) {
                $program['slug'] = Str::slug($program['title']);
            }
            
            // Ensure tuition and discount are decimals
            $program['tuition'] = (float) $program['tuition'];
            if (isset($program['discount']) && !is_null($program['discount'])) {
                $program['discount'] = (float) $program['discount'];
            }
            
            // Ensure rating has 2 decimal places
            $program['rating'] = round((float) $program['rating'], 2);
            
            // Handle date fields - convert Carbon to date string
            if (isset($program['start_date']) && $program['start_date'] instanceof Carbon) {
                $program['start_date'] = $program['start_date']->toDateString();
            }
            
            if (isset($program['application_deadline']) && $program['application_deadline'] instanceof Carbon) {
                $program['application_deadline'] = $program['application_deadline']->toDateString();
            }
            
            // Create the program
            Program::create($program);
        }

        // Optional: Generate additional programs for testing
        if (config('app.env') === 'local' && Program::count() < 10) {
            $this->createAdditionalPrograms();
        }
    }

    /**
     * Create additional programs for testing in development environment
     */
    private function createAdditionalPrograms(): void
    {
        $additionalPrograms = [
            [
                'title' => 'Web Development Bootcamp',
                'slug' => 'web-development-bootcamp',
                'description' => 'Learn full-stack web development with modern technologies. From frontend to backend, become a professional web developer.',
                'short_description' => 'Become a full-stack web developer in 16 weeks',
                'duration' => '16 Weeks',
                'level' => 'beginner',
                'students' => 320,
                'rating' => 4.70,
                'image' => 'https://images.unsplash.com/photo-1627398242454-45a1465c2479?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Web Development',
                'mode' => 'online',
                'tuition' => 1999.00,
                'discount' => 1499.00,
                'badge' => 'New',
                'badge_color' => 'bg-blue-500',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 7,
                'start_date' => Carbon::now()->addDays(40)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(20)->toDateString(),
            ],
            [
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'description' => 'Build native and cross-platform mobile applications for iOS and Android using modern frameworks.',
                'short_description' => 'Create mobile apps for iOS and Android',
                'duration' => '6 Months',
                'level' => 'intermediate',
                'students' => 180,
                'rating' => 4.60,
                'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Mobile Development',
                'mode' => 'online',
                'tuition' => 2200.00,
                'discount' => null,
                'badge' => 'Hot',
                'badge_color' => 'bg-orange-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 8,
                'start_date' => Carbon::now()->addDays(50)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(35)->toDateString(),
            ],
            [
                'title' => 'Project Management Professional',
                'slug' => 'project-management-professional',
                'description' => 'Master project management methodologies and prepare for PMP certification. Learn to lead projects from initiation to closure.',
                'short_description' => 'Become a certified project manager',
                'duration' => '3 Months',
                'level' => 'intermediate',
                'students' => 450,
                'rating' => 4.85,
                'image' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Project Management',
                'mode' => 'hybrid',
                'tuition' => 1500.00,
                'discount' => 1200.00,
                'badge' => 'Certification',
                'badge_color' => 'bg-purple-500',
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 9,
                'start_date' => Carbon::now()->addDays(25)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(10)->toDateString(),
            ],
            [
                'title' => 'Artificial Intelligence Fundamentals',
                'slug' => 'artificial-intelligence-fundamentals',
                'description' => 'Introduction to AI concepts, machine learning algorithms, and neural networks. Perfect for beginners wanting to enter the AI field.',
                'short_description' => 'Start your AI journey with fundamentals',
                'duration' => '4 Months',
                'level' => 'beginner',
                'students' => 610,
                'rating' => 4.75,
                'image' => 'https://images.unsplash.com/photo-1485827404703-89b55fcc595e?auto=format&fit=crop&w=1200&q=80',
                'category' => 'Artificial Intelligence',
                'mode' => 'online',
                'tuition' => 1800.00,
                'discount' => null,
                'badge' => 'Future Tech',
                'badge_color' => 'bg-teal-500',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 10,
                'start_date' => Carbon::now()->addDays(70)->toDateString(),
                'application_deadline' => Carbon::now()->addDays(55)->toDateString(),
            ]
        ];

        foreach ($additionalPrograms as $program) {
            // Set default metadata if not provided
            if (!isset($program['metadata'])) {
                $program['metadata'] = json_encode([
                    'instructor' => 'Industry Expert',
                    'prerequisites' => ['Basic Computer Skills'],
                    'certification' => true,
                ]);
            }
            
            // Generate slug if not provided
            if (!isset($program['slug']) || empty($program['slug'])) {
                $program['slug'] = Str::slug($program['title']);
            }
            
            // Ensure decimals
            $program['tuition'] = (float) $program['tuition'];
            if (isset($program['discount']) && !is_null($program['discount'])) {
                $program['discount'] = (float) $program['discount'];
            }
            
            // Ensure rating has 2 decimal places
            $program['rating'] = round((float) $program['rating'], 2);
            
            // Handle date fields
            if (isset($program['start_date']) && $program['start_date'] instanceof Carbon) {
                $program['start_date'] = $program['start_date']->toDateString();
            }
            
            if (isset($program['application_deadline']) && $program['application_deadline'] instanceof Carbon) {
                $program['application_deadline'] = $program['application_deadline']->toDateString();
            }
            
            // Create the program
            Program::create($program);
        }
    }
}