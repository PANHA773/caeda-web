@extends('layouts.app')

@section('title', 'Membership - CAEDA')

@section('extra-css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0) rotate(0deg); }
            25% { transform: translateX(-3px) rotate(-1deg); }
            75% { transform: translateX(3px) rotate(1deg); }
        }
        @keyframes tilt {
            0%, 100% { transform: rotate(0deg) scale(1); }
            25% { transform: rotate(1deg) scale(1.02); }
            75% { transform: rotate(-1deg) scale(1.02); }
        }
        @keyframes spin-slow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes moveBorder {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(400%); }
        }
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.6; }
        }
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-shake { animation: shake 0.8s ease-in-out infinite; }
        .animate-tilt { animation: tilt 2.5s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 8s linear infinite; }
        .animate-moveBorder { animation: moveBorder 4s linear infinite; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        
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
<section class="relative py-20 px-4 md:px-8 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute top-0 left-0 w-72 h-72 bg-white/10 rounded-full -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-purple-400/20 rounded-full translate-x-1/3 translate-y-1/3"></div>
    
    <div class="max-w-7xl mx-auto text-center relative z-10">
        <div class="inline-flex items-center bg-white/20 backdrop-blur-lg rounded-full px-6 py-3 mb-6 animate-fade-in-up">
            <div class="w-2 h-2 bg-green-400 rounded-full mr-2 animate-pulse"></div>
            <span class="text-sm font-semibold">Trusted by 50,000+ professionals worldwide</span>
        </div>
        
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent animate-fade-in-up font-cinzel">
            Unlock Your
            <span class="block bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent animate-gradient-x">
                Potential
            </span>
        </h1>
        
        <p class="text-xl md:text-2xl mb-8 opacity-90 max-w-3xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">
            Join thousands of learners accelerating their careers with our premium membership
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in-up" style="animation-delay: 400ms">
            <button class="group bg-white text-blue-600 hover:bg-gray-50 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg">
                <span class="flex items-center">
                    Start Free Trial
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </button>
            <button class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                <span class="flex items-center">
                    Watch Demo
                    <svg class="w-5 h-5 ml-2 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>

{{-- ================= TRUSTED COMPANIES SECTION ================= --}}
<section class="py-16 bg-white/80 backdrop-blur-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="text-center mb-12">
            <p class="text-gray-500 font-medium text-sm uppercase tracking-wider mb-2">Trusted by Industry Leaders</p>
            <h3 class="text-2xl font-bold text-gray-900">Partnered with Global Innovators</h3>
        </div>
        
        <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-blue-50/30 to-transparent animate-pulse-slow"></div>
            
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 items-center justify-items-center relative z-10">
                @php
                    $trustedCompanies = [
                        [
                            'name' => 'PSBU Leadership Academy',
                            'logo' => '/assets/logos/PSBU Leadership Academy.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://psbu-leadership.com',
                            'animation' => 'float'
                        ],
                        [
                            'name' => 'EBS',
                            'logo' => '/assets/logos/EBS.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://ebs.com',
                            'animation' => 'pulse'
                        ],
                        [
                            'name' => 'PSB University Cambodia',
                            'logo' => '/assets/logos/PSB University Cambodia.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://psbu.edu.kh',
                            'animation' => 'bounce'
                        ],
                        [
                            'name' => 'Post Health Logo',
                            'logo' => '/assets/logos/LOGO ប៉ុស្ដិ៍សុខភាព221.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://posthealth.com',
                            'animation' => 'spin-slow'
                        ],
                        [
                            'name' => 'PSBU',
                            'logo' => '/assets/logos/PSBU.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://psbu.edu.kh',
                            'animation' => 'tilt'
                        ],
                        [
                            'name' => 'SDG',
                            'logo' => '/assets/logos/SDG.png',
                            'width' => 120,
                            'height' => 120,
                            'url' => 'https://sdg.org',
                            'animation' => 'float'
                        ],
                    ];
                @endphp
                
                @foreach($trustedCompanies as $index => $company)
                    <div class="group relative" style="animation-delay: {{ $index * 100 }}ms">
                        <div class="relative transform transition-all duration-500 group-hover:scale-110 group-hover:z-20">
                            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-purple-500 rounded-2xl blur-md opacity-0 group-hover:opacity-30 transition-opacity duration-500"></div>
                            
                            <div class="relative bg-white rounded-xl p-4 shadow-lg border border-gray-100 backdrop-blur-sm transition-all duration-500 ease-out group-hover:shadow-2xl group-hover:border-blue-200 hover:animate-{{ $company['animation'] }}">
                                <img 
                                    src="{{ asset($company['logo']) }}" 
                                    alt="{{ $company['name'] }}"
                                    class="object-contain transition-all duration-300 group-hover:brightness-110 group-hover:contrast-110"
                                    style="width: {{ $company['width'] }}px; height: {{ $company['height'] }}px"
                                    onerror="this.src='{{ asset('assets/default-logo.png') }}'">
                            </div>
                            
                            <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 translate-y-full opacity-0 group-hover:opacity-100 transition-all duration-300 pointer-events-none z-30">
                                <div class="bg-gray-900 text-white text-xs font-medium px-3 py-2 rounded-lg whitespace-nowrap shadow-xl">
                                    {{ $company['name'] }}
                                    <div class="absolute -top-1 left-1/2 transform -translate-x-1/2 w-2 h-2 bg-gray-900 rotate-45"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 relative">
                <div class="h-px bg-gradient-to-r from-transparent via-gray-300 to-transparent"></div>
                <div class="absolute top-0 left-0 w-1/3 h-px bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500 animate-moveBorder"></div>
            </div>
        </div>
    </div>
</section>

{{-- ================= MEMBER COMPANIES SECTION ================= --}}
<section class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Join Our <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Community</span> of Innovators
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Teams from top companies are already transforming their skills with our platform
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @php
                $memberCompanies = [
                    [
                        'name' => 'TechCorp',
                        'logo' => '💻',
                        'members' => 45,
                        'industry' => 'Technology',
                        'color' => 'from-blue-500 to-cyan-500',
                        'animation' => 'bounce'
                    ],
                    [
                        'name' => 'DesignStudio',
                        'logo' => '🎨',
                        'members' => 28,
                        'industry' => 'Design',
                        'color' => 'from-purple-500 to-pink-500',
                        'animation' => 'pulse'
                    ],
                    [
                        'name' => 'DataInsights',
                        'logo' => '📊',
                        'members' => 67,
                        'industry' => 'Analytics',
                        'color' => 'from-green-500 to-teal-500',
                        'animation' => 'float'
                    ],
                    [
                        'name' => 'StartupXYZ',
                        'logo' => '🚀',
                        'members' => 15,
                        'industry' => 'Startup',
                        'color' => 'from-orange-500 to-red-500',
                        'animation' => 'shake'
                    ],
                    [
                        'name' => 'EduTech Pro',
                        'logo' => '📚',
                        'members' => 52,
                        'industry' => 'Education',
                        'color' => 'from-indigo-500 to-purple-500',
                        'animation' => 'spin-slow'
                    ],
                    [
                        'name' => 'FinancePlus',
                        'logo' => '💰',
                        'members' => 38,
                        'industry' => 'Finance',
                        'color' => 'from-emerald-500 to-green-500',
                        'animation' => 'tilt'
                    ]
                ];
            @endphp
            
            @foreach($memberCompanies as $index => $company)
                <div 
                    class="group bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg hover:shadow-2xl border border-gray-100 hover:border-blue-200 transition-all duration-500 transform hover:-translate-y-2 cursor-pointer overflow-hidden animate-fade-in-up"
                    style="animation-delay: {{ $index * 150 }}ms"
                >
                    <div class="absolute inset-0 bg-gradient-to-br {{ $company['color'] }} opacity-0 group-hover:opacity-5 transition-opacity duration-500"></div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center">
                                <div class="text-4xl mr-4 transition-all duration-500 transform group-hover:scale-110 group-hover:animate-{{ $company['animation'] }}">
                                    {{ $company['logo'] }}
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-900 group-hover:text-gray-800 transition-colors duration-300">
                                        {{ $company['name'] }}
                                    </h3>
                                    <p class="text-sm text-gray-600">{{ $company['industry'] }}</p>
                                </div>
                            </div>
                            <span class="bg-blue-100 text-blue-600 group-hover:bg-blue-600 group-hover:text-white text-xs font-bold px-3 py-1 rounded-full transition-all duration-300 transform group-hover:scale-105">
                                {{ $company['members'] }} members
                            </span>
                        </div>
                        
                        <div class="flex space-x-2">
                            @for($i = 0; $i < 5; $i++)
                                <div 
                                    class="w-8 h-8 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white text-xs font-bold transition-all duration-300 hover:scale-125 hover:rotate-12 shadow-md"
                                >
                                    {{ $i + 1 }}
                                </div>
                            @endfor
                            <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center text-gray-600 text-xs hover:bg-blue-500 hover:text-white transition-all duration-300 shadow-md group-hover:animate-pulse">
                                +
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- PREMIUM MEMBERS --}}
        <div class="bg-gradient-to-br from-white to-blue-50/30 rounded-3xl shadow-2xl p-8 border border-gray-200/50 backdrop-blur-sm animate-fade-in-up">
            <div class="text-center mb-8">
                <h3 class="text-3xl font-bold text-gray-900 mb-2">
                    Success <span class="bg-gradient-to-r from-green-500 to-teal-500 bg-clip-text text-transparent">Stories</span>
                </h3>
                <p class="text-gray-600">Real people, real results</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @php
                    $premiumMembers = [
                        [
                            'name' => 'Sarah Johnson',
                            'role' => 'Senior Developer',
                            'company' => 'Google',
                            'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'achievement' => 'Promoted to Senior Role',
                            'joined' => '2 years ago',
                            'gradient' => 'from-blue-500 to-purple-600'
                        ],
                        [
                            'name' => 'Mike Chen',
                            'role' => 'Data Scientist',
                            'company' => 'Netflix',
                            'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'achievement' => '50% Salary Increase',
                            'joined' => '1 year ago',
                            'gradient' => 'from-green-500 to-teal-600'
                        ],
                        [
                            'name' => 'Emma Wilson',
                            'role' => 'Product Manager',
                            'company' => 'Spotify',
                            'avatar' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'achievement' => 'Led 3 Successful Launches',
                            'joined' => '18 months ago',
                            'gradient' => 'from-pink-500 to-rose-600'
                        ]
                    ];
                @endphp
                
                @foreach($premiumMembers as $index => $member)
                    <div class="group text-center p-6 rounded-2xl bg-white/50 backdrop-blur-sm border border-gray-200/50 hover:border-transparent transition-all duration-500 transform hover:-translate-y-2 hover:shadow-xl animate-fade-in-up" style="animation-delay: {{ $index * 200 }}ms">
                        <div class="relative inline-block mb-4">
                            <div class="absolute inset-0 bg-gradient-to-br {{ $member['gradient'] }} rounded-full blur-md opacity-0 group-hover:opacity-70 transition-opacity duration-500"></div>
                            <img
                                src="{{ $member['avatar'] }}"
                                alt="{{ $member['name'] }}"
                                class="relative w-20 h-20 rounded-full mx-auto border-4 border-white shadow-lg group-hover:scale-110 transition-transform duration-500 z-10"
                            />
                        </div>
                        
                        <h4 class="font-bold text-gray-900 text-lg mb-1">{{ $member['name'] }}</h4>
                        <p class="text-sm text-gray-600 mb-3">{{ $member['role'] }} at {{ $member['company'] }}</p>
                        
                        <div class="bg-gradient-to-r from-green-50 to-teal-50 border border-green-200 rounded-xl p-3 mb-3 group-hover:shadow-md transition-shadow duration-300">
                            <span class="text-green-700 text-sm font-semibold">{{ $member['achievement'] }}</span>
                        </div>
                        
                        <p class="text-xs text-gray-500">Member since {{ $member['joined'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ================= PRICING TOGGLE ================= --}}
<section class="py-16 bg-white/80 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 md:px-8 text-center">
        <div class="inline-flex bg-gray-100 rounded-2xl p-1 shadow-inner">
            <button
                id="monthly-plan"
                class="pricing-toggle px-8 py-4 rounded-xl font-semibold transition-all duration-300"
                data-plan="monthly"
            >
                Monthly
            </button>
            <button
                id="annual-plan"
                class="pricing-toggle px-8 py-4 rounded-xl font-semibold transition-all duration-300 bg-gradient-to-r from-blue-500 to-purple-500 text-white shadow-lg transform scale-105"
                data-plan="annual"
            >
                <span class="flex items-center">
                    Annual 
                    <span class="ml-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">
                        Save 30%
                    </span>
                </span>
            </button>
        </div>
    </div>
</section>

{{-- ================= PRICING CARDS ================= --}}
<section class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $membershipPlans = [
                    [
                        'id' => 'basic',
                        'name' => 'Basic',
                        'price' => ['monthly' => 9.99, 'annual' => 99.99],
                        'description' => 'Perfect for beginners starting their journey',
                        'features' => [
                            'Access to basic courses',
                            'Community support',
                            'Weekly Q&A sessions',
                            'Basic progress tracking',
                            'Email support'
                        ],
                        'popular' => false,
                        'color' => 'gray',
                        'gradient' => 'from-gray-500 to-gray-700',
                        'membersCount' => '10K+',
                        'badge' => 'Starter'
                    ],
                    [
                        'id' => 'pro',
                        'name' => 'Professional',
                        'price' => ['monthly' => 29.99, 'annual' => 299.99],
                        'description' => 'Ideal for serious learners and professionals',
                        'features' => [
                            'All Basic features',
                            'Unlimited course access',
                            'Priority support',
                            'Certification programs',
                            'Project reviews',
                            'Career guidance',
                            '1-on-1 mentoring sessions'
                        ],
                        'popular' => true,
                        'color' => 'blue',
                        'gradient' => 'from-blue-500 to-purple-600',
                        'membersCount' => '5K+',
                        'badge' => 'Most Popular'
                    ],
                    [
                        'id' => 'enterprise',
                        'name' => 'Enterprise',
                        'price' => ['monthly' => 79.99, 'annual' => 799.99],
                        'description' => 'For teams and organizations',
                        'features' => [
                            'All Professional features',
                            'Team management dashboard',
                            'Custom learning paths',
                            'API access',
                            'Dedicated account manager',
                            'White-label options',
                            'Advanced analytics',
                            'SSO integration'
                        ],
                        'popular' => false,
                        'color' => 'purple',
                        'gradient' => 'from-purple-500 to-pink-600',
                        'membersCount' => '500+',
                        'badge' => 'Teams'
                    ]
                ];
            @endphp
            
            @foreach($membershipPlans as $index => $plan)
                @php
                    $monthlyTotal = $plan['price']['monthly'] * 12;
                    $savings = $monthlyTotal - $plan['price']['annual'];
                    $percentage = round(($savings / $monthlyTotal) * 100);
                @endphp
                
                <div
                    data-plan="{{ $plan['id'] }}"
                    class="pricing-card relative group bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-4 animate-fade-in-up {{ $plan['popular'] ? 'ring-4 ring-blue-500/20 scale-105' : '' }}"
                    style="animation-delay: {{ $index * 200 }}ms"
                >
                    @if($plan['popular'])
                        <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 z-20">
                            <span class="bg-gradient-to-r from-blue-500 to-purple-500 text-white px-6 py-3 rounded-full text-sm font-bold shadow-lg">
                                {{ $plan['badge'] }} ✨
                            </span>
                        </div>
                    @endif
                    
                    <div class="p-8">
                        <div class="flex justify-between items-start mb-6">
                            <div class="font-bold text-lg bg-gradient-to-r {{ $plan['gradient'] }} bg-clip-text text-transparent">
                                {{ $plan['name'] }}
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs font-medium px-3 py-1 rounded-full group-hover:bg-gray-200 transition-colors duration-300">
                                {{ $plan['membersCount'] }} members
                            </span>
                        </div>
                        
                        <div class="mb-6">
                            <span class="price-display text-5xl font-bold text-gray-900" data-plan="{{ $plan['id'] }}" data-monthly="{{ $plan['price']['monthly'] }}" data-annual="{{ $plan['price']['annual'] }}">
                                ${{ $plan['price']['annual'] }}
                            </span>
                            <span class="period-display text-gray-600 ml-2 text-lg" data-plan="{{ $plan['id'] }}">
                                /year
                            </span>
                        </div>
                        
                        <div class="savings-display hidden bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-4 mb-6 group-hover:shadow-md transition-shadow duration-300" 
                             data-plan="{{ $plan['id'] }}"
                             data-savings="{{ $savings }}"
                             data-percentage="{{ $percentage }}">
                            <div class="text-green-700 font-semibold text-lg">
                                Save ${{ $savings }} ({{ $percentage }}%)
                            </div>
                            <div class="text-green-600 text-sm">
                                Compared to monthly billing
                            </div>
                        </div>
                        
                        <p class="text-gray-600 mb-8 leading-relaxed">{{ $plan['description'] }}</p>
                        
                        <ul class="space-y-4 mb-8">
                            @foreach($plan['features'] as $feature)
                                <li class="flex items-center group">
                                    <div class="w-6 h-6 bg-green-100 rounded-full flex items-center justify-center mr-3 group-hover:bg-green-500 transition-colors duration-300">
                                        <svg class="w-4 h-4 text-green-500 group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <span class="text-gray-700 group-hover:text-gray-900 transition-colors duration-300">{{ $feature }}</span>
                                </li>
                            @endforeach
                        </ul>
                        
                        <button
                            onclick="subscribeToPlan('{{ $plan['id'] }}')"
                            class="subscribe-btn w-full py-4 px-6 rounded-2xl font-semibold transition-all duration-300 {{ $plan['popular'] ? 'bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white shadow-lg hover:shadow-xl transform hover:scale-105' : 'bg-gray-100 hover:bg-gray-200 text-gray-900 hover:shadow-lg' }}"
                            data-plan="{{ $plan['id'] }}"
                        >
                            Get Started
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= BENEFITS SECTION ================= --}}
<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                Membership <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">Benefits</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Get more than just courses - unlock a complete learning ecosystem designed for your success
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @php
                $benefits = [
                    [
                        'icon' => '🎯',
                        'title' => 'Personalized Learning',
                        'description' => 'Custom learning paths tailored to your goals and skill level',
                        'gradient' => 'from-blue-500 to-cyan-500'
                    ],
                    [
                        'icon' => '⚡',
                        'title' => 'Unlimited Access',
                        'description' => 'Learn at your own pace with 24/7 access to all content',
                        'gradient' => 'from-purple-500 to-pink-500'
                    ],
                    [
                        'icon' => '👥',
                        'title' => 'Expert Community',
                        'description' => 'Join a network of professionals and industry experts',
                        'gradient' => 'from-green-500 to-teal-500'
                    ],
                    [
                        'icon' => '📊',
                        'title' => 'Progress Tracking',
                        'description' => 'Monitor your growth with detailed analytics and reports',
                        'gradient' => 'from-orange-500 to-red-500'
                    ],
                    [
                        'icon' => '🏆',
                        'title' => 'Certification',
                        'description' => 'Earn recognized certificates to boost your career',
                        'gradient' => 'from-indigo-500 to-purple-500'
                    ],
                    [
                        'icon' => '💼',
                        'title' => 'Career Support',
                        'description' => 'Get job placement assistance and career guidance',
                        'gradient' => 'from-emerald-500 to-green-500'
                    ]
                ];
            @endphp
            
            @foreach($benefits as $index => $benefit)
                <div 
                    class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg hover:shadow-2xl border border-gray-200/50 hover:border-transparent transition-all duration-500 transform hover:-translate-y-2 animate-fade-in-up"
                    style="animation-delay: {{ $index * 100 }}ms"
                >
                    <div class="text-5xl mb-6 transform group-hover:scale-110 transition-transform duration-500 group-hover:animate-bounce">
                        {{ $benefit['icon'] }}
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4 group-hover:text-gray-800 transition-colors duration-300">
                        {{ $benefit['title'] }}
                    </h3>
                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                        {{ $benefit['description'] }}
                    </p>
                    
                    <div class="absolute inset-0 bg-gradient-to-br {{ $benefit['gradient'] }} opacity-0 group-hover:opacity-5 rounded-3xl transition-opacity duration-500 -z-10"></div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ================= FINAL CTA ================= --}}
<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-black/20"></div>
    <div class="absolute top-0 right-0 w-96 h-96 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-purple-400/20 rounded-full translate-y-1/2 -translate-x-1/2"></div>
    
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <div class="grid grid-cols-3 gap-8 mb-12">
            @php
                $stats = [
                    ['number' => '50K+', 'label' => 'Active Members'],
                    ['number' => '500+', 'label' => 'Companies'],
                    ['number' => '95%', 'label' => 'Success Rate']
                ];
            @endphp
            
            @foreach($stats as $index => $stat)
                <div class="text-center animate-fade-in-up" style="animation-delay: {{ $index * 200 }}ms">
                    <div class="text-4xl font-bold mb-2 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent">
                        {{ $stat['number'] }}
                    </div>
                    <div class="text-blue-200 font-medium">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
        
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 animate-fade-in-up" style="animation-delay: 400ms">
            Ready to Transform Your <span class="bg-gradient-to-r from-cyan-400 to-blue-400 bg-clip-text text-transparent">Career</span>?
        </h2>
        <p class="text-xl mb-8 opacity-90 max-w-2xl mx-auto animate-fade-in-up" style="animation-delay: 600ms">
            Join our community of successful professionals today and start your journey
        </p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-6 animate-fade-in-up" style="animation-delay: 800ms">
            <button onclick="startFreeTrial()" class="group bg-white text-blue-600 hover:bg-gray-50 font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg">
                <span class="flex items-center">
                    Start 7-Day Free Trial
                    <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </button>
            <button onclick="scheduleDemo()" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm">
                <span class="flex items-center">
                    Schedule a Demo
                    <svg class="w-5 h-5 ml-2 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </span>
            </button>
        </div>
        
        <p class="text-sm opacity-80 animate-fade-in-up" style="animation-delay: 1000ms">No credit card required • Cancel anytime • 24/7 Support</p>
    </div>
</section>

{{-- Loading Spinner Template --}}
<div id="loading-spinner" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center">
    <div class="bg-white p-8 rounded-2xl shadow-2xl text-center">
        <svg class="animate-spin mx-auto h-12 w-12 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        <p class="mt-4 text-lg font-semibold text-gray-800">Processing...</p>
    </div>
</div>

@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Current selected plan (annual by default)
    let selectedPlan = 'annual';
    
    // Initialize pricing display
    updatePricingDisplay();
    
    // Pricing toggle functionality
    const pricingToggles = document.querySelectorAll('.pricing-toggle');
    pricingToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const planType = this.dataset.plan;
            selectPlan(planType);
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
    
    // Function to select plan
    function selectPlan(planType) {
        selectedPlan = planType;
        
        // Update toggle buttons
        pricingToggles.forEach(toggle => {
            if (toggle.dataset.plan === planType) {
                toggle.classList.add('bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white', 'shadow-lg', 'transform', 'scale-105');
                toggle.classList.remove('text-gray-600', 'hover:text-gray-900', 'hover:bg-white/50');
                
                // Update annual button content
                if (planType === 'annual') {
                    toggle.innerHTML = `
                        <span class="flex items-center">
                            Annual 
                            <span class="ml-2 bg-green-500 text-white text-xs px-2 py-1 rounded-full">
                                Save 30%
                            </span>
                        </span>
                    `;
                }
            } else {
                toggle.classList.remove('bg-gradient-to-r', 'from-blue-500', 'to-purple-500', 'text-white', 'shadow-lg', 'transform', 'scale-105');
                toggle.classList.add('text-gray-600', 'hover:text-gray-900', 'hover:bg-white/50');
                
                // Reset monthly button
                if (toggle.dataset.plan === 'monthly') {
                    toggle.textContent = 'Monthly';
                }
            }
        });
        
        // Update pricing display
        updatePricingDisplay();
    }
    
    // Function to update pricing display
    function updatePricingDisplay() {
        const pricingCards = document.querySelectorAll('.pricing-card');
        
        pricingCards.forEach(card => {
            const planId = card.dataset.plan;
            const priceDisplay = card.querySelector('.price-display');
            const periodDisplay = card.querySelector('.period-display');
            const savingsDisplay = card.querySelector('.savings-display');
            
            const monthlyPrice = priceDisplay.dataset.monthly;
            const annualPrice = priceDisplay.dataset.annual;
            const savings = savingsDisplay?.dataset.savings;
            const percentage = savingsDisplay?.dataset.percentage;
            
            if (selectedPlan === 'monthly') {
                priceDisplay.textContent = `$${monthlyPrice}`;
                periodDisplay.textContent = '/month';
                
                // Hide savings display
                if (savingsDisplay) {
                    savingsDisplay.classList.add('hidden');
                }
            } else {
                priceDisplay.textContent = `$${annualPrice}`;
                periodDisplay.textContent = '/year';
                
                // Show savings display
                if (savingsDisplay) {
                    savingsDisplay.classList.remove('hidden');
                    savingsDisplay.querySelector('.text-green-700').innerHTML = 
                        `Save $${savings} (${percentage}%)`;
                }
            }
        });
    }
    
    // Function to subscribe to a plan
    window.subscribeToPlan = function(planId) {
        const button = document.querySelector(`.subscribe-btn[data-plan="${planId}"]`);
        const originalText = button.innerHTML;
        
        // Show loading
        button.innerHTML = `
            <span class="flex items-center justify-center">
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Processing...
            </span>
        `;
        button.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            // Reset button
            button.innerHTML = originalText;
            button.disabled = false;
            
            // Show success message
            alert(`Successfully subscribed to ${planId.charAt(0).toUpperCase() + planId.slice(1)} plan!`);
            
            // In a real application, you would:
            // 1. Send data to your Laravel backend
            // 2. Process payment
            // 3. Redirect to success page
            // 
            // Example:
            // fetch('/api/subscribe', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     },
            //     body: JSON.stringify({
            //         plan: planId,
            //         period: selectedPlan
            //     })
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         window.location.href = data.redirect_url;
            //     } else {
            //         alert(data.message);
            //     }
            // });
            
        }, 2000);
    };
    
    // Start free trial function
    window.startFreeTrial = function() {
        showLoading();
        
        setTimeout(() => {
            hideLoading();
            alert('Free trial started! Check your email for confirmation.');
            
            // In a real application:
            // fetch('/api/free-trial', {
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            //     }
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         window.location.href = '/dashboard';
            //     }
            // });
        }, 1500);
    };
    
    // Schedule demo function
    window.scheduleDemo = function() {
        const demoTime = prompt('What time works best for you? (e.g., "Monday 2 PM")');
        if (demoTime) {
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                alert(`Demo scheduled for ${demoTime}! We'll send a confirmation email shortly.`);
            }, 1500);
        }
    };
    
    // Loading functions
    function showLoading() {
        document.getElementById('loading-spinner').classList.remove('hidden');
    }
    
    function hideLoading() {
        document.getElementById('loading-spinner').classList.add('hidden');
    }
    
    // Enhanced hover effects for cards
    const cards = document.querySelectorAll('.pricing-card, [class*="bg-white"]');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            card.classList.add('shadow-2xl');
        });
        
        card.addEventListener('mouseleave', () => {
            card.classList.remove('shadow-2xl');
        });
    });
});
</script>
@endsection