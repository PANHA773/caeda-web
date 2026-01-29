@extends('layouts.app')

@section('title', 'Home - CAEDA')

@section('extra-css')
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradient-x {

            0%,
            100% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.6;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up .8s ease-out forwards;
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
            background-size: 200% 200%;
        }

        .animate-shake {
            animation: shake .5s ease-in-out;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')

    {{-- ================= HERO SECTION (REDESIGNED) ================= --}}
    <section class="relative min-h-[90vh] flex items-center justify-center pt-24 pb-32">
        {{-- Background Carousel --}}
        <div id="hero-carousel" class="absolute inset-0 z-0 overflow-hidden">
            @foreach($heroSlides as $index => $slide)
                <div class="absolute inset-0 transition-opacity duration-1000 ease-in-out {{ $index === 0 ? 'opacity-100' : 'opacity-0' }} hero-slide"
                    style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ $slide->image_url }}') center/cover no-repeat;">
                </div>
            @endforeach
        </div>

        {{-- Content Overlay --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 text-center text-white">
            @foreach($heroSlides as $index => $slide)
                <div class="hero-content {{ $index === 0 ? 'block' : 'hidden' }} space-y-6" data-index="{{ $index }}">
                    <h1
                        class="text-5xl md:text-7xl lg:text-8xl font-black font-cinzel leading-tight tracking-wider uppercase animate-fade-in-up">
                        {{ $slide->title }}
                    </h1>
                    <p
                        class="text-xl md:text-2xl text-blue-50 max-w-3xl mx-auto font-medium opacity-90 animate-fade-in-up delay-200">
                        {{ $slide->description ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.' }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center justify-center gap-6 pt-8 animate-fade-in-up delay-500">
                        <a href="{{ route('programs') }}"
                            class="bg-[#FF9800] hover:bg-[#F57C00] text-white px-10 py-4 rounded-lg font-bold uppercase transition-all flex items-center shadow-lg">
                            Know More <i class="fas fa-chevron-right ml-3 text-sm"></i>
                        </a>
                        <a href="{{ route('about') }}"
                            class="bg-white hover:bg-gray-100 text-gray-800 px-10 py-4 rounded-lg font-bold uppercase transition-all flex items-center shadow-lg">
                            Take a Tour <i class="fas fa-play-circle ml-3"></i>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Carousel Navigation --}}
        <div class="absolute bottom-40 left-1/2 -translate-x-1/2 z-20 flex gap-4">
            @foreach($heroSlides as $index => $slide)
                <button
                    class="w-12 h-1.5 rounded-full transition-all duration-300 carousel-dot-btn {{ $index === 0 ? 'bg-[#FF9800]' : 'bg-white/40' }}"
                    data-index="{{ $index }}"></button>
            @endforeach
        </div>

        {{-- BOTTOM FEATURE BOXES --}}
        <div class="absolute bottom-0 left-0 right-0 z-30 translate-y-1/2">
            <div class="max-w-7xl mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 shadow-2xl rounded-3xl overflow-hidden">
                    {{-- Box 1: Apply --}}
                    <div
                        class="bg-[#FF9800] p-8 md:p-10 flex items-center gap-6 group hover:bg-[#F57C00] transition-colors cursor-pointer">
                        <div
                            class="w-20 h-20 flex-shrink-0 bg-white/20 rounded-full flex items-center justify-center text-white text-4xl group-hover:scale-110 transition-transform">
                            <i class="fas fa-mouse-pointer"></i>
                        </div>
                        <div class="text-white">
                            <h3 class="text-2xl font-bold uppercase mb-1">Apply Online</h3>
                            <p class="text-white/80 text-sm leading-snug">Start your journey with us by submitting your
                                application online today.</p>
                        </div>
                    </div>

                    {{-- Box 2: Prospects --}}
                    <div
                        class="bg-[#2196F3] p-8 md:p-10 flex items-center gap-6 group hover:bg-[#1976D2] transition-colors cursor-pointer border-x border-white/10">
                        <div
                            class="w-20 h-20 flex-shrink-0 bg-white/20 rounded-full flex items-center justify-center text-white text-4xl group-hover:scale-110 transition-transform">
                            <i class="fas fa-cloud-download-alt"></i>
                        </div>
                        <div class="text-white">
                            <h3 class="text-2xl font-bold uppercase mb-1">Download Prospects</h3>
                            <p class="text-white/80 text-sm leading-snug">Download our prospectus to learn more about our
                                programs and opportunities.</p>
                        </div>
                    </div>

                    {{-- Box 3: Certification --}}
                    <div
                        class="bg-[#FFC107] p-8 md:p-10 flex items-center gap-6 group hover:bg-[#FFB300] transition-colors cursor-pointer">
                        <div
                            class="w-20 h-20 flex-shrink-0 bg-white/20 rounded-full flex items-center justify-center text-white text-4xl group-hover:scale-110 transition-transform">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="text-white">
                            <h3 class="text-2xl font-bold uppercase mb-1">Certification</h3>
                            <p class="text-white/80 text-sm leading-snug">Earn internationally recognized certifications
                                upon program completion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- ================= STATS SECTION ================= --}}
    <section data-animate
        class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 border-y border-gray-200/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($stats as $index => $stat)
                    <div class="text-center group transform transition-all duration-500 hover:scale-105"
                        style="animation-delay: {{ $index * 150 }}ms">
                        <div
                            class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r {{ $stat['color'] }} bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
                            {{ $stat['number'] }}
                        </div>
                        <div class="text-gray-600 font-medium group-hover:text-gray-800 transition-colors duration-300">
                            {{ $stat['label'] }}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= WELCOME US SECTION ================= --}}
    @php
        // Fetch the first active welcome section
        $welcome = \App\Models\WelcomeSection::where('is_active', true)->first();
    @endphp

    @if($welcome)
        <section data-animate class="py-20 px-4 md:px-8 bg-white/80 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-start gap-12">

                    {{-- LEFT TEXT --}}
                    <div class="lg:w-1/2">
                        <div class="mb-8">
                            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 font-cinzel">
                                {!! $welcome->title !!}
                            </h2>

                            <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                                @foreach($welcome->description as $index => $paragraph)
                                    <p
                                        class="text-gray-800 transform transition-all duration-500 hover:translate-x-2 delay-{{ $index * 100 }}">
                                        {!! $paragraph !!}
                                    </p>
                                @endforeach
                            </div>
                        </div>

                        {{-- SIGNATURE SECTION --}}
                        <div
                            class="border-t-2 border-blue-200 pt-8 mt-8 transform transition-all duration-500 hover:shadow-lg rounded-xl p-6">
                            <div class="text-gray-900 space-y-2">
                                <p class="text-xl font-semibold text-blue-900">
                                    {{ $welcome->signature_name }},
                                </p>
                                <p class="text-lg text-gray-700">{{ $welcome->signature_title }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- RIGHT VIDEO/IMAGE --}}
                    <div class="lg:w-1/2 relative">
                        <div class="relative transform transition-all duration-500 hover:scale-105 group">
                            {{-- Video Player --}}
                            <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white backdrop-blur-sm">
                                @if($welcome->video_url && (str_contains($welcome->video_url, 'youtube.com') || str_contains($welcome->video_url, 'youtu.be')))
                                    {{-- YouTube Embed --}}
                                    <iframe class="w-full h-96" src="{{ $welcome->video_url }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen>
                                    </iframe>
                                @elseif($welcome->video_url)
                                    {{-- Regular Video File --}}
                                    <video id="welcome-video" class="w-full h-96 object-cover" poster="{{ $welcome->image_url }}"
                                        preload="metadata">
                                        <source src="{{ $welcome->video_url }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>

                                    {{-- Play Button Overlay for video files --}}
                                    <div id="play-button-overlay"
                                        class="absolute inset-0 flex items-center justify-center bg-black/30 cursor-pointer transition-opacity duration-300 group-hover:bg-black/40">
                                        <button onclick="toggleVideo()"
                                            class="w-20 h-20 bg-white/90 hover:bg-white rounded-full flex items-center justify-center shadow-2xl transform transition-all duration-300 hover:scale-110">
                                            <i id="play-icon" class="fas fa-play text-blue-600 text-3xl ml-1"></i>
                                        </button>
                                    </div>
                                @else
                                    {{-- Just Image if no video --}}
                                    <img src="{{ $welcome->image_url }}" alt="Caeda Campus" class="w-full h-96 object-cover">
                                @endif
                            </div>

                            {{-- FLOATING BADGES --}}
                            @if($welcome->badges)
                                @foreach($welcome->badges as $badge)
                                    <div
                                        class="absolute {{ $badge['position'] ?? '-top-4 -right-4' }} 
                                                                                                        bg-{{ $badge['color'] ?? 'yellow' }}-400 text-{{ $badge['text_color'] ?? 'blue' }}-900 
                                                                                                        px-4 py-2 rounded-xl font-bold shadow-lg animate-bounce">
                                        {{ $badge['text'] }}
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- ENHANCED STATS --}}
                        @if($welcome->stats)
                            <div class="grid grid-cols-2 gap-6 mt-12">
                                @foreach($welcome->stats as $stat)
                                    <div
                                        class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                                        <div class="text-3xl font-bold text-blue-900 mb-2">{{ $stat['number'] }}</div>
                                        <div class="text-gray-700 font-medium">{{ $stat['label'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                </div>
            </div>
        </section>
    @endif



    {{-- ================= COURSES SECTION ================= --}}
    <section data-animate class="py-20 px-4 md:px-8 bg-gradient-to-b from-gray-50 to-white/80 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Popular <span class="text-red-600 animate-pulse">Programs</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Discover our most popular programs and start your learning journey today
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($programs as $program)
                    {{-- CARD --}}
                    <div
                        class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl
                                                                                                                    transition-all duration-500 hover:-translate-y-2 group
                                                                                                                    flex flex-col h-full">

                        <div class="relative overflow-hidden">
                            <img src="{{ $program->image_url }}" alt="{{ $program->title }}"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">

                            @if($program->is_featured)
                                <div
                                    class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    Featured
                                </div>
                            @endif
                        </div>

                        {{-- CONTENT --}}
                        <div class="p-6 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                        {{ $program->category }}
                                    </span>
                                    <h3
                                        class="text-xl font-bold text-gray-900 mt-2 group-hover:text-blue-600 transition-colors duration-300">
                                        {{ $program->title }}
                                    </h3>
                                </div>
                                <div class="text-2xl font-bold text-green-600">
                                    ${{ number_format($program->tuition ?? 0, 2) }}
                                </div>
                            </div>

                            {{-- DESCRIPTION (height fixed) --}}
                            <p class="text-gray-600 mb-4 line-clamp-2 min-h-[3rem]">
                                {{ $program->short_description ?? Str::limit($program->description, 120) }}
                            </p>

                            {{-- RATING --}}
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    {{ $program->rating }}
                                </span>
                                <span>{{ number_format($program->students ?? 0) }} students</span>
                            </div>

                            {{-- META --}}
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-gray-700 font-medium">{{ $program->duration ?? '' }}</span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
                                    {{ $program->level ?? '' }}
                                </span>
                            </div>

                            {{-- BUTTON (always bottom) --}}
                            <div class="mt-auto">
                                <a href="{{ route('programs') }}"
                                    class="w-full inline-block text-center
                                                                                                                              bg-gradient-to-r from-blue-600 to-purple-600
                                                                                                                              hover:from-blue-700 hover:to-purple-700
                                                                                                                              text-white font-semibold py-3 rounded-xl
                                                                                                                              transition-all duration-300
                                                                                                                              transform group-hover:-translate-y-1">
                                    View Program
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= FEATURES SECTION ================= --}}
    <section data-animate class="py-20 bg-gradient-to-b from-white to-blue-50/30 backdrop-blur-sm px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Why Choose <span class="text-red-600 animate-pulse">Us</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    We provide the best learning experience with cutting-edge technology and expert instructors
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($features as $index => $feature)
                    <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg text-center hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100/50"
                        style="animation-delay: {{ $index * 200 }}ms">
                        <div
                            class="w-20 h-20 bg-gradient-to-br {{ $feature->color }} rounded-3xl flex items-center justify-center mx-auto mb-6 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature->icon }}">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-800 transition-colors duration-300">
                            {{ $feature->title }}
                        </h3>
                        <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                            {{ $feature->description }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>





    {{-- ================= TESTIMONIALS SECTION ================= --}}
    <section data-animate class="py-20 px-4 md:px-8 bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Our <span class="text-blue-900 animate-pulse">Instructors</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Hear from our experienced instructors about their teaching journey
                </p>
            </div>

            <div class="relative max-w-4xl mx-auto" style="min-height: 300px">
                @php
                    $instructors = [
                        [
                            'id' => 1,
                            'name' => 'Sarah Johnson',
                            'role' => 'Web Developer',
                            'bio' => 'The courses completely transformed my career. I went from beginner to landing my dream job in just 6 months!',
                            'image_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'Web Development',
                            'contact' => 'sarah.johnson@example.com',
                            'rating' => 5
                        ],
                        [
                            'id' => 2,
                            'name' => 'Michael Chen',
                            'role' => 'Data Scientist',
                            'bio' => 'The instructors are experts in their fields and the curriculum is always up-to-date with industry trends.',
                            'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'Data Science',
                            'rating' => 4
                        ],
                        [
                            'id' => 3,
                            'name' => 'Emma Rodriguez',
                            'role' => 'UI/UX Designer',
                            'bio' => 'The project-based learning approach helped me build a portfolio that impressed employers.',
                            'image_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'UI/UX Design',
                            'rating' => 5
                        ]
                    ];
                @endphp

                @foreach($instructors as $index => $instructor)
                    <div data-testimonial
                        class="bg-white/90 backdrop-blur-sm p-8 md:p-10 rounded-3xl shadow-lg transition-all duration-500 absolute inset-0 {{ $index === 0 ? 'opacity-100 z-10 transform translate-x-0 scale-100' : 'opacity-0 z-0 transform translate-x-4 scale-95' }}">
                        <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
                            <div class="relative">
                                <img src="{{ $instructor['image_url'] }}" alt="{{ $instructor['name'] }}"
                                    class="w-20 h-20 rounded-2xl object-cover border-4 border-blue-100 transform transition-all duration-500 hover:scale-110">
                                <div
                                    class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900">{{ $instructor['name'] }}</h3>
                                <p class="text-gray-600 font-medium">{{ $instructor['role'] }}</p>
                                <p class="text-sm text-blue-600 font-semibold">Course: {{ $instructor['course'] }}</p>
                                <div class="flex mt-2">
                                    @for($i = 0; $i < 5; $i++)
                                        <span
                                            class="text-xl transform transition-all duration-300 {{ $i < $instructor['rating'] ? 'text-yellow-400 hover:scale-125' : 'text-gray-300' }}">
                                            ★
                                        </span>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p
                            class="text-lg text-gray-700 italic leading-relaxed transform transition-all duration-500 hover:translate-x-2">
                            "{{ $instructor['bio'] }}"
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-8 pt-8">
                <div id="testimonial-dots" class="flex"></div>
            </div>
        </div>
    </section>

    {{-- ================= CONTACT FORM SECTION ================= --}}

    {{-- <section data-animate class="py-20 bg-white/80 backdrop-blur-sm px-4 md:px-8">--}}
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Get In <span class="text-blue-900 animate-pulse">Touch</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>

            {{-- SUCCESS MESSAGE --}}
            <div id="form-submitted"
                class="hidden bg-gradient-to-br from-green-50 to-teal-50 border border-green-200 text-green-800 px-6 py-8 rounded-3xl text-center shadow-lg transform transition-all duration-500 hover:scale-105">
                <div class="text-4xl mb-4 animate-bounce">🎉</div>
                <p class="font-bold text-xl mb-2">Thank you for your message!</p>
                <p class="text-lg">We'll get back to you within 24 hours.</p>
            </div>

            {{-- Contact form removed (commented out). --}}

            {{-- ================= CTA SECTION ================= --}}
            <section
                class="w-full relative overflow-hidden py-32 bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 text-white">
                {{-- Overlay dark layer --}}
                <div class="absolute inset-0 bg-black/20"></div>

                {{-- Decorative blurred circles --}}
                <div class="absolute top-0 -left-16 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl animate-pulse-slow">
                </div>
                <div
                    class="absolute bottom-0 -right-16 w-96 h-96 bg-purple-600/30 rounded-full blur-3xl animate-pulse-slow delay-1000">
                </div>

                {{-- Content wrapper (centered & responsive) --}}
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    {{-- Heading --}}
                    <h2
                        class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent font-cinzel">
                        Ready to Start Your Learning Journey?
                    </h2>

                    {{-- Subheading --}}
                    <p class="text-lg sm:text-xl md:text-2xl mb-10 max-w-3xl mx-auto text-blue-100/90">
                        Join thousands of students who have transformed their careers with our expert-led courses.
                    </p>

                    {{-- Buttons --}}
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-5">
                        <button
                            class="group relative bg-yellow-400 text-blue-900 font-bold py-4 px-10 rounded-xl shadow-xl hover:bg-yellow-300 hover:-translate-y-1 transform transition-all duration-300">
                            Get Started Now
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-yellow-300 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        </button>

                        <button
                            class="group relative border-2 border-white text-white font-semibold py-4 px-10 rounded-xl backdrop-blur-sm hover:bg-white/20 transition-all duration-300">
                            Contact Us
                            <span
                                class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        </button>
                    </div>
                </div>


            </section>





@endsection

        @section('extra-js')
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    /* -------------------- Hero Carousel -------------------- */
                    /* -------------------- Redesigned Hero Carousel -------------------- */
                    let currentSlide = 0;
                    const heroSlides = document.querySelectorAll('.hero-slide');
                    const heroContents = document.querySelectorAll('.hero-content');
                    const dotBtns = document.querySelectorAll('.carousel-dot-btn');

                    console.log('Hero slides found:', heroSlides.length);
                    console.log('Hero contents found:', heroContents.length);
                    console.log('Dot buttons found:', dotBtns.length);

                    if (heroSlides.length > 0) {
                        function updateHero(index) {
                            console.log('Updating to slide:', index);

                            // Update Backgrounds
                            heroSlides.forEach((slide, i) => {
                                if (i === index) {
                                    slide.classList.remove('opacity-0');
                                    slide.classList.add('opacity-100');
                                } else {
                                    slide.classList.remove('opacity-100');
                                    slide.classList.add('opacity-0');
                                }
                            });

                            // Update Content
                            heroContents.forEach((content, i) => {
                                if (i === index) {
                                    content.classList.remove('hidden');
                                    content.classList.add('block');
                                } else {
                                    content.classList.remove('block');
                                    content.classList.add('hidden');
                                }
                            });

                            // Update Dots - using style instead of Tailwind arbitrary values
                            dotBtns.forEach((dot, i) => {
                                if (i === index) {
                                    dot.style.backgroundColor = '#FF9800';
                                } else {
                                    dot.style.backgroundColor = 'rgba(255, 255, 255, 0.4)';
                                }
                            });

                            currentSlide = index;
                        }

                        // Dot click events
                        dotBtns.forEach((btn, i) => {
                            btn.onclick = () => {
                                console.log('Dot clicked:', i);
                                updateHero(i);
                                resetInterval();
                            };
                        });

                        // Auto rotation
                        let autoInterval = setInterval(() => {
                            let next = (currentSlide + 1) % heroSlides.length;
                            updateHero(next);
                        }, 6000);

                        function resetInterval() {
                            clearInterval(autoInterval);
                            autoInterval = setInterval(() => {
                                let next = (currentSlide + 1) % heroSlides.length;
                                updateHero(next);
                            }, 6000);
                        }

                        // Initialize first slide
                        updateHero(0);
                    }

                    /* -------------------- Testimonial Carousel -------------------- */
                    let currentTestimonial = 0;
                    const testimonials = document.querySelectorAll('[data-testimonial]');
                    const testimonialDots = document.getElementById('testimonial-dots');

                    if (testimonials.length > 0 && testimonialDots) {
                        // Create dots for testimonials
                        testimonials.forEach((_, i) => {
                            const dot = document.createElement('button');
                            dot.className = `w-4 h-4 rounded-full mx-2 transition-all duration-300 transform hover:scale-125 ${i === 0 ? 'bg-blue-900 scale-125 shadow-lg' : 'bg-gray-300 hover:bg-gray-400'}`;
                            dot.setAttribute('aria-label', `View testimonial ${i + 1}`);
                            dot.onclick = () => {
                                currentTestimonial = i;
                                updateTestimonials();
                                clearInterval(testimonialInterval);
                            };
                            testimonialDots.appendChild(dot);
                        });

                        document.addEventListener("DOMContentLoaded", () => {
                            const slides = document.querySelectorAll(".hero-slide");
                            let current = 0;

                            if (slides.length <= 1) return;

                            setInterval(() => {
                                slides[current].classList.remove("opacity-100");
                                slides[current].classList.add("opacity-0");

                                current = (current + 1) % slides.length;

                                slides[current].classList.remove("opacity-0");
                                slides[current].classList.add("opacity-100");
                            }, 5000); // change slide every 5 seconds
                        });

                        function updateTestimonials() {
                            testimonials.forEach((testimonial, i) => {
                                if (i === currentTestimonial) {
                                    testimonial.classList.remove('opacity-0', 'z-0', 'translate-x-4', 'scale-95');
                                    testimonial.classList.add('opacity-100', 'z-10', 'translate-x-0', 'scale-100');
                                } else {
                                    testimonial.classList.remove('opacity-100', 'z-10', 'translate-x-0', 'scale-100');
                                    testimonial.classList.add('opacity-0', 'z-0', 'translate-x-4', 'scale-95');
                                }
                            });

                            testimonialDots.querySelectorAll('button').forEach((dot, i) => {
                                if (i === currentTestimonial) {
                                    dot.classList.add('bg-blue-900', 'scale-125', 'shadow-lg');
                                    dot.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                                } else {
                                    dot.classList.remove('bg-blue-900', 'scale-125', 'shadow-lg');
                                    dot.classList.add('bg-gray-300', 'hover:bg-gray-400');
                                }
                            });
                        }

                        // Auto rotate testimonials
                        const testimonialInterval = setInterval(() => {
                            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                            updateTestimonials();
                        }, 5000);
                    }

                    /* -------------------- Intersection Observer -------------------- */
                    const observer = new IntersectionObserver(
                        (entries) => {
                            entries.forEach((entry) => {
                                if (entry.isIntersecting) {
                                    entry.target.classList.add('animate-fade-in-up');
                                }
                            });
                        }, {
                        threshold: 0.1
                    }
                    );

                    document.querySelectorAll('[data-animate]').forEach((el) => {
                        observer.observe(el);
                    });

                    /* -------------------- Contact Form -------------------- */
                    const contactForm = document.getElementById('contact-form');
                    const formError = document.getElementById('form-error');
                    const formSubmitted = document.getElementById('form-submitted');

                    if (contactForm) {
                        contactForm.addEventListener('submit', async function (e) {
                            e.preventDefault();

                            const formData = new FormData(this);
                            const name = formData.get('name');
                            const email = formData.get('email');
                            const message = formData.get('message');

                            // Validation
                            if (!name || !email || !message) {
                                showError('Please fill in all fields');
                                return;
                            }

                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(email)) {
                                showError('Please enter a valid email address');
                                return;
                            }

                            try {
                                // Simulate API call
                                await new Promise(resolve => setTimeout(resolve, 1500));

                                // Show success
                                contactForm.style.display = 'none';
                                formSubmitted.style.display = 'block';

                                // Reset form
                                contactForm.reset();

                            } catch (error) {
                                showError('Failed to submit form. Please try again.');
                            }
                        });
                    }

                    function showError(message) {
                        if (formError) {
                            formError.textContent = message;
                            formError.classList.remove('hidden');
                            formError.classList.add('animate-shake');

                            setTimeout(() => {
                                formError.classList.remove('animate-shake');
                            }, 500);
                        }
                    }

                    /* -------------------- Video Player Control -------------------- */
                    window.toggleVideo = function () {
                        const video = document.getElementById('welcome-video');
                        const overlay = document.getElementById('play-button-overlay');
                        const icon = document.getElementById('play-icon');

                        if (video.paused) {
                            video.play();
                            overlay.style.opacity = '0';
                            overlay.style.pointerEvents = 'none';
                            icon.classList.remove('fa-play');
                            icon.classList.add('fa-pause');
                        } else {
                            video.pause();
                            overlay.style.opacity = '1';
                            overlay.style.pointerEvents = 'auto';
                            icon.classList.remove('fa-pause');
                            icon.classList.add('fa-play');
                        }
                    };

                    // Show overlay when video ends
                    const welcomeVideo = document.getElementById('welcome-video');
                    if (welcomeVideo) {
                        welcomeVideo.addEventListener('ended', function () {
                            const overlay = document.getElementById('play-button-overlay');
                            const icon = document.getElementById('play-icon');
                            overlay.style.opacity = '1';
                            overlay.style.pointerEvents = 'auto';
                            icon.classList.remove('fa-pause');
                            icon.classList.add('fa-play');
                        });
                    }
                });


            </script>
        @endsection