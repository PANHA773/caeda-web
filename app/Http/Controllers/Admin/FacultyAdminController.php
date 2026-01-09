<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

class FacultyAdminController extends Controller
{
    /**
     * Display a listing of faculties with search and pagination.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $faculties = Faculty::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                      ->orWhere('description', 'like', "%{$search}%");
            })
            ->orderBy('order')
            ->paginate(10) // paginate 10 per page
            ->withQueryString(); // preserve search query in pagination links

        return view('admin.faculties.index', compact('faculties', 'search'));
    }

    /**
     * Show the form for creating a new faculty.
     * 
     * 
     */
    public function create()
{
    $recentFaculties = Faculty::orderBy('created_at', 'desc')
                              ->take(5)
                              ->get();

    return view('admin.faculties.create', compact('recentFaculties'));
}

    // public function create()
    // {
    //     return view('admin.faculties.create');
    // }

    /**
     * Store a newly created faculty in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'established_at' => 'nullable|date',
        ]);

        Faculty::create([
            'name' => $request->name,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'established_at' => $request->established_at,
        ]);

        return redirect()->route('admin.faculties.index')
                         ->with('success', 'Faculty created successfully.');
    }

    /**
     * Show the form for editing a faculty.
     */
    public function edit(Faculty $faculty)
    {
        return view('admin.faculties.edit', compact('faculty'));
    }

    /**
     * Update the specified faculty.
     */
    public function update(Request $request, Faculty $faculty)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'order' => 'nullable|integer',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'established_at' => 'nullable|date',
        ]);

        $faculty->update([
            'name' => $request->name,
            'description' => $request->description,
            'order' => $request->order ?? 0,
            'is_active' => $request->has('is_active'),
            'is_featured' => $request->has('is_featured'),
            'established_at' => $request->established_at,
        ]);

        return redirect()->route('admin.faculties.index')
                         ->with('success', 'Faculty updated successfully.');
    }

    /**
     * Remove the specified faculty from storage.
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();

        return redirect()->route('admin.faculties.index')
                         ->with('success', 'Faculty deleted successfully.');
    }

    /**
     * Return faculty details for modal (AJAX).
     */
    public function show(Faculty $faculty)
    {
        return response()->json($faculty);
    }

    
}
