@extends('admin.layouts.app')

@section('title', 'Progress Metrics')

@section('content')
<div class="p-6 space-y-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Progress Metrics</h1>
            <p class="text-gray-500">Manage performance and growth metrics</p>
        </div>
        <div class="flex gap-4">
            <a href="{{ route('admin.progress-metrics.create') }}?type=performance"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
               + Add Performance Metric
            </a>
            <a href="{{ route('admin.progress-metrics.create') }}?type=growth"
               class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg shadow">
               + Add Growth Stat
            </a>
        </div>
    </div>

    {{-- Success Messages --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Performance Metrics Table --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <h2 class="text-xl font-semibold p-4 border-b">Performance Metrics</h2>
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Label</th>
                    <th class="px-6 py-3">Value (%)</th>
                    <th class="px-6 py-3">Color</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($performanceMetrics as $metric)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">{{ $metric->order }}</td>
                        <td class="px-6 py-4">{{ $metric->label }}</td>
                        <td class="px-6 py-4">{{ $metric->value }}%</td>
                        <td class="px-6 py-4">
                            <span class="inline-block w-6 h-6 rounded-full" style="background-color: {{ $metric->color }};"></span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.progress-metrics.edit', $metric->id) }}?type=performance"
                                   class="px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                                   Edit
                                </a>
                                <form action="{{ route('admin.progress-metrics.destroy', $metric->id) }}?type=performance"
                                      method="POST"
                                      onsubmit="return confirm('Delete this metric?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">No performance metrics found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Growth Stats Table --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <h2 class="text-xl font-semibold p-4 border-b">Growth Stats</h2>
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-3">Order</th>
                    <th class="px-6 py-3">Label</th>
                    <th class="px-6 py-3">Value</th>
                    <th class="px-6 py-3">Trend</th>
                    <th class="px-6 py-3">Icon</th>
                    <th class="px-6 py-3 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($growthStats as $stat)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">{{ $stat->order }}</td>
                        <td class="px-6 py-4">{{ $stat->label }}</td>
                        <td class="px-6 py-4">{{ $stat->value }}</td>
                        <td class="px-6 py-4">
                            <span class="flex items-center gap-1 text-{{ $stat->trend == 'up' ? 'green' : 'red' }}-600 font-semibold">
                                <i class="fas fa-arrow-{{ $stat->trend }}"></i> {{ ucfirst($stat->trend) }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            <i class="fas fa-{{ $stat->icon }}"></i>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.progress-metrics.edit', $stat->id) }}?type=growth"
                                   class="px-3 py-1 text-sm bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                                   Edit
                                </a>
                                <form action="{{ route('admin.progress-metrics.destroy', $stat->id) }}?type=growth"
                                      method="POST"
                                      onsubmit="return confirm('Delete this growth stat?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">No growth stats found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
