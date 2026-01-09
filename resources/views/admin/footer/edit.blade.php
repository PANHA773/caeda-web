@extends('admin.layouts.app')

@section('title', 'Edit Footer')

@section('content')
<div class="p-6 bg-gray-50 min-h-screen">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Edit Footer</h1>
        <a href="{{ route('admin.footer.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
            Back to Footer Settings
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Edit Form --}}
    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- Logo --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Logo</label>
                <input type="text" name="logo" value="{{ old('logo', $footer->logo) }}"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Tagline --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Tagline</label>
                <input type="text" name="tagline" value="{{ old('tagline', $footer->tagline) }}"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                @error('tagline') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('description', $footer->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Social Links --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Social Links (JSON format)</label>
                <textarea name="social_links" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('social_links', json_encode($footer->social_links, JSON_PRETTY_PRINT)) }}</textarea>
                <p class="text-gray-500 text-sm mt-1">Example: {"facebook":"https://fb.com","twitter":"https://twitter.com"}</p>
                @error('social_links') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Quick Links --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Quick Links (JSON format)</label>
                <textarea name="quick_links" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('quick_links', json_encode($footer->quick_links, JSON_PRETTY_PRINT)) }}</textarea>
                <p class="text-gray-500 text-sm mt-1">Example: [{"name":"Home","route":"home"},{"name":"Courses","route":"courses"}]</p>
                @error('quick_links') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Contact Info --}}
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Contact Info (JSON format)</label>
                <textarea name="contact_info" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">{{ old('contact_info', json_encode($footer->contact_info, JSON_PRETTY_PRINT)) }}</textarea>
                <p class="text-gray-500 text-sm mt-1">Example: {"address":"123 Street","phone":"(01) 800 433 633","email":"info@example.com"}</p>
                @error('contact_info') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            {{-- Submit --}}
            <div class="mt-6">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Update Footer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
