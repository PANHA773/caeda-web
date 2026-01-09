<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newsData = [
            [
                'title' => 'Quantum Computing Breakthrough Achieved',
                'slug' => 'quantum-computing-breakthrough-achieved',
                'excerpt' => 'Our quantum computing research team has achieved a major breakthrough!',
                'content' => "🎉 BREAKING: Our quantum computing research team has achieved a major breakthrough! We've successfully demonstrated quantum supremacy with our new 72-qubit processor. This could revolutionize fields from cryptography to drug discovery.",
                'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'user' => [
                    'name' => 'Research Department',
                    'avatar' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'role' => 'Official Page',
                    'time' => '2h',
                    'verified' => true
                ],
                'likes' => 245,
                'comments' => 42,
                'shares' => 18,
                'is_liked' => false,
                'tags' => ['#QuantumComputing', '#Breakthrough', '#Research'],
                'published_at' => now()->subHours(2),
            ],
            [
                'title' => 'Ethical AI in Education Panel Discussion',
                'slug' => 'ethical-ai-in-education-panel-discussion',
                'excerpt' => 'Incredible panel discussion on Ethical AI in Education with colleagues from Stanford and MIT.',
                'content' => "Just wrapped up an incredible panel discussion on 'Ethical AI in Education' with colleagues from Stanford and MIT. So proud to see CAEDA leading these important conversations! 🤖📚",
                'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'user' => [
                    'name' => 'Dr. Sarah Chen',
                    'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b786d4d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'role' => 'Professor of AI',
                    'time' => '4h',
                    'verified' => false
                ],
                'likes' => 189,
                'comments' => 31,
                'shares' => 9,
                'is_liked' => true,
                'tags' => ['#AI', '#Education', '#Ethics'],
                'published_at' => now()->subHours(4),
            ],
            [
                'title' => 'Hackathon 2024 is Officially Open',
                'slug' => 'hackathon-2024-officially-open',
                'excerpt' => 'Hackathon 2024 is officially OPEN! Over 500 students from 30 universities competing this year.',
                'content' => "Hackathon 2024 is officially OPEN! 🚀 Over 500 students from 30 universities competing this year. The energy here is electric! Follow #CAEDAHack2024 for live updates.",
                'image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'user' => [
                    'name' => 'Student Council',
                    'avatar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'role' => 'Student Organization',
                    'time' => '6h',
                    'verified' => true
                ],
                'likes' => 523,
                'comments' => 89,
                'shares' => 45,
                'is_liked' => false,
                'tags' => ['#Hackathon', '#Students', '#Innovation'],
                'published_at' => now()->subHours(6),
            ],
            [
                'title' => 'New Digital Library Resources Available',
                'slug' => 'new-digital-library-resources-available',
                'excerpt' => 'Just added 500+ new academic journals and 200+ e-books to our digital library.',
                'content' => "📚 NEW ARRIVALS: Just added 500+ new academic journals and 200+ e-books to our digital library. Access is FREE for all CAEDA students and faculty. Knowledge should be accessible to all!",
                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                'user' => [
                    'name' => 'CAEDA Library',
                    'avatar' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                    'role' => 'Official Page',
                    'time' => '1d',
                    'verified' => true
                ],
                'likes' => 156,
                'comments' => 23,
                'shares' => 12,
                'is_liked' => false,
                'tags' => ['#Library', '#Education', '#FreeAccess'],
                'published_at' => now()->subDay(),
            ],
        ];

        foreach ($newsData as $post) {
            News::create($post);
        }
    }
}

