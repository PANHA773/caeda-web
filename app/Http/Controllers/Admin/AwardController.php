<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;

class AwardController extends Controller
{


    public function index()
{
    $awards = Award::orderBy('year', 'desc')->paginate(10);
    return view('admin.awards.index', compact('awards'));
}


    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'organization' => 'required',
            'year' => 'required',
            'category' => 'required',
        ]);

        Award::create($request->all());

        return redirect()
            ->route('admin.awards.index')
            ->with('success', 'Award created successfully');
    }

    public function edit(Award $award)
    {
        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, Award $award)
    {
        $request->validate([
            'title' => 'required',
            'organization' => 'required',
            'year' => 'required',
            'category' => 'required',
        ]);

        $award->update($request->all());

        return redirect()
            ->route('admin.awards.index')
            ->with('success', 'Award updated successfully');
    }

    public function destroy(Award $award)
    {
        $award->delete();
        return back()->with('success', 'Award deleted');
    }
}
