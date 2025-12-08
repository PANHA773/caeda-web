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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }
        .nav-link.active, .dropdown-link.active {
            background: linear-gradient(135deg,#4F46E5,#7C3AED);
            color: white;
            box-shadow: 0 4px 12px rgba(79,70,229,0.3);
        }
        .nav-link:hover:not(.active), .dropdown-link:hover:not(.active) {
            background-color: #F3F4F6;
            transform: translateX(4px);
        }
        .stat-card:hover { transform: translateY(-4px); transition: transform 0.3s ease; }
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; border-radius: 10px; }
        ::-webkit-scrollbar-thumb { background: #4F46E5; border-radius: 10px; }
        ::-webkit-scrollbar-thumb:hover { background: #4338CA; }
    </style>
</head>
<body class="bg-gray-50 min-h-screen flex">

<!-- Mobile Overlay -->
<div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden hidden"></div>

<!-- Sidebar -->
<aside id="sidebar" class="sidebar bg-white w-64 md:w-72 h-screen shadow-xl flex flex-col fixed md:relative z-50 transform -translate-x-full md:translate-x-0 transition-transform duration-300">
    <!-- Logo -->
    <div class="p-6 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-lg flex items-center justify-center">
                <i class="fas fa-university text-white text-lg"></i>
            </div>
            <div>
                <h2 class="text-xl font-bold text-gray-900">CAEDA Admin</h2>
                <p class="text-xs text-gray-500">University Management</p>
            </div>
        </div>
    </div>

    <!-- User Profile -->
    <div class="p-4 border-b border-gray-200">
        <div class="flex items-center space-x-3">
            <div class="relative">
                <img src="{!! 'https://ui-avatars.com/api/?name='.urlencode(optional(Auth::user())->name ?? 'Admin').'&background=4F46E5&color=fff&size=128' !!}" 
                     alt="Admin" class="w-10 h-10 rounded-full border-2 border-white shadow">
                <div class="absolute bottom-0 right-0 w-3 h-3 bg-green-500 rounded-full border-2 border-white"></div>
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-gray-900 truncate">{{ optional(Auth::user())->name ?? 'Administrator' }}</p>
                <p class="text-xs text-gray-500 truncate">{{ optional(Auth::user())->email ?? 'admin@caeda.edu.kh' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 p-4">
        <div class="space-y-1">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" 
               class="nav-link flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:text-indigo-600 transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fas fa-chart-line w-5 text-center"></i>
                <span class="font-medium">Dashboard</span>
            </a>

            <div class="mt-6 mb-2 px-4"> 
                <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Content Management</p>
            </div>

            <!-- About Page Dropdown -->
            <div class="relative">
                <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-700 hover:text-indigo-600 transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.about*') || request()->routeIs('admin.faculties*') || request()->routeIs('admin.team-members*') || request()->routeIs('admin.core-values*') || request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-info-circle w-5 text-center"></i>
                        <span class="font-medium">About Page</span>
                    </span>
                    <i class="fas fa-chevron-down transition-transform duration-200"></i>
                </button>

                <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                    <a href="{{ route('admin.faculties.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.faculties*') ? 'active' : '' }}">
                        <i class="fas fa-building w-5 text-center"></i>
                        <span>Faculties</span>
                    </a>
                    <a href="{{ route('admin.team-members.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>Team Members</span>
                    </a>
                    <a href="{{ route('admin.core-values.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                        <i class="fas fa-heart w-5 text-center"></i>
                        <span>Core Values</span>
                    </a>
                    <a href="{{ route('admin.accreditations.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.accreditations*') ? 'active' : '' }}">
                        <i class="fas fa-award w-5 text-center"></i>
                        <span>Accreditations</span>
                    </a>
                </div>
            </div>

            <!-- Our Team Dropdown -->
            <div class="relative">
                <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-700 hover:text-indigo-600 transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.our-team*') ? 'active' : '' }}">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-users-cog w-5 text-center"></i>
                        <span class="font-medium">Our-Team Page</span>
                    </span>
                    <i class="fas fa-chevron-down transition-transform duration-200"></i>
                </button>

                <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                    <a href="{{ route('admin.office-managers.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>Office-Manager</span>
                    </a>
                    <a href="{{ route('admin.staff.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                        <i class="fas fa-heart w-5 text-center"></i>
                        <span>Caeda​ Staff</span>
                    </a>
                     <a href="{{ route('admin.staff.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.core-values*') ? 'active' : '' }}">
                        <i class="fas fa-heart w-5 text-center"></i>
                        <span>Caeda​ Staff</span>
                    </a>
                </div>
            </div>

                        <!-- caeda program Dropdown -->
            <div class="relative">
                <button class="dropdown-btn w-full flex items-center justify-between px-4 py-3 rounded-xl text-gray-700 hover:text-indigo-600 transition-all duration-200 focus:outline-none {{ request()->routeIs('admin.our-team*') ? 'active' : '' }}">
                    <span class="flex items-center space-x-3">
                        <i class="fas fa-users-cog w-5 text-center"></i>
                        <span class="font-medium"> Programs Page</span>
                    </span>
                    <i class="fas fa-chevron-down transition-transform duration-200"></i>
                </button>

                <div class="dropdown-menu hidden pl-12 mt-1 space-y-1">
                    <a href="{{ route('admin.programs.index') }}" class="dropdown-link flex items-center space-x-3 px-4 py-2 rounded-lg text-gray-700 hover:text-indigo-600 {{ request()->routeIs('admin.team-members*') ? 'active' : '' }}">
                        <i class="fas fa-users w-5 text-center"></i>
                        <span>caeda-programs</span>
                    </a>
              
                </div>
            </div>

        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-gray-200">
        <a href="{{ route('home') }}" 
           class="flex items-center justify-center space-x-2 px-4 py-3 bg-gray-100 hover:bg-gray-200 rounded-xl text-gray-700 font-medium transition-colors duration-200">
            <i class="fas fa-globe"></i>
            <span>View Website</span>
        </a>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-3">
            @csrf
            <button type="submit" class="flex items-center justify-center space-x-2 w-full px-4 py-3 bg-red-50 hover:bg-red-100 rounded-xl text-red-600 font-medium transition-colors duration-200">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Main Content -->
<main class="flex-1 overflow-y-auto min-h-screen">
    <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
        <div class="px-6 py-4 flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <button id="sidebar-toggle" class="md:hidden text-gray-600 hover:text-gray-900 focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <div class="hidden md:flex items-center space-x-2 text-sm">
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-indigo-600">Dashboard</a>
                    <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                    <span class="text-gray-900 font-medium">@yield('title', 'Dashboard')</span>
                </div>
            </div>
        </div>
    </header>

    <div class="p-6">
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">@yield('page-title', 'Dashboard')</h1>
            <p class="text-gray-600 mt-2">@yield('page-description', 'Welcome to your admin dashboard')</p>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">
            @yield('content')
        </div>
    </div>
</main>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebar-toggle');
    const mobileOverlay = document.getElementById('mobile-overlay');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        mobileOverlay.classList.toggle('hidden');
    });
    mobileOverlay.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        mobileOverlay.classList.add('hidden');
    });
    window.addEventListener('resize', () => {
        if(window.innerWidth >= 768){
            sidebar.classList.remove('-translate-x-full');
            mobileOverlay.classList.add('hidden');
        }
    });

    // Handle multiple dropdowns
    const dropdowns = document.querySelectorAll('.dropdown-btn');
    dropdowns.forEach(btn => {
        const menu = btn.nextElementSibling;
        // Open if active child exists
        if(menu.querySelector('.active')) {
            menu.classList.remove('hidden');
            btn.querySelector('i').classList.add('rotate-180');
        }
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
            btn.querySelector('i').classList.toggle('rotate-180');
        });
    });
});
</script>

@yield('scripts')
</body>
</html>
