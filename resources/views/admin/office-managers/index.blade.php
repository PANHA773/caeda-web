{{-- resources/views/admin/office-managers/index.blade.php --}}
@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto px-4 md:px-8 py-8">

    {{-- Page Header --}}
    <div class="flex flex-col md:flex-row md:justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Office Managers
        </h1>
        <a href="{{ route('admin.office-managers.create') }}"
           class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700
                  text-white font-semibold rounded-lg shadow transition">
            + Add Manager
        </a>
    </div>

    {{-- Search --}}
    <form action="{{ route('admin.office-managers.index') }}" method="GET" class="mb-6">
        <input type="text" name="search" placeholder="Search by name or position..."
               value="{{ request('search') }}"
               class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
    </form>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Total Managers</span>
            <span class="text-2xl font-bold text-gray-900">{{ $totalManagers }}</span>
        </div>
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Senior Managers</span>
            <span class="text-2xl font-bold text-gray-900">{{ $seniorManagers }}</span>
        </div>
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Assistant Managers</span>
            <span class="text-2xl font-bold text-gray-900">{{ $assistantManagers }}</span>
        </div>
    </div>

    {{-- Managers Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        @foreach($managers as $index => $manager)
            @php
                $imagePath = $manager->image && file_exists(public_path('storage/' . $manager->image))
                             ? asset('storage/' . $manager->image)
                             : asset('images/placeholder.jpg');

                $initials = collect(explode(' ', $manager->name))
                            ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                            ->implode('');
            @endphp

            <div class="group relative bg-white/95 backdrop-blur-sm rounded-xl p-4 text-center
                        border border-gray-200/50 hover:shadow-lg
                        transition-all duration-300 hover:-translate-y-2 cursor-pointer">

                {{-- Image --}}
                <div class="w-28 h-28 rounded-xl overflow-hidden mx-auto mb-3 relative">
                    <img src="{{ $imagePath }}" alt="{{ $manager->name }}"
                         class="w-full h-full object-cover rounded-xl">

                    {{-- Initials overlay (behind image fallback) --}}
                    <div class="absolute inset-0 bg-gradient-to-br
                                {{ $manager->gradient ?? 'from-green-500 to-teal-600' }}
                                flex items-center justify-center
                                text-white font-semibold text-xl rounded-xl">
                        {{ $initials }}
                    </div>
                </div>

                {{-- Name & Position --}}
                <p class="text-gray-800 text-sm font-medium
                          group-hover:text-gray-900 transition-colors duration-300 leading-tight">
                    {{ $manager->name }}
                </p>
                <p class="text-gray-600 text-xs font-medium
                          group-hover:text-gray-700 transition-colors duration-300">
                    {{ $manager->position }}
                </p>

                {{-- Actions --}}
                <div class="flex justify-center mt-3 space-x-2">
                    <a href="{{ route('admin.office-managers.edit', $manager) }}"
                       class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.office-managers.destroy', $manager) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this manager?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Pagination --}}
    <div class="mt-8">
        {{ $managers->withQueryString()->links() }}
    </div>
</div>
@endsection
