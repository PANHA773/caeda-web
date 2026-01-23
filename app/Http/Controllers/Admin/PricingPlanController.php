<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PricingPlanController extends Controller
{
    // Show all pricing plans
    public function index()
    {
        $plans = PricingPlan::all();
        return view('admin.pricing.index', compact('plans'));
    }

    // Show form to create a new plan
    public function create()
    {
        return view('admin.pricing.create');
    }

    // Store new plan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric',
            'annual_price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        PricingPlan::create($validated + [
            'slug' => Str::slug($validated['name']), // ✅ generate slug
            'is_active' => $request->has('is_active'),
            'is_popular' => $request->has('is_popular'),
        ]);

        return redirect()->route('admin.pricing.index')->with('success', 'Plan created successfully!');
    }

    // Show form to edit an existing plan
    public function edit($id)
    {
        $plan = PricingPlan::findOrFail($id);
        return view('admin.pricing.edit', compact('plan'));
    }

    // Update an existing plan
    public function update(Request $request, $id)
    {
        $plan = PricingPlan::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'monthly_price' => 'required|numeric',
            'annual_price' => 'required|numeric',
            'description' => 'nullable|string',
        ]);

        $plan->update($validated + [
            'slug' => Str::slug($validated['name']), // ✅ update slug
            'is_active' => $request->has('is_active'),
            'is_popular' => $request->has('is_popular'),
        ]);

        return redirect()->route('admin.pricing.index')->with('success', 'Plan updated successfully!');
    }

    // Delete a plan
    public function destroy($id)
    {
        $plan = PricingPlan::findOrFail($id);
        $plan->delete();

        return redirect()->route('admin.pricing.index')->with('success', 'Plan deleted successfully!');
    }
}
