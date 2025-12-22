@extends('admin.layouts.app')

@section('title', 'Add Pricing Plan')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Add New Pricing Plan</h1>
        <a href="{{ route('admin.pricing.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
            ← Back to Plans
        </a>
    </div>

    {{-- Form --}}
    <div class="bg-white shadow rounded-lg p-6">
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.pricing.store') }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Plan Name</label>
                <input type="text" name="name" value="{{ old('name') }}" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            {{-- Monthly Price --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Monthly Price ($)</label>
                <input type="number" step="0.01" name="monthly_price" value="{{ old('monthly_price') }}" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            {{-- Annual Price --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Annual Price ($)</label>
                <input type="number" step="0.01" name="annual_price" value="{{ old('annual_price') }}" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="3" 
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>
            </div>

            {{-- Popular --}}
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="is_popular" id="is_popular" value="1" class="mr-2" {{ old('is_popular') ? 'checked' : '' }}>
                <label for="is_popular" class="text-gray-700 font-medium">Mark as Most Popular</label>
            </div>

            {{-- Active --}}
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="mr-2" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="text-gray-700 font-medium">Active</label>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Create Plan
            </button>
        </form>
    </div>
</div>
@endsection
