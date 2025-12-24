<?php

namespace App\Http\Controllers;

use App\Models\OfficeManager;
use App\Models\Staff;
use App\Models\LeaderTeam;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch office managers (with default ordering fallback)
        $managers = OfficeManager::orderBy('order', 'asc')->get();

        // Fetch committee members (Staff model) with default ordering fallback
        $committeeMembers = Staff::orderBy('order', 'asc')->get();

        // Fetch active leader team members
        // If 'order' column does not exist, remove orderBy
        $leaderTeams = LeaderTeam::where('is_active', true)->get();
        // OR if you have added 'order' column, you can use:
        // $leaderTeams = LeaderTeam::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('project', compact('managers', 'committeeMembers', 'leaderTeams'));
    }
}
