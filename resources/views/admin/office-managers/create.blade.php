{{-- resources/views/admin/office-managers/create.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-8 py-8">

    {{-- Page Header --}}
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Add New Manager
        </h1>
        <a href="{{ route('admin.office-managers.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700
                  text-white font-semibold rounded-lg shadow transition">
            ← Back
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-100 border border-red-300 rounded-lg">
            <ul class="list-disc pl-5 text-red-700">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-10">
        <form action="{{ route('admin.office-managers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Name --}}
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-medium mb-2">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            {{-- Position --}}
            <div class="mb-6">
                <label for="position" class="block text-gray-700 font-medium mb-2">Position <span class="text-red-500">*</span></label>
                <input type="text" name="position" id="position" value="{{ old('position') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
            </div>

            {{-- Image --}}
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-medium mb-2">Image</label>
                <input type="file" name="image" id="image" accept="image/*"
                       class="w-full text-gray-700 border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-400">
                <p class="text-xs text-gray-500 mt-1">Optional. Max size: 2MB. Formats: JPG, PNG, WebP.</p>
            </div>

            {{-- Gradient --}}
            <div class="mb-6">
                <label for="gradient" class="block text-gray-700 font-medium mb-2">Gradient Background</label>
                <input type="text" name="gradient" id="gradient" value="{{ old('gradient') }}"
                       placeholder="from-green-500 to-teal-600"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                <p class="text-xs text-gray-500 mt-1">Optional. Use Tailwind gradient classes for initials fallback.</p>
            </div>

            {{-- Order --}}
            <div class="mb-6">
                <label for="order" class="block text-gray-700 font-medium mb-2">Order</label>
                <input type="number" name="order" id="order" value="{{ old('order') }}"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                       min="1">
                <p class="text-xs text-gray-500 mt-1">Optional. Lower number = higher priority.</p>
            </div>

            {{-- Submit --}}
            <div class="mt-8">
                <button type="submit"
                        class="w-full md:w-auto px-6 py-3 bg-green-600 hover:bg-green-700
                               text-white font-semibold rounded-lg shadow transition">
                    Save Manager
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
