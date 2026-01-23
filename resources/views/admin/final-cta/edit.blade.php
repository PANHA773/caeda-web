@extends('admin.layouts.app')

@section('title', 'Edit Final CTA')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Edit Final CTA</h1>
        <p class="text-sm text-gray-500">
            Update the Call To Action section displayed on the homepage
        </p>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.final-cta.update', $cta->id) }}" method="POST"
          class="bg-white rounded-2xl shadow-sm border p-8 space-y-8">
        @csrf
        @method('PUT')

        {{-- Stats --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="form-label">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-input"
                           value="{{ old('stat_1_number', $cta->stat_1_number) }}" required>
                </div>
                <div>
                    <label class="form-label">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-input"
                           value="{{ old('stat_1_label', $cta->stat_1_label) }}" required>
                </div>

                <div>
                    <label class="form-label">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-input"
                           value="{{ old('stat_2_number', $cta->stat_2_number) }}" required>
                </div>
                <div>
                    <label class="form-label">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-input"
                           value="{{ old('stat_2_label', $cta->stat_2_label) }}" required>
                </div>

                <div>
                    <label class="form-label">Stat 3 Number</label>
                    <input type="text" name="stat_3_number" class="form-input"
                           value="{{ old('stat_3_number', $cta->stat_3_number) }}" required>
                </div>
                <div>
                    <label class="form-label">Stat 3 Label</label>
                    <input type="text" name="stat_3_label" class="form-input"
                           value="{{ old('stat_3_label', $cta->stat_3_label) }}" required>
                </div>
            </div>
        </div>

        {{-- Content --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Content</h2>
            <div class="space-y-4">
                <div>
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-input"
                           value="{{ old('title', $cta->title) }}" required>
                </div>

                <div>
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight_text" class="form-input"
                           value="{{ old('highlight_text', $cta->highlight_text) }}">
                    <p class="text-xs text-gray-400 mt-1">
                        This word will be highlighted in gradient
                    </p>
                </div>

                <div>
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-input">{{ old('description', $cta->description) }}</textarea>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Buttons</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="form-label">Primary Button Text</label>
                    <input type="text" name="primary_button_text" class="form-input"
                           value="{{ old('primary_button_text', $cta->primary_button_text) }}" required>
                </div>

                <div>
                    <label class="form-label">Secondary Button Text</label>
                    <input type="text" name="secondary_button_text" class="form-input"
                           value="{{ old('secondary_button_text', $cta->secondary_button_text) }}" required>
                </div>
            </div>
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1"
                   class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
                   {{ old('is_active', $cta->is_active) ? 'checked' : '' }}>
            <span class="text-sm text-gray-700">Set as active CTA</span>
        </div>

        {{-- Actions --}}
        <div class="flex justify-end gap-3 pt-6 border-t">
            <a href="{{ route('admin.final-cta.index') }}"
               class="px-5 py-2.5 rounded-xl border text-gray-700 hover:bg-gray-100 transition">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow transition">
                Update CTA
            </button>
        </div>

    </form>
</div>
@endsection
