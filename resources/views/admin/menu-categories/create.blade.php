@extends('admin.layouts.app')

@section('title', 'Create Menu Category')

@section('content')
<div class="max-w-4xl mx-auto p-6">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Create Menu Category</h2>
        <a href="{{ route('admin.menu-categories.index') }}"
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            ← Back
        </a>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.menu-categories.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Category Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Category Name <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       placeholder="e.g. Hot Coffee"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                       required>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Icon (FontAwesome class)
                </label>
                <input type="text"
                       name="icon"
                       value="{{ old('icon') }}"
                       placeholder="fas fa-fire"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
                <p class="text-xs text-gray-500 mt-1">
                    Example: <code>fas fa-fire</code>, <code>fas fa-coffee</code>
                </p>
            </div>

            <!-- Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Display Order
                </label>
                <input type="number"
                       name="order"
                       value="{{ old('order', 0) }}"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3">
                <input type="checkbox"
                       name="is_active"
                       id="is_active"
                       value="1"
                       checked
                       class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                <label for="is_active" class="text-sm font-medium text-gray-700">
                    Active (visible on website)
                </label>
            </div>

            <!-- Submit -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="{{ route('admin.menu-categories.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-amber-600 text-white font-semibold hover:bg-amber-700 transition">
                    Save Category
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
