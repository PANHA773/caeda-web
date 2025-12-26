<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Strategy;
use Illuminate\Http\Request;

class StrategyController extends Controller
{
    public function index()
    {
        $strategies = Strategy::orderBy('order')->get();
        return view('admin.strategies.index', compact('strategies'));
    }

    public function create()
    {
        return view('admin.strategies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        Strategy::create($data);

        return redirect()->route('admin.strategies.index')->with('success', 'Strategy created successfully.');
    }

    public function edit(Strategy $strategy)
    {
        return view('admin.strategies.edit', compact('strategy'));
    }

    public function update(Request $request, Strategy $strategy)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon' => 'nullable|string|max:10',
            'order' => 'nullable|integer',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['order'] = $data['order'] ?? $strategy->order ?? 0;
        $data['is_active'] = $request->has('is_active') ? true : false;

        $strategy->update($data);

        return redirect()->route('admin.strategies.index')->with('success', 'Strategy updated successfully.');
    }

    public function destroy(Strategy $strategy)
    {
        $strategy->delete();
        return redirect()->route('admin.strategies.index')->with('success', 'Strategy deleted successfully.');
    }
}
