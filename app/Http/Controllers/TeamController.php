<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Partner;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Show the team page with all active team members and partners from database.
     */
    public function index()
    {
        // Fetch active team members ordered by their sort_order field
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Fetch active partners ordered by their sort_order field
        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view('our-team', compact('teamMembers', 'partners'));
    }
}
