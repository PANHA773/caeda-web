@extends('admin.layouts.app')

@section('title', 'Leadership Messages')

@section('content')
    <div class="p-6 bg-gray-50 min-h-screen">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
            <h1 class="text-2xl font-bold text-gray-800">Leadership Messages</h1>
            <a href="{{ route('admin.leadership.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-md">
                <i class="fas fa-plus mr-2"></i> Add New Message
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg shadow-sm border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white shadow rounded-xl overflow-hidden border border-gray-100">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-6 py-4 font-semibold uppercase text-sm">Image</th>
                        <th class="px-6 py-4 font-semibold uppercase text-sm">Name/Position</th>
                        <th class="px-6 py-4 font-semibold uppercase text-sm text-center">Status</th>
                        <th class="px-6 py-4 font-semibold uppercase text-sm text-center">Order</th>
                        <th class="px-6 py-4 font-semibold uppercase text-sm text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($leaderships as $leader)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                @if($leader->image)
                                    <img src="{{ asset('storage/' . $leader->image) }}"
                                        class="w-12 h-12 rounded-lg object-cover shadow-sm border border-gray-200">
                                @else
                                    <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-bold text-gray-800">{{ $leader->name }}</div>
                                <div class="text-sm text-gray-500">{{ $leader->position }}</div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($leader->is_active)
                                    <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-full">Active</span>
                                @else
                                    <span class="px-2 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-full">Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-center font-medium text-gray-600">
                                {{ $leader->order }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('admin.leadership.edit', $leader->id) }}"
                                        class="p-2 bg-blue-50 text-blue-600 rounded-lg hover:bg-blue-100 transition"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.leadership.destroy', $leader->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this message?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition"
                                            title="Delete">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                                <i class="fas fa-user-tie text-4xl mb-4 opacity-20"></i>
                                <p>No leadership messages found. Start by adding one!</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection