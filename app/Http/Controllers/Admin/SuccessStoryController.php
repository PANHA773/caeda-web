<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Illuminate\Http\Request;

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
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'image' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'required|integer',
        ]);

        SuccessStory::create($request->all());
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story added!');
    }

    public function edit(SuccessStory $successStory)
    {
        return view('admin.success-stories.edit', compact('successStory'));
    }

    public function update(Request $request, SuccessStory $successStory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'achievement' => 'required|string|max:255',
            'year' => 'required|string|max:50',
            'image' => 'required|string|max:255',
            'quote' => 'required|string',
            'order' => 'required|integer',
        ]);

        $successStory->update($request->all());
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story updated!');
    }

    public function destroy(SuccessStory $successStory)
    {
        $successStory->delete();
        return redirect()->route('admin.success-stories.index')->with('success', 'Success story deleted!');
    }
}

