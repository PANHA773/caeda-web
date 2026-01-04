@extends('admin.layouts.app')

@section('title', 'Create Menu Item')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Create Menu Item</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menu_items.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input name="title" class="w-full border rounded px-3 py-2" value="{{ old('title') }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select name="menu_category_id" class="w-full border rounded px-3 py-2" required>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input name="price" class="w-full border rounded px-3 py-2" value="{{ old('price') }}">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Old Price</label>
                <input name="old_price" class="w-full border rounded px-3 py-2" value="{{ old('old_price') }}">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Image</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div class="flex items-center gap-3">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" checked>
            <label class="text-sm">Active</label>
        </div>

        <div class="mt-6 text-right">
            <a href="{{ route('admin.menu_items.index') }}" class="px-4 py-2 border rounded mr-2">Cancel</a>
            <button class="px-6 py-2 bg-indigo-600 text-white rounded">Save Item</button>
        </div>
    </form>
</div>
@endsection
