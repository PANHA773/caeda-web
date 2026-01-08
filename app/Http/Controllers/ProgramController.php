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
}
