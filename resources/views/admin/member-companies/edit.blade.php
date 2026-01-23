@extends('admin.layouts.app')

@section('title', 'Edit Member Company')

@section('content')
<div class="max-w-3xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Edit Member Company</h1>
        <p class="text-gray-500 mt-1">Update the details of the company below.</p>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.member-companies.update', $memberCompany->id) }}" method="POST" class="bg-white p-6 rounded-2xl shadow-md border border-gray-200" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Name --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="name">Company Name <span class="text-red-500">*</span></label>
            <input type="text" name="name" id="name" value="{{ old('name', $memberCompany->name) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Logo --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="logo">Logo (Emoji / Text)</label>
            <input type="text" name="logo" id="logo" value="{{ old('logo', $memberCompany->logo) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('logo') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Members --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="members">Number of Members <span class="text-red-500">*</span></label>
            <input type="number" name="members" id="members" value="{{ old('members', $memberCompany->members) }}" min="1"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('members') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Industry --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="industry">Industry <span class="text-red-500">*</span></label>
            <input type="text" name="industry" id="industry" value="{{ old('industry', $memberCompany->industry) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('industry') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Color --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="color">Gradient Color (Tailwind Classes) <span class="text-gray-400 text-sm">(e.g. from-blue-500 to-cyan-500)</span></label>
            <input type="text" name="color" id="color" value="{{ old('color', $memberCompany->color) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('color') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Animation --}}
        <div class="mb-6">
            <label class="block text-gray-700 font-semibold mb-2" for="animation">Hover Animation <span class="text-gray-400 text-sm">(e.g. bounce, pulse, float, shake)</span></label>
            <input type="text" name="animation" id="animation" value="{{ old('animation', $memberCompany->animation) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            @error('animation') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        {{-- Submit --}}
        <div class="flex justify-end">
            <a href="{{ route('admin.member-companies.index') }}" class="px-6 py-2 border border-gray-300 rounded-lg mr-2 hover:bg-gray-100 transition">Cancel</a>
            <button type="submit" class="px-6 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 transition">Update Company</button>
        </div>
    </form>

</div>
@endsection
