<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\TimelineEvent;
use App\Models\FeaturedEvent;
use App\Models\Footer;

class EventController extends Controller
{
    public function index(Request $request)
    {
        // Featured event for banner (single latest active)
        $featured = FeaturedEvent::where('is_active', true)
            ->orderBy('start_date')
            ->first();

        // All active featured events (for listing / countdown / admin-like section)
        $featuredEvents = FeaturedEvent::where('is_active', true)
            ->orderBy('start_date')
            ->get();

        // Fetch upcoming events ordered by date
        $events = Event::orderBy('date')->get();

        // Upcoming sidebar list
        $upcomingEvents = Event::upcoming()->take(5)->get();

        // Featured event (prefer upcoming featured in Event table)
        $featuredEventFromEventTable = Event::where('is_featured', true)
            ->whereDate('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->first();

        if (!$featuredEventFromEventTable) {
            $featuredEventFromEventTable = Event::where('is_featured', true)
                ->orderBy('date')
                ->first() ?? $events->first();
        }

        // Calendar: compute days in current month that have events
        $month = now()->month;
        $year = now()->year;

        $eventsThisMonth = Event::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();

        $calendarEventDays = $eventsThisMonth
            ->map(fn($e) => (int) $e->date->format('j'))
            ->unique()
            ->values()
            ->toArray();

        // Fetch active speakers for homepage
        $speakers = Speaker::where('is_active', true)->orderBy('name')->take(4)->get();

        $footer = Footer::first();

        // Fetch timeline events
        $timelineEvents = TimelineEvent::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('events', compact(
            'events',
            'upcomingEvents',
            'featured', // single featured banner event
            'featuredEvents', // full list of featured events
            'calendarEventDays',
            'speakers',
            'timelineEvents',
            'featuredEventFromEventTable'
            ,'footer'
        ));
    }

    public function show(Event $event)
    {
        // Fetch related upcoming events (exclude current event)
        $relatedEvents = Event::where('id', '!=', $event->id)
            ->upcoming()
            ->limit(3)
            ->get();

        // Fetch timeline events
        $timelineEvents = TimelineEvent::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('events.show', compact(
            'event',
            'relatedEvents',
            'timelineEvents',
            'footer'
        ));
    }
}
