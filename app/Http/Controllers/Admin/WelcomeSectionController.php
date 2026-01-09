<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WelcomeSection;

class WelcomeSectionController extends Controller
{
    /**
     * Display all welcome sections
     */
    public function index()
    {
        $sections = WelcomeSection::latest()->get();
        return view('admin.welcome_sections.index', compact('sections'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.welcome_sections.create');
    }

    /**
     * Store new welcome section
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'            => 'nullable|string|max:255',
            'description'      => 'nullable|array',
            'signature_name'   => 'nullable|string|max:255',
            'signature_title'  => 'nullable|string|max:255',
            'image'            => 'nullable|string|max:255',
            'badges'           => 'nullable|array',
            'stats'            => 'nullable|array',
            'is_active'        => 'nullable|boolean',
        ]);

        WelcomeSection::create($data);

        return redirect()
            ->route('admin.welcome_sections.index')
            ->with('success', 'Welcome section created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(WelcomeSection $welcomeSection)
    {
        // IMPORTANT: pass as $section to match Blade
        $section = $welcomeSection;

        return view('admin.welcome_sections.edit', compact('section'));
    }

    /**
     * Update welcome section
     */
    public function update(Request $request, WelcomeSection $welcomeSection)
    {
        $data = $request->validate([
            'title'            => 'nullable|string|max:255',
            'description'      => 'nullable|array',
            'signature_name'   => 'nullable|string|max:255',
            'signature_title'  => 'nullable|string|max:255',
            'image'            => 'nullable|string|max:255',
            'badges'           => 'nullable|array',
            'stats'            => 'nullable|array',
            'is_active'        => 'nullable|boolean',
        ]);

        $welcomeSection->update($data);

        return redirect()
            ->route('admin.welcome_sections.index')
            ->with('success', 'Welcome section updated successfully.');
    }

    /**
     * Delete welcome section
     */
    public function destroy(WelcomeSection $welcomeSection)
    {
        $welcomeSection->delete();

        return redirect()
            ->route('admin.welcome_sections.index')
            ->with('success', 'Welcome section deleted successfully.');
    }
}
