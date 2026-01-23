<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class NewsAdminController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug',
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['user'] = ['id' => auth()->id(), 'name' => optional(auth()->user())->name ?? 'Admin'];
        $data['tags'] = $data['tags'] ? array_values(array_filter(array_map('trim', explode(',', $data['tags'])))) : [];
        $data['likes'] = 0;
        $data['comments'] = 0;
        $data['shares'] = 0;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = Storage::url($path);
        }

        $news = News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'excerpt' => 'nullable|string',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
            'tags' => 'nullable|string',
            'published_at' => 'nullable|date',
        ]);

        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['tags'] = $data['tags'] ? array_values(array_filter(array_map('trim', explode(',', $data['tags'])))) : [];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news', 'public');
            $data['image'] = Storage::url($path);
        } else {
            unset($data['image']);
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'News deleted.');
    }
}
