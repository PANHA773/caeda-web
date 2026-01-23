@extends('admin.layouts.app')

@section('title', 'Edit Workshop')

@section('content')

    <div class="max-w-4xl mx-auto px-6 py-8">

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Edit Workshop</h1>
            <p class="text-gray-500">Update workshop information</p>
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
        <form action="{{ route('admin.workshops.update', $workshop->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white shadow rounded-xl p-6 space-y-6">

            @csrf
            @method('PUT')

            {{-- Title --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" value="{{ old('title', $workshop->title) }}"
                    class="w-full mt-1 border rounded-lg px-4 py-2" required>
            </div>

            {{-- Category --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Category</label>
                <input type="text" name="category" value="{{ old('category', $workshop->category) }}"
                    class="w-full mt-1 border rounded-lg px-4 py-2" required>
            </div>

            {{-- Instructor Image --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Instructor Image</label>
                @if($workshop->instructor_image)
                    <img src="{{ asset('storage/' . $workshop->instructor_image) }}" class="w-20 h-20 rounded-full mb-2">
                @endif
                <input type="file" name="instructor_image" class="w-full mt-1 border rounded-lg px-4 py-2" accept="image/*">
            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="4"
                    class="w-full mt-1 border rounded-lg px-4 py-2">{{ old('description', $workshop->description) }}</textarea>
            </div>

            {{-- Level --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Level</label>
                <select name="level" class="w-full mt-1 border rounded-lg px-4 py-2" required>
                    <option value="beginner" {{ $workshop->level == 'beginner' ? 'selected' : '' }}>Beginner</option>
                    <option value="intermediate" {{ $workshop->level == 'intermediate' ? 'selected' : '' }}>Intermediate
                    </option>
                    <option value="advanced" {{ $workshop->level == 'advanced' ? 'selected' : '' }}>Advanced</option>
                </select>
            </div>

            {{-- Video URL --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Video URL (YouTube/Vimeo)</label>
                <input type="url" name="video_url"
                    value="{{ old('video_url', $workshop->video && preg_match('/^https?:\/\//i', $workshop->video) ? $workshop->video : '') }}"
                    class="w-full mt-1 border rounded-lg px-4 py-2" placeholder="https://youtube.com/...">
            </div>

            {{-- Video File --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Or Upload Video File</label>
                @if($workshop->video && !preg_match('/^https?:\/\//i', $workshop->video))
                    <div class="mb-2 p-2 bg-gray-50 rounded border flex items-center justify-between text-sm">
                        <span class="text-gray-600 truncate">{{ basename($workshop->video) }}</span>
                        <a href="{{ asset('storage/' . $workshop->video) }}" target="_blank"
                            class="text-blue-600 hover:underline">View Current</a>
                    </div>
                @endif
                <input type="file" name="video_file" class="w-full mt-1 border rounded-lg px-4 py-2" accept="video/*">
                <p class="text-xs text-gray-500 mt-1">Supported formats: MP4, MOV, OGG (Max 20MB). Leave empty to keep
                    current.</p>
            </div>

            {{-- Current Image Preview --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Thumbnail</label>
                @if($workshop->image)
                    <img src="{{ asset('storage/' . $workshop->image) }}" class="w-48 h-28 object-cover rounded-lg border mb-3">
                @else
                    <div class="w-48 h-28 rounded-lg border mb-3 bg-gray-100 flex items-center justify-center text-gray-400">
                        No Thumbnail
                    </div>
                @endif
            </div>

            {{-- Upload New Image --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Change Thumbnail</label>
                <input type="file" name="image" class="w-full mt-1 border rounded-lg px-4 py-2" accept="image/*">
            </div>

            {{-- Status --}}
            <div class="flex items-center gap-3">
                <input type="checkbox" name="status" value="1" {{ old('status', $workshop->status) ? 'checked' : '' }}>
                <label class="text-sm text-gray-700">Active</label>
            </div>

            {{-- Buttons --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.workshops.index') }}" class="px-4 py-2 border rounded-lg text-gray-700">
                    Cancel
                </a>

                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Update Workshop
                </button>
            </div>

        </form>

    </div>

@endsection