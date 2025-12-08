@extends('layouts.app')

@section('title', 'News & Updates - CAEDA')

@section('extra-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }
        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
            50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); }
        }
        @keyframes slide-in-left {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-in-right {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #3b82f6 }
        }
        
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-float { animation: float 4s ease-in-out infinite; }
        .animate-pulse-glow { animation: pulse-glow 2s ease-in-out infinite; }
        .animate-slide-in-left { animation: slide-in-left 0.8s ease-out forwards; }
        .animate-slide-in-right { animation: slide-in-right 0.8s ease-out forwards; }
        .animate-shimmer { animation: shimmer 2s infinite linear; }
        .animate-typing { 
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
            overflow: hidden;
            border-right: .15em solid #3b82f6;
            white-space: nowrap;
        }
        
        .font-cinzel { font-family: 'Cinzel', serif; }
        .news-card-gradient {
            background: linear-gradient(145deg, #ffffff, #f5f7ff);
            box-shadow: 20px 20px 60px #d9d9d9, -20px -20px 60px #ffffff;
        }
        .hover-scale {
            transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .hover-scale:hover {
            transform: translateY(-10px) scale(1.03);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .text-gradient {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .category-badge {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        .category-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
            transition: left 0.5s;
        }
        .category-badge:hover::before {
            left: 100%;
        }
        .news-image-hover {
            transition: all 0.5s ease;
            filter: brightness(0.95);
        }
        .news-image-hover:hover {
            filter: brightness(1.05) contrast(1.1);
            transform: scale(1.05);
        }
        .read-time-indicator {
            position: relative;
            overflow: hidden;
        }
        .read-time-indicator::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #8b5cf6);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.3s ease;
        }
        .read-time-indicator:hover::after {
            transform: scaleX(1);
        }
        .trending-badge {
            background: linear-gradient(135deg, #ff6b6b, #ff8e53);
            position: relative;
            overflow: hidden;
        }
        .trending-badge::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255,255,255,0.1), transparent);
            animation: shimmer 2s infinite;
        }
        .featured-news-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            overflow: hidden;
        }
        .featured-news-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path d="M0,0 L100,0 L100,100 Z" fill="rgba(255,255,255,0.1)"/></svg>');
            background-size: 100% 100%;
        }
        .news-content {
            position: relative;
            overflow: hidden;
        }
        .news-content::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100px;
            background: linear-gradient(to top, white, transparent);
            pointer-events: none;
        }
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        .typewriter-text {
            display: inline-block;
            overflow: hidden;
            border-right: 3px solid #3b82f6;
            white-space: nowrap;
            animation: typing 3.5s steps(40, end) infinite, blink-caret .75s step-end infinite;
        }
        .news-skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: shimmer 1.5s infinite linear;
        }
    </style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1588681664899-f142ff2dc9b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20"></div>
    </div>
    
    {{-- Animated floating elements --}}
    <div class="absolute top-20 left-10 w-24 h-24 bg-blue-500/20 rounded-full animate-float"></div>
    <div class="absolute bottom-24 right-16 w-32 h-32 bg-purple-500/20 rounded-full animate-float" style="animation-delay: 1s"></div>
    <div class="absolute top-1/3 right-1/4 w-20 h-20 bg-pink-500/20 rounded-full animate-float" style="animation-delay: 2s"></div>
    <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-cyan-500/20 rounded-full animate-float" style="animation-delay: 1.5s"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-8 animate-slide-in-left">
                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                <span class="text-white font-semibold text-sm md:text-base">Latest Updates • Stay Informed</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-white font-cinzel">
                <span class="text-gradient">News</span> & 
                <span class="block bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent animate-gradient-x">Updates</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed animate-slide-in-right">
                Stay informed with the latest developments, announcements, and insights from CAEDA.
                <span class="block mt-2 text-lg text-blue-200">Your source for educational innovation and community achievements.</span>
            </p>
            
            <div class="relative max-w-2xl mx-auto mb-12">
                <div class="relative">
                    <input type="text" 
                           id="news-search" 
                           placeholder="Search news, articles, or announcements..." 
                           class="w-full px-8 py-4 pl-14 rounded-2xl bg-white/10 backdrop-blur-lg border-2 border-white/30 text-white placeholder-blue-200 focus:outline-none focus:border-blue-400 focus:ring-4 focus:ring-blue-500/30 transition-all duration-300">
                    <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-blue-300 text-lg"></i>
                    <button class="absolute right-3 top-1/2 transform -translate-y-1/2 bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-2.5 rounded-xl hover:from-blue-600 hover:to-purple-600 transition-all duration-300 shadow-lg">
                        Search
                    </button>
                </div>
                <div class="flex flex-wrap justify-center gap-2 mt-4">
                    <span class="text-blue-200 text-sm">Popular searches:</span>
                    <a href="#" class="text-white hover:text-blue-300 text-sm bg-white/10 px-3 py-1 rounded-lg transition">Research</a>
                    <a href="#" class="text-white hover:text-blue-300 text-sm bg-white/10 px-3 py-1 rounded-lg transition">Events</a>
                    <a href="#" class="text-white hover:text-blue-300 text-sm bg-white/10 px-3 py-1 rounded-lg transition">Awards</a>
                    <a href="#" class="text-white hover:text-blue-300 text-sm bg-white/10 px-3 py-1 rounded-lg transition">Partnerships</a>
                </div>
            </div>
            
            <div class="flex flex-wrap justify-center gap-4 animate-fade-in-up" style="animation-delay: 0.3s">
                <button onclick="scrollToLatest()" class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                    <span>Latest News</span>
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </button>
                <button class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm flex items-center">
                    <i class="fas fa-rss mr-2"></i>
                    <span>Subscribe to Newsletter</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= FEATURED NEWS ================= --}}
<section class="py-16 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex items-center justify-between mb-12 animate-fade-in-up">
            <div>
                <div class="inline-flex items-center bg-gradient-to-r from-blue-500 to-purple-500 text-white text-sm font-bold px-4 py-2 rounded-full mb-3 animate-pulse-glow">
                    <i class="fas fa-star mr-2"></i> FEATURED STORY
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                    Today's <span class="text-gradient">Highlight</span>
                </h2>
                <p class="text-gray-600 mt-2">Most important news of the week</p>
            </div>
            <div class="hidden md:flex items-center gap-2">
                <button class="p-3 rounded-xl bg-white shadow-md hover:shadow-lg transition">
                    <i class="fas fa-chevron-left text-gray-600"></i>
                </button>
                <button class="p-3 rounded-xl bg-white shadow-md hover:shadow-lg transition">
                    <i class="fas fa-chevron-right text-gray-600"></i>
                </button>
            </div>
        </div>
        
        <div class="featured-news-gradient rounded-3xl overflow-hidden shadow-2xl hover-scale animate-fade-in-up" style="animation-delay: 0.2s">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="p-10 text-white">
                    <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 mb-6">
                        <i class="fas fa-trophy mr-2"></i>
                        <span class="text-sm font-semibold">EXCLUSIVE INTERVIEW</span>
                    </div>
                    <h3 class="text-3xl md:text-4xl font-bold mb-6 leading-tight">
                        CAEDA Wins National Award for Educational Innovation 2024
                    </h3>
                    <p class="text-blue-100 mb-8 text-lg leading-relaxed">
                        Our groundbreaking research in adaptive learning technologies has been recognized as the most innovative educational project of the year.
                    </p>
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="w-12 h-12 rounded-full bg-gradient-to-r from-blue-400 to-cyan-400 flex items-center justify-center text-white font-bold mr-4">
                                CS
                            </div>
                            <div>
                                <div class="font-semibold">Dr. Chen Sokny</div>
                                <div class="text-blue-200 text-sm">Research Director</div>
                            </div>
                        </div>
                        <div class="text-blue-200">
                            <i class="far fa-clock mr-2"></i> 8 min read
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <button class="flex-1 bg-white text-blue-600 hover:bg-blue-50 font-semibold py-3.5 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                            Read Full Story
                        </button>
                        <button class="p-3.5 bg-white/20 hover:bg-white/30 rounded-xl transition">
                            <i class="fas fa-share-alt"></i>
                        </button>
                        <button class="p-3.5 bg-white/20 hover:bg-white/30 rounded-xl transition">
                            <i class="far fa-bookmark"></i>
                        </button>
                    </div>
                </div>
                <div class="relative h-64 lg:h-auto min-h-[400px]">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
                         alt="Award Ceremony"
                         class="absolute inset-0 w-full h-full object-cover news-image-hover">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-transparent lg:hidden"></div>
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-6">
                        <div class="text-white">
                            <div class="text-sm font-semibold mb-2">📸 Photo Gallery</div>
                            <div class="text-xs text-blue-200">12 photos from the award ceremony</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= NEWS GRID ================= --}}
<section id="latest-news" class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row gap-12">
            {{-- MAIN CONTENT --}}
            <div class="lg:w-2/3">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-12 animate-fade-in-up">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 font-cinzel">
                            Latest <span class="text-gradient">News</span>
                        </h2>
                        <p class="text-gray-600 mt-2">Fresh updates from our community and beyond</p>
                    </div>
                    <div class="mt-4 sm:mt-0">
                        <div class="flex items-center gap-3">
                            <span class="text-gray-600 text-sm">Sort by:</span>
                            <select class="bg-gray-100 border-none rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                                <option>Newest First</option>
                                <option>Most Popular</option>
                                <option>Trending</option>
                                <option>Oldest First</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                {{-- NEWS FILTERS --}}
                <div class="flex flex-wrap gap-3 mb-10 animate-fade-in-up" style="animation-delay: 0.1s">
                    <button class="news-filter active bg-gradient-to-r from-blue-500 to-purple-500 text-white px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="all">
                        All News
                    </button>
                    <button class="news-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="research">
                        <i class="fas fa-flask mr-2"></i> Research
                    </button>
                    <button class="news-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="announcement">
                        <i class="fas fa-bullhorn mr-2"></i> Announcements
                    </button>
                    <button class="news-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="event">
                        <i class="fas fa-calendar-alt mr-2"></i> Events
                    </button>
                    <button class="news-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="achievement">
                        <i class="fas fa-trophy mr-2"></i> Achievements
                    </button>
                    <button class="news-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-5 py-2.5 rounded-xl font-medium transition-all duration-300 hover:shadow-lg" data-filter="partnership">
                        <i class="fas fa-handshake mr-2"></i> Partnerships
                    </button>
                </div>
                
                {{-- NEWS GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @php
                        $news = [
                            [
                                'id' => 1,
                                'title' => 'New AI Research Lab Opens at CAEDA Campus',
                                'description' => 'State-of-the-art facility dedicated to artificial intelligence and machine learning research begins operations.',
                                'date' => 'Dec 3, 2024',
                                'category' => 'research',
                                'category_label' => 'Research',
                                'image' => 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Dr. James Wilson',
                                'read_time' => '5 min',
                                'trending' => true,
                                'tags' => ['AI', 'Technology', 'Innovation']
                            ],
                            [
                                'id' => 2,
                                'title' => 'Partnership Announced with MIT for Student Exchange Program',
                                'description' => 'New collaboration enables CAEDA students to study at MIT and vice versa starting next semester.',
                                'date' => 'Dec 1, 2024',
                                'category' => 'partnership',
                                'category_label' => 'Partnership',
                                'image' => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Admin Office',
                                'read_time' => '3 min',
                                'trending' => true,
                                'tags' => ['Partnership', 'International', 'Students']
                            ],
                            [
                                'id' => 3,
                                'title' => 'CAEDA Researchers Discover Breakthrough in Quantum Computing',
                                'description' => 'Groundbreaking algorithm reduces quantum error rates by 75%, accelerating practical quantum computing.',
                                'date' => 'Nov 28, 2024',
                                'category' => 'research',
                                'category_label' => 'Research',
                                'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Dr. Sarah Chen',
                                'read_time' => '7 min',
                                'trending' => false,
                                'tags' => ['Quantum', 'Research', 'Breakthrough']
                            ],
                            [
                                'id' => 4,
                                'title' => 'Annual Research Symposium Dates Announced',
                                'description' => 'Mark your calendars for the biggest research event of the year featuring international speakers.',
                                'date' => 'Nov 25, 2024',
                                'category' => 'event',
                                'category_label' => 'Event',
                                'image' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Events Team',
                                'read_time' => '2 min',
                                'trending' => false,
                                'tags' => ['Symposium', 'Conference', 'Research']
                            ],
                            [
                                'id' => 5,
                                'title' => 'Student Team Wins International Hackathon 2024',
                                'description' => 'Our students developed an AI-powered solution for sustainable agriculture, beating 200+ teams.',
                                'date' => 'Nov 22, 2024',
                                'category' => 'achievement',
                                'category_label' => 'Achievement',
                                'image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Student Affairs',
                                'read_time' => '4 min',
                                'trending' => true,
                                'tags' => ['Students', 'Hackathon', 'Winners']
                            ],
                            [
                                'id' => 6,
                                'title' => 'New Online Learning Platform Launches',
                                'description' => 'Interactive platform offers courses in emerging technologies with industry certification.',
                                'date' => 'Nov 20, 2024',
                                'category' => 'announcement',
                                'category_label' => 'Announcement',
                                'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'author' => 'Digital Learning',
                                'read_time' => '6 min',
                                'trending' => false,
                                'tags' => ['E-Learning', 'Platform', 'Courses']
                            ],
                        ];
                    @endphp
                    
                    @foreach($news as $index => $item)
                        <div class="news-card bg-white rounded-3xl overflow-hidden shadow-xl hover-scale news-card-gradient animate-fade-in-up"
                             data-category="{{ $item['category'] }}"
                             style="animation-delay: {{ $index * 150 }}ms">
                            
                            <div class="relative overflow-hidden h-56">
                                <img src="{{ $item['image'] }}" 
                                     alt="{{ $item['title'] }}"
                                     class="w-full h-full object-cover news-image-hover">
                                
                                @if($item['trending'])
                                    <div class="absolute top-4 left-4 trending-badge text-white px-4 py-2 rounded-full text-xs font-bold shadow-lg">
                                        🔥 TRENDING
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4">
                                    <span class="category-badge bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        {{ $item['category_label'] }}
                                    </span>
                                </div>
                                
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                    <div class="text-white text-sm">{{ $item['date'] }}</div>
                                    <div class="text-blue-200 text-xs">{{ $item['author'] }}</div>
                                </div>
                            </div>
                            
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">{{ $item['title'] }}</h3>
                                
                                <p class="text-gray-600 mb-4 leading-relaxed">
                                    {{ $item['description'] }}
                                </p>
                                
                                <div class="flex flex-wrap gap-2 mb-6">
                                    @foreach($item['tags'] as $tag)
                                        <span class="text-xs font-medium px-3 py-1.5 bg-gray-100 text-gray-700 rounded-full">
                                            #{{ $tag }}
                                        </span>
                                    @endforeach
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="read-time-indicator text-sm text-gray-500 font-medium">
                                        <i class="far fa-clock mr-1"></i>
                                        {{ $item['read_time'] }} read
                                    </div>
                                    <div class="flex gap-2">
                                        <button onclick="viewNews({{ $item['id'] }})" 
                                                class="px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                                            Read More
                                        </button>
                                        <button class="p-2.5 border border-gray-300 rounded-xl text-gray-600 hover:border-blue-500 hover:text-blue-600 transition">
                                            <i class="far fa-bookmark"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                {{-- PAGINATION --}}
                <div class="mt-12 flex justify-center animate-fade-in-up">
                    <nav class="inline-flex rounded-2xl bg-gray-100 p-2 shadow-inner">
                        <button class="px-4 py-2.5 rounded-xl bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition shadow-md">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-5 py-2.5 mx-1 rounded-xl bg-gradient-to-r from-blue-500 to-purple-500 text-white font-medium shadow-md">
                            1
                        </button>
                        <button class="px-5 py-2.5 mx-1 rounded-xl bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition shadow-md">
                            2
                        </button>
                        <button class="px-5 py-2.5 mx-1 rounded-xl bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition shadow-md">
                            3
                        </button>
                        <span class="px-3 py-2.5 text-gray-500">...</span>
                        <button class="px-5 py-2.5 mx-1 rounded-xl bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition shadow-md">
                            8
                        </button>
                        <button class="px-4 py-2.5 rounded-xl bg-white text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition shadow-md">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </nav>
                </div>
            </div>
            
            {{-- SIDEBAR --}}
            <div class="lg:w-1/3">
                {{-- TRENDING NOW --}}
                <div class="mb-10 animate-fade-in-up" style="animation-delay: 0.3s">
                    <div class="flex items-center mb-6">
                        <div class="w-2 h-8 bg-gradient-to-b from-blue-500 to-purple-500 rounded-full mr-3"></div>
                        <h3 class="text-2xl font-bold text-gray-900">Trending Now</h3>
                    </div>
                    
                    <div class="space-y-6">
                        @foreach(array_slice($news, 0, 3) as $item)
                            @if($item['trending'])
                                <div class="group p-4 rounded-2xl bg-gradient-to-r from-blue-50 to-purple-50 hover:from-blue-100 hover:to-purple-100 transition-all duration-300 cursor-pointer">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden">
                                            <img src="{{ $item['image'] }}" 
                                                 alt="{{ $item['title'] }}"
                                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2 mb-1">
                                                <span class="text-xs font-semibold px-2 py-1 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-full">
                                                    {{ $item['category_label'] }}
                                                </span>
                                                <span class="text-xs text-gray-500">{{ $item['date'] }}</span>
                                            </div>
                                            <h4 class="font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 leading-tight">
                                                {{ Str::limit($item['title'], 50) }}
                                            </h4>
                                            <div class="flex items-center text-sm text-gray-600 mt-2">
                                                <i class="fas fa-fire text-orange-500 mr-1"></i>
                                                <span>Trending</span>
                                                <span class="mx-2">•</span>
                                                <i class="far fa-clock mr-1"></i>
                                                <span>{{ $item['read_time'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                
                {{-- NEWSLETTER --}}
                <div class="mb-10 glass-effect rounded-3xl p-6 shadow-xl animate-fade-in-up" style="animation-delay: 0.4s">
                    <div class="text-center mb-6">
                        <div class="w-16 h-16 mx-auto mb-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                            <i class="fas fa-paper-plane text-2xl text-white"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Stay Updated</h3>
                        <p class="text-gray-600 text-sm">Get the latest news delivered to your inbox</p>
                    </div>
                    
                    <form class="space-y-4">
                        <input type="email" 
                               placeholder="Your email address" 
                               class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3.5 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                            Subscribe Now
                        </button>
                    </form>
                    
                    <p class="text-xs text-gray-500 text-center mt-4">
                        We respect your privacy. Unsubscribe at any time.
                    </p>
                </div>
                
                {{-- CATEGORIES --}}
                <div class="mb-10 animate-fade-in-up" style="animation-delay: 0.5s">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Categories</h3>
                    
                    <div class="space-y-3">
                        @php
                            $categories = [
                                ['name' => 'Research', 'count' => 24, 'icon' => 'fas fa-flask', 'color' => 'bg-blue-500'],
                                ['name' => 'Announcements', 'count' => 18, 'icon' => 'fas fa-bullhorn', 'color' => 'bg-purple-500'],
                                ['name' => 'Events', 'count' => 32, 'icon' => 'fas fa-calendar-alt', 'color' => 'bg-green-500'],
                                ['name' => 'Achievements', 'count' => 15, 'icon' => 'fas fa-trophy', 'color' => 'bg-yellow-500'],
                                ['name' => 'Partnerships', 'count' => 9, 'icon' => 'fas fa-handshake', 'color' => 'bg-pink-500'],
                                ['name' => 'Student News', 'count' => 28, 'icon' => 'fas fa-user-graduate', 'color' => 'bg-indigo-500'],
                            ];
                        @endphp
                        
                        @foreach($categories as $category)
                            <a href="#" class="flex items-center justify-between p-4 rounded-2xl bg-gray-50 hover:bg-blue-50 hover:text-blue-600 transition-all duration-300 group">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 {{ $category['color'] }} rounded-xl flex items-center justify-center mr-4 group-hover:scale-110 transition-transform duration-300">
                                        <i class="{{ $category['icon'] }} text-white"></i>
                                    </div>
                                    <span class="font-medium">{{ $category['name'] }}</span>
                                </div>
                                <span class="px-3 py-1 bg-white rounded-full text-sm font-semibold text-gray-700 group-hover:bg-blue-100 group-hover:text-blue-700">
                                    {{ $category['count'] }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
                
                {{-- TAGS CLOUD --}}
                <div class="animate-fade-in-up" style="animation-delay: 0.6s">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Popular Tags</h3>
                    
                    <div class="flex flex-wrap gap-3">
                        @php
                            $tags = ['AI', 'Research', 'Technology', 'Innovation', 'Education', 'Students', 'Quantum', 'Machine Learning', 'Data Science', 'Startup', 'International', 'Conference', 'Hackathon', 'Awards', 'Sustainability'];
                        @endphp
                        
                        @foreach($tags as $tag)
                            <a href="#" class="px-4 py-2.5 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-blue-100 hover:to-purple-100 text-gray-700 hover:text-blue-600 font-medium rounded-xl transition-all duration-300 hover:scale-105 hover:shadow-lg">
                                #{{ $tag }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= MULTIMEDIA SECTION ================= --}}
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 font-cinzel">
                Multimedia <span class="text-gradient">Gallery</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Visual stories, interviews, and highlights from our events and research
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            @php
                $multimedia = [
                    [
                        'type' => 'video',
                        'title' => 'Behind the Scenes: Award Ceremony',
                        'thumbnail' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                        'duration' => '5:42',
                        'views' => '2.4K'
                    ],
                    [
                        'type' => 'gallery',
                        'title' => 'Research Symposium 2024 Photos',
                        'thumbnail' => 'https://images.unsplash.com/photo-1497366754035-f200968a6e72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                        'count' => 48,
                        'icon' => 'fas fa-images'
                    ],
                    [
                        'type' => 'podcast',
                        'title' => 'AI in Education: Expert Roundtable',
                        'thumbnail' => 'https://images.unsplash.com/photo-1590602847869-f468a594f5c7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                        'duration' => '42:15',
                        'icon' => 'fas fa-podcast'
                    ],
                    [
                        'type' => 'document',
                        'title' => 'Annual Research Report 2024',
                        'thumbnail' => 'https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                        'pages' => 124,
                        'icon' => 'fas fa-file-pdf'
                    ],
                ];
            @endphp
            
            @foreach($multimedia as $index => $media)
                <div class="group bg-white rounded-3xl overflow-hidden shadow-xl hover-scale animate-fade-in-up" 
                     style="animation-delay: {{ $index * 150 }}ms">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $media['thumbnail'] }}" 
                             alt="{{ $media['title'] }}"
                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <button class="w-14 h-14 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white shadow-lg transform group-hover:scale-110 transition-transform duration-300">
                                @if($media['type'] == 'video')
                                    <i class="fas fa-play text-xl"></i>
                                @elseif($media['type'] == 'gallery')
                                    <i class="fas fa-images text-xl"></i>
                                @elseif($media['type'] == 'podcast')
                                    <i class="fas fa-play-circle text-xl"></i>
                                @else
                                    <i class="fas fa-download text-xl"></i>
                                @endif
                            </button>
                        </div>
                        
                        @if($media['type'] == 'video')
                            <div class="absolute bottom-4 right-4 bg-black/70 text-white px-3 py-1 rounded-lg text-sm font-semibold">
                                {{ $media['duration'] }}
                            </div>
                        @endif
                    </div>
                    
                    <div class="p-5">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 rounded-lg {{ 
                                $media['type'] == 'video' ? 'bg-red-500' : 
                                ($media['type'] == 'gallery' ? 'bg-green-500' : 
                                ($media['type'] == 'podcast' ? 'bg-purple-500' : 'bg-blue-500')) 
                            }} flex items-center justify-center mr-3">
                                <i class="text-white text-sm {{ 
                                    $media['type'] == 'video' ? 'fas fa-video' : 
                                    ($media['type'] == 'gallery' ? 'fas fa-images' : 
                                    ($media['type'] == 'podcast' ? 'fas fa-podcast' : 'fas fa-file-alt')) 
                                }}"></i>
                            </div>
                            <span class="text-sm font-semibold text-gray-700">{{ ucfirst($media['type']) }}</span>
                        </div>
                        
                        <h4 class="font-bold text-gray-900 mb-3 leading-tight">{{ $media['title'] }}</h4>
                        
                        <div class="flex items-center text-sm text-gray-600">
                            @if($media['type'] == 'video')
                                <i class="fas fa-eye mr-1"></i>
                                <span>{{ $media['views'] }} views</span>
                            @elseif($media['type'] == 'gallery')
                                <i class="{{ $media['icon'] }} mr-1"></i>
                                <span>{{ $media['count'] }} photos</span>
                            @elseif($media['type'] == 'podcast')
                                <i class="{{ $media['icon'] }} mr-1"></i>
                                <span>{{ $media['duration'] }}</span>
                            @else
                                <i class="{{ $media['icon'] }} mr-1"></i>
                                <span>{{ $media['pages'] }} pages</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <button class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                Explore More Media
            </button>
        </div>
    </div>
</section>

{{-- ================= ARCHIVES ================= --}}
<section class="py-20 px-4 md:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between mb-12 animate-fade-in-up">
            <div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2 font-cinzel">
                    News <span class="text-gradient">Archives</span>
                </h2>
                <p class="text-gray-600">Browse past news and updates by year and month</p>
            </div>
            <div class="mt-4 lg:mt-0">
                <select class="bg-gray-100 border-none rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none">
                    <option>Browse by Year</option>
                    <option>2024</option>
                    <option>2023</option>
                    <option>2022</option>
                    <option>2021</option>
                    <option>2020</option>
                </select>
            </div>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4 animate-fade-in-up" style="animation-delay: 0.2s">
            @php
                $months = [
                    ['name' => 'January', 'count' => 12],
                    ['name' => 'February', 'count' => 8],
                    ['name' => 'March', 'count' => 15],
                    ['name' => 'April', 'count' => 9],
                    ['name' => 'May', 'count' => 11],
                    ['name' => 'June', 'count' => 18],
                    ['name' => 'July', 'count' => 7],
                    ['name' => 'August', 'count' => 14],
                    ['name' => 'September', 'count' => 16],
                    ['name' => 'October', 'count' => 13],
                    ['name' => 'November', 'count' => 10],
                    ['name' => 'December', 'count' => 5],
                ];
            @endphp
            
            @foreach($months as $month)
                <div class="group p-5 text-center rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 hover:from-blue-50 hover:to-purple-50 transition-all duration-300 cursor-pointer hover-scale">
                    <div class="text-3xl font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors duration-300">
                        {{ substr($month['name'], 0, 3) }}
                    </div>
                    <div class="text-sm text-gray-600 mb-2">{{ $month['name'] }}</div>
                    <div class="text-xs font-semibold px-3 py-1.5 bg-white rounded-full text-gray-700 group-hover:bg-blue-100 group-hover:text-blue-700 transition-colors duration-300">
                        {{ $month['count'] }} articles
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= CTA SECTION ================= --}}
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full translate-x-1/3 translate-y-1/3"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <div class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-8">
            <i class="fas fa-newspaper mr-2"></i>
            <span class="font-semibold">STAY CONNECTED</span>
        </div>
        
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
            Never Miss an <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">Update</span>
        </h2>
        <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">
            Subscribe to our newsletter and be the first to know about our latest news, events, and research breakthroughs
        </p>
        
        <div class="max-w-md mx-auto mb-12">
            <div class="flex gap-2">
                <input type="email" 
                       placeholder="Enter your email address" 
                       class="flex-1 px-6 py-4 rounded-2xl bg-white/10 backdrop-blur-sm border border-white/30 text-white placeholder-blue-200 focus:outline-none focus:ring-4 focus:ring-blue-500/30 focus:border-blue-400 transition">
                <button class="bg-gradient-to-r from-cyan-400 to-blue-400 hover:from-cyan-500 hover:to-blue-500 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                    Subscribe
                </button>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-6 justify-center text-sm">
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>No spam, ever</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>Unsubscribe anytime</span>
            </div>
            <div class="flex items-center">
                <i class="fas fa-check-circle text-green-300 mr-2"></i>
                <span>Weekly digest</span>
            </div>
        </div>
    </div>
</section>

{{-- Loading Modal --}}
<div id="loading-modal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-3xl shadow-2xl max-w-md mx-4 text-center animate-scale-in">
        <svg class="animate-spin mx-auto h-12 w-12 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Loading News</h3>
        <p class="text-gray-600">Please wait while we fetch the latest articles...</p>
    </div>
</div>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // News filtering
    const newsFilters = document.querySelectorAll('.news-filter');
    const newsCards = document.querySelectorAll('.news-card');
    
    newsFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            // Update active filter
            newsFilters.forEach(f => f.classList.remove('active', 'bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white'));
            newsFilters.forEach(f => f.classList.add('bg-gray-100', 'hover:bg-gray-200', 'text-gray-800'));
            this.classList.remove('bg-gray-100', 'hover:bg-gray-200', 'text-gray-800');
            this.classList.add('active', 'bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white');
            
            const filterValue = this.dataset.filter;
            
            // Filter news cards
            newsCards.forEach(card => {
                if (filterValue === 'all' || card.dataset.category === filterValue) {
                    card.style.display = 'block';
                    card.classList.add('animate-fade-in-up');
                } else {
                    card.style.display = 'none';
                    card.classList.remove('animate-fade-in-up');
                }
            });
        });
    });
    
    // Search functionality
    const searchInput = document.getElementById('news-search');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase().trim();
            
            if (searchTerm.length > 2) {
                // Show loading
                const modal = document.getElementById('loading-modal');
                modal.classList.remove('hidden');
                
                // Simulate search
                setTimeout(() => {
                    modal.classList.add('hidden');
                    searchNews(searchTerm);
                }, 1000);
            }
        }, 500));
    }
    
    // Intersection Observer for animations
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        },
        { threshold: 0.1 }
    );
    
    // Observe all animated elements
    document.querySelectorAll('.animate-fade-in-up').forEach((el) => {
        observer.observe(el);
    });
    
    // Trending badges animation
    const trendingBadges = document.querySelectorAll('.trending-badge');
    trendingBadges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
        });
        
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
    
    // Bookmark functionality
    document.querySelectorAll('.fa-bookmark').forEach(bookmark => {
        bookmark.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('far');
            this.classList.toggle('fas');
            this.classList.toggle('text-blue-500');
            
            const newsTitle = this.closest('.news-card')?.querySelector('h3')?.textContent || 'News article';
            const action = this.classList.contains('fas') ? 'Bookmarked' : 'Removed bookmark';
            
            showNotification(`${action}: ${newsTitle}`, this.classList.contains('fas') ? 'success' : 'info');
        });
    });
    
    // Share functionality
    document.querySelectorAll('.fa-share-alt').forEach(shareBtn => {
        shareBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const newsTitle = this.closest('.featured-news-gradient')?.querySelector('h3')?.textContent || 'CAEDA News';
            const newsUrl = window.location.href;
            
            if (navigator.share) {
                navigator.share({
                    title: newsTitle,
                    text: 'Check out this news from CAEDA',
                    url: newsUrl
                });
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(`${newsTitle} - ${newsUrl}`);
                showNotification('Link copied to clipboard!', 'success');
            }
        });
    });
});

// Global functions
function scrollToLatest() {
    document.getElementById('latest-news').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

function viewNews(newsId) {
    // Show loading modal
    const modal = document.getElementById('loading-modal');
    modal.classList.remove('hidden');
    
    // Simulate loading
    setTimeout(() => {
        modal.classList.add('hidden');
        
        // In a real application, you would redirect to the news article page
        // window.location.href = `/news/${newsId}`;
        
        // For demo purposes, show an alert
        showNotification(`Loading news article #${newsId}...`, 'info');
    }, 1500);
}

function searchNews(term) {
    // In a real application, you would make an API call
    // fetch(`/api/news/search?q=${term}`)
    //     .then(response => response.json())
    //     .then(data => updateSearchResults(data));
    
    // For demo purposes, filter existing cards
    const newsCards = document.querySelectorAll('.news-card');
    let foundCount = 0;
    
    newsCards.forEach(card => {
        const title = card.querySelector('h3').textContent.toLowerCase();
        const description = card.querySelector('p').textContent.toLowerCase();
        const tags = Array.from(card.querySelectorAll('.text-xs')).map(tag => tag.textContent.toLowerCase());
        
        if (title.includes(term) || description.includes(term) || tags.some(tag => tag.includes(term))) {
            card.style.display = 'block';
            card.classList.add('animate-fade-in-up');
            foundCount++;
        } else {
            card.style.display = 'none';
            card.classList.remove('animate-fade-in-up');
        }
    });
    
    showNotification(`Found ${foundCount} news articles for "${term}"`, foundCount > 0 ? 'success' : 'warning');
}

function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    const colors = {
        success: { bg: 'bg-gradient-to-r from-green-500 to-emerald-600', icon: 'fa-check-circle' },
        error: { bg: 'bg-gradient-to-r from-red-500 to-rose-600', icon: 'fa-times-circle' },
        warning: { bg: 'bg-gradient-to-r from-yellow-500 to-orange-600', icon: 'fa-exclamation-triangle' },
        info: { bg: 'bg-gradient-to-r from-blue-500 to-indigo-600', icon: 'fa-info-circle' }
    };
    
    notification.className = `fixed top-24 right-4 ${colors[type].bg} text-white px-5 py-4 rounded-xl shadow-2xl animate-slide-in-right z-50 max-w-sm`;
    notification.innerHTML = `
        <div class="flex items-center gap-3">
            <i class="fas ${colors[type].icon} text-xl"></i>
            <div class="flex-1">${message}</div>
            <button onclick="this.parentElement.parentElement.remove()" class="text-white/80 hover:text-white ml-2">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Auto-remove after 5 seconds
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(20px)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 5000);
}

// Utility function: Debounce
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func.apply(this, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + F to focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        const searchInput = document.getElementById('news-search');
        if (searchInput) {
            searchInput.focus();
            searchInput.select();
        }
    }
    
    // Escape to clear search
    if (e.key === 'Escape') {
        const searchInput = document.getElementById('news-search');
        if (searchInput && document.activeElement === searchInput) {
            searchInput.value = '';
            searchNews('');
        }
    }
});
</script>
@endsection