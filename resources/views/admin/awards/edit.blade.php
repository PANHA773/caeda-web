@extends('admin.layouts.app')

@section('title', 'Edit Award')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Award</h1>
            <p class="text-gray-500">Update award details</p>
        </div>
        <a href="{{ route('admin.awards.index') }}"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.awards.update', $award->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-1">Award Title</label>
                <input type="text" name="title" id="title"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('title', $award->title) }}" required>
            </div>

            <div>
                <label for="organization" class="block text-gray-700 font-semibold mb-1">Organization</label>
                <input type="text" name="organization" id="organization"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('organization', $award->organization) }}" required>
            </div>

            <div>
                <label for="year" class="block text-gray-700 font-semibold mb-1">Year</label>
                <input type="number" name="year" id="year"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="{{ old('year', $award->year) }}" min="2000" max="{{ date('Y') }}" required>
            </div>

            <div>
                <label for="category" class="block text-gray-700 font-semibold mb-1">Category</label>
                <select name="category" id="category"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    <option value="" disabled>Select Category</option>
                    <option value="international" {{ old('category', $award->category) == 'international' ? 'selected' : '' }}>International</option>
                    <option value="education" {{ old('category', $award->category) == 'education' ? 'selected' : '' }}>Education</option>
                    <option value="innovation" {{ old('category', $award->category) == 'innovation' ? 'selected' : '' }}>Innovation</option>
                    <option value="research" {{ old('category', $award->category) == 'research' ? 'selected' : '' }}>Research</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                          required>{{ old('description', $award->description) }}</textarea>
            </div>

            <div>
                <label for="icon" class="block text-gray-700 font-semibold mb-1">Icon (FontAwesome)</label>
                <input type="text" name="icon" id="icon"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="e.g., trophy, lightbulb"
                       value="{{ old('icon', $award->icon) }}">
                <p class="text-gray-400 text-sm mt-1">Use a valid FontAwesome 6 icon class.</p>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow flex items-center gap-2">
                    <i class="fas fa-save"></i> Update Award
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
