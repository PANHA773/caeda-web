@extends('admin.layouts.app')

@section('title', 'Edit Good')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Good</h1>
        <p class="text-gray-500">Update good information</p>
    </div>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.workshops.update', $workshop->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title"
                   value="{{ old('title', $workshop->title) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <input type="text" name="category"
                   value="{{ old('category', $workshop->category) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Instructor --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor</label>
            <input type="text" name="instructor"
                   value="{{ old('instructor', $workshop->instructor) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Level --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Level</label>
            <select name="level"
                    class="w-full mt-1 border rounded-lg px-4 py-2"
                    required>
                <option value="beginner" {{ $workshop->level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                <option value="intermediate" {{ $workshop->level == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                <option value="advanced" {{ $workshop->level == 'advanced' ? 'selected' : '' }}>Advanced</option>
            </select>
        </div>

        {{-- Video URL --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Video URL</label>
            <input type="url" name="video_url"
                   value="{{ old('video_url', $workshop->video) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2">
        </div>

        {{-- Current Image Preview --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
            @php
                $img = $workshop->image ?? null;
                $imgPath = $img ? public_path('storage/' . $img) : null;
                $hasImg = $imgPath && file_exists($imgPath);
            @endphp
            @if($hasImg)
                <img src="{{ asset('storage/'.$workshop->image) }}"
                     class="w-48 h-28 object-cover rounded-lg border mb-3">
            @else
                <div class="w-48 h-28 rounded-lg border mb-3 bg-gray-100 flex items-center justify-center text-gray-400">
                    No Image
                </div>
            @endif
        </div>

        {{-- Upload New Image --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Change Image</label>
            <input type="file" name="image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*">
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="status" value="1"
                   {{ old('status', $workshop->status) ? 'checked' : '' }}>
            <label class="text-sm text-gray-700">Active</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.workshops.index') }}"
               class="px-4 py-2 border rounded-lg text-gray-700">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Good
            </button>
        </div>

    </form>

</div>

@endsection
