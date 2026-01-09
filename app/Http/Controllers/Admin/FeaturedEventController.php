<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FeaturedEvent;

class FeaturedEventController extends Controller
{
    /**
     * Display a listing of featured events.
     */
    public function index()
    {
        $featuredEvents = FeaturedEvent::orderBy('start_date', 'asc')->paginate(10);

        return view('admin.featured_events.index', compact('featuredEvents'));
    }

    /**
     * Show the form for creating a new featured event.
     */
    public function create()
    {
        return view('admin.featured_events.create');
    }

    /**
     * Store a newly created featured event.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,active,completed',
            'speakers_count' => 'nullable|integer|min:0',
            'sessions_count' => 'nullable|integer|min:0',
            'attendees_count' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        FeaturedEvent::create($data);

        return redirect()->route('admin.featured_events.index')
                         ->with('success', 'Featured event created successfully.');
    }

    /**
     * Show the form for editing an existing featured event.
     */
    public function edit(FeaturedEvent $featuredEvent)
    {
        return view('admin.featured_events.edit', compact('featuredEvent'));
    }

    /**
     * Update an existing featured event.
     */
    public function update(Request $request, FeaturedEvent $featuredEvent)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'start_time' => 'nullable|date_format:H:i',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => 'required|in:upcoming,active,completed',
            'speakers_count' => 'nullable|integer|min:0',
            'sessions_count' => 'nullable|integer|min:0',
            'attendees_count' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $featuredEvent->update($data);

        return redirect()->route('admin.featured_events.index')
                         ->with('success', 'Featured event updated successfully.');
    }

    /**
     * Remove a featured event.
     */
    public function destroy(FeaturedEvent $featuredEvent)
    {
        $featuredEvent->delete();

        return redirect()->route('admin.featured_events.index')
                         ->with('success', 'Featured event deleted successfully.');
    }
}
