<?php

// app/Http/Controllers/Admin/TestimonialController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('id', 'desc')->get();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'role'     => 'nullable|string|max:255',
            'company'  => 'nullable|string|max:255',
            'avatar'   => 'nullable|string',
            'quote'    => 'required|string',
            'workshop' => 'nullable|string|max:255',
            'rating'   => 'required|integer|min:1|max:5',
            'status'   => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        Testimonial::create($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial added successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'role'     => 'nullable|string|max:255',
            'company'  => 'nullable|string|max:255',
            'avatar'   => 'nullable|string',
            'quote'    => 'required|string',
            'workshop' => 'nullable|string|max:255',
            'rating'   => 'required|integer|min:1|max:5',
            'status'   => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status');

        $testimonial->update($data);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
