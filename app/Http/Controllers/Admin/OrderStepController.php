<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderStep;
use Illuminate\Http\Request;

class OrderStepController extends Controller
{
    /**
     * Display a listing of the order steps.
     */
    public function index()
    {
        $orderSteps = OrderStep::orderBy('order')->get();
        return view('admin.order_steps.index', compact('orderSteps'));
    }

    /**
     * Show the form for creating a new order step.
     */
    public function create()
    {
        return view('admin.order_steps.create');
    }

    /**
     * Store a newly created order step in storage.
     */
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

        OrderStep::create($data);

        return redirect()->route('admin.order_steps.index')
                         ->with('success', 'Order step created successfully.');
    }

    /**
     * Show the form for editing the specified order step.
     */
    public function edit(OrderStep $orderStep)
    {
        // Use $orderStep (matches route-model binding {orderStep})
        return view('admin.order_steps.edit', compact('orderStep'));
    }

    /**
     * Update the specified order step in storage.
     */
    public function update(Request $request, OrderStep $orderStep)
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

        $orderStep->update($data);

        return redirect()->route('admin.order_steps.index')
                         ->with('success', 'Order step updated successfully.');
    }

    /**
     * Remove the specified order step from storage.
     */
    public function destroy(OrderStep $orderStep)
    {
        $orderStep->delete();

        return redirect()->route('admin.order_steps.index')
                         ->with('success', 'Order step deleted successfully.');
    }
}
