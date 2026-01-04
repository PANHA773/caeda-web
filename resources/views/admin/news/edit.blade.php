@extends('admin.layouts.app')

@section('title', 'Edit News')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit News Article</h1>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Slug (optional)</label>
            <input type="text" name="slug" value="{{ old('slug', $news->slug) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="3" class="w-full border rounded px-3 py-2">{{ old('excerpt', $news->excerpt) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Content</label>
            <textarea name="content" rows="8" class="w-full border rounded px-3 py-2">{{ old('content', $news->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Current Image</label>
            @if($news->image)
                <div class="mb-2">
                    <img src="{{ $news->image }}" alt="{{ $news->title }}" class="w-48 h-auto rounded">
                </div>
            @else
                <div class="mb-2 text-sm text-gray-500">No image uploaded.</div>
            @endif
            <label class="block text-gray-700 font-medium mb-1">Replace Image (optional)</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tags (comma separated)</label>
            <input type="text" name="tags" value="{{ old('tags', is_array($news->tags) ? implode(', ', $news->tags) : $news->tags) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Published At (optional)</label>
            <input type="date" name="published_at" value="{{ old('published_at', optional($news->published_at)->format('Y-m-d')) }}" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('admin.news.index') }}" class="px-4 py-2 bg-gray-300 rounded">Cancel</a>
            <button class="px-4 py-2 btn-gradient rounded text-white">Save</button>
        </div>
    </form>
</div>
@endsection
