@extends('admin.layouts.app')

@section('content')
<div class="p-6 max-w-5xl mx-auto">

    <!-- Header -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Featured Menu</h1>
            <p class="text-gray-500">Update drink information</p>
        </div>
        <a href="{{ route('admin.featured_menus.index') }}"
           class="px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-semibold">
            ← Back
        </a>
    </div>

    <!-- Form -->
    <form action="{{ route('admin.featured_menus.update', $featuredMenu->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-6 space-y-6">
        @csrf
        @method('PUT')

        <!-- Title -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Menu Title <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title"
                   value="{{ old('title', $featuredMenu->title) }}"
                   class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                   required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Description
            </label>
            <textarea name="description" rows="3"
                      class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">{{ old('description', $featuredMenu->description) }}</textarea>
        </div>

        <!-- Prices -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Price ($) <span class="text-red-500">*</span>
                </label>
                <input type="number" step="0.01" name="price"
                       value="{{ old('price', $featuredMenu->price) }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Old Price ($)
                </label>
                <input type="number" step="0.01" name="old_price"
                       value="{{ old('old_price', $featuredMenu->old_price) }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>
        </div>

        <!-- Badge & Rating -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Badge
                </label>
                <select name="badge"
                        class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">None</option>
                    <option value="bestseller" @selected($featuredMenu->badge === 'bestseller')>Bestseller</option>
                    <option value="student_pick" @selected($featuredMenu->badge === 'student_pick')>Student Pick</option>
                    <option value="trending" @selected($featuredMenu->badge === 'trending')>Trending</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rating (0–5)
                </label>
                <input type="number" step="0.1" max="5" min="0" name="rating"
                       value="{{ old('rating', $featuredMenu->rating) }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>
        </div>

        <!-- Reviews & Order -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Reviews Count
                </label>
                <input type="number" name="reviews"
                       value="{{ old('reviews', $featuredMenu->reviews) }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order
                </label>
                <input type="number" name="order"
                       value="{{ old('order', $featuredMenu->order) }}"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>
        </div>

        <!-- Image -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Image
            </label>

            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center">
                <input type="file" name="image" id="imageInput" class="hidden" accept="image/*">

                <label for="imageInput" class="cursor-pointer">
                    <p class="text-gray-500 font-semibold">Click to change image</p>
                </label>

                <img id="previewImage"
                     src="{{ asset('storage/'.$featuredMenu->image) }}"
                     class="mt-4 mx-auto w-48 h-32 object-cover rounded-lg shadow">
            </div>
        </div>

        <!-- Status -->
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1"
                   class="rounded border-gray-300 text-amber-600 focus:ring-amber-500"
                   {{ $featuredMenu->is_active ? 'checked' : '' }}>
            <span class="text-sm font-semibold text-gray-700">
                Active (Show on website)
            </span>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="{{ route('admin.featured_menus.index') }}"
               class="px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 font-semibold">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-semibold shadow">
                Update Menu
            </button>
        </div>

    </form>
</div>

<!-- Image Preview -->
<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('previewImage');

    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
        }
    });
</script>
@endsection
