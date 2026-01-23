@extends('admin.layouts.app')

@section('title', 'View Staff')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Page Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Staff Details</h1>
            <a href="{{ route('admin.users.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                Back to Users
            </a>
        </div>

        {{-- User Card --}}
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="md:flex">
                {{-- Profile Sidebar --}}
                <div class="md:w-1/3 bg-gray-50 p-8 border-r border-gray-100 flex flex-col items-center justify-center">
                    <div class="relative mb-4">
                        <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}"
                            class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg">
                        @if($user->is_admin)
                            <div
                                class="absolute -top-2 -right-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-lg border-2 border-white shadow-sm">
                                Admin
                            </div>
                        @endif
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 text-center">{{ $user->name }}</h2>
                    <p class="text-gray-500 text-sm">{{ $user->email }}</p>
                    <div
                        class="mt-4 px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wider">
                        {{ $user->is_admin ? 'Full Administrator' : 'Staff Member' }}
                    </div>
                </div>

                {{-- Details Area --}}
                <div class="md:w-2/3 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Account Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                        @foreach($columns as $column)
                            @if(!in_array($column, ['password', 'remember_token', 'avatar', 'is_admin', 'name', 'email']))
                                <div class="flex flex-col">
                                    <span
                                        class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1">{{ str_replace('_', ' ', $column) }}</span>
                                    <div class="text-gray-900 font-medium">
                                        @php $val = $user->$column; @endphp
                                        @if(is_array($val))
                                            <div class="flex flex-wrap gap-1 mt-1">
                                                @forelse($val as $p)
                                                    <span
                                                        class="bg-indigo-100 text-indigo-700 text-xs px-2 py-0.5 rounded-md font-semibold capitalize">{{ $p }}</span>
                                                @empty
                                                    <span class="text-gray-400 italic">No permissions assigned</span>
                                                @endforelse
                                            </div>
                                        @elseif(is_bool($val))
                                            {{ $val ? 'Yes' : 'No' }}
                                        @else
                                            {{ $val ?? '-' }}
                                        @endif
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
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