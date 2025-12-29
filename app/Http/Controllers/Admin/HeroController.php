<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Illuminate\Http\Request;


class HeroController extends Controller
{
    // Display all heroes
    public function index()
    {
          $heroes = Hero::latest()->paginate(10);
        return view('admin.heroes.index', compact('heroes'));
    }

    // Show form to create a new hero
    public function create()
    {
        return view('admin.heroes.create');
    }

    // Store a new hero
    public function store(Request $request)
    {
        $data = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'highlight_title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stats' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        // Ensure is_active is boolean
        $data['is_active'] = $request->has('is_active');

        Hero::create($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero created successfully');
    }

    // Show form to edit an existing hero
    public function edit(Hero $hero)
    {
        return view('admin.heroes.edit', compact('hero'));
    }

    // Update an existing hero
    public function update(Request $request, Hero $hero)
    {
        $data = $request->validate([
            'badge_text' => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'highlight_title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'stats' => 'nullable|array',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($hero->image && \Storage::disk('public')->exists($hero->image)) {
                \Storage::disk('public')->delete($hero->image);
            }
            $data['image'] = $request->file('image')->store('heroes', 'public');
        }

        $data['is_active'] = $request->has('is_active');

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero updated successfully');
    }

    // Delete a hero
    public function destroy(Hero $hero)
    {
        // Delete image if exists
        if ($hero->image && \Storage::disk('public')->exists($hero->image)) {
            \Storage::disk('public')->delete($hero->image);
        }

        $hero->delete();

        return back()->with('success', 'Hero deleted successfully');
    }
}
