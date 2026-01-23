<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuccessStoryController extends Controller
{
    public function index()
    {
        $successStories = SuccessStory::orderBy('order')->paginate(10);
        return view('admin.success-stories.index', compact('successStories'));
    }

    public function create()
    {
        return view('admin.success-stories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048', // Change validation to image
            'quote' => 'required|string',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('success-stories', 'public');
        }

        SuccessStory::create($data);
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story added!');
    }

    public function edit(SuccessStory $successStory)
    {
        return view('admin.success-stories.edit', compact('successStory'));
    }

    public function update(Request $request, SuccessStory $successStory)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'image' => 'nullable|image|max:2048',
            'quote' => 'required|string',
            'order' => 'required|integer',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is a local file
            if ($successStory->image && !preg_match('/^https?:\/\//i', $successStory->image)) {
                Storage::disk('public')->delete($successStory->image);
            }
            $data['image'] = $request->file('image')->store('success-stories', 'public');
        }

        $successStory->update($data);
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story updated!');
    }

    public function destroy(SuccessStory $successStory)
    {
        // Delete image if it exists and is a local file
        if ($successStory->image && !preg_match('/^https?:\/\//i', $successStory->image)) {
            Storage::disk('public')->delete($successStory->image);
        }

        $successStory->delete();
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story deleted!');
    }
}

