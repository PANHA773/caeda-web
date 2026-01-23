@extends('admin.layouts.app')

@section('title', 'Create FAQ')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Create FAQ</h1>

        <a href="{{ route('admin.faqs.index') }}"
           class="text-sm text-gray-600 hover:text-gray-900">
            ← Back to FAQs
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('admin.faqs.store') }}" method="POST" class="space-y-6">
        @csrf

        {{-- Question --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Question <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="question"
                   value="{{ old('question') }}"
                   required
                   placeholder="Enter FAQ question"
                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
        </div>

        {{-- Answer --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Answer <span class="text-red-500">*</span>
            </label>
            <textarea name="answer"
                      rows="5"
                      required
                      placeholder="Enter FAQ answer"
                      class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">{{ old('answer') }}</textarea>
        </div>

        {{-- Status --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="is_active"
                    required
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                <option value="">-- Select Status --</option>
                <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        {{-- Submit --}}
        <div class="flex justify-end gap-3">
            <a href="{{ route('admin.faqs.index') }}"
               class="px-5 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                Save FAQ
            </button>
        </div>
    </form>

</div>
@endsection
