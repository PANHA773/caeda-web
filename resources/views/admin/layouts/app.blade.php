<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goods - @yield('title', 'Dashboard') | CAEDA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            --sidebar-bg: #1f2937;
            --sidebar-text: #f9fafb;
            --sidebar-hover: #374151;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            min-height: 100vh;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
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

        /* Sidebar styles */
        .sidebar {
            background: var(--sidebar-bg);
            color: var(--sidebar-text);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
        }

        .nav-link {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            background: var(--sidebar-hover);
            transform: translateX(4px);
        }

        .nav-link.active {
            background: var(--primary-gradient);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
            border-left: 4px solid #fbbf24;
        }

        .nav-link.active::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 3px;
            height: 100%;
            background: #fbbf24;
            animation: slideIn 0.3s ease;
        }

        .dropdown-menu {
            animation: slideDown 0.2s ease-out;
        }

        .dropdown-btn.active i.fa-chevron-down {
            transform: rotate(180deg);
        }

        /* Card styles */
        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            transition: all 0.3s ease;
            border: 1px solid rgba(229, 231, 235, 0.5);
        }

        .card:hover {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transform: translateY(-2px);
            border-color: rgba(79, 70, 229, 0.2);
        }

        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .gradient-text {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Animations */
        @keyframes slideIn {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        /* Mobile overlay */
        .mobile-overlay {
            animation: fadeIn 0.3s ease;
            backdrop-filter: blur(4px);
        }

        /* Status indicators */
        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .status-online {
            background-color: #10b981;
            box-shadow: 0 0 0 2px rgba(16, 185, 129, 0.2);
        }

        /* Button styles */
        .btn-gradient {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
            color: white;
            transition: all 0.3s ease;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #4338CA 0%, #6D28D9 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.4);
        }

        /* Badge styles */
        .badge {
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .badge-primary {
            background: linear-gradient(135deg, rgba(79, 70, 229, 0.1) 0%, rgba(124, 58, 237, 0.1) 100%);
            color: #4F46E5;
        }

        /* Loading animation */
        .loading {
            animation: pulse 1.5s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Form elements */
        input:focus,
        textarea:focus,
        select:focus {
            border-color: #4F46E5 !important;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1) !important;
            outline: none;
        }

        /* Table styles */
        table tr {
            transition: background-color 0.2s ease;
        }

        table tr:hover {
            background-color: #f9fafb;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .sidebar {
                width: 280px;
            }
        }

        /* Dark mode variable overrides when body has .dark */
        body.dark {
            --sidebar-bg: #0b0f14;
            --sidebar-text: #e6eef8;
            --sidebar-hover: #111827;
            background: #000000;
            color: #e6eef8;
        }

        body.dark .card {
            background: #071029;
            border-color: rgba(255, 255, 255, 0.03);
        }

        body.dark .nav-link {
            color: var(--sidebar-text);
        }

        body.dark .dropdown-link {
            color: #cbd5e1;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar"
        class="sidebar w-64 md:w-72 h-screen flex flex-col fixed md:relative z-50 transform -translate-x-full md:translate-x-0">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <div
                        class="w-12 h-12 bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-university text-white text-xl"></i>
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-30">
                        </div>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white">CAEDA Goods</h2>
                    <p class="text-xs text-gray-400">University Management System</p>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <img src="{{ optional(Auth::user())->avatar_url }}" alt="Admin"
                        class="w-12 h-12 rounded-xl object-cover border-2 border-gray-700 shadow-lg">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-800">
                    </div>
                </div>
                <div class="flex-1 min-w-0">
                    <a href="{{ route('admin.profile.edit') }}" class="group">
                        <p
                            class="text-sm font-semibold text-white truncate group-hover:text-indigo-400 transition-colors">
                            {{ optional(Auth::user())->name ?? 'Administrator' }}
                        </p>
                        <p class="text-xs text-gray-400 truncate">{{ optional(Auth::user())->email ??
                            'admin@caeda.edu.kh' }}</p>
                    </a>
                    <div class="mt-1 flex items-center">
                        <span class="status-indicator status-online"></span>
                        <span class="text-xs text-gray-400">Online</span>
                        <!-- Dark mode toggle for admin -->
                        <button id="darkModeToggle" title="Toggle dark mode"
                            class="ml-3 px-2 py-1 rounded bg-gray-700 text-white text-xs">🌙</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="flex-1 p-4 overflow-y-auto">
            <div class="space-y-1">
                <!-- Dashboard -->
                <a href="{{ route('admin.dashboard') }}"
                    class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-chart-line w-5 text-center text-lg"></i>
                    <span class="font-medium">Dashboard</span>
                </a>

                <div class="mt-6 mb-2 px-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Content Management</p>
                </div>

                <!-- News -->
                @if(Auth::user()->hasPermission('news'))
                    <a href="{{ route('admin.news.index') }}"
                        class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.news*') ? 'active' : '' }}">
                        <i class="fas fa-newspaper w-5 text-center text-lg"></i>
                        <span class="font-medium">News Page</span>
                    </a>
                @endif

                <!-- User -->
                @if(Auth::user()->hasPermission('users'))
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                        <i class="fas fa-users w-5 text-center text-lg"></i>
                        <span class="font-medium">Users</span>
                    </a>
                @endif


                <!-- home Dropdown -->
                @if(Auth::user()->hasPermission('home_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.welcome_sections*') || request()->routeIs('admin.hero_carousels*') || request()->routeIs('admin.features*') || request()->routeIs('admin.footer*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-home w-5 text-center text-lg"></i>
                                <span class="font-medium">Home Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>
                        <!-- welcome Section -->
                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <a href="{{ route('admin.welcome_sections.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.welcome_sections*') ? 'active' : '' }}">
                                <i class="fas fa-hand-sparkles w-5 text-center"></i>
                                <span>Welcome Section</span>
                            </a>
                            <!-- Hero Carousel -->
                            <a href="{{ route('admin.hero_carousels.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.hero_carousels*') ? 'active' : '' }}">
                                <i class="fas fa-images w-5 text-center"></i>
                                <span>Hero Carousel</span>
                            </a>
                            <!-- Features -->
                            <a href="{{ route('admin.features.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.features*') ? 'active' : '' }}">
                                <i class="fas fa-star w-5 text-center"></i>
                                <span>Features</span>
                            </a>

                            <a href="{{ route('admin.footer.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.footer*') ? 'active' : '' }}">
                                <i class="fas fa-shoe-prints w-5 text-center"></i>
                                <span>Footer</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- About Page Dropdown -->
                @if(Auth::user()->hasPermission('about_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.about*') || request()->routeIs('admin.faculties*') || request()->routeIs('admin.team-members*') || request()->routeIs('admin.core-values*') || request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-info-circle w-5 text-center text-lg"></i>
                                <span class="font-medium">About Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <a href="{{ route('admin.faculties.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.faculties*') ? 'active' : '' }}">
                                <i class="fas fa-building-columns w-5 text-center"></i>
                                <span>Faculties</span>
                            </a>
                            <!-- <a href="{{ route('admin.team-members.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}">
                                <i class="fas fa-users w-5 text-center"></i>
                                <span>Team Members</span>
                            </a> -->
                            <a href="{{ route('admin.core-values.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                                <i class="fas fa-gem w-5 text-center"></i>
                                <span>Core Values</span>
                            </a>

                        </div>
                    </div>
                @endif

                <!-- Our Team Dropdown -->
                @if(Auth::user()->hasPermission('team_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.leader-teams*') || request()->routeIs('admin.project-overviews*') || request()->routeIs('admin.office-managers*') || request()->routeIs('admin.vision-missions*') || request()->routeIs('admin.staff*') || request()->routeIs('admin.goals*') || request()->routeIs('admin.strategies*') || request()->routeIs('admin.value-benefits*') || request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-users-cog w-5 text-center text-lg"></i>
                                <span class="font-medium">Our-Team Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Leader Teams -->
                            <a href="{{ route('admin.leader-teams.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.leader-teams*') ? 'active' : '' }}">
                                <i class="fas fa-crown w-5 text-center"></i>
                                <span>Leader Team</span>
                            </a>
                            <!-- Project-Based Learning-->
                            <a href="{{ route('admin.project-overviews.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.project-overviews*') ? 'active' : '' }}">
                                <i class="fas fa-project-diagram w-5 text-center"></i>
                                <span>Project-Overview</span>
                            </a>
                            <!-- Office Managers -->
                            <a href="{{ route('admin.office-managers.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.office-managers*') ? 'active' : '' }}">
                                <i class="fas fa-briefcase w-5 text-center"></i>
                                <span>Office Manager</span>
                            </a>
                            <!-- Visoin & Mission -->
                            <a href="{{ route('admin.vision-missions.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.vision-missions*') ? 'active' : '' }}">
                                <i class="fas fa-bullseye w-5 text-center"></i>
                                <span>Vision-Missions</span>
                            </a>

                            <a href="{{ route('admin.staff.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.staff*') ? 'active' : '' }}">
                                <i class="fas fa-user-tie w-5 text-center"></i>
                                <span>CAEDA Staff</span>
                            </a>
                            <!-- Goals -->
                            <a href="{{ route('admin.goals.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.goals*') ? 'active' : '' }}">
                                <i class="fas fa-flag-checkered w-5 text-center"></i>
                                <span>Goals</span>
                            </a>
                            <!-- Goals -->
                            <a href="{{ route('admin.strategies.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.strategies*') ? 'active' : '' }}">
                                <i class="fas fa-chess-knight w-5 text-center"></i>
                                <span>Strategy</span>
                            </a>
                            <!-- Value Benefits -->
                            <a href="{{ route('admin.value-benefits.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.value-benefits*') ? 'active' : '' }}">
                                <i class="fas fa-gift w-5 text-center"></i>
                                <span>Benefits</span>
                            </a>

                            <a href="{{ route('admin.accreditations.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                                <i class="fas fa-award w-5 text-center"></i>
                                <span>Accreditations</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Programs Page Dropdown -->
                @if(Auth::user()->hasPermission('programs'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-graduation-cap w-5 text-center text-lg"></i>
                                <span class="font-medium">Programs Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <a href="{{ route('admin.programs.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
                                <i class="fas fa-book-open w-5 text-center"></i>
                                <span>CAEDA Programs</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Membership Page Dropdown -->
                @if(Auth::user()->hasPermission('membership_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-handshake w-5 text-center text-lg"></i>
                                <span class="font-medium">Membership Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <a href="{{ route('admin.partners.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
                                <i class="fas fa-handshake-angle w-5 text-center"></i>
                                <span>Partners</span>
                            </a>
                            <!-- Pricing -->
                            <a href="{{ route('admin.pricing.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.pricing*') ? 'active' : '' }}">
                                <i class="fas fa-tags w-5 text-center"></i>
                                <span>Pricing</span>
                            </a>
                            <!-- Member Companies -->
                            <a href="{{ route('admin.member-companies.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.member-companies*') ? 'active' : '' }}">
                                <i class="fas fa-building w-5 text-center"></i>
                                <span>Member Companies</span>
                            </a>

                            <!-- Final CTA -->
                            <a href="{{ route('admin.final-cta.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.final-cta*') ? 'active' : '' }}">
                                <i class="fas fa-building w-5 text-center"></i>
                                <span>Final CTA</span>
                            </a>


                        </div>
                    </div>
                @endif

                <!-- Events Page Dropdown -->
                @if(Auth::user()->hasPermission('events'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.events*') || request()->routeIs('admin.featured_events*') || request()->routeIs('admin.speakers*') || request()->routeIs('admin.timeline_events*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-calendar-star w-5 text-center text-lg"></i>
                                <span class="font-medium">Events Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Featured Events -->
                            <a href="{{ route('admin.featured_events.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.featured_events*') ? 'active' : '' }}">
                                <i class="fas fa-calendar-check w-5 text-center"></i>
                                <span>Featured Events</span>
                            </a>
                            <!-- Events -->
                            <a href="{{ route('admin.events.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                                <i class="fas fa-calendar-day w-5 text-center"></i>
                                <span>Events</span>
                            </a>
                            <!-- Speakers -->
                            <a href="{{ route('admin.speakers.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.speakers*') ? 'active' : '' }}">
                                <i class="fas fa-microphone w-5 text-center"></i>
                                <span>Speakers</span>
                            </a>
                            <a href="{{ route('admin.timeline_events.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.timeline_events*') ? 'active' : '' }}">
                                <i class="fas fa-stream w-5 text-center"></i>
                                <span>Timeline Events</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Donation Page Dropdown -->
                @if(Auth::user()->hasPermission('donation_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.heroes*') || request()->routeIs('admin.recent-donors*') || request()->routeIs('admin.stories*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-hand-holding-heart w-5 text-center text-lg"></i>
                                <span class="font-medium">Donation Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Hero Sections -->
                            <a href="{{ route('admin.heroes.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.heroes*') ? 'active' : '' }}">
                                <i class="fas fa-image w-5 text-center"></i>
                                <span>Hero Sections</span>
                            </a>
                            <!-- Recent Donors -->
                            <a href="{{ route('admin.recent-donors.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.recent-donors*') ? 'active' : '' }}">
                                <i class="fas fa-users w-5 text-center"></i>
                                <span>Recent Donors</span>
                            </a>
                            <!-- Impact Stories -->
                            <a href="{{ route('admin.stories.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.stories*') ? 'active' : '' }}">
                                <i class="fas fa-book-open w-5 text-center"></i>
                                <span>Impact Stories</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Achieve Page Dropdown -->
                @if(Auth::user()->hasPermission('achieve_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.hero-achievements*') || request()->routeIs('admin.milestones*') || request()->routeIs('admin.awards*') || request()->routeIs('admin.progress-metrics*') || request()->routeIs('admin.success-stories*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-trophy w-5 text-center text-lg"></i>
                                <span class="font-medium">Achieve Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Hero Achievements -->
                            <a href="{{ route('admin.hero-achievements.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.hero-achievements*') ? 'active' : '' }}">
                                <i class="fas fa-trophy w-5 text-center"></i>
                                <span>Hero Achievements</span>
                            </a>

                            <!-- Milestones -->
                            <a href="{{ route('admin.milestones.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.milestones*') ? 'active' : '' }}">
                                <i class="fas fa-flag-checkered w-5 text-center"></i>
                                <span>Milestones</span>
                            </a>

                            <!-- Awards -->
                            <a href="{{ route('admin.awards.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.awards*') ? 'active' : '' }}">
                                <i class="fas fa-medal w-5 text-center"></i>
                                <span>Awards</span>
                            </a>

                            <!-- Progress Metrics -->
                            <a href="{{ route('admin.progress-metrics.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.progress-metrics*') ? 'active' : '' }}">
                                <i class="fas fa-chart-line w-5 text-center"></i>
                                <span>Progress Metrics</span>
                            </a>

                            <!-- Success Stories -->
                            <a href="{{ route('admin.success-stories.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.success-stories*') ? 'active' : '' }}">
                                <i class="fas fa-users w-5 text-center"></i>
                                <span>Success Stories</span>
                            </a>
                        </div>
                    </div>
                @endif


                <!-- Contact Page Dropdown -->
                @if(Auth::user()->hasPermission('contact_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.contacts*') || request()->routeIs('admin.social*') || request()->routeIs('admin.contact-information*') || request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-envelope-open-text w-5 text-center text-lg"></i>
                                <span class="font-medium">Contact Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <a href="{{ route('admin.contacts.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                                <i class="fas fa-message w-5 text-center"></i>
                                <span>User Messages</span>
                            </a>
                            <!-- Social -->
                            <a href="{{ route('admin.social.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.social*') ? 'active' : '' }}">
                                <i class="fas fa-share-alt w-5 text-center"></i>
                                <span>Social Media</span>
                            </a>
                            <!-- Contact Information -->
                            <a href="{{ route('admin.contact-information.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.contact-information*') ? 'active' : '' }}">
                                <i class="fas fa-address-card w-5 text-center"></i>
                                <span>Contact Info</span>
                            </a>
                            <!-- FAQs -->
                            <a href="{{ route('admin.faqs.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.faqs*') ? 'active' : '' }}">
                                <i class="fas fa-question-circle w-5 text-center"></i>
                                <span>FAQs</span>
                            </a>
                        </div>
                    </div>
                @endif

                <!-- Workshop Page Dropdown -->
                @if(Auth::user()->hasPermission('workshop_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.workshops*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-chalkboard-teacher w-5 text-center text-lg"></i>
                                <span class="font-medium">Workshop Page</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Workshop Videos -->
                            <a href="{{ route('admin.workshops.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.workshops.index') ? 'active' : '' }}">
                                <i class="fas fa-video w-5 text-center"></i>
                                <span>Workshop Videos</span>
                            </a>

                            <!-- Upcoming Workshops -->
                            <a href="{{ route('admin.upcoming_workshops.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.upcoming_workshops.index') ? 'active' : '' }}">
                                <i class="fas fa-calendar-alt w-5 text-center"></i>
                                <span>Upcoming</span>
                            </a>

                            <!-- Benefits -->
                            <a href="{{ route('admin.workshop_benefits.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.workshop_benefits.index') ? 'active' : '' }}">
                                <i class="fas fa-gift w-5 text-center"></i>
                                <span>Benefits</span>
                            </a>

                            <!-- Testimonials -->
                            <a href="{{ route('admin.testimonials.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.testimonials.index') ? 'active' : '' }}">
                                <i class="fas fa-comment-dots w-5 text-center"></i>
                                <span>Testimonials</span>
                            </a>
                        </div>
                    </div>
                @endif


                <!-- Caffe Page Dropdown -->
                @if(Auth::user()->hasPermission('caffe_page'))
                    <div class="relative">
                        <button
                            class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.menu-categories*') || request()->routeIs('admin.menu_items*') || request()->routeIs('admin.featured_menus*') || request()->routeIs('admin.why_choose_us*') || request()->routeIs('admin.order_steps*') || request()->routeIs('admin.locations*') ? 'active' : '' }}">
                            <span class="flex items-center space-x-3">
                                <i class="fas fa-coffee w-5 text-center text-lg"></i>
                                <span class="font-medium">ទ្រឿង</span>
                            </span>
                            <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                        </button>

                        <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                            <!-- Categories -->
                            <a href="{{ route('admin.menu-categories.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.menu-categories*') ? 'active' : '' }}">
                                <i class="fas fa-list-ul w-5 text-center"></i>
                                <span>Categories</span>
                            </a>

                            <!-- Menu Items -->
                            <a href="{{ route('admin.menu_items.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.menu_items*') ? 'active' : '' }}">
                                <i class="fas fa-utensils w-5 text-center"></i>
                                <span>Menu Items</span>
                            </a>
                            <!-- FeaturedMenu -->
                            <a href="{{ route('admin.featured_menus.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.featured_menus*') ? 'active' : '' }}">
                                <i class="fas fa-utensils w-5 text-center"></i>
                                <span>Featured Menu</span>
                            </a>

                            <!-- Why Choose Us -->
                            <a href="{{ route('admin.why_choose_us.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.why_choose_us*') ? 'active' : '' }}">
                                <i class="fas fa-check-circle w-5 text-center"></i>
                                <span>Why Choose Us</span>
                            </a>

                            <!-- Order Steps -->
                            <a href="{{ route('admin.order_steps.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.order_steps*') ? 'active' : '' }}">
                                <i class="fas fa-list-ol w-5 text-center"></i>
                                <span>Order Steps</span>
                            </a>

                            <!-- Locations -->
                            <a href="{{ route('admin.locations.index') }}"
                                class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.locations*') ? 'active' : '' }}">
                                <i class="fas fa-map-marker-alt w-5 text-center"></i>
                                <span>Locations</span>
                            </a>
                        </div>
                    </div>
                @endif



                <!-- Settings -->
                <div class="mt-6 mb-2 px-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">System Settings</p>
                </div>

                <a href="{{ route('admin.backup.index') }}"
                    class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.backup*') ? 'active' : '' }}">
                    <i class="fas fa-database w-5 text-center text-lg"></i>
                    <span class="font-medium">Backup Data</span>
                </a>

                <a href="{{ route('admin.notifications.index') }}"
                    class="nav-link flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 {{ request()->routeIs('admin.notifications*') ? 'active' : '' }}">
                    <div class="flex items-center space-x-3">
                        <i class="fas fa-bell w-5 text-center text-lg"></i>
                        <span class="font-medium">Notifications</span>
                    </div>
                    @php $unreadCount = auth()->user()->unreadNotifications->count(); @endphp
                    @if($unreadCount > 0)
                        <span class="bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-full animate-pulse">
                            {{ $unreadCount > 99 ? '99+' : $unreadCount }}
                        </span>
                    @endif
                </a>

                <!-- <a href="#"
                    class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200">
                    <i class="fas fa-user-shield w-5 text-center text-lg"></i>
                    <span class="font-medium">User Management</span>
                </a> -->
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-800 space-y-3">
            <a href="{{ route('home') }}"
                class="flex items-center justify-center space-x-2 px-4 py-3 bg-gray-800 hover:bg-gray-700 rounded-xl text-gray-300 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-globe-americas"></i>
                <span>View Website</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit"
                    class="flex items-center justify-center space-x-2 w-full px-4 py-3 bg-red-900/20 hover:bg-red-900/30 rounded-xl text-red-400 hover:text-red-300 font-medium transition-colors duration-200">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 overflow-y-auto min-h-screen animate-fadeIn">
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <div class="px-6 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <button id="sidebar-toggle"
                        class="md:hidden text-gray-600 hover:text-indigo-600 focus:outline-none transition-colors duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="hidden md:flex items-center space-x-2 text-sm">
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-gray-500 hover:text-indigo-600 transition-colors duration-200">Dashboard</a>
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <span class="text-gray-900 font-semibold gradient-text">@yield('title', 'Dashboard')</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    {{-- Notification Bell --}}
                    <div class="relative" id="notification-dropdown-parent">
                        <button id="notification-btn"
                            class="p-2 text-gray-500 hover:text-indigo-600 transition-colors relative focus:outline-none">
                            <i class="fas fa-bell text-xl"></i>
                            @if($unreadCount > 0)
                                <span
                                    class="absolute top-1.5 right-1.5 w-2.5 h-2.5 bg-red-500 rounded-full border-2 border-white"></span>
                            @endif
                        </button>

                        {{-- Dropdown --}}
                        <div id="notification-dropdown"
                            class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden z-50">
                            <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                                <h3 class="font-bold text-gray-900">Notifications</h3>
                                <span
                                    class="text-xs font-semibold px-2 py-0.5 bg-indigo-100 text-indigo-700 rounded-full">{{ $unreadCount }}
                                    New</span>
                            </div>
                            <div class="max-h-96 overflow-y-auto divide-y divide-gray-50">
                                @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                    <a href="{{ $notification->data['url'] ?? '#' }}"
                                        class="block p-4 hover:bg-gray-50 transition-colors">
                                        <div class="flex space-x-3">
                                            <div
                                                class="flex-shrink-0 w-8 h-8 rounded-full flex items-center justify-center {{ $notification->data['type'] === 'success' ? 'bg-green-100 text-green-600' : 'bg-indigo-100 text-indigo-600' }}">
                                                <i class="{{ $notification->data['icon'] ?? 'fas fa-bell' }} text-sm"></i>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm font-semibold text-gray-900 truncate">
                                                    {{ $notification->data['title'] }}</p>
                                                <p class="text-xs text-gray-500 truncate mt-0.5">
                                                    {{ $notification->data['message'] }}</p>
                                                <p class="text-[10px] text-gray-400 mt-1">
                                                    {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <div class="p-8 text-center text-gray-500">
                                        <i class="fas fa-bell-slash text-2xl mb-2 opacity-20"></i>
                                        <p class="text-sm">No new notifications</p>
                                    </div>
                                @endforelse
                            </div>
                            <a href="{{ route('admin.notifications.index') }}"
                                class="block p-3 text-center text-sm font-bold text-indigo-600 hover:bg-indigo-50 border-t border-gray-100">
                                View All Notifications
                            </a>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="hidden md:flex items-center space-x-2">
                        <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200"
                            title="Quick Add">
                            <i class="fas fa-plus-circle text-lg"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200"
                            title="Export Data">
                            <i class="fas fa-file-export text-lg"></i>
                        </button>
                        <button class="p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200"
                            title="Refresh">
                            <i class="fas fa-sync-alt text-lg"></i>
                        </button>
                    </div>

                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition text-sm w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <!-- User Menu -->
                    <div class="relative">
                        <button id="user-menu" class="flex items-center space-x-2 focus:outline-none group">
                            <div
                                class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm shadow-md group-hover:shadow-lg transition-shadow">
                                {{ substr(optional(Auth::user())->name ?? 'A', 0, 1) }}
                            </div>
                            <i
                                class="fas fa-chevron-down text-gray-600 text-xs group-hover:text-indigo-600 transition-colors"></i>
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="p-4 md:p-6">
            <!-- Page Header -->
            <div class="mb-6 animate-fadeIn" style="animation-delay: 0.1s;">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
                        <p class="text-gray-600 mt-2">@yield('page-description', 'Welcome to your admin dashboard')</p>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center space-x-3">
                        @hasSection('action-buttons')
                            @yield('action-buttons')
                        @endif
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="card p-0 animate-fadeIn" style="animation-delay: 0.2s;">
                @yield('content')
            </div>

            <!-- Footer -->
            <footer class="mt-8 mb-4">
                <div class="card overflow-hidden">
                    <!-- Gradient Header -->
                    <div class="h-1 bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500"></div>
                    
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <!-- About Section -->
                            <div>
                                <div class="flex items-center space-x-3 mb-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 rounded-lg flex items-center justify-center shadow-lg">
                                        <i class="fas fa-university text-white"></i>
                                    </div>
                                    <h3 class="text-lg font-bold gradient-text">CAEDA Goods</h3>
                                </div>
                                <p class="text-sm text-gray-600 leading-relaxed">
                                    Excellence in education and development. Empowering the future through innovation and dedication.
                                </p>
                            </div>

                            <!-- Quick Links -->
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-link text-indigo-600 mr-2"></i>
                                    Quick Links
                                </h4>
                                <ul class="space-y-2">
                                    <li>
                                        <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                            <i class="fas fa-chevron-right text-xs mr-2 text-gray-400 group-hover:text-indigo-600 transition-colors"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                            <i class="fas fa-chevron-right text-xs mr-2 text-gray-400 group-hover:text-indigo-600 transition-colors"></i>
                                            News Management
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.profile.edit') }}" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                            <i class="fas fa-chevron-right text-xs mr-2 text-gray-400 group-hover:text-indigo-600 transition-colors"></i>
                                            Profile Settings
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                            <i class="fas fa-chevron-right text-xs mr-2 text-gray-400 group-hover:text-indigo-600 transition-colors"></i>
                                            Documentation
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <!-- Contact & Social -->
                            <div>
                                <h4 class="text-sm font-bold text-gray-900 mb-4 flex items-center">
                                    <i class="fas fa-share-alt text-indigo-600 mr-2"></i>
                                    Connect With Us
                                </h4>
                                <div class="space-y-3 mb-4">
                                    <a href="mailto:admin@caeda.edu.kh" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                        <i class="fas fa-envelope text-gray-400 group-hover:text-indigo-600 mr-2 transition-colors"></i>
                                        admin@caeda.edu.kh
                                    </a>
                                    <a href="tel:+85512345678" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors duration-200 flex items-center group">
                                        <i class="fas fa-phone text-gray-400 group-hover:text-indigo-600 mr-2 transition-colors"></i>
                                        +855 12 345 678
                                    </a>
                                </div>
                                
                                <!-- Social Media Icons -->
                                <div class="flex items-center space-x-2">
                                    <a href="#" class="w-9 h-9 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                        <i class="fab fa-facebook-f text-sm"></i>
                                    </a>
                                    <a href="#" class="w-9 h-9 bg-gradient-to-br from-sky-400 to-sky-500 rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                        <i class="fab fa-twitter text-sm"></i>
                                    </a>
                                    <a href="#" class="w-9 h-9 bg-gradient-to-br from-pink-500 to-rose-500 rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                        <i class="fab fa-instagram text-sm"></i>
                                    </a>
                                    <a href="#" class="w-9 h-9 bg-gradient-to-br from-blue-600 to-blue-700 rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                        <i class="fab fa-linkedin-in text-sm"></i>
                                    </a>
                                    <a href="#" class="w-9 h-9 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center text-white hover:shadow-lg hover:scale-110 transition-all duration-200">
                                        <i class="fab fa-youtube text-sm"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="border-t border-gray-200 pt-6">
                            <div class="flex flex-col md:flex-row justify-between items-center space-y-3 md:space-y-0">
                                <!-- Copyright -->
                                <div class="text-sm text-gray-600 text-center md:text-left">
                                    <p class="flex items-center justify-center md:justify-start">
                                        <i class="far fa-copyright mr-1"></i>
                                        <span>{{ date('Y') }} <span class="font-semibold gradient-text">CAEDA</span>. All rights reserved.</span>
                                    </p>
                                </div>

                                <!-- Version & Credits -->
                                <div class="flex items-center space-x-4 text-xs text-gray-500">
                                    <span class="flex items-center">
                                        <i class="fas fa-code mr-1 text-indigo-600"></i>
                                        Version 1.0.0
                                    </span>
                                    <span class="hidden md:inline">•</span>
                                    <span class="flex items-center">
                                        <i class="fas fa-heart mr-1 text-pink-500"></i>
                                        Made by Information Technology Office
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <!-- Toast Notifications Container -->
    <div id="toast-container" class="fixed bottom-4 right-4 z-50 space-y-3"></div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebar-toggle');
            const mobileOverlay = document.getElementById('mobile-overlay');

            // Sidebar toggle
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
                mobileOverlay.classList.toggle('hidden');
                document.body.classList.toggle('overflow-hidden');
            });

            mobileOverlay.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                mobileOverlay.classList.add('hidden');
                document.body.classList.remove('overflow-hidden');
            });

            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 768) {
                    sidebar.classList.remove('-translate-x-full');
                    mobileOverlay.classList.add('hidden');
                    document.body.classList.remove('overflow-hidden');
                }
            });

            // Handle dropdowns
            const dropdowns = document.querySelectorAll('.dropdown-btn');
            dropdowns.forEach(btn => {
                const menu = btn.nextElementSibling;
                const icon = btn.querySelector('.fa-chevron-down');

                // Open if active child exists
                if (menu.querySelector('.active')) {
                    menu.classList.remove('hidden');
                    btn.classList.add('active');
                    icon.classList.add('rotate-180');
                }

                btn.addEventListener('click', (e) => {
                    e.stopPropagation();

                    // Close other dropdowns
                    dropdowns.forEach(otherBtn => {
                        if (otherBtn !== btn) {
                            const otherMenu = otherBtn.nextElementSibling;
                            const otherIcon = otherBtn.querySelector('.fa-chevron-down');
                            otherMenu.classList.add('hidden');
                            otherBtn.classList.remove('active');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });

                    // Toggle current dropdown
                    menu.classList.toggle('hidden');
                    btn.classList.toggle('active');
                    icon.classList.toggle('rotate-180');
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', () => {
                dropdowns.forEach(btn => {
                    const menu = btn.nextElementSibling;
                    const icon = btn.querySelector('.fa-chevron-down');
                    menu.classList.add('hidden');
                    btn.classList.remove('active');
                    icon.classList.remove('rotate-180');
                });
            });

            // Toast notification function
            window.showToast = function (message, type = 'info') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');

                const colors = {
                    success: 'bg-gradient-to-r from-green-500 to-emerald-600',
                    error: 'bg-gradient-to-r from-red-500 to-pink-600',
                    warning: 'bg-gradient-to-r from-yellow-500 to-orange-600',
                    info: 'bg-gradient-to-r from-blue-500 to-indigo-600'
                };

                const icons = {
                    success: 'fa-check-circle',
                    error: 'fa-exclamation-circle',
                    warning: 'fa-exclamation-triangle',
                    info: 'fa-info-circle'
                };

                toast.className = `flex items-center p-4 rounded-xl text-white shadow-lg transform transition-all duration-300 translate-x-full ${colors[type]}`;
                toast.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas ${icons[type]} mr-3 text-xl"></i>
                        <span class="font-medium">${message}</span>
                    </div>
                    <button class="ml-6 text-white hover:text-gray-200 opacity-70 hover:opacity-100 transition-opacity">
                        <i class="fas fa-times"></i>
                    </button>
                `;

                container.appendChild(toast);

                // Animate in
                setTimeout(() => {
                    toast.classList.remove('translate-x-full');
                }, 10);

                // Remove after 5 seconds
                setTimeout(() => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        container.removeChild(toast);
                    }, 300);
                }, 5000);

                // Close button
                toast.querySelector('button').addEventListener('click', () => {
                    toast.classList.add('translate-x-full');
                    setTimeout(() => {
                        container.removeChild(toast);
                    }, 300);
                });
            };

            // User menu
            const userMenuBtn = document.getElementById('user-menu');
            if (userMenuBtn) {
                userMenuBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    // Implement user menu dropdown here
                    showToast('User menu clicked', 'info');
                });
            }

            // Notification dropdown logic
            const notificationBtn = document.getElementById('notification-btn');
            const notificationDropdown = document.getElementById('notification-dropdown');

            if (notificationBtn && notificationDropdown) {
                notificationBtn.addEventListener('click', (e) => {
                    e.stopPropagation();
                    notificationDropdown.classList.toggle('hidden');
                });

                document.addEventListener('click', (e) => {
                    if (!notificationDropdown.contains(e.target) && e.target !== notificationBtn) {
                        notificationDropdown.classList.add('hidden');
                    }
                });
            }

            // Show welcome message on dashboard
            if (window.location.pathname === '/admin/dashboard') {
                setTimeout(() => {
                    showToast('Welcome to CAEDA Admin Dashboard!', 'success');
                }, 1000);
            }

            // Quick action buttons
            document.querySelectorAll('[title="Quick Add"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    showToast('Quick add action triggered', 'info');
                });
            });

            document.querySelectorAll('[title="Export Data"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    showToast('Export data action triggered', 'info');
                });
            });

            document.querySelectorAll('[title="Refresh"]').forEach(btn => {
                btn.addEventListener('click', () => {
                    window.location.reload();
                });
            });

            // Dark mode initialization and toggle (admin)
            const dmBtn = document.getElementById('darkModeToggle');

            function applyTheme(t) {
                if (t === 'dark') document.body.classList.add('dark');
                else document.body.classList.remove('dark');
                if (dmBtn) dmBtn.textContent = document.body.classList.contains('dark') ? '☀️' : '🌙';
            }
            const savedTheme = localStorage.getItem('site-theme') || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
            applyTheme(savedTheme);
            if (dmBtn) dmBtn.addEventListener('click', function () {
                const next = document.body.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem('site-theme', next);
                applyTheme(next);
            });
        });
    </script>

    @yield('scripts')
</body>

</html>