<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in .25s ease-out forwards; }
    </style>
</head>
<body class="font-sans bg-gray-50">

@php
    $user = Auth::user();
    $currentLang = session('lang', 'en');

    $languages = [
        ['code' => 'en', 'label' => 'English', 'flag' => '🇬🇧'],
        ['code' => 'kh', 'label' => 'ខ្មែរ', 'flag' => '🇰🇭'],
        ['code' => 'zh', 'label' => '中文', 'flag' => '🇨🇳'],
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
        ['name' => 'membership', 'href' => route('our-team')],
        ['name' => 'events', 'href' => route('events')],
        [
            'name' => 'news',
            'dropdown' => [
                ['label' => 'Latest News', 'href' => route('news')],
                ['label' => 'Donation', 'href' => route('donation')],
                ['label' => 'Achieve', 'href' => route('achieve')],
            ]
        ],
        ['name' => 'contact', 'href' => route('contact')],
    ];

    $activeItem = request()->route()->getName();
@endphp


<!-- ======================== NAVBAR ======================== -->
<nav class="fixed w-full z-50 py-4 bg-gradient-to-r from-blue-700 via-purple-700 to-indigo-700 shadow-lg backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <img src="/assets/ASEAN-01-01.png" class="h-14 w-14 object-contain">
            <span class="text-white text-2xl font-bold hidden sm:block tracking-wide">CAEDA</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center gap-1">
            @foreach($menuItems as $item)
                @if(isset($item['dropdown']))
                    <div class="relative group">
                        <button
                            class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-white/20 transition flex items-center gap-1">
                            {{ __($item['name']) }}
                            <i class="fa fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                        </button>

                        <!-- Dropdown -->
                        <div
                            class="absolute left-0 mt-3 w-56 bg-white rounded-xl shadow-xl py-3
                                   opacity-0 invisible group-hover:opacity-100 group-hover:visible
                                   translate-y-2 group-hover:translate-y-0
                                   transition-all duration-200 ease-out animate-fade-in">

                            @foreach($item['dropdown'] as $sub)
                                <a href="{{ $sub['href'] }}"
                                   class="block px-4 py-2.5 text-gray-700 font-medium
                                          hover:bg-blue-100/70 hover:text-blue-700 rounded-lg transition">
                                    {{ $sub['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    <a href="{{ $item['href'] }}"
                       class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-white/20 transition
                       {{ $activeItem === $item['name'] ? 'bg-white/30' : '' }}">
                        {{ __($item['name']) }}
                    </a>
                @endif
            @endforeach
        </div>

        <!-- Right Controls -->
        <div class="hidden lg:flex items-center gap-4">

            <!-- Language -->
            <form method="POST" action="{{ route('language.switch') }}">
                @csrf
                <select name="lang" onchange="this.form.submit()"
                        class="bg-white/20 text-white px-3 py-2 rounded-lg font-semibold cursor-pointer hover:bg-white/30">
                    @foreach($languages as $lang)
                        <option value="{{ $lang['code'] }}" class="text-black"
                                {{ $currentLang === $lang['code'] ? 'selected' : '' }}>
                            {{ $lang['flag'] }} {{ $lang['label'] }}
                        </option>
                    @endforeach
                </select>
            </form>

            <!-- Auth -->
            @if($user)
                <a href="{{ route('profile') }}"
                   class="bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-white px-4 py-2 rounded-lg hover:bg-white/20 transition">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                   class="bg-white text-blue-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Login
                </a>
            @endif
        </div>

        <!-- Mobile Menu Icon -->
        <button id="mobileMenuButton" class="lg:hidden text-white text-3xl">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
         class="hidden bg-white shadow-xl rounded-xl mt-4 p-4 text-gray-700 lg:hidden animate-fade-in">

        @foreach($menuItems as $item)
            @if(isset($item['dropdown']))
                <details class="mb-3 group">
                    <summary
                        class="px-3 py-2 flex justify-between items-center font-semibold cursor-pointer
                               hover:text-blue-600">
                        {{ __($item['name']) }}
                        <i class="fa fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="mt-2 space-y-1">
                        @foreach($item['dropdown'] as $sub)
                            <a href="{{ $sub['href'] }}"
                               class="block pl-6 pr-3 py-2 text-gray-600 hover:text-blue-600 transition">
                                {{ $sub['label'] }}
                            </a>
                        @endforeach
                    </div>
                </details>
            @else
                <a href="{{ $item['href'] }}"
                   class="block px-3 py-2 rounded-lg hover:bg-blue-50 transition">
                    {{ __($item['name']) }}
                </a>
            @endif
        @endforeach

        <hr class="my-4">

        @if($user)
            <a href="{{ route('profile') }}" class="block px-4 py-2 font-semibold text-blue-700">Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="px-4 py-2 text-red-600 w-full text-left">Logout</button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="block bg-blue-600 text-white text-center py-2 rounded-lg font-semibold">
                Login
            </a>
        @endif

    </div>
</nav>


<!-- CONTENT -->
<main class="pt-36">
    @yield('content')
</main>


<!-- ======================== FOOTER ======================== -->
<footer class="bg-gray-900 text-white py-12 px-6 mt-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

        {{-- Logo & Description --}}
        <div>
            <h2 class="text-3xl font-bold">{{ $footer->logo ?? 'CAEDA' }}<span class="text-blue-500">.</span></h2>
            <p class="text-gray-400 mt-3 italic">{{ $footer->tagline ?? __('Education Of Best') }}</p>
            <p class="text-gray-500 mt-4">{{ $footer->description ?? __('Grow your skills with modern technology courses.') }}</p>

            {{-- Social Links --}}
            <div class="flex space-x-4 mt-6">
                @foreach($footer->social_links ?? [] as $key => $link)
                    @php
                        $icon = match($key){
                            'facebook'=>'fab fa-facebook',
                            'twitter'=>'fab fa-twitter',
                            'instagram'=>'fab fa-instagram',
                            'youtube'=>'fab fa-youtube',
                            default=>'fab fa-globe'
                        };
                    @endphp
                    <a href="{{ $link }}" class="text-gray-400 hover:text-blue-500">
                        <i class="{{ $icon }} text-xl"></i>
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Quick Links --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">{{ __('Quick Links') }}</h3>
            <ul class="space-y-3 text-gray-400">
                @foreach($footer->quick_links ?? [] as $link)
                    <li><a href="{{ route($link['route']) }}" class="hover:text-white">{{ __($link['name']) }}</a></li>
                @endforeach
            </ul>
        </div>

        {{-- Contact Info --}}
        <div>
            <h3 class="text-xl font-semibold mb-4">{{ __('Contact Info') }}</h3>
            <p class="text-gray-400"><i class="fa-solid fa-location-dot mr-2"></i> {{ $footer->contact_info['address'] ?? '' }}</p>
            <p class="text-gray-400 mt-2"><i class="fa-solid fa-phone mr-2"></i> {{ $footer->contact_info['phone'] ?? '' }}</p>
            <p class="text-gray-400 mt-2"><i class="fa-solid fa-envelope mr-2"></i> {{ $footer->contact_info['email'] ?? '' }}</p>
        </div>

    </div>

    <div class="text-center text-gray-500 mt-10">
        © {{ date('Y') }} {{ $footer->logo ?? 'CAEDA' }}. All Rights Reserved.
    </div>
</footer>



<script>
document.getElementById("mobileMenuButton").onclick = () =>
    document.getElementById("mobileMenu").classList.toggle("hidden");
</script>

</body>
</html>
