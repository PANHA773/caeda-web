<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    /**
     * Display a listing of all partners.
     */
    public function index()
    {
        $partners = Partner::orderBy('sort_order')->paginate(10);
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new partner.
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * Store a newly created partner in database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:partners',
            'logo' => 'required|image|max:2048', // file validation
            'website_url' => 'nullable|url',
            'description' => 'nullable|string|max:500',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle logo upload
        if ($request->hasFile('logo')) {
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner created successfully!');
    }

    /**
     * Show the form for editing the specified partner.
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified partner in database.
     */
    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:partners,name,' . $partner->id,
            'logo' => 'nullable|image|max:2048', // optional on update
            'website_url' => 'nullable|url',
            'description' => 'nullable|string|max:500',
            'sort_order' => 'integer|min:0',
            'is_active' => 'boolean',
        ]);

        // Handle logo upload if a new file is uploaded
        if ($request->hasFile('logo')) {
            // Delete old logo if exists
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }
            $validated['logo'] = $request->file('logo')->store('partners', 'public');
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner updated successfully!');
    }

    /**
     * Remove the specified partner from database.
     */
    public function destroy(Partner $partner)
    {
        // Delete logo file if exists
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner deleted successfully!');
    }
}
