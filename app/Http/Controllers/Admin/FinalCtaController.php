<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinalCta;
use Illuminate\Http\Request;

class FinalCtaController extends Controller
{
    /**
     * Display Final CTA list (Admin)
     */
    public function index()
    {
        $ctas = FinalCta::orderByDesc('created_at')->get();
        return view('admin.final-cta.index', compact('ctas'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.final-cta.create');
    }

    /**
     * Store new Final CTA
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'stat_1_number' => 'required|string|max:50',
            'stat_1_label' => 'required|string|max:100',
            'stat_2_number' => 'required|string|max:50',
            'stat_2_label' => 'required|string|max:100',
            'stat_3_number' => 'required|string|max:50',
            'stat_3_label' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'highlight_text' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'primary_button_text' => 'required|string|max:100',
            'secondary_button_text' => 'required|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        // Only one CTA can be active
        if ($request->boolean('is_active')) {
            FinalCta::where('is_active', true)->update(['is_active' => false]);
        }

        FinalCta::create([
            ...$data,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.final-cta.index')
            ->with('success', 'Final CTA created successfully.');
    }

    /**
     * Show edit form
     */
    public function edit(FinalCta $finalCta)
    {
        return view('admin.final-cta.edit', [
            'cta' => $finalCta,
        ]);
    }

    /**
     * Update Final CTA
     */
    public function update(Request $request, FinalCta $finalCta)
    {
        $data = $request->validate([
            'stat_1_number' => 'required|string|max:50',
            'stat_1_label' => 'required|string|max:100',
            'stat_2_number' => 'required|string|max:50',
            'stat_2_label' => 'required|string|max:100',
            'stat_3_number' => 'required|string|max:50',
            'stat_3_label' => 'required|string|max:100',
            'title' => 'required|string|max:255',
            'highlight_text' => 'nullable|string|max:100',
            'description' => 'nullable|string',
            'primary_button_text' => 'required|string|max:100',
            'secondary_button_text' => 'required|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        // Only one CTA can be active
        if ($request->boolean('is_active')) {
            FinalCta::where('id', '!=', $finalCta->id)
                ->update(['is_active' => false]);
        }

        $finalCta->update([
            ...$data,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()
            ->route('admin.final-cta.index')
            ->with('success', 'Final CTA updated successfully.');
    }

    /**
     * Toggle Active / Inactive
     */
    public function toggle(FinalCta $finalCta)
    {
        if (! $finalCta->is_active) {
            FinalCta::where('is_active', true)->update(['is_active' => false]);
        }

        $finalCta->update([
            'is_active' => ! $finalCta->is_active,
        ]);

        return redirect()
            ->route('admin.final-cta.index')
            ->with('success', 'CTA status updated.');
    }

    /**
     * Delete CTA
     */
    public function destroy(FinalCta $finalCta)
    {
        $finalCta->delete();

        return redirect()
            ->route('admin.final-cta.index')
            ->with('success', 'Final CTA deleted successfully.');
    }
}
