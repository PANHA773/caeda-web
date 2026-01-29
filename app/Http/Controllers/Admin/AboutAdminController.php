<?php

namespace App\Http\Controllers\Admin; // <- must be Admin

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutAdminController extends Controller
{
    public function index()
    {
        $aboutContent = \App\Models\AboutContent::first();
        if (!$aboutContent) {
            $aboutContent = \App\Models\AboutContent::create([
                'page_title' => 'About Us',
                'page_description' => 'About page description',
                'header_title' => 'About Us',
                'mission' => 'Mission statement',
                'vision' => 'Vision statement',
            ]);
        }
        return view('admin.about.index', compact('aboutContent'));
    }

    public function update(Request $request)
    {
        $aboutContent = \App\Models\AboutContent::first();

        $data = $request->validate([
            'page_title' => 'nullable|string',
            'page_description' => 'nullable|string',
            'header_title' => 'nullable|string',
            // Rector
            'rector_name' => 'nullable|string',
            'rector_message' => 'nullable|string',
            'rector_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('rector_image')) {
            if ($aboutContent->rector_image && \Illuminate\Support\Facades\Storage::disk('public')->exists($aboutContent->rector_image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($aboutContent->rector_image);
            }
            $path = $request->file('rector_image')->store('about', 'public');
            $data['rector_image'] = $path;
        }

        $aboutContent->update($data);

        return redirect()->route('admin.about.index')->with('success', 'About content updated successfully!');
    }
}
