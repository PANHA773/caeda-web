@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard Overview')
@section('page-description')
    Welcome back, {{ Auth::user()->name }}! Here's what's happening with your site.
@endsection

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @php
            use App\Models\Workshop;
            use App\Models\FeaturedMenu;
            use App\Models\Location;
            use App\Models\User;

            $stats = [
                ['label' => 'Goods', 'value' => Workshop::count(), 'sub' => 'Total goods', 'icon' => 'fas fa-coffee', 'bg' => 'from-indigo-500 to-purple-600', 'color' => 'indigo'],
                ['label' => 'Featured Menus', 'value' => FeaturedMenu::count(), 'sub' => 'Displayed on homepage', 'icon' => 'fas fa-utensils', 'bg' => 'from-emerald-500 to-teal-600', 'color' => 'emerald'],
                ['label' => 'Locations', 'value' => Location::count(), 'sub' => 'Active locations', 'icon' => 'fas fa-map-marker-alt', 'bg' => 'from-amber-500 to-orange-600', 'color' => 'amber'],
                ['label' => 'Users', 'value' => User::count(), 'sub' => 'Registered users', 'icon' => 'fas fa-users', 'bg' => 'from-pink-500 to-rose-600', 'color' => 'pink'],
            ];
        @endphp

        @foreach($stats as $stat)
        <div class="stat-card bg-gradient-to-br {{ $stat['bg'] }} text-white rounded-2xl p-6 shadow-lg">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-{{ $stat['color'] }}-100 text-sm font-medium">{{ $stat['label'] }}</p>
                    <h3 class="text-3xl font-bold mt-2">{{ $stat['value'] }}</h3>
                    <p class="text-{{ $stat['color'] }}-100 text-sm mt-2">{{ $stat['sub'] }}</p>
                </div>
                <div class="bg-white/20 p-4 rounded-full">
                    <i class="{{ $stat['icon'] }} text-xl"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Quick Actions -->
    <div>
        <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @php
                $actions = [
                    ['title' => 'About Page', 'desc' => 'Edit main content', 'route' => 'admin.about.index', 'icon' => 'fas fa-info-circle', 'bg' => 'bg-indigo-50', 'color' => 'indigo'],
                    ['title' => 'Team Members', 'desc' => 'Update staff profiles', 'route' => 'admin.team-members.index', 'icon' => 'fas fa-users', 'bg' => 'bg-emerald-50', 'color' => 'emerald'],
                    ['title' => 'Faculties', 'desc' => 'Manage departments', 'route' => 'admin.faculties.index', 'icon' => 'fas fa-building', 'bg' => 'bg-blue-50', 'color' => 'blue'],
                ];
            @endphp

            @foreach($actions as $action)
            <a href="{{ route($action['route']) }}" class="group bg-white border border-gray-200 rounded-xl p-4 hover:border-{{ $action['color'] }}-300 hover:shadow-md transition-all duration-300">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 {{ $action['bg'] }} rounded-lg flex items-center justify-center group-hover:bg-{{ $action['color'] }}-100 transition-colors">
                        <i class="{{ $action['icon'] }} text-{{ $action['color'] }}-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 group-hover:text-{{ $action['color'] }}-700">{{ $action['title'] }}</h3>
                        <p class="text-sm text-gray-500">{{ $action['desc'] }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>

    <!-- Recent Activity + System Status -->
    @php
        use Illuminate\Support\Facades\DB;

        // Gather recent model changes from key models
        $activities = collect();

        foreach ([Workshop::class, FeaturedMenu::class, Location::class, User::class] as $m) {
            if (!class_exists($m)) continue;
            try {
                $latest = $m::orderBy('updated_at', 'desc')->take(3)->get();
                foreach ($latest as $item) {
                    $label = property_exists($item, 'title') ? $item->title : (property_exists($item, 'name') ? $item->name : ($item->id ?? 'item'));
                    $activities->push([
                        'user' => $item->updated_by ?? 'System',
                        'action' => 'updated',
                        'item' => $label,
                        'time' => $item->updated_at,
                        'color' => 'indigo'
                    ]);
                }
            } catch (\Exception $e) {
                // ignore if model has no table or column
            }
        }

        $recent = $activities->sortByDesc('time')->take(6);

        // System metrics
        $storageTotal = @disk_total_space(storage_path()) ?: 0;
        $storageFree = @disk_free_space(storage_path()) ?: 0;
        $storageUsedPercent = $storageTotal > 0 ? round((($storageTotal - $storageFree) / $storageTotal) * 100) : 0;

        try {
            DB::connection()->getPdo();
            $dbStatus = 'Healthy';
            $dbPercent = 100;
        } catch (\Exception $e) {
            $dbStatus = 'Down';
            $dbPercent = 0;
        }

        $phpVersion = phpversion();
        $userCount = User::count();
        $uptime = round((time() - ($_SERVER['REQUEST_TIME'] ?? time())) / 3600); // hours since PHP process start
    @endphp

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Recent Activity -->
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                <a href="{{ route('admin.activity.index') }}" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
            </div>
            <div class="space-y-4">
                @forelse($recent as $activity)
                    <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                        <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                            <i class="fas fa-user text-indigo-600"></i>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">{{ $activity['user'] }}</span>
                                <span class="text-indigo-600 font-medium">{{ $activity['action'] }}</span>
                                {{ $activity['item'] }}
                            </p>
                            <p class="text-xs text-gray-500 mt-1">{{ 
                                \Carbon\Carbon::parse($activity['time'])->diffForHumans() }}</p>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">No recent activity.</p>
                @endforelse
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white border border-gray-200 rounded-xl p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-6">System Status</h3>
            <div class="space-y-6">
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">Storage Usage</span>
                        <span class="font-medium text-gray-900">{{ $storageUsedPercent }}%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full" style="width: {{ $storageUsedPercent }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">Database</span>
                        <span class="font-medium {{ $dbStatus === 'Healthy' ? 'text-green-600' : 'text-red-600' }}">{{ $dbStatus }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="{{ $dbStatus === 'Healthy' ? 'bg-green-600' : 'bg-red-600' }} h-2 rounded-full" style="width: {{ $dbPercent }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-gray-700">PHP Version</span>
                        <span class="font-medium text-gray-900">{{ $phpVersion }}</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                    <div class="text-center p-4 bg-indigo-50 rounded-lg">
                        <div class="text-2xl font-bold text-indigo-700">{{ $uptime }}h</div>
                        <div class="text-sm text-indigo-600">App Uptime</div>
                    </div>
                    <div class="text-center p-4 bg-green-50 rounded-lg">
                        <div class="text-2xl font-bold text-green-700">{{ $userCount }}</div>
                        <div class="text-sm text-green-600">Total Users</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
