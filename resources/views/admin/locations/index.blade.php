@extends('admin.layouts.app')

@section('title', 'Locations & Hours')

@section('content')
<div class="container mx-auto py-10">

    {{-- Page Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Locations & Hours</h1>
        <a href="{{ route('admin.locations.create') }}"
           class="px-4 py-2 bg-amber-500 text-white rounded-lg shadow hover:bg-amber-600 transition">
           + Add New Location
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($locations as $location)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $location->title }}</td>
                        <td class="px-6 py-4">{!! Str::limit($location->description, 50) !!}</td>
                        <td class="px-6 py-4">
                            <i class="{{ $location->icon }}"></i> {{ $location->icon }}
                        </td>
                        <td class="px-6 py-4">{{ $location->order ?? '-' }}</td>
                        <td class="px-6 py-4">
                            @if($location->status)
                                <span class="px-2 py-1 bg-green-500 text-white rounded-full text-xs">Active</span>
                            @else
                                <span class="px-2 py-1 bg-red-500 text-white rounded-full text-xs">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.locations.edit', $location->id) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>

                            <form action="{{ route('admin.locations.destroy', $location->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this location?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No locations found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
