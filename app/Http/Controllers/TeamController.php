<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use App\Models\Partner;
use App\Models\Faq;
use App\Models\MemberCompany;
use App\Models\FinalCta;
use App\Models\Footer;
use App\Models\PricingPlan;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Show the team page with all active data
     */
    public function index()
    {
        $memberCompanies = MemberCompany::orderBy('name')->get(); // pull from DB
        // Team Members (has sort_order)


        // Partners (has sort_order)
        $partners = Partner::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // FAQs (NO sort_order column → use id)
        $faqs = Faq::where('is_active', true)
            ->orderBy('id')
            ->get();

        $cta = FinalCta::where('is_active', true)->first();

        // Pricing Plans
        $plans = PricingPlan::with('features')
            ->where('is_active', true)
            ->orderByDesc('is_popular')
            ->orderBy('id')
            ->get();
        $footer = Footer::first();

        return view('our-team', compact(

            'partners',
            'faqs',
            'plans',
            'memberCompanies',
            'cta',
            'footer'
        ));
    }
}
