<?php

namespace App\Http\Controllers\Admin;

use App\Models\Program;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProgramCaedaController extends Controller
{
    /**
     * Display a listing of programs.
     */
    public function index()
    {
        // Paginate programs for the admin index
        $perPage = 15;
        $programs = Program::orderBy('created_at', 'desc')->paginate($perPage);

        // Aggregate stats used in the view (computed via queries to avoid calling collection methods on the paginator)
        $totalPrograms = Program::count();
        $activePrograms = Program::where('is_active', true)->count();
        $featuredPrograms = Program::where('is_featured', true)->count();
        $totalStudents = Program::sum('students');
        $maxStudents = Program::max('students') ?? 0;
        // Compute average final price. If a `final_price` column exists use it,
        // otherwise average COALESCE(discount, tuition).
        if (Schema::hasColumn('programs', 'final_price')) {
            $avgFinalPrice = (float) Program::avg('final_price') ?: 0.0;
        } else {
            $avgFinalPrice = (float) DB::table('programs')
                ->select(DB::raw('AVG(COALESCE(discount, tuition)) as avg'))
                ->whereNull('deleted_at')
                ->value('avg') ?: 0.0;
        }
        $avgRating = (float) Program::avg('rating') ?: 0.0;
        // 'has_discount' is an accessor, not a DB column — compute from discount and tuition
        $discountPrograms = Program::whereNotNull('discount')
            ->whereColumn('discount', '<', 'tuition')
            ->count();

        return view('admin.programs.index', compact(
            'programs',
            'totalPrograms',
            'activePrograms',
            'featuredPrograms',
            'totalStudents',
            'maxStudents',
            'avgFinalPrice',
            'avgRating',
            'discountPrograms'
        ));
    }

    /**
     * Show the form for creating a new program.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created program in the database.
     */
    public function store(Request $request)
    {
        // Normalize common mode labels to enum values (e.g. "On-campus" => "offline")
        if ($request->filled('mode')) {
            $raw = strtolower((string) $request->input('mode'));
            $clean = preg_replace('/[^a-z]/', '', $raw);

            if (in_array($clean, ['online', 'offline', 'hybrid'])) {
                $request->merge(['mode' => $clean]);
            } elseif (strpos($clean, 'campus') !== false || strpos($clean, 'oncampus') !== false) {
                $request->merge(['mode' => 'offline']);
            }
        }
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100', // 添加了 category
            'level' => 'required|string|max:50',
            'duration' => 'nullable|string|max:50',
            'mode' => 'required|in:online,offline,hybrid',
            'tuition' => 'required|numeric|min:0',
            'final_price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'students' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120', // 更新为文件上传
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean', // 添加了 is_active
            'badge' => 'nullable|string|max:50',
            'badge_color' => 'nullable|string|max:50',
            'discount' => 'nullable|numeric|min:0', // 添加了 discount
            'application_deadline' => 'nullable|date',
        ]);

        // Generate slug from title
        $data['slug'] = Str::slug($data['title']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('programs', 'public');
            $data['image'] = $imagePath;
        } else {
            $data['image'] = null;
        }

        // Set default values for checkboxes
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        // Calculate has_discount based on discount field
        $data['has_discount'] = !empty($data['discount']) && $data['discount'] < $data['tuition'];

        // Ensure description is never null
        $data['description'] = $data['description'] ?? '';

        Program::create($data);

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program created successfully.');
    }

    /**
     * Show the form for editing a program.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified program in the database.
     */
    public function update(Request $request, Program $program)
    {
        // Normalize common mode labels to enum values (e.g. "On-campus" => "offline")
        if ($request->filled('mode')) {
            $raw = strtolower((string) $request->input('mode'));
            $clean = preg_replace('/[^a-z]/', '', $raw);

            if (in_array($clean, ['online', 'offline', 'hybrid'])) {
                $request->merge(['mode' => $clean]);
            } elseif (strpos($clean, 'campus') !== false || strpos($clean, 'oncampus') !== false) {
                $request->merge(['mode' => 'offline']);
            }
        }
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:100', // 添加了 category
            'level' => 'required|string|max:50',
            'duration' => 'nullable|string|max:50',
            'mode' => 'required|in:online,offline,hybrid',
            'tuition' => 'required|numeric|min:0',
            'final_price' => 'required|numeric|min:0',
            'rating' => 'nullable|numeric|min:0|max:5',
            'students' => 'nullable|integer|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:5120',
            'short_description' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'is_featured' => 'nullable|boolean',
            'is_active' => 'nullable|boolean', // 添加了 is_active
            'badge' => 'nullable|string|max:50',
            'badge_color' => 'nullable|string|max:50',
            'discount' => 'nullable|numeric|min:0', // 添加了 discount
            'application_deadline' => 'nullable|date',
        ]);

        // Update slug
        $data['slug'] = Str::slug($data['title']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($program->image) {
                Storage::disk('public')->delete($program->image);
            }
            
            $imagePath = $request->file('image')->store('programs', 'public');
            $data['image'] = $imagePath;
        } else {
            // Keep existing image if not uploading new one
            $data['image'] = $program->image;
        }

        // Set checkbox values
        $data['is_featured'] = $request->has('is_featured');
        $data['is_active'] = $request->has('is_active');

        // Calculate has_discount
        $data['has_discount'] = !empty($data['discount']) && $data['discount'] < $data['tuition'];

        // Ensure description is never null
        $data['description'] = $data['description'] ?? '';

        $program->update($data);

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified program from the database.
     */
    public function destroy(Program $program)
    {
        // Delete image if exists
        if ($program->image) {
            Storage::disk('public')->delete($program->image);
        }

        $program->delete();

        return redirect()->route('admin.programs.index')
                         ->with('success', 'Program deleted successfully.');
    }
}