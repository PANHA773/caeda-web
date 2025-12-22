@extends('layouts.app')

@section('title', 'Contact Us - CAEDA')

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
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes pulse-glow {

        0%,
        100% {
            box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
        }

        50% {
            box-shadow: 0 0 40px rgba(59, 130, 246, 0.6);
        }
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%);
        }

        100% {
            transform: translateX(100%);
        }
    }

    @keyframes wave {

        0%,
        100% {
            transform: rotate(0deg);
        }

        25% {
            transform: rotate(5deg);
        }

        75% {
            transform: rotate(-5deg);
        }
    }

    @keyframes spin-slow {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
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
        animation: float 3s ease-in-out infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    .animate-shimmer {
        animation: shimmer 2s infinite;
    }

    .animate-wave {
        animation: wave 2s ease-in-out infinite;
    }

    .animate-spin-slow {
        animation: spin-slow 8s linear infinite;
    }

    .font-cinzel {
        font-family: 'Cinzel', serif;
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .text-gradient {
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .contact-card-hover {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .contact-card-hover:hover {
        transform: translateY(-10px) scale(1.02);
    }

    .form-input-focus:focus {
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .map-container {
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .message-sent {
        animation: messageSent 0.5s ease-out forwards;
    }

    @keyframes messageSent {
        0% {
            transform: translateY(20px);
            opacity: 0;
        }

        100% {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .success-icon {
        animation: successIcon 0.8s ease-out forwards;
    }

    @keyframes successIcon {
        0% {
            transform: scale(0);
            opacity: 0;
        }

        70% {
            transform: scale(1.2);
            opacity: 1;
        }

        100% {
            transform: scale(1);
            opacity: 1;
        }
    }
</style>
@endsection

@section('content')

{{-- ================= HERO SECTION ================= --}}
<section class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80')] bg-cover bg-center opacity-20"></div>
    </div>

    {{-- Animated floating elements --}}
    <div class="absolute top-10 left-10 w-24 h-24 bg-blue-500/20 rounded-full animate-float"></div>
    <div class="absolute bottom-20 right-20 w-32 h-32 bg-purple-500/20 rounded-full animate-float" style="animation-delay: 1s"></div>
    <div class="absolute top-1/3 right-1/4 w-20 h-20 bg-pink-500/20 rounded-full animate-float" style="animation-delay: 2s"></div>
    <div class="absolute bottom-1/3 left-1/4 w-16 h-16 bg-cyan-500/20 rounded-full animate-float" style="animation-delay: 1.5s"></div>

    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-8 animate-fade-in-up">
                <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
                <span class="text-white font-semibold text-sm md:text-base">We're Here to Help • 24/7 Support</span>
            </div>

            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 text-white font-cinzel">
                Get In <span class="text-gradient">Touch</span>
                <span class="block">With <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent animate-gradient-x">CAEDA</span></span>
            </h1>

            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed">
                Have questions? Ready to start your learning journey? Our team is here to help you every step of the way.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 200ms">
                <a href="#contact-form" class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span>Send Message</span>
                </a>
                <button onclick="scrollToContactInfo()" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Visit Campus</span>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- ================= CONTACT STATS ================= --}}
<section class="py-16 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @php
            $contactStats = [
            ['number' => '24/7', 'label' => 'Support Available', 'icon' => 'fas fa-headset', 'color' => 'from-blue-500 to-cyan-500'],
            ['number' => '2h', 'label' => 'Average Response Time', 'icon' => 'fas fa-clock', 'color' => 'from-purple-500 to-pink-500'],
            ['number' => '98%', 'label' => 'Satisfaction Rate', 'icon' => 'fas fa-star', 'color' => 'from-green-500 to-teal-500'],
            ['number' => '10K+', 'label' => 'Students Helped', 'icon' => 'fas fa-users', 'color' => 'from-orange-500 to-red-500'],
            ];
            @endphp

            @foreach($contactStats as $index => $stat)
            <div class="text-center group animate-fade-in-up" style="animation-delay: {{ $index * 150 }}ms">
                <div class="relative inline-block mb-4">
                    <div class="w-20 h-20 bg-gradient-to-br {{ $stat['color'] }} rounded-2xl flex items-center justify-center mx-auto mb-2 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                        <i class="{{ $stat['icon'] }} text-white text-3xl"></i>
                    </div>
                    <div class="absolute -inset-2 bg-gradient-to-br {{ $stat['color'] }} rounded-2xl blur-md opacity-0 group-hover:opacity-30 transition-opacity duration-500 -z-10"></div>
                </div>
                <div class="text-3xl md:text-4xl font-bold mb-2 bg-gradient-to-r {{ $stat['color'] }} bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
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

{{-- ================= CONTACT FORM & INFO ================= --}}
<section id="contact-form" class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            {{-- CONTACT FORM --}}
            <div class="animate-fade-in-up">
                <div class="glass-effect rounded-3xl p-8 shadow-2xl">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Send Us a Message</h2>
                    <p class="text-gray-600 mb-8">We'll get back to you within 2 hours during business hours.</p>

                    {{-- FORM SUCCESS MESSAGE --}}
                    <div id="form-success" class="hidden bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-6 mb-8 text-center message-sent">
                        <div class="success-icon text-5xl text-green-500 mb-4">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Message Sent Successfully!</h3>
                        <p class="text-gray-700">Thank you for contacting us. We'll get back to you within 2 hours.</p>
                        <button onclick="resetForm()" class="mt-4 text-blue-600 hover:text-blue-800 font-medium">
                            Send another message
                        </button>
                    </div>

                    {{-- CONTACT FORM --}}
                    <form id="contactForm" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    First Name *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text"
                                        id="first_name"
                                        name="first_name"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50"
                                        placeholder="John"
                                        required>
                                </div>
                            </div>

                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Last Name *
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-user text-gray-400"></i>
                                    </div>
                                    <input type="text"
                                        id="last_name"
                                        name="last_name"
                                        class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50"
                                        placeholder="Doe"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                Email Address *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-envelope text-gray-400"></i>
                                </div>
                                <input type="email"
                                    id="email"
                                    name="email"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50"
                                    placeholder="john@example.com"
                                    required>
                            </div>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-phone text-gray-400"></i>
                                </div>
                                <input type="tel"
                                    id="phone"
                                    name="phone"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50"
                                    placeholder="+855 12 345 678">
                            </div>
                        </div>

                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                Subject *
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-tag text-gray-400"></i>
                                </div>
                                <select id="subject"
                                    name="subject"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50 appearance-none">
                                    <option value="">Select a subject</option>
                                    <option value="admissions">Admissions & Enrollment</option>
                                    <option value="courses">Course Information</option>
                                    <option value="technical">Technical Support</option>
                                    <option value="billing">Billing & Payments</option>
                                    <option value="partnership">Partnership Opportunities</option>
                                    <option value="other">Other</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="fas fa-chevron-down text-gray-400"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                Message *
                            </label>
                            <div class="relative">
                                <div class="absolute top-3 left-3">
                                    <i class="fas fa-comment text-gray-400"></i>
                                </div>
                                <textarea id="message"
                                    name="message"
                                    rows="5"
                                    class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 form-input-focus bg-white/50 resize-none"
                                    placeholder="Tell us how we can help you..."
                                    required></textarea>
                            </div>
                        </div>

                        <div class="flex items-center">
                            <input type="checkbox"
                                id="newsletter"
                                name="newsletter"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="newsletter" class="ml-2 text-sm text-gray-600">
                                Subscribe to our newsletter for updates and offers
                            </label>
                        </div>

                        <button type="submit"
                            id="submit-btn"
                            class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-6 rounded-xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center group">
                            <span id="submit-text">Send Message</span>
                            <svg id="submit-spinner" class="hidden animate-spin ml-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <i id="submit-icon" class="fas fa-paper-plane ml-3 transform group-hover:translate-x-1 transition-transform"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- CONTACT INFORMATION --}}
            <div class="space-y-8 animate-fade-in-up" style="animation-delay: 200ms">



        {{-- CONTACT CARDS --}}
<div class="glass-effect rounded-3xl p-8 shadow-2xl">
    <h2 class="text-3xl font-bold text-gray-900 mb-8">Contact Information</h2>

    <div class="space-y-6">
        @foreach($contacts as $contact)
        <div class="contact-card-hover bg-white/50 p-6 rounded-2xl border border-gray-200 hover:border-transparent transition-all duration-300 group">
            <div class="flex items-start">
                <div class="w-14 h-14 bg-gradient-to-br {{ $contact->color }} rounded-xl flex items-center justify-center mr-4 transform transition-all duration-300 group-hover:scale-110">
                    <i class="{{ $contact->icon }} text-white text-xl"></i>
                </div>
                <div class="flex-1">
                    <h3 class="font-bold text-gray-900 text-lg mb-2">{{ $contact->title }}</h3>
                    <div class="text-gray-600 leading-relaxed">
                        {!! $contact->content !!}
                    </div>
                </div>
            </div>

            @if($contact->action)
            <button onclick="contactAction('{{ strtolower($contact->title) }}')"
                class="mt-4 text-blue-600 hover:text-blue-800 font-medium flex items-center transition-all duration-300 group-hover:translate-x-2">
                <i class="{{ $contact->action_icon }} mr-2"></i>
                {{ $contact->action }}
            </button>
            @endif
        </div>
        @endforeach
    </div>
</div>






                {{-- SOCIAL MEDIA --}}
                <div class="glass-effect rounded-3xl p-8 shadow-2xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Connect With Us</h3>
                    <p class="text-gray-600 mb-6">
                        Follow us on social media for updates, news, and announcements.
                    </p>

                    <div class="flex flex-wrap gap-4">
                        @forelse($socialLinks ?? collect() as $social)
                        <a href="{{ $social->url }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            title="{{ $social->platform }}"
                            class="w-14 h-14 {{ $social->color }}
                      rounded-xl flex items-center justify-center text-white
                      transform transition-all duration-300
                      hover:-translate-y-2 hover:shadow-xl">
                            <i class="{{ $social->icon }} text-xl"></i>
                        </a>
                        @empty
                        <span class="text-sm text-gray-400">
                            Social links will be available soon.
                        </span>
                        @endforelse
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

{{-- ================= MAP SECTION ================= --}}
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                Visit Our <span class="text-gradient">Campus</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Experience our state-of-the-art facilities and meet our team in person
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            {{-- MAP --}}
            <div class="lg:col-span-2">
                <div class="map-container h-96 relative">
                    {{-- Google Maps Embed --}}
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.839124183577!2d104.91721547602483!3d11.56881198861582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109513dc76a6be3%3A0x9c010ee85ab525bb!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2s!4v1698321234567!5m2!1sen!2s"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="absolute inset-0">
                    </iframe>

                    {{-- Map Overlay Card --}}
                    <div class="absolute bottom-6 left-6 bg-white/90 backdrop-blur-sm rounded-2xl p-6 shadow-2xl max-w-sm animate-pulse-glow">
                        <h4 class="font-bold text-gray-900 text-lg mb-2">CAEDA Main Campus</h4>
                        <p class="text-gray-600 text-sm mb-4">
                            Building 123, Street 456<br>
                            Sangkat, Khan<br>
                            Phnom Penh, Cambodia
                        </p>
                        <button onclick="getDirections()" class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-medium py-3 rounded-xl transition-all duration-300">
                            <i class="fas fa-directions mr-2"></i>
                            Get Directions
                        </button>
                    </div>
                </div>
            </div>

            {{-- VISIT INFORMATION --}}
            <div class="lg:col-span-1">
                <div class="glass-effect rounded-3xl p-8 shadow-2xl h-full">
                    <h3 class="text-2xl font-bold text-gray-900 mb-8">Plan Your Visit</h3>

                    <div class="space-y-6">
                        <div class="flex items-start p-4 rounded-2xl bg-gradient-to-r from-blue-50 to-purple-50">
                            <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-car text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Parking Information</h4>
                                <p class="text-gray-600 text-sm">Free parking available in front of the campus. Additional parking at the rear building.</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 rounded-2xl bg-gradient-to-r from-green-50 to-teal-50">
                            <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-teal-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-bus text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Public Transport</h4>
                                <p class="text-gray-600 text-sm">Bus routes 1, 3, and 5 stop nearby. Tuk-tuks and taxis readily available.</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 rounded-2xl bg-gradient-to-r from-orange-50 to-red-50">
                            <div class="w-12 h-12 bg-gradient-to-r from-orange-500 to-red-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-wheelchair text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Accessibility</h4>
                                <p class="text-gray-600 text-sm">Wheelchair accessible entrance and facilities available on all floors.</p>
                            </div>
                        </div>

                        <div class="flex items-start p-4 rounded-2xl bg-gradient-to-r from-purple-50 to-pink-50">
                            <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-calendar-alt text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-900 mb-1">Campus Tours</h4>
                                <p class="text-gray-600 text-sm">Schedule a guided campus tour to explore our facilities and meet our team.</p>
                            </div>
                        </div>
                    </div>

                    <button onclick="scheduleTour()" class="w-full mt-8 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-800 font-bold py-4 rounded-xl transition-all duration-300 transform hover:-translate-y-1">
                        <i class="fas fa-calendar-check mr-2"></i>
                        Schedule Campus Tour
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>


{{-- ================= FAQ SECTION ================= --}}

<section class="py-20 px-4 md:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                Frequently Asked <span class="text-gradient">Questions</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Find quick answers to common questions about admissions, courses, and more
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach($faqs->chunk(ceil($faqs->count()/2)) as $column)
                <div class="space-y-6">
                    @foreach($column as $index => $faq)
                        <div class="faq-item bg-white border border-gray-200 rounded-2xl p-6 hover:shadow-xl transition-all duration-300 cursor-pointer animate-fade-in-up" style="animation-delay: {{ $index * 100 }}ms">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-gradient-to-br {{ 
                                    $faq->color == 'blue' ? 'from-blue-500 to-cyan-500' : 
                                    ($faq->color == 'purple' ? 'from-purple-500 to-pink-500' : 
                                    ($faq->color == 'green' ? 'from-green-500 to-teal-500' : 'from-orange-500 to-red-500')) 
                                }} rounded-xl flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="{{ $faq->icon }} text-white"></i>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-lg mb-2">{{ $faq->question }}</h4>
                                    <p class="text-gray-600">{{ $faq->answer }}</p>
                                </div>
                                <div class="ml-4">
                                    <i class="fas fa-chevron-down text-gray-400 transform transition-transform duration-300"></i>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <div class="text-center mt-16 animate-fade-in-up">
            <div class="inline-block bg-gradient-to-r from-blue-50 to-purple-50 rounded-3xl p-8 max-w-2xl">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Still have questions?</h3>
                <p class="text-gray-600 mb-6">Our team is ready to help you with any questions you may have.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button onclick="scrollToContactForm()" class="bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-3 px-8 rounded-xl transition-all duration-300">
                        Contact Support
                    </button>
                    <a href="tel:+85523456789" class="border-2 border-blue-500 text-blue-600 hover:bg-blue-50 font-medium py-3 px-8 rounded-xl transition-all duration-300">
                        <i class="fas fa-phone mr-2"></i>
                        Call Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>





{{-- ================= FINAL CTA ================= --}}
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute top-0 left-0 w-96 h-96 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2 animate-spin-slow"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full translate-x-1/3 translate-y-1/3"></div>
    </div>

    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
            Start Your <span class="bg-gradient-to-r from-cyan-300 to-blue-300 bg-clip-text text-transparent">Journey</span> Today
        </h2>
        <p class="text-xl mb-10 opacity-90 max-w-2xl mx-auto">
            Join thousands of successful students who have transformed their careers with CAEDA
        </p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🎓</div>
                <h3 class="text-xl font-bold mb-3">Expert Guidance</h3>
                <p class="text-blue-200">Personalized support from enrollment to graduation</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🚀</div>
                <h3 class="text-xl font-bold mb-3">Career Growth</h3>
                <p class="text-blue-200">Industry-relevant skills for today's job market</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6">
                <div class="text-4xl mb-4">🌍</div>
                <h3 class="text-xl font-bold mb-3">Global Community</h3>
                <p class="text-blue-200">Connect with students and professionals worldwide</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="#contact-form" class="group bg-white text-blue-600 hover:bg-gray-50 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg">
                <span class="flex items-center">
                    Get Started Now
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </a>
            <a href="tel:+85523456789" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                <span class="flex items-center">
                    <i class="fas fa-phone mr-2 animate-wave"></i>
                    Call: +855 23 456 789
                </span>
            </a>
        </div>
    </div>
</section>

{{-- Loading Modal --}}
<div id="loading-modal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-3xl shadow-2xl max-w-md mx-4 text-center">
        <svg class="animate-spin mx-auto h-12 w-12 text-blue-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <h3 class="text-xl font-bold text-gray-800 mb-2">Sending Your Message</h3>
        <p class="text-gray-600">Please wait while we process your request...</p>
    </div>
</div>

@endsection

@section('extra-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Form submission
        const contactForm = document.getElementById('contactForm');
        const formSuccess = document.getElementById('form-success');
        const submitBtn = document.getElementById('submit-btn');
        const submitText = document.getElementById('submit-text');
        const submitSpinner = document.getElementById('submit-spinner');
        const submitIcon = document.getElementById('submit-icon');

        if (contactForm) {
            contactForm.addEventListener('submit', async function(e) {
                e.preventDefault();

                // Show loading state
                submitText.textContent = 'Sending...';
                submitSpinner.classList.remove('hidden');
                submitIcon.classList.add('hidden');
                submitBtn.disabled = true;

                // Show loading modal
                document.getElementById('loading-modal').classList.remove('hidden');

                // Simulate API call
                setTimeout(() => {
                    // Hide loading modal
                    document.getElementById('loading-modal').classList.add('hidden');

                    // Show success message
                    contactForm.style.display = 'none';
                    formSuccess.classList.remove('hidden');

                    // Reset button
                    submitText.textContent = 'Send Message';
                    submitSpinner.classList.add('hidden');
                    submitIcon.classList.remove('hidden');
                    submitBtn.disabled = false;

                    // In a real application, you would:
                    // 1. Send form data to Laravel backend
                    // 2. Handle validation
                    // 3. Send confirmation email
                    // 
                    // Example:
                    // fetch('/api/contact', {
                    //     method: 'POST',
                    //     headers: {
                    //         'Content-Type': 'application/json',
                    //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    //     },
                    //     body: JSON.stringify({
                    //         first_name: document.getElementById('first_name').value,
                    //         last_name: document.getElementById('last_name').value,
                    //         email: document.getElementById('email').value,
                    //         phone: document.getElementById('phone').value,
                    //         subject: document.getElementById('subject').value,
                    //         message: document.getElementById('message').value,
                    //         newsletter: document.getElementById('newsletter').checked
                    //     })
                    // })
                    // .then(response => response.json())
                    // .then(data => {
                    //     if (data.success) {
                    //         // Show success message
                    //     } else {
                    //         // Show error message
                    //     }
                    // });

                }, 2000);
            });
        }

        // FAQ accordion functionality
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            item.addEventListener('click', function() {
                const answer = this.querySelector('p');
                const icon = this.querySelector('.fa-chevron-down');

                // Toggle answer visibility
                if (answer.style.maxHeight) {
                    answer.style.maxHeight = null;
                    answer.style.marginTop = '0';
                    icon.classList.remove('rotate-180');
                } else {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                    answer.style.marginTop = '12px';
                    icon.classList.add('rotate-180');
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
            }, {
                threshold: 0.1
            }
        );

        // Observe all animated elements
        document.querySelectorAll('.animate-fade-in-up').forEach((el) => {
            observer.observe(el);
        });

        // Form input focus effects
        const formInputs = document.querySelectorAll('input, textarea, select');
        formInputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-200');
            });

            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-200');
            });
        });

        // Contact card hover effects
        const contactCards = document.querySelectorAll('.contact-card-hover');
        contactCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.w-14');
                icon.classList.add('animate-pulse-glow');
            });

            card.addEventListener('mouseleave', function() {
                const icon = this.querySelector('.w-14');
                icon.classList.remove('animate-pulse-glow');
            });
        });
    });

    // Global functions
    function scrollToContactForm() {
        document.getElementById('contact-form').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function scrollToContactInfo() {
        // Scroll to contact info section
        const contactInfo = document.querySelector('#contact-form .lg\\:col-span-2 + div');
        contactInfo.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    function contactAction(actionType) {
        switch (actionType) {
            case 'main campus':
                getDirections();
                break;
            case 'phone number':
                window.location.href = 'tel:+85523456789';
                break;
            case 'email address':
                window.location.href = 'mailto:info@caeda.edu.kh';
                break;
            case 'office hours':
                scheduleCall();
                break;
        }
    }

    function getDirections() {
        const address = encodeURIComponent('Building 123, Street 456, Phnom Penh, Cambodia');
        window.open(`https://www.google.com/maps/dir/?api=1&destination=${address}`, '_blank');
    }

    function scheduleTour() {
        alert('Campus tour scheduling feature would open a calendar booking system. In a real application, this would integrate with a booking system like Calendly.');
    }

    function scheduleCall() {
        alert('Call scheduling feature would open a calendar booking system. In a real application, this would integrate with a booking system like Calendly.');
    }

    function resetForm() {
        document.getElementById('contactForm').style.display = 'block';
        document.getElementById('form-success').classList.add('hidden');
        document.getElementById('contactForm').reset();
        scrollToContactForm();
    }
</script>
@endsection