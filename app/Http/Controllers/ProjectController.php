<?php

namespace App\Http\Controllers;

use App\Models\OfficeManager;
use App\Models\Staff;
use App\Models\LeaderTeam;
use App\Models\ValueBenefit;
use App\Models\Goal;
use App\Models\Strategy;
use App\Models\ProjectOverview;
use App\Models\VisionMission;
use App\Models\Accreditation;

class ProjectController extends Controller
{
    public function index()
    {
        // Fetch office managers (with default ordering fallback)
        $managers = OfficeManager::orderBy('order', 'asc')->get();

          $goals = Goal::orderBy('order')->where('is_active', true)->get();
    $strategies = Strategy::orderBy('order')->where('is_active', true)->get();

        // Fetch committee members (Staff model) with default ordering fallback
        $committeeMembers = Staff::orderBy('order', 'asc')->get();
        $visionMissions = VisionMission::where('is_active', true)->orderBy('type')->get();

        
        $valuesBenefits = ValueBenefit::where('is_active', true)
            ->orderBy('sort_order', 'asc')
            ->get();

         $projectOverviews = ProjectOverview::where('is_active', true)
        ->orderBy('order')
        ->get();

            //   $accreditations = Accreditation::where('is_active', true)
            // ->orderBy('order', 'asc')
            // ->get();
$accreditations = Accreditation::where('is_active', true)->get();


        // Fetch active leader team members
        // If 'order' column does not exist, remove orderBy
        $leaderTeams = LeaderTeam::where('is_active', true)->get();
        // OR if you have added 'order' column, you can use:
        // $leaderTeams = LeaderTeam::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('project', compact('managers', 'committeeMembers', 'leaderTeams', 'valuesBenefits', 'goals', 'strategies','projectOverviews','visionMissions','accreditations'));
    }
}
