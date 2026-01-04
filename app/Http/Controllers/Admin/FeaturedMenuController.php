<?php

// app/Http/Controllers/Admin/FeaturedMenuController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeaturedMenu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FeaturedMenuController extends Controller
{
    public function index()
    {
        $menus = FeaturedMenu::orderBy('order')->get();
        return view('admin.featured_menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.featured_menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'badge' => 'nullable|string',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'old_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'rating' => 'nullable|numeric',
            'reviews' => 'nullable|integer',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('menus', 'public');
        }

        FeaturedMenu::create($data);

        return redirect()->route('admin.featured_menus.index')
            ->with('success', 'Menu created successfully');
    }

   public function edit(FeaturedMenu $featuredMenu)
{
    return view('admin.featured_menus.edit', compact('featuredMenu'));
}

public function update(Request $request, FeaturedMenu $featuredMenu)
{
    $data = $request->validate([
        'title'       => 'required|string',
        'badge'       => 'nullable|string',
        'image'       => 'nullable|image',
        'price'       => 'required|numeric',
        'old_price'   => 'nullable|numeric',
        'description' => 'nullable|string',
        'rating'      => 'nullable|numeric',
        'reviews'     => 'nullable|integer',
        'order'       => 'nullable|integer',
    ]);

    if ($request->hasFile('image')) {
        if ($featuredMenu->image) {
            Storage::disk('public')->delete($featuredMenu->image);
        }
        $data['image'] = $request->file('image')->store('menus', 'public');
    }

    $featuredMenu->update($data);

    return redirect()->route('admin.featured_menus.index')
        ->with('success', 'Menu updated successfully');
}


    public function destroy(FeaturedMenu $featured_menu)
    {
        if ($featured_menu->image) {
            Storage::disk('public')->delete($featured_menu->image);
        }

        $featured_menu->delete();

        return back()->with('success', 'Menu deleted');
    }
}
