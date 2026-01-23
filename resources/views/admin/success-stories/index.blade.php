@extends('admin.layouts.app')

@section('title', 'Success Stories')

@section('content')
    <div class="p-6">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Success Stories</h1>
                <p class="text-gray-500">Manage alumni achievements & website carousel</p>
            </div>
            <a href="{{ route('admin.success-stories.create') }}"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
                + Add Story
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- Stories Table --}}
        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Order</th>
                        <th class="px-6 py-4">Profile</th>
                        <th class="px-6 py-4">Role</th>
                        <th class="px-6 py-4">Achievement</th>
                        <th class="px-6 py-4">Year</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($successStories as $story)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 font-semibold">{{ $story->order }}</td>

                            <td class="px-6 py-4 flex items-center gap-3">
                                <img src="{{ $story->image_url }}" alt="{{ $story->name }}"
                                    class="w-12 h-12 rounded-full shadow-sm object-cover">
                                <span class="font-medium text-gray-800">{{ $story->name }}</span>
                            </td>

                            <td class="px-6 py-4">{{ $story->role }}</td>
                            <td class="px-6 py-4 line-clamp-2">{{ $story->achievement }}</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold">
                                    {{ $story->year }}
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.success-stories.edit', $story->id) }}"
                                        class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.success-stories.destroy', $story->id) }}" method="POST"
                                        onsubmit="return confirm('Delete this story?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                No success stories found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection