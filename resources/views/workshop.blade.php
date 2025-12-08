@extends('layouts.app')

@section('title', 'Workshops - CAEDA')

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
        @keyframes pulse-soft {
            0%, 100% { opacity: 0.7; }
            50% { opacity: 1; }
        }
        @keyframes scale-in {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        @keyframes slide-in-left {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-in-right {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes rotate-3d {
            0% { transform: perspective(1000px) rotateY(0deg); }
            100% { transform: perspective(1000px) rotateY(360deg); }
        }
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-soft { animation: pulse-soft 2s ease-in-out infinite; }
        .animate-scale-in { animation: scale-in 0.5s ease-out forwards; }
        .animate-slide-in-left { animation: slide-in-left 0.8s ease-out forwards; }
        .animate-slide-in-right { animation: slide-in-right 0.8s ease-out forwards; }
        .animate-rotate-3d { animation: rotate-3d 15s linear infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        
        .font-cinzel { font-family: 'Cinzel', serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .text-gradient {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .workshop-card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .workshop-card-hover:hover {
            transform: translateY(-12px) scale(1.02);
        }
        .video-hover {
            transition: all 0.5s ease;
        }
        .video-hover:hover {
            transform: scale(1.05);
            filter: brightness(1.1);
        }
        .category-btn-active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            box-shadow: 0 15px 30px rgba(59, 130, 246, 0.3);
        }
        .level-badge {
            position: relative;
            overflow: hidden;
        }
        .level-badge::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                45deg,
                transparent,
                rgba(255, 255, 255, 0.3),
                transparent
            );
            transform: rotate(45deg);
            animation: shimmer 2s infinite;
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(100%) rotate(45deg); }
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20"></div>
    </div>
    
    {{-- Animated floating elements --}}
    <div class="absolute top-10 left-10 w-24 h-24 bg-blue-500/20 rounded-full animate-float"></div>
    <div class="absolute bottom-20 right-20 w-32 h-32 bg-purple-500/20 rounded-full animate-float" style="animation-delay: 1s"></div>
    <div class="absolute top-1/3 right-1/4 w-20 h-20 bg-pink-500/20 rounded-full animate-float" style="animation-delay: 2s"></div>
    <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-cyan-500/20 rounded-full animate-float" style="animation-delay: 1.5s"></div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-8 animate-slide-in-left">
                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                <span class="text-white font-semibold text-sm md:text-base">ENHANCE YOUR SKILLS • LEARN FROM EXPERTS</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-white font-cinzel">
                PSBU <span class="text-gradient">Workshops</span>
                <span class="block animate-gradient-x bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">
                    Master New Skills
                </span>
            </h1>
            
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse-soft"></div>
            
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed glass-effect p-6 rounded-2xl">
                Enhance your skills and knowledge through our comprehensive workshop series. 
                Learn from expert instructors and join our vibrant learning community.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-in-right">
                <button onclick="scrollToWorkshops()" class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    </svg>
                    <span>Browse Workshops</span>
                </button>
                <button onclick="scrollToUpcoming()" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>View Schedule</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= CATEGORY FILTERS ================= --}}
<section class="py-16 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            @php
                $categories = [
                    ['id' => 'all', 'name' => 'All Workshops', 'icon' => '🌟', 'color' => 'from-purple-500 to-pink-500'],
                    ['id' => 'technology', 'name' => 'Technology', 'icon' => '💻', 'color' => 'from-blue-500 to-cyan-500'],
                    ['id' => 'buddhist', 'name' => 'Buddhist Studies', 'icon' => '☸️', 'color' => 'from-orange-500 to-amber-500'],
                    ['id' => 'education', 'name' => 'Education', 'icon' => '📚', 'color' => 'from-green-500 to-emerald-500'],
                    ['id' => 'research', 'name' => 'Research', 'icon' => '🔬', 'color' => 'from-red-500 to-pink-500']
                ];
            @endphp
            
            @foreach($categories as $index => $category)
                <button
                    data-category="{{ $category['id'] }}"
                    class="category-filter group px-6 py-4 rounded-2xl font-semibold transition-all duration-500 transform hover:-translate-y-2 flex items-center animate-fade-in-up {{ $category['id'] == 'all' ? 'category-btn-active' : 'bg-white/80 backdrop-blur-sm text-gray-700 hover:bg-white hover:shadow-xl border border-gray-200/50' }}"
                    style="animation-delay: {{ $index * 100 }}ms"
                >
                    <span class="text-lg mr-2 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                        {{ $category['icon'] }}
                    </span>
                    {{ $category['name'] }}
                    @if($category['id'] == 'all')
                        <svg class="w-4 h-4 ml-2 animate-bounce-subtle" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    @endif
                </button>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= WORKSHOPS GRID ================= --}}
<section id="workshops-grid" class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $workshops = [
                    [
                        'id' => 1,
                        'title' => "Web Development Fundamentals",
                        'category' => "technology",
                        'instructor' => "Dr. Sarah Johnson",
                        'date' => "2024-03-15",
                        'duration' => "3 hours",
                        'level' => "Beginner",
                        'image' => "https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Learn the basics of web development including HTML, CSS, and JavaScript fundamentals.",
                        'attendees' => 45,
                        'rating' => 4.8,
                        'gradient' => "from-blue-500 to-cyan-500"
                    ],
                    [
                        'id' => 2,
                        'title' => "Buddhist Philosophy in Modern Life",
                        'category' => "buddhist",
                        'instructor' => "Ven. Dr. Somnang Pich",
                        'date' => "2024-03-20",
                        'duration' => "2 hours",
                        'level' => "All Levels",
                        'image' => "https://images.unsplash.com/photo-1547981609-4b6bf67b9d7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Explore how ancient Buddhist teachings can be applied to contemporary challenges.",
                        'attendees' => 32,
                        'rating' => 4.9,
                        'gradient' => "from-orange-500 to-amber-500"
                    ],
                    [
                        'id' => 3,
                        'title' => "Data Science for Educators",
                        'category' => "education",
                        'instructor' => "Prof. Michael Chen",
                        'date' => "2024-03-25",
                        'duration' => "4 hours",
                        'level' => "Intermediate",
                        'image' => "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Learn how to use data analysis techniques to improve educational outcomes.",
                        'attendees' => 28,
                        'rating' => 4.7,
                        'gradient' => "from-green-500 to-emerald-500"
                    ],
                    [
                        'id' => 4,
                        'title' => "Mobile App Development",
                        'category' => "technology",
                        'instructor' => "Ms. Emma Rodriguez",
                        'date' => "2024-04-01",
                        'duration' => "5 hours",
                        'level' => "Intermediate",
                        'image' => "https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Build cross-platform mobile applications using modern frameworks.",
                        'attendees' => 38,
                        'rating' => 4.6,
                        'gradient' => "from-purple-500 to-indigo-500"
                    ],
                    [
                        'id' => 5,
                        'title' => "Mindfulness and Meditation",
                        'category' => "buddhist",
                        'instructor' => "Dr. Bona Than",
                        'date' => "2024-04-05",
                        'duration' => "2.5 hours",
                        'level' => "Beginner",
                        'image' => "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Practical techniques for developing mindfulness and meditation practice.",
                        'attendees' => 51,
                        'rating' => 4.9,
                        'gradient' => "from-yellow-500 to-orange-500"
                    ],
                    [
                        'id' => 6,
                        'title' => "Academic Research Methods",
                        'category' => "research",
                        'instructor' => "Dr. Sokunthea Rin",
                        'date' => "2024-04-10",
                        'duration' => "6 hours",
                        'level' => "Advanced",
                        'image' => "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Comprehensive guide to academic research methodologies and publication.",
                        'attendees' => 22,
                        'rating' => 4.8,
                        'gradient' => "from-red-500 to-pink-500"
                    ]
                ];
            @endphp
            
            @foreach($workshops as $index => $workshop)
                <div 
                    data-category="{{ $workshop['category'] }}"
                    class="workshop-card glass-effect rounded-3xl overflow-hidden workshop-card-hover animate-fade-in-up"
                    style="animation-delay: {{ $index * 100 }}ms"
                >
                    {{-- Video/Image Thumbnail --}}
                    <div class="relative h-48 bg-gray-900 overflow-hidden">
                        @if(isset($workshop['video']) && $workshop['video'])
                            <iframe
                                src="{{ $workshop['video'] }}"
                                class="w-full h-full video-hover"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                title="{{ $workshop['title'] }}"
                            ></iframe>
                        @else
                            <img
                                src="{{ $workshop['image'] }}"
                                alt="{{ $workshop['title'] }}"
                                class="w-full h-full object-cover video-hover"
                                onerror="this.src='https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'"
                            />
                        @endif
                        
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        
                        {{-- Level Badge --}}
                        <div class="absolute top-4 right-4 level-badge bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-bold px-3 py-2 rounded-full shadow-lg transform transition-all duration-300">
                            {{ $workshop['level'] }}
                        </div>

                        {{-- Hover Overlay --}}
                        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition-all duration-300 flex items-center justify-center">
                            <div class="opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                <div class="bg-white/90 backdrop-blur-sm rounded-full p-4 shadow-lg">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Workshop Content --}}
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-sm font-bold {{ 
                                $workshop['category'] == 'technology' ? 'text-blue-600 bg-blue-50' : 
                                ($workshop['category'] == 'buddhist' ? 'text-orange-600 bg-orange-50' : 
                                ($workshop['category'] == 'education' ? 'text-green-600 bg-green-50' : 
                                ($workshop['category'] == 'research' ? 'text-red-600 bg-red-50' : 'text-purple-600 bg-purple-50')))
                            }} px-3 py-1.5 rounded-full group-hover:scale-105 transition-transform duration-300">
                                {{ ucfirst($workshop['category']) }}
                            </span>
                            <span class="text-sm text-gray-500 font-medium group-hover:text-gray-700 transition-colors duration-300">
                                {{ $workshop['duration'] }}
                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-gray-800 transition-colors duration-300 line-clamp-2">
                            {{ $workshop['title'] }}
                        </h3>

                        <p class="text-gray-600 mb-4 text-sm leading-relaxed group-hover:text-gray-700 transition-colors duration-300 line-clamp-3">
                            {{ $workshop['description'] }}
                        </p>

                        <div class="flex items-center justify-between mb-4">
                            <div class="transform transition-all duration-300 group-hover:-translate-y-1">
                                <p class="text-sm text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Instructor</p>
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-gray-800 transition-colors duration-300">{{ $workshop['instructor'] }}</p>
                            </div>
                            <div class="text-right transform transition-all duration-300 group-hover:-translate-y-1">
                                <p class="text-sm text-gray-500 group-hover:text-gray-600 transition-colors duration-300">Date</p>
                                <p class="text-sm font-semibold text-gray-900 group-hover:text-gray-800 transition-colors duration-300">
                                    {{ date('M d, Y', strtotime($workshop['date'])) }}
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center transform transition-all duration-300 group-hover:scale-110">
                                <div class="text-yellow-400 mr-1 animate-pulse-soft">★</div>
                                <span class="text-sm font-bold text-gray-900">{{ $workshop['rating'] }}</span>
                                <span class="text-sm text-gray-500 ml-1">({{ $workshop['attendees'] }})</span>
                            </div>
                            <button 
                                onclick="watchWorkshop({{ $workshop['id'] }})" 
                                class="group/btn bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-2 px-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg flex items-center"
                            >
                                <span>Watch Now</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        {{-- No Results Message --}}
        <div id="no-workshops" class="hidden text-center py-12">
            <div class="inline-block bg-gradient-to-r from-gray-100 to-gray-200 rounded-2xl p-8 max-w-md">
                <div class="text-4xl mb-4">🔍</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Workshops Found</h3>
                <p class="text-gray-600 mb-4">Try selecting a different category or check back later for new workshops.</p>
                <button onclick="resetFilters()" class="text-blue-600 hover:text-blue-800 font-medium">
                    Reset Filters
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= UPCOMING WORKSHOPS ================= --}}
<section id="upcoming-workshops" class="py-20 bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="glass-effect rounded-3xl p-8 md:p-10 border border-blue-200/50 shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-indigo-900 bg-clip-text text-transparent font-cinzel">
                    Upcoming Workshops
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full animate-pulse-soft"></div>
                <p class="text-gray-600 mt-6 text-lg">
                    Don't miss these exciting workshops coming soon
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @php
                    $upcomingWorkshops = [
                        [
                            'id' => 7,
                            'title' => "AI in Education Workshop",
                            'date' => "2024-04-20",
                            'instructor' => "Dr. Karl Meneghella",
                            'image' => "https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'gradient' => "from-blue-500 to-purple-500"
                        ],
                        [
                            'id' => 8,
                            'title' => "Buddhist Art and Culture",
                            'date' => "2024-04-25",
                            'instructor' => "Ven. Samnang Phally",
                            'image' => "https://images.unsplash.com/photo-1547036967-23d11aacaee0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'gradient' => "from-orange-500 to-red-500"
                        ],
                        [
                            'id' => 9,
                            'title' => "Digital Literacy for Teachers",
                            'date' => "2024-05-01",
                            'instructor' => "Ms. Somaly Rin",
                            'image' => "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'gradient' => "from-green-500 to-teal-500"
                        ]
                    ];
                @endphp
                
                @foreach($upcomingWorkshops as $index => $workshop)
                    <div 
                        class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-gray-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-3 animate-fade-in-up"
                        style="animation-delay: {{ $index * 150 }}ms"
                    >
                        <div class="flex items-start space-x-4">
                            <div class="relative">
                                <img
                                    src="{{ $workshop['image'] }}"
                                    alt="{{ $workshop['title'] }}"
                                    class="w-16 h-16 rounded-2xl object-cover border-2 border-white shadow-lg transform transition-all duration-500 group-hover:scale-110"
                                    onerror="this.src='https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'"
                                />
                                <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-gradient-to-r from-green-400 to-green-500 rounded-full border-2 border-white shadow-lg animate-bounce-subtle"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight group-hover:text-gray-800 transition-colors duration-300">
                                    {{ $workshop['title'] }}
                                </h3>
                                <p class="text-gray-600 text-sm mb-3 group-hover:text-gray-700 transition-colors duration-300">by {{ $workshop['instructor'] }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 text-sm font-bold group-hover:text-blue-700 transition-colors duration-300">
                                        {{ date('M d, Y', strtotime($workshop['date'])) }}
                                    </span>
                                    <button 
                                        onclick="registerWorkshop({{ $workshop['id'] }})" 
                                        class="group/reg text-blue-600 hover:text-blue-800 font-bold text-sm flex items-center transition-all duration-300 transform hover:-translate-y-1"
                                    >
                                        Register
                                        <svg class="w-4 h-4 ml-1 transform group-hover/reg:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ================= WORKSHOP BENEFITS ================= --}}
<section class="py-20 px-4 md:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                Why Join Our <span class="text-gradient">Workshops</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Discover the unique advantages of learning through our interactive workshop experiences
            </p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @php
                $benefits = [
                    [
                        'icon' => '🎯',
                        'title' => 'Expert Instructors',
                        'description' => 'Learn from industry professionals and academic experts with years of experience',
                        'gradient' => 'from-blue-500 to-cyan-500'
                    ],
                    [
                        'icon' => '📚',
                        'title' => 'Practical Skills',
                        'description' => 'Hands-on learning with real-world applications and projects',
                        'gradient' => 'from-green-500 to-emerald-500'
                    ],
                    [
                        'icon' => '🤝',
                        'title' => 'Networking',
                        'description' => 'Connect with like-minded learners and professionals in your field',
                        'gradient' => 'from-purple-500 to-pink-500'
                    ],
                    [
                        'icon' => '📜',
                        'title' => 'Certification',
                        'description' => 'Receive certificates of completion for your professional portfolio',
                        'gradient' => 'from-orange-500 to-amber-500'
                    ]
                ];
            @endphp
            
            @foreach($benefits as $index => $benefit)
                <div 
                    class="group bg-white/90 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 text-center hover:shadow-xl transition-all duration-500 hover:-translate-y-3 animate-fade-in-up"
                    style="animation-delay: {{ $index * 100 }}ms"
                >
                    <div class="w-16 h-16 bg-gradient-to-r {{ $benefit['gradient'] }} rounded-2xl flex items-center justify-center text-white text-2xl mx-auto mb-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                        {{ $benefit['icon'] }}
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300">
                        {{ $benefit['title'] }}
                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                        {{ $benefit['description'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= TESTIMONIALS ================= --}}
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                What Participants <span class="text-gradient">Say</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Hear from professionals who have transformed their skills through our workshops
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $testimonials = [
                    [
                        'name' => 'Sokha Rin',
                        'role' => 'Software Developer',
                        'company' => 'Tech Solutions Inc.',
                        'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The web development workshop completely transformed my career. I went from beginner to landing my dream job in just 6 months!',
                        'workshop' => 'Web Development Fundamentals',
                        'rating' => 5
                    ],
                    [
                        'name' => 'Bopha Chen',
                        'role' => 'Teacher',
                        'company' => 'International School',
                        'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The Data Science for Educators workshop gave me practical skills I use every day in my classroom. Highly recommended!',
                        'workshop' => 'Data Science for Educators',
                        'rating' => 5
                    ],
                    [
                        'name' => 'Dara Wilson',
                        'role' => 'Researcher',
                        'company' => 'University of Phnom Penh',
                        'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The research methods workshop helped me publish my first academic paper. The instructors are true experts in their field.',
                        'workshop' => 'Academic Research Methods',
                        'rating' => 4
                    ]
                ];
            @endphp
            
            @foreach($testimonials as $index => $testimonial)
                <div class="group glass-effect rounded-3xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-fade-in-up" style="animation-delay: {{ $index * 150 }}ms">
                    <div class="flex items-center mb-6">
                        <img
                            src="{{ $testimonial['avatar'] }}"
                            alt="{{ $testimonial['name'] }}"
                            class="w-14 h-14 rounded-full border-4 border-white shadow-lg mr-4 transform transition-all duration-500 group-hover:scale-110"
                        />
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimonial['name'] }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial['role'] }} at {{ $testimonial['company'] }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <span class="text-xl {{ $i < $testimonial['rating'] ? 'text-yellow-400' : 'text-gray-300' }}">
                                ★
                            </span>
                        @endfor
                    </div>
                    
                    <p class="text-gray-600 italic mb-4 leading-relaxed">"{{ $testimonial['quote'] }}"</p>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <p class="text-sm text-blue-600 font-semibold">Workshop: {{ $testimonial['workshop'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= FINAL CTA ================= --}}
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2 animate-rotate-3d"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full translate-x-1/3 translate-y-1/3"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
            Ready to <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">Enhance</span> Your Skills?
        </h2>
        <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto text-lg">
            Join our workshop community and take the next step in your learning journey. 
            Whether you're a beginner or advanced learner, we have something for everyone.
        </p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="text-xl font-bold mb-3">Expert Guidance</h3>
                <p class="text-blue-200">Learn from industry-leading instructors</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🚀</div>
                <h3 class="text-xl font-bold mb-3">Career Growth</h3>
                <p class="text-blue-200">Practical skills for today's job market</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🤝</div>
                <h3 class="text-xl font-bold mb-3">Networking</h3>
                <p class="text-blue-200">Connect with professionals in your field</p>
            </div>
        </div>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button onclick="scrollToWorkshops()" class="group bg-white text-blue-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg">
                <span class="flex items-center">
                    Browse All Workshops
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </button>
            <button onclick="contactCoordinator()" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                <span class="flex items-center">
                    Contact Coordinator
                    <svg class="w-5 h-5 ml-2 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>

{{-- Video Modal --}}
<div id="video-modal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="relative w-full max-w-4xl">
        <button 
            onclick="closeVideoModal()"
            class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors duration-300"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="bg-black rounded-2xl overflow-hidden">
            <div class="aspect-w-16 aspect-h-9">
                <iframe
                    id="workshop-video"
                    class="w-full h-full"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
        
        <div class="mt-4 text-center">
            <h3 id="video-title" class="text-xl font-bold text-white mb-2"></h3>
            <p id="video-instructor" class="text-gray-300"></p>
        </div>
    </div>
</div>

{{-- Registration Modal --}}
<div id="registration-modal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 animate-scale-in">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Registration Successful!</h3>
            <p class="text-gray-600">You've been registered for the workshop. We'll send you the details via email.</p>
        </div>
        
        <div class="space-y-4 mb-6">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                <span class="text-gray-600">Workshop:</span>
                <span id="registered-workshop" class="font-semibold text-gray-900"></span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                <span class="text-gray-600">Date:</span>
                <span id="registered-date" class="font-semibold text-gray-900"></span>
            </div>
        </div>
        
        <button 
            onclick="closeRegistrationModal()"
            class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-3 rounded-xl transition-all duration-300"
        >
            Continue Browsing
        </button>
    </div>
</div>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Workshop filtering
    const categoryFilters = document.querySelectorAll('.category-filter');
    const workshopCards = document.querySelectorAll('.workshop-card');
    const noWorkshopsMessage = document.getElementById('no-workshops');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active filter
            categoryFilters.forEach(f => {
                f.classList.remove('category-btn-active', 'bg-gradient-to-r', 'from-purple-500', 'to-pink-500', 'text-white');
                f.classList.add('bg-white/80', 'backdrop-blur-sm', 'text-gray-700', 'hover:bg-white', 'hover:shadow-xl', 'border', 'border-gray-200/50');
            });
            
            this.classList.remove('bg-white/80', 'backdrop-blur-sm', 'text-gray-700', 'hover:bg-white', 'hover:shadow-xl', 'border', 'border-gray-200/50');
            this.classList.add('category-btn-active');
            
            // Add checkmark icon
            categoryFilters.forEach(f => {
                const svg = f.querySelector('svg');
                if (svg) svg.remove();
            });
            
            const checkIcon = document.createElement('svg');
            checkIcon.className = 'w-4 h-4 ml-2 animate-bounce-subtle';
            checkIcon.setAttribute('fill', 'none');
            checkIcon.setAttribute('stroke', 'currentColor');
            checkIcon.setAttribute('viewBox', '0 0 24 24');
            checkIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />';
            this.appendChild(checkIcon);
            
            // Filter workshops
            let visibleCount = 0;
            workshopCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.classList.add('animate-scale-in');
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.classList.remove('animate-scale-in');
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noWorkshopsMessage.classList.remove('hidden');
            } else {
                noWorkshopsMessage.classList.add('hidden');
            }
        });
    });
    
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
    
    // Workshop card hover effects
    workshopCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const levelBadge = this.querySelector('.level-badge');
            if (levelBadge) {
                levelBadge.classList.add('scale-110');
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const levelBadge = this.querySelector('.level-badge');
            if (levelBadge) {
                levelBadge.classList.remove('scale-110');
            }
        });
    });
});

// Global functions
function scrollToWorkshops() {
    document.getElementById('workshops-grid').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

function scrollToUpcoming() {
    document.getElementById('upcoming-workshops').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

function watchWorkshop(workshopId) {
    // Get workshop data (in real app, this would be from an API)
    const workshops = @json($workshops);
    const workshop = workshops.find(w => w.id === workshopId);
    
    if (workshop && workshop.video) {
        const modal = document.getElementById('video-modal');
        const videoFrame = document.getElementById('workshop-video');
        const videoTitle = document.getElementById('video-title');
        const videoInstructor = document.getElementById('video-instructor');
        
        videoFrame.src = workshop.video;
        videoTitle.textContent = workshop.title;
        videoInstructor.textContent = `by ${workshop.instructor}`;
        
        modal.classList.remove('hidden');
    } else {
        alert('Video not available for this workshop.');
    }
}

function registerWorkshop(workshopId) {
    // Get workshop data (in real app, this would be from an API)
    const upcomingWorkshops = @json($upcomingWorkshops);
    const workshop = upcomingWorkshops.find(w => w.id === workshopId);
    
    if (workshop) {
        const modal = document.getElementById('registration-modal');
        const workshopTitle = document.getElementById('registered-workshop');
        const workshopDate = document.getElementById('registered-date');
        
        workshopTitle.textContent = workshop.title;
        workshopDate.textContent = new Date(workshop.date).toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        modal.classList.remove('hidden');
        
        // In a real application, you would:
        // 1. Send registration data to Laravel backend
        // 2. Process payment if needed
        // 3. Send confirmation email
        // 
        // Example:
        // fetch('/api/workshops/register', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify({ workshop_id: workshopId })
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         showRegistrationModal(workshop);
        //     } else {
        //         alert(data.message);
        //     }
        // });
    }
}

function contactCoordinator() {
    alert('Contact form would open. In a real application, this would redirect to the contact page or open a modal.');
}

function closeVideoModal() {
    const modal = document.getElementById('video-modal');
    const videoFrame = document.getElementById('workshop-video');
    
    // Stop video playback
    videoFrame.src = videoFrame.src;
    
    modal.classList.add('hidden');
}

function closeRegistrationModal() {
    document.getElementById('registration-modal').classList.add('hidden');
}

function resetFilters() {
    document.querySelector('.category-filter[data-category="all"]').click();
    document.getElementById('no-workshops').classList.add('hidden');
}
</script>
@endsection