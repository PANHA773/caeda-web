<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leadership;
use Illuminate\Http\Request;

class LeadershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaderships = Leadership::orderBy('order')->get();
        return view('admin.leadership.index', compact('leaderships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.leadership.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'message' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('leadership', 'public');
        }

        Leadership::create($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leadership $leadership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leadership $leadership)
    {
        return view('admin.leadership.edit', compact('leadership'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leadership $leadership)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'message' => 'required|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($leadership->image && \Storage::disk('public')->exists($leadership->image)) {
                \Storage::disk('public')->delete($leadership->image);
            }
            $data['image'] = $request->file('image')->store('leadership', 'public');
        }

        $leadership->update($data);

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leadership $leadership)
    {
        if ($leadership->image && \Storage::disk('public')->exists($leadership->image)) {
            \Storage::disk('public')->delete($leadership->image);
        }
        $leadership->delete();

        return redirect()->route('admin.leadership.index')->with('success', 'Leadership message deleted successfully!');
    }
}
