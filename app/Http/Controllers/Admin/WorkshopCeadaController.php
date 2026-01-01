<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkshopCeadaController extends Controller
{
    /**
     * Display a listing of workshops
     */
    public function index()
    {
        $workshops = Workshop::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.workshops.index', compact('workshops'));
    }

    /**
     * Show the form for creating a new workshop
     */
    public function create()
    {
        return view('admin.workshops.create');
    }

    /**
     * Store a newly created workshop
     */

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:100',
        'description' => 'nullable|string',
        'instructor' => 'required|string|max:255',
        'level' => 'required|string|max:50',
        'duration' => 'nullable|string|max:50',
        'date' => 'nullable|date',
        'video_url' => 'nullable|url',
        'image' => 'nullable|image|max:2048',
        'instructor_image' => 'nullable|image|max:2048',
        'rating' => 'nullable|numeric|min:0|max:5',
        'attendees' => 'nullable|integer|min:0',
        'status' => 'nullable|boolean',
    ]);

    $data['slug'] = Str::slug($data['title']);
    $data['date'] = $data['date'] ?? now();
    $data['status'] = $request->has('status');
    $data['description'] = $data['description'] ?? ''; // <<< add this line

    // Upload workshop image
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('workshops', 'public');
    }

    // Upload instructor image
    if ($request->hasFile('instructor_image')) {
        $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
    }

    Workshop::create($data);

    return redirect()
        ->route('admin.workshops.index')
        ->with('success', 'Workshop created successfully.');
}

public function edit(Workshop $workshop)
{
    return view('admin.workshops.edit', compact('workshop'));
}

    /**
     * Update the specified workshop
     */
    public function update(Request $request, Workshop $workshop)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'instructor' => 'required|string|max:255',
            'level' => 'required|string|max:50',
            'duration' => 'nullable|string|max:50',
            'date' => 'nullable|date',
            'video_url' => 'nullable|url',
            'image' => 'nullable|image|max:2048',
            'instructor_image' => 'nullable|image|max:2048',
            'rating' => 'nullable|numeric|min:0|max:5',
            'attendees' => 'nullable|integer|min:0',
            'status' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);
        $data['date'] = $data['date'] ?? $workshop->date ?? now(); // Keep old date if not changed
        $data['status'] = $request->has('status');

        // Replace workshop image if uploaded
        if ($request->hasFile('image')) {
            if ($workshop->image) {
                Storage::disk('public')->delete($workshop->image);
            }
            $data['image'] = $request->file('image')->store('workshops', 'public');
        }

        // Replace instructor image if uploaded
        if ($request->hasFile('instructor_image')) {
            if ($workshop->instructor_image) {
                Storage::disk('public')->delete($workshop->instructor_image);
            }
            $data['instructor_image'] = $request->file('instructor_image')->store('instructors', 'public');
        }

        $workshop->update($data);

        return redirect()
            ->route('admin.workshops.index')
            ->with('success', 'Workshop updated successfully.');
    }

    /**
     * Remove the specified workshop
     */
    public function destroy(Workshop $workshop)
    {
        if ($workshop->image) {
            Storage::disk('public')->delete($workshop->image);
        }

        if ($workshop->instructor_image) {
            Storage::disk('public')->delete($workshop->instructor_image);
        }

        $workshop->delete();

        return redirect()
            ->route('admin.workshops.index')
            ->with('success', 'Workshop deleted successfully.');
    }
}
