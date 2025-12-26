<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisionMission;
use Illuminate\Http\Request;

class VisionMissionController extends Controller
{
    public function index()
    {
        $visionMissions = VisionMission::latest()->paginate(10); // 10 per page
    
        return view('admin.vision-missions.index', compact('visionMissions'));
    }

    public function create()
    {
        return view('admin.vision-missions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:vision,mission',
            'description' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        VisionMission::create($data);

        return redirect()->route('admin.vision-missions.index')
            ->with('success', ucfirst($data['type']) . ' created successfully.');
    }

    public function edit(VisionMission $visionMission)
    {
        return view('admin.vision-missions.edit', compact('visionMission'));
    }

    public function update(Request $request, VisionMission $visionMission)
    {
        $data = $request->validate([
            'type' => 'required|in:vision,mission',
            'description' => 'required|string',
            'is_active' => 'sometimes|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $visionMission->update($data);

        return redirect()->route('admin.vision-missions.index')
            ->with('success', ucfirst($data['type']) . ' updated successfully.');
    }

    public function destroy(VisionMission $visionMission)
    {
        $visionMission->delete();

        return redirect()->route('admin.vision-missions.index')
            ->with('success', ucfirst($visionMission->type) . ' deleted successfully.');
    }
}
