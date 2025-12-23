@extends('admin.layouts.app')

@section('title', 'Add Speaker')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add New Speaker</h1>

    @if($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.speakers.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label class="block font-bold mb-2">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Topic</label>
            <input type="text" name="topic" value="{{ old('topic') }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Social Platforms (comma-separated)</label>
            <input type="text" name="social" value="{{ old('social') }}" placeholder="twitter,linkedin,github" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Image</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4 flex items-center space-x-2">
            <input type="checkbox" name="is_active" value="1" checked class="form-checkbox">
            <label class="font-bold">Active</label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition-all">Save Speaker</button>
    </form>
</div>
@endsection
