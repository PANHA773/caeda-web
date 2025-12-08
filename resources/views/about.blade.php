@extends('layouts.app')

@section('title', $aboutContent->page_title . ' - CAEDA')

@section('extra-css')
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<style>
    @keyframes fade-in-up { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes gradient-x { 0%,100% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } }
    @keyframes pulse { 0%,100% { opacity:1; } 50% { opacity:.5; } }

    .animate-fade-in-up { animation: fade-in-up .8s ease-out forwards; }
    .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
    .animate-pulse { animation: pulse 2s cubic-bezier(0.4,0,0.6,1) infinite; }

    .font-cinzel { font-family: 'Cinzel', serif; }
    .prose p { margin-bottom: 1rem; }
    .prose p:last-child { margin-bottom: 0; }
</style>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        {{-- Header Section --}}
        <div data-animate class="text-center mb-16 transform transition-all duration-1000">
            <div class="inline-flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 mb-6 shadow-lg border border-gray-200/50">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700">CAMBODIA-ASEAN EDUCATIONAL DEVELOPMENT ASSOCIATION</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent animate-gradient-x font-cinzel">
                {{ $aboutContent->header_title ?? 'About CAEDA' }}
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse"></div>
            <p class="text-gray-600 text-lg md:text-xl max-w-4xl mx-auto leading-relaxed bg-white/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-200/50 shadow-sm">
                {{ $aboutContent->page_description ?? '' }}
            </p>
        </div>

        {{-- University History --}}
        <div class="mb-16 space-y-8">
            <div data-animate class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 md:p-10 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    Our Foundation
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    @foreach($aboutContent->foundation_content ?? [] as $index => $paragraph)
                        @if($paragraph['is_special'] ?? false)
                            <p class="font-medium text-gray-900 transform transition-all duration-500 hover:scale-105 bg-yellow-50 p-4 rounded-xl border border-yellow-200">
                                {{ $paragraph['content'] }}
                            </p>
                        @else
                            <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900" 
                               style="animation-delay: {{ $index * 75 }}ms">
                                {{ $paragraph['content'] }}
                            </p>
                        @endif
                    @endforeach
                </div>
            </div>

            {{-- CAEDA Today --}}
            <div data-animate class="group bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm rounded-3xl p-8 md:p-10 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    CAEDA Today
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    @foreach($aboutContent->today_content ?? [] as $index => $paragraph)
                        <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900" 
                           style="animation-delay: {{ $index * 75 }}ms">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Mission & Vision --}}
        <div data-animate class="grid md:grid-cols-2 gap-8 mb-16">
            @php
                $sections = [
                    ['title'=>'Our Mission','content'=>$aboutContent->mission ?? '','icon'=>'<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"></svg>','color_from'=>'blue-500','color_to'=>'blue-600'],
                    ['title'=>'Our Vision','content'=>$aboutContent->vision ?? '','icon'=>'<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"></svg>','color_from'=>'purple-500','color_to'=>'pink-600'],
                ];
            @endphp
            @foreach($sections as $section)
                <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-{{ $section['color_from'] }} to-{{ $section['color_to'] }} rounded-2xl flex items-center justify-center mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                            {!! $section['icon'] !!}
                        </div>
                        <h3 class="text-2xl md:text-3xl font-bold text-gray-900 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                            {{ $section['title'] }}
                        </h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed text-lg transform transition-all duration-500 group-hover:translate-x-2 group-hover:text-gray-900">
                        {{ $section['content'] }}
                    </p>
                </div>
            @endforeach
        </div>

        {{-- University Faculties --}}
        <div data-animate class="bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-indigo-900 bg-clip-text text-transparent font-cinzel">
                    University Faculties
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full animate-pulse"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                @foreach($faculties ?? [] as $index => $faculty)
                    <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-gray-200/50 hover:shadow-lg transition-all duration-500 hover:-translate-y-2 hover:border-blue-300/50 cursor-pointer" style="animation-delay: {{ $index*150 }}ms">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg flex-shrink-0">
                                {{ $index+1 }}
                            </div>
                            <p class="text-gray-700 font-medium text-lg group-hover:text-gray-900 transition-colors duration-300">
                                {{ $faculty->name }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Accreditation & Recognition --}}
        <div data-animate class="bg-gradient-to-br from-gray-800 via-gray-900 to-blue-900 rounded-3xl p-8 md:p-10 mb-16 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 bg-gradient-to-r from-blue-300 to-purple-300 bg-clip-text text-transparent font-cinzel">
                    Accreditation & Recognition
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto rounded-full animate-pulse"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
                @foreach([['title'=>'Official Accreditation','items'=>$officialAccreditations ?? [],'from'=>'blue-400','to'=>'blue-900/30'],['title'=>'International Recognition','items'=>$internationalAccreditations ?? [],'from'=>'purple-400','to'=>'purple-900/30']] as $accred)
                    <div class="transform transition-all duration-500 hover:-translate-y-1">
                        <h3 class="text-xl md:text-2xl font-bold mb-6 text-{{ $accred['from'] }} bg-{{ $accred['to'] }}/30 p-4 rounded-2xl text-center">{{ $accred['title'] }}</h3>
                        <ul class="space-y-4 text-gray-300">
                            @foreach($accred['items'] as $item)
                                <li class="flex items-center space-x-3 group">
                                    <div class="w-2 h-2 bg-{{ $accred['from'] }} rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                                    <span class="group-hover:text-white transition-colors duration-300">{{ $item->name }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

{{-- Leadership Team --}}
<div data-animate class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 
            bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
            Our Leadership
        </h2>
        <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($teamMembers ?? [] as $index => $member)
            <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-6 
                        hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 cursor-pointer"
                 style="animation-delay: {{ $index * 120 }}ms">

                <div class="flex flex-col items-center text-center">
                    {{-- Image / Fallback Initials --}}
                    <div class="relative mb-4">
                        @if($member->photo)
                            <img src="{{ $member->photo }}"
                                 alt="{{ $member->name }}"
                                 class="w-24 h-24 rounded-full object-cover shadow-lg 
                                        transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                        @else
                            <div class="w-24 h-24 bg-gradient-to-br from-blue-500 via-purple-500 to-pink-500 
                                        rounded-full flex items-center justify-center 
                                        text-white text-2xl font-bold shadow-lg
                                        transition-all duration-500 group-hover:scale-110 group-hover:rotate-6">
                                @php
                                    $initials = implode('', array_map(
                                        fn($n) => strtoupper(substr($n, 0, 1)),
                                        explode(' ', $member->name)
                                    ));
                                @endphp
                                {{ $initials }}
                            </div>
                        @endif

                        {{-- Online Status Dot --}}
                        <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full 
                                    border-4 border-white shadow-lg"></div>
                    </div>

                    {{-- Name --}}
                    <h3 class="text-xl font-semibold text-gray-900 mb-1 
                               group-hover:text-blue-900 transition-colors duration-300">
                        {{ $member->name }}
                    </h3>

                    {{-- Position --}}
                    <p class="text-blue-600 text-sm font-medium bg-blue-50 px-3 py-1 rounded-full 
                              group-hover:bg-blue-100 transition-colors duration-300">
                        {{ $member->position }}
                    </p>
                </div>
            </div>
        @endforeach
    </div>

    
</div>


        {{-- Core Values --}}
        <div data-animate class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 border border-gray-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    Our Core Values
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($coreValues ?? [] as $index => $value)
                    <div class="group bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 border border-gray-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 cursor-pointer relative" style="animation-delay: {{ $index*100 }}ms">
                        <div class="text-center mb-4">
                            <div class="text-4xl mb-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 inline-block">{{ $value->icon }}</div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300">{{ $value->title }}</h3>
                            <p class="text-gray-600 text-sm leading-relaxed group-hover:text-gray-700 transition-colors duration-300">{{ $value->description }}</p>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-br {{ $value->color_class ?? 'from-blue-500 to-cyan-500' }} opacity-0 group-hover:opacity-5 rounded-2xl transition-opacity duration-500 -z-10"></div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => { if(entry.isIntersecting) entry.target.classList.add('animate-fade-in-up'); });
    }, { threshold: 0.1 });
    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

    // Initialize delayed animations
    document.querySelectorAll('[style*="animation-delay"]').forEach(el => {
        const delay = parseInt(el.style.animationDelay || 0);
        setTimeout(() => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; }, delay);
    });
});
</script>
@endsection
