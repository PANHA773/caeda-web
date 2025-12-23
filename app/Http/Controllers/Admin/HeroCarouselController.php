<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroCarousel;

class HeroCarouselController extends Controller
{
    public function index()
    {
        $heroSlides = HeroCarousel::orderBy('order')->get();
        return view('admin.hero_carousels.index', compact('heroSlides'));
    }

    public function create()
    {
        return view('admin.hero_carousels.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|url',
            'order' => 'integer|nullable',
            'is_active' => 'boolean',
        ]);

        HeroCarousel::create($data);
        return redirect()->route('admin.hero_carousels.index')->with('success', 'Slide added successfully.');
    }

    public function edit(HeroCarousel $hero_carousel)
    {
        return view('admin.hero_carousels.edit', compact('hero_carousel'));
    }

    public function update(Request $request, HeroCarousel $hero_carousel)
    {
        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|url',
            'order' => 'integer|nullable',
            'is_active' => 'boolean',
        ]);

        $hero_carousel->update($data);
        return redirect()->route('admin.hero_carousels.index')->with('success', 'Slide updated successfully.');
    }

    public function destroy(HeroCarousel $hero_carousel)
    {
        $hero_carousel->delete();
        return redirect()->route('admin.hero_carousels.index')->with('success', 'Slide deleted.');
    }
}
