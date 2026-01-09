@extends('admin.layouts.app')

@section('title', 'Add New User')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

    {{-- Page Header --}}
    <div class="mb-6 flex justify-between items-center">
        <h1 class="text-2xl font-semibold text-gray-900">Add New User</h1>
        <a href="{{ route('admin.users.index') }}"
           class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
           Back to Users
        </a>
    </div>

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded shadow">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white shadow-md rounded-lg p-6">
        <form action="{{ route('admin.users.store') }}" method="POST">
            @csrf

            {{-- Name --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                       required>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                       required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password"
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                       required>
            </div>

            {{-- Role (optional) --}}
            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                <select name="role" id="role"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                    <option value="">Select Role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                </select>
            </div>

            {{-- Submit Button --}}
            <div class="mt-6">
                <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                    Save User
                </button>
            </div>

        </form>
    </div>

</div>
@endsection
