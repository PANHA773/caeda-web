<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;
use Carbon\Carbon;

class WorkshopController extends Controller
{
    public function index()
    {
        // Get all active workshops
        $workshops = Workshop::where('status', 'active')
            ->orderBy('date', 'desc')
            ->get();

        // Get upcoming workshops
        $upcomingWorkshops = Workshop::where('date', '>=', Carbon::today())
            ->where('status', 'active')
            ->where('registration_open', true)
            ->orderBy('date')
            ->limit(8)
            ->get();

        // Get distinct categories
        $categories = Workshop::where('status', 'active')
            ->select('category')
            ->distinct()
            ->pluck('category');

        return view('workshop', compact('workshops', 'upcomingWorkshops', 'categories'));
    }

    public function show($slug)
    {
        $workshop = Workshop::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        // Get related workshops
        $relatedWorkshops = Workshop::where('category', $workshop->category)
            ->where('id', '!=', $workshop->id)
            ->where('status', 'active')
            ->orderBy('date', 'desc')
            ->limit(4)
            ->get();

        return view('workshops.show', compact('workshop', 'relatedWorkshops'));
    }

    public function filter(Request $request)
    {
        $query = Workshop::where('status', 'active');

        if ($request->category && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->level && $request->level !== 'all') {
            $query->where('level', $request->level);
        }

        $workshops = $query->orderBy('date', 'desc')->get();

        return view('workshops.filter', compact('workshops'));
    }

    public function register(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        $workshop = Workshop::findOrFail($id);

        // Check if workshop is still open for registration
        if ($workshop->date < Carbon::today() || $workshop->status !== 'active') {
            return back()->with('error', 'Registration for this workshop is closed.');
        }

        // Check if seats are available
        if ($workshop->seats_available !== null && $workshop->seats_available <= 0) {
            return back()->with('error', 'No seats available for this workshop.');
        }

        // Update workshop attendees
        $workshop->increment('attendees');
        
        if ($workshop->seats_available !== null) {
            $workshop->decrement('seats_available');
        }

        return redirect()->route('workshops.registration.confirmation', $workshop->slug)
            ->with('success', 'Registration successful!');
    }

    public function registrationConfirmation($slug)
    {
        $workshop = Workshop::where('slug', $slug)
            ->where('status', 'active')
            ->firstOrFail();

        return view('workshops.registration-confirmation', compact('workshop'));
    }

    public function search(Request $request)
    {
        $query = $request->get('q');

        $workshops = Workshop::where('title', 'LIKE', "%{$query}%")
            ->orWhere('description', 'LIKE', "%{$query}%")
            ->orWhere('instructor', 'LIKE', "%{$query}%")
            ->where('status', 'active')
            ->orderBy('date', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'workshops' => $workshops,
            'count' => $workshops->count()
        ]);
    }
}