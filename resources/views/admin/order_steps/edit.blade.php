@extends('admin.layouts.app')

@section('title', 'Edit Order Step')

@section('content')
<div class="container mx-auto py-10">

    {{-- Page Header --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Edit Order Step</h1>
        <a href="{{ route('admin.order_steps.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Back</a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.order_steps.update', $orderStep->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" required
                       value="{{ old('title', $orderStep->title) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description', $orderStep->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Icon --}}
            <div class="mb-4">
                <label for="icon" class="block text-gray-700 font-semibold mb-2">Icon (FontAwesome)</label>
                <input type="text" name="icon" id="icon"
                       placeholder="e.g., fas fa-shopping-cart"
                       value="{{ old('icon', $orderStep->icon) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('icon')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Color --}}
            <div class="mb-6">
                <label for="color" class="block text-gray-700 font-semibold mb-2">Color (Tailwind class or HEX)</label>
                <input type="text" name="color" id="color"
                       placeholder="e.g., from-red-500 to-yellow-500 or #f59e0b"
                       value="{{ old('color', $orderStep->color) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('color')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-6 flex items-center gap-2">
                <input type="checkbox" name="status" value="1" id="status"
                       class="h-5 w-5 text-amber-500"
                       {{ old('status', $orderStep->status) ? 'checked' : '' }}>
                <label for="status" class="text-gray-700 font-semibold">Active</label>
            </div>

            {{-- Submit --}}
            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-2 bg-amber-500 text-white font-semibold rounded-lg hover:bg-amber-600 transition">
                    Update
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
