<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ImpactStory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImpactStoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $stories = ImpactStory::orderBy('order')
                ->orderBy('created_at', 'desc')
                ->paginate(10); // 10 per page, adjust as needed


        return view('admin.stories.index', compact('stories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.stories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'story' => 'required|string',
            'impact' => 'required|string|max:255',
            'color' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('impact_stories', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        ImpactStory::create($validated);

        return redirect()->route('admin.stories.index')
                         ->with('success', 'Impact story created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $story = ImpactStory::findOrFail($id);
        return view('admin.stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $story = ImpactStory::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'story' => 'required|string',
            'impact' => 'required|string|max:255',
            'color' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($story->image && Storage::disk('public')->exists($story->image)) {
                Storage::disk('public')->delete($story->image);
            }
            $path = $request->file('image')->store('impact_stories', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active') ? true : false;

        $story->update($validated);

        return redirect()->route('admin.stories.index')
                         ->with('success', 'Impact story updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $story = ImpactStory::findOrFail($id);

        // Delete image from storage
        if ($story->image && Storage::disk('public')->exists($story->image)) {
            Storage::disk('public')->delete($story->image);
        }

        $story->delete();

        return redirect()->route('admin.stories.index')
                         ->with('success', 'Impact story deleted successfully.');
    }
}
