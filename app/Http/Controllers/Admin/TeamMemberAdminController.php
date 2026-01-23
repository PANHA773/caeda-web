<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberAdminController extends Controller
{
    /**
     * Display a listing of team members.
     */
    public function index()
    {
        // Paginate instead of get() for better performance
        $teamMembers = TeamMember::orderBy('order')->paginate(10);

        return view('admin.team-members.index', compact('teamMembers'));
    }

    /**
     * Show the form for creating a new team member.
     */
    public function create()
    {
        return view('admin.team-members.create');
    }

    /**
     * Store a newly created team member in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'bio'       => 'nullable|string',
            'photo'     => 'nullable|image|max:2048',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'position', 'bio', 'order']);
        $data['is_active'] = $request->boolean('is_active');

        // Upload photo
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        TeamMember::create($data);

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Team member created successfully.');
    }

    /**
     * Show the form for editing the specified team member.
     */
    public function edit(TeamMember $teamMember)
    {
        return view('admin.team-members.edit', compact('teamMember'));
    }

    /**
     * Update the specified team member in storage.
     */
    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'bio'       => 'nullable|string',
            'photo'     => 'nullable|image|max:2048',
            'order'     => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'position', 'bio', 'order']);
        $data['is_active'] = $request->boolean('is_active');

        // Replace photo if new uploaded
        if ($request->hasFile('photo')) {
            if ($teamMember->photo && Storage::disk('public')->exists($teamMember->photo)) {
                Storage::disk('public')->delete($teamMember->photo);
            }

            $data['photo'] = $request->file('photo')->store('team-members', 'public');
        }

        $teamMember->update($data);

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Team member updated successfully.');
    }

    /**
     * Remove the specified team member from storage.
     */
    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->photo && Storage::disk('public')->exists($teamMember->photo)) {
            Storage::disk('public')->delete($teamMember->photo);
        }

        $teamMember->delete();

        return redirect()
            ->route('admin.team-members.index')
            ->with('success', 'Team member deleted successfully.');
    }
}
