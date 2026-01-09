@extends('admin.layouts.app')

@section('title', 'Edit Upcoming Workshop')

@section('content')
<div class="max-w-4xl mx-auto px-6 py-8">

    {{-- Header --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Workshop</h1>
        <p class="text-gray-500">Update workshop information</p>
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
    <form action="{{ route('admin.upcoming_workshops.update', $upcomingWorkshop->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title"
                   value="{{ old('title', $upcomingWorkshop->title) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Instructor --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor</label>
            <input type="text" name="instructor"
                   value="{{ old('instructor', $upcomingWorkshop->instructor) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Date --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date"
                   value="{{ old('date', $upcomingWorkshop->date) }}"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   required>
        </div>

        {{-- Thumbnail Preview --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Thumbnail</label>
            @if($upcomingWorkshop->image)
                <img src="{{ asset('storage/'.$upcomingWorkshop->image) }}"
                     class="w-48 h-28 object-cover rounded-lg border mb-3">
            @endif
        </div>

        {{-- Upload New Thumbnail --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Change Thumbnail</label>
            <input type="file" name="image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*">
        </div>

        {{-- Instructor Image Preview --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Current Instructor Image</label>
            @if($upcomingWorkshop->instructor_image)
                <img src="{{ asset('storage/'.$upcomingWorkshop->instructor_image) }}"
                     class="w-28 h-28 object-cover rounded-full border mb-3">
            @endif
        </div>

        {{-- Upload New Instructor Image --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Change Instructor Image</label>
            <input type="file" name="instructor_image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*">
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="status" value="1"
                   {{ old('status', $upcomingWorkshop->status) ? 'checked' : '' }}>
            <label class="text-sm text-gray-700">Active</label>
        </div>

        {{-- Buttons --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.upcoming_workshops.index') }}"
               class="px-4 py-2 border rounded-lg text-gray-700">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Update Workshop
            </button>
        </div>

    </form>
</div>
@endsection
