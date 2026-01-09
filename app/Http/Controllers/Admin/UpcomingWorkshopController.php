<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UpcomingWorkshop;
use Illuminate\Http\Request;

class UpcomingWorkshopController extends Controller
{

    public function index()
{
    $upcomingWorkshops = UpcomingWorkshop::orderBy('date', 'asc')->get();
    return view('admin.upcoming_workshops.index', compact('upcomingWorkshops'));
}


    public function create()
    {
        return view('admin.upcoming_workshops.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'instructor' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'instructor_image' => 'nullable|image|max:2048',
        ]);

        // Upload images
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('upcoming_workshops', 'public');
        }
        if ($request->hasFile('instructor_image')) {
            $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
        }

        UpcomingWorkshop::create($data);

        return redirect()->route('admin.upcoming_workshops.index')->with('success', 'Workshop added.');
    }

    public function edit(UpcomingWorkshop $upcomingWorkshop)
    {
        return view('admin.upcoming_workshops.edit', compact('upcomingWorkshop'));
    }

    public function update(Request $request, UpcomingWorkshop $upcomingWorkshop)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date',
            'instructor' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'instructor_image' => 'nullable|image|max:2048',
        ]);

        // Upload images
        if ($request->hasFile('image')) {
            if ($upcomingWorkshop->image) {
                \Storage::disk('public')->delete($upcomingWorkshop->image);
            }
            $data['image'] = $request->file('image')->store('upcoming_workshops', 'public');
        }
        if ($request->hasFile('instructor_image')) {
            if ($upcomingWorkshop->instructor_image) {
                \Storage::disk('public')->delete($upcomingWorkshop->instructor_image);
            }
            $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
        }

        $upcomingWorkshop->update($data);

        return redirect()->route('admin.upcoming_workshops.index')->with('success', 'Workshop updated.');
    }

    public function destroy(UpcomingWorkshop $upcomingWorkshop)
    {
        if ($upcomingWorkshop->image) {
            \Storage::disk('public')->delete($upcomingWorkshop->image);
        }
        if ($upcomingWorkshop->instructor_image) {
            \Storage::disk('public')->delete($upcomingWorkshop->instructor_image);
        }
        $upcomingWorkshop->delete();

        return redirect()->route('admin.upcoming_workshops.index')->with('success', 'Workshop deleted.');
    }
}
