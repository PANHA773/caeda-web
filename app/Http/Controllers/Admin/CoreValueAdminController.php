<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoreValue;
use Illuminate\Http\Request;

class CoreValueAdminController extends Controller
{
    /**
     * Display a listing of core values.
     */
    public function index(Request $request)
    {
        $query = CoreValue::query();

        // Search by title
        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where('is_active', $request->status === 'active');
        }

        // Paginate results
        $coreValues = $query->orderBy('order')->paginate(10)->withQueryString();

        // Stats
        $stats = [
            'total' => CoreValue::count(),
            'active' => CoreValue::where('is_active', true)->count(),
            'inactive' => CoreValue::where('is_active', false)->count(),
            'topOrder' => CoreValue::min('order') ?? 0,
        ];

        return view('admin.core-values.index', compact('coreValues', 'stats'));
    }

    /**
     * Show the form for creating a new core value.
     */
    public function create()
    {
        return view('admin.core-values.create');
    }

    /**
     * Store a newly created core value in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'color_class' => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'is_active'   => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description', 'icon', 'color_class', 'order']);
        $data['is_active'] = $request->has('is_active');

        CoreValue::create($data);

        return redirect()
            ->route('admin.core-values.index')
            ->with('success', 'Core value created successfully.');
    }

    /**
     * Show the form for editing the specified core value.
     */
    public function edit(CoreValue $coreValue)
    {
        return view('admin.core-values.edit', compact('coreValue'));
    }

    /**
     * Update the specified core value in storage.
     */
    public function update(Request $request, CoreValue $coreValue)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:255',
            'color_class' => 'nullable|string|max:255',
            'order'       => 'nullable|integer',
            'is_active'   => 'nullable|boolean',
        ]);

        $data = $request->only(['title', 'description', 'icon', 'color_class', 'order']);
        $data['is_active'] = $request->has('is_active');

        $coreValue->update($data);

        return redirect()
            ->route('admin.core-values.index')
            ->with('success', 'Core value updated successfully.');
    }

    /**
     * Remove the specified core value from storage.
     */
    public function destroy(CoreValue $coreValue)
    {
        $coreValue->delete();

        return redirect()
            ->route('admin.core-values.index')
            ->with('success', 'Core value deleted successfully.');
    }

    /**
     * Reorder core values (used with AJAX drag-and-drop).
     */
    public function reorder(Request $request)
    {
        $request->validate([
            'order' => 'required|array',
            'order.*' => 'integer|exists:core_values,id',
        ]);

        foreach ($request->order as $index => $id) {
            CoreValue::where('id', $id)->update(['order' => $index + 1]);
        }

        return response()->json(['message' => 'Core values reordered successfully.']);
    }
}
