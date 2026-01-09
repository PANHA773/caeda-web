@extends('admin.layouts.app')

@section('title', 'Timeline Events')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Timeline Events</h1>
        <a href="{{ route('admin.timeline_events.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition">
            + Add Event
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow border">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Sort Order</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Active</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($events as $event)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-gray-800">{{ $event->title }}</td>
                        <td class="px-6 py-3 text-gray-600">{{ $event->date->format('M d, Y') }}</td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                {{ $event->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $event->status === 'active' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $event->status === 'upcoming' ? 'bg-gray-100 text-gray-800' : '' }}">
                                {{ ucfirst($event->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-3 text-gray-600">{{ $event->sort_order }}</td>
                        <td class="px-6 py-3 text-gray-600">{{ $event->is_active ? 'Yes' : 'No' }}</td>
                        <td class="px-6 py-3 flex gap-2">
                            <a href="{{ route('admin.timeline_events.edit', $event) }}"
                               class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.timeline_events.destroy', $event) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-500 hover:underline"
                                        onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
