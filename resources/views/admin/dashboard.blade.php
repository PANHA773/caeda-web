@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')
@section('page-description', 'Welcome back, {{ Auth::user()->name }}! Here\'s what\'s happening with your site.')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="stat-card bg-gradient-to-br from-indigo-500 to-purple-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-indigo-100 text-sm font-medium">Total Pages</p>
                    <h3 class="text-3xl font-bold mt-2">12</h3>
                    <p class="text-indigo-100 text-sm mt-2">+2 this week</p>
                </div>
                <div class="bg-white/20 p-4 rounded-full">
                    <i class="fas fa-file-alt text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stat-card bg-gradient-to-br from-emerald-500 to-teal-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-emerald-100 text-sm font-medium">Team Members</p>
                    <h3 class="text-3xl font-bold mt-2">24</h3>
                    <p class="text-emerald-100 text-sm mt-2">Active profiles</p>
                </div>
                <div class="bg-white/20 p-4 rounded-full">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stat-card bg-gradient-to-br from-amber-500 to-orange-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-amber-100 text-sm font-medium">Monthly Visits</p>
                    <h3 class="text-3xl font-bold mt-2">1.2K</h3>
                    <p class="text-amber-100 text-sm mt-2">+15% growth</p>
                </div>
                <div class="bg-white/20 p-4 rounded-full">
                    <i class="fas fa-chart-line text-xl"></i>
                </div>
            </div>
        </div>

        <div class="stat-card bg-gradient-to-br from-pink-500 to-rose-600 text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-pink-100 text-sm font-medium">Messages</p>
                    <h3 class="text-3xl font-bold mt-2">8</h3>
                    <p class="text-pink-100 text-sm mt-2">New today</p>
                </div>
                <div class="bg-white/20 p-4 rounded-full">
                    <i class="fas fa-envelope text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div>
        <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <a href="{{ route('admin.about.index') }}" 
               class="group bg-white border border-gray-200 rounded-xl p-4 hover:border-indigo-300 hover:shadow-md transition-all duration-300">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-indigo-50 rounded-lg flex items-center justify-center group-hover:bg-indigo-100 transition-colors">
                        <i class="fas fa-info-circle text-indigo-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-indigo-700">About Page</h3>
                        <p class="text-sm text-gray-500">Edit main content</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.team-members.index') }}" 
               class="group bg-white border border-gray-200 rounded-xl p-4 hover:border-emerald-300 hover:shadow-md transition-all duration-300">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-emerald-50 rounded-lg flex items-center justify-center group-hover:bg-emerald-100 transition-colors">
                        <i class="fas fa-users text-emerald-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-emerald-700">Team Members</h3>
                        <p class="text-sm text-gray-500">Update staff profiles</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.faculties.index') }}" 
               class="group bg-white border border-gray-200 rounded-xl p-4 hover:border-blue-300 hover:shadow-md transition-all duration-300">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-50 rounded-lg flex items-center justify-center group-hover:bg-blue-100 transition-colors">
                        <i class="fas fa-building text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-blue-700">Faculties</h3>
                        <p class="text-sm text-gray-500">Manage departments</p>
                    </div>
                </div>
            </a>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @foreach([
                    ['user' => 'Admin', 'action' => 'updated', 'item' => 'About page content', 'time' => '2 min ago', 'color' => 'indigo'],
                    ['user' => 'John Doe', 'action' => 'added', 'item' => 'new team member', 'time' => '1 hour ago', 'color' => 'green'],
                    ['user' => 'Jane Smith', 'action' => 'edited', 'item' => 'faculty information', 'time' => '3 hours ago', 'color' => 'blue'],
                    ['user' => 'Admin', 'action' => 'published', 'item' => 'new accreditation', 'time' => 'Yesterday', 'color' => 'amber'],
                ] as $activity)
                <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                    <div class="w-10 h-10 rounded-full bg-{{ $activity['color'] }}-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-user text-{{ $activity['color'] }}-600"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm text-gray-900">
                            <span class="font-medium">{{ $activity['user'] }}</span>
                            <span class="text-{{ $activity['color'] }}-600 font-medium">{{ $activity['action'] }}</span>
                            {{ $activity['item'] }}
                        </p>
                        <p class="text-xs text-gray-500 mt-1">{{ $activity['time'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">System Status</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">Storage Usage</span>
                        <span class="font-medium text-gray-900">78%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: 78%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">Database</span>
                        <span class="font-medium text-green-600">Healthy</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">Security</span>
                        <span class="font-medium text-green-600">Protected</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                    <div class="text-center p-4 bg-indigo-50 rounded-lg">
                        <div class="text-2xl font-bold text-indigo-700">98%</div>
                        <div class="text-sm text-indigo-600">Uptime</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-2xl font-bold text-green-700">24</div>
                        <div class="text-sm text-green-600">Active Users</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection