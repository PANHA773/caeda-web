@extends('admin.layouts.app')

@section('title', 'Edit Feature')

@section('content')
<div class="max-w-4xl mx-auto p-8 bg-white rounded-2xl shadow-lg">

    <h1 class="text-3xl font-bold mb-6 text-gray-900">Edit Feature</h1>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-lg border border-red-200">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Form Section --}}
        <div class="lg:col-span-2 bg-gray-50 p-6 rounded-xl shadow-inner">
            <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" id="featureForm">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-5">
                    <label for="title" class="block text-gray-700 font-semibold mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $feature->title) }}"
                           maxlength="50"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                           placeholder="Feature title (e.g., Expert Instructors)">
                </div>

                {{-- Description --}}
                <div class="mb-5">
                    <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                    <textarea name="description" id="description" rows="4" maxlength="200"
                              class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                              placeholder="Brief description of the feature">{{ old('description', $feature->description) }}</textarea>
                </div>

                {{-- Icon --}}
                <div class="mb-5">
                    <label for="icon" class="block text-gray-700 font-semibold mb-2">SVG Icon Path</label>
                    <input type="text" name="icon" id="icon" value="{{ old('icon', $feature->icon) }}"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                           placeholder="M12 6.253v13 ...">
                    <div class="mt-2 text-sm text-gray-500">Paste SVG path data or leave empty for default icon</div>
                </div>

                {{-- Color --}}
                <div class="mb-5">
                    <label for="color" class="block text-gray-700 font-semibold mb-2">Color Gradient (Tailwind)</label>
                    <input type="text" name="color" id="color" value="{{ old('color', $feature->color) }}"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                           placeholder="from-blue-500 to-cyan-500">
                    <div class="mt-2 text-sm text-gray-500">Use Tailwind gradient classes (from-color to-color)</div>
                </div>

                {{-- Sort Order --}}
                <div class="mb-5">
                    <label for="sort_order" class="block text-gray-700 font-semibold mb-2">Sort Order</label>
                    <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $feature->sort_order) }}"
                           min="0" max="999"
                           class="w-full border border-gray-300 px-4 py-3 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                    <div class="mt-2 text-sm text-gray-500">Lower numbers appear first</div>
                </div>

                {{-- Active / Popular --}}
                <div class="mb-6 flex items-center gap-6">
                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="is_active" value="1" {{ $feature->is_active ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-green-500">
                        <span class="text-gray-700 font-medium">Active</span>
                    </label>

                    <label class="inline-flex items-center gap-2">
                        <input type="checkbox" name="is_popular" value="1" {{ $feature->is_popular ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-yellow-500">
                        <span class="text-gray-700 font-medium">Popular</span>
                    </label>
                </div>

                {{-- Submit Button --}}
                <div class="flex items-center gap-4">
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
                        <i class="fas fa-save mr-2"></i> Update Feature
                    </button>

                    <a href="{{ route('admin.features.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-6 py-3 rounded-lg font-semibold transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>

        {{-- Delete Section --}}
        <div class="lg:col-span-1 flex flex-col justify-start">
            <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this feature?');"
                  class="bg-red-50 p-6 rounded-xl shadow-inner">
                @csrf
                @method('DELETE')
                <h3 class="text-lg font-semibold text-red-700 mb-4">Delete Feature</h3>
                <p class="text-sm text-red-600 mb-4">This action cannot be undone.</p>
                <button type="submit"
                        class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg font-semibold transition">
                    <i class="fas fa-trash mr-2"></i> Delete Feature
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
