<?php

namespace App\Http\Controllers;

use App\Models\UpcomingWorkshop;

use App\Models\Workshop;
use App\Models\WorkshopBenefit;

class WorkshopController extends Controller
{
    public function index()
    {
        $benefits = WorkshopBenefit::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        $upcomingWorkshops = UpcomingWorkshop::orderBy('date', 'asc')->get();
        $workshops = Workshop::orderBy('date', 'asc')->get();
        return view('workshop', compact('workshops', 'upcomingWorkshops', 'benefits'));
    }
}
