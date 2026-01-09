{{-- resources/views/admin/office-managers/edit.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-8 py-8">

    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Edit Office Manager
        </h1>
        <a href="{{ route('admin.office-managers.index') }}"
           class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700
                  text-white font-semibold rounded-lg shadow transition">
            ← Back to Managers
        </a>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <form action="{{ route('admin.office-managers.update', $officeManager) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name"
                       value="{{ old('name', $officeManager->name) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                @error('name')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Position --}}
            <div class="mb-6">
                <label for="position" class="block text-gray-700 font-semibold mb-2">Position</label>
                <input type="text" name="position" id="position"
                       value="{{ old('position', $officeManager->position) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                @error('position')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Gradient --}}
            <div class="mb-6">
                <label for="gradient" class="block text-gray-700 font-semibold mb-2">Gradient (Tailwind classes)</label>
                <input type="text" name="gradient" id="gradient"
                       value="{{ old('gradient', $officeManager->gradient) }}"
                       placeholder="e.g., from-green-500 to-teal-600"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                <span class="text-gray-500 text-sm">Optional: used as fallback background if no image.</span>
                @error('gradient')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Image --}}
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Profile Image</label>
                <input type="file" name="image" id="image"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                       accept="image/*">

                {{-- Image Preview --}}
                <div class="mt-4">
                    <span class="block text-gray-600 mb-2 font-medium">Current Image / Fallback:</span>
                    <div class="w-32 h-32 rounded-xl overflow-hidden relative">
                        @php
                            $imagePath = $officeManager->image && file_exists(public_path('storage/' . $officeManager->image))
                                         ? asset('storage/' . $officeManager->image)
                                         : null;

                            $initials = collect(explode(' ', $officeManager->name))
                                        ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                        ->implode('');
                        @endphp

                        @if($imagePath)
                            <img src="{{ $imagePath }}" alt="{{ $officeManager->name }}"
                                 class="w-full h-full object-cover rounded-xl">
                        @endif

                        {{-- Initials fallback --}}
                        <div class="absolute inset-0 flex items-center justify-center
                                    text-white font-bold text-xl
                                    bg-gradient-to-br {{ $officeManager->gradient ?? 'from-green-500 to-teal-600' }}
                                    rounded-xl">
                            {{ $initials }}
                        </div>
                    </div>
                </div>

                @error('image')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Order --}}
            <div class="mb-6">
                <label for="order" class="block text-gray-700 font-semibold mb-2">Order (priority)</label>
                <input type="number" name="order" id="order"
                       value="{{ old('order', $officeManager->order) }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                       min="1">
                @error('order')
                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                @enderror
            </div>

            {{-- Submit --}}
            <div class="flex justify-end space-x-4">
                <a href="{{ route('admin.office-managers.index') }}"
                   class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
                    Update Manager
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
