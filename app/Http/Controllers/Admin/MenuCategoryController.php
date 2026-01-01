<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuCategoryController extends Controller
{
    /**
     * Display a listing of menu categories
     */
    public function index()
    {
        $menuCategories = MenuCategory::orderBy('order')->get();
        return view('admin.menu-categories.index', compact('menuCategories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create()
    {
        return view('admin.menu-categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'icon'  => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['name']); // Generate slug

        MenuCategory::create($validated);

        return redirect()
            ->route('admin.menu-categories.index')
            ->with('success', 'Menu category created successfully.');
    }

    /**
     * Show the form for editing the category
     */
    public function edit(MenuCategory $menuCategory)
    {
        return view('admin.menu-categories.edit', ['category' => $menuCategory]);
    }

    /**
     * Update the category
     */
    public function update(Request $request, MenuCategory $menuCategory)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'icon'  => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['slug'] = Str::slug($validated['name']); // Update slug

        $menuCategory->update($validated);

        return redirect()
            ->route('admin.menu-categories.index')
            ->with('success', 'Menu category updated successfully.');
    }

    /**
     * Remove the category
     */
    public function destroy(MenuCategory $menuCategory)
    {
        $menuCategory->delete();

        return redirect()
            ->route('admin.menu-categories.index')
            ->with('success', 'Menu category deleted successfully.');
    }
}
