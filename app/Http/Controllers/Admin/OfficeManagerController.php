<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeManager;
use Illuminate\Http\Request;

class OfficeManagerController extends Controller
{
    /**
     * Display all office managers
     */
    public function index()
    {
        // Use paginate instead of get() for pagination support
        $managers = OfficeManager::orderBy('order', 'asc')->paginate(10);

        // Pre-calculate stats for cards
        $totalManagers = OfficeManager::count();
        $seniorManagers = OfficeManager::where('position', 'Senior Manager')->count();
        $assistantManagers = OfficeManager::where('position', 'Assistant Manager')->count();
        $topPriority = OfficeManager::min('order') ?? 0;

        return view('admin.office-managers.index', compact(
            'managers',
            'totalManagers',
            'seniorManagers',
            'assistantManagers',
            'topPriority'
        ));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.office-managers.create');
    }

    /**
     * Store new manager
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gradient' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('office_managers', 'public');
        }

        OfficeManager::create($data);

        return redirect()->route('admin.office-managers.index')
            ->with('success', 'Created successfully');
    }

    /**
     * Show edit form
     */
    public function edit(OfficeManager $officeManager)
    {
        return view('admin.office-managers.edit', compact('officeManager'));
    }

    /**
     * Update existing manager
     */
    public function update(Request $request, OfficeManager $officeManager)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'gradient' => 'nullable|string|max:100',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('office_managers', 'public');
        }

        $officeManager->update($data);

        return redirect()->route('admin.office-managers.index')
            ->with('success', 'Updated successfully');
    }

    /**
     * Delete manager
     */
    public function destroy(OfficeManager $officeManager)
    {
        $officeManager->delete();

        return redirect()->route('admin.office-managers.index')
            ->with('success', 'Deleted successfully');
    }
}
