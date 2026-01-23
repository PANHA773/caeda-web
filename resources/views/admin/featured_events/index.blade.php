@extends('admin.layouts.app')

@section('title', 'Featured Events')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Featured Events</h1>

    <a href="{{ route('admin.featured_events.create') }}"
       class="mb-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
       + Add Featured Event
    </a>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-3 text-left">Title</th>
                    <th class="border px-4 py-3 text-left">Start Date</th>
                    <th class="border px-4 py-3 text-left">End Date</th>
                    <th class="border px-4 py-3 text-left">Status</th>
                    <th class="border px-4 py-3 text-left">Speakers</th>
                    <th class="border px-4 py-3 text-left">Sessions</th>
                    <th class="border px-4 py-3 text-left">Attendees</th>
                    <th class="border px-4 py-3 text-left">Active</th>
                    <th class="border px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($featuredEvents as $event)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-3 font-medium">{{ $event->title }}</td>
                        <td class="border px-4 py-3">{{ $event->start_date->format('M d, Y') }}</td>
                        <td class="border px-4 py-3">{{ $event->end_date ? $event->end_date->format('M d, Y') : '-' }}</td>
                        <td class="border px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                @if($event->status == 'upcoming') bg-yellow-100 text-yellow-800
                                @elseif($event->status == 'active') bg-green-100 text-green-800
                                @else bg-gray-200 text-gray-800 @endif">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td class="border px-4 py-3 text-center">{{ $event->speakers_count }}</td>
                        <td class="border px-4 py-3 text-center">{{ $event->sessions_count }}</td>
                        <td class="border px-4 py-3 text-center">{{ $event->attendees_count }}</td>
                        <td class="border px-4 py-3 text-center">
                            @if($event->is_active)
                                <span class="text-green-600 font-semibold">Yes</span>
                            @else
                                <span class="text-red-600 font-semibold">No</span>
                            @endif
                        </td>
                        <td class="border px-4 py-3 text-center space-x-2">
                            <a href="{{ route('admin.featured_events.edit', $event) }}"
                               class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                            <form action="{{ route('admin.featured_events.destroy', $event) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-400">No featured events found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $featuredEvents->links() }} {{-- Pagination --}}
    </div>
</div>
@endsection
