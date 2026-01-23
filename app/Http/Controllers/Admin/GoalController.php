<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Goal;
use Illuminate\Http\Request;

class GoalController extends Controller
{
    public function index()
    {
        // Use paginate instead of get() to enable hasPages() and links()
        $goals = Goal::orderBy('order')->paginate(10); // 10 items per page
        return view('admin.goals.index', compact('goals'));
    }

    public function create()
    {
        return view('admin.goals.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        Goal::create($data);

        return redirect()->route('admin.goals.index')->with('success', 'Goal created successfully.');
    }

    public function edit(Goal $goal)
    {
        return view('admin.goals.edit', compact('goal'));
    }

    public function update(Request $request, Goal $goal)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? $goal->order ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        $goal->update($data);

        return redirect()->route('admin.goals.index')->with('success', 'Goal updated successfully.');
    }

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return redirect()->route('admin.goals.index')->with('success', 'Goal deleted successfully.');
    }
}
