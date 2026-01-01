<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroAchievement;
use Illuminate\Http\Request;

class HeroAchievementController extends Controller
{
    public function index()
    {
    
        $heroAchievements = HeroAchievement::orderBy('order')->paginate(10); // 10 per page

        return view('admin.hero-achievements.index', compact('heroAchievements'));
    }

    public function create()
    {
        return view('admin.hero-achievements.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'value' => 'required|string',
            'label' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        HeroAchievement::create($request->all());

        return redirect()->route('admin.hero-achievements.index')->with('success', 'Achievement added.');
    }

    public function edit(HeroAchievement $heroAchievement)
    {
        return view('admin.hero-achievements.edit', compact('heroAchievement'));
    }

    public function update(Request $request, HeroAchievement $heroAchievement)
    {
        $request->validate([
            'value' => 'required|string',
            'label' => 'required|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'required|integer',
        ]);

        $heroAchievement->update($request->all());

        return redirect()->route('admin.hero-achievements.index')->with('success', 'Achievement updated.');
    }

    public function destroy(HeroAchievement $heroAchievement)
    {
        $heroAchievement->delete();
        return redirect()->route('admin.hero-achievements.index')->with('success', 'Achievement deleted.');
    }
}
