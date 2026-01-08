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
        'title'     => 'nullable|string|max:255',
        'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        'order'     => 'nullable|integer',
        'is_active' => 'nullable|boolean',
    ]);

    // Upload image to storage/app/public/hero_slides
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('hero_slides', 'public');
    }

    // Fix checkbox value
    $data['is_active'] = $request->has('is_active');

    HeroCarousel::create($data);

    return redirect()
        ->route('admin.hero_carousels.index')
        ->with('success', 'Slide added successfully.');
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
