<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the FAQs
     */
    public function index()
    {
        $faqs = Faq::latest()->paginate(10);

        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new FAQ
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created FAQ
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'is_active'=> 'required|boolean',
        ]);

        Faq::create($request->all());

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully');
    }

    /**
     * Show the form for editing the specified FAQ
     */
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified FAQ
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'is_active'=> 'required|boolean',
        ]);

        $faq->update($request->all());

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully');
    }

    /**
     * Remove the specified FAQ
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()
            ->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully');
    }
}
