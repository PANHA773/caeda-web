@extends('admin.layouts.app')

@section('title', 'Hero Achievements')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Hero Achievements</h1>
            <p class="text-gray-500">Manage key stats displayed on the hero section</p>
        </div>
        <a href="{{ route('admin.hero-achievements.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Achievement
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Achievements Table --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Order</th>
                    <th class="px-6 py-4">Icon</th>
                    <th class="px-6 py-4">Value</th>
                    <th class="px-6 py-4">Label</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($heroAchievements as $achievement)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">{{ $achievement->order }}</td>

                        <td class="px-6 py-4 text-2xl">
                            {!! $achievement->icon !!}
                        </td>

                        <td class="px-6 py-4 font-bold text-gray-800">{{ $achievement->value }}</td>

                        <td class="px-6 py-4 text-gray-700">{{ $achievement->label }}</td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.hero-achievements.edit', $achievement->id) }}" class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.hero-achievements.destroy', $achievement->id) }}" method="POST" onsubmit="return confirm('Delete this achievement?')">
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
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            No hero achievements found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    @if($heroAchievements->hasPages())
        <div class="mt-4 flex justify-end">
            {{ $heroAchievements->links('pagination::tailwind') }}
        </div>
    @endif

</div>
@endsection
