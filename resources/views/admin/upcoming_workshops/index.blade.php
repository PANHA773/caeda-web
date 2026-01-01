@extends('admin.layouts.app')

@section('title', 'Upcoming Workshops Management')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Upcoming Workshops</h1>
        <a href="{{ route('admin.upcoming_workshops.create') }}"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add Workshop
        </a>
    </div>

    {{-- Success / Error Messages --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Workshops Table --}}
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Thumbnail</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Instructor</th>
                    <th class="px-4 py-3">Instructor Image</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse($upcomingWorkshops as $index => $workshop)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>

                        {{-- Thumbnail --}}
                        <td class="px-4 py-3">
                            <img src="{{ $workshop->image ? asset('storage/'.$workshop->image) : 'https://via.placeholder.com/64' }}"
                                 alt="{{ $workshop->title }}"
                                 class="w-16 h-16 object-cover rounded-lg shadow">
                        </td>

                        {{-- Title --}}
                        <td class="px-4 py-3 font-medium">{{ $workshop->title }}</td>

                        {{-- Instructor --}}
                        <td class="px-4 py-3">{{ $workshop->instructor }}</td>

                        {{-- Instructor Image --}}
                        <td class="px-4 py-3">
                            <img src="{{ $workshop->instructor_image ? asset('storage/'.$workshop->instructor_image) : 'https://via.placeholder.com/48' }}"
                                 alt="{{ $workshop->instructor }}"
                                 class="w-12 h-12 object-cover rounded-full">
                        </td>

                        {{-- Date --}}
                        <td class="px-4 py-3">{{ $workshop->date ? $workshop->date->format('M d, Y') : '-' }}</td>

                        {{-- Status --}}
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                {{ $workshop->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                {{ $workshop->status ? 'Active' : 'Inactive' }}
                            </span>
                        </td>

                        {{-- Actions --}}
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('admin.upcoming_workshops.edit', $workshop->id) }}"
                               class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700 text-sm transition">
                                Edit
                            </a>

                            <form action="{{ route('admin.upcoming_workshops.destroy', $workshop->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this workshop?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700 text-sm transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">
                            No upcoming workshops found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection
