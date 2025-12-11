@extends('layouts.app')

@section('title', 'CAEDA News Feed')

@section('extra-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Facebook-like animations */
        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes slide-up {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        @keyframes like-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }
        
        .animate-fade-in { animation: fade-in 0.3s ease-out forwards; }
        .animate-slide-up { animation: slide-up 0.4s ease-out forwards; }
        .animate-like-pulse { animation: like-pulse 0.3s ease-out; }
        
        .font-poppins { font-family: 'Poppins', sans-serif; }
        
        /* Facebook-like styles */
        .fb-sidebar-link {
            transition: all 0.2s ease;
            border-radius: 8px;
        }
        .fb-sidebar-link:hover {
            background-color: #f0f2f5;
        }
        .fb-post {
            transition: box-shadow 0.3s ease;
            border-radius: 8px;
        }
        .fb-post:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .fb-interaction-btn {
            transition: all 0.2s ease;
            border-radius: 4px;
        }
        .fb-interaction-btn:hover {
            background-color: #f0f2f5;
        }
        .fb-active-tab {
            border-bottom: 3px solid #0866ff;
            color: #0866ff;
        }
        .fb-story-gradient {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
        }
        .fb-blue-gradient {
            background: linear-gradient(135deg, #0866ff, #1877f2);
        }
        .fb-text-blue {
            color: #0866ff;
        }
        .fb-bg-hover:hover {
            background-color: #f0f2f5;
        }
        .fb-comment-input {
            background-color: #f0f2f5;
            border-radius: 20px;
        }
        .fb-divider {
            border-color: #e4e6eb;
        }
        .fb-header-shadow {
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.1);
        }
        
        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #bcc0c4;
            border-radius: 10px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #8a8d91;
        }
        
        /* Story styles */
        .story-ring {
            background: linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%);
            padding: 2px;
            border-radius: 50%;
        }
        .story-ring-inner {
            background: white;
            border-radius: 50%;
            padding: 2px;
        }
        
        /* Loading skeleton */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }
        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
        
        /* Emoji picker */
        .emoji-picker {
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        .emoji-picker.show {
            transform: translateY(0);
        }
        
        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #e41e3f;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
@endsection

@section('content')

{{-- ================= FACEBOOK-STYLE HEADER ================= --}}
<header class="sticky top-0 z-50 bg-white fb-header-shadow">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            {{-- Left: Logo and Search --}}
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <div class="w-8 h-8 fb-blue-gradient rounded-full flex items-center justify-center mr-3">
                        <i class="fas fa-graduation-cap text-white text-lg"></i>
                    </div>
                    <span class="text-2xl font-bold text-gray-900 font-poppins">CAEDA</span>
                </div>
                
                <div class="hidden md:block relative">
                    <input type="text" 
                           placeholder="Search CAEDA News..." 
                           class="w-64 pl-10 pr-4 py-2 bg-gray-100 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:bg-white">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
            </div>
            
            {{-- Center: Navigation Tabs --}}
            <div class="flex items-center space-x-1">
                <a href="#" class="fb-active-tab px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-newspaper text-lg"></i>
                </a>
                <a href="#" class="px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-video text-lg"></i>
                </a>
                <a href="#" class="px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition">
                    <i class="fas fa-users text-lg"></i>
                </a>
                <a href="#" class="px-6 py-3 text-gray-700 hover:bg-gray-100 rounded-lg transition relative">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="notification-badge">3</span>
                </a>
            </div>
            
            {{-- Right: User Menu --}}
            <div class="flex items-center space-x-3">
                <button class="md:hidden p-2 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-search text-gray-600"></i>
                </button>
                
                <div class="relative">
                    <button class="flex items-center space-x-2 p-1 hover:bg-gray-100 rounded-full">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                            CS
                        </div>
                        <span class="hidden md:inline text-sm font-medium text-gray-700">Dr. Sokny</span>
                    </button>
                </div>
                
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-plus text-gray-600"></i>
                </button>
                
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-comment-dots text-gray-600"></i>
                </button>
            </div>
        </div>
    </div>
</header>

{{-- ================= MAIN CONTENT ================= --}}
<div class="min-h-screen bg-gray-100 font-poppins">
    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row gap-6">
            
            {{-- ================= LEFT SIDEBAR ================= --}}
            <div class="lg:w-1/4 space-y-4">
                {{-- User Profile Card --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-lg">
                            CS
                        </div>
                        <div>
                            <h3 class="font-bold text-gray-900">Dr. Chen Sokny</h3>
                            <p class="text-sm text-gray-600">Research Director</p>
                        </div>
                    </div>
                    
                    <div class="space-y-1">
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <i class="fas fa-user-friends text-blue-600 w-6"></i>
                            <span>Friends</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <i class="fas fa-save text-green-600 w-6"></i>
                            <span>Saved</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <i class="fas fa-flag text-orange-600 w-6"></i>
                            <span>Pages</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <i class="fas fa-users text-purple-600 w-6"></i>
                            <span>Groups</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <i class="fas fa-calendar-alt text-red-600 w-6"></i>
                            <span>Events</span>
                        </a>
                    </div>
                </div>
                
                {{-- Shortcuts --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.1s">
                    <h3 class="font-bold text-gray-900 mb-3">Your Shortcuts</h3>
                    <div class="space-y-1">
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <div class="w-6 h-6 bg-blue-100 rounded flex items-center justify-center">
                                <i class="fas fa-flask text-blue-600 text-sm"></i>
                            </div>
                            <span>Research Lab</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <div class="w-6 h-6 bg-green-100 rounded flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-green-600 text-sm"></i>
                            </div>
                            <span>Student Council</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <div class="w-6 h-6 bg-purple-100 rounded flex items-center justify-center">
                                <i class="fas fa-code text-purple-600 text-sm"></i>
                            </div>
                            <span>Tech Club</span>
                        </a>
                        <a href="#" class="fb-sidebar-link flex items-center space-x-3 p-2">
                            <div class="w-6 h-6 bg-yellow-100 rounded flex items-center justify-center">
                                <i class="fas fa-leaf text-yellow-600 text-sm"></i>
                            </div>
                            <span>Green Campus</span>
                        </a>
                    </div>
                </div>
                
                {{-- Sponsored --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.2s">
                    <h3 class="font-bold text-gray-900 mb-3">Sponsored</h3>
                    <div class="space-y-3">
                        <a href="#" class="block">
                            <div class="rounded-lg overflow-hidden mb-2">
                                <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Sponsored" class="w-full h-32 object-cover">
                            </div>
                            <div class="text-xs text-gray-500">Sponsored • Educational Tools</div>
                            <div class="font-medium text-sm">Premium Research Software - 50% Off for Students</div>
                        </a>
                    </div>
                </div>
                
                {{-- Footer Links --}}
                <div class="text-xs text-gray-500 px-2">
                    <div class="flex flex-wrap gap-2 mb-2">
                        <a href="#" class="hover:underline">Privacy</a>
                        <a href="#" class="hover:underline">Terms</a>
                        <a href="#" class="hover:underline">Advertising</a>
                        <a href="#" class="hover:underline">Ad Choices</a>
                        <a href="#" class="hover:underline">Cookies</a>
                    </div>
                    <div>CAEDA © 2024</div>
                </div>
            </div>
            
            {{-- ================= MAIN FEED ================= --}}
            <div class="lg:w-2/4 space-y-6">
                {{-- Stories --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900">Stories</h3>
                        <button class="text-blue-600 text-sm font-medium hover:underline">See All</button>
                    </div>
                    
                    <div class="flex space-x-4 overflow-x-auto pb-2 scrollbar-hide">
                        {{-- Create Story --}}
                        <div class="flex-shrink-0 w-32">
                            <div class="relative rounded-lg overflow-hidden border border-gray-300">
                                <img src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                     alt="Create story" class="w-full h-40 object-cover">
                                <div class="absolute bottom-0 left-0 right-0 bg-white p-3 text-center">
                                    <div class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center mx-auto -mt-8 mb-2">
                                        <i class="fas fa-plus text-white"></i>
                                    </div>
                                    <div class="font-semibold text-sm">Create Story</div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Story List --}}
                        @php
                            $stories = [
                                ['user' => 'Sarah Chen', 'img' => 'https://images.unsplash.com/photo-1494790108755-2616b786d4d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['user' => 'James Wilson', 'img' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['user' => 'Research Team', 'img' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['user' => 'Tech Club', 'img' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                            ];
                        @endphp
                        
                        @foreach($stories as $story)
                            <div class="flex-shrink-0 w-32">
                                <div class="story-ring">
                                    <div class="story-ring-inner">
                                        <div class="relative rounded-lg overflow-hidden">
                                            <img src="{{ $story['img'] }}" 
                                                 alt="{{ $story['user'] }}"
                                                 class="w-full h-40 object-cover">
                                            <div class="absolute bottom-0 left-0 right-0 p-3 text-white bg-gradient-to-t from-black/60 to-transparent">
                                                <div class="font-semibold text-sm">{{ $story['user'] }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Create Post --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.1s">
                    <div class="flex items-center space-x-3 mb-4">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                            CS
                        </div>
                        <button class="flex-1 text-left p-3 fb-comment-input text-gray-500 hover:bg-gray-200 transition">
                            What's on your mind, Dr. Sokny?
                        </button>
                    </div>
                    
                    <div class="flex items-center justify-between pt-4 border-t fb-divider">
                        <button class="fb-interaction-btn flex items-center space-x-2 px-4 py-2 flex-1 justify-center">
                            <i class="fas fa-video text-red-500"></i>
                            <span class="text-sm font-medium text-gray-700">Live video</span>
                        </button>
                        <button class="fb-interaction-btn flex items-center space-x-2 px-4 py-2 flex-1 justify-center">
                            <i class="fas fa-images text-green-500"></i>
                            <span class="text-sm font-medium text-gray-700">Photo/video</span>
                        </button>
                        <button class="fb-interaction-btn flex items-center space-x-2 px-4 py-2 flex-1 justify-center">
                            <i class="fas fa-smile text-yellow-500"></i>
                            <span class="text-sm font-medium text-gray-700">Feeling/activity</span>
                        </button>
                    </div>
                </div>
                
                {{-- Posts Feed --}}
                <div id="posts-feed" class="space-y-6">
                    {{-- Posts are provided by the controller as $news --}}
                    
                            [
                                'id' => 1,
                                'user' => [
                                    'name' => 'Research Department',
                                    'avatar' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                                    'role' => 'Official Page',
                                    'time' => '2h',
                                    'verified' => true
                                ],
                                'content' => "🎉 BREAKING: Our quantum computing research team has achieved a major breakthrough! We've successfully demonstrated quantum supremacy with our new 72-qubit processor. This could revolutionize fields from cryptography to drug discovery.",
                                'image' => 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'likes' => 245,
                                'comments' => 42,
                                'shares' => 18,
                                'isLiked' => false,
                                'tags' => ['#QuantumComputing', '#Breakthrough', '#Research']
                            ],
                            [
                                'id' => 2,
                                'user' => [
                                    'name' => 'Dr. Sarah Chen',
                                    'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b786d4d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                                    'role' => 'Professor of AI',
                                    'time' => '4h',
                                    'verified' => false
                                ],
                                'content' => "Just wrapped up an incredible panel discussion on 'Ethical AI in Education' with colleagues from Stanford and MIT. So proud to see CAEDA leading these important conversations! 🤖📚",
                                'image' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'likes' => 189,
                                'comments' => 31,
                                'shares' => 9,
                                'isLiked' => true,
                                'tags' => ['#AI', '#Education', '#Ethics']
                            ],
                            [
                                'id' => 3,
                                'user' => [
                                    'name' => 'Student Council',
                                    'avatar' => 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                                    'role' => 'Student Organization',
                                    'time' => '6h',
                                    'verified' => true
                                ],
                                'content' => "Hackathon 2024 is officially OPEN! 🚀 Over 500 students from 30 universities competing this year. The energy here is electric! Follow #CAEDAHack2024 for live updates.",
                                'image' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'video' => true,
                                'likes' => 523,
                                'comments' => 89,
                                'shares' => 45,
                                'isLiked' => false,
                                'tags' => ['#Hackathon', '#Students', '#Innovation']
                            ],
                            [
                                'id' => 4,
                                'user' => [
                                    'name' => 'CAEDA Library',
                                    'avatar' => 'https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
                                    'role' => 'Official Page',
                                    'time' => '1d',
                                    'verified' => true
                                ],
                                'content' => "📚 NEW ARRIVALS: Just added 500+ new academic journals and 200+ e-books to our digital library. Access is FREE for all CAEDA students and faculty. Knowledge should be accessible to all!",
                                'image' => 'https://images.unsplash.com/photo-1589829545856-d10d557cf95f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80',
                                'likes' => 156,
                                'comments' => 23,
                                'shares' => 12,
                                'isLiked' => false,
                                'tags' => ['#Library', '#Education', '#FreeAccess']
                            ],
                        ];
                    @foreach($news as $post)
                        <div class="fb-post bg-white rounded-lg shadow animate-fade-in" 
                             style="animation-delay: {{ $loop->index * 100 }}ms">
                            
                            {{-- Post Header --}}
                            <div class="p-4">
                                <div class="flex items-start justify-between">
                                    <div class="flex items-center space-x-3">
                                        <img src="{{ $post['user']['avatar'] }}" 
                                             alt="{{ $post['user']['name'] }}"
                                             class="w-10 h-10 rounded-full object-cover">
                                        <div>
                                            <div class="flex items-center space-x-1">
                                                <h4 class="font-bold text-gray-900">{{ $post['user']['name'] }}</h4>
                                                @if($post['user']['verified'])
                                                    <i class="fas fa-check-circle text-blue-600 text-sm"></i>
                                                @endif
                                            </div>
                                            <div class="flex items-center space-x-2 text-sm text-gray-500">
                                                <span>{{ $post['user']['time'] }} ago</span>
                                                <span>•</span>
                                                <i class="fas fa-globe-americas"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="p-2 hover:bg-gray-100 rounded-full">
                                        <i class="fas fa-ellipsis-h text-gray-500"></i>
                                    </button>
                                </div>
                                
                                {{-- Post Content --}}
                                <div class="mt-4">
                                    <p class="text-gray-900 mb-4">{{ $post['content'] }}</p>
                                    
                                    @if(isset($post['tags']))
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            @foreach($post['tags'] as $tag)
                                                <span class="text-blue-600 hover:underline cursor-pointer">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                            
                            {{-- Post Media --}}
                            @if(isset($post['image']))
                                <div class="border-t fb-divider">
                                    @if(isset($post['video']))
                                        <div class="relative">
                                            <img src="{{ $post['image'] }}" 
                                                 alt="Post image"
                                                 class="w-full h-96 object-cover">
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <button class="w-16 h-16 bg-white/80 rounded-full flex items-center justify-center hover:bg-white transition">
                                                    <i class="fas fa-play text-2xl text-blue-600"></i>
                                                </button>
                                            </div>
                                        </div>
                                    @else
                                        <img src="{{ $post['image'] }}" 
                                             alt="Post image"
                                             class="w-full h-96 object-cover">
                                    @endif
                                </div>
                            @endif
                            
                            {{-- Post Stats --}}
                            <div class="p-4 border-t fb-divider">
                                <div class="flex items-center justify-between text-sm text-gray-500 mb-3">
                                    <div class="flex items-center space-x-4">
                                        <div class="flex items-center">
                                            <div class="w-6 h-6 bg-blue-600 rounded-full flex items-center justify-center text-white text-xs">
                                                <i class="fas fa-thumbs-up"></i>
                                            </div>
                                            <span class="ml-2">{{ $post['likes'] }}</span>
                                        </div>
                                        <div class="flex items-center hover:underline cursor-pointer">
                                            <span>{{ $post['comments'] }} comments</span>
                                        </div>
                                        <div class="flex items-center hover:underline cursor-pointer">
                                            <span>{{ $post['shares'] }} shares</span>
                                        </div>
                                    </div>
                                </div>
                                
                                {{-- Interaction Buttons --}}
                                <div class="flex border-t fb-divider pt-2">
                                    <button onclick="likePost({{ $post['id'] }}, this)" 
                                            class="fb-interaction-btn flex items-center justify-center space-x-2 flex-1 py-2 rounded-lg {{ $post['isLiked'] ? 'fb-text-blue' : '' }}"
                                            data-liked="{{ $post['isLiked'] ? 'true' : 'false' }}">
                                        <i class="fas fa-thumbs-up {{ $post['isLiked'] ? 'fb-text-blue' : '' }}"></i>
                                        <span class="font-medium">Like</span>
                                    </button>
                                    
                                    <button onclick="focusComment({{ $post['id'] }})"
                                            class="fb-interaction-btn flex items-center justify-center space-x-2 flex-1 py-2 rounded-lg">
                                        <i class="far fa-comment"></i>
                                        <span class="font-medium">Comment</span>
                                    </button>
                                    
                                    <button onclick="sharePost({{ $post['id'] }})"
                                            class="fb-interaction-btn flex items-center justify-center space-x-2 flex-1 py-2 rounded-lg">
                                        <i class="fas fa-share"></i>
                                        <span class="font-medium">Share</span>
                                    </button>
                                </div>
                                
                                {{-- Comments Section --}}
                                <div class="mt-4 space-y-4">
                                    {{-- Sample Comments --}}
                                    @if($loop->first)
                                        <div class="space-y-3">
                                            <div class="flex space-x-3">
                                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                                     alt="User" class="w-8 h-8 rounded-full">
                                                <div class="flex-1">
                                                    <div class="bg-gray-100 rounded-2xl p-3">
                                                        <div class="font-medium text-sm">Michael Chen</div>
                                                        <p class="text-sm mt-1">This is incredible! Can't wait to read the paper!</p>
                                                    </div>
                                                    <div class="flex items-center space-x-4 mt-2 ml-3 text-xs text-gray-500">
                                                        <button class="hover:underline">Like</button>
                                                        <span>•</span>
                                                        <span>2h</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    
                                    {{-- Comment Input --}}
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold text-sm">
                                            CS
                                        </div>
                                        <div class="flex-1 relative">
                                            <input type="text" 
                                                   id="comment-input-{{ $post['id'] }}"
                                                   placeholder="Write a comment..."
                                                   class="w-full px-4 py-2 fb-comment-input text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <div class="absolute right-2 top-1/2 transform -translate-y-1/2 flex items-center space-x-2">
                                                <button class="p-1 hover:bg-gray-200 rounded-full">
                                                    <i class="far fa-smile text-gray-500"></i>
                                                </button>
                                                <button class="p-1 hover:bg-gray-200 rounded-full">
                                                    <i class="fas fa-camera text-gray-500"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    {{-- Pagination (if using Laravel pagination) --}}
                    @if(isset($news) && method_exists($news, 'links'))
                        <div class="text-center py-4">
                            {{ $news->links() }}
                        </div>
                    @endif

                    {{-- Load More --}}
                    <div class="text-center py-8">
                        <button id="load-more" 
                                class="px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
                            <i class="fas fa-spinner animate-spin mr-2 hidden"></i>
                            Load More Posts
                        </button>
                    </div>
                </div>
            </div>
            
            {{-- ================= RIGHT SIDEBAR ================= --}}
            <div class="lg:w-1/4 space-y-6">
                {{-- Birthday --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.1s">
                    <div class="flex items-center space-x-3 mb-3">
                        <i class="fas fa-birthday-cake text-pink-500 text-xl"></i>
                        <h3 class="font-bold text-gray-900">Birthdays</h3>
                    </div>
                    <div class="text-sm">
                        <div class="flex items-center justify-between mb-2">
                            <span class="font-medium">Sarah Johnson</span>
                            <span class="text-gray-500">Today</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="font-medium">James Wilson</span>
                            <span class="text-gray-500">Tomorrow</span>
                        </div>
                    </div>
                    <button class="w-full mt-3 p-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-sm font-medium">
                        See All
                    </button>
                </div>
                
                {{-- Contacts --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900">Contacts</h3>
                        <div class="flex space-x-2">
                            <button class="p-1 hover:bg-gray-100 rounded-full">
                                <i class="fas fa-video text-gray-500"></i>
                            </button>
                            <button class="p-1 hover:bg-gray-100 rounded-full">
                                <i class="fas fa-search text-gray-500"></i>
                            </button>
                            <button class="p-1 hover:bg-gray-100 rounded-full">
                                <i class="fas fa-ellipsis-h text-gray-500"></i>
                            </button>
                        </div>
                    </div>
                    
                    <div class="space-y-3 custom-scrollbar" style="max-height: 400px; overflow-y: auto;">
                        @php
                            $contacts = [
                                ['name' => 'Dr. Robert Kim', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['name' => 'Prof. Maria Garcia', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1494790108755-2616b786d4d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['name' => 'Alex Thompson', 'status' => 'away', 'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['name' => 'Research Lab Team', 'status' => 'group', 'avatar' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['name' => 'Student Union', 'status' => 'offline', 'avatar' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                                ['name' => 'Tech Club', 'status' => 'online', 'avatar' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'],
                            ];
                        @endphp
                        
                        @foreach($contacts as $contact)
                            <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 cursor-pointer">
                                <div class="relative">
                                    <img src="{{ $contact['avatar'] }}" 
                                         alt="{{ $contact['name'] }}"
                                         class="w-10 h-10 rounded-full object-cover">
                                    @if($contact['status'] === 'online')
                                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
                                    @elseif($contact['status'] === 'away')
                                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-yellow-500 rounded-full border-2 border-white"></div>
                                    @elseif($contact['status'] === 'group')
                                        <div class="absolute bottom-0 right-0 w-3 h-3 bg-blue-500 rounded-full border-2 border-white"></div>
                                    @endif
                                </div>
                                <span class="font-medium text-sm">{{ $contact['name'] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Trending Now --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.3s">
                    <h3 class="font-bold text-gray-900 mb-4">Trending Now</h3>
                    
                    <div class="space-y-4">
                        @php
                            $trending = [
                                ['tag' => '#CAEDAHack2024', 'posts' => '2.3K posts'],
                                ['tag' => '#QuantumBreakthrough', 'posts' => '1.8K posts'],
                                ['tag' => '#CampusRenewal', 'posts' => '956 posts'],
                                ['tag' => '#ResearchGrant', 'posts' => '742 posts'],
                            ];
                        @endphp
                        
                        @foreach($trending as $item)
                            <div class="p-3 rounded-lg hover:bg-gray-50 cursor-pointer">
                                <div class="text-xs text-gray-500 mb-1">Trending in CAEDA</div>
                                <div class="font-bold text-gray-900 mb-1">{{ $item['tag'] }}</div>
                                <div class="text-sm text-gray-500">{{ $item['posts'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
                {{-- Groups --}}
                <div class="bg-white rounded-lg shadow p-4 animate-slide-up" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="font-bold text-gray-900">Groups</h3>
                        <button class="text-blue-600 text-sm font-medium hover:underline">See All</button>
                    </div>
                    
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 cursor-pointer">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-flask text-blue-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-sm">Research Scholars</div>
                                <div class="text-xs text-gray-500">3 new posts</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 cursor-pointer">
                            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-leaf text-green-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-sm">Green Campus</div>
                                <div class="text-xs text-gray-500">Event tomorrow</div>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-100 cursor-pointer">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-code text-purple-600"></i>
                            </div>
                            <div>
                                <div class="font-medium text-sm">AI & ML Club</div>
                                <div class="text-xs text-gray-500">Workshop today</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Quick Links --}}
                <div class="text-xs text-gray-500">
                    <div class="flex flex-wrap gap-2 mb-2">
                        <a href="#" class="hover:underline">Privacy</a> •
                        <a href="#" class="hover:underline">Terms</a> •
                        <a href="#" class="hover:underline">Advertising</a> •
                        <a href="#" class="hover:underline">Ad Choices</a> •
                        <a href="#" class="hover:underline">Cookies</a> •
                        <a href="#" class="hover:underline">More</a>
                    </div>
                    <div>Meta © 2024</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Create Post Modal --}}
<div id="create-post-modal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-lg w-full max-w-lg animate-slide-up">
        <div class="p-4 border-b flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Create Post</h3>
            <button onclick="closeModal('create-post-modal')" class="p-2 hover:bg-gray-100 rounded-full">
                <i class="fas fa-times text-gray-500"></i>
            </button>
        </div>
        
        <div class="p-4">
            <div class="flex items-center space-x-3 mb-4">
                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                    CS
                </div>
                <div>
                    <div class="font-bold">Dr. Chen Sokny</div>
                    <select class="text-sm border-none bg-gray-100 rounded-lg px-2 py-1">
                        <option>Public</option>
                        <option>Friends</option>
                        <option>Only me</option>
                    </select>
                </div>
            </div>
            
            <textarea id="post-content" 
                      placeholder="What's on your mind, Dr. Sokny?"
                      class="w-full h-40 p-3 resize-none focus:outline-none text-lg"></textarea>
            
            <div class="border rounded-lg p-3 mt-4">
                <div class="flex items-center justify-between mb-3">
                    <span class="font-medium">Add to your post</span>
                </div>
                <div class="flex space-x-2">
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-images text-green-500"></i>
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-user-tag text-blue-500"></i>
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-smile text-yellow-500"></i>
                    </button>
                    <button class="p-2 hover:bg-gray-100 rounded-lg">
                        <i class="fas fa-map-marker-alt text-red-500"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="p-4 border-t">
            <button onclick="submitPost()" 
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded-lg transition">
                Post
            </button>
        </div>
    </div>
</div>

{{-- Emoji Picker --}}
<div id="emoji-picker" class="emoji-picker fixed bottom-0 left-0 right-0 bg-white border-t shadow-lg z-40 p-4">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-4">
            <h4 class="font-bold text-gray-900">Emoji</h4>
            <button onclick="toggleEmojiPicker()" class="p-2 hover:bg-gray-100 rounded-full">
                <i class="fas fa-times text-gray-500"></i>
            </button>
        </div>
        <div class="grid grid-cols-8 gap-2">
            @php
                $emojis = ['😀', '😂', '🥰', '😎', '🤔', '👏', '🎉', '🔥', '✨', '💪', '🤝', '📚', '🎓', '💡', '🔬', '💻'];
            @endphp
            @foreach($emojis as $emoji)
                <button class="text-2xl p-2 hover:bg-gray-100 rounded-lg" onclick="insertEmoji('{{ $emoji }}')">
                    {{ $emoji }}
                </button>
            @endforeach
        </div>
    </div>
</div>

{{-- Loading Overlay --}}
<div id="loading" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 border-4 border-blue-600 border-t-transparent rounded-full animate-spin"></div>
            <div class="text-lg font-medium">Loading...</div>
        </div>
    </div>
</div>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Facebook-like interactions
    
    // Open create post modal when clicking "What's on your mind"
    document.querySelectorAll('[class*="fb-comment-input"]').forEach(input => {
        input.addEventListener('click', function() {
            document.getElementById('create-post-modal').classList.remove('hidden');
        });
    });
    
    // Like post functionality
    window.likePost = function(postId, button) {
        const isLiked = button.getAttribute('data-liked') === 'true';
        const likeIcon = button.querySelector('i');
        const likeText = button.querySelector('span');
        
        if (isLiked) {
            // Unlike
            button.setAttribute('data-liked', 'false');
            button.classList.remove('fb-text-blue');
            likeIcon.classList.remove('fb-text-blue');
            likeIcon.classList.remove('fas');
            likeIcon.classList.add('far');
            likeText.textContent = 'Like';
            
            // Update like count (in a real app, you'd make an API call)
            const postElement = button.closest('.fb-post');
            const likeCountElement = postElement.querySelector('[class*="text-blue-600"] + span');
            if (likeCountElement) {
                const currentLikes = parseInt(likeCountElement.textContent);
                likeCountElement.textContent = currentLikes - 1;
            }
        } else {
            // Like
            button.setAttribute('data-liked', 'true');
            button.classList.add('fb-text-blue');
            likeIcon.classList.add('fb-text-blue');
            likeIcon.classList.remove('far');
            likeIcon.classList.add('fas');
            likeText.textContent = 'Liked';
            
            // Add animation
            button.classList.add('animate-like-pulse');
            setTimeout(() => button.classList.remove('animate-like-pulse'), 300);
            
            // Update like count
            const postElement = button.closest('.fb-post');
            const likeCountElement = postElement.querySelector('[class*="text-blue-600"] + span');
            if (likeCountElement) {
                const currentLikes = parseInt(likeCountElement.textContent);
                likeCountElement.textContent = currentLikes + 1;
            }
        }
    };
    
    // Focus comment input
    window.focusComment = function(postId) {
        const commentInput = document.getElementById(`comment-input-${postId}`);
        if (commentInput) {
            commentInput.focus();
        }
    };
    
    // Share post
    window.sharePost = function(postId) {
        // Show share options
        showNotification('Share options would appear here', 'info');
    };
    
    // Submit new post
    window.submitPost = function() {
        const content = document.getElementById('post-content').value.trim();
        if (!content) {
            showNotification('Please write something to post', 'warning');
            return;
        }
        
        showLoading();
        
        // Simulate API call
        setTimeout(() => {
            hideLoading();
            closeModal('create-post-modal');
            showNotification('Post published successfully!', 'success');
            document.getElementById('post-content').value = '';
            
            // In a real app, you would add the new post to the feed
            // addNewPostToFeed(content);
        }, 1500);
    };
    
    // Close modal
    window.closeModal = function(modalId) {
        document.getElementById(modalId).classList.add('hidden');
    };
    
    // Toggle emoji picker
    window.toggleEmojiPicker = function() {
        const picker = document.getElementById('emoji-picker');
        picker.classList.toggle('show');
    };
    
    // Insert emoji
    window.insertEmoji = function(emoji) {
        const activeElement = document.activeElement;
        if (activeElement.tagName === 'TEXTAREA' || activeElement.tagName === 'INPUT') {
            const start = activeElement.selectionStart;
            const end = activeElement.selectionEnd;
            const text = activeElement.value;
            activeElement.value = text.substring(0, start) + emoji + text.substring(end);
            activeElement.selectionStart = activeElement.selectionEnd = start + emoji.length;
            activeElement.focus();
        }
    };
    
    // Load more posts
    const loadMoreBtn = document.getElementById('load-more');
    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const spinner = this.querySelector('.fa-spinner');
            spinner.classList.remove('hidden');
            this.disabled = true;
            
            // Simulate loading more posts
            setTimeout(() => {
                spinner.classList.add('hidden');
                this.disabled = false;
                
                // In a real app, you would fetch and append new posts
                // fetchMorePosts();
                
                showNotification('More posts loaded!', 'success');
            }, 2000);
        });
    }
    
    // Search functionality
    const searchInput = document.querySelector('input[placeholder*="Search"]');
    if (searchInput) {
        searchInput.addEventListener('keyup', debounce(function(e) {
            if (e.key === 'Enter' || this.value.length > 2) {
                showLoading();
                setTimeout(() => {
                    hideLoading();
                    showNotification(`Search results for: ${this.value}`, 'info');
                }, 1000);
            }
        }, 500));
    }
    
    // Real-time notifications
    simulateNotifications();
});

// Show notification
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    const colors = {
        success: 'bg-green-500',
        error: 'bg-red-500',
        warning: 'bg-yellow-500',
        info: 'bg-blue-500'
    };
    
    notification.className = `fixed top-20 right-4 ${colors[type]} text-white px-4 py-3 rounded-lg shadow-lg animate-slide-up z-50`;
    notification.innerHTML = `
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <i class="fas fa-${type === 'success' ? 'check-circle' : type === 'error' ? 'exclamation-circle' : 'info-circle'}"></i>
                <span>${message}</span>
            </div>
            <button onclick="this.parentElement.parentElement.remove()" class="ml-4">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        if (notification.parentElement) {
            notification.style.opacity = '0';
            notification.style.transform = 'translateY(-20px)';
            setTimeout(() => notification.remove(), 300);
        }
    }, 3000);
}

// Show loading
function showLoading() {
    document.getElementById('loading').classList.remove('hidden');
}

// Hide loading
function hideLoading() {
    document.getElementById('loading').classList.add('hidden');
}

// Debounce function
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

// Simulate real-time notifications
function simulateNotifications() {
    setTimeout(() => {
        // Show a notification after 10 seconds
        showNotification('James Wilson liked your post', 'info');
    }, 10000);
    
    setTimeout(() => {
        // Show another notification after 20 seconds
        showNotification('Sarah Chen commented on your photo', 'info');
    }, 20000);
}

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl/Cmd + Enter to submit post
    if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
        const modal = document.getElementById('create-post-modal');
        if (!modal.classList.contains('hidden')) {
            submitPost();
        }
    }
    
    // Escape to close modals
    if (e.key === 'Escape') {
        const modals = ['create-post-modal', 'emoji-picker'];
        modals.forEach(modalId => {
            const modal = document.getElementById(modalId);
            if (modal && !modal.classList.contains('hidden')) {
                closeModal(modalId);
            }
        });
    }
});

// Infinite scroll
let loading = false;
window.addEventListener('scroll', function() {
    if (loading) return;
    
    const scrollPosition = window.innerHeight + window.scrollY;
    const pageHeight = document.documentElement.scrollHeight - 500;
    
    if (scrollPosition >= pageHeight) {
        loading = true;
        const loadMoreBtn = document.getElementById('load-more');
        if (loadMoreBtn) {
            loadMoreBtn.click();
            setTimeout(() => {
                loading = false;
            }, 2000);
        }
    }
});
</script>
@endsection