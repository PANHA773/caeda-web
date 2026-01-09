@extends('admin.layouts.app')

@section('title', 'Create News')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Create News Article</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="3" class="w-full border rounded px-3 py-2">{{ old('excerpt') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Content</label>
            <textarea name="content" rows="8" class="w-full border rounded px-3 py-2">{{ old('content') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Image (upload)</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tags (comma separated)</label>
            <input type="text" name="tags" value="{{ old('tags') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Published At (optional)</label>
            <input type="date" name="published_at" value="{{ old('published_at') }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-gray-300 rounded">Cancel</a>
            <button class="px-4 py-2 btn-gradient rounded text-white">Create</button>
        </div>
    </form>
</div>
@endsection
