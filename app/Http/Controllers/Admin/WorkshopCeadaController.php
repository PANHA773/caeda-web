<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WorkshopCeadaController extends Controller
{
    /**
     * Display a listing of the workshops.
     */
    public function index()
    {
        $workshops = Workshop::latest()->paginate(10);
        
        $stats = [
            'total' => Workshop::count(),
            'active' => Workshop::where('status', 'active')->count(),
            'featured' => Workshop::where('is_featured', true)->count(),
            'videoCount' => Workshop::whereNotNull('video')->count(),
        ];
        
        return view('admin.workshops.index', compact('workshops', 'stats'));
    }

    /**
     * Show the form for creating a new workshop.
     */
    public function create()
    {
        return view('admin.workshops.create');
    }

    /**
     * Store a newly created workshop in storage.
     */
    public function store(Request $request)
    {
        $data = $this->validateData($request);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('workshops', 'public');
        }
        
        // Generate slug
        $data['slug'] = $this->generateUniqueSlug($data['title']);
        
        // Handle checkbox fields
        $data['is_featured'] = $request->has('is_featured');
        $data['registration_open'] = $request->has('registration_open');
        
        // Format price (ensure it's a decimal)
        if (isset($data['price'])) {
            $data['price'] = number_format((float)$data['price'], 2, '.', '');
        }
        
        Workshop::create($data);
        
        return redirect()->route('admin.workshops.index')
            ->with('success', 'Workshop created successfully!');
    }

    /**
     * Show the form for editing the specified workshop.
     */
    public function edit(Workshop $workshop)
    {
        return view('admin.workshops.edit', compact('workshop'));
    }

    /**
     * Update the specified workshop in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {
        $data = $this->validateData($request, $workshop->id);
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($workshop->image) {
                Storage::disk('public')->delete($workshop->image);
            }
            $data['image'] = $request->file('image')->store('workshops', 'public');
        }
        
        // Generate slug if title changed
        if ($data['title'] !== $workshop->title) {
            $data['slug'] = $this->generateUniqueSlug($data['title'], $workshop->id);
        }
        
        // Handle checkbox fields
        $data['is_featured'] = $request->has('is_featured');
        $data['registration_open'] = $request->has('registration_open');
        
        // Format price
        if (isset($data['price'])) {
            $data['price'] = number_format((float)$data['price'], 2, '.', '');
        }
        
        $workshop->update($data);
        
        return redirect()->route('admin.workshops.index')
            ->with('success', 'Workshop updated successfully!');
    }

    /**
     * Remove the specified workshop from storage.
     */
    public function destroy(Workshop $workshop)
    {
        // Delete image if exists
        if ($workshop->image) {
            Storage::disk('public')->delete($workshop->image);
        }
        
        $workshop->delete();
        
        return redirect()->route('admin.workshops.index')
            ->with('success', 'Workshop deleted successfully!');
    }

    /**
     * Validate workshop data.
     */
    private function validateData(Request $request, $id = null)
    {
        $rules = [
            'title' => 'required|string|max:255',
            'category' => 'required|string|in:technology,buddhist,education,research,creative,wellness',
            'instructor' => 'required|string|max:255',
            'date' => 'required|date',
            'duration' => 'required|string|max:100',
            'level' => 'required|string|in:beginner,intermediate,advanced,all',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120', // 5MB
            'video' => 'nullable|url|max:500',
            'description' => 'required|string|min:50|max:5000',
            'short_description' => 'nullable|string|max:500',
            'price' => 'nullable|numeric|min:0',
            'seats_available' => 'nullable|integer|min:0',
            'status' => 'required|string|in:active,completed,cancelled',
            'is_featured' => 'sometimes|boolean',
            'registration_open' => 'sometimes|boolean',
            'location' => 'nullable|string|max:255',
            'language' => 'nullable|string|max:100',
        ];
        
        // Add unique validation for title if needed
        if ($id) {
            $rules['title'] = 'required|string|max:255|unique:workshops,title,' . $id;
        } else {
            $rules['title'] = 'required|string|max:255|unique:workshops,title';
        }
        
        return $request->validate($rules);
    }

    /**
     * Generate a unique slug for the workshop.
     */
    private function generateUniqueSlug($title, $excludeId = null)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $counter = 1;
        
        while (Workshop::where('slug', $slug)
                ->when($excludeId, function ($query) use ($excludeId) {
                    return $query->where('id', '!=', $excludeId);
                })
                ->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
        
        return $slug;
    }

    /**
     * Toggle workshop featured status (AJAX).
     */
    public function toggleFeatured(Workshop $workshop)
    {
        $workshop->update([
            'is_featured' => !$workshop->is_featured
        ]);
        
        $status = $workshop->is_featured ? 'featured' : 'unfeatured';
        
        return response()->json([
            'success' => true,
            'message' => "Workshop {$status} successfully!",
            'is_featured' => $workshop->is_featured
        ]);
    }

    /**
     * Toggle workshop registration status (AJAX).
     */
    public function toggleRegistration(Workshop $workshop)
    {
        $workshop->update([
            'registration_open' => !$workshop->registration_open
        ]);
        
        $status = $workshop->registration_open ? 'open' : 'closed';
        
        return response()->json([
            'success' => true,
            'message' => "Registration {$status} successfully!",
            'registration_open' => $workshop->registration_open
        ]);
    }

    /**
     * Bulk delete workshops.
     */
    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:workshops,id'
        ]);
        
        $workshops = Workshop::whereIn('id', $request->ids)->get();
        
        foreach ($workshops as $workshop) {
            if ($workshop->image) {
                Storage::disk('public')->delete($workshop->image);
            }
            $workshop->delete();
        }
        
        return response()->json([
            'success' => true,
            'message' => count($request->ids) . ' workshop(s) deleted successfully!'
        ]);
    }

    /**
     * Export workshops to CSV/Excel.
     */
    public function export()
    {
        $workshops = Workshop::all();
        
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=workshops_' . date('Y-m-d') . '.csv',
        ];
        
        $callback = function() use ($workshops) {
            $file = fopen('php://output', 'w');
            
            // Add CSV headers
            fputcsv($file, [
                'ID', 'Title', 'Category', 'Instructor', 'Date', 'Duration', 'Level',
                'Price', 'Seats Available', 'Status', 'Featured', 'Registration Open',
                'Created At'
            ]);
            
            // Add data rows
            foreach ($workshops as $workshop) {
                fputcsv($file, [
                    $workshop->id,
                    $workshop->title,
                    $workshop->category,
                    $workshop->instructor,
                    $workshop->date->format('Y-m-d'),
                    $workshop->duration,
                    $workshop->level,
                    $workshop->price,
                    $workshop->seats_available,
                    $workshop->status,
                    $workshop->is_featured ? 'Yes' : 'No',
                    $workshop->registration_open ? 'Yes' : 'No',
                    $workshop->created_at->format('Y-m-d H:i:s')
                ]);
            }
            
            fclose($file);
        };
        
        return response()->stream($callback, 200, $headers);
    }
}