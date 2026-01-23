@extends('layouts.app')

@section('title', 'Leadership Team - CAEDA')

@section('extra-css')
<link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
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

    .animate-fade-in-up {
        animation: fade-in-up .8s ease-out forwards;
    }

    .animate-gradient-x {
        animation: gradient-x 3s ease infinite;
        background-size: 200% 200%;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .5;
        }
    }

    .font-khmer {
        font-family: 'Odor Mean Chey', cursive;
    }

    .font-english {
        font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
</style>
@endsection

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        {{-- ================= ENHANCED HEADER SECTION ================= --}}
        <div data-animate class="text-center mb-16 transform transition-all duration-1000">
            <div class="inline-flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 mb-6 shadow-lg border border-gray-200/50">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700 font-english">PSBU International Project Committee</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent animate-gradient-x">
                Leadership Team
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto bg-white/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-200/50 shadow-sm">
                Leading the transformation of higher education through international collaboration and innovative initiatives
            </p>
            {{-- Header / branding image from public assets --}}
            <div class="mt-6 flex justify-center">
                <img src="/assets/ASEAN-01-01.png" alt="PSBU Leadership Academy" class="h-40 object-contain">
            </div>
        </div>

        {{-- ================= LEADER TEAM SECTION ================= --}}
        <div data-animate class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent mb-4">
                    Cambodia-ASEAN Educational Development Association
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($leaderTeams as $index => $leader)
                <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-2xl transition-transform duration-500 hover:-translate-y-3"
                    style="animation-delay: {{ $index * 100 }}ms">

                    <div class="flex flex-col items-center text-center gap-4">

                        {{-- Image / Initials --}}
                        <div class="w-36 h-36 rounded-2xl overflow-hidden relative flex items-center justify-center shadow-lg transform transition-all duration-500 group-hover:scale-105 group-hover:rotate-3">
                            @php
                            // Full URL to image if exists
                            $imagePath = $leader->image && file_exists(public_path('storage/' . $leader->image))
                            ? asset('storage/' . $leader->image)
                            : null;

                            // Calculate initials
                            $initials = implode('', array_map(fn($n) => strtoupper(substr($n, 0, 1)), explode(' ', $leader->name)));
                            @endphp

                            @if($imagePath)
                            <img src="{{ $imagePath }}" alt="{{ $leader->name }}" class="w-full h-full object-cover">
                            @else
                            <div class="w-full h-full bg-gradient-to-br {{ $leader->gradient ?? 'from-blue-500 to-indigo-600' }} flex items-center justify-center text-white text-2xl font-bold">
                                {{ $initials }}
                            </div>
                            @endif
                        </div>

                        {{-- Text --}}
                        <div class="flex flex-col gap-1">
                            <h3 class="text-lg font-bold text-gray-900">{{ $leader->name }}</h3>
                            <p class="text-gray-600 text-sm font-medium">{{ $leader->position }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ================= ENHANCED PROJECT OVERVIEW ================= --}}
        @if($projectOverviews->count())
        @foreach($projectOverviews as $overview)
        <div data-animate
            class="group bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">

            {{-- Title --}}
            <h2
                class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent text-center font-english">
                {{ $overview->title }}
            </h2>

            {{-- Content --}}
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6 font-english">
                @foreach(explode("\n\n", $overview->description) as $paragraph)
                <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900">
                    {{ $paragraph }}
                </p>
                @endforeach
            </div>
        </div>
        @endforeach
        @endif





{{-- ================= ENHANCED OFFICE MANAGER TEAM ================= --}}

<div data-animate
     class="bg-gradient-to-br from-green-50/80 to-teal-50/80 backdrop-blur-sm
            rounded-3xl p-8 md:p-10 mb-16 border border-green-200/50
            shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">

    <!-- HEADER -->
    <div class="text-center mb-10">
        <h2 class="text-2xl md:text-3xl font-bold mb-4
                   bg-gradient-to-r from-green-900 to-teal-900
                   bg-clip-text text-transparent font-english">
            Office Manager
        </h2>
        <div class="w-20 h-1.5 bg-gradient-to-r from-green-500 to-teal-500
                    mx-auto rounded-full animate-pulse"></div>
    </div>

    <!-- GRID -->
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">

        @foreach($managers as $index => $member)
            @php
                // Initials fallback
                $initials = collect(explode(' ', $member->name))
                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                    ->implode('');

                // Full image path check
                $imagePath = $member->image && file_exists(public_path('storage/' . $member->image))
                    ? asset('storage/' . $member->image)
                    : null;
            @endphp

            <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-4 text-center
                        border border-gray-200/50 hover:shadow-lg
                        transition-all duration-300 hover:-translate-y-2 cursor-pointer"
                 style="animation-delay: {{ $index * 50 }}ms">

                <!-- IMAGE / INITIALS -->
                <div class="w-28 h-28 md:w-32 md:h-32 rounded-2xl overflow-hidden mx-auto mb-3 relative shadow-md">
                    
                    @if($imagePath)
                        <img src="{{ $imagePath }}"
                             alt="{{ $member->name }}"
                             class="w-full h-full object-cover transition-transform duration-500
                                    group-hover:scale-105">
                    @else
                        <div class="w-full h-full flex items-center justify-center
                                    bg-gradient-to-br {{ $member->gradient ?? 'from-green-500 to-teal-600' }}
                                    text-white font-bold text-2xl">
                            {{ $initials }}
                        </div>
                    @endif

                </div>

                <!-- NAME & POSITION -->
                <p class="text-gray-800 text-sm font-medium
                          group-hover:text-gray-900 transition-colors
                          duration-300 leading-tight font-english">
                    {{ $member->name }}
                </p>
                <p class="text-gray-600 text-xs font-medium
                          group-hover:text-gray-700 transition-colors
                          duration-300 font-english">
                    {{ $member->position }}
                </p>

            </div>
        @endforeach

    </div>
</div>




        {{-- ================= ENHANCED ADMINISTRATIVE AND MEDIA TEAM ================= --}}

        <div data-animate class="bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-indigo-900 bg-clip-text text-transparent font-english">
                    Caeda​ Staff
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @php
                $staffMembers = \App\Models\Staff::orderBy('order', 'asc')->get();
                @endphp

                @foreach($staffMembers as $index => $member)
                @php
                $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $member->name));
                $initials = implode('', array_map(function($name) {
                return strtoupper(substr($name, 0, 1));
                }, explode(' ', $member->name)));
                @endphp

                <div class="group bg-white/90 backdrop-blur-sm rounded-xl p-4 text-center border border-gray-200/50 hover:shadow-lg transition-all duration-300 hover:-translate-y-2 cursor-pointer"
                    style="animation-delay: {{ $index * 50 }}ms">
                    <!-- <div class="w-24 h-24 rounded-[15px] overflow-hidden mx-auto mb-3 relative"> -->
                        <div class="w-28 h-28 md:w-32 md:h-32 rounded-xl overflow-hidden mx-auto mb-3 relative">

                        @if($member->image && file_exists(public_path('storage/' . $member->image)))
                        <img src="{{ asset('storage/' . $member->image) }}"
                            alt="{{ $member->name }}"
                            class="w-full h-full object-cover rounded-[15px]"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold text-xl hidden rounded-[15px]">
                            {{ $initials }}
                        </div>
                        @else
                        <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold text-xl rounded-[15px]">
                            {{ $initials }}
                        </div>
                        @endif
                    </div>
                    <p class="text-gray-800 text-sm font-medium group-hover:text-gray-900 transition-colors duration-300 leading-tight font-english">
                        {{ $member->name }}
                    </p>
                    <p class="text-gray-600 text-xs font-medium group-hover:text-gray-700 transition-colors duration-300 font-english">
                        {{ $member->position }}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

        {{-- ================= ENHANCED VISION & MISSION SECTION ================= --}}
        <div data-animate class="grid md:grid-cols-2 gap-8 mb-16">
            @foreach($visionMissions as $vm)
            <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center mb-6">
                    <div class="w-14 h-14 
                    {{ $vm->type === 'vision' ? 'bg-gradient-to-br from-purple-500 to-pink-600' : 'bg-gradient-to-br from-blue-500 to-cyan-600' }} 
                    rounded-2xl flex items-center justify-center mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                        <span class="text-2xl">
                            {{ $vm->type === 'vision' ? '🌍' : '🎯' }}
                        </span>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 
                    {{ $vm->type === 'vision' ? 'bg-gradient-to-r from-purple-900 to-pink-900' : 'bg-gradient-to-r from-blue-900 to-cyan-900' }} 
                    bg-clip-text text-transparent font-english">
                        {{ ucfirst($vm->type) }}
                    </h3>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg transform transition-all duration-500 group-hover:translate-x-2 group-hover:text-gray-900 font-english">
                    {{ $vm->description }}
                </p>
            </div>
            @endforeach
        </div>



        {{-- ================= ENHANCED GOALS & STRATEGIES ================= --}}
        <div data-animate class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-english">
                    Goals & Strategies
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                {{-- Goals --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-gray-200/50 font-english">
                        Our Goals
                    </h3>
                    <div class="space-y-6">
                        @foreach($goals as $index => $goal)
                        <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2"
                            style="animation-delay: {{ $index * 100 }}ms">
                            <div class="flex items-start space-x-4">
                                <div class="text-3xl transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                                    {{ $goal->icon }}
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300 font-english">
                                        {{ $goal->title }}
                                    </h4>
                                    <p class="text-gray-600 text-lg leading-relaxed group-hover:text-gray-700 transition-colors duration-300 font-english">
                                        {{ $goal->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Strategies --}}
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-gray-200/50 font-english">
                        Our Strategies
                    </h3>
                    <div class="space-y-6">
                        @foreach($strategies as $index => $strategy)
                        <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2"
                            style="animation-delay: {{ $index * 100 }}ms">
                            <div class="flex items-start space-x-4">
                                <div class="text-3xl transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                                    {{ $strategy->icon }}
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300 font-english">
                                        {{ $strategy->title }}
                                    </h4>
                                    <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 font-english">
                                        {{ $strategy->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {{-- ================= ENHANCED VALUES & BENEFITS ================= --}}
        <div data-animate
            class="bg-gradient-to-br from-blue-50/80 to-purple-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">

            {{-- Header --}}
            <div class="text-center mb-10">
                <h2
                    class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-english">
                    Values and Benefits of Studying at PSBU
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            {{-- Content --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                @forelse($valuesBenefits as $index => $benefit)
                <div class="group bg-white/90 backdrop-blur-sm rounded-xl p-4 border border-gray-200/50
                        hover:shadow-lg transition-all duration-300 hover:-translate-y-2 cursor-pointer"
                    style="animation-delay: {{ $index * 60 }}ms">

                    <div class="flex items-center space-x-3">
                        {{-- Number --}}
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full
                               flex items-center justify-center text-white font-bold text-xs
                               transform transition-all duration-300
                               group-hover:scale-110 group-hover:rotate-12 shadow-md flex-shrink-0">
                            {{ $index + 1 }}
                        </div>

                        {{-- Text --}}
                        <p
                            class="text-gray-700 text-sm font-medium leading-relaxed
                               group-hover:text-gray-900 transition-colors duration-300 font-english">
                            {{ $benefit->title }}
                        </p>
                    </div>
                </div>
                @empty
                <p class="col-span-full text-center text-gray-500 text-sm">
                    No values & benefits available at the moment.
                </p>
                @endforelse
            </div>
        </div>

        {{-- ================= ENHANCED ACCREDITATION SECTION ================= --}}
        <div data-animate class="bg-gradient-to-br from-gray-800 via-gray-900 to-blue-900 rounded-3xl p-8 md:p-10 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
            {{-- Background Elements --}}
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -translate-x-1/3 translate-y-1/3"></div>

            <div class="relative z-10 font-english">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 bg-gradient-to-r from-blue-300 to-purple-300 bg-clip-text text-transparent">
                        Accreditations & Recognition
                    </h2>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto rounded-full animate-pulse"></div>
                </div>

                <p class="text-gray-300 text-center mb-10 text-lg max-w-3xl mx-auto font-english">
                    PSBU's commitment to academic excellence is reflected in our prestigious accreditations and international recognitions.
                </p>

                <div class="grid md:grid-cols-2 gap-8">
                    {{-- International Accreditations --}}
                    <div class="transform transition-all duration-500 hover:-translate-y-1">
                        <h3 class="text-xl md:text-2xl font-bold mb-6 text-blue-300 bg-blue-900/30 p-4 rounded-2xl text-center font-english">
                            International Accreditations
                        </h3>
                        <ul class="space-y-3 text-gray-300">
                            @foreach($accreditations->where('type', 'international') as $item)
                            <li class="flex items-center space-x-3 group">
                                <div class="w-2 h-2 bg-blue-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                                <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                    {{ $item->title }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Memberships --}}
                    <div class="transform transition-all duration-500 hover:-translate-y-1">
                        <h3 class="text-xl md:text-2xl font-bold mb-6 text-purple-300 bg-purple-900/30 p-4 rounded-2xl text-center font-english">
                            Memberships
                        </h3>
                        <ul class="space-y-3 text-gray-300">
                            @foreach($accreditations->where('type', 'membership') as $item)
                            <li class="flex items-center space-x-3 group">
                                <div class="w-2 h-2 bg-purple-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                                <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                    {{ $item->title }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>




    </div>
</div>

@endsection

@section('extra-js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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

        // Observe all elements with data-animate attribute
        document.querySelectorAll('[data-animate]').forEach((el) => {
            observer.observe(el);
        });

        // Hover effects for cards
        const cards = document.querySelectorAll('.group');

        cards.forEach(card => {
            // Add hover scale effect
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Image error handler
        function handleImageError(img) {
            const current = img.getAttribute('src') || '';
            const slug = img.getAttribute('data-slug');

            // Try primary image -> slug-based secondary -> default fallback
            if (!current.includes(`/assets/${slug}.jpg`)) {
                img.src = `/assets/${slug}.jpg`;
                return;
            }
            if (current.includes(`/assets/${slug}.jpg`)) {
                img.src = `/assets/default-profile.jpg`;
                return;
            }
            // final fallback: hide image and show initials box
            img.style.display = 'none';
            const fallback = img.nextElementSibling;
            if (fallback) fallback.style.display = 'flex';
        }

        // Initialize animations with delays
        function initializeAnimations() {
            const animatedElements = document.querySelectorAll('[style*="animation-delay"]');

            animatedElements.forEach((el, index) => {
                const style = el.getAttribute('style') || '';
                const delayMatch = style.match(/animation-delay:\s*(\d+)ms/);
                const delay = delayMatch ? parseInt(delayMatch[1]) : 0;

                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, delay);
            });
        }

        // Initialize on page load
        initializeAnimations();

        // Sluggify function for image paths
        function sluggify(name) {
            return name
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        }

        // Initialize all image error handlers
        document.querySelectorAll('img[data-slug]').forEach(img => {
            img.onerror = () => handleImageError(img);
        });
    });
</script>
@endsection