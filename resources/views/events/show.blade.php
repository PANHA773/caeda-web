@extends('layouts.app')

@section('title', $event->title . ' - Event Details')

@section('extra-css')
    <style>
        .gradient-text {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-20 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <img src="{{ $event->image }}" alt="{{ $event->title }}" class="absolute inset-0 w-full h-full object-cover opacity-20">
    </div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <a href="{{ route('events') }}" class="inline-flex items-center text-blue-200 hover:text-white mb-6 transition">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to Events
        </a>
        
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">{{ $event->title }}</h1>
        
        <div class="flex flex-wrap gap-4 mt-6">
            <span class="inline-block bg-gradient-to-r from-blue-500 to-purple-500 text-white px-4 py-2 rounded-full text-sm font-bold">
                {{ ucfirst($event->type) }}
            </span>
            <span class="inline-block bg-white/20 text-white px-4 py-2 rounded-full text-sm font-semibold">
                {{ $event->tag }}
            </span>
        </div>
    </div>
</section>

{{-- ================= MAIN CONTENT ================= --}}
<section class="py-16 px-4 md:px-8">
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- MAIN CONTENT --}}
            <div class="lg:col-span-2">
                {{-- EVENT IMAGE --}}
                <div class="rounded-2xl overflow-hidden shadow-2xl mb-8">
                    <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-full h-96 object-cover">
                </div>
                
                {{-- EVENT DESCRIPTION --}}
                <div class="bg-white rounded-2xl p-8 shadow-lg mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">About This Event</h2>
                    <p class="text-lg text-gray-700 leading-relaxed mb-6">
                        {{ $event->description }}
                    </p>
                    <p class="text-gray-600 mb-6">
                        Join us for an exciting opportunity to network with industry professionals, learn from experts, and expand your knowledge in this field. 
                        This event promises valuable insights, hands-on sessions, and meaningful connections.
                    </p>
                </div>
                
                {{-- EVENT DETAILS GRID --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-6 border border-blue-200">
                        <div class="flex items-center mb-3">
                            <svg class="w-6 h-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <h3 class="font-bold text-gray-900">Date & Time</h3>
                        </div>
                        <p class="text-lg text-gray-700">{{ $event->date->format('F j, Y') }}</p>
                        <p class="text-gray-600">{{ $event->time }}</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-6 border border-purple-200">
                        <div class="flex items-center mb-3">
                            <svg class="w-6 h-6 text-purple-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <h3 class="font-bold text-gray-900">Location</h3>
                        </div>
                        <p class="text-lg text-gray-700">{{ $event->location }}</p>
                    </div>
                    
                    <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-6 border border-green-200">
                        <div class="flex items-center mb-3">
                            <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 009.5 3H5a2 2 0 00-2 2v6a2 2 0 002 2h.006l.001.001h.001l.001.001h.001l.001.001h.001v2.5A2.5 2.5 0 0010.5 21H14a2 2 0 002-2v-6a2 2 0 00-2-2h-.006l-.001-.001h-.001l-.001-.001h-.001l-.001-.001H12z" />
                            </svg>
                            <h3 class="font-bold text-gray-900">Available Seats</h3>
                        </div>
                        <p class="text-lg text-gray-700 font-bold">{{ $event->seats }} Seats</p>
                    </div>
                    

                </div>

                {{-- SPEAKERS SECTION --}}
                @if($event->speakers > 0)
                <div class="bg-white rounded-2xl p-8 shadow-lg">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">{{ $event->speakers }} Expert Speakers</h2>
                    <p class="text-gray-600 mb-6">
                        Learn from industry leaders and experts who will share their insights and knowledge during this event.
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @for($i = 1; $i <= min(4, $event->speakers); $i++)
                            <div class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-purple-50 rounded-xl">
                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&w=100&h=100&fit=crop" 
                                     alt="Speaker" class="w-16 h-16 rounded-full object-cover mr-4">
                                <div>
                                    <h4 class="font-bold text-gray-900">Expert Speaker {{ $i }}</h4>
                                    <p class="text-sm text-gray-600">Industry Professional</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
                @endif
            </div>
            
            {{-- SIDEBAR --}}
            <div class="lg:col-span-1">
                {{-- REGISTRATION CARD --}}
                <div class="bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl p-8 shadow-2xl text-white mb-8 sticky top-8">
                    <h3 class="text-2xl font-bold mb-6">Register Now</h3>
                    
                    
                    <button class="w-full bg-white text-blue-600 font-bold py-3 rounded-xl hover:bg-blue-50 transition-colors duration-300 mb-4">
                        Register for Event
                    </button>
                    
                    <button class="w-full border-2 border-white text-white font-bold py-3 rounded-xl hover:bg-white/10 transition-colors duration-300 mb-6">
                        <i class="far fa-calendar mr-2"></i> Add to Calendar
                    </button>
                    
                    <div class="space-y-4 pt-6 border-t border-white/20">
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 2a1 1 0 011-1h8a1 1 0 011 1v1h1a2 2 0 012 2v2h1a1 1 0 110 2h-1v6h1a1 1 0 110 2h-1v2a2 2 0 01-2 2h-1v1a1 1 0 11-2 0v-1H8v1a1 1 0 11-2 0v-1H5a2 2 0 01-2-2v-2H2a1 1 0 110-2h1V9H2a1 1 0 010-2h1V5a2 2 0 012-2h1V2zM4 5h12v8H4V5z" clip-rule="evenodd" />
                            </svg>
                            {{ $event->date->format('M j, Y') }}
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                            </svg>
                            {{ $event->location }}
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v2h8v-2zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-2a4 4 0 00-8 0v2a2 2 0 002 2h4a2 2 0 002-2z" />
                            </svg>
                            {{ $event->speakers }} Speakers
                        </div>
                        <div class="flex items-center text-sm">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ $event->seats }} Seats Available
                        </div>
                    </div>
                </div>
                
                {{-- SHARE SECTION --}}
                <div class="bg-white rounded-2xl p-6 shadow-lg mb-8">
                    <h4 class="font-bold text-gray-900 mb-4">Share Event</h4>
                    <div class="flex gap-3">
                        <a href="#" class="flex-1 bg-blue-100 hover:bg-blue-200 text-blue-600 py-2 rounded-lg text-center font-semibold transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="flex-1 bg-sky-100 hover:bg-sky-200 text-sky-600 py-2 rounded-lg text-center font-semibold transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="flex-1 bg-purple-100 hover:bg-purple-200 text-purple-600 py-2 rounded-lg text-center font-semibold transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="flex-1 bg-green-100 hover:bg-green-200 text-green-600 py-2 rounded-lg text-center font-semibold transition">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ================= RELATED EVENTS ================= --}}
@if($relatedEvents->count() > 0)
<section class="py-16 px-4 md:px-8 bg-gray-50">
    <div class="max-w-6xl mx-auto">
        <h2 class="text-3xl font-bold text-gray-900 mb-12">Related Events</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedEvents as $relatedEvent)
                <a href="{{ route('events.show', $relatedEvent) }}" class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48 overflow-hidden">
                        <img src="{{ $relatedEvent->image }}" alt="{{ $relatedEvent->title }}" class="w-full h-full object-cover hover:scale-110 transition-transform duration-300">
                        <div class="absolute top-4 right-4">
                            <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                {{ $relatedEvent->tag }}
                            </span>
                        </div>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-500 mb-2">{{ $relatedEvent->date->format('M j, Y') }}</p>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $relatedEvent->title }}</h3>
                        <div class="flex items-center justify-end pt-4 border-t border-gray-200">
                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition">
                                View Details
                            </button>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection

@section('extra-js')
<script>
    function shareEvent(platform) {
        const title = '{{ addslashes($event->title) }}';
        const url = '{{ route("events.show", $event) }}';
        const urls = {
            facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
            twitter: `https://twitter.com/intent/tweet?text=${encodeURIComponent(title)}&url=${encodeURIComponent(url)}`,
            linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`,
            whatsapp: `https://api.whatsapp.com/send?text=${encodeURIComponent(title + ' ' + url)}`
        };
        if (urls[platform]) window.open(urls[platform], '_blank');
    }
</script>
@endsection
