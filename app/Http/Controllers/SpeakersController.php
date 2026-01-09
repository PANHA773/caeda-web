<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speaker;

class SpeakersController extends Controller
{
    /**
     * Display a listing of active speakers.
     */
    public function index()
    {
        // Fetch all active speakers, ordered by name
        $speakers = Speaker::where('is_active', true)
            ->orderBy('name')
            ->get();

        // Return view with speakers data
        return view('speakers.index', compact('speakers'));
    }

    /**
     * Show a single speaker's details.
     */
    public function show(Speaker $speaker)
    {
        return view('speakers.show', compact('speaker'));
    }
}
