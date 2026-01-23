@extends('admin.layouts.app')

@section('title', 'Add Upcoming Workshop')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Upcoming Workshop</h1>
        <p class="text-gray-500">Fill out the details to add a new upcoming workshop</p>
    </div>

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.upcoming_workshops.store') }}" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Workshop Title</label>
            <input type="text" name="title" 
                   value="{{ old('title') }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2" 
                   placeholder="Enter workshop title" required>
        </div>

        {{-- Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date"
                   value="{{ old('date') }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2" required>
        </div>

        {{-- Instructor --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor Name</label>
            <input type="text" name="instructor"
                   value="{{ old('instructor') }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2" 
                   placeholder="Enter instructor name" required>
        </div>

        {{-- Workshop Image --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Workshop Thumbnail</label>
            <input type="file" name="image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*" required>
        </div>

        {{-- Instructor Image --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor Image</label>
            <input type="file" name="instructor_image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*" required>
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="status" value="1" {{ old('status', true) ? 'checked' : '' }}>
            <label class="text-sm text-gray-700">Active</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.upcoming_workshops.index') }}"
               class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Workshop
            </button>
        </div>

    </form>
</div>
@endsection
