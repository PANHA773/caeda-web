@extends('admin.layouts.app')

@section('title', 'Add Workshop Benefit')

@section('content')

<div class="max-w-4xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Add Workshop Benefit
        </h1>
        <p class="text-gray-500">
            Create a new benefit for PSBU-Workshop
        </p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.workshop_benefits.store') }}"
          method="POST"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        @csrf

        {{-- Icon --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Icon (Emoji)
            </label>
            <input type="text"
                   name="icon"
                   value="{{ old('icon') }}"
                   placeholder="🎯"
                   class="w-full border rounded-lg px-4 py-2 text-2xl"
                   required>
            <p class="text-xs text-gray-500 mt-1">
                Example: 🎯 📚 🤝 📜
            </p>
        </div>

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Title
            </label>
            <input type="text"
                   name="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea name="description"
                      rows="4"
                      class="w-full border rounded-lg px-4 py-2"
                      required>{{ old('description') }}</textarea>
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox"
                   name="status"
                   value="1"
                   checked
                   class="rounded border-gray-300">
            <label class="text-sm text-gray-700">
                Active
            </label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.workshop_benefits.index') }}"
               class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 transition">
                Save Benefit
            </button>
        </div>

    </form>

</div>

@endsection
