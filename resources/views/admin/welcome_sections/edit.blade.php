@extends('admin.layouts.app')

@section('title', 'Edit Welcome Section')

@section('content')
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Edit Welcome Section</h1>

    <a href="{{ route('admin.welcome_sections.index') }}"
       class="inline-block mb-6 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to List
    </a>

    {{-- Errors --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $descriptions = old('description', $section->description ?? []);
        $badges = old('badges', $section->badges ?? []);
        $stats = old('stats', $section->stats ?? []);
    @endphp

    <form action="{{ route('admin.welcome_sections.update', $section->id) }}"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 rounded-xl shadow">

        @csrf
        @method('PUT')

        {{-- Title --}}
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text"
                   name="title"
                   value="{{ old('title', $section->title) }}"
                   class="w-full border rounded px-3 py-2">
        </div>

        {{-- Description --}}
        <div>
            <label class="block font-semibold mb-2">Description (Paragraphs)</label>
            @for ($i = 0; $i < 3; $i++)
                <textarea name="description[]"
                          rows="3"
                          class="w-full border rounded px-3 py-2 mb-2"
                          placeholder="Paragraph {{ $i + 1 }}">{{ $descriptions[$i] ?? '' }}</textarea>
            @endfor
        </div>

        {{-- Signature --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Signature Name</label>
                <input type="text"
                       name="signature_name"
                       value="{{ old('signature_name', $section->signature_name) }}"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Signature Title</label>
                <input type="text"
                       name="signature_title"
                       value="{{ old('signature_title', $section->signature_title) }}"
                       class="w-full border rounded px-3 py-2">
            </div>
        </div>

        {{-- Current Image Preview --}}
        <div>
            <label class="block font-semibold mb-2">Current Image</label>
            @if($section->image)
                <img src="{{ asset('storage/' . $section->image) }}" 
                     alt="Current Image"
                     class="w-48 h-48 object-cover rounded-xl border-2 border-gray-300 mb-3">
            @else
                <div class="w-48 h-48 rounded-xl border-2 border-gray-300 mb-3 bg-gray-100 flex items-center justify-center text-gray-400">
                    No Image
                </div>
            @endif
        </div>

        {{-- Upload New Image --}}
        <div>
            <label class="block font-semibold mb-1">Change Image</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-gray-500 mt-1">Leave blank to keep current image. Supported formats: JPG, PNG, GIF (Max 2MB)</p>
        </div>

        {{-- Badges --}}
        <div>
            <label class="block font-semibold mb-2">Badges</label>
            <div class="space-y-2">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex gap-3">
                        <input type="text"
                               name="badges[{{ $i }}][text]"
                               placeholder="Badge Text"
                               value="{{ $badges[$i]['text'] ?? '' }}"
                               class="border rounded px-3 py-2 w-1/2">

                        <input type="color"
                               name="badges[{{ $i }}][color]"
                               value="{{ $badges[$i]['color'] ?? '#facc15' }}"
                               class="border rounded px-3 py-2 w-1/2">
                    </div>
                @endfor
            </div>
        </div>

        {{-- Stats --}}
        <div>
            <label class="block font-semibold mb-2">Stats</label>
            <div class="space-y-2">
                @for ($i = 0; $i < 3; $i++)
                    <div class="flex gap-3">
                        <input type="text"
                               name="stats[{{ $i }}][number]"
                               placeholder="Number"
                               value="{{ $stats[$i]['number'] ?? '' }}"
                               class="border rounded px-3 py-2 w-1/2">

                        <input type="text"
                               name="stats[{{ $i }}][label]"
                               placeholder="Label"
                               value="{{ $stats[$i]['label'] ?? '' }}"
                               class="border rounded px-3 py-2 w-1/2">
                    </div>
                @endfor
            </div>
        </div>

        {{-- Active --}}
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       {{ old('is_active', $section->is_active) ? 'checked' : '' }}
                       class="form-checkbox">
                <span class="font-semibold">Active</span>
            </label>
        </div>

        {{-- Submit --}}
        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Update Section
            </button>
        </div>
    </form>
</div>
@endsection
