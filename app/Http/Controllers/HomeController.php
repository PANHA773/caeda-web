<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faculty;
use App\Models\Program;
use App\Models\CoreValue;
use App\Models\User;
use App\Models\Staff;
use App\Models\Feature;
use App\Models\Footer;

class HomeController extends Controller
{
    public function index()
    {
        // Faculties list (active only, ordered)
        $faculties = Faculty::where('is_active', true)
            ->orderBy('order')
            ->pluck('name')
            ->toArray();

        // Programs - active & featured; show only top 4 for home page
        $programs = Program::active()
            ->orderBy('is_featured', 'desc')
            ->latest()
            ->take(4)
            ->get();

        // Core features / core values (active only, take top 3)
        $coreValues = CoreValue::where('is_active', true)
            ->orderBy('order')
            ->take(3)
            ->get();

        // Features (newly added, active only)
        $features = Feature::where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Footer data
        $footer = Footer::first();

        // Stats
        $stats = [
            [
                'number' => number_format(User::count()), 
                'label'  => 'Students Enrolled', 
                'color'  => 'from-blue-500 to-cyan-500'
            ],
            [
                'number' => number_format(Staff::count()), 
                'label'  => 'Expert Instructors', 
                'color'  => 'from-purple-500 to-pink-500'
            ],
            [
                'number' => number_format(Program::active()->count()), 
                'label'  => 'Courses Available', 
                'color'  => 'from-green-500 to-teal-500'
            ],
            [
                'number' => '95%', 
                'label'  => 'Satisfaction Rate', 
                'color'  => 'from-orange-500 to-red-500'
            ]
        ];

        return view('home', compact('faculties', 'programs', 'coreValues', 'features', 'stats', 'footer'));
    }
}
