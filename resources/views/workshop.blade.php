@extends('layouts.app')

@section('title', 'PSBU-Vison Workshops - CAEDA')

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
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(1deg); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes spin-slow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes slide-in-left {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-in-right {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes scale-in {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse-slow 6s ease-in-out infinite; }
        .animate-shimmer { animation: shimmer 2s infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 15s linear infinite; }
        .animate-slide-in-left { animation: slide-in-left 0.8s ease-out forwards; }
        .animate-slide-in-right { animation: slide-in-right 0.8s ease-out forwards; }
        .animate-scale-in { animation: scale-in 0.5s ease-out forwards; }
        
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
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .workshop-card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .video-container {
            position: relative;
            overflow: hidden;
        }
        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, 0.7));
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .video-container:hover::before {
            opacity: 1;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            transition: all 0.3s ease;
            z-index: 2;
        }
        .video-container:hover .play-button {
            transform: translate(-50%, -50%) scale(1.1);
        }
        .category-btn-active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        .instructor-image {
            position: relative;
            overflow: hidden;
        }
        .instructor-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.3));
            z-index: 1;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
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
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            animation: shimmer 2s infinite;
        }
    </style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    {{-- Animated Background Elements --}}
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-200/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-purple-200/20 rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-200/10 rounded-full blur-3xl animate-pulse-slow delay-500"></div>
    </div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full shadow-lg border border-white/50 mb-6 animate-slide-in-left">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-white font-semibold text-sm md:text-base uppercase tracking-wider">INTERACTIVE LEARNING • PSBU-VISON</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 font-cinzel">
                <span class="block animate-gradient-x bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent">
                    PSBU-Workshop
                </span>
                <span class="text-4xl md:text-5xl block mt-4">Workshop Series</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed glass-effect p-6 rounded-2xl">
                Enhance your skills and knowledge through our comprehensive workshop series. 
                Learn from expert instructors and join our vibrant learning community.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-in-right">
                <button onclick="scrollToWorkshops()" class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    </svg>
                    <span>Start Learning</span>
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
                    ['id' => 'all', 'name' => 'All Workshops', 'icon' => '🎯'],
                    ['id' => 'technology', 'name' => 'Technology', 'icon' => '💻'],
                    ['id' => 'buddhist', 'name' => 'Buddhist Studies', 'icon' => '🧘'],
                    ['id' => 'education', 'name' => 'Education', 'icon' => '📚'],
                    ['id' => 'research', 'name' => 'Research', 'icon' => '🔬']
                ];
            @endphp
            
            @foreach($categories as $index => $category)
                <button
                    data-category="{{ $category['id'] }}"
                    class="category-filter group px-6 py-4 rounded-2xl font-semibold transition-all duration-500 transform hover:scale-105 flex items-center animate-fade-in-up {{ $category['id'] == 'all' ? 'category-btn-active' : 'bg-white/80 backdrop-blur-sm text-gray-700 hover:bg-white hover:shadow-lg border border-gray-200/50' }}"
                    style="animation-delay: {{ $index * 100 }}ms"
                >
                    <span class="text-xl mr-3 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                        {{ $category['icon'] }}
                    </span>
                    {{ $category['name'] }}
                    @if($category['id'] == 'all')
                        <div class="ml-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
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

            @forelse($workshops as $index => $workshop)
                <div
                    data-category="{{ $workshop->category }}"
                    class="workshop-card glass-effect rounded-3xl overflow-hidden group animate-fade-in-up"
                    style="animation-delay: {{ $index * 150 }}ms"
                >

                    {{-- ================= Video / Image ================= --}}
                    <div class="relative h-48 bg-gray-900 overflow-hidden">

                        {{-- Video --}}
                        <div id="video-{{ $workshop->id }}" class="hidden absolute inset-0">
                            <iframe
                                data-src="{{ $workshop->video_url }}?autoplay=1"
                                class="w-full h-full"
                                frameborder="0"
                                allow="autoplay; encrypted-media"
                                allowfullscreen
                            ></iframe>
                        </div>

                        {{-- Thumbnail --}}
                        <img
                            id="thumb-{{ $workshop->id }}"
                            src="{{ asset('storage/'.$workshop->image) }}"
                            alt="{{ $workshop->title }}"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        />

                        {{-- Play Button --}}
                        <button
                            onclick="playWorkshop({{ $workshop->id }})"
                            class="absolute inset-0 flex items-center justify-center z-10"
                        >
                            <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center shadow-2xl">
                                <svg class="w-8 h-8 text-blue-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"/>
                                </svg>
                            </div>
                        </button>

                        {{-- Badges --}}
                        <div class="absolute top-4 right-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-semibold px-3 py-2 rounded-xl">
                            {{ $workshop->level }}
                        </div>

                        <div class="absolute top-4 left-4 bg-white/90 text-blue-600 text-xs font-semibold px-3 py-2 rounded-xl">
                            {{ $workshop->duration }}
                        </div>
                    </div>

                    {{-- ================= Content ================= --}}
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                {{ ucfirst($workshop->category) }}
                            </span>

                            <span class="text-sm text-gray-600">
                                ⭐ {{ $workshop->rating }} ({{ $workshop->attendees }})
                            </span>
                        </div>

                        <h3 class="text-xl font-bold mb-3 line-clamp-2">
                            {{ $workshop->title }}
                        </h3>

                        <p class="text-gray-600 mb-4 text-sm line-clamp-2">
                            {{ $workshop->description }}
                        </p>

                        {{-- Instructor --}}
                        <div class="flex items-center mb-4 p-3 bg-gray-50 rounded-xl">
                            <img
                                src="{{ asset('storage/'.$workshop->instructor_image) }}"
                                class="w-10 h-10 rounded-full object-cover border"
                            />
                            <div class="ml-3">
                                <p class="text-sm font-semibold">{{ $workshop->instructor }}</p>
                                <p class="text-xs text-gray-500">Expert Instructor</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center text-sm text-gray-500">
                            {{ \Carbon\Carbon::parse($workshop->date)->format('M d, Y') }}

                            <button onclick="playWorkshop({{ $workshop->id }})"
                                class="text-blue-600 hover:text-blue-800 font-semibold">
                                Watch Now
                            </button>
                        </div>
                    </div>
                </div>

            @empty
                <div class="col-span-3 text-center text-gray-500 py-20">
                    No workshops available.
                </div>
            @endforelse

        </div>
    </div>
</section>

{{-- ================= UPCOMING WORKSHOPS ================= --}}
<section id="upcoming-workshops" class="py-20 bg-gradient-to-r from-blue-50/80 to-purple-50/80 backdrop-blur-sm px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="glass-effect rounded-3xl p-8 md:p-12 border border-blue-200/50 shadow-lg">
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Upcoming <span class="text-blue-600">PSBU-Workshop</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Don't miss these exciting workshops coming soon. Register early to secure your spot!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($upcomingWorkshops as $index => $workshop)
                    <div 
                        class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-white/50 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up"
                        style="animation-delay: {{ $index * 200 }}ms"
                    >
                        <div class="flex items-start space-x-4">
                            <div class="relative flex-shrink-0">
                                <img
                                    src="{{ $workshop->image }}"
                                    alt="{{ $workshop->title }}"
                                    class="w-20 h-20 rounded-2xl object-cover shadow-lg transform group-hover:scale-105 transition-transform duration-300"
                                />
                                <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-gradient-to-r from-green-400 to-green-500 rounded-full border-2 border-white shadow-lg animate-pulse"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $workshop->title }}
                                </h3>
                                <div class="flex items-center mb-3">
                                    <div class="relative w-6 h-6 rounded-full overflow-hidden border border-white shadow-sm instructor-image mr-2">
                                        <img
                                            src="{{ $workshop->instructor_image }}"
                                            alt="{{ $workshop->instructor }}"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <p class="text-gray-600 text-sm">by {{ $workshop->instructor }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 text-sm font-semibold bg-blue-50 px-3 py-1 rounded-full">
                                        {{ date('M d, Y', strtotime($workshop->date)) }}
                                    </span>
                                    <button 
                                        onclick="registerWorkshop({{ $workshop->id }})"
                                        class="text-blue-600 hover:text-blue-700 font-semibold text-sm transform group-hover:translate-x-1 transition-transform duration-300"
                                    >
                                        Register →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if($upcomingWorkshops->isEmpty())
                    <p class="text-center text-gray-500 col-span-full">No upcoming workshops.</p>
                @endif
            </div>
        </div>
    </div>
</section>

{{-- ================= WORKSHOP BENEFITS ================= --}}
<section class="py-20 px-4 md:px-8 bg-white">
    <div class="max-w-7xl mx-auto">

        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                Why Choose <span class="text-gradient">PSBU-Workshop</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Discover the unique advantages of learning through our interactive workshop experiences
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($benefits as $index => $benefit)
                <div
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center
                           border border-white/50 hover:shadow-xl transition-all duration-500
                           transform hover:-translate-y-2 group animate-fade-in-up"
                    style="animation-delay: {{ $index * 150 }}ms"
                >
                    {{-- Icon --}}
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600
                               rounded-2xl flex items-center justify-center
                               text-white text-2xl mx-auto mb-4
                               transform group-hover:scale-110 group-hover:rotate-12
                               transition-transform duration-300 shadow-lg">
                        {{ $benefit->icon }}
                    </div>

                    {{-- Title --}}
                    <h3
                        class="text-lg font-bold text-gray-900 mb-3
                               group-hover:text-blue-600 transition-colors duration-300">
                        {{ $benefit->title }}
                    </h3>

                    {{-- Description --}}
                    <p class="text-gray-600 text-sm leading-relaxed">
                        {{ $benefit->description }}
                    </p>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 py-10">
                    No benefits available.
                </div>
            @endforelse
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
                        <div class="relative w-14 h-14 rounded-full overflow-hidden border-4 border-white shadow-lg mr-4 transform transition-all duration-500 group-hover:scale-110 instructor-image">
                            <img
                                src="{{ $testimonial['avatar'] }}"
                                alt="{{ $testimonial['name'] }}"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ $testimonial['name'] }}</h4>
                            <p class="text-sm text-gray-600">{{ $testimonial['role'] }} at {{ $testimonial['company'] }}</p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        @for($i = 0; $i < 5; $i++)
                            <span class="text-xl transform transition-all duration-300 {{ $i < $testimonial['rating'] ? 'text-yellow-400 group-hover:scale-125' : 'text-gray-300' }}">
                                ★
                            </span>
                        @endfor
                    </div>
                    
                    <p class="text-gray-600 italic mb-4 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">"{{ $testimonial['quote'] }}"</p>
                    
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
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-float"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-float" style="animation-delay: 1s"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 animate-fade-in-up font-cinzel">
            Ready to Enhance Your Skills?
        </h2>
        <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 200ms">
            Join our workshop community and take the next step in your learning journey. 
            Whether you're a beginner or advanced learner, we have something for everyone.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up" style="animation-delay: 400ms">
            <button onclick="scrollToWorkshops()" class="group bg-white text-blue-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-2xl transition-all duration-500 transform hover:scale-105 hover:shadow-2xl shadow-lg">
                <span class="flex items-center gap-2">
                    Browse All Workshops
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </button>
            <button onclick="contactCoordinator()" class="group border-2 border-white text-white hover:bg-white/10 font-bold py-4 px-8 rounded-2xl transition-all duration-500 transform hover:scale-105">
                <span class="flex items-center gap-2">
                    Contact Coordinator
                    <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>

{{-- Video Modal --}}
<div id="video-modal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="relative w-full max-w-4xl animate-scale-in">
        <button 
            onclick="closeVideoModal()"
            class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors duration-300 z-10"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="bg-black rounded-2xl overflow-hidden shadow-2xl">
            <div class="aspect-w-16 aspect-h-9">
                <iframe
                    id="workshop-video-frame"
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
document.addEventListener('DOMContentLoaded', () => {

    const categoryFilters = document.querySelectorAll('.category-filter');
    const workshopCards = document.querySelectorAll('.workshop-card');
    const noWorkshopsMessage = document.getElementById('no-workshops');

    /* ================= FILTER WORKSHOPS ================= */
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', () => {

            const category = filter.dataset.category;
            let visibleCount = 0;

            // Reset buttons
            categoryFilters.forEach(btn => {
                btn.classList.remove(
                    'category-btn-active',
                    'bg-gradient-to-r',
                    'from-blue-600',
                    'to-purple-600',
                    'text-white'
                );
                btn.querySelector('.w-2.h-2')?.remove();
            });

            // Activate button
            filter.classList.add(
                'category-btn-active',
                'bg-gradient-to-r',
                'from-blue-600',
                'to-purple-600',
                'text-white'
            );

            const indicator = document.createElement('span');
            indicator.className = 'ml-2 w-2 h-2 bg-white rounded-full animate-pulse';
            filter.appendChild(indicator);

            // Filter cards
            workshopCards.forEach(card => {
                const show = category === 'all' || card.dataset.category === category;
                card.style.display = show ? 'block' : 'none';
                if (show) visibleCount++;
            });

            // No results
            if (noWorkshopsMessage) {
                noWorkshopsMessage.classList.toggle('hidden', visibleCount > 0);
            }

            scrollToWorkshops();
        });
    });

    /* ================= ANIMATIONS ================= */
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

    /* ================= HOVER EFFECT ================= */
    workshopCards.forEach(card => {
        const badge = card.querySelector('.level-badge');
        if (!badge) return;

        card.addEventListener('mouseenter', () => badge.classList.add('scale-110'));
        card.addEventListener('mouseleave', () => badge.classList.remove('scale-110'));
    });
});

/* ================= VIDEO PLAY ================= */
function playWorkshop(id) {

    document.querySelectorAll('[id^="video-"]').forEach(video => {
        video.classList.add('hidden');
        video.querySelector('iframe')?.setAttribute('src', '');
    });

    document.querySelectorAll('[id^="thumb-"]').forEach(img => img.classList.remove('hidden'));

    const video = document.getElementById(`video-${id}`);
    const thumb = document.getElementById(`thumb-${id}`);
    const iframe = video?.querySelector('iframe');

    if (!video || !thumb || !iframe) return;

    thumb.classList.add('hidden');
    video.classList.remove('hidden');

    if (!iframe.src) iframe.src = iframe.dataset.src;
}

/* ================= SCROLL ================= */
function scrollToWorkshops() {
    document.getElementById('workshops-grid')?.scrollIntoView({ behavior: 'smooth' });
}

function scrollToUpcoming() {
    document.getElementById('upcoming-workshops')?.scrollIntoView({ behavior: 'smooth' });
}

/* ================= MODALS ================= */
function playWorkshopVideo(id) {
    const workshop = window.APP_DATA.workshops.find(w => w.id === id);
    if (!workshop || !workshop.video) return;

    document.getElementById('workshop-video-frame').src = workshop.video;
    document.getElementById('video-title').textContent = workshop.title;
    document.getElementById('video-instructor').textContent = `Instructor: ${workshop.instructor}`;
    document.getElementById('video-modal').classList.remove('hidden');
}

function registerWorkshop(id) {
    const workshop = window.APP_DATA.upcomingWorkshops.find(w => w.id === id);
    if (!workshop) return;

    document.getElementById('registered-workshop').textContent = workshop.title;
    document.getElementById('registered-date').textContent =
        new Date(workshop.date).toLocaleDateString();

    document.getElementById('registration-modal').classList.remove('hidden');
}

function closeVideoModal() {
    document.getElementById('workshop-video-frame').src = '';
    document.getElementById('video-modal').classList.add('hidden');
}

function closeRegistrationModal() {
    document.getElementById('registration-modal').classList.add('hidden');
}

function resetFilters() {
    document.querySelector('[data-category="all"]')?.click();
}
</script>

@endsection