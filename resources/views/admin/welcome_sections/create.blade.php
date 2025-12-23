@extends('admin.layouts.app')

@section('title', 'Add Welcome Section')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add Welcome Section</h1>

    <a href="{{ route('admin.welcome_sections.index') }}" 
       class="mb-4 inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
       Back to List
    </a>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.welcome_sections.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf

        {{-- Title --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Description (multiple paragraphs) --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Description (Paragraphs)</label>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2 mb-2" placeholder="Paragraph 1">{{ old('description.0') }}</textarea>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2 mb-2" placeholder="Paragraph 2">{{ old('description.1') }}</textarea>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2" placeholder="Paragraph 3">{{ old('description.2') }}</textarea>
        </div>

        {{-- Signature --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Signature Name</label>
                <input type="text" name="signature_name" value="{{ old('signature_name') }}" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Signature Title</label>
                <input type="text" name="signature_title" value="{{ old('signature_title') }}" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Image --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Image URL</label>
            <input type="text" name="image" value="{{ old('image') }}" class="w-full border rounded px-3 py-2">
        </div>

        {{-- Badges --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Badges</label>
            <div class="space-y-2">
                @for($i = 0; $i < 3; $i++)
                <div class="flex gap-2">
                    <input type="text" name="badges[{{ $i }}][text]" placeholder="Badge Text" value="{{ old("badges.$i.text") }}" class="border rounded px-2 py-1 w-1/2">
                    <input type="color" name="badges[{{ $i }}][color]" value="{{ old("badges.$i.color", '#facc15') }}" class="border rounded px-2 py-1 w-1/2">
                </div>
                @endfor
            </div>
        </div>

        {{-- Stats --}}
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Stats</label>
            <div class="space-y-2">
                @for($i = 0; $i < 3; $i++)
                <div class="flex gap-2">
                    <input type="text" name="stats[{{ $i }}][number]" placeholder="Number" value="{{ old("stats.$i.number") }}" class="border rounded px-2 py-1 w-1/2">
                    <input type="text" name="stats[{{ $i }}][label]" placeholder="Label" value="{{ old("stats.$i.label") }}" class="border rounded px-2 py-1 w-1/2">
                </div>
                @endfor
            </div>
        </div>

        {{-- Active --}}
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="form-checkbox">
                <span class="text-gray-700 font-semibold">Active</span>
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
            Save Section
        </button>
    </form>
</div>
@endsection
