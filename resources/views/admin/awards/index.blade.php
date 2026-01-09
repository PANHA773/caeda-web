@extends('admin.layouts.app')

@section('title', 'Awards')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Awards</h1>
            <p class="text-gray-500">Manage website awards & recognitions</p>
        </div>
        <a href="{{ route('admin.awards.create') }}"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Award
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
                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Organization</th>
                    <th class="px-6 py-4">Year</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                @forelse($awards as $award)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">
                            {{ $loop->iteration + ($awards->currentPage()-1)*$awards->perPage() }}
                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800">{{ $award->title }}</td>
                        <td class="px-6 py-4 text-gray-600">{{ $award->organization }}</td>
                        <td class="px-6 py-4">{{ $award->year }}</td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                @if($award->category == 'international') bg-blue-100 text-blue-800
                                @elseif($award->category == 'innovation') bg-green-100 text-green-800
                                @elseif($award->category == 'education') bg-yellow-100 text-yellow-800
                                @elseif($award->category == 'research') bg-indigo-100 text-indigo-800
                                @else bg-gray-200 text-gray-800
                                @endif">
                                {{ ucfirst($award->category) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="{{ route('admin.awards.edit', $award->id) }}"
                                   class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.awards.destroy', $award->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Delete this award?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
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
                            No awards found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{-- Pagination --}}
        @if($awards->hasPages())
            <div class="mt-3 flex justify-end">
                {{ $awards->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
