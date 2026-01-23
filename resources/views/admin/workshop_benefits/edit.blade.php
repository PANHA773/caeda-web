@extends('admin.layouts.app')

@section('title', 'Edit Workshop Benefit')

@section('content')

<div class="max-w-3xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Workshop Benefit</h1>
        <p class="text-gray-500">Update benefit information</p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form
        action="{{ route('admin.workshop_benefits.update', $benefit) }}"
        method="POST"
        class="bg-white shadow rounded-xl p-6 space-y-6"
    >
        @csrf
        @method('PUT')

        {{-- Icon --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Icon (Emoji)
            </label>
            <input type="text"
                   name="icon"
                   value="{{ old('icon', $benefit->icon) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   placeholder="🎯 📚 🤝 📜">
            <p class="text-xs text-gray-500 mt-1">
                Optional. Use a single emoji.
            </p>
        </div>

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Title <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $benefit->title) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">
                Description
            </label>
            <textarea name="description"
                      rows="4"
                      class="w-full mt-1 border rounded-lg px-4 py-2"
                      placeholder="Describe the benefit...">{{ old('description', $benefit->description) }}</textarea>
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox"
                   name="status"
                   value="1"
                   {{ old('status', $benefit->status) ? 'checked' : '' }}>
            <label class="text-sm text-gray-700">Active</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.workshop_benefits.index') }}"
               class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Benefit
            </button>
        </div>

    </form>

</div>

@endsection
