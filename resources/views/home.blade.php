@extends('layouts.app')

@section('title', 'Home - CAEDA')

@section('extra-css')
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }
        .animate-fade-in-up { animation: fade-in-up .8s ease-out forwards; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-shake { animation: shake .5s ease-in-out; }
        .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
        .font-cinzel { font-family: 'Cinzel', serif; }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-20 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 min-h-screen flex items-center">

    <div class="absolute inset-0 bg-black/10 -z-10"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse-slow delay-1000"></div>

    <div class="max-w-7xl mx-auto w-full relative z-10">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-12">

            {{-- LEFT SIDE --}}
            <div class="lg:w-1/2 text-white">
                <div class="mb-8" data-animate>
                    <h2 class="text-xl md:text-2xl text-blue-200">Create Your Future with</h2>

                    <h3 class="text-5xl md:text-7xl lg:text-8xl font-bold leading-tight mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent animate-gradient-x font-cinzel">
                        Caeda
                    </h3>

                    <div class="flex items-center gap-4 mb-8">
                        <div class="w-16 h-1 bg-yellow-400 animate-pulse"></div>
                        <span class="text-lg md:text-xl font-semibold text-red-500 animate-bounce">U.S</span>
                    </div>
                </div>

                {{-- FACULTIES --}}
                <div class="space-y-4 mb-8" data-animate>
                    <h3 class="text-2xl md:text-3xl font-bold mb-6 text-white font-cinzel">University Faculties</h3>

                    @php
                        $faculties = [
                            "Faculty of Information Technology & Computer Science",
                            "Faculty of Philosophy, Religion and Law",
                            "Faculty of Educational Sciences and Literature",
                            "Faculty of Pud Sangakut and Foreign Language"
                        ];
                    @endphp

                    @foreach($faculties as $index => $faculty)
                        <div class="flex items-center gap-3 text-lg md:text-xl group cursor-pointer hover:translate-x-2 transition-all"
                             style="animation-delay: {{ $index * 200 }}ms">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:scale-150 transition"></div>
                            <span class="text-blue-100 group-hover:text-white">{{ $faculty }}</span>
                        </div>
                    @endforeach
                </div>

                {{-- CTA BUTTONS --}}
                <div class="flex flex-col sm:flex-row gap-4 mt-12" data-animate>
                    <button class="group bg-yellow-400 text-blue-900 hover:bg-yellow-300 font-bold py-4 px-8 rounded-xl shadow-lg hover:-translate-y-1 transition-all">
                        Apply Now
                    </button>

                    <button class="group border-2 border-white text-white hover:bg-white/10 font-semibold py-4 px-8 rounded-xl backdrop-blur-sm transition-all">
                        Learn More
                    </button>
                </div>
            </div>

            {{-- RIGHT SIDE CAROUSEL --}}
            <div class="lg:w-1/2 relative">
                <div class="relative overflow-hidden rounded-3xl shadow-2xl w-full border-4 border-white/20 backdrop-blur-sm" style="min-height: 500px">

                    <div id="hero-carousel">
                        @foreach([
                            ['src' => '/assets/ASEAN-01-01.png', 'alt' => 'Campus 1'],
                            ['src' => '/assets/stu-one.jpg', 'alt' => 'Campus 2'],
                            ['src' => '/assets/stu-tow.png', 'alt' => 'Campus 3']
                        ] as $index => $image)
                            <img src="{{ $image['src'] }}" alt="{{ $image['alt'] }}"
                                 class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 {{ $index === 0 ? 'opacity-100' : 'opacity-0' }}"
                                 onerror="this.src='/assets/defaultcourse.jpg'">
                        @endforeach
                    </div>

                    {{-- NAV BUTTONS --}}
                    <button id="prev-slide" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-lg hover:bg-white hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                    </button>

                    <button id="next-slide" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-lg hover:bg-white hover:scale-110 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>

                    {{-- DOTS --}}
                    <div id="hero-dots" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2"></div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ================= STATS SECTION ================= --}}
<section data-animate class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 border-y border-gray-200/50 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @php
                $stats = [
                    ['number' => '10K+', 'label' => 'Students Enrolled', 'color' => 'from-blue-500 to-cyan-500'],
                    ['number' => '200+', 'label' => 'Expert Instructors', 'color' => 'from-purple-500 to-pink-500'],
                    ['number' => '500+', 'label' => 'Courses Available', 'color' => 'from-green-500 to-teal-500'],
                    ['number' => '95%', 'label' => 'Satisfaction Rate', 'color' => 'from-orange-500 to-red-500']
                ];
            @endphp
            
            @foreach($stats as $index => $stat)
                <div class="text-center group transform transition-all duration-500 hover:scale-105"
                     style="animation-delay: {{ $index * 150 }}ms">
                    <div class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r {{ $stat['color'] }} bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
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

{{-- ================= ABOUT US SECTION ================= --}}
<section data-animate class="py-20 px-4 md:px-8 bg-white/80 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col lg:flex-row items-start gap-12">
            <div class="lg:w-1/2">
                <div class="mb-8">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 font-cinzel">
                        Welcome to <span class="text-blue-900 animate-pulse">CAEDA</span>
                    </h2>
                    
                    <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                        <p class="text-gray-800 transform transition-all duration-500 hover:translate-x-2">
                            The Cambodia-ASEAN Educational Development Association is dedicated to building
                            high-quality human capital for Cambodia and the region.
                        </p>
                        
                        <p class="text-gray-800 transform transition-all duration-500 hover:translate-x-2 delay-100">
                            Guided by the vision of empowering youth with essential 21st-century skills, 
                            we focus on strengthening foreign languages, digital competency, leadership, 
                            and innovation.
                        </p>
                        
                        <p class="text-gray-800 transform transition-all duration-500 hover:translate-x-2 delay-200">
                            By bridging academic knowledge with real labor-market demands, CAEDA strives 
                            to prepare future leaders who can contribute to national development and ASEAN 
                            integration with confidence and purpose.
                        </p>
                    </div>
                </div>

                {{-- SIGNATURE SECTION --}}
                <div class="border-t-2 border-blue-200 pt-8 mt-8 transform transition-all duration-500 hover:shadow-lg rounded-xl p-6">
                    <div class="text-gray-900 space-y-2">
                        <p class="text-xl font-semibold text-blue-900">
                            Cambodia-ASEAN Educational Development Association,
                        </p>
                        <p class="text-lg text-gray-700">H.T.Samdolfe (Presh Abilitar Sujazhala</p>
                        <p class="text-lg text-gray-700">Mahasarajahasajah (Presh BOUR RXY)</p>
                        <p class="text-lg text-gray-700">Samdolfe (Presh Mahasarajahasajah) of</p>
                        <p class="text-lg text-gray-700">Dharmayatibiantilaya of</p>
                    </div>
                </div>
            </div>

            {{-- RIGHT IMAGE --}}
            <div class="lg:w-1/2 relative">
                <div class="relative transform transition-all duration-500 hover:scale-105">
                    <img src="https://st3.depositphotos.com/3049830/15926/i/450/depositphotos_159267468-stock-photo-group-of-asian-students-in.jpg"
                         alt="Caeda Campus"
                         class="rounded-3xl shadow-2xl w-full h-96 object-cover border-4 border-white shadow-lg backdrop-blur-sm">
                    {{-- FLOATING BADGES --}}
                    <div class="absolute -top-4 -right-4 bg-yellow-400 text-blue-900 px-4 py-2 rounded-xl font-bold shadow-lg animate-bounce">
                        Excellence
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-red-400 text-white px-4 py-2 rounded-xl font-bold shadow-lg animate-bounce delay-500">
                        Quality
                    </div>
                </div>

                {{-- ENHANCED STATS --}}
                <div class="grid grid-cols-2 gap-6 mt-12">
                    <div class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div class="text-3xl font-bold text-blue-900 mb-2">50+</div>
                        <div class="text-gray-700 font-medium">Years of Excellence</div>
                    </div>
                    <div class="text-center p-6 bg-gradient-to-br from-green-50 to-green-100 rounded-2xl border border-green-200 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                        <div class="text-3xl font-bold text-green-900 mb-2">10K+</div>
                        <div class="text-gray-700 font-medium">Students Graduated</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
            @php
                $courses = [
                    [
                        'id' => 1,
                        'title' => 'Web Development',
                        'description' => 'Learn modern web development with React, Node.js and more',
                        'duration' => '12 weeks',
                        'level' => 'Intermediate',
                        'students' => 1245,
                        'rating' => 4.8,
                        'image' => 'https://images.unsplash.com/photo-1581276879432-15e50529f34b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'category' => 'Programming',
                        'price' => 79.99,
                        'instructor' => 'John Smith'
                    ],
                    [
                        'id' => 2,
                        'title' => 'Data Science',
                        'description' => 'Master data analysis, visualization and machine learning',
                        'duration' => '16 weeks',
                        'level' => 'Advanced',
                        'students' => 895,
                        'rating' => 4.7,
                        'image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'category' => 'Data Science',
                        'price' => 89.99,
                        'instructor' => 'Maria Garcia'
                    ],
                    [
                        'id' => 3,
                        'title' => 'UI/UX Design',
                        'description' => 'Create beautiful and functional user interfaces',
                        'duration' => '10 weeks',
                        'level' => 'Beginner',
                        'students' => 1567,
                        'rating' => 4.9,
                        'image' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'category' => 'Design',
                        'price' => 69.99,
                        'instructor' => 'David Wilson'
                    ],
                    [
                        'id' => 4,
                        'title' => 'Mobile Development',
                        'description' => 'Build iOS and Android apps with React Native',
                        'duration' => '14 weeks',
                        'level' => 'Intermediate',
                        'students' => 1023,
                        'rating' => 4.6,
                        'image' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                        'category' => 'Programming',
                        'price' => 84.99,
                        'instructor' => 'Sarah Johnson'
                    ]
                ];
            @endphp
            
            @foreach($courses as $course)
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 group">
                    <div class="relative overflow-hidden">
                        <img src="{{ $course['image'] }}" 
                             alt="{{ $course['title'] }}"
                             class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">
                        <div class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                            Popular
                        </div>
                    </div>
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                    {{ $course['category'] }}
                                </span>
                                <h3 class="text-xl font-bold text-gray-900 mt-2 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $course['title'] }}
                                </h3>
                            </div>
                            <div class="text-2xl font-bold text-green-600">
                                ${{ number_format($course['price'], 2) }}
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">
                            {{ $course['description'] }}
                        </p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                {{ $course['rating'] }}
                            </span>
                            <span>{{ number_format($course['students']) }} students</span>
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <span class="text-gray-700 font-medium">{{ $course['duration'] }}</span>
                            <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
                                {{ $course['level'] }}
                            </span>
                        </div>
                        
                        <div class="mt-6">
                            <button class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-semibold py-3 rounded-xl transition-all duration-300 transform group-hover:-translate-y-1">
                                Enroll Now
                            </button>
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
            @php
                $features = [
                    [
                        'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                        'title' => 'Expert Instructors',
                        'description' => 'Learn from industry professionals with years of experience in their fields',
                        'color' => 'from-blue-500 to-cyan-500'
                    ],
                    [
                        'icon' => 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                        'title' => 'Interactive Learning',
                        'description' => 'Engage with interactive content, quizzes, and hands-on projects',
                        'color' => 'from-purple-500 to-pink-500'
                    ],
                    [
                        'icon' => 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9',
                        'title' => 'Lifetime Access',
                        'description' => 'Get lifetime access to course materials and future updates',
                        'color' => 'from-green-500 to-teal-500'
                    ]
                ];
            @endphp
            
            @foreach($features as $index => $feature)
                <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg text-center hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100/50"
                     style="animation-delay: {{ $index * 200 }}ms">
                    <div class="w-20 h-20 bg-gradient-to-br {{ $feature['color'] }} rounded-3xl flex items-center justify-center mx-auto mb-6 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                        <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature['icon'] }}"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-800 transition-colors duration-300">
                        {{ $feature['title'] }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                        {{ $feature['description'] }}
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
                            <img src="{{ $instructor['image_url'] }}"
                                 alt="{{ $instructor['name'] }}"
                                 class="w-20 h-20 rounded-2xl object-cover border-4 border-blue-100 transform transition-all duration-500 hover:scale-110">
                            <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $instructor['name'] }}</h3>
                            <p class="text-gray-600 font-medium">{{ $instructor['role'] }}</p>
                            <p class="text-sm text-blue-600 font-semibold">Course: {{ $instructor['course'] }}</p>
                            <div class="flex mt-2">
                                @for($i = 0; $i < 5; $i++)
                                    <span class="text-xl transform transition-all duration-300 {{ $i < $instructor['rating'] ? 'text-yellow-400 hover:scale-125' : 'text-gray-300' }}">
                                        ★
                                    </span>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <p class="text-lg text-gray-700 italic leading-relaxed transform transition-all duration-500 hover:translate-x-2">
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

<!-- <section data-animate class="py-20 bg-white/80 backdrop-blur-sm px-4 md:px-8">
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
        <div id="form-submitted" class="hidden bg-gradient-to-br from-green-50 to-teal-50 border border-green-200 text-green-800 px-6 py-8 rounded-3xl text-center shadow-lg transform transition-all duration-500 hover:scale-105">
            <div class="text-4xl mb-4 animate-bounce">🎉</div>
            <p class="font-bold text-xl mb-2">Thank you for your message!</p>
            <p class="text-lg">We'll get back to you within 24 hours.</p>
        </div>

        {{-- CONTACT FORM --}}
        <form id="contact-form"
              class="bg-gradient-to-br from-blue-50/50 to-purple-50/50 p-8 rounded-3xl shadow-lg border border-blue-100/50 backdrop-blur-sm transform transition-all duration-500 hover:shadow-xl">
            @csrf
            
            {{-- ERROR MESSAGE --}}
            <div id="form-error" class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl mb-6 animate-shake"></div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div class="transform transition-all duration-300 hover:-translate-y-1">
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                        Full Name
                    </label>
                    <input type="text"
                           id="name"
                           name="name"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                           placeholder="Your name"
                           required>
                </div>
                <div class="transform transition-all duration-300 hover:-translate-y-1">
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email Address
                    </label>
                    <input type="email"
                           id="email"
                           name="email"
                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                           placeholder="Your email address"
                           required>
                </div>
            </div>

            <div class="mb-6 transform transition-all duration-300 hover:-translate-y-1">
                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                    Message
                </label>
                <textarea id="message"
                          name="message"
                          rows="5"
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                          placeholder="Your message"
                          required></textarea>
            </div>

            <button type="submit"
                    class="w-full bg-gradient-to-r from-blue-900 to-purple-900 hover:from-blue-800 hover:to-purple-800 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1">
                Send Message
            </button>
        </form>
    </div>
</section> -->

{{-- ================= CTA SECTION ================= --}}
<section class="py-20 bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
    
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center relative z-10">
        <h2 class="text-4xl md:text-5xl font-bold mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent font-cinzel">
            Ready to Start Your Learning Journey?
        </h2>
        <p class="text-xl md:text-2xl mb-8 max-w-3xl mx-auto text-blue-100">
            Join thousands of students who have transformed their careers with our courses
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <button class="group bg-yellow-400 text-blue-900 hover:bg-yellow-300 font-bold py-4 px-8 rounded-xl shadow-lg hover:-translate-y-1 transition-all">
                Get Started Now
            </button>
            <button class="group border-2 border-white text-white hover:bg-white/10 font-semibold py-4 px-8 rounded-xl backdrop-blur-sm transition-all">
                Contact Us
            </button>
        </div>
    </div>
</section>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    /* -------------------- Hero Carousel -------------------- */
    let currentSlide = 0;
    const heroCarousel = document.getElementById('hero-carousel');
    const slides = heroCarousel.querySelectorAll('img');
    const dotsContainer = document.getElementById('hero-dots');

    // Create dots
    slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.className = "w-3 h-3 rounded-full transition-all duration-300 " + (i === 0 ? "bg-white shadow-lg scale-125" : "bg-white/50 hover:bg-white/75");
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.onclick = () => { 
            currentSlide = i; 
            updateHeroCarousel(); 
        };
        dotsContainer.appendChild(dot);
    });

    function updateHeroCarousel() {
        slides.forEach((img, i) => {
            img.classList.toggle('opacity-100', i === currentSlide);
            img.classList.toggle('opacity-0', i !== currentSlide);
        });
        
        dotsContainer.querySelectorAll('button').forEach((dot, i) => {
            if (i === currentSlide) {
                dot.className = "w-3 h-3 rounded-full transition-all duration-300 bg-white shadow-lg scale-125";
            } else {
                dot.className = "w-3 h-3 rounded-full transition-all duration-300 bg-white/50 hover:bg-white/75";
            }
        });
    }

    // Auto rotate
    const heroInterval = setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        updateHeroCarousel();
    }, 5000);

    // Manual controls
    document.getElementById('prev-slide').onclick = () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        updateHeroCarousel();
        clearInterval(heroInterval);
    };

    document.getElementById('next-slide').onclick = () => {
        currentSlide = (currentSlide + 1) % slides.length;
        updateHeroCarousel();
        clearInterval(heroInterval);
    };

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
        },
        { threshold: 0.1 }
    );

    document.querySelectorAll('[data-animate]').forEach((el) => {
        observer.observe(el);
    });

    /* -------------------- Contact Form -------------------- */
    const contactForm = document.getElementById('contact-form');
    const formError = document.getElementById('form-error');
    const formSubmitted = document.getElementById('form-submitted');

    if (contactForm) {
        contactForm.addEventListener('submit', async function(e) {
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
});
</script>
@endsection