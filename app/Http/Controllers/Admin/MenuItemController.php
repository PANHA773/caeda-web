<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuItem;
use App\Models\MenuCategory;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::with('category')->orderBy('order')->paginate(20);
        return view('admin.menu_items.index', compact('items'));
    }

    public function create()
    {
        $categories = MenuCategory::where('is_active', true)->orderBy('order')->get();
        return view('admin.menu_items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'menu_category_id' => 'required|exists:menu_categories,id',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image|max:4096',
            'badge' => 'nullable|string|max:50',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        MenuItem::create($data);

        return redirect()->route('admin.menu_items.index')->with('success', 'Menu item created.');
    }

    public function edit(MenuItem $menuItem)
    {
        $categories = MenuCategory::where('is_active', true)->orderBy('order')->get();
        return view('admin.menu_items.edit', ['item' => $menuItem, 'categories' => $categories]);
    }

    public function update(Request $request, MenuItem $menuItem)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'menu_category_id' => 'required|exists:menu_categories,id',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'image' => 'nullable|image|max:4096',
            'badge' => 'nullable|string|max:50',
            'rating' => 'nullable|numeric|min:0|max:5',
            'reviews' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'order' => 'nullable|integer',
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            if ($menuItem->image) Storage::disk('public')->delete($menuItem->image);
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        $menuItem->update($data);

        return redirect()->route('admin.menu_items.index')->with('success', 'Menu item updated.');
    }

    public function destroy(MenuItem $menuItem)
    {
        if ($menuItem->image) Storage::disk('public')->delete($menuItem->image);
        $menuItem->delete();
        return redirect()->route('admin.menu_items.index')->with('success', 'Menu item deleted.');
    }
}
