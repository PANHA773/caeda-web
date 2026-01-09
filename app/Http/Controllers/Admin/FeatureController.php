<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    // List all features
    public function index()
    {
        $features = Feature::orderBy('sort_order')->paginate(10);
        return view('admin.features.index', compact('features'));
    }

    // Show create form
    public function create()
    {
        return view('admin.features.create');
    }

    // Store new feature
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'color' => 'required|string',
        ]);

        Feature::create($validated + [
            'is_active' => $request->has('is_active'),
            'sort_order' => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Feature created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.features.edit', compact('feature'));
    }

    // Update feature
    public function update(Request $request, $id)
    {
        $feature = Feature::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'required|string',
            'color' => 'required|string',
        ]);

        $feature->update($validated + [
            'is_active' => $request->has('is_active'),
            'sort_order' => $request->input('sort_order', 0),
        ]);

        return redirect()->route('admin.features.index')->with('success', 'Feature updated successfully!');
    }

    // Delete feature
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $feature->delete();

        return redirect()->route('admin.features.index')->with('success', 'Feature deleted successfully!');
    }
}
