@extends('admin.layouts.app')

@section('title', 'Create Project Overview')

@section('content')
<div class="max-w-5xl mx-auto">

    {{-- Page Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Create Project Overview
        </h1>

        <a href="{{ route('admin.project-overviews.index') }}"
           class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
            ← Back
        </a>
    </div>

    {{-- Card --}}
    <div class="bg-white shadow-lg rounded-2xl p-6 border border-gray-200">

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('admin.project-overviews.store') }}" method="POST">
            @csrf

            {{-- Title --}}
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Title <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="title"
                       value="{{ old('title') }}"
                       placeholder="Project-Based Learning"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            {{-- Description --}}
            <div class="mb-5">
                <label class="block font-semibold text-gray-700 mb-2">
                    Description <span class="text-red-500">*</span>
                </label>
                <textarea name="description"
                          rows="8"
                          placeholder="Describe the project overview..."
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-200 focus:border-blue-500">{{ old('description') }}</textarea>
            </div>

            {{-- Active --}}
            <div class="mb-6 flex items-center space-x-2">
                <input type="checkbox"
                       name="is_active"
                       id="is_active"
                       {{ old('is_active', true) ? 'checked' : '' }}
                       class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label for="is_active" class="text-gray-700 font-medium">
                    Active
                </label>
            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('admin.project-overviews.index') }}"
                   class="px-5 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400 transition">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow">
                    Save
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
