<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the footer (only one footer assumed).
     */
    public function index()
    {
        $footer = Footer::first();
        return view('admin.footer.index', compact('footer'));
    }

    /**
     * Show the form for creating a new footer.
     */
    public function create()
    {
        return view('admin.footer.create');
    }

    /**
     * Store a newly created footer in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'logo' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tagline' => 'nullable|string|max:255',
            'social_links' => 'nullable|json',
            'quick_links'  => 'nullable|json',
            'contact_info' => 'nullable|json',
        ]);

        // Decode JSON strings to arrays if necessary
        $data['social_links'] = $data['social_links'] ? json_decode($data['social_links'], true) : [];
        $data['quick_links']  = $data['quick_links'] ? json_decode($data['quick_links'], true) : [];
        $data['contact_info'] = $data['contact_info'] ? json_decode($data['contact_info'], true) : [];

        Footer::create($data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer created successfully!');
    }

    /**
     * Show the form for editing the footer.
     */
    public function edit(Footer $footer)
    {
        return view('admin.footer.edit', compact('footer'));
    }

    /**
     * Update the specified footer in storage.
     */
    public function update(Request $request, Footer $footer)
    {
        $data = $request->validate([
            'logo' => 'required|string|max:255',
            'description' => 'nullable|string',
            'tagline' => 'nullable|string|max:255',
            'social_links' => 'nullable|json',
            'quick_links'  => 'nullable|json',
            'contact_info' => 'nullable|json',
        ]);

        $data['social_links'] = $data['social_links'] ? json_decode($data['social_links'], true) : [];
        $data['quick_links']  = $data['quick_links'] ? json_decode($data['quick_links'], true) : [];
        $data['contact_info'] = $data['contact_info'] ? json_decode($data['contact_info'], true) : [];

        $footer->update($data);

        return redirect()->route('admin.footer.index')->with('success', 'Footer updated successfully!');
    }

    /**
     * Remove the footer from storage.
     */
    public function destroy(Footer $footer)
    {
        $footer->delete();
        return redirect()->route('admin.footer.index')->with('success', 'Footer deleted successfully!');
    }
}
