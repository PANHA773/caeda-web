<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LeaderTeam;
use Illuminate\Support\Facades\Schema;

class LeaderTeamController extends Controller
{
    /**
     * Display a listing of the leader team members.
     */
    public function index()
    {
        $query = LeaderTeam::query();

        // Sort only if "order" column exists
        if (Schema::hasColumn('leader_teams', 'order')) {
            $query->orderBy('order', 'asc');
        }

        $leaderTeams = $query->get();

        return view('admin.leader-teams.index', compact('leaderTeams'));
    }

    /**
     * Show the form for creating a new leader team member.
     */
    public function create()
    {
        return view('admin.leader-teams.create');
    }

    /**
     * Store a newly created leader team member.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'nullable|string|max:255',
            'image'     => 'nullable|image|max:2048',
            'gradient'  => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        // Upload image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('leader-team', 'public');
        }

        // ✅ Fix: gradient cannot be null
        $validated['gradient'] = $validated['gradient']
            ?? 'from-blue-500 to-purple-500';

        // Optional order column
        if (Schema::hasColumn('leader_teams', 'order')) {
            $validated['order'] = $validated['order'] ?? 0;
        } else {
            unset($validated['order']);
        }

        // Checkbox handling
        $validated['is_active'] = $request->has('is_active');

        LeaderTeam::create($validated);

        return redirect()
            ->route('admin.leader-teams.index')
            ->with('success', 'Leader team member added successfully.');
    }

    /**
     * Show the form for editing a leader team member.
     */
    public function edit(LeaderTeam $leaderTeam)
    {
        return view('admin.leader-teams.edit', compact('leaderTeam'));
    }

    /**
     * Update a leader team member.
     */
    public function update(Request $request, LeaderTeam $leaderTeam)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'nullable|string|max:255',
            'image'     => 'nullable|image|max:2048',
            'gradient'  => 'nullable|string|max:255',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable',
        ]);

        // Upload new image
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('leader-team', 'public');
        }

        // ✅ Fix: gradient fallback
        $validated['gradient'] = $validated['gradient']
            ?? $leaderTeam->gradient
            ?? 'from-blue-500 to-purple-500';

        // Optional order column
        if (Schema::hasColumn('leader_teams', 'order')) {
            $validated['order'] = $validated['order']
                ?? $leaderTeam->order
                ?? 0;
        } else {
            unset($validated['order']);
        }

        // Checkbox handling
        $validated['is_active'] = $request->has('is_active');

        $leaderTeam->update($validated);

        return redirect()
            ->route('admin.leader-teams.index')
            ->with('success', 'Leader team member updated successfully.');
    }

    /**
     * Delete a leader team member.
     */
    public function destroy(LeaderTeam $leaderTeam)
    {
        $leaderTeam->delete();

        return redirect()
            ->route('admin.leader-teams.index')
            ->with('success', 'Leader team member deleted successfully.');
    }

    /**
     * Update ordering (AJAX – optional)
     */
    public function updateOrder(Request $request)
    {
        if (!Schema::hasColumn('leader_teams', 'order')) {
            return response()->json(['error' => 'Order column not found'], 400);
        }

        foreach ($request->order as $item) {
            LeaderTeam::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Toggle active status (AJAX – optional)
     */
    public function toggleStatus($id)
    {
        $member = LeaderTeam::findOrFail($id);
        $member->update(['is_active' => !$member->is_active]);

        return response()->json(['success' => true]);
    }
}
