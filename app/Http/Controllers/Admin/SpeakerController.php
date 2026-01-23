<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
    public function index()
    {
        $speakers = Speaker::orderBy('name')->get();
        return view('admin.speakers.index', compact('speakers'));
    }

    public function create()
    {
        return view('admin.speakers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'topic' => 'nullable|string|max:255',
            'social' => 'nullable|string', // accept string from form
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('speakers', 'public');
        }

        // Convert comma-separated string to array
        $data['social'] = isset($data['social']) ? array_map('trim', explode(',', $data['social'])) : [];

        $data['is_active'] = $request->has('is_active'); // checkbox fix

        Speaker::create($data);

        return redirect()->route('admin.speakers.index')->with('success', 'Speaker added successfully.');
    }

    public function edit(Speaker $speaker)
    {
        return view('admin.speakers.edit', compact('speaker'));
    }

    public function update(Request $request, Speaker $speaker)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'topic' => 'nullable|string|max:255',
            'social' => 'nullable|string', // accept string
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($speaker->image) {
                Storage::disk('public')->delete($speaker->image);
            }
            $data['image'] = $request->file('image')->store('speakers', 'public');
        }

        // Convert comma-separated string to array
        $data['social'] = isset($data['social']) ? array_map('trim', explode(',', $data['social'])) : [];
        $data['is_active'] = $request->has('is_active'); // checkbox fix

        $speaker->update($data);

        return redirect()->route('admin.speakers.index')->with('success', 'Speaker updated successfully.');
    }

    public function destroy(Speaker $speaker)
    {
        if ($speaker->image) {
            Storage::disk('public')->delete($speaker->image);
        }
        $speaker->delete();
        return redirect()->route('admin.speakers.index')->with('success', 'Speaker deleted.');
    }
}
