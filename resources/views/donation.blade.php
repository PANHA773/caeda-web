@extends('layouts.app')

@section('title', __('Donation for Helpless Children'))

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        <!-- Enhanced Header Section -->
        <div 
            id="header-section"
            class="text-center mb-16 transform transition-all duration-1000 opacity-0 translate-y-4"
        >
            <div class="inline-flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 mb-6 shadow-lg border border-gray-200/50">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700">{{ __('MAKE A DIFFERENCE TODAY') }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent">
                {{ __('FOR THE HELPLESS CHILDREN') }}
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse"></div>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto bg-white/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-200/50 shadow-sm">
                {{ __('Your support will help us to make life better for children in need. Every donation provides food, education, healthcare, and hope for a brighter future.') }}
            </p>
        
        <!-- Small illustrative images below intro -->
        <div class="mt-6 max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-4">
            @php
                $supportImages = [
                    [
                        'src' => 'https://images.unsplash.com/photo-1529068755536-a5ade3f3a0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Children eating',
                        'caption' => 'Nutrition Programs'
                    ],
                    [
                        'src' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Children learning',
                        'caption' => 'Education Support'
                    ],
                    [
                        'src' => 'https://images.unsplash.com/photo-1580281657521-3d8a7f8631b1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                        'alt' => 'Child receiving care',
                        'caption' => 'Health & Care'
                    ],
                ];
            @endphp

            @foreach($supportImages as $img)
                <div class="rounded-lg overflow-hidden shadow-sm bg-white">
                    <img src="{{ $img['src'] }}" alt="{{ $img['alt'] }}" class="w-full h-36 object-cover" loading="lazy" onerror="this.src='{{ asset('assets/defaultcourse.jpg') }}'">
                    <div class="p-3 text-center">
                        <div class="font-semibold text-gray-800 text-sm">{{ $img['caption'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Hero images trio -->
        <div
            id="hero-images"
            class="mt-8 mb-12 grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch opacity-0"
        >
            @php
                // Use remote images so they display reliably without needing local assets
                $heroImages = [
                    [
                        'title' => 'Community Outreach',
                        'caption' => 'Feeding and education programs in rural areas',
                        'src' => 'https://images.unsplash.com/photo-1556761175-b413da4baf72?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                    ],
                    [
                        'title' => 'Education Initiatives',
                        'caption' => 'Scholarships and learning resources',
                        'src' => 'https://images.unsplash.com/photo-1515187029135-18ee286d815b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                    ],
                    [
                        'title' => 'Health & Care',
                        'caption' => 'Medical camps and vaccinations',
                        'src' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                    ],
                ];
            @endphp

            @foreach($heroImages as $index => $image)
                <div 
                    data-hero-index="{{ $index }}"
                    class="relative rounded-2xl overflow-hidden shadow-lg group bg-white/60 opacity-0 translate-y-6"
                >
                    <img
                        src="{{ $image['src'] }}"
                        alt="{{ $image['title'] }}"
                        loading="lazy"
                        class="w-full h-56 md:h-48 lg:h-56 object-cover transition-transform duration-500 group-hover:scale-105"
                        onerror="this.src='{{ asset('assets/defaultcourse.jpg') }}'"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent p-4 flex flex-col justify-end">
                        <h4 class="text-white font-bold text-lg drop-shadow-md">{{ $image['title'] }}</h4>
                        <p class="text-sm text-gray-100/90 mt-1 mb-3">{{ $image['caption'] }}</p>
                        <div class="flex">
                            <a href="#donate-form" class="inline-block py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm shadow-md transition-colors duration-300">
                                {{ __('Donate Now') }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Enhanced Donation Form Section -->
            <div class="lg:col-span-2">
                <div 
                    id="donate-form"
                    class="bg-white/90 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 shadow-2xl hover:shadow-3xl transition-all duration-500 opacity-0 translate-y-4"
                >
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent">
                        {{ __('How You Can Help?') }}
                    </h2>
                    
                    <!-- Selected Cause Display -->
                    <div id="selected-cause-display" class="group mb-8 p-6 bg-gradient-to-r from-blue-50/80 to-blue-100/80 rounded-2xl border border-blue-200/50 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-1 hidden">
                        <div class="flex items-center">
                            <div id="selected-cause-icon" class="w-14 h-14 rounded-2xl bg-gradient-to-r from-blue-500 to-blue-600 flex items-center justify-center text-white text-2xl mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                            </div>
                            <div>
                                <h3 id="selected-cause-title" class="font-bold text-gray-900 text-lg"></h3>
                                <p id="selected-cause-desc" class="text-sm text-gray-600 group-hover:text-gray-700 transition-colors duration-300"></p>
                            </div>
                        </div>
                    </div>

                    <form id="donationForm" method="POST" action="{{ route('donation.submit') }}">
                        @csrf
                        
                        <!-- Donation Amount -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">
                                {{ __('Select Donation Amount (USD)') }}
                            </label>
                            
                            <!-- Quick Amount Buttons -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 mb-6">
                                @foreach([25, 50, 100, 250, 500, 1000] as $index => $amount)
                                    <button
                                        type="button"
                                        data-amount="{{ $amount }}"
                                        class="donation-quick-amount group p-4 rounded-xl border-2 font-bold transition-all duration-300 transform hover:-translate-y-1 border-gray-200/50 text-gray-700 hover:border-blue-300 hover:shadow-lg bg-white/80 opacity-0 translate-y-4"
                                        style="animation-delay: {{ $index * 50 }}ms"
                                    >
                                        <span class="flex items-center justify-center">
                                            ${{ $amount }}
                                            <svg class="w-4 h-4 ml-2 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </span>
                                    </button>
                                @endforeach
                            </div>

                            <!-- Custom Amount -->
                            <div class="relative transform transition-all duration-300 hover:-translate-y-1">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-xl">$</span>
                                <input
                                    type="number"
                                    id="customAmount"
                                    name="amount"
                                    value=""
                                    class="w-full pl-12 pr-4 py-4 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg text-lg font-medium"
                                    placeholder="{{ __('Enter custom amount') }}"
                                    min="1"
                                    step="0.01"
                                />
                            </div>
                        </div>

                        <!-- Donation Cause Selection -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">
                                {{ __('Choose Where to Make an Impact') }}
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @php
                                    $causes = [
                                        ['id' => 'education', 'icon' => '📚', 'title' => 'Education Support', 'desc' => 'Provide school supplies, tuition, and educational resources', 'color' => 'from-blue-500 to-blue-600'],
                                        ['id' => 'nutrition', 'icon' => '🍎', 'title' => 'Nutrition Programs', 'desc' => 'Ensure children receive proper meals and nutrition', 'color' => 'from-green-500 to-green-600'],
                                        ['id' => 'healthcare', 'icon' => '🏥', 'title' => 'Healthcare Access', 'desc' => 'Fund medical treatments, vaccinations, and check-ups', 'color' => 'from-red-500 to-red-600'],
                                        ['id' => 'shelter', 'icon' => '🏠', 'title' => 'Safe Shelter', 'desc' => 'Provide safe housing and protection for homeless children', 'color' => 'from-orange-500 to-orange-600'],
                                        ['id' => 'emergency', 'icon' => '🆘', 'title' => 'Emergency Relief', 'desc' => 'Immediate aid for children in crisis situations', 'color' => 'from-yellow-500 to-yellow-600'],
                                        ['id' => 'general', 'icon' => '❤️', 'title' => 'General Fund', 'desc' => 'Support all programs for helpless children', 'color' => 'from-pink-500 to-pink-600']
                                    ];
                                @endphp
                                
                                @foreach($causes as $index => $cause)
                                    <div
                                        data-cause="{{ $cause['id'] }}"
                                        data-icon="{{ $cause['icon'] }}"
                                        data-title="{{ $cause['title'] }}"
                                        data-desc="{{ $cause['desc'] }}"
                                        data-color="{{ $cause['color'] }}"
                                        class="donation-cause group p-4 rounded-xl border-2 cursor-pointer transition-all duration-500 transform hover:-translate-y-2 border-gray-200/50 hover:border-blue-300 hover:shadow-lg bg-white/80 opacity-0 translate-y-6"
                                        style="animation-delay: {{ $index * 100 }}ms"
                                    >
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r {{ $cause['color'] }} flex items-center justify-center text-white text-xl mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-md">
                                                {{ $cause['icon'] }}
                                            </div>
                                            <div class="flex-1">
                                                <h3 class="font-semibold text-gray-900 text-sm group-hover:text-gray-800 transition-colors duration-300">{{ $cause['title'] }}</h3>
                                                <p class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-300 mt-1">{{ $cause['desc'] }}</p>
                                            </div>
                                            <div class="w-3 h-3 bg-blue-500 rounded-full transform transition-all duration-300 group-hover:scale-150 hidden"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="selectedCause" name="cause" value="education">
                        </div>

                        <!-- Recurring Donation -->
                        <div class="mb-8 p-6 bg-gradient-to-r from-green-50/50 to-emerald-50/50 rounded-2xl border border-green-200/50">
                            <label class="flex items-center cursor-pointer group">
                                <div class="relative">
                                    <input
                                        type="checkbox"
                                        id="recurringDonation"
                                        name="recurring"
                                        class="sr-only"
                                    />
                                    <div id="recurringToggle" class="w-12 h-6 rounded-full transition-colors duration-300 bg-gray-300"></div>
                                    <div id="recurringHandle" class="absolute left-1 top-1 w-4 h-4 rounded-full bg-white transition-transform duration-300"></div>
                                </div>
                                <span class="ml-4 text-gray-700 font-semibold group-hover:text-gray-900 transition-colors duration-300">
                                    {{ __('Make this a monthly recurring donation') }}
                                </span>
                            </label>
                            <div id="recurringMessage" class="mt-3 text-sm text-green-600 font-medium bg-white/50 p-3 rounded-lg border border-green-200 transform transition-all duration-300 hover:scale-105 hidden">
                                🌟 {{ __('Monthly donors provide sustainable support for children in need!') }}
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <div class="mb-8">
                            <label class="block text-sm font-semibold text-gray-700 mb-4">
                                {{ __('Select Payment Method') }}
                            </label>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                @php
                                    $paymentMethods = [
                                        ['id' => 'credit-card', 'icon' => '💳', 'name' => 'Credit/Debit Card', 'desc' => 'Secure payment via Stripe', 'color' => 'from-blue-500 to-indigo-600'],
                                        ['id' => 'paypal', 'icon' => '🔵', 'name' => 'PayPal', 'desc' => 'Pay with your PayPal account', 'color' => 'from-blue-400 to-blue-600'],
                                        ['id' => 'bank-transfer', 'icon' => '🏦', 'name' => 'Bank Transfer', 'desc' => 'Direct bank transfer', 'color' => 'from-green-500 to-green-600']
                                    ];
                                @endphp
                                
                                @foreach($paymentMethods as $index => $method)
                                    <div
                                        data-method="{{ $method['id'] }}"
                                        class="payment-method group p-4 rounded-xl border-2 cursor-pointer transition-all duration-500 transform hover:-translate-y-2 border-gray-200/50 hover:border-blue-300 hover:shadow-lg bg-white/80 opacity-0 translate-y-6"
                                        style="animation-delay: {{ $index * 100 }}ms"
                                    >
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <div class="w-12 h-12 rounded-xl bg-gradient-to-r {{ $method['color'] }} flex items-center justify-center text-white text-xl mr-3 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-md">
                                                    {{ $method['icon'] }}
                                                </div>
                                                <div>
                                                    <h3 class="font-semibold text-gray-900 group-hover:text-gray-800 transition-colors duration-300">{{ $method['name'] }}</h3>
                                                    <p class="text-xs text-gray-600 group-hover:text-gray-700 transition-colors duration-300">{{ $method['desc'] }}</p>
                                                </div>
                                            </div>
                                            <div class="w-4 h-4 bg-blue-500 rounded-full transform transition-all duration-300 group-hover:scale-150 hidden"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <input type="hidden" id="paymentMethod" name="payment_method" value="credit-card">
                        </div>

                        <!-- Donor Information -->
                        <div class="mb-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                                {{ __('Your Information') }}
                            </h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div class="transform transition-all duration-300 hover:-translate-y-1">
                                    <input
                                        type="text"
                                        name="first_name"
                                        placeholder="{{ __('First Name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                                        required
                                    />
                                </div>
                                <div class="transform transition-all duration-300 hover:-translate-y-1">
                                    <input
                                        type="text"
                                        name="last_name"
                                        placeholder="{{ __('Last Name') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                                        required
                                    />
                                </div>
                                <div class="transform transition-all duration-300 hover:-translate-y-1">
                                    <input
                                        type="email"
                                        name="email"
                                        placeholder="{{ __('Email Address') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                                        required
                                    />
                                </div>
                                <div class="transform transition-all duration-300 hover:-translate-y-1">
                                    <input
                                        type="tel"
                                        name="phone"
                                        placeholder="{{ __('Phone Number') }}"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white/80 backdrop-blur-sm hover:shadow-lg"
                                    />
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button
                            type="submit"
                            id="donateButton"
                            class="group w-full py-4 px-6 rounded-xl font-bold text-lg transition-all duration-500 transform hover:-translate-y-2 bg-gray-300 text-gray-500 cursor-not-allowed"
                            disabled
                        >
                            <span class="flex items-center justify-center">
                                {{ __('Enter Donation Amount') }}
                                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </button>

                        <!-- Security Notice -->
                        <p class="text-center text-sm text-gray-500 mt-4 bg-white/50 backdrop-blur-sm p-3 rounded-xl border border-gray-200/50">
                            🔒 {{ __('Your donation is secure and encrypted. We are a registered 501(c)(3) organization.') }}
                        </p>
                    </form>
                </div>
            </div>

            <!-- Enhanced Sidebar -->
            <div class="space-y-8">
                <!-- Impact Summary -->
                <div 
                    id="impact-summary"
                    class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 rounded-3xl p-6 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden opacity-0 translate-y-4"
                >
                    <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    <div class="absolute bottom-0 left-0 w-24 h-24 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2"></div>
                    
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                            {{ __('Your Impact') }}
                        </h3>
                        <div class="space-y-4">
                            @php
                                $impacts = [
                                    ['icon' => '🍎', 'label' => 'Children Fed Daily', 'value' => '1,200+'],
                                    ['icon' => '📚', 'label' => 'Children in School', 'value' => '850+'],
                                    ['icon' => '🏥', 'label' => 'Medical Treatments', 'value' => '320+'],
                                    ['icon' => '🏠', 'label' => 'Safe Shelters', 'value' => '15+']
                                ];
                            @endphp
                            
                            @foreach($impacts as $index => $impact)
                                <div class="flex justify-between items-center transform transition-all duration-300 hover:-translate-y-1 opacity-0 translate-y-2" style="animation-delay: {{ $index * 100 }}ms">
                                    <div class="flex items-center">
                                        <span class="text-lg mr-3">{{ $impact['icon'] }}</span>
                                        <span class="text-blue-100">{{ $impact['label'] }}</span>
                                    </div>
                                    <span class="font-bold text-white text-lg">{{ $impact['value'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Volunteer Section -->
                <div class="group bg-gradient-to-br from-yellow-50 to-amber-50 rounded-3xl p-6 border border-yellow-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-4">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-2xl flex items-center justify-center text-white text-xl mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                            🤝
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ __('BECOME A VOLUNTEER') }}</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-4 group-hover:text-gray-700 transition-colors duration-300">
                        {{ __('Your time can make a difference too. Join our volunteer program and help children directly.') }}
                    </p>
                    <a href="{{ route('volunteer.signup') }}" class="block w-full py-3 bg-gradient-to-r from-yellow-500 to-orange-500 hover:from-yellow-600 hover:to-orange-600 text-white rounded-xl font-bold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-center">
                        {{ __('Sign Up to Volunteer') }}
                    </a>
                </div>

                <!-- Download Resources -->
                <div class="group bg-gradient-to-br from-purple-50 to-indigo-50 rounded-3xl p-6 border border-purple-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-4">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-xl mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                            📄
                        </div>
                        <h3 class="font-bold text-gray-900 text-lg">{{ __('DOWNLOAD') }}</h3>
                    </div>
                    <p class="text-sm text-gray-600 mb-4 group-hover:text-gray-700 transition-colors duration-300">
                        {{ __('Get our annual report, brochures, and informational materials.') }}
                    </p>
                    <a href="{{ route('resources.download') }}" class="block w-full py-3 bg-gradient-to-r from-purple-500 to-indigo-600 hover:from-purple-600 hover:to-indigo-700 text-white rounded-xl font-bold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg text-center">
                        {{ __('Download Resources') }}
                    </a>
                </div>

                <!-- Impact Stories -->
                <div 
                    id="impact-stories"
                    class="bg-white/90 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-6 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 opacity-0 translate-y-4"
                >
                    <h3 class="text-lg font-bold text-gray-900 mb-6 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                        {{ __('Stories of Hope') }}
                    </h3>
                    <div class="space-y-6">
                        @php
                            $stories = [
                                [
                                    'name' => 'Maria, Age 8',
                                    'role' => 'Education Program',
                                    'story' => 'Thanks to donors, I now go to school every day and have books to read. I want to be a teacher when I grow up!',
                                    'image' => 'https://images.unsplash.com/photo-1536623975707-c4b3b2af565d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                                    'gradient' => 'from-blue-500 to-cyan-500'
                                ],
                                [
                                    'name' => 'David, Age 6',
                                    'role' => 'Nutrition Program',
                                    'story' => 'I used to be hungry all the time, but now I get healthy meals every day at the community center.',
                                    'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                                    'gradient' => 'from-green-500 to-emerald-500'
                                ],
                                [
                                    'name' => 'Sofia, Age 10',
                                    'role' => 'Healthcare Program',
                                    'story' => 'When I got sick, the doctors helped me get better. Now I can play with my friends again!',
                                    'image' => 'https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                                    'gradient' => 'from-red-500 to-pink-500'
                                ]
                            ];
                        @endphp
                        
                        @foreach($stories as $index => $story)
                            <div 
                                class="group flex items-start space-x-4 transform transition-all duration-500 hover:-translate-y-1 opacity-0 translate-y-4"
                                style="animation-delay: {{ $index * 150 }}ms"
                            >
                                <div class="relative">
                                    <img
                                        src="{{ $story['image'] }}"
                                        alt="{{ $story['name'] }}"
                                        class="w-14 h-14 rounded-2xl object-cover border-2 border-white shadow-lg transform transition-all duration-500 group-hover:scale-110"
                                        onerror="this.src='{{ asset('assets/default-avatar.jpg') }}'"
                                    />
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-400 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="flex-1">
                                    <h4 class="font-bold text-gray-900 text-sm group-hover:text-gray-800 transition-colors duration-300">{{ $story['name'] }}</h4>
                                    <p class="text-xs text-blue-600 mb-2 font-semibold">{{ $story['role'] }}</p>
                                    <p class="text-xs text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">"{{ $story['story'] }}"</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Contact Info -->
                <div class="bg-gradient-to-br from-gray-50 to-blue-50/30 rounded-3xl p-6 border border-gray-200/50 shadow-lg hover:shadow-xl transition-all duration-500 hover:-translate-y-1 opacity-0 translate-y-4">
                    <h3 class="font-bold text-gray-900 mb-4">{{ __('Need Help?') }}</h3>
                    <div class="space-y-3 text-sm text-gray-600">
                        <div class="flex items-center group">
                            <span class="text-lg mr-3 group-hover:scale-110 transition-transform duration-300">📧</span>
                            <span class="group-hover:text-gray-800 transition-colors duration-300">help@childrenscharity.org</span>
                        </div>
                        <div class="flex items-center group">
                            <span class="text-lg mr-3 group-hover:scale-110 transition-transform duration-300">📞</span>
                            <span class="group-hover:text-gray-800 transition-colors duration-300">+1 (800) 123-4567</span>
                        </div>
                        <div class="flex items-center group">
                            <span class="text-lg mr-3 group-hover:scale-110 transition-transform duration-300">🏛️</span>
                            <span class="group-hover:text-gray-800 transition-colors duration-300">Children\'s Hope Foundation</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Trust Indicators -->
        <div 
            id="trust-indicators"
            class="mt-16 text-center bg-white/80 backdrop-blur-sm rounded-3xl p-8 border border-gray-200/50 shadow-lg opacity-0 translate-y-4"
        >
            <h3 class="text-xl font-bold text-gray-900 mb-8 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent">
                {{ __('Trusted and Verified') }}
            </h3>
            <div class="flex flex-wrap justify-center gap-8 items-center">
                @php
                    $indicators = [
                        ['icon' => '✅', 'text' => 'Verified Non-Profit', 'color' => 'from-green-500 to-emerald-500'],
                        ['icon' => '🔒', 'text' => 'Secure Payments', 'color' => 'from-blue-500 to-cyan-500'],
                        ['icon' => '📊', 'text' => 'Financial Transparency', 'color' => 'from-purple-500 to-pink-500'],
                        ['icon' => '⭐', 'text' => 'Top Rated Charity', 'color' => 'from-yellow-500 to-orange-500']
                    ];
                @endphp
                
                @foreach($indicators as $index => $indicator)
                    <div 
                        class="text-center transform transition-all duration-500 hover:-translate-y-2 group opacity-0 translate-y-4"
                        style="animation-delay: {{ $index * 100 }}ms"
                    >
                        <div class="w-16 h-16 bg-gradient-to-r {{ $indicator['color'] }} rounded-2xl flex items-center justify-center text-white text-2xl mx-auto mb-3 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                            {{ $indicator['icon'] }}
                        </div>
                        <p class="text-sm font-semibold text-gray-700 group-hover:text-gray-900 transition-colors duration-300">{{ $indicator['text'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!-- Animation Styles -->
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
        0%, 100% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
    }
    
    .animate-fade-in-up {
        animation: fade-in-up 0.8s ease-out forwards;
    }
    
    .animate-gradient-x {
        animation: gradient-x 3s ease infinite;
        background-size: 200% 200%;
    }
</style>

<!-- JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize animations on page load
    setTimeout(() => {
        // Animate header
        const header = document.getElementById('header-section');
        if (header) {
            header.classList.remove('opacity-0', 'translate-y-4');
            header.classList.add('animate-fade-in-up');
        }

        // Animate hero images
        const heroImages = document.querySelectorAll('[data-hero-index]');
        heroImages.forEach((img, index) => {
            setTimeout(() => {
                img.classList.remove('opacity-0', 'translate-y-6');
                img.classList.add('animate-fade-in-up');
            }, 200 + (index * 100));
        });

        // Animate donation form
        const form = document.getElementById('donate-form');
        if (form) {
            setTimeout(() => {
                form.classList.remove('opacity-0', 'translate-y-4');
                form.classList.add('animate-fade-in-up');
            }, 500);
        }

        // Animate other sections
        const sections = [
            { id: 'impact-summary', delay: 600 },
            { id: 'impact-stories', delay: 700 },
            { id: 'trust-indicators', delay: 800 }
        ];

        sections.forEach(section => {
            const el = document.getElementById(section.id);
            if (el) {
                setTimeout(() => {
                    el.classList.remove('opacity-0', 'translate-y-4');
                    el.classList.add('animate-fade-in-up');
                    
                    // Animate child elements
                    const children = el.querySelectorAll('.opacity-0');
                    children.forEach((child, index) => {
                        setTimeout(() => {
                            child.classList.remove('opacity-0');
                            child.classList.add('animate-fade-in-up');
                        }, index * 50);
                    });
                }, section.delay);
            }
        });

        // Animate sidebar items
        const sidebarItems = document.querySelectorAll('.space-y-8 > div.opacity-0');
        sidebarItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.remove('opacity-0', 'translate-y-4');
                item.classList.add('animate-fade-in-up');
            }, 700 + (index * 100));
        });

        // Animate quick amount buttons
        const quickAmounts = document.querySelectorAll('.donation-quick-amount');
        quickAmounts.forEach((btn, index) => {
            setTimeout(() => {
                btn.classList.remove('opacity-0', 'translate-y-4');
                btn.classList.add('animate-fade-in-up');
            }, 400 + (index * 50));
        });

        // Animate cause options
        const causeOptions = document.querySelectorAll('.donation-cause');
        causeOptions.forEach((option, index) => {
            setTimeout(() => {
                option.classList.remove('opacity-0', 'translate-y-6');
                option.classList.add('animate-fade-in-up');
            }, 500 + (index * 50));
        });

        // Animate payment methods
        const paymentMethods = document.querySelectorAll('.payment-method');
        paymentMethods.forEach((method, index) => {
            setTimeout(() => {
                method.classList.remove('opacity-0', 'translate-y-6');
                method.classList.add('animate-fade-in-up');
            }, 600 + (index * 50));
        });

    }, 100);
    
    // Donation amount selection
    const quickAmountButtons = document.querySelectorAll('.donation-quick-amount');
    const customAmountInput = document.getElementById('customAmount');
    const donateButton = document.getElementById('donateButton');
    
    quickAmountButtons.forEach(button => {
        button.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');
            
            // Update input value
            customAmountInput.value = amount;
            
            // Remove active state from all buttons
            quickAmountButtons.forEach(btn => {
                btn.classList.remove('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg', 'scale-105');
                btn.classList.add('border-gray-200/50', 'text-gray-700', 'hover:border-blue-300', 'bg-white/80');
                
                // Hide check icon
                const icon = btn.querySelector('svg');
                if (icon) icon.classList.add('hidden');
            });
            
            // Add active state to clicked button
            this.classList.remove('border-gray-200/50', 'text-gray-700', 'hover:border-blue-300', 'bg-white/80');
            this.classList.add('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg', 'scale-105');
            
            // Show check icon
            const icon = this.querySelector('svg');
            if (icon) icon.classList.remove('hidden');
            
            // Update donate button
            updateDonateButton(amount);
        });
    });
    
    // Custom amount input
    customAmountInput.addEventListener('input', function() {
        const amount = this.value;
        
        // Remove active state from quick amount buttons
        quickAmountButtons.forEach(btn => {
            btn.classList.remove('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg', 'scale-105');
            btn.classList.add('border-gray-200/50', 'text-gray-700', 'hover:border-blue-300', 'bg-white/80');
            
            // Hide check icon
            const icon = btn.querySelector('svg');
            if (icon) icon.classList.add('hidden');
        });
        
        // Update donate button
        updateDonateButton(amount);
    });
    
    // Donation cause selection
    const causeOptions = document.querySelectorAll('.donation-cause');
    const selectedCauseDisplay = document.getElementById('selected-cause-display');
    const selectedCauseInput = document.getElementById('selectedCause');
    
    causeOptions.forEach(option => {
        option.addEventListener('click', function() {
            const causeId = this.getAttribute('data-cause');
            const causeIcon = this.getAttribute('data-icon');
            const causeTitle = this.getAttribute('data-title');
            const causeDesc = this.getAttribute('data-desc');
            const causeColor = this.getAttribute('data-color');
            
            // Remove active state from all options
            causeOptions.forEach(opt => {
                opt.classList.remove('border-blue-500', 'bg-blue-50/80', 'shadow-lg', 'scale-105');
                opt.classList.add('border-gray-200/50', 'hover:border-blue-300', 'bg-white/80');
                
                // Hide indicator
                const indicator = opt.querySelector('.w-3.h-3');
                if (indicator) indicator.classList.add('hidden');
            });
            
            // Add active state to clicked option
            this.classList.remove('border-gray-200/50', 'hover:border-blue-300', 'bg-white/80');
            this.classList.add('border-blue-500', 'bg-blue-50/80', 'shadow-lg', 'scale-105');
            
            // Show indicator
            const indicator = this.querySelector('.w-3.h-3');
            if (indicator) indicator.classList.remove('hidden');
            
            // Update selected cause input
            selectedCauseInput.value = causeId;
            
            // Update display
            document.getElementById('selected-cause-icon').innerHTML = causeIcon;
            document.getElementById('selected-cause-icon').className = `w-14 h-14 rounded-2xl bg-gradient-to-r ${causeColor} flex items-center justify-center text-white text-2xl mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg`;
            document.getElementById('selected-cause-title').textContent = causeTitle;
            document.getElementById('selected-cause-desc').textContent = causeDesc;
            
            // Show display
            selectedCauseDisplay.classList.remove('hidden');
        });
    });
    
    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-method');
    const paymentMethodInput = document.getElementById('paymentMethod');
    
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            const methodId = this.getAttribute('data-method');
            
            // Remove active state from all options
            paymentOptions.forEach(opt => {
                opt.classList.remove('border-blue-500', 'bg-blue-50/80', 'shadow-lg', 'scale-105');
                opt.classList.add('border-gray-200/50', 'hover:border-blue-300', 'bg-white/80');
                
                // Hide indicator
                const indicator = opt.querySelector('.w-4.h-4');
                if (indicator) indicator.classList.add('hidden');
            });
            
            // Add active state to clicked option
            this.classList.remove('border-gray-200/50', 'hover:border-blue-300', 'bg-white/80');
            this.classList.add('border-blue-500', 'bg-blue-50/80', 'shadow-lg', 'scale-105');
            
            // Show indicator
            const indicator = this.querySelector('.w-4.h-4');
            if (indicator) indicator.classList.remove('hidden');
            
            // Update payment method input
            paymentMethodInput.value = methodId;
        });
    });
    
    // Recurring donation toggle
    const recurringToggle = document.getElementById('recurringToggle');
    const recurringHandle = document.getElementById('recurringHandle');
    const recurringCheckbox = document.getElementById('recurringDonation');
    const recurringMessage = document.getElementById('recurringMessage');
    
    if (recurringToggle && recurringHandle) {
        recurringToggle.addEventListener('click', function() {
            const isChecked = recurringCheckbox.checked;
            
            recurringCheckbox.checked = !isChecked;
            
            if (!isChecked) {
                recurringToggle.classList.remove('bg-gray-300');
                recurringToggle.classList.add('bg-green-500');
                recurringHandle.classList.add('transform', 'translate-x-6');
                recurringMessage.classList.remove('hidden');
            } else {
                recurringToggle.classList.remove('bg-green-500');
                recurringToggle.classList.add('bg-gray-300');
                recurringHandle.classList.remove('transform', 'translate-x-6');
                recurringMessage.classList.add('hidden');
            }
        });
    }
    
    // Form submission
    const donationForm = document.getElementById('donationForm');
    if (donationForm) {
        donationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const amount = customAmountInput.value;
            const cause = selectedCauseInput.value;
            const paymentMethod = paymentMethodInput.value;
            const isRecurring = recurringCheckbox.checked;
            
            // Basic validation
            if (!amount || amount <= 0) {
                alert('Please enter a valid donation amount.');
                return;
            }
            
            // Here you would typically send the data to your server
            // For now, we'll just show an alert
            console.log({
                amount: amount,
                cause: cause,
                paymentMethod: paymentMethod,
                isRecurring: isRecurring
            });
            
            alert('Thank you for your generous donation to help children in need!');
            
            // In a real application, you would submit the form here
            // this.submit();
        });
    }
    
    // Update donate button function
    function updateDonateButton(amount) {
        if (amount && amount > 0) {
            donateButton.disabled = false;
            donateButton.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
            donateButton.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700', 'text-white', 'shadow-2xl', 'hover:shadow-3xl');
            donateButton.querySelector('span').innerHTML = `Donate $${amount} Now <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>`;
        } else {
            donateButton.disabled = true;
            donateButton.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
            donateButton.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700', 'text-white', 'shadow-2xl', 'hover:shadow-3xl');
            donateButton.querySelector('span').textContent = 'Enter Donation Amount';
        }
    }
    
    // Initialize first cause as selected
    if (causeOptions.length > 0) {
        causeOptions[0].click();
    }
    
    // Initialize first payment method as selected
    if (paymentOptions.length > 0) {
        paymentOptions[0].click();
    }
});
</script>
@endsection