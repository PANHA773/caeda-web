@extends('admin.layouts.app')

@section('title', 'Add Member Company')

@section('content')
<div class="max-w-3xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Add New Member Company</h1>
        <p class="text-gray-500 mt-1">Fill in the details to add a new company to the community section.</p>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.member-companies.store') }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md border border-gray-200" enctype="multipart/form-data">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="name">Company Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Logo --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="logo">Logo (Emoji / Text)</label>
            <input type="text" name="logo" id="logo" value="{{ old('logo') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Members --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="members">Number of Members <span class="text-red-500">*</span></label>
            <input type="number" name="members" id="members" value="{{ old('members') }}" min="1"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('members') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Industry --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="industry">Industry <span class="text-red-500">*</span></label>
            <input type="text" name="industry" id="industry" value="{{ old('industry') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('industry') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Color --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="color">Gradient Color (Tailwind Classes) <span class="text-gray-400 text-sm">(e.g. from-blue-500 to-cyan-500)</span></label>
            <input type="text" name="color" id="color" value="{{ old('color') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('color') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Animation --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="animation">Hover Animation <span class="text-gray-400 text-sm">(e.g. bounce, pulse, float, shake)</span></label>
            <input type="text" name="animation" id="animation" value="{{ old('animation') }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('animation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.member-companies.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg mr-2 hover:bg-gray-100 transition">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Add Company</button>
        </div>
    </form>

</div>
@endsection
