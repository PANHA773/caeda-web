@extends('admin.layouts.app')

@section('title', 'Add Hero Slide')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add New Hero Slide</h1>

    <a href="{{ route('admin.hero_carousels.index') }}" class="mb-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Back to List</a>

    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-2 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.hero_carousels.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-bold mb-1">Title (optional)</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border px-3 py-2 rounded" placeholder="Slide title">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Image URL</label>
            <input type="text" name="image" value="{{ old('image') }}" class="w-full border px-3 py-2 rounded" placeholder="https://example.com/image.jpg" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-1">Order</label>
            <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4 flex items-center">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="mr-2">
            <label class="font-bold">Active</label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded font-bold hover:bg-blue-600 transition">Add Slide</button>
    </form>
</div>
@endsection
