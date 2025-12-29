@extends('admin.layouts.app')

@section('title', 'Edit Hero')
@section('page-title', 'Edit Hero Section')
@section('page-description', 'Update an existing hero section.')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <form action="{{ route('admin.heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Badge Text -->
        <div class="mb-4">
            <label for="badge_text" class="block font-medium text-gray-700">Badge Text</label>
            <input type="text" name="badge_text" id="badge_text" value="{{ old('badge_text', $hero->badge_text) }}"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('badge_text') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $hero->title) }}"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Highlight Title -->
        <div class="mb-4">
            <label for="highlight_title" class="block font-medium text-gray-700">Highlight Title</label>
            <input type="text" name="highlight_title" id="highlight_title" value="{{ old('highlight_title', $hero->highlight_title) }}"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('highlight_title') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Subtitle -->
        <div class="mb-4">
            <label for="subtitle" class="block font-medium text-gray-700">Subtitle</label>
            <textarea name="subtitle" id="subtitle" rows="3"
                      class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">{{ old('subtitle', $hero->subtitle) }}</textarea>
            @error('subtitle') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            @error('image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

            @if($hero->image)
                <div class="mt-2">
                    <p class="text-gray-600 text-sm mb-1">Current Image:</p>
                    <img src="{{ asset('storage/' . $hero->image) }}" alt="Hero Image" class="w-64 h-40 object-cover rounded">
                </div>
            @endif
        </div>

        <!-- Stats -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Stats</label>
            <div id="stats-container">
                @php
                    $oldStats = old('stats', $hero->stats ?? []);
                    if (!count($oldStats)) {
                        $oldStats = [['value' => '', 'label' => '', 'icon' => '']];
                    }
                @endphp
                @foreach($oldStats as $i => $stat)
                    <div class="flex gap-2 mb-2 stat-item">
                        <input type="text" name="stats[{{ $i }}][value]" placeholder="Value" value="{{ $stat['value'] ?? '' }}" class="border p-2 rounded">
                        <input type="text" name="stats[{{ $i }}][label]" placeholder="Label" value="{{ $stat['label'] ?? '' }}" class="border p-2 rounded">
                        <input type="text" name="stats[{{ $i }}][icon]" placeholder="Icon" value="{{ $stat['icon'] ?? '' }}" class="border p-2 rounded">
                        <button type="button" class="remove-stat bg-red-500 text-white px-2 rounded">Remove</button>
                    </div>
                @endforeach
            </div>
            <button type="button" id="add-stat" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Stat</button>
        </div>

        <!-- Active -->
        <div class="mb-4 flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $hero->is_active) ? 'checked' : '' }} class="rounded">
            <label for="is_active" class="text-gray-700 font-medium">Active</label>
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('admin.heroes.index') }}" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold">Update Hero</button>
        </div>
    </form>
</div>

<script>
document.getElementById('add-stat').addEventListener('click', function() {
    let container = document.getElementById('stats-container');
    let index = container.children.length;
    let div = document.createElement('div');
    div.classList.add('flex', 'gap-2', 'mb-2', 'stat-item');
    div.innerHTML = `
        <input type="text" name="stats[${index}][value]" placeholder="Value" class="border p-2 rounded">
        <input type="text" name="stats[${index}][label]" placeholder="Label" class="border p-2 rounded">
        <input type="text" name="stats[${index}][icon]" placeholder="Icon" class="border p-2 rounded">
        <button type="button" class="remove-stat bg-red-500 text-white px-2 rounded">Remove</button>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-stat')) {
        e.target.closest('.stat-item').remove();
    }
});
</script>
@endsection
