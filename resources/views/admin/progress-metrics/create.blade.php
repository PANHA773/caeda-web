@extends('admin.layouts.app')

@section('title', 'Add ' . ucfirst($type) . ' Metric')

@section('content')
<div class="p-6 max-w-3xl mx-auto space-y-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Add {{ ucfirst($type) }} Metric
        </h1>
        <p class="text-gray-500">Fill out the details below to add a new {{ $type }} metric.</p>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.progress-metrics.store') }}?type={{ $type }}" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
        @csrf

        <div>
            <label class="block font-semibold mb-1">Label</label>
            <input type="text" name="label" value="{{ old('label') }}" required
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-1">Value</label>
            <input type="text" name="value" value="{{ old('value') }}" required
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-1">Order</label>
            <input type="number" name="order" value="{{ old('order', 0) }}"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        @if($type === 'performance')
            <div>
                <label class="block font-semibold mb-1">Color</label>
                <input type="color" name="color" value="{{ old('color', '#3b82f6') }}"
                       class="w-20 h-10 border-gray-300 rounded-lg p-1">
            </div>
        @else
            <div>
                <label class="block font-semibold mb-1">Trend</label>
                <select name="trend" class="w-full border-gray-300 rounded-lg p-2">
                    <option value="up" {{ old('trend') == 'up' ? 'selected' : '' }}>Up</option>
                    <option value="down" {{ old('trend') == 'down' ? 'selected' : '' }}>Down</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="{{ old('icon', 'chart-line') }}"
                       placeholder="e.g., users, globe, dollar-sign"
                       class="w-full border-gray-300 rounded-lg p-2">
            </div>
        @endif

        <div class="flex justify-end gap-4 mt-4">
            <a href="{{ route('admin.progress-metrics.index') }}" 
               class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Cancel</a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
        </div>

    </form>

</div>
@endsection
