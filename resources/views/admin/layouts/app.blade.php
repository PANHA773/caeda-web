<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title', 'Dashboard') | CAEDA</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

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
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex">

    <!-- Mobile Overlay -->
    <div id="mobile-overlay" class="mobile-overlay fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="sidebar w-64 md:w-72 h-screen flex flex-col fixed md:relative z-50 transform -translate-x-full md:translate-x-0">
        <!-- Logo -->
        <div class="p-6 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 via-purple-600 to-pink-500 rounded-xl flex items-center justify-center shadow-lg">
                        <i class="fas fa-university text-white text-xl"></i>
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-xl blur opacity-30"></div>
                    </div>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-white">CAEDA Admin</h2>
                    <p class="text-xs text-gray-400">University Management System</p>
                </div>
            </div>
        </div>

        <!-- User Profile -->
        <div class="p-4 border-b border-gray-800">
            <div class="flex items-center space-x-3">
                <div class="relative">
                    <img src="{!! 'https://ui-avatars.com/api/?name='.urlencode(optional(Auth::user())->name ?? 'Admin').'&background=4F46E5&color=fff&bold=true&size=128' !!}"
                        alt="Admin" class="w-12 h-12 rounded-xl border-2 border-gray-700 shadow-lg">
                    <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-gray-800"></div>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ optional(Auth::user())->name ?? 'Administrator' }}</p>
                    <p class="text-xs text-gray-400 truncate">{{ optional(Auth::user())->email ?? 'admin@caeda.edu.kh' }}</p>
                    <div class="mt-1 flex items-center">
                        <span class="status-indicator status-online"></span>
                        <span class="text-xs text-gray-400">Online</span>
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


                <!-- home Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.our-team*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-home w-5 text-center text-lg"></i>
                            <span class="font-medium">Home Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>
                    <!-- welcome Section -->
                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.welcome_sections.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.welcome_sections*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Welcome Section</span>
                        </a>
                        <!-- Hero Carousel -->
                        <a href="{{ route('admin.hero_carousels.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.hero_carousels*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Hero Carousel</span>
                        </a>
                        <!-- Features -->
                        <a href="{{ route('admin.features.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.office-managers*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Features</span>
                        </a>

                        <a href="{{ route('admin.footer.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.office-managers*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Footer</span>
                        </a>
                    </div>
                </div>

                <!-- About Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.about*') || request()->routeIs('admin.faculties*') || request()->routeIs('admin.team-members*') || request()->routeIs('admin.core-values*') || request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-info-circle w-5 text-center text-lg"></i>
                            <span class="font-medium">About Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.faculties.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.faculties*') ? 'active' : '' }}">
                            <i class="fas fa-building w-5 text-center"></i>
                            <span>Faculties</span>
                        </a>
                        <a href="{{ route('admin.team-members.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}">
                            <i class="fas fa-users w-5 text-center"></i>
                            <span>Team Members</span>
                        </a>
                        <a href="{{ route('admin.core-values.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                            <i class="fas fa-heart w-5 text-center"></i>
                            <span>Core Values</span>
                        </a>
                        <a href="{{ route('admin.accreditations.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                            <i class="fas fa-award w-5 text-center"></i>
                            <span>Accreditations</span>
                        </a>
                    </div>
                </div>

                <!-- Our Team Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.our-team*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-users-cog w-5 text-center text-lg"></i>
                            <span class="font-medium">Our-Team Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">

                          <a href="{{ route('admin.leader-teams.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.leader-teams*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Leader Team</span>
                        </a>

                        <a href="{{ route('admin.office-managers.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.office-managers*') ? 'active' : '' }}">
                            <i class="fas fa-user-tie w-5 text-center"></i>
                            <span>Office Manager</span>
                        </a>
                        <a href="{{ route('admin.staff.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.staff*') ? 'active' : '' }}">
                            <i class="fas fa-user-friends w-5 text-center"></i>
                            <span>CAEDA Staff</span>
                        </a>
                    </div>
                </div>

                <!-- Programs Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-graduation-cap w-5 text-center text-lg"></i>
                            <span class="font-medium">Programs Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.programs.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.programs*') ? 'active' : '' }}">
                            <i class="fas fa-list-alt w-5 text-center"></i>
                            <span>CAEDA Programs</span>
                        </a>
                    </div>
                </div>

                <!-- Membership Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-handshake w-5 text-center text-lg"></i>
                            <span class="font-medium">Membership Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.partners.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.partners*') ? 'active' : '' }}">
                            <i class="fas fa-building w-5 text-center"></i>
                            <span>Partners</span>
                        </a>
                        <a href="{{ route('admin.pricing.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.pricing*') ? 'active' : '' }}">
                            <i class="fas fa-building w-5 text-center"></i>
                            <span>Pricing</span>
                        </a>
                    </div>
                </div>

                <!-- Events Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-calendar-alt w-5 text-center text-lg"></i>
                            <span class="font-medium">Events Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <!-- Featured Events -->
                        <a href="{{ route('admin.featured_events.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.featured_events*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Featured Events</span>
                        </a>
                        <!-- Events -->
                        <a href="{{ route('admin.events.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Events</span>
                        </a>
                        <!-- Speakers -->
                        <a href="{{ route('admin.speakers.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.speakers*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Speakers</span>
                        </a>
                        <a href="{{ route('admin.timeline_events.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.timeline-events*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Timeline Events</span>
                        </a>
                    </div>
                </div>


                <!-- Contact Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-calendar-alt w-5 text-center text-lg"></i>
                            <span class="font-medium">Contact Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm"></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">

                         <a href="{{ route('admin.contacts.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>User-Messages</span>
                        </a>
                        <!-- Social -->
                        <a href="{{ route('admin.social.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.social*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Social</span>
                        </a>
                        <!-- Contact Information -->
                        <a href="{{ route('admin.contact-information.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.social*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Contact-Info</span>
                        </a>

                        <a href="{{ route('admin.faqs.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.social*') ? 'active' : '' }}">
                            <i class="fas fa-calendar-check w-5 text-center"></i>
                            <span>Faqs</span>
                        </a>
                    </div>


                </div>


                <!-- Workshop Page Dropdown -->
                <div class="relative">
                    <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                        <span class="flex items-center space-x-3">
                            <i class="fas fa-chalkboard w-5 text-center text-lg"></i>

                            <span class="font-medium">Workshop Page</span>
                        </span>
                        <i class="fas fa-chevron-down transition-transform duration-200 text-sm "></i>
                    </button>

                    <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                        <a href="{{ route('admin.workshops.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-400 hover:text-white hover:bg-gray-800 {{ request()->routeIs('admin.events*') ? 'active' : '' }}">
                            <i class="fas fa-video w-5 text-center"></i>
                            <span>Videos</span>
                        </a>
                    </div>
                </div>

                <!-- Settings -->
                <div class="mt-6 mb-2 px-4">
                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Settings</p>
                </div>

                <a href="#" class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200">
                    <i class="fas fa-cog w-5 text-center text-lg"></i>
                    <span class="font-medium">Settings</span>
                </a>

                <a href="#" class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-300 hover:text-white transition-all duration-200">
                    <i class="fas fa-bell w-5 text-center text-lg"></i>
                    <span class="font-medium">Notifications</span>
                    <span class="badge badge-primary">3</span>
                </a>
            </div>
        </nav>

        <!-- Sidebar Footer -->
        <div class="p-4 border-t border-gray-800 space-y-3">
            <a href="{{ route('home') }}"
                class="flex items-center justify-center space-x-2 px-4 py-3 bg-gray-800 hover:bg-gray-700 rounded-xl text-gray-300 hover:text-white font-medium transition-colors duration-200">
                <i class="fas fa-globe"></i>
                <span>View Website</span>
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-1">
                @csrf
                <button type="submit" class="flex items-center justify-center space-x-2 w-full px-4 py-3 bg-red-900/20 hover:bg-red-900/30 rounded-xl text-red-400 hover:text-red-300 font-medium transition-colors duration-200">
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
                    <button id="sidebar-toggle" class="md:hidden text-gray-600 hover:text-indigo-600 focus:outline-none transition-colors duration-200">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <div class="hidden md:flex items-center space-x-2 text-sm">
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-indigo-600 transition-colors duration-200">Dashboard</a>
                        <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        <span class="text-gray-900 font-semibold gradient-text">@yield('title', 'Dashboard')</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-600 hover:text-indigo-600 transition-colors duration-200">
                        <i class="fas fa-bell text-lg"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Search..."
                            class="pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition text-sm w-64">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>

                    <!-- User Menu -->
                    <div class="relative">
                        <button id="user-menu" class="flex items-center space-x-2 focus:outline-none">
                            <div class="w-8 h-8 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-full flex items-center justify-center text-white font-semibold text-sm">
                                {{ substr(optional(Auth::user())->name ?? 'A', 0, 1) }}
                            </div>
                            <i class="fas fa-chevron-down text-gray-600 text-xs"></i>
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
            window.showToast = function(message, type = 'info') {
                const container = document.getElementById('toast-container');
                const toast = document.createElement('div');

                const colors = {
                    success: 'bg-green-500',
                    error: 'bg-red-500',
                    warning: 'bg-yellow-500',
                    info: 'bg-blue-500'
                };

                const icons = {
                    success: 'fa-check-circle',
                    error: 'fa-exclamation-circle',
                    warning: 'fa-exclamation-triangle',
                    info: 'fa-info-circle'
                };

                toast.className = `flex items-center p-4 rounded-xl text-white shadow-lg transform transition-all duration-300 translate-x-full ${colors[type]}`;
                toast.innerHTML = `
                    <i class="fas ${icons[type]} mr-3 text-lg"></i>
                    <span>${message}</span>
                    <button class="ml-auto text-white hover:text-gray-200">
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

            // Show welcome message on dashboard
            if (window.location.pathname === '/admin/dashboard') {
                setTimeout(() => {
                    showToast('Welcome to CAEDA Admin Dashboard!', 'success');
                }, 1000);
            }
        });
    </script>

    @yield('scripts')
</body>

</html>