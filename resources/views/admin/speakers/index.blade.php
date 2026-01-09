@extends('admin.layouts.app')

@section('title', 'Speakers')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Speakers</h1>

    <a href="{{ route('admin.speakers.create') }}" class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Add Speaker</a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Topic</th>
                <th class="border px-4 py-2">Active</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($speakers as $speaker)
                <tr>
                    <td class="border px-4 py-2">
                        @if($speaker->image)
                            <img src="{{ $speaker->image }}" alt="{{ $speaker->name }}" class="w-16 h-16 object-cover rounded-full">
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $speaker->name }}</td>
                    <td class="border px-4 py-2">{{ $speaker->title }}</td>
                    <td class="border px-4 py-2">{{ $speaker->topic }}</td>
                    <td class="border px-4 py-2">{{ $speaker->is_active ? 'Yes' : 'No' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('admin.speakers.edit', $speaker) }}" class="text-blue-500 mr-2">Edit</a>
                        <form action="{{ route('admin.speakers.destroy', $speaker) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Delete this speaker?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
