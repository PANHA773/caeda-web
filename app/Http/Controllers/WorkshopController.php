<?php

namespace App\Http\Controllers;

use App\Models\UpcomingWorkshop;
use App\Models\Testimonial;
use App\Models\Promotion;
use App\Models\Workshop;
use App\Models\WorkshopBenefit;

class WorkshopController extends Controller
{
    public function index()
    {
        // Active Workshop Benefits
        $benefits = WorkshopBenefit::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();
        
        // Active Testimonials
        $testimonials = Testimonial::where('status', 1)
            ->orderBy('id', 'desc')
            ->get();

        // Upcoming Workshops
        $upcomingWorkshops = UpcomingWorkshop::orderBy('date', 'asc')->get();
        
        // All Workshops
        $workshops = Workshop::orderBy('date', 'asc')->get();

        // Active Promotions
        // $promotions = Promotion::where('status', 1)
        //     ->orderBy('id', 'asc')
        //     ->get();
 


        // Pass all data to the view
        return view('workshop', compact(
            'workshops', 
            'upcomingWorkshops', 
            'benefits', 
            'testimonials',
        
        ));
    }
}
