@extends('admin.layouts.app')

@section('title', 'Edit Why Choose Us')

@section('content')
<div class="container mx-auto py-10">

    {{-- Page Header --}}
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Edit Why Choose Us Item</h1>
        <a href="{{ route('admin.why_choose_us.index') }}"
           class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400 transition">Back</a>
    </div>

    {{-- Form Card --}}
    <div class="bg-white shadow rounded-lg p-6">
        {{-- Fix route parameter for update --}}
        <form action="{{ route('admin.why_choose_us.update', ['why_choose_u' => $item->id]) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Badge --}}
            <div class="mb-4">
                <label for="badge" class="block text-gray-700 font-semibold mb-2">Badge (optional)</label>
                <input type="text" name="badge" id="badge"
                       value="{{ old('badge', $item->badge) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('badge')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Title --}}
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title</label>
                <input type="text" name="title" id="title" required
                       value="{{ old('title', $item->title) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">{{ old('description', $item->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Icon --}}
            <div class="mb-4">
                <label for="icon" class="block text-gray-700 font-semibold mb-2">Icon (FontAwesome class)</label>
                <input type="text" name="icon" id="icon"
                       placeholder="e.g., fa-solid fa-coffee"
                       value="{{ old('icon', $item->icon) }}"
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
                       value="{{ old('color', $item->color) }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-amber-500">
                @error('color')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Status --}}
            <div class="mb-6 flex items-center gap-2">
                <input type="checkbox" name="status" id="status" value="1" {{ $item->status ? 'checked' : '' }} class="h-4 w-4 text-amber-500 border-gray-300 rounded">
                <label for="status" class="text-gray-700 font-semibold">Active</label>
            </div>

            {{-- Submit Button --}}
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
