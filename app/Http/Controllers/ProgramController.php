<?php
namespace App\Http\Controllers;

use App\Models\Program;

class ProgramController extends Controller
{
    public function view()
    {
        // Fetch all active programs, you can adjust as needed
        $programs = Program::active()->orderBy('sort_order')->get();

        return view('programs', compact('programs'));
    }
}
