@extends('admin.layouts.app')

@section('title', 'Edit Social Link')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-6">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Social Link</h1>
        <p class="text-gray-500 text-sm">Update the social media link information</p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.social.update', $social->id) }}" method="POST" class="bg-white p-6 rounded-xl shadow">
        @csrf
        @method('PUT')

        {{-- Platform --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="platform">Platform Name</label>
            <input type="text" name="platform" id="platform"
                   value="{{ old('platform', $social->platform) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="e.g. Facebook" required>
        </div>

        {{-- Icon --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="icon">Icon (FontAwesome class)</label>
            <input type="text" name="icon" id="icon"
                   value="{{ old('icon', $social->icon) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="e.g. fab fa-facebook-f" required>
            <p class="text-gray-400 text-sm mt-1">Use <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-500 underline">FontAwesome icons</a>.</p>
        </div>

        {{-- Color --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="color">Color Classes</label>
            <input type="text" name="color" id="color"
                   value="{{ old('color', $social->color) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="e.g. bg-blue-600 hover:bg-blue-700" required>
            <p class="text-gray-400 text-sm mt-1">Tailwind CSS background color classes for hover and normal state.</p>
        </div>

        {{-- URL --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="url">URL</label>
            <input type="url" name="url" id="url"
                   value="{{ old('url', $social->url) }}"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="https://facebook.com/yourpage" required>
        </div>

        {{-- Active Status --}}
        <div class="mb-4 flex items-center space-x-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" 
                   {{ old('is_active', $social->is_active) ? 'checked' : '' }}>
            <label for="is_active" class="text-gray-700 font-semibold">Active</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end space-x-3 mt-6">
            <a href="{{ route('admin.social.index') }}" 
               class="px-5 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg font-semibold">
                Cancel
            </a>
            <button type="submit" 
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                Update
            </button>
        </div>

    </form>
</div>
@endsection
