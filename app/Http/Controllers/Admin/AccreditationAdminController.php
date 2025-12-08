<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Accreditation;
use Illuminate\Http\Request;


class AccreditationAdminController extends Controller
{
    /**
     * Display a listing of accreditations.
     */
    public function index()
    {
        $accreditations = Accreditation::orderBy('order')->get();
        return view('admin.accreditations.index', compact('accreditations'));
    }

    /**
     * Show the form for creating a new accreditation.
     */
    public function create()
    {
        return view('admin.accreditations.create');
    }

    /**
     * Store a newly created accreditation in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:official,international',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'type', 'order']);
        $data['is_active'] = $request->has('is_active');

        Accreditation::create($data);

        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation created successfully.');
    }

    /**
     * Show the form for editing the specified accreditation.
     */
    public function edit(Accreditation $accreditation)
    {
        return view('admin.accreditations.edit', compact('accreditation'));
    }

    /**
     * Update the specified accreditation in storage.
     */
    public function update(Request $request, Accreditation $accreditation)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|in:official,international',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $data = $request->only(['name', 'type', 'order']);
        $data['is_active'] = $request->has('is_active');

        $accreditation->update($data);

        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation updated successfully.');
    }

    /**
     * Remove the specified accreditation from storage.
     */
    public function destroy(Accreditation $accreditation)
    {
        $accreditation->delete();
        return redirect()->route('admin.accreditations.index')->with('success', 'Accreditation deleted successfully.');
    }
}
