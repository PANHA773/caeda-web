<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;
use App\Models\Workshop;
use App\Models\FeaturedMenu;
use App\Models\Location;
use App\Models\User;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $models = [Workshop::class, FeaturedMenu::class, Location::class, User::class];

        $activities = collect();

        foreach ($models as $m) {
            if (!class_exists($m)) continue;
            try {
                $items = $m::orderBy('updated_at', 'desc')->take(50)->get();
                foreach ($items as $item) {
                    $label = $item->title ?? $item->name ?? ($item->id ?? 'item');
                    $activities->push([
                        'model' => class_basename($m),
                        'id' => $item->id ?? null,
                        'label' => $label,
                        'time' => $item->updated_at ?? $item->created_at ?? now(),
                        'user' => $item->updated_by ?? 'System',
                    ]);
                }
            } catch (\Exception $e) {
                Log::debug('ActivityController model fetch error: ' . $e->getMessage());
            }
        }

        $all = $activities->sortByDesc('time')->values();

        // Manual pagination
        $page = max(1, (int) $request->get('page', 1));
        $perPage = 15;
        $total = $all->count();
        $slice = $all->slice(($page - 1) * $perPage, $perPage)->values();

        $paginator = new LengthAwarePaginator($slice, $total, $perPage, $page, [
            'path' => route('admin.activity.index'),
            'query' => $request->query(),
        ]);

        return view('admin.activity.index', ['activities' => $paginator]);
    }
}
