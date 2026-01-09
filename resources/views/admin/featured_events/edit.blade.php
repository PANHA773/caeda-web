@extends('admin.layouts.app')

@section('title', 'Edit Featured Event')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Featured Event</h1>

    <a href="{{ route('admin.featured_events.index') }}"
       class="mb-6 inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">
       ← Back to Featured Events
    </a>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow p-6">
        <form action="{{ route('admin.featured_events.update', $featuredEvent) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" id="title"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                       value="{{ old('title', $featuredEvent->title) }}" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ old('start_date', $featuredEvent->start_date->format('Y-m-d')) }}" required>
                </div>
                <div>
                    <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ old('end_date', $featuredEvent->end_date ? $featuredEvent->end_date->format('Y-m-d') : '') }}">
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                          required>{{ old('description', $featuredEvent->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                    <select name="status" id="status"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            required>
                        <option value="upcoming" {{ old('status', $featuredEvent->status) == 'upcoming' ? 'selected' : '' }}>Upcoming</option>
                        <option value="active" {{ old('status', $featuredEvent->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status', $featuredEvent->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>
                <div>
                    <label for="is_active" class="block text-gray-700 font-medium mb-2">Active</label>
                    <select name="is_active" id="is_active"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="1" {{ old('is_active', $featuredEvent->is_active) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_active', $featuredEvent->is_active) == 0 ? 'selected' : '' }}>No</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="speakers_count" class="block text-gray-700 font-medium mb-2">Speakers</label>
                    <input type="number" name="speakers_count" id="speakers_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ old('speakers_count', $featuredEvent->speakers_count) }}">
                </div>
                <div>
                    <label for="sessions_count" class="block text-gray-700 font-medium mb-2">Sessions</label>
                    <input type="number" name="sessions_count" id="sessions_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ old('sessions_count', $featuredEvent->sessions_count) }}">
                </div>
                <div>
                    <label for="attendees_count" class="block text-gray-700 font-medium mb-2">Attendees</label>
                    <input type="number" name="attendees_count" id="attendees_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="{{ old('attendees_count', $featuredEvent->attendees_count) }}">
                </div>
            </div>

            <div class="mb-6">
                <label for="icon" class="block text-gray-700 font-medium mb-2">Icon (FontAwesome class)</label>
                <input type="text" name="icon" id="icon"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                       value="{{ old('icon', $featuredEvent->icon) }}">
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg shadow transition">
                Update Featured Event
            </button>
        </form>
    </div>
</div>
@endsection
