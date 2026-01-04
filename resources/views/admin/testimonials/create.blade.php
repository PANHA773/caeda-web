@extends('admin.layouts.app')

@section('content')
<div class="p-6 max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Add Testimonial
        </h1>

        <a href="{{ route('admin.testimonials.index') }}"
           class="text-gray-600 hover:text-gray-900">
            ← Back
        </a>
    </div>

    {{-- Form --}}
    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('admin.testimonials.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                        required
                    >
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Role --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Role / Position
                    </label>
                    <input
                        type="text"
                        name="role"
                        value="{{ old('role') }}"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                        required
                    >
                </div>

                {{-- Company --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Company
                    </label>
                    <input
                        type="text"
                        name="company"
                        value="{{ old('company') }}"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                {{-- Avatar URL --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Avatar URL
                    </label>
                    <input
                        type="url"
                        name="avatar"
                        value="{{ old('avatar') }}"
                        placeholder="https://example.com/avatar.jpg"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                {{-- Workshop --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Workshop Name
                    </label>
                    <input
                        type="text"
                        name="workshop"
                        value="{{ old('workshop') }}"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                {{-- Quote --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Testimonial Quote
                    </label>
                    <textarea
                        name="quote"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                        required
                    >{{ old('quote') }}</textarea>
                </div>

                {{-- Rating --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Rating
                    </label>
                    <select name="rating" class="w-full rounded-lg border-gray-300">
                        @for($i = 5; $i >= 1; $i--)
                            <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>
                                {{ $i }} Stars
                            </option>
                        @endfor
                    </select>
                </div>

                {{-- Status --}}
                <div class="flex items-center gap-3 mt-6">
                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        class="w-5 h-5 text-blue-600"
                        checked
                    >
                    <span class="text-gray-700 font-medium">
                        Active
                    </span>
                </div>

            </div>

            {{-- Actions --}}
            <div class="flex justify-end gap-4 mt-8">
                <a href="{{ route('admin.testimonials.index') }}"
                   class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow">
                    Save Testimonial
                </button>
            </div>
        </form>
    </div>

</div>
@endsection
