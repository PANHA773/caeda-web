@extends('admin.layouts.app')

@section('title', 'Why Choose Us')

@section('content')
<div class="container mx-auto py-10">

    {{-- Page Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Why Choose Us</h1>
        <a href="{{ route('admin.why_choose_us.create') }}"
           class="px-4 py-2 bg-amber-500 text-white rounded-lg shadow hover:bg-amber-600 transition">
           + Add New
        </a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Badge</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Color</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($items as $item)
                    <tr>
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $item->badge ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $item->title }}</td>
                        <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit($item->description, 50, '...') }}</td>
                        <td class="px-6 py-4">
                            @if($item->icon)
                                <i class="{{ $item->icon }}"></i> {{ $item->icon }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if($item->color)
                                <span class="inline-block w-6 h-6 rounded-full mr-2" style="background: {{ $item->color }}"></span>
                                {{ $item->color }}
                            @else
                                -
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center">
                            @if($item->status)
                                <span class="px-2 py-1 bg-green-100 text-green-700 rounded-full text-xs">Active</span>
                            @else
                                <span class="px-2 py-1 bg-gray-100 text-gray-500 rounded-full text-xs">Inactive</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">

                            {{-- Edit --}}
                            <a href="{{ route('admin.why_choose_us.edit', $item->id) }}"
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.why_choose_us.destroy', $item->id) }}" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this item?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-6 py-4 text-center text-gray-500">
                            No items found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
