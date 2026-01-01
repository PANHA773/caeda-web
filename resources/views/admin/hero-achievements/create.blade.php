@extends('admin.layouts.app')

@section('title', 'Add Hero Achievement')

@section('content')
<div class="p-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Add Hero Achievement</h1>
            <p class="text-gray-500">Create a new achievement for the Hero section</p>
        </div>
        <a href="{{ route('admin.hero-achievements.index') }}"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow">
            Back to List
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.hero-achievements.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Title --}}
                <div>
                    <label for="title" class="block font-semibold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="{{ old('title') }}" required>
                </div>

                {{-- Value --}}
                <div>
                    <label for="value" class="block font-semibold text-gray-700 mb-2">Value</label>
                    <input type="text" name="value" id="value"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="{{ old('value') }}" required>
                </div>

                {{-- Icon --}}
                <div>
                    <label for="icon" class="block font-semibold text-gray-700 mb-2">Icon (Emoji or FontAwesome)</label>
                    <input type="text" name="icon" id="icon"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="{{ old('icon') }}">
                    <small class="text-gray-400 text-xs">Use an emoji or FontAwesome class, e.g., 🏆</small>
                </div>

                {{-- Order --}}
                <div>
                    <label for="order" class="block font-semibold text-gray-700 mb-2">Order</label>
                    <input type="number" name="order" id="order"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="{{ old('order', 1) }}" min="1">
                </div>

            </div>

            {{-- Submit Button --}}
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow">
                    <i class="fas fa-plus mr-2"></i> Add Achievement
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
