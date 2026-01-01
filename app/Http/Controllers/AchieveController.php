<?php

namespace App\Http\Controllers;

use App\Models\SuccessStory;
use App\Models\HeroAchievement;
use App\Models\PerformanceMetric;
use App\Models\GrowthStat;
use Illuminate\Http\Request;

class AchieveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $successStories = SuccessStory::orderBy('order')->get();
        $heroStats = HeroAchievement::orderBy('order')->get();
        $performanceMetrics = PerformanceMetric::orderBy('order')->get();
        $growthStats = GrowthStat::orderBy('order')->get();

        return view('achieve', compact(
            'successStories',
            'heroStats',
            'performanceMetrics',
            'growthStats'
        ));
    }
}
