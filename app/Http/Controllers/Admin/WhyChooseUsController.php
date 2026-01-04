<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseUs;
use Illuminate\Http\Request;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $items = WhyChooseUs::orderBy('order')->get();
        return view('admin.why_choose_us.index', compact('items'));
    }
    

    public function create()
    {
        return view('admin.why_choose_us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'badge'       => 'nullable|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'color'       => 'nullable|string|max:100',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        $data['status'] = $request->has('status'); // checkbox handling

        WhyChooseUs::create($data);

        return redirect()->route('admin.why_choose_us.index')
                         ->with('success', 'Item created successfully.');
    }

 public function edit($id)
    {
        // Find the item manually to avoid route-model binding issues
        $item = WhyChooseUs::findOrFail($id);

        return view('admin.why_choose_us.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        // Find the item manually
        $item = WhyChooseUs::findOrFail($id);

        // Validate data
        $data = $request->validate([
            'badge'       => 'nullable|string|max:100',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon'        => 'nullable|string|max:100',
            'color'       => 'nullable|string|max:100',
            'order'       => 'nullable|integer',
            'status'      => 'nullable|boolean',
        ]);

        // Checkbox handling for status
        $data['status'] = $request->has('status');

        // Update
        $item->update($data);

        return redirect()->route('admin.why_choose_us.index')
                         ->with('success', 'Item updated successfully.');
    }



    public function destroy($id)
{
    $item = WhyChooseUs::findOrFail($id);
    $item->delete();

    return redirect()->route('admin.why_choose_us.index')
                     ->with('success', 'Item deleted successfully.');
}

}
