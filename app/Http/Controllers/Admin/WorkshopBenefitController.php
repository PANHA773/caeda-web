<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkshopBenefit;
use Illuminate\Http\Request;

class WorkshopBenefitController extends Controller
{
    public function index()
    {
        $benefits = WorkshopBenefit::orderBy('id', 'asc')->get();
        return view('admin.workshop_benefits.index', compact('benefits'));
    }

    public function create()
    {
        return view('admin.workshop_benefits.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'icon' => 'nullable|string|max:5',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status') ? 1 : 0;

        WorkshopBenefit::create($data);

        return redirect()
            ->route('admin.workshop_benefits.index')
            ->with('success', 'Benefit added successfully.');
    }


    public function edit(WorkshopBenefit $workshop_benefit)
{
    return view('admin.workshop_benefits.edit', [
        'benefit' => $workshop_benefit, // pass as $benefit to Blade
    ]);
}


   public function update(Request $request, WorkshopBenefit $workshop_benefit)
{
    $data = $request->validate([
        'icon' => 'nullable|string|max:5',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'status' => 'nullable|boolean',
    ]);

    $data['status'] = $request->has('status') ? 1 : 0;

    $workshop_benefit->update($data);

    return redirect()
        ->route('admin.workshop_benefits.index')
        ->with('success', 'Benefit updated successfully.');
}



    public function destroy(WorkshopBenefit $workshop_benefit)
{
    $workshop_benefit->delete();

    return redirect()
        ->route('admin.workshop_benefits.index')
        ->with('success', 'Benefit deleted successfully.');
}

}
