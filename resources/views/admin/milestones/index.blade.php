@extends('admin.layouts.app')

@section('title', 'Milestones')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Milestones Timeline</h1>
            <p class="text-gray-500">Manage website journey & achievements</p>
        </div>
        <a href="{{ route('admin.milestones.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Milestone
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Table --}}
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Order</th>
                    <th class="px-6 py-4">Year</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Icon</th>
                    <th class="px-6 py-4">Achievements</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($milestones as $milestone)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">
                            {{ $milestone->order }}
                        </td>

                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold {{ $milestone->color }} bg-opacity-20">
                                {{ $milestone->year }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">
                                {{ $milestone->title }}
                            </div>
                            <div class="text-gray-500 text-xs line-clamp-2">
                                {{ $milestone->description }}
                            </div>
                        </td>

                        <td class="px-6 py-4 text-xl">
                            {{ $milestone->icon }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-wrap gap-1">
                                @foreach($milestone->achievements ?? [] as $achievement)
                                    <span class="px-2 py-1 bg-gray-100 rounded-full text-xs">
                                        {{ $achievement }}
                                    </span>
                                @endforeach
                            </div>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.milestones.edit', $milestone->id) }}"
                                   class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.milestones.destroy', $milestone->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this milestone?')">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No milestones found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
