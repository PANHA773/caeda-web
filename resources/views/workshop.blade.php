@extends('layouts.app')

@section('title', 'Workshops - CAEDA')

@section('extra-css')
<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Animations */
    @keyframes fade-in-up { from {opacity:0; transform:translateY(30px);} to {opacity:1; transform:translateY(0);} }
    @keyframes gradient-x {0%,100%{background-position:0% 50%;}50%{background-position:100% 50%;}}
    @keyframes float {0%,100%{transform:translateY(0);}50%{transform:translateY(-15px);}}
    @keyframes pulse-soft {0%,100%{opacity:0.7;}50%{opacity:1;}}
    @keyframes scale-in {from{transform:scale(0.9); opacity:0;} to{transform:scale(1);opacity:1;}}
    @keyframes slide-in-left {from{transform:translateX(-50px);opacity:0;} to{transform:translateX(0);opacity:1;}}
    @keyframes slide-in-right {from{transform:translateX(50px);opacity:0;} to{transform:translateX(0);opacity:1;}}
    @keyframes rotate-3d {0%{transform:perspective(1000px) rotateY(0deg);}100%{transform:perspective(1000px) rotateY(360deg);}}
    @keyframes bounce-subtle {0%,100%{transform:translateY(0);}50%{transform:translateY(-8px);}}
    @keyframes shimmer {0% {transform:translateX(-100%) rotate(45deg);}100%{transform:translateX(100%) rotate(45deg);}}
    @keyframes glow {0%,100%{box-shadow:0 0 20px rgba(59,130,246,0.5);}50%{box-shadow:0 0 40px rgba(59,130,246,0.8);}}

    .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
    .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size:200% 200%; }
    .animate-float { animation: float 3s ease-in-out infinite; }
    .animate-pulse-soft { animation: pulse-soft 2s ease-in-out infinite; }
    .animate-scale-in { animation: scale-in 0.5s ease-out forwards; }
    .animate-slide-in-left { animation: slide-in-left 0.8s ease-out forwards; }
    .animate-slide-in-right { animation: slide-in-right 0.8s ease-out forwards; }
    .animate-rotate-3d { animation: rotate-3d 15s linear infinite; }
    .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
    .animate-glow { animation: glow 3s ease-in-out infinite; }

    .font-cinzel { font-family: 'Cinzel', serif; }
    .font-inter { font-family: 'Inter', sans-serif; }
    .glass-effect { 
        background: rgba(255,255,255,0.9); 
        backdrop-filter: blur(20px) saturate(180%);
        border: 1px solid rgba(255,255,255,0.3);
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.1);
    }
    .text-gradient {
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .workshop-card-hover {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid transparent;
    }
    .workshop-card-hover:hover {
        transform: translateY(-12px) scale(1.02);
        border-color: rgba(59, 130, 246, 0.3);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1), 0 0 0 1px rgba(59,130,246,0.1);
    }
    .video-hover { transition: all 0.5s ease; }
    .video-hover:hover { transform: scale(1.05); filter: brightness(1.1); }
    .category-btn-active {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: white;
        box-shadow: 0 10px 25px rgba(59,130,246,0.3);
        transform: translateY(-2px);
    }
    .level-badge {
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .level-badge::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255,255,255,0.4), transparent);
        transform: rotate(45deg);
        animation: shimmer 3s infinite;
    }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    
    /* Gradient backgrounds */
    .gradient-bg {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: linear-gradient(180deg, #3b82f6, #8b5cf6);
        border-radius: 10px;
    }
</style>
@endsection

@section('content')

{{-- ================= HERO ================= --}}
<section class="relative py-28 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    <!-- Animated Background Elements -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 1s;"></div>
        <div class="absolute top-3/4 left-1/2 w-56 h-56 bg-indigo-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
    </div>

    <!-- Content -->
    <div class="relative max-w-7xl mx-auto">
        <div class="text-center">
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-cinzel font-bold text-white mb-6 animate-slide-in-down">
                Videos <span class="text-gradient">Workshops</span>
            </h1>
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto font-inter animate-fade-in-up" style="animation-delay: 0.2s;">
                Dive deep into transformative learning experiences with world-class instructors and cutting-edge content
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 0.4s;">
                <button onclick="scrollToWorkshops()" class="group px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl flex items-center justify-center gap-2 animate-glow">
                    <span>Explore Workshops</span>
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </button>
                <button onclick="scrollToUpcoming()" class="group px-8 py-4 glass-effect text-gray-800 hover:text-gray-900 font-bold rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center gap-2">
                    <span>View Schedule</span>
                    <svg class="w-5 h-5 transform group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= CATEGORY FILTERS ================= --}}
<section class="py-12 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30  top-0 z-10 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
            <h2 class="text-3xl font-cinzel font-bold text-gray-900">Browse by Category</h2>
            <div class="flex items-center gap-3">
                <span class="text-sm text-gray-500 font-inter">Filter by:</span>
                <button onclick="resetFilters()" class="text-sm text-blue-600 hover:text-blue-800 font-medium flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Reset All
                </button>
            </div>
        </div>
        
        <div class="flex flex-wrap gap-3 justify-center">
            <button data-category="all" class="category-filter category-btn-active px-6 py-3 rounded-xl transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                </svg>
                All Workshops
            </button>
            
            @php
                $categories = [
                    'technology' => ['icon' => 'laptop-code', 'color' => 'blue'],
                    'buddhist' => ['icon' => 'peace', 'color' => 'orange'],
                    'education' => ['icon' => 'graduation-cap', 'color' => 'green'],
                    'research' => ['icon' => 'microscope', 'color' => 'red'],
                    'creative' => ['icon' => 'palette', 'color' => 'purple'],
                    'wellness' => ['icon' => 'heart', 'color' => 'pink'],
                ];
            @endphp
            
            @foreach($categories as $category => $data)
                <button data-category="{{ $category }}" class="category-filter px-6 py-3 rounded-xl bg-white/80 backdrop-blur-sm text-gray-700 hover:bg-white hover:shadow-xl border border-gray-200/50 transition-all duration-300 transform hover:-translate-y-0.5 flex items-center gap-2">
                    <i class="fas fa-{{ $data['icon'] }} text-{{ $data['color'] }}-500"></i>
                    {{ ucfirst($category) }}
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
                <div data-category="{{ $workshop->category }}" class="group workshop-card glass-effect rounded-3xl overflow-hidden workshop-card-hover animate-fade-in-up flex flex-col h-full" style="animation-delay: {{ $index * 100 }}ms">
                    <div class="relative h-48 bg-gradient-to-br from-gray-900 to-black overflow-hidden">
                        @if(!empty($workshop->video))
                            <iframe src="{{ $workshop->video }}" class="w-full h-full video-hover" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen title="{{ $workshop->title }}"></iframe>
                        @else
                            <img src="{{ $workshop->image ? asset($workshop->image) : asset('images/default-workshop.jpg') }}" alt="{{ $workshop->title }}" class="w-full h-full object-cover video-hover"/>
                        @endif

                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-transparent to-transparent pointer-events-none"></div>

                        <div class="absolute top-4 right-4 level-badge bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-bold px-3 py-2 rounded-full shadow-lg z-10">
                            {{ strtoupper($workshop->level) }}
                        </div>
                    </div>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex justify-between items-start mb-4">
                            <span class="text-xs font-bold px-3 py-1.5 rounded-full {{ $workshop->category === 'technology' ? 'text-blue-600 bg-blue-50' : ($workshop->category === 'buddhist' ? 'text-orange-600 bg-orange-50' : ($workshop->category === 'education' ? 'text-green-600 bg-green-50' : ($workshop->category === 'research' ? 'text-red-600 bg-red-50' : 'text-purple-600 bg-purple-50'))) }}">
                                {{ ucfirst($workshop->category) }}
                            </span>
                            <span class="text-sm text-gray-500 font-medium flex items-center gap-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $workshop->duration }}
                            </span>
                        </div>
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight line-clamp-2 font-inter">{{ $workshop->title }}</h3>
                        <p class="text-gray-600 mb-4 text-sm leading-relaxed line-clamp-3 font-inter">{{ $workshop->description }}</p>
                        
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-100 to-purple-100 flex items-center justify-center">
                                    <span class="text-blue-600 font-bold">{{ substr($workshop->instructor, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500">Instructor</p>
                                    <p class="text-sm font-semibold text-gray-900">{{ $workshop->instructor }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-xs text-gray-500">Date</p>
                                <p class="text-sm font-semibold text-gray-900">{{ \Carbon\Carbon::parse($workshop->date)->format('M d, Y') }}</p>
                            </div>
                        </div>
                        
                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center">
                                <div class="flex items-center mr-2">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= $workshop->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                    @endfor
                                </div>
                                <span class="text-sm font-bold text-gray-900">{{ $workshop->rating }}</span>
                                <span class="text-xs text-gray-500 ml-1">({{ $workshop->attendees }} attendees)</span>
                            </div>
                            
                            <button onclick="watchWorkshop({{ $workshop->id }})" class="group/btn bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-2.5 px-5 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center">
                                <span>Watch Now</span>
                                <svg class="w-4 h-4 ml-2 transform group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-20" id="no-workshops">
                    <div class="max-w-md mx-auto">
                        <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-12 h-12 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-2xl font-cinzel font-bold text-gray-900 mb-3">No Workshops Available</h3>
                        <p class="text-gray-600 mb-6 font-inter">New workshops are coming soon. Stay tuned for updates!</p>
                        <button onclick="location.reload()" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                            Refresh Page
                        </button>
                    </div>
                </div>
            @endforelse
        </div>
        
        <div id="no-workshops-filtered" class="col-span-full text-center py-20 hidden">
            <div class="max-w-md mx-auto">
                <div class="w-24 h-24 mx-auto mb-6 bg-gradient-to-r from-gray-100 to-gray-200 rounded-full flex items-center justify-center">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-2xl font-cinzel font-bold text-gray-900 mb-3">No Workshops Found</h3>
                <p class="text-gray-600 mb-6 font-inter">Try selecting a different category or check back later.</p>
                <button onclick="resetFilters()" class="px-6 py-3 glass-effect text-gray-800 font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                    Reset Filters
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= VIDEO MODAL ================= --}}
<div id="video-modal" class="fixed inset-0 z-50 hidden">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm"></div>
    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl w-full max-w-4xl overflow-hidden shadow-2xl animate-scale-in">
            <div class="p-4 bg-gradient-to-r from-blue-600 to-purple-600 flex justify-between items-center">
                <div>
                    <h3 id="video-title" class="text-xl font-bold text-white"></h3>
                    <p id="video-instructor" class="text-blue-100 text-sm"></p>
                </div>
                <button onclick="closeVideoModal()" class="text-white hover:text-gray-200 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <div class="aspect-video bg-black">
                <iframe id="workshop-video" class="w-full h-full" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="p-6 bg-gray-50">
                <div class="flex flex-wrap gap-4 justify-center">
                    <button onclick="registerWorkshop()" class="px-6 py-3 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                        Register for Full Access
                    </button>
                    <button onclick="downloadMaterials()" class="px-6 py-3 glass-effect text-gray-800 font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                        Download Materials
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================= UPCOMING WORKSHOPS ================= --}}
<section id="upcoming-workshops" class="py-20 px-4 md:px-8 bg-gradient-to-b from-white to-blue-50/30">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-cinzel font-bold text-gray-900 mb-4">Upcoming Workshops</h2>
            <p class="text-gray-600 max-w-2xl mx-auto font-inter">Join our future sessions and secure your spot today</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- This would be populated with upcoming workshops -->
            <!-- For now, showing a message -->
            <div class="col-span-full text-center py-12">
                <div class="glass-effect rounded-3xl p-8 max-w-2xl mx-auto">
                    <svg class="w-16 h-16 mx-auto text-blue-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">New Workshops Coming Soon</h3>
                    <p class="text-gray-600 mb-6">We're preparing exciting new content. Subscribe to get notified.</p>
                    <button onclick="contactCoordinator()" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                        Get Notified
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const workshopCards = document.querySelectorAll('.workshop-card');
    const noWorkshopsMessage = document.getElementById('no-workshops-filtered');

    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.dataset.category;

            // Update active class
            categoryFilters.forEach(f => {
                f.classList.remove('category-btn-active');
                f.classList.add('bg-white/80','backdrop-blur-sm','text-gray-700','hover:bg-white','hover:shadow-xl','border','border-gray-200/50');
                f.querySelectorAll('svg').forEach(svg => {
                    if(svg.classList.contains('animate-bounce-subtle')) {
                        svg.remove();
                    }
                });
            });
            
            this.classList.remove('bg-white/80','backdrop-blur-sm','text-gray-700','hover:bg-white','hover:shadow-xl','border','border-gray-200/50');
            this.classList.add('category-btn-active');
            
            // Add check icon
            const checkIcon = document.createElement('svg');
            checkIcon.className = 'w-5 h-5 ml-2 animate-bounce-subtle';
            checkIcon.setAttribute('fill', 'none');
            checkIcon.setAttribute('stroke', 'currentColor');
            checkIcon.setAttribute('viewBox', '0 0 24 24');
            checkIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />';
            this.appendChild(checkIcon);

            // Filter workshops
            let visibleCount = 0;
            workshopCards.forEach(card => {
                if(category === 'all' || card.dataset.category === category) {
                    card.style.display = 'flex';
                    card.classList.add('animate-scale-in');
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.classList.remove('animate-scale-in');
                }
            });

            // Show/hide no workshops message
            if (visibleCount === 0) {
                noWorkshopsMessage.classList.remove('hidden');
                document.getElementById('no-workshops')?.classList.add('hidden');
            } else {
                noWorkshopsMessage.classList.add('hidden');
                document.getElementById('no-workshops')?.classList.add('hidden');
            }
        });
    });

    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in-up');
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('.workshop-card').forEach(el => observer.observe(el));

    // Level badge hover effect
    workshopCards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            const badge = card.querySelector('.level-badge');
            if(badge) {
                badge.style.transform = 'scale(1.1)';
            }
        });
        card.addEventListener('mouseleave', () => {
            const badge = card.querySelector('.level-badge');
            if(badge) {
                badge.style.transform = 'scale(1)';
            }
        });
    });

    // Initialize with "All" selected
    document.querySelector('.category-filter[data-category="all"]').click();
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
    const workshops = @json($workshops);
    const workshop = workshops.find(w => w.id === workshopId);
    
    if(workshop && workshop.video) {
        const modal = document.getElementById('video-modal');
        const videoFrame = document.getElementById('workshop-video');
        const videoTitle = document.getElementById('video-title');
        const videoInstructor = document.getElementById('video-instructor');
        
        // Extract video ID if it's a YouTube URL
        let videoUrl = workshop.video;
        if(workshop.video.includes('youtube.com') || workshop.video.includes('youtu.be')) {
            videoUrl = workshop.video.replace('watch?v=', 'embed/').replace('youtu.be/', 'youtube.com/embed/');
        }
        
      
        videoFrame.src = videoUrl + '?autoplay=1&mute=1&rel=0';

        videoTitle.textContent = workshop.title;
        videoInstructor.textContent = `by ${workshop.instructor}`;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    } else {
        alert('Video not available for this workshop. Please check back later.');
    }
}

function closeVideoModal() {
    const modal = document.getElementById('video-modal');
    const videoFrame = document.getElementById('workshop-video');
    videoFrame.src = '';
    modal.classList.add('hidden');
    document.body.style.overflow = 'auto';
}

function registerWorkshop() {
    alert('Registration functionality would be implemented here.');
    // You would typically redirect to a registration form or show a modal
}

function downloadMaterials() {
    alert('Download materials functionality would be implemented here.');
}

function contactCoordinator() {
    alert('Contact form would open. This would connect to your backend contact system.');
}

function resetFilters() {
    document.querySelector('.category-filter[data-category="all"]').click();
    scrollToWorkshops();
}
</script>
@endsection