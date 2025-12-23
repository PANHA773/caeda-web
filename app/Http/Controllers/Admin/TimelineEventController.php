<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimelineEvent;
use Illuminate\Http\Request;

class TimelineEventController extends Controller
{
    public function index()
    {
        $events = TimelineEvent::orderBy('sort_order')->get();
        return view('admin.timeline_events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.timeline_events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:completed,active,upcoming',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        TimelineEvent::create($data);

        return redirect()->route('admin.timeline_events.index')
            ->with('success', 'Timeline event created');
    }



    public function edit(TimelineEvent $timelineEvent)
    {
        $event = $timelineEvent;
        return view('admin.timeline_events.edit', compact('event'));
    }


    public function update(Request $request, TimelineEvent $timelineEvent)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|in:completed,active,upcoming',
            'icon' => 'nullable|string',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $timelineEvent->update($data);

        return redirect()->route('admin.timeline_events.index')
            ->with('success', 'Timeline event updated');
    }

    public function destroy(TimelineEvent $timelineEvent)
    {
        $timelineEvent->delete();
        return back()->with('success', 'Timeline event deleted');
    }
}
