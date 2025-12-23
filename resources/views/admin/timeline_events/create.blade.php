@extends('admin.layouts.app')

@section('title', 'Add Timeline Event')

@section('content')
<div class="container mx-auto p-6 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Add Timeline Event</h1>

    <a href="{{ route('admin.timeline_events.index') }}"
       class="inline-block mb-6 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to Timeline Events
    </a>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.timeline_events.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title"
                   value="{{ old('title') }}"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Event title" required>
        </div>

        {{-- Date --}}
        <div>
            <label class="block font-semibold mb-1">Date</label>
            <input type="date" name="date"
                   value="{{ old('date') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border rounded px-3 py-2"
                      placeholder="Describe the event" required>{{ old('description') }}</textarea>
        </div>

        {{-- Status --}}
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="upcoming" {{ old('status') == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
            </select>
        </div>

        {{-- Icon --}}
        <div>
            <label class="block font-semibold mb-1">Icon (FontAwesome class)</label>
            <input type="text" name="icon"
                   value="{{ old('icon') }}"
                   class="w-full border rounded px-3 py-2"
                   placeholder="e.g., fas fa-calendar-check">
        </div>

        {{-- Sort Order --}}
        <div>
            <label class="block font-semibold mb-1">Sort Order</label>
            <input type="number" name="sort_order"
                   value="{{ old('sort_order', 0) }}"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Sort order (numeric)">
        </div>

        {{-- Active --}}
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="form-checkbox">
                <span class="font-semibold">Active</span>
            </label>
        </div>

        {{-- Submit --}}
        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Add Event
            </button>
        </div>
    </form>
</div>
@endsection
