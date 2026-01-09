@extends('admin.layouts.app')

@section('title', 'Edit Faculty')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white rounded-2xl shadow-lg border border-gray-200 p-8">
    <!-- Page Header -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Edit Faculty</h1>
        <p class="text-gray-500 mt-1">Update the faculty details below.</p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-3 rounded-xl mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.faculties.edit', $faculty->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name" class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $faculty->name) }}" 
                   class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
            <textarea name="description" id="description" rows="4"
                      class="w-full px-5 py-3 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">{{ old('description', $faculty->description) }}</textarea>
        </div>

        <!-- Active & Order -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:space-x-6 space-y-4 sm:space-y-0">
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="is_active" value="1" {{ $faculty->is_active ? 'checked' : '' }} 
                       class="h-5 w-5 text-indigo-600 rounded border-gray-300 focus:ring-2 focus:ring-indigo-500">
                <span class="text-gray-700 font-medium">Active</span>
            </label>

            <div class="flex flex-col">
                <label for="order" class="text-gray-700 font-medium mb-1">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order', $faculty->order) }}" 
                       class="w-24 px-4 py-2 border border-gray-300 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row sm:space-x-4 space-y-3 sm:space-y-0 mt-6">
            <button type="submit" 
                    class="w-full sm:w-auto px-6 py-3 bg-indigo-600 text-white font-medium rounded-2xl hover:bg-indigo-700 transition">
                Update Faculty
            </button>
            <a href="{{ route('admin.faculties.index') }}" 
               class="w-full sm:w-auto px-6 py-3 bg-gray-200 text-gray-700 font-medium rounded-2xl hover:bg-gray-300 transition text-center">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
