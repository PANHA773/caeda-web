@extends('layouts.app')

@section('title', 'Events - CAEDA')

@section('extra-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(1deg);
            }
        }

        @keyframes pulse-glow {

            0%,
            100% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.5);
            }

            50% {
                box-shadow: 0 0 40px rgba(59, 130, 246, 0.8);
            }
        }

        @keyframes slide-in-left {
            from {
                transform: translateX(-50px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slide-in-right {
            from {
                transform: translateX(50px);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes rotate-3d {
            0% {
                transform: perspective(1000px) rotateY(0deg);
            }

            100% {
                transform: perspective(1000px) rotateY(360deg);
            }
        }

        @keyframes bounce-subtle {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
            background-size: 200% 200%;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .animate-pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .animate-slide-in-left {
            animation: slide-in-left 0.8s ease-out forwards;
        }

        .animate-slide-in-right {
            animation: slide-in-right 0.8s ease-out forwards;
        }

        .animate-rotate-3d {
            animation: rotate-3d 20s linear infinite;
        }

        .animate-bounce-subtle {
            animation: bounce-subtle 2s ease-in-out infinite;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .event-card-gradient {
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

        .calendar-day-active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
        }

        .timeline-dot {
            position: relative;
            z-index: 2;
        }

        .timeline-dot::after {
            content: '';
            position: absolute;
            width: 12px;
            height: 12px;
            background: #3b82f6;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
        }

        .timeline-line {
            position: absolute;
            width: 2px;
            background: linear-gradient(to bottom, #3b82f6, #8b5cf6, #ec4899);
            top: 0;
            bottom: 0;
            left: 24px;
        }

        .event-image-hover {
            transition: all 0.5s ease;
            filter: brightness(0.9);
        }

        .event-image-hover:hover {
            filter: brightness(1.1) contrast(1.1);
            transform: scale(1.05);
        }

        .countdown-number {
            font-feature-settings: "tnum";
            font-variant-numeric: tabular-nums;
        }
    </style>
@endsection

@section('content')

    {{-- ================= HERO SECTION ================= --}}
    <section
        class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-black/40"></div>
            <div
                class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20">
            </div>
        </div>

        {{-- Animated floating elements --}}
        <div class="absolute top-10 left-10 w-20 h-20 bg-blue-500/20 rounded-full animate-float"></div>
        <div class="absolute bottom-20 right-20 w-32 h-32 bg-purple-500/20 rounded-full animate-float"
            style="animation-delay: 1s"></div>
        <div class="absolute top-1/3 right-1/4 w-16 h-16 bg-pink-500/20 rounded-full animate-float"
            style="animation-delay: 2s"></div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center">
                <div
                    class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-8 animate-slide-in-left">
                    <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                    <span class="text-white font-semibold text-sm md:text-base">Upcoming Events • Join Our Community</span>
                </div>

                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-white font-cinzel">
                    Discover <span class="text-gradient">Inspiring</span>
                    <span class="block">Events & <span
                            class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent animate-gradient-x">Conferences</span></span>
                </h1>

                <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                    Join industry leaders, innovators, and peers at our premier events designed to educate, inspire, and
                    connect.
                </p>

                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-in-right">
                    <button onclick="scrollToEvents()"
                        class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                        <span>Explore Events</span>
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </button>
                    <button
                        class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Add to Calendar</span>
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= FEATURED EVENT COUNTDOWN ================= --}}
    @php
        $featuredEvent = \App\Models\FeaturedEvent::where('is_active', true)
            ->orderBy('start_date')
            ->first();
    @endphp

    @if($featuredEvent)
        <section class="py-16 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30">
            <div class="max-w-7xl mx-auto px-4 md:px-8">
                <div class="glass-effect rounded-3xl p-8 md:p-12 shadow-2xl">
                    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

                        {{-- Event Info --}}
                        <div class="lg:w-1/2">
                            <div
                                class="inline-block bg-gradient-to-r from-blue-500 to-purple-500 text-white text-sm font-bold px-4 py-2 rounded-full mb-6 animate-pulse-glow">
                                🔥 FEATURED EVENT
                            </div>

                            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                                {!! $featuredEvent->title !!}
                            </h2>

                            <p class="text-gray-600 mb-6 text-lg">
                                {!! $featuredEvent->description !!}
                            </p>

                            <div class="flex flex-wrap gap-4 mb-8">
                                @if($featuredEvent->location)
                                    <div class="flex items-center text-gray-700">
                                        <svg class="w-5 h-5 text-blue-500 mr-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>
                                        <span>{{ $featuredEvent->location }}</span>
                                    </div>
                                @endif
                                <div class="flex items-center text-gray-700">
                                    <svg class="w-5 h-5 text-purple-500 mr-2" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span>{{ $featuredEvent->start_date->format('M d, Y') }}
                                        @if($featuredEvent->start_time)
                                            • {{ \Carbon\Carbon::parse($featuredEvent->start_time)->format('h:i A') }}
                                        @endif
                                    </span>
                                </div>
                            </div>

                            <div class="flex flex-wrap gap-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center text-white font-bold mr-3">
                                        {{ $featuredEvent->speakers_count }}+
                                    </div>
                                    <span class="text-gray-700">Speakers</span>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center text-white font-bold mr-3">
                                        {{ $featuredEvent->sessions_count }}+
                                    </div>
                                    <span class="text-gray-700">Sessions</span>
                                </div>
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center text-white font-bold mr-3">
                                        {{ $featuredEvent->attendees_count }}+
                                    </div>
                                    <span class="text-gray-700">Attendees</span>
                                </div>
                            </div>
                        </div>

                        {{-- Countdown Timer --}}
                        <div class="lg:w-1/2">
                            <div class="bg-gradient-to-br from-blue-900 to-purple-900 rounded-2xl p-8 text-center shadow-2xl">
                                <h3 class="text-white text-2xl font-bold mb-6">Event Starts In</h3>

                                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                                        <div id="countdown-days"
                                            class="text-4xl md:text-5xl font-bold text-white countdown-number">00</div>
                                        <div class="text-blue-200 text-sm mt-2">Days</div>
                                    </div>
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                                        <div id="countdown-hours"
                                            class="text-4xl md:text-5xl font-bold text-white countdown-number">00</div>
                                        <div class="text-blue-200 text-sm mt-2">Hours</div>
                                    </div>
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                                        <div id="countdown-minutes"
                                            class="text-4xl md:text-5xl font-bold text-white countdown-number">00</div>
                                        <div class="text-blue-200 text-sm mt-2">Minutes</div>
                                    </div>
                                    <div class="bg-white/10 backdrop-blur-sm rounded-xl p-4">
                                        <div id="countdown-seconds"
                                            class="text-4xl md:text-5xl font-bold text-white countdown-number">00</div>
                                        <div class="text-blue-200 text-sm mt-2">Seconds</div>
                                    </div>
                                </div>

                                <button
                                    class="w-full bg-gradient-to-r from-cyan-400 to-blue-400 hover:from-cyan-500 hover:to-blue-500 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                                    Register Now - Early Bird 30% OFF
                                </button>

                                <p class="text-blue-200 text-sm mt-4">Limited seats available • Price increases in <span
                                        class="font-bold" id="countdown-price">30</span> days</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    @endif


    {{-- ================= UPCOMING EVENTS ================= --}}
    <section id="upcoming-events" class="py-20 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Upcoming <span class="text-gradient">Events</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Discover our curated selection of upcoming conferences, workshops, and networking events
                </p>
            </div>

            {{-- EVENT FILTERS --}}
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button
                    class="event-filter active bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                    data-filter="all">
                    All Events
                </button>
                <button
                    class="event-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                    data-filter="conference">
                    <i class="fas fa-users mr-2"></i> Conferences
                </button>
                <button
                    class="event-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                    data-filter="workshop">
                    <i class="fas fa-laptop-code mr-2"></i> Workshops
                </button>
                <button
                    class="event-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                    data-filter="networking">
                    <i class="fas fa-handshake mr-2"></i> Networking
                </button>
                <button
                    class="event-filter bg-gray-100 hover:bg-gray-200 text-gray-800 px-6 py-3 rounded-full font-medium transition-all duration-300 hover:shadow-lg"
                    data-filter="webinar">
                    <i class="fas fa-video mr-2"></i> Webinars
                </button>
            </div>

            {{-- EVENTS GRID --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $index => $event)
                        <div class="event-card bg-white rounded-3xl overflow-hidden shadow-xl hover-scale event-card-gradient animate-fade-in-up"
                            data-type="{{ $event['type'] }}" style="animation-delay: {{ $index * 150 }}ms">
                            <div class="relative overflow-hidden h-56">
                                <img src="{{ $event->image_url }}" alt="{{ $event->title }}"
                                    class="w-full h-full object-cover event-image-hover">
                                <div class="absolute top-4 right-4">
                                    <span
                                        class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        {{ $event->tag }}
                                    </span>
                                </div>
                                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/70 to-transparent p-4">
                                    <div class="text-white font-semibold">{{ $event->date->format('M d, Y') }} • {{ $event->time }}
                                    </div>
                                    <div class="text-blue-200 text-sm">{{ $event->location }}</div>
                                </div>
                            </div>

                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div class="flex-1">
                                        <span class="text-xs font-semibold px-3 py-1 rounded-full {{ 
                                                            $event->type == 'conference' ? 'bg-blue-100 text-blue-600' :
                    ($event->type == 'workshop' ? 'bg-green-100 text-green-600' :
                        ($event->type == 'networking' ? 'bg-purple-100 text-purple-600' : 'bg-orange-100 text-orange-600')) 
                                                        }}">
                                            {{ ucfirst($event->type) }}
                                        </span>
                                        <h3 class="text-xl font-bold text-gray-900 mt-3">{{ $event->title }}</h3>
                                    </div>
                                </div>

                                <p class="text-gray-600 mb-6 leading-relaxed">
                                    {{ $event->description }}
                                </p>

                                <div class="flex items-center justify-between text-sm text-gray-500 mb-6">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-blue-500 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-8.5a6 6 0 00-9.5 3.5" />
                                        </svg>
                                        <span>{{ $event->speakers }} Speakers</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 text-green-500 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <span>{{ $event->seats }} Seats</span>
                                    </div>
                                </div>

                                <div class="flex gap-3">
                                    <button onclick="registerForEvent({{ $event->id }})"
                                        class="flex-1 bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-semibold py-3 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg"
                                        {{ $event->tag == 'Sold Out' ? 'disabled' : '' }}>
                                        {{ $event->tag == 'Sold Out' ? 'Sold Out' : 'Register Now' }}
                                    </button>
                                    <a href="{{ route('events.show', $event) }}"
                                        class="border-2 border-gray-300 hover:border-blue-500 text-gray-700 hover:text-blue-600 font-medium py-3 px-4 rounded-xl transition-all duration-300 text-center">
                                        Details
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>

            {{-- LOAD MORE BUTTON --}}
            <div class="text-center mt-12">
                <button id="load-more-events"
                    class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl">
                    Load More Events
                </button>
            </div>
        </div>
    </section>

    {{-- ================= CALENDAR ================= --}}
    <section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
        <div class="max-w-7xl mx-auto">

            {{-- HEADER --}}
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Event <span class="text-gradient">Calendar</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Plan your year with our comprehensive event calendar.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">

                {{-- CALENDAR --}}
                <div class="lg:col-span-2">
                    <div class="glass-effect rounded-3xl p-8 shadow-2xl">

                        @php
                            use Carbon\Carbon;

                            $currentDate = $currentDate ?? now();
                            $monthName = $currentDate->format('F Y');
                            $totalDays = $currentDate->daysInMonth;
                            $startDay = $currentDate->copy()->startOfMonth()->dayOfWeek;
                            $today = now()->day;
                            $weekDays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
                        @endphp

                        {{-- MONTH HEADER --}}
                        <div class="flex justify-between items-center mb-8">
                            <h3 class="text-2xl font-bold text-gray-900">{{ $monthName }}</h3>
                        </div>

                        {{-- WEEK DAYS --}}
                        <div class="grid grid-cols-7 gap-2 mb-4">
                            @foreach($weekDays as $day)
                                <div class="text-center font-semibold text-gray-500 py-2">
                                    {{ $day }}
                                </div>
                            @endforeach

                            {{-- EMPTY CELLS --}}
                            @for($i = 0; $i < $startDay; $i++)
                                <div>
                                </div>
                            @endfor

                            {{-- DAYS --}}
                            @for($day = 1; $day <= $totalDays; $day++)
                                @php
                                    $hasEvent = in_array($day, $calendarEventDays);
                                    $isToday = $day === $today;
                                @endphp

                                <div class="text-center relative">
                                    <div class="rounded-xl p-3 cursor-pointer transition-all duration-300
                                                    {{ $isToday ? 'calendar-day-active' : 'bg-white hover:bg-gray-50' }}
                                                    {{ $hasEvent ? 'border-2 border-blue-200' : '' }}">

                                        <div class="text-lg font-bold {{ $isToday ? 'text-white' : 'text-gray-900' }}">
                                            {{ $day }}
                                        </div>

                                        @if($hasEvent)
                                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-blue-500 rounded-full animate-pulse">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endfor
                        </div>

                        {{-- LEGEND --}}
                        <div class="flex items-center justify-center mt-6">
                            <div class="flex items-center mr-6">
                                <div class="w-4 h-4 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Event Day</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-4 h-4 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">Today</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- UPCOMING EVENTS --}}
                <div class="lg:col-span-1">
                    <div class="glass-effect rounded-3xl p-8 shadow-2xl h-full">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8">
                            Upcoming This Month
                        </h3>

                        <div class="space-y-6">
                            @forelse($upcomingEvents as $event)
                                <div
                                    class="flex items-start p-4 rounded-2xl bg-gradient-to-r from-blue-50 to-purple-50 hover:from-blue-100 hover:to-purple-100 transition-all duration-300 group">
                                    <div class="text-center mr-4">
                                        <div class="text-2xl font-bold text-blue-600">{{ $event->date->format('d') }}</div>
                                        <div class="text-sm text-gray-500">{{ $event->date->format('M') }}</div>
                                    </div>

                                    <div class="flex-1">
                                        <h4 class="font-bold text-gray-900 group-hover:text-blue-600">
                                            {{ $event->title }}
                                        </h4>
                                        <div class="flex items-center text-sm text-gray-600 mt-1">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $event->formatted_time }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center">No events this month</p>
                            @endforelse
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>





    {{-- ================= SPEAKERS SECTION ================= --}}
    <section class="py-20 px-4 md:px-8 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Featured <span class="text-gradient">Speakers</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Learn from industry leaders, innovators, and experts who are shaping the future
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($speakers as $index => $speaker)
                    @php
                        // Decode JSON social links if stored as JSON in DB
                        $socialLinks = is_array($speaker->social) ? $speaker->social : json_decode($speaker->social, true);
                    @endphp

                    <div class="group text-center animate-fade-in-up" style="animation-delay: {{ $index * 200 }}ms">
                        <div class="relative mb-6">
                            <div
                                class="relative w-40 h-40 mx-auto rounded-full overflow-hidden border-4 border-white shadow-2xl group-hover:border-blue-300 transition-all duration-500">
                                <img src="{{ $speaker->image_url }}" alt="{{ $speaker->name }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                            </div>
                            <div
                                class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                {{ $speaker->topic }}
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $speaker->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $speaker->title }}</p>

                        <div class="flex justify-center space-x-3">
                            @if(!empty($socialLinks))
                                @foreach($socialLinks as $platform)
                                    <a href="#"
                                        class="w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 flex items-center justify-center text-gray-600 hover:text-blue-600 transition-all duration-300 hover:scale-110">
                                        <i class="fab fa-{{ $platform }}"></i>
                                    </a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('speakers.index') }}"
                    class="bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl inline-block">
                    View All Speakers
                </a>
            </div>
        </div>
    </section>



    {{-- ================= TIMELINE ================= --}}
    <section class="py-20 px-4 md:px-8 bg-gradient-to-br from-blue-50/50 to-purple-50/50">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 animate-fade-in-up">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Event <span class="text-gradient">Timeline</span>
                </h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Follow our event journey from planning to execution and beyond
                </p>
            </div>

            <div class="relative max-w-4xl mx-auto">
                {{-- Timeline line --}}
                <div class="timeline-line hidden md:block"></div>

                <div class="space-y-12">
                    @foreach($timelineEvents as $index => $event)
                                <div class="relative flex flex-col md:flex-row items-start animate-fade-in-up"
                                    style="animation-delay: {{ $index * 150 }}ms">
                                    {{-- Timeline dot --}}
                                    <div class="timeline-dot flex-shrink-0 w-12 h-12 rounded-full {{ 
                                                                $event->status == 'completed' ? 'bg-green-100 border-4 border-green-300' :
                        ($event->status == 'active' ? 'bg-blue-100 border-4 border-blue-300 animate-pulse' : 'bg-gray-100 border-4 border-gray-300') 
                                                            }} flex items-center justify-center mb-4 md:mb-0">
                                        <i class="{{ $event->icon }} {{ 
                                                                    $event->status == 'completed' ? 'text-green-600' :
                        ($event->status == 'active' ? 'text-blue-600' : 'text-gray-600') 
                                                                }}"></i>
                                    </div>

                                    {{-- Timeline content --}}
                                    <div
                                        class="md:ml-8 flex-1 bg-white rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 {{ $event->status == 'active' ? 'border-2 border-blue-300' : '' }}">
                                        <div class="flex flex-col md:flex-row md:items-center justify-between mb-3">
                                            <h3 class="text-xl font-bold text-gray-900">{{ $event->title }}</h3>
                                            <span class="text-sm font-semibold px-3 py-1 rounded-full {{ 
                                                                        $event->status == 'completed' ? 'bg-green-100 text-green-600' :
                        ($event->status == 'active' ? 'bg-blue-100 text-blue-600 animate-bounce-subtle' : 'bg-gray-100 text-gray-600') 
                                                                    }}">
                                                {{ ucfirst($event->status) }}
                                            </span>
                                        </div>
                                        <p class="text-gray-600 mb-4">{{ $event->description }}</p>
                                        <div class="text-gray-500 text-sm flex items-center">
                                            <i class="far fa-calendar mr-2"></i>
                                            {{ $event->date }}
                                        </div>
                                    </div>
                                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>



    {{-- ================= REGISTRATION CTA ================= --}}
    <section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
        <div class="absolute inset-0">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full translate-x-1/3 translate-y-1/3">
            </div>
            <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-cyan-400/10 rounded-full animate-rotate-3d"></div>
        </div>

        <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                Ready to <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">Join</span>
                Our Events?
            </h2>
            <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">
                Don't miss out on transformative learning experiences and valuable networking opportunities
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">🎯</div>
                    <h3 class="text-xl font-bold mb-3">Learn from Experts</h3>
                    <p class="text-blue-200">Industry-leading speakers sharing cutting-edge insights</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">🤝</div>
                    <h3 class="text-xl font-bold mb-3">Network & Connect</h3>
                    <p class="text-blue-200">Meet professionals and expand your business network</p>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-bold mb-3">Career Growth</h3>
                    <p class="text-blue-200">Gain skills and knowledge to advance your career</p>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button onclick="scrollToEvents()"
                    class="group bg-white text-blue-600 hover:bg-gray-50 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg">
                    <span class="flex items-center">
                        Browse All Events
                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                        </svg>
                    </span>
                </button>
                <button
                    class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                    <span class="flex items-center">
                        Get Event Updates
                        <svg class="w-5 h-5 ml-2 transform group-hover:scale-110 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </span>
                </button>
            </div>

            <p class="text-sm opacity-80 mt-8">Flexible registration options • Group discounts available • Money-back
                guarantee</p>
        </div>
    </section>

    {{-- Loading Modal --}}
    <div id="loading-modal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-3xl shadow-2xl max-w-md mx-4 text-center">
            <svg class="animate-spin mx-auto h-12 w-12 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Processing Your Request</h3>
            <p class="text-gray-600">Please wait while we register you for the event...</p>
        </div>
    </div>

@endsection

@section('extra-js')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Set event date for countdown (Dec 15, 2024)
            const eventDate = new Date('Dec 15, 2024 09:00:00').getTime();

            // Countdown function
            function updateCountdown() {
                const now = new Date().getTime();
                const timeLeft = eventDate - now;

                if (timeLeft > 0) {
                    const days = Math.floor(timeLeft / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((timeLeft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((timeLeft % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((timeLeft % (1000 * 60)) / 1000);

                    // Update display
                    document.getElementById('countdown-days').textContent = days.toString().padStart(2, '0');
                    document.getElementById('countdown-hours').textContent = hours.toString().padStart(2, '0');
                    document.getElementById('countdown-minutes').textContent = minutes.toString().padStart(2, '0');
                    document.getElementById('countdown-seconds').textContent = seconds.toString().padStart(2, '0');

                    // Update price increase countdown
                    const priceIncreaseDate = new Date('Nov 30, 2024').getTime();
                    const daysToPriceIncrease = Math.ceil((priceIncreaseDate - now) / (1000 * 60 * 60 * 24));
                    document.getElementById('countdown-price').textContent = Math.max(0, daysToPriceIncrease);
                }
            }

            // Initial call and set interval
            updateCountdown();
            setInterval(updateCountdown, 1000);

            // Event filtering
            const eventFilters = document.querySelectorAll('.event-filter');
            const eventCards = document.querySelectorAll('.event-card');

            eventFilters.forEach(filter => {
                filter.addEventListener('click', function () {
                    // Update active filter
                    eventFilters.forEach(f => f.classList.remove('active', 'bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white'));
                    eventFilters.forEach(f => f.classList.add('bg-gray-100', 'hover:bg-gray-200', 'text-gray-800'));
                    this.classList.remove('bg-gray-100', 'hover:bg-gray-200', 'text-gray-800');
                    this.classList.add('active', 'bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white');

                    const filterValue = this.dataset.filter;

                    // Filter events
                    eventCards.forEach(card => {
                        if (filterValue === 'all' || card.dataset.type === filterValue) {
                            card.style.display = 'block';
                            card.classList.add('animate-fade-in-up');
                        } else {
                            card.style.display = 'none';
                            card.classList.remove('animate-fade-in-up');
                        }
                    });
                });
            });

            // Load more events
            document.getElementById('load-more-events').addEventListener('click', function () {
                // Simulate loading more events
                const button = this;
                const originalText = button.textContent;

                button.innerHTML = `
                    <svg class="animate-spin inline h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                `;
                button.disabled = true;

                setTimeout(() => {
                    // In a real application, you would load more events from the server
                    alert('More events loaded successfully!');
                    button.textContent = originalText;
                    button.disabled = false;
                }, 1500);
            });

            // Intersection Observer for animations
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

            // Observe all animated elements
            document.querySelectorAll('.animate-fade-in-up').forEach((el) => {
                observer.observe(el);
            });

            // Calendar day click handler
            document.querySelectorAll('.calendar-day').forEach(day => {
                day.addEventListener('click', function () {
                    document.querySelectorAll('.calendar-day').forEach(d => {
                        d.classList.remove('calendar-day-active', 'text-white');
                        d.classList.add('bg-white', 'hover:bg-gray-50', 'text-gray-900');
                    });

                    this.classList.remove('bg-white', 'hover:bg-gray-50', 'text-gray-900');
                    this.classList.add('calendar-day-active', 'text-white');

                    // In a real app, you would show events for selected day
                    alert('Showing events for selected date');
                });
            });

            // Timeline event hover effects
            document.querySelectorAll('.timeline-dot').forEach(dot => {
                dot.addEventListener('mouseenter', function () {
                    this.classList.add('scale-125');
                });

                dot.addEventListener('mouseleave', function () {
                    this.classList.remove('scale-125');
                });
            });
        });

        // Global functions
        function scrollToEvents() {
            document.getElementById('upcoming-events').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function registerForEvent(eventId) {
            // Show loading modal
            const modal = document.getElementById('loading-modal');
            modal.classList.remove('hidden');

            // Simulate API call
            setTimeout(() => {
                modal.classList.add('hidden');
                alert(`Successfully registered for event #${eventId}! Check your email for confirmation.`);

                // In a real application, you would:
                // 1. Send registration data to server
                // 2. Process payment if needed
                // 3. Redirect to confirmation page
                // 
                // Example:
                // fetch('/api/events/register', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                //     },
                //     body: JSON.stringify({ event_id: eventId })
                // })
                // .then(response => response.json())
                // .then(data => {
                //     if (data.success) {
                //         window.location.href = '/registration-confirmation';
                //     } else {
                //         alert(data.message);
                //     }
                // });
            }, 2000);
        }

        function viewEventDetails(eventId) {
            // In a real application, you would redirect to event details page
            // window.location.href = `/events/${eventId}`;

            // For demo purposes, show an alert
            alert(`Loading details for event #${eventId}...\n\nIn a real application, this would redirect to the event details page.`);
        }

        // Calendar navigation
        function prevMonth() {
            alert('Previous month clicked');
        }

        function nextMonth() {
            alert('Next month clicked');
        }
    </script>
@endsection