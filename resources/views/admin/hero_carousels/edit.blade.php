@extends('admin.layouts.app')

@section('title', 'Edit Hero Slide')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Hero Slide</h1>

    <a href="{{ route('admin.hero_carousels.index') }}"
       class="mb-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">
        Back to List
    </a>

    {{-- ERROR MESSAGES --}}
    @if ($errors->any())
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- FORM --}}
    <form action="{{ route('admin.hero_carousels.update', $hero_carousel->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- TITLE --}}
        <div class="mb-4">
            <label class="block font-bold mb-1">Title (optional)</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $hero_carousel->title) }}"
                   class="w-full border px-3 py-2 rounded"
                   placeholder="Slide title">
        </div>

        {{-- CURRENT IMAGE PREVIEW --}}
        <div class="mb-4">
            <label class="block font-bold mb-2">Current Image</label>
            @if($hero_carousel->image)
                <img src="{{ asset('storage/' . $hero_carousel->image) }}" alt="Current Image" 
                     class="w-full max-w-2xl h-64 object-cover rounded-xl border-2 border-gray-300 shadow-sm">
            @else
                <div class="w-full max-w-2xl h-64 rounded-xl border-2 border-gray-300 bg-gray-100 flex items-center justify-center text-gray-400">
                    No Image Uploaded
                </div>
            @endif
        </div>

        {{-- IMAGE UPLOAD --}}
        <div class="mb-4">
            <label class="block font-bold mb-1">Change Hero Image</label>
            <input type="file"
                   name="image"
                   accept="image/*"
                   class="w-full border px-3 py-2 rounded">
            <p class="text-sm text-gray-500 mt-1">
                Leave blank to keep current image. Supported formats: JPG, PNG, WEBP (Max 2MB)
            </p>
        </div>

        {{-- ORDER --}}
        <div class="mb-4">
            <label class="block font-bold mb-1">Order</label>
            <input type="number"
                   name="order"
                   value="{{ old('order', $hero_carousel->order) }}"
                   class="w-full border px-3 py-2 rounded">
        </div>

        {{-- ACTIVE --}}
        <div class="mb-4 flex items-center">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   {{ old('is_active', $hero_carousel->is_active) ? 'checked' : '' }}
                   class="mr-2">
            <label class="font-bold">Active</label>
        </div>

        {{-- SUBMIT --}}
        <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded font-bold hover:bg-blue-600 transition">
            Update Slide
        </button>
    </form>
</div>
@endsection
