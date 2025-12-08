<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Display all staff with pagination
    public function index()
    {
        // Paginate staff members (10 per page)
        $staff = Staff::orderBy('order', 'asc')->paginate(10);

        // Total counts for stats cards
        $totalStaff = Staff::count();
        $leadershipCount = Staff::whereIn('position', ['Director', 'Manager', 'Dean'])->count();
        $facultyCount = Staff::whereIn('position', ['Professor', 'Lecturer', 'Instructor'])->count();
        $supportCount = Staff::whereIn('position', ['Administrator', 'Assistant', 'Coordinator'])->count();

        return view('admin.staff.index', compact('staff', 'totalStaff', 'leadershipCount', 'facultyCount', 'supportCount'));
    }

    // Show create form
    public function create()
    {
        return view('admin.staff.create');
    }

    // Store new staff
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        Staff::create($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff created successfully.');
    }

    // Show edit form
    public function edit(Staff $staff)
    {
        return view('admin.staff.edit', compact('staff'));
    }

    // Update staff
    public function update(Request $request, Staff $staff)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('staff', 'public');
        }

        $staff->update($data);

        return redirect()->route('admin.staff.index')->with('success', 'Staff updated successfully.');
    }

    // Delete staff
    public function destroy(Staff $staff)
    {
        $staff->delete();

        return redirect()->route('admin.staff.index')->with('success', 'Staff deleted successfully.');
    }
}
