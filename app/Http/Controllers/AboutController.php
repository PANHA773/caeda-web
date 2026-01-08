<?php

namespace App\Http\Controllers;

use App\Models\AboutContent;
use App\Models\Faculty;
use App\Models\TeamMember;
use App\Models\CoreValue;
use App\Models\Accreditation;
use App\Models\Footer;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        // Load first About Content row
        $aboutContent = AboutContent::first();

        if ($aboutContent) {
            // Decode JSON fields safely
            foreach (['foundation_content', 'today_content'] as $field) {
                if (is_string($aboutContent->{$field})) {
                    $aboutContent->{$field} = json_decode($aboutContent->{$field}, true) ?? [];
                }
            }
        }



        // Faculties list
        $faculties = Faculty::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        // Team Members
        $teamMembers = TeamMember::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

            $footer = Footer::first();

        // Core Values
        $coreValues = CoreValue::query()
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

            $accreditations = Accreditation::where('is_active', true)->get();

        return view('about', compact(
            'aboutContent',
            'faculties',
            'teamMembers',
            'coreValues',
            'accreditations',
            'footer'
        ));
    }
}
