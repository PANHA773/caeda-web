<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Workshop;
use App\Models\FeaturedMenu;
use App\Models\Location;
use App\Models\User;
use App\Models\News;
use App\Models\Staff;
use App\Models\Visitor;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Core Statistics
        $stats = [
            ['label' => 'Goods', 'value' => Workshop::count(), 'sub' => 'Total goods', 'icon' => 'fas fa-coffee', 'bg' => 'from-indigo-500 to-purple-600', 'color' => 'indigo'],
            ['label' => 'Featured Menus', 'value' => FeaturedMenu::count(), 'sub' => 'Displayed on homepage', 'icon' => 'fas fa-utensils', 'bg' => 'from-emerald-500 to-teal-600', 'color' => 'emerald'],
            ['label' => 'Staff', 'value' => Staff::count(), 'sub' => 'CAEDA Members', 'icon' => 'fas fa-user-tie', 'bg' => 'from-blue-500 to-indigo-600', 'color' => 'blue'],
            ['label' => 'Users', 'value' => User::count(), 'sub' => 'Registered users', 'icon' => 'fas fa-users', 'bg' => 'from-pink-500 to-rose-600', 'color' => 'pink'],
        ];

        // Quick Actions
        $actions = [
            ['title' => 'About Page', 'desc' => 'Edit main content', 'route' => 'admin.about.index', 'icon' => 'fas fa-info-circle', 'bg' => 'bg-indigo-50', 'color' => 'indigo'],
            ['title' => 'Team Members', 'desc' => 'Update staff profiles', 'route' => 'admin.team-members.index', 'icon' => 'fas fa-users', 'bg' => 'bg-emerald-50', 'color' => 'emerald'],
            ['title' => 'Faculties', 'desc' => 'Manage departments', 'route' => 'admin.faculties.index', 'icon' => 'fas fa-building', 'bg' => 'bg-blue-50', 'color' => 'blue'],
        ];

        // 2. Recent Activities logic
        $activities = collect();
        foreach ([Workshop::class, FeaturedMenu::class, Location::class, User::class] as $m) {
            if (!class_exists($m))
                continue;
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
                // ignore
            }
        }
        $recent = $activities->sortByDesc('time')->take(6);

        // 2.1 News Trends (Last 6 Months)
        $newsTrends = News::select(
            DB::raw('count(id) as count'),
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as date")
        )
            ->groupBy('date')
            ->orderBy('date', 'desc')
            ->take(6)
            ->get();

        $newsTrends = $newsTrends->sortBy('date');

        $chartNewsLabels = $newsTrends->pluck('date')->map(function ($date) {
            return Carbon::parse($date)->format('M Y');
        })->values();
        $chartNewsData = $newsTrends->pluck('count')->values();

        // 3. System Status logic
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
        $uptime = isset($_SERVER['REQUEST_TIME']) ? round((time() - $_SERVER['REQUEST_TIME']) / 3600) : 0;

        // 4. Chart Data: Visitor Trends (Last 6 Months)
        // Group visitors by month
        $visitorTrends = Visitor::select(
            DB::raw('SUM(hits) as count'),
            DB::raw("DATE_FORMAT(date, '%Y-%m') as month")
        )
            ->groupBy('month')
            ->orderBy('month', 'desc')
            ->take(6)
            ->get();

        // Ensure we have correct order for chart (oldest to newest)
        $visitorTrends = $visitorTrends->sortBy('month');

        $chartVisitorLabels = $visitorTrends->pluck('month')->map(function ($date) {
            return Carbon::parse($date)->format('M Y');
        })->values();
        $chartVisitorData = $visitorTrends->pluck('count')->values();


        // 5. Chart Data: Content Distribution
        $contentStats = [
            'Workshops' => Workshop::count(),
            'Menus' => FeaturedMenu::count(),
            'News' => News::count(),
            'Staff' => Staff::count(),
        ];
        $chartContentLabels = array_keys($contentStats);
        $chartContentData = array_values($contentStats);

        // 6. Chart Data: Staff Position Distribution
        $staffByPosition = Staff::select('position', DB::raw('count(*) as count'))
            ->groupBy('position')
            ->orderBy('count', 'desc')
            ->get();

        $chartStaffLabels = $staffByPosition->pluck('position')->values();
        $chartStaffData = $staffByPosition->pluck('count')->values();


        return view('admin.dashboard', compact(
            'stats',
            'actions',
            'recent',
            'storageUsedPercent',
            'dbStatus',
            'dbPercent',
            'phpVersion',
            'userCount',
            'uptime',
            'chartVisitorLabels',
            'chartVisitorData',
            'chartNewsLabels',
            'chartNewsData',
            'chartContentLabels',
            'chartContentData',
            'chartStaffLabels',
            'chartStaffData'
        ));
    }
}
