@extends('admin.layouts.app')

@section('title', 'Staffs')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Page Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Staffs</h1>
            <a href="{{ route('admin.users.create') }}"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                + Create New Staff
            </a>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Table --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"
                                        class="w-10 h-10 rounded-lg object-cover border border-gray-200 shadow-sm">
                                    <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-center space-x-2">

                                {{-- View --}}
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-200">
                                    View
                                </a>
                                {{-- Edit --}}
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                    Edit
                                </a>

                                {{-- Delete --}}
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection