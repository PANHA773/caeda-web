<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OfficeManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OfficeManagerController extends Controller
{
    public function index(Request $request)
    {
        $managers = OfficeManager::query()
            ->when($request->search, function ($q) use ($request) {
                $q->where(function ($sub) use ($request) {
                    $sub->where('name', 'like', "%{$request->search}%")
                        ->orWhere('position', 'like', "%{$request->search}%");
                });
            })
            ->orderBy('order', 'asc')
            ->paginate(10)
            ->withQueryString();

        $stats = OfficeManager::selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN position = 'Senior Manager' THEN 1 ELSE 0 END) as senior,
            SUM(CASE WHEN position = 'Assistant Manager' THEN 1 ELSE 0 END) as assistant,
            MIN(`order`) as top_priority
        ")->first();

        return view('admin.office-managers.index', [
            'managers' => $managers,
            'totalManagers' => $stats->total,
            'seniorManagers' => $stats->senior,
            'assistantManagers' => $stats->assistant,
            'topPriority' => $stats->top_priority ?? 0,
        ]);
    }

    public function create()
    {
        return view('admin.office-managers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gradient' => 'nullable|string|max:100',
            'order'    => 'nullable|integer|min:1',
        ]);

        $data['order'] ??= (OfficeManager::max('order') ?? 0) + 1;
        $data['image'] = $this->handleImageUpload($request);

        OfficeManager::create($data);

        return redirect()
            ->route('admin.office-managers.index')
            ->with('success', 'Manager created successfully');
    }

    public function edit(OfficeManager $officeManager)
    {
        return view('admin.office-managers.edit', compact('officeManager'));
    }

    public function update(Request $request, OfficeManager $officeManager)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'gradient' => 'nullable|string|max:100',
            'order'    => 'nullable|integer|min:1',
        ]);

        $newImage = $this->handleImageUpload($request, $officeManager);

        if ($newImage !== null) {
            $data['image'] = $newImage;
        } else {
            unset($data['image']); // keep existing image
        }

        $officeManager->update($data);

        return redirect()
            ->route('admin.office-managers.index')
            ->with('success', 'Manager updated successfully');
    }

    public function destroy(OfficeManager $officeManager)
    {
        if ($officeManager->image && Storage::disk('public')->exists($officeManager->image)) {
            Storage::disk('public')->delete($officeManager->image);
        }

        $officeManager->delete();

        return redirect()
            ->route('admin.office-managers.index')
            ->with('success', 'Manager deleted successfully');
    }

    protected function handleImageUpload(Request $request, OfficeManager $manager = null)
    {
        if (!$request->hasFile('image')) {
            return null;
        }

        if ($manager?->image && Storage::disk('public')->exists($manager->image)) {
            Storage::disk('public')->delete($manager->image);
        }

        return $request->file('image')->store('office_managers', 'public');
    }

    public function updateOrder(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*.id' => 'required|exists:office_managers,id',
            'orders.*.order' => 'required|integer|min:1',
        ]);

        foreach ($request->orders as $item) {
            OfficeManager::where('id', $item['id'])
                ->update(['order' => $item['order']]);
        }

        return response()->json(['success' => true]);
    }
}
