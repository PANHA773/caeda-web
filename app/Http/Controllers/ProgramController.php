<?php
namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Footer;

class ProgramController extends Controller
{
    public function view()
    {
        // Fetch all active programs, you can adjust as needed

        $footer = Footer::first();
        $programs = Program::active()->orderBy('sort_order')->get();

        return view('programs', compact('programs', 'footer'));
    }

    public function show(Program $program)
    {
        if (!$program->is_active) {
            abort(404);
        }

        $footer = Footer::first();

        // Fetch related programs (same category, excluding current)
        $relatedPrograms = Program::active()
            ->where('category', $program->category)
            ->where('id', '!=', $program->id)
            ->take(3)
            ->get();

        return view('programs-show', compact('program', 'footer', 'relatedPrograms'));
    }
}
