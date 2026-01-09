@extends('admin.layouts.app')

@section('title', 'Welcome Sections')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Welcome Sections</h1>

    <a href="{{ route('admin.welcome_sections.create') }}" 
       class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
       Add Section
    </a>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow border">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Title</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Description</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Signature</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Image</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Badges</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Stats</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Active</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($sections as $section)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $section->title }}</td>
                    <td class="px-4 py-2 max-w-xs truncate">{{ is_array($section->description) ? implode(' ', $section->description) : $section->description }}</td>
                    <td class="px-4 py-2">
                        <div class="text-gray-900 font-semibold">{{ $section->signature_name }}</div>
                        <div class="text-gray-600 text-sm">{{ $section->signature_title }}</div>
                    </td>
                    <td class="px-4 py-2">
                        @if($section->image)
                            <img src="{{ $section->image }}" alt="Image" class="w-24 h-24 object-cover rounded-xl border">
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($section->badges)
                            @foreach($section->badges as $badge)
                                <span class="inline-block px-2 py-1 text-xs font-bold rounded-full mb-1"
                                      style="background-color: {{ $badge['color'] ?? '#ddd' }}; color: white;">
                                    {{ $badge['text'] }}
                                </span>
                            @endforeach
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if($section->stats)
                            <ul class="space-y-1 text-sm">
                                @foreach($section->stats as $stat)
                                    <li>
                                        <span class="font-bold">{{ $stat['number'] }}</span> - {{ $stat['label'] }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="px-4 py-2">{{ $section->is_active ? 'Yes' : 'No' }}</td>
                    <td class="px-4 py-2 space-x-2">
                        <a href="{{ route('admin.welcome_sections.edit', $section) }}" 
                           class="text-blue-500 hover:underline">Edit</a>
                        <form action="{{ route('admin.welcome_sections.destroy', $section) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Delete this section?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
