<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialLink;

class SocialLinkController extends Controller
{
    /**
     * Display a listing of social links with pagination.
     */
    public function index()
    {
        // Use paginate() for proper pagination in Blade
        $socialLinks = SocialLink::latest()->paginate(10); // 10 items per page
        return view('admin.social.index', compact('socialLinks'));
    }

    /**
     * Show the form for creating a new social link.
     */
    public function create()
    {
        return view('admin.social.create');
    }

    /**
     * Store a newly created social link.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform'   => 'required|string|max:50',
            'icon'       => 'required|string|max:100',
            'color'      => 'required|string|max:50',
            'url'        => 'required|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        SocialLink::create($validated);

        return redirect()->route('admin.social.index')
                         ->with('success', 'Social link created successfully!');
    }

    /**
     * Show the form for editing a social link.
     */
    public function edit(SocialLink $social)
    {
        return view('admin.social.edit', compact('social'));
    }

    /**
     * Update the specified social link.
     */
    public function update(Request $request, SocialLink $social)
    {
        $validated = $request->validate([
            'platform'   => 'required|string|max:50',
            'icon'       => 'required|string|max:100',
            'color'      => 'required|string|max:50',
            'url'        => 'required|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active'  => 'nullable|boolean',
        ]);

        $social->update($validated);

        return redirect()->route('admin.social.index')
                         ->with('success', 'Social link updated successfully!');
    }

    /**
     * Remove the specified social link.
     */
    public function destroy(SocialLink $social)
    {
        $social->delete();

        return redirect()->route('admin.social.index')
                         ->with('success', 'Social link deleted successfully!');
    }
}
