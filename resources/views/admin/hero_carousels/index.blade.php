@extends('admin.layouts.app')

@section('title', 'Hero Carousel')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Hero Carousel Slides</h1>

        <a href="{{ route('admin.hero_carousels.create') }}"
            class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
            Add Slide
        </a>

        {{-- SUCCESS MESSAGE --}}
        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Order</th>
                    <th class="border px-4 py-2">Active</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($heroSlides as $slide)
                    <tr class="text-center">
                        {{-- IMAGE --}}
                        <td class="border px-4 py-2">
                            @if($slide->image)
                                <img src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->title }}"
                                    class="w-32 h-20 object-cover rounded mx-auto shadow border-2 border-gray-300">
                            @else
                                <div class="w-32 h-20 rounded border-2 border-gray-300 bg-gray-100 flex items-center justify-center text-gray-400 text-xs mx-auto">
                                    No Image
                                </div>
                            @endif
                        </td>

                        {{-- TITLE --}}
                        <td class="border px-4 py-2">
                            {{ $slide->title ?? '-' }}
                        </td>

                        {{-- ORDER --}}
                        <td class="border px-4 py-2">
                            {{ $slide->order }}
                        </td>

                        {{-- ACTIVE --}}
                        <td class="border px-4 py-2">
                            @if($slide->is_active)
                                <span class="text-green-600 font-bold">Yes</span>
                            @else
                                <span class="text-red-500 font-bold">No</span>
                            @endif
                        </td>

                        {{-- ACTIONS --}}
                        <td class="border px-4 py-2">
                            <a href="{{ route('admin.hero_carousels.edit', $slide) }}"
                                class="text-blue-600 hover:underline mr-3">
                                Edit
                            </a>

                            <form action="{{ route('admin.hero_carousels.destroy', $slide) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('Delete this slide?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-600 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="border px-4 py-6 text-center text-gray-500">
                            No slides found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection