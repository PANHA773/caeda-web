<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\Faq;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Show the team page with all active data
     */
    public function index()
    {
        // Team Members (has sort_order)
        $teamMembers = TeamMember::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Partners (has sort_order)
        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // FAQs (NO sort_order column → use id)
        $faqs = Faq::where('is_active', true)
            ->orderBy('id')
            ->get();

        // Pricing Plans
        $plans = PricingPlan::with('features')
            ->where('is_active', true)
            ->orderByDesc('is_popular')
            ->orderBy('id')
            ->get();

        return view('our-team', compact(
            'teamMembers',
            'partners',
            'faqs',
            'plans'
        ));
    }
}
