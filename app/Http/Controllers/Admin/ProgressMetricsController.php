<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PerformanceMetric;
use App\Models\GrowthStat;
use Illuminate\Http\Request;

class ProgressMetricsController extends Controller
{
    // Show all metrics
    public function index()
    {
        $performanceMetrics = PerformanceMetric::orderBy('order')->get();
        $growthStats = GrowthStat::orderBy('order')->get();

        return view('admin.progress-metrics.index', compact('performanceMetrics', 'growthStats'));
    }

    // Show form to create a new metric
    public function create(Request $request)
    {
        $type = $request->query('type'); // 'performance' or 'growth'
        if (!in_array($type, ['performance', 'growth'])) {
            return redirect()->route('admin.progress-metrics.index')->with('error', 'Invalid metric type.');
        }

        return view('admin.progress-metrics.create', compact('type'));
    }

    // Store new metric
    public function store(Request $request)
    {
        $type = $request->query('type');
        if (!in_array($type, ['performance', 'growth'])) {
            return redirect()->route('admin.progress-metrics.index')->with('error', 'Invalid metric type.');
        }

        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required',
            'order' => 'nullable|integer',
            'color' => 'nullable|string',  // only for PerformanceMetric
            'trend' => 'nullable|string',  // only for GrowthStat
            'icon' => 'nullable|string',   // only for GrowthStat
        ]);

        if ($type === 'performance') {
            PerformanceMetric::create($data);
        } else {
            GrowthStat::create($data);
        }

        return redirect()->route('admin.progress-metrics.index')->with('success', 'Metric added successfully.');
    }

    // Show form to edit a metric
    public function edit(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'performance') {
            $item = PerformanceMetric::findOrFail($id);
        } elseif ($type === 'growth') {
            $item = GrowthStat::findOrFail($id);
        } else {
            return redirect()->route('admin.progress-metrics.index')->with('error', 'Invalid metric type.');
        }

        return view('admin.progress-metrics.edit', compact('item', 'type'));
    }

    // Update metric
    public function update(Request $request, $id)
    {
        $type = $request->query('type');
        if (!in_array($type, ['performance', 'growth'])) {
            return redirect()->route('admin.progress-metrics.index')->with('error', 'Invalid metric type.');
        }

        $data = $request->validate([
            'label' => 'required|string|max:255',
            'value' => 'required',
            'order' => 'nullable|integer',
            'color' => 'nullable|string',  // only for PerformanceMetric
            'trend' => 'nullable|string',  // only for GrowthStat
            'icon' => 'nullable|string',   // only for GrowthStat
        ]);

        if ($type === 'performance') {
            $metric = PerformanceMetric::findOrFail($id);
        } else {
            $metric = GrowthStat::findOrFail($id);
        }

        $metric->update($data);

        return redirect()->route('admin.progress-metrics.index')->with('success', 'Metric updated successfully.');
    }

    // Delete metric
    public function destroy(Request $request, $id)
    {
        $type = $request->query('type');
        if ($type === 'performance') {
            PerformanceMetric::findOrFail($id)->delete();
        } elseif ($type === 'growth') {
            GrowthStat::findOrFail($id)->delete();
        } else {
            return redirect()->route('admin.progress-metrics.index')->with('error', 'Invalid metric type.');
        }

        return redirect()->route('admin.progress-metrics.index')->with('success', 'Deleted successfully!');
    }
}
