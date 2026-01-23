@extends('admin.layouts.app')

@section('title', 'Create Final CTA')

@section('content')
<div class="max-w-5xl mx-auto space-y-8">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Create Final CTA</h1>
        <p class="text-sm text-gray-500">
            Add a new Call To Action section for the homepage
        </p>
    </div>

    {{-- Form --}}
    <form action="{{ route('admin.final-cta.store') }}" method="POST"
          class="bg-white rounded-2xl shadow-sm border p-8 space-y-8">
        @csrf

        {{-- Stats --}}
        <div>
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Statistics</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="form-label">Stat 1 Number</label>
                    <input type="text" name="stat_1_number" class="form-input" placeholder="50K+" required>
                </div>
                <div>
                    <label class="form-label">Stat 1 Label</label>
                    <input type="text" name="stat_1_label" class="form-input" placeholder="Active Members" required>
                </div>

                <div>
                    <label class="form-label">Stat 2 Number</label>
                    <input type="text" name="stat_2_number" class="form-input" placeholder="500+" required>
                </div>
                <div>
                    <label class="form-label">Stat 2 Label</label>
                    <input type="text" name="stat_2_label" class="form-input" placeholder="Companies" required>
                </div>

                <div>
                    <label class="form-label">Stat 3 Number</label>
                    <input type="text" name="stat_3_number" class="form-input" placeholder="95%" required>
                </div>
                <div>
                    <label class="form-label">Stat 3 Label</label>
                    <input type="text" name="stat_3_label" class="form-input" placeholder="Success Rate" required>
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
                           placeholder="Ready to Transform Your Career?" required>
                </div>

                <div>
                    <label class="form-label">Highlight Text</label>
                    <input type="text" name="highlight_text" class="form-input"
                           placeholder="Career">
                    <p class="text-xs text-gray-400 mt-1">
                        This word will be highlighted in gradient
                    </p>
                </div>

                <div>
                    <label class="form-label">Description</label>
                    <textarea name="description" rows="3" class="form-input"
                              placeholder="Join our community of successful professionals today..."></textarea>
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
                           placeholder="Start 7-Day Free Trial" required>
                </div>

                <div>
                    <label class="form-label">Secondary Button Text</label>
                    <input type="text" name="secondary_button_text" class="form-input"
                           placeholder="Schedule a Demo" required>
                </div>
            </div>
        </div>

        {{-- Status --}}
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1"
                   class="w-5 h-5 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
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
                Save CTA
            </button>
        </div>
    </form>

</div>
@endsection
