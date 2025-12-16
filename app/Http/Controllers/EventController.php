<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // fetch upcoming events ordered by date
        $events = Event::orderBy('date')->get();

        // upcoming sidebar list
        $upcomingEvents = Event::upcoming()->take(5)->get();

        // featured event (prefer upcoming featured)
        $featured = Event::where('is_featured', true)->whereDate('date', '>=', now()->toDateString())->orderBy('date')->first();
        if (!$featured) {
            $featured = Event::where('is_featured', true)->orderBy('date')->first() ?? $events->first();
        }

        // calendar: compute days in current month that have events
        $month = now()->month;
        $year = now()->year;
        $eventsThisMonth = Event::whereYear('date', $year)->whereMonth('date', $month)->get();
        $calendarDays = $eventsThisMonth->map(function ($e) { return (int) $e->date->format('j'); })->unique()->values()->toArray();

        return view('events', compact('events', 'upcomingEvents', 'featured', 'calendarDays'));
    }

    public function show(Event $event)
    {
        // fetch related upcoming events (exclude current event)
        $relatedEvents = Event::where('id', '!=', $event->id)
            ->upcoming()
            ->limit(3)
            ->get();

        return view('events.show', compact('event', 'relatedEvents'));
    }
}
