@extends('admin.layouts.app')

@section('title', 'View User')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Page Header --}}
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-gray-900">User Details</h1>
        <a href="{{ route('admin.users.index') }}"
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
           Back to Users
        </a>
    </div>

    {{-- User Card --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            @foreach($columns as $column)
                @if($column !== 'password') {{-- Don't display password --}}
                    <div class="flex flex-col">
                        <span class="text-gray-500 text-sm font-medium uppercase">{{ str_replace('_', ' ', $column) }}</span>
                        <span class="mt-1 text-gray-900 font-semibold">
                            {{ $user->$column ?? '-' }}
                        </span>
                    </div>
                @endif
            @endforeach

        </div>

        {{-- Actions --}}
        <div class="mt-6 flex space-x-2">
            <a href="{{ route('admin.users.edit', $user->id) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition duration-200">
               Edit
            </a>

            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded shadow hover:bg-red-600 transition duration-200">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
