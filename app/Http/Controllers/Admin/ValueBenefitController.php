<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ValueBenefit;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class ValueBenefitController extends Controller
{
    public function index()
    {
        // ✅ Safe check (prevents crash)
        if (Schema::hasColumn('values_benefits', 'order')) {
            $valuesBenefits = ValueBenefit::orderBy('order')->get();
        } else {
            $valuesBenefits = ValueBenefit::all();
        }

        return view('admin.value-benefits.index', compact('valuesBenefits'));
    }

    public function create()
    {
        return view('admin.value-benefits.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        ValueBenefit::create($data);

        return redirect()->route('admin.value-benefits.index')->with('success', 'Value/Benefit created successfully.');
    }

    public function edit(ValueBenefit $valueBenefit)
    {
        return view('admin.value-benefits.edit', compact('valueBenefit'));
    }

    public function update(Request $request, ValueBenefit $valueBenefit)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? $valueBenefit->order ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        $valueBenefit->update($data);

        return redirect()->route('admin.value-benefits.index')->with('success', 'Value/Benefit updated successfully.');
    }

    public function destroy(ValueBenefit $valueBenefit)
    {
        $valueBenefit->delete();

        return redirect()->route('admin.value-benefits.index')->with('success', 'Value/Benefit deleted successfully.');
    }
}
