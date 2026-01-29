<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            --site-bg: #f8fafc;
            --text-color: #0f172a;
            --nav-bg: linear-gradient(135deg, #4F46E5 0%, #7C3AED 50%, #EC4899 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
        }

        body.dark {
            --site-bg: #000000;
            --text-color: #ffffff;
            --nav-bg: linear-gradient(135deg, #1e1b4b 0%, #312e81 100%);
            background: #000000 !important;
            color: var(--text-color) !important;
        }

        body.dark nav {
            background: var(--nav-bg) !important;
        }

        body.dark footer {
            background: #0a0a0a !important;
            color: #cbd5e1 !important;
        }

        body.dark .card {
            background: #0f0f0f !important;
            color: #ffffff !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
        }

        body.dark .text-gray-700 {
            color: #e5e7eb !important;
        }

        body.dark a.text-white,
        body.dark a {
            color: #ffffff !important;
        }

        body.dark #mobileMenu {
            background: #0f0f0f !important;
            color: #e5e7eb !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        body.dark .absolute.bg-white {
            background: #0f0f0f !important;
            color: #e5e7eb !important;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
            height: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #4338CA 0%, #6D28D9 100%);
        }

        /* Animations */
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slide-down {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scale-in {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.3s ease-out forwards;
        }

        .animate-slide-down {
            animation: slide-down 0.2s ease-out forwards;
        }

        .animate-scale-in {
            animation: scale-in 0.2s ease-out forwards;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Navbar enhancements */
        nav {
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        /* Dropdown improvements */
        .dropdown-menu {
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Button hover effects */
        .btn-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #4338CA 0%, #6D28D9 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
        }
    </style>
    @yield('styles')
</head>

<body class="font-sans bg-gray-50">

    @php
        $user = Auth::user();
        $currentLang = session('lang', 'en');

        // Ensure footer data exists so footer renders on all pages
        $footer = $footer ?? (object) [
            'logo' => config('app.name'),
            'tagline' => null,
            'description' => null,
            'social_links' => [],
            'quick_links' => [],
            'contact_info' => [],
        ];

        $languages = [
            ['code' => 'en', 'label' => 'English', 'flag' => '🇬🇧'],
            ['code' => 'kh', 'label' => 'ខ្មែរ', 'flag' => '🇰🇭'],
        ];

        $menuItems = [
            ['name' => 'home', 'href' => route('home')],
            ['name' => 'about', 'href' => route('about')],
            ['name' => 'ourteam', 'href' => route('project')],
            [
                'name' => 'programs',
                'dropdown' => [
                    ['label' => 'Caeda-Programs', 'href' => route('programs')],
                    ['label' => 'Workshops', 'href' => route('workshop')],
                    ['label' => 'PSBU-Vision', 'href' => route('psbu-vison')],
                    ['label' => 'PSBU-weekly news', 'href' => route('psbu-weekly-news')],
                    ['label' => 'PSBU-Youth', 'href' => route('psbu-youth')],
                ]
            ],
            ['name' => 'partners', 'href' => route('our-team')],
            ['name' => 'events', 'href' => route('events')],
            [
                'name' => 'news',
                'dropdown' => [
                    ['label' => 'Latest News', 'href' => route('news')],
                    ['label' => 'Donation', 'href' => route('donation.show')],
                    ['label' => 'Achieve', 'href' => route('achieve')],
                    ['label' => 'Coffee', 'href' => route('coffee')],
                ]
            ],
            ['name' => 'contact', 'href' => route('contact')],
        ];

        $activeItem = request()->route()->getName();
    @endphp


    <!-- ======================== NAVBAR ======================== -->
    <nav class="fixed w-full z-50 py-3 bg-gradient-to-r from-indigo-600 via-purple-600 to-blue-600 shadow-xl">
        <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="relative">
                    <img src="/assets/ASEAN-01-01.png"
                        class="h-14 w-14 object-contain transition-transform duration-300 group-hover:scale-110">
                    <div
                        class="absolute -inset-1 bg-white/20 rounded-full blur opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    </div>
                </div>
                <span class="text-white text-2xl font-bold hidden sm:block tracking-wide">CAEDA</span>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden lg:flex items-center gap-2">

                <!-- Dark mode toggle -->
                <button id="darkModeToggle" title="Toggle dark mode" class="
            bg-white/10 backdrop-blur-md
            text-white
            px-3 py-2
            rounded-xl
            font-medium
            border border-white/20
            hover:bg-white/20
            hover:scale-105
            transition-all duration-300
            shadow-sm
        ">
                    <i class="fa fa-moon"></i>
                </button>

                @foreach($menuItems as $item)
                    @if(isset($item['dropdown']))
                        <div class="relative group">
                            <!-- Parent -->
                            <button class="
                                text-white font-medium
                                px-4 py-2
                                rounded-xl
                                flex items-center gap-1
                                border border-transparent
                                hover:bg-white/15 hover:border-white/20
                                transition-all duration-300
                            ">
                                {{ __($item['name']) }}
                                <i class="fa fa-chevron-down text-xs
                                transition-transform duration-300
                                group-hover:rotate-180"></i>
                            </button>

                            <!-- Dropdown -->
                            <div class="
                            absolute left-0 mt-3 w-56
                            bg-white/95 backdrop-blur-xl
                            rounded-2xl
                            shadow-xl
                            py-2
                            border border-gray-100

                            opacity-0 invisible
                            translate-y-3
                            group-hover:opacity-100 group-hover:visible
                            group-hover:translate-y-0
                            transition-all duration-300 ease-out
                        ">
                                @foreach($item['dropdown'] as $sub)
                                    <a href="{{ $sub['href'] }}" class="
                                           group flex items-center
                                           px-4 py-2.5
                                           text-gray-700 font-medium
                                           rounded-lg
                                           hover:bg-indigo-50
                                           hover:text-indigo-700
                                           transition-all duration-200
                                       ">
                                        <i class="fas fa-chevron-right text-xs mr-2
                                            text-indigo-500
                                            opacity-0 -ml-3
                                            group-hover:opacity-100 group-hover:ml-0
                                            transition-all duration-200"></i>
                                        {{ $sub['label'] }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                            <a href="{{ $item['href'] }}" class="
                               text-white font-medium
                               px-4 py-2
                               rounded-xl
                               border border-transparent
                               hover:bg-white/15 hover:border-white/20
                               transition-all duration-300
                               {{ $activeItem === $item['name'] ? 'bg-white/25 border-white/30 shadow-md' : '' }}
                           ">
                                {{ __($item['name']) }}
                            </a>
                    @endif
                @endforeach
            </div>


            <!-- Right Controls -->
            <div class="hidden lg:flex items-center gap-3">

                <!-- Language -->
                <form method="POST" action="{{ route('language.switch') }}" class="relative">
                    @csrf

                    <select name="lang" onchange="this.form.submit()" class="
            bg-white/10 backdrop-blur-md
            text-white
            px-4 py-2
            rounded-xl
            font-medium
            cursor-pointer
            border border-white/20
            outline-none
            transition-all duration-300
            hover:bg-white/20
            focus:bg-white/25
            focus:ring-2 focus:ring-white/40
            shadow-sm
        ">
                        @foreach($languages as $lang)
                            <option value="{{ $lang['code'] }}" class="text-gray-800" {{ $currentLang === $lang['code'] ? 'selected' : '' }}>
                                {{ $lang['flag'] }} {{ $lang['label'] }}
                            </option>
                        @endforeach
                    </select>
                </form>


                <!-- Auth -->
                @if($user)
                    <a href="{{ route('profile') }}"
                        class="bg-white text-indigo-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all duration-200 hover:shadow-lg hover:scale-105">
                        <i class="fas fa-user mr-2"></i>Profile
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="text-white px-4 py-2 rounded-lg hover:bg-white/20 transition-all duration-200">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </button>
                    </form>
                @endif
            </div>

            <!-- Mobile Menu Icon -->
            <button id="mobileMenuButton"
                class="lg:hidden text-white text-3xl hover:scale-110 transition-transform duration-200">
                <i class="fa fa-bars"></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="hidden bg-white shadow-2xl rounded-xl mt-4 mx-4 p-4 text-gray-700 lg:hidden animate-scale-in border border-gray-100">

            @foreach($menuItems as $item)
                @if(isset($item['dropdown']))
                    <details class="mb-3 group">
                        <summary
                            class="px-3 py-2 flex justify-between items-center font-semibold cursor-pointer
                                               hover:text-indigo-600 rounded-lg hover:bg-indigo-50 transition-all duration-200">
                            {{ __($item['name']) }}
                            <i class="fa fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                        </summary>

                        <div class="mt-2 space-y-1 ml-2">
                            @foreach($item['dropdown'] as $sub)
                                <a href="{{ $sub['href'] }}"
                                    class="block pl-6 pr-3 py-2 text-gray-600 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200">
                                    <i class="fas fa-chevron-right text-xs mr-2"></i>{{ $sub['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </details>
                @else
                    <a href="{{ $item['href'] }}"
                        class="block px-3 py-2 rounded-lg hover:bg-indigo-50 hover:text-indigo-600 transition-all duration-200 font-medium">
                        {{ __($item['name']) }}
                    </a>
                @endif
            @endforeach

            <hr class="my-4 border-gray-200">

            @if($user)
                <a href="{{ route('profile') }}"
                    class="block px-4 py-2 font-semibold text-indigo-700 hover:bg-indigo-50 rounded-lg transition-all duration-200">
                    <i class="fas fa-user mr-2"></i>Profile
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        class="px-4 py-2 text-red-600 w-full text-left hover:bg-red-50 rounded-lg transition-all duration-200">
                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                    </button>
                </form>
            @else
                <a href="{{ route('admin.login') }}"
                    class="block bg-gradient-to-r from-indigo-600 to-purple-600 text-white text-center py-2 rounded-lg font-semibold hover:shadow-lg transition-all duration-200">
                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                </a>
            @endif

        </div>
    </nav>


    <!-- CONTENT -->
    <main class="pt-24">
        @yield('content')
    </main>


    <!-- ======================== FOOTER ======================== -->
    <footer class="bg-gray-900 text-white mt-20 overflow-hidden">
        <!-- Gradient Header -->
        <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500"></div>

        <div class="py-12 px-6">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

                {{-- Logo & Description --}}
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                            <i class="fas fa-university text-white text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold">{{ $footer->logo ?? 'CAEDA' }}<span
                                class="gradient-text">.</span></h2>
                    </div>
                    <p class="text-gray-400 mt-3 italic font-medium">{{ $footer->tagline ?? __('Education Of Best') }}
                    </p>
                    <p class="text-gray-500 mt-4 leading-relaxed">
                        {{ $footer->description ?? __('Grow your skills with modern technology courses.') }}
                    </p>

                    {{-- Social Links --}}
                    <div class="flex space-x-2 mt-6">
                        @foreach($footer->social_links ?? [] as $key => $link)
                            @php
                                $icon = match ($key) {
                                    'facebook' => 'fab fa-facebook-f',
                                    'twitter' => 'fab fa-twitter',
                                    'instagram' => 'fab fa-instagram',
                                    'youtube' => 'fab fa-youtube',
                                    'linkedin' => 'fab fa-linkedin-in',
                                    default => 'fab fa-globe'
                                };

                                $gradient = match ($key) {
                                    'facebook' => 'from-blue-500 to-blue-600',
                                    'twitter' => 'from-sky-400 to-sky-500',
                                    'instagram' => 'from-pink-500 to-rose-500',
                                    'youtube' => 'from-red-500 to-red-600',
                                    'linkedin' => 'from-blue-600 to-blue-700',
                                    default => 'from-gray-500 to-gray-600'
                                };
                            @endphp

                            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer"
                                class="w-10 h-10 bg-gradient-to-br {{ $gradient }} rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                <i class="{{ $icon }}"></i>
                            </a>
                        @endforeach
                    </div>

                </div>

                {{-- Quick Links --}}
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-link text-indigo-400 mr-2"></i>
                        {{ __('Quick Links') }}
                    </h3>
                    <ul class="space-y-2 text-gray-400">
                        @foreach($footer->quick_links ?? [] as $link)
                            <li>
                                <a href="{{ route($link['route']) }}"
                                    class="hover:text-white hover:translate-x-1 inline-flex items-center transition-all duration-200 group">
                                    <i
                                        class="fas fa-chevron-right text-xs mr-2 text-indigo-400 opacity-0 group-hover:opacity-100 transition-opacity"></i>
                                    {{ __($link['name']) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Contact Info --}}
                <div>
                    <h3 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-address-book text-indigo-400 mr-2"></i>
                        {{ __('Contact Info') }}
                    </h3>
                    <div class="space-y-3 text-gray-400">
                        <p class="flex items-start hover:text-white transition-colors duration-200">
                            <i class="fa-solid fa-location-dot mr-3 mt-1 text-indigo-400"></i>
                            <span>{{ $footer->contact_info['address'] ?? 'Phnom Penh, Cambodia' }}</span>
                        </p>
                        <a href="tel:{{ $footer->contact_info['phone'] ?? '' }}"
                            class="flex items-center hover:text-white transition-colors duration-200 group">
                            <i
                                class="fa-solid fa-phone mr-3 text-indigo-400 group-hover:rotate-12 transition-transform"></i>
                            <span>{{ $footer->contact_info['phone'] ?? '+855 12 345 678' }}</span>
                        </a>
                        <a href="mailto:{{ $footer->contact_info['email'] ?? '' }}"
                            class="flex items-center hover:text-white transition-colors duration-200 group">
                            <i
                                class="fa-solid fa-envelope mr-3 text-indigo-400 group-hover:scale-110 transition-transform"></i>
                            <span>{{ $footer->contact_info['email'] ?? 'info@caeda.edu.kh' }}</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Divider -->
            <div class="max-w-7xl mx-auto border-t border-gray-800 mt-10 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-3 md:space-y-0">
                    <!-- Copyright -->
                    <div class="text-sm text-gray-500 text-center md:text-left">
                        <p class="flex items-center justify-center md:justify-start">
                            <i class="far fa-copyright mr-2"></i>
                            <span>{{ date('Y') }} <span
                                    class="font-semibold text-white">{{ $footer->logo ?? 'CAEDA' }}</span>. All Rights
                                Reserved.</span>
                        </p>
                    </div>

                    <!-- Credits -->
                    <div class="flex items-center space-x-4 text-xs text-gray-500">
                        <span class="flex items-center">
                            <i class="fas fa-code mr-1 text-indigo-400"></i>
                            Crafted with excellence
                        </span>
                        <span class="hidden md:inline">•</span>
                        <span class="flex items-center">
                            <i class="fas fa-heart mr-1 text-pink-500"></i>
                            Made​ by Information Technology Office
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </footer>



    <script>
        document.getElementById("mobileMenuButton").onclick = () =>
            document.getElementById("mobileMenu").classList.toggle("hidden");
    </script>

    <script>
        // Dark mode toggle (persists in localStorage)
        (function () {
            const btn = document.getElementById('darkModeToggle');
            function applyTheme(t) {
                if (t === 'dark') document.body.classList.add('dark');
                else document.body.classList.remove('dark');
                if (btn) btn.innerHTML = document.body.classList.contains('dark') ? '<i class="fa fa-sun"></i>' : '<i class="fa fa-moon"></i>';
            }
            const saved = localStorage.getItem('site-theme') || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            applyTheme(saved);
            if (btn) btn.addEventListener('click', function () {
                const next = document.body.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem('site-theme', next);
                applyTheme(next);
            });
        })();
    </script>

    @yield('scripts')
</body>

</html>