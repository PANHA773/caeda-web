@extends('layouts.app')

@section('title', 'CAEDA News')

@section('extra-css')
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
        }

        .glass-morphism {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        .news-card-v2 {
            @apply bg-white rounded-[2rem] overflow-hidden border border-gray-100 transition-all duration-500 hover:shadow-2xl hover:shadow-indigo-100/50 hover:-translate-y-2;
        }

        .gradient-border-btn {
            position: relative;
            background: white;
            z-index: 1;
            transition: all 0.3s ease;
        }

        .gradient-border-btn::before {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            border-radius: 9999px;
            z-index: -1;
            transition: all 0.3s ease;
        }

        .premium-badge {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .search-glow:focus-within {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.15);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .float-anim {
            animation: float 6s ease-in-out infinite;
        }
    </style>
@endsection

@section('content')

    <div class="min-h-screen bg-[#fcfdff]">

        {{-- Enhanced Hero Section --}}
        <section class="relative pt-20 pb-16 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full">
                <div
                    class="absolute top-[-10%] right-[-5%] w-[500px] h-[500px] bg-indigo-100 rounded-full blur-[120px] opacity-40">
                </div>
                <div
                    class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-purple-100 rounded-full blur-[120px] opacity-40">
                </div>
            </div>

            <div class="container mx-auto px-4 relative">
                <div class="max-w-4xl mx-auto text-center mb-12">
                    <div
                        class="inline-flex items-center px-4 py-2 rounded-full bg-indigo-50 border border-indigo-100 text-indigo-600 text-sm font-bold mb-6 animate-fade-in">
                        <span class="flex h-2 w-2 rounded-full bg-indigo-600 mr-2 animate-pulse"></span>
                        STAY CONNECTED WITH CAEDA
                    </div>
                    <h1 class="text-5xl md:text-7xl font-extrabold text-gray-900 mb-6 leading-tight tracking-tight">
                        Discovery, News & <span
                            class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Inspiration.</span>
                    </h1>
                    <p class="text-xl text-gray-500 leading-relaxed mb-10 max-w-2xl mx-auto">
                        Explore the latest stories, achievements, and insights from the Cambodia Academy of
                        Entrepreneurship, Design, and Art.
                    </p>

                    {{-- Search & Filtering --}}
                    <div
                        class="max-w-2xl mx-auto glass-morphism p-2 rounded-[2.5rem] shadow-xl shadow-indigo-100/30 search-glow transition-all duration-300">
                        <form action="{{ route('news') }}" method="GET" class="flex flex-col md:flex-row gap-2">
                            <div class="flex-1 relative">
                                <i class="fas fa-search absolute left-6 top-1/2 -translate-y-1/2 text-indigo-400"></i>
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search articles, topics..."
                                    class="w-full pl-14 pr-6 py-4 bg-transparent outline-none text-gray-700 placeholder:text-gray-400 font-medium text-lg">
                            </div>
                            <button type="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-10 py-4 rounded-full font-bold transition-all transform hover:scale-105 active:scale-95 shadow-lg shadow-indigo-200">
                                Explore
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Quick Stats / Filters --}}
                <div class="flex flex-wrap justify-center gap-4 text-sm font-bold">
                    <a href="{{ route('news') }}"
                        class="px-6 py-3 rounded-full {{ !request('category') ? 'bg-indigo-600 text-white' : 'bg-white text-gray-600 border border-gray-100 hover:bg-gray-50' }} transition-all shadow-sm">
                        All Stories
                    </a>
                    <a href="#"
                        class="px-6 py-3 rounded-full bg-white text-gray-600 border border-gray-100 hover:bg-gray-50 transition-all shadow-sm">
                        Design
                    </a>
                    <a href="#"
                        class="px-6 py-3 rounded-full bg-white text-gray-600 border border-gray-100 hover:bg-gray-50 transition-all shadow-sm">
                        Entrepreneurship
                    </a>
                    <a href="#"
                        class="px-6 py-3 rounded-full bg-white text-gray-600 border border-gray-100 hover:bg-gray-50 transition-all shadow-sm">
                        Art
                    </a>
                </div>
            </div>
        </section>

        {{-- Main Content: Card Grid --}}
        <section class="container mx-auto px-4 pb-24">
            <div class="flex items-center justify-between mb-12 border-b border-gray-100 pb-6">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900">Featured Articles</h2>
                    <p class="text-gray-500 mt-1">Showing {{ $news->count() }} of {{ $news->total() }} results</p>
                </div>
                <div class="hidden md:flex items-center space-x-2">
                    <button
                        class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-indigo-600 transition-all">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button
                        class="w-10 h-10 rounded-full border border-gray-200 flex items-center justify-center text-gray-400 hover:bg-gray-50 hover:text-indigo-600 transition-all">
                        <i class="fas fa-list"></i>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @forelse($news as $index => $post)
                    <article class="news-card-v2 group animate-fade-in-up" style="animation-delay: {{ $index * 100 }}ms">
                        {{-- Media --}}
                        <a href="{{ route('news.show', $post->slug) }}" class="block relative aspect-[16/10] overflow-hidden">
                            @if($post->image)
                                <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image) }}"
                                    alt="{{ $post->title }}"
                                    class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                            @else
                                <div class="w-full h-full bg-indigo-50 flex items-center justify-center">
                                    <i class="fas fa-image text-5xl text-indigo-200"></i>
                                </div>
                            @endif

                            {{-- Tag Badge --}}
                            <div class="absolute top-6 left-6">
                                <span
                                    class="premium-badge text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                                    {{ $post->tags[0] ?? 'News' }}
                                </span>
                            </div>
                        </a>

                        {{-- Content --}}
                        <div class="p-8">
                            <div
                                class="flex items-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-4 space-x-3">
                                <span class="flex items-center">
                                    <i class="far fa-calendar-alt mr-2 text-indigo-500"></i>
                                    {{ optional($post->published_at)->format('M d, Y') }}
                                </span>
                                <span>•</span>
                                <span class="flex items-center">
                                    <i class="far fa-user mr-2 text-purple-500"></i>
                                    {{ data_get($post, 'user.name', 'CAEDA') }}
                                </span>
                            </div>

                            <h3
                                class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-indigo-600 transition-colors line-clamp-2 leading-snug">
                                <a href="{{ route('news.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            <p class="text-gray-500 leading-relaxed mb-8 line-clamp-3">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 120) }}
                            </p>

                            {{-- Footer Interaction --}}
                            <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                                <div class="flex items-center space-x-6">
                                    <button class="flex items-center text-gray-400 font-bold group/btn">
                                        <span
                                            class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center mr-2 transition-all">
                                            <i class="far fa-heart"></i>
                                        </span>
                                        <span>{{ $post->likes }}</span>
                                    </button>
                                    <button class="flex items-center text-gray-400 font-bold group/btn">
                                        <span
                                            class="w-8 h-8 rounded-full bg-gray-50 flex items-center justify-center mr-2 transition-all">
                                            <i class="far fa-comment"></i>
                                        </span>
                                        <span>{{ $post->comments }}</span>
                                    </button>
                                </div>

                                <a href="{{ route('news.show', $post->slug) }}"
                                    class="text-indigo-600 font-bold flex items-center group/more">
                                    Read
                                    <span
                                        class="ml-2 w-8 h-8 rounded-full bg-indigo-50 flex items-center justify-center group-hover/more:bg-indigo-600 group-hover/more:text-white transition-all">
                                        <i class="fas fa-arrow-right text-xs"></i>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div
                        class="col-span-full py-20 bg-white rounded-[2rem] border border-gray-100 text-center shadow-xl shadow-gray-100/50">
                        <div
                            class="mb-6 inline-flex w-24 h-24 bg-indigo-50 rounded-full items-center justify-center text-indigo-200">
                            <i class="fas fa-newspaper text-5xl"></i>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-900 mb-2">No Stories Found</h3>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">We couldn't find any articles matching your search. Try
                            different keywords or browse all stories.</p>
                        <a href="{{ route('news') }}"
                            class="bg-indigo-600 text-white px-8 py-3 rounded-full font-bold shadow-lg shadow-indigo-100 hover:scale-105 transition-all inline-block">
                            Browse All News
                        </a>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($news->hasPages())
                <div class="mt-20 flex justify-center">
                    <div class="bg-white p-2 rounded-full shadow-lg border border-gray-100 inline-flex">
                        {{ $news->links('vendor.pagination.tailwind-custom') }}
                    </div>
                </div>
            @endif
        </section>

        {{-- Newsletter Section --}}
        <section class="container mx-auto px-4 pb-20 mt-10">
            <div
                class="relative rounded-[3rem] overflow-hidden bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-800 p-12 md:p-20 shadow-2xl">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-0 left-0 w-full h-full"
                        style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
                    </div>
                </div>

                <div class="max-w-4xl mx-auto text-center relative z-10">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 leading-tight">Join our creative <span
                            class="text-amber-400">community.</span></h2>
                    <p class="text-indigo-100 text-lg mb-10 opacity-80">Subscribe to get the latest updates on design,
                        entrepreneurship, and art projects delivered directly to your inbox.</p>

                    <form action="#" class="flex flex-col md:flex-row gap-4 max-w-xl mx-auto">
                        <input type="email" placeholder="Enter your email address..."
                            class="flex-1 px-8 py-4 rounded-full bg-white/10 border border-white/20 text-white placeholder:text-white/50 outline-none focus:bg-white/20 transition-all font-medium">
                        <button
                            class="bg-amber-400 hover:bg-amber-500 text-indigo-900 px-10 py-4 rounded-full font-bold transition-all transform hover:scale-105 active:scale-95 shadow-xl shadow-amber-400/20">
                            Join Now
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('extra-js')
    <script>
        // Smooth scroll for anchors
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });

        // Simple interaction feedback (like system)
        function showToast(message) {
            console.log(message);
        }
    </script>
@endsection