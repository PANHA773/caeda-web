@extends('admin.layouts.app')

@section('title', 'Hero Carousel')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Hero Carousel Slides</h1>

    <a href="{{ route('admin.hero_carousels.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Add Slide</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Order</th>
                <th class="border px-4 py-2">Active</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($heroSlides as $slide)
                <tr>
                    <td class="border px-4 py-2">
                        @if($slide->image)
                            <img src="{{ $slide->image }}" alt="{{ $slide->title }}" class="w-24 h-16 object-cover rounded">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $slide->title }}</td>
                    <td class="border px-4 py-2">{{ $slide->order }}</td>
                    <td class="border px-4 py-2">{{ $slide->is_active ? 'Yes' : 'No' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.hero_carousels.edit', $slide) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('admin.hero_carousels.destroy', $slide) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Delete this slide?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
