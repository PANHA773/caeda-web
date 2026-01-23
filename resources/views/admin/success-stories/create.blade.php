@extends('admin.layouts.app')

@section('title', 'Add Success Story')

@section('content')
    <div class="p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Add Success Story</h1>
                <p class="text-gray-500">Fill in details to showcase an alumni achievement</p>
            </div>
            <a href="{{ route('admin.success-stories.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
                ← Back
            </a>
        </div>

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <div class="bg-white rounded-xl shadow p-6">
            <form action="{{ route('admin.success-stories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    {{-- Role --}}
                    <div>
                        <label for="role" class="block text-gray-700 font-medium mb-1">Role / Position</label>
                        <input type="text" name="role" id="role" value="{{ old('role') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>
                    </div>

                    {{-- Achievement --}}
                    <div class="md:col-span-2">
                        <label for="achievement" class="block text-gray-700 font-medium mb-1">Achievement</label>
                        <textarea name="achievement" id="achievement" rows="3"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>{{ old('achievement') }}</textarea>
                    </div>

                    {{-- Image --}}
                    <div>
                        <label for="image" class="block text-gray-700 font-medium mb-1">Upload Photo</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        <p class="text-xs text-gray-500 mt-1">Recommended: Square image, Max 2MB</p>
                    </div>

                    {{-- Year --}}
                    <div>
                        <label for="year" class="block text-gray-700 font-medium mb-1">Year / Class</label>
                        <input type="text" name="year" id="year" value="{{ old('year') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    {{-- Quote --}}
                    <div class="md:col-span-2">
                        <label for="quote" class="block text-gray-700 font-medium mb-1">Quote / Testimonial</label>
                        <textarea name="quote" id="quote" rows="4"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            required>{{ old('quote') }}</textarea>
                    </div>

                    {{-- Order --}}
                    <div>
                        <label for="order" class="block text-gray-700 font-medium mb-1">Order</label>
                        <input type="number" name="order" id="order" value="{{ old('order', 1) }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            min="1">
                    </div>

                </div>

                {{-- Submit Button --}}
                <div class="mt-6 flex justify-end">
                    <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow">
                        Save Story
                    </button>
                </div>

            </form>
        </div>

    </div>
@endsection