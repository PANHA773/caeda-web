@extends('admin.layouts.app')

@section('title', 'Create Milestone')

@section('content')
<div class="p-6 max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Create Milestone</h1>
        <p class="text-gray-500">Add a new milestone to the timeline</p>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.milestones.store') }}" method="POST"
          class="bg-white rounded-xl shadow p-6 space-y-6">
        @csrf

        {{-- Year + Order --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Year</label>
                <input type="text" name="year" value="{{ old('year') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="2024">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Order</label>
                <input type="number" name="order" value="{{ old('order', 0) }}"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>

        {{-- Title --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}"
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="Global Innovation Award">
        </div>

        {{-- Description --}}
        <div>
            <label class="block text-sm font-semibold mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                      placeholder="Describe this milestone...">{{ old('description') }}</textarea>
        </div>

        {{-- Icon + Color --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Icon (Emoji)</label>
                <input type="text" name="icon" value="{{ old('icon') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="🚀">
                <p class="text-xs text-gray-500 mt-1">Example: 🚀 ⭐ 🎓 🏛️</p>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Color (Tailwind Class)</label>
                <input type="text" name="color" value="{{ old('color') }}"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="bg-gradient-to-br from-blue-500 to-cyan-500">
            </div>
        </div>

        {{-- Achievements --}}
        <div>
            <label class="block text-sm font-semibold mb-1">
                Achievements
                <span class="text-xs text-gray-500">(One per line)</span>
            </label>
            <textarea name="achievements[]" rows="3"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                      placeholder="AI Research Excellence
Digital Transformation Leader"></textarea>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.milestones.index') }}"
               class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white shadow">
                Save Milestone
            </button>
        </div>
    </form>
</div>
@endsection
