<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectOverview;
use Illuminate\Http\Request;

class ProjectOverviewController extends Controller
{
    public function index()
    {
        
        $projectOverviews = ProjectOverview::latest()->paginate(10); // 10 per page

        return view('admin.project-overviews.index', compact('projectOverviews'));
    }

    public function create()
    {
        return view('admin.project-overviews.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        ProjectOverview::create($data);

        return redirect()
            ->route('admin.project-overviews.index')
            ->with('success', 'Project overview created successfully.');
    }

    public function edit(ProjectOverview $projectOverview)
    {
        return view('admin.project-overviews.edit', compact('projectOverview'));
    }

    public function update(Request $request, ProjectOverview $projectOverview)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $projectOverview->update($data);

        return redirect()
            ->route('admin.project-overviews.index')
            ->with('success', 'Project overview updated successfully.');
    }

    public function destroy(ProjectOverview $projectOverview)
    {
        $projectOverview->delete();

        return redirect()
            ->route('admin.project-overviews.index')
            ->with('success', 'Project overview deleted successfully.');
    }
}
