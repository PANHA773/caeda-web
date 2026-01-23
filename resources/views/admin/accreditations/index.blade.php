@extends('admin.layouts.app')

@section('title', 'Accreditations')

@section('content')
<div class="container mx-auto px-4">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Accreditations
        </h1>

        <a href="{{ route('admin.accreditations.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Accreditation
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 border">#</th>
                    <th class="px-4 py-3 border">Title</th>
                    <th class="px-4 py-3 border">Type</th>
                    <th class="px-4 py-3 border">Status</th>
                    <th class="px-4 py-3 border text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($accreditations as $index => $accreditation)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border font-semibold">{{ $accreditation->title }}</td>
                        <td class="px-4 py-3 border text-gray-600">{{ ucfirst($accreditation->type) }}</td>
                        <td class="px-4 py-3 border">
                            @if($accreditation->is_active)
                                <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Active</span>
                            @else
                                <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Hidden</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 border text-center space-x-2">
                            <a href="{{ route('admin.accreditations.edit', $accreditation->id) }}"
                               class="inline-block bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.accreditations.destroy', $accreditation->id) }}"
                                  method="POST" class="inline-block"
                                  onsubmit="return confirm('Delete this accreditation?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            No accreditations found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
