<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::orderBy('order')->get();
        return view('admin.locations.index', compact('locations'));
    }

    public function create()
    {
        return view('admin.locations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'color'       => 'nullable|string|max:100',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        Location::create($data);

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Location created successfully.');
    }

    public function edit(Location $location)
    {
        return view('admin.locations.edit', compact('location'));
    }

    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'color'       => 'nullable|string|max:100',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $location->update($data);

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Location updated successfully.');
    }

    public function destroy(Location $location)
    {
        $location->delete();

        return redirect()->route('admin.locations.index')
                         ->with('success', 'Location deleted successfully.');
    }
}
