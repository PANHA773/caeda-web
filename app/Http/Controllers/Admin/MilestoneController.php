<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Milestone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MilestoneController extends Controller
{
    public function index()
    {
        $milestones = Milestone::orderBy('order')->get();
        return view('admin.milestones.index', compact('milestones'));
    }

    public function create()
    {
        return view('admin.milestones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        Milestone::create([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => $request->color,
            'achievements' => explode("\n", trim($request->input('achievements_text'))),
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone created');
    }

    // ✅ ADD THIS
    public function edit(Milestone $milestone)
    {
        return view('admin.milestones.edit', compact('milestone'));
    }

    // ✅ ADD THIS
    public function update(Request $request, Milestone $milestone)
    {
        $request->validate([
            'year' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        $milestone->update([
            'year' => $request->year,
            'title' => $request->title,
            'description' => $request->description,
            'icon' => $request->icon,
            'color' => $request->color,
            'achievements' => explode("\n", trim($request->input('achievements_text'))),
            'order' => $request->order ?? 0,
        ]);

        return redirect()->route('admin.milestones.index')->with('success', 'Milestone updated');
    }

    // (optional but recommended)
    public function destroy(Milestone $milestone)
    {
        $milestone->delete();
        return back()->with('success', 'Milestone deleted');
    }
}
