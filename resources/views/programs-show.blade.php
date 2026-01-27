@extends('layouts.app')

@section('title', ($program->title ?? 'Program Detail') . ' - CAEDA')

@section('extra-css')
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

        @keyframes gradient-shift {
            0%, 100% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes pulse-glow {
            0%, 100% {
                box-shadow: 0 0 20px rgba(79, 70, 229, 0.3);
            }
            50% {
                box-shadow: 0 0 40px rgba(124, 58, 237, 0.5);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
        }

        .animate-gradient-shift {
            animation: gradient-shift 4s ease infinite;
            background-size: 200% 200%;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 50%, #EC4899 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .level-beginner {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .level-intermediate {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .level-advanced {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        }

        .level-expert {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }

        .btn-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #4338CA 0%, #6D28D9 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(135deg, #EC4899 0%, #F472B6 100%);
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #DB2777 0%, #EC4899 100%);
        }
    </style>
@endsection

@section('content')
    <div class="bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen pb-20">
        {{-- Top Hero Header --}}
        <section class="hero-gradient text-white py-16 md:py-24 px-4 md:px-8 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>
            
            <!-- Animated gradient orbs -->
           
            
            <div class="max-w-7xl mx-auto relative z-10">
                <nav class="flex mb-6 text-sm font-medium text-indigo-200" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors flex items-center">
                                <i class="fas fa-home mr-2"></i>Home
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-[10px] mx-2"></i>
                                <a href="{{ route('programs') }}" class="hover:text-white transition-colors">Programs</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-[10px] mx-2"></i>
                                <span class="text-white font-semibold">{{ $program->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="animate-fade-in-up">
                        <div
                            class="inline-block px-4 py-2 rounded-full bg-white/20 backdrop-blur-sm border border-white/30 text-white text-xs font-bold uppercase tracking-wider mb-6">
                            <i class="fas fa-graduation-cap mr-2"></i>{{ $program->category }}
                        </div>
                        <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight">
                            {{ $program->title }}
                        </h1>
                        <p class="text-xl text-indigo-100 mb-8 leading-relaxed max-w-2xl">
                            {{ $program->short_description ?? 'Unlock your potential with this comprehensive academic program designed for excellence.' }}
                        </p>

                        <div class="flex flex-wrap gap-6 mb-10">
                            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-yellow-400 to-orange-500 flex items-center justify-center mr-4 shadow-lg">
                                    <i class="far fa-clock text-xl text-white"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-indigo-200 uppercase font-bold">Duration</div>
                                    <div class="font-bold text-lg">{{ $program->duration ?? 'Standard' }}</div>
                                </div>
                            </div>
                            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-green-400 to-emerald-500 flex items-center justify-center mr-4 shadow-lg">
                                    <i class="fas fa-signal text-xl text-white"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-indigo-200 uppercase font-bold">Level</div>
                                    <div class="font-bold text-lg">{{ ucfirst($program->level ?? 'Beginner') }}</div>
                                </div>
                            </div>
                            <div class="flex items-center bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
                                <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-400 to-indigo-500 flex items-center justify-center mr-4 shadow-lg">
                                    <i class="fas fa-users text-xl text-white"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-indigo-200 uppercase font-bold">Students</div>
                                    <div class="font-bold text-lg">{{ number_format($program->students ?? 0) }}+</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <button
                                class="px-8 py-4 bg-white text-indigo-700 font-bold rounded-xl hover:bg-gray-100 transition-all transform hover:-translate-y-1 shadow-2xl flex items-center">
                                <i class="fas fa-paper-plane mr-2"></i>Apply Now
                            </button>
                            <button
                                class="px-8 py-4 bg-white/10 backdrop-blur-sm border-2 border-white/30 text-white font-bold rounded-xl hover:bg-white/20 transition-all flex items-center">
                                <i class="fas fa-download mr-2"></i>Download Syllabus
                            </button>
                        </div>
                    </div>

                    <div class="animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white/20 group">
                            <img src="{{ $program->image_url }}" alt="{{ $program->title }}"
                                class="w-full h-auto object-cover transform scale-100 group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-indigo-900/60 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Detailed Info Section --}}
        <section class="max-w-7xl mx-auto px-4 md:px-8 -mt-10 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                {{-- Left column for main content --}}
                <div class="lg:col-span-2 space-y-8">
                    <div class="glass-card rounded-3xl p-8 md:p-12 shadow-2xl border-2 border-white/50">
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-gradient-to-r from-indigo-500 to-purple-500 pb-4">
                            <span class="gradient-text">Program Overview</span>
                        </h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            {!! nl2br(e($program->description ?? 'No detailed description provided for this program.')) !!}
                        </div>

                        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="p-6 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl border-2 border-indigo-100 hover:shadow-lg transition-all duration-300">
                                <h4 class="font-bold text-indigo-900 mb-3 flex items-center text-lg">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center mr-3 shadow-md">
                                        <i class="fas fa-check-circle text-white"></i>
                                    </div>
                                    What You'll Learn
                                </h4>
                                <p class="text-sm text-indigo-800 leading-relaxed">Gain industry-standard expertise and
                                    practical knowledge tailored for modern professional success.</p>
                            </div>
                            <div class="p-6 bg-gradient-to-br from-pink-50 to-rose-50 rounded-2xl border-2 border-pink-100 hover:shadow-lg transition-all duration-300">
                                <h4 class="font-bold text-pink-900 mb-3 flex items-center text-lg">
                                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-pink-500 to-rose-600 flex items-center justify-center mr-3 shadow-md">
                                        <i class="fas fa-briefcase text-white"></i>
                                    </div>
                                    Career Opportunities
                                </h4>
                                <p class="text-sm text-pink-800 leading-relaxed">This course prepares you for high-impact
                                    roles in various sectors globally.</p>
                            </div>
                        </div>
                    </div>

                    @if($program->metadata && isset($program->metadata['curriculum']))
                        <div class="glass-card rounded-3xl p-8 md:p-12 shadow-2xl border-2 border-white/50">
                            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-gradient-to-r from-indigo-500 to-purple-500 pb-4">
                                <span class="gradient-text">Curriculum</span>
                            </h2>
                            <div class="space-y-4">
                                @foreach($program->metadata['curriculum'] as $index => $module)
                                    <div class="border-2 border-gray-200 rounded-2xl overflow-hidden hover:border-indigo-300 transition-all duration-300">
                                        <div
                                            class="bg-gradient-to-r from-gray-50 to-indigo-50 px-6 py-4 flex justify-between items-center cursor-pointer hover:from-indigo-50 hover:to-purple-50 transition-all">
                                            <span class="font-bold text-gray-800 flex items-center">
                                                <span class="w-8 h-8 rounded-lg bg-gradient-to-br from-indigo-500 to-purple-600 text-white flex items-center justify-center mr-3 text-sm">{{ $index + 1 }}</span>
                                                {{ $module['title'] ?? 'Module Title' }}
                                            </span>
                                            <i class="fas fa-chevron-down text-indigo-600"></i>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Right column for sidebar/pricing --}}
                <div class="space-y-8">
                    <div class="glass-card rounded-3xl p-8 shadow-2xl sticky top-28 border-2 border-indigo-200">
                        <div class="mb-6">
                            @php
                                $finalPrice = $program->discount ?? $program->tuition ?? 0;
                                $hasDiscount = !empty($program->discount) && $program->discount < $program->tuition;
                            @endphp

                            <div class="text-sm text-gray-500 uppercase font-bold tracking-widest mb-2 flex items-center">
                                <i class="fas fa-tag mr-2 text-indigo-600"></i>Pricing Plan
                            </div>
                            <div class="flex items-baseline gap-3">
                                <span class="text-5xl font-extrabold gradient-text">${{ number_format($finalPrice) }}</span>
                                @if($hasDiscount)
                                    <span
                                        class="text-xl text-gray-400 line-through">${{ number_format($program->tuition) }}</span>
                                @endif
                            </div>
                            @if($hasDiscount)
                                <div class="mt-3 inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold rounded-full text-sm shadow-lg">
                                    <i class="fas fa-tag mr-2"></i>Save
                                    ${{ number_format(($program->tuition ?? 0) - $finalPrice) }}
                                    ({{ round((($program->tuition - $program->discount) / $program->tuition) * 100) }}% off)
                                </div>
                            @endif
                        </div>

                        <div class="space-y-3 mb-8">
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-100">
                                <span class="text-gray-600 font-medium flex items-center">
                                    <i class="fas fa-laptop mr-2 text-indigo-600"></i>Mode
                                </span>
                                <span class="text-gray-900 font-bold uppercase">{{ $program->mode ?? 'Online' }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-100">
                                <span class="text-gray-600 font-medium flex items-center">
                                    <i class="fas fa-calendar-alt mr-2 text-indigo-600"></i>Deadline
                                </span>
                                <span class="text-gray-900 font-bold">
                                    {{ $program->application_deadline ? \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') : 'Open' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-100">
                                <span class="text-gray-600 font-medium flex items-center">
                                    <i class="fas fa-play-circle mr-2 text-indigo-600"></i>Start Date
                                </span>
                                <span class="text-gray-900 font-bold">
                                    {{ $program->start_date ? \Carbon\Carbon::parse($program->start_date)->format('M d, Y') : 'TBD' }}
                                </span>
                            </div>
                        </div>

                        <button
                            class="w-full py-5 btn-gradient text-white font-bold rounded-2xl shadow-lg mb-4 flex items-center justify-center">
                            <i class="fas fa-lock mr-2"></i>Secure Admission Now
                        </button>
                        <p class="text-center text-xs text-gray-500 flex items-center justify-center">
                            <i class="fas fa-shield-alt mr-2 text-green-600"></i>100% Secure Transaction & Academic Guarantee
                        </p>
                    </div>

                    {{-- Feature boxes --}}
                    <div class="bg-gradient-to-br from-indigo-600 to-purple-700 rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-10 w-32 h-32">
                            <i class="fas fa-award text-9xl"></i>
                        </div>
                        <div class="relative z-10">
                            <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center mb-4">
                                <i class="fas fa-trophy text-3xl text-yellow-300"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-4">Award-Winning Program</h3>
                            <p class="text-indigo-100 text-sm leading-relaxed">This course has been recognized globally for its
                                excellence in professional and academic development.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Related Programs --}}
        @if(isset($relatedPrograms) && $relatedPrograms->count() > 0)
            <section class="max-w-7xl mx-auto px-4 md:px-8 mt-20">
                <h2 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-10">
                    More Programs in <span class="gradient-text">{{ $program->category }}</span>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedPrograms as $rel)
                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300 group border-2 border-transparent hover:border-indigo-200">
                            <div class="h-48 overflow-hidden relative">
                                <img src="{{ $rel->image_url }}" alt="{{ $rel->title }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h4 class="font-bold text-xl mb-3 line-clamp-1 text-gray-900">{{ $rel->title }}</h4>
                                <p class="text-gray-600 text-sm mb-4 line-clamp-2 flex-1">
                                    {{ $rel->short_description ?? Str::limit($rel->description, 80) }}</p>
                                <a href="{{ route('programs.show', $rel->slug) }}"
                                    class="gradient-text font-bold items-center inline-flex hover:translate-x-1 transition-transform">
                                    Explore Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endif
    </div>
@endsection