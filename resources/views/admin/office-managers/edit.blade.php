@extends('admin.layouts.app')

@section('title', 'Edit Office Manager - ' . $officeManager->name)

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.office-managers.index') }}"
               class="text-gray-500 hover:text-gray-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Edit Office Manager</h1>
        </div>
        <p class="text-gray-500">Update the details of "{{ $officeManager->name }}"</p>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

        {{-- Form Header --}}
        <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
            <div class="flex items-center gap-3">
                <div class="p-3 bg-gradient-to-r from-blue-500 to-indigo-600 rounded-xl">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Edit Manager Information</h2>
                    <p class="text-sm text-gray-500">Update the details below</p>
                </div>
            </div>
        </div>

        {{-- Form --}}
        <form action="{{ route('admin.office-managers.update', $officeManager) }}"
              method="POST"
              enctype="multipart/form-data"
              class="p-8">
            @csrf
            @method('PUT')

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl">
                    <div class="flex items-center gap-2 mb-2">
                        <svg class="w-5 h-5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h3 class="font-medium text-red-800">Please fix the following errors:</h3>
                    </div>
                    <ul class="list-disc pl-5 text-red-700 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Shared Form Fields --}}
            @include('admin.office-managers.form')

            {{-- Avatar Preview --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl flex flex-col items-center gap-4">
                <p class="text-gray-600 text-sm">Avatar Preview</p>
                <div class="w-24 h-24 rounded-2xl overflow-hidden shadow-lg flex items-center justify-center bg-gradient-to-br {{ $officeManager->gradient ?? 'from-blue-500 to-indigo-600' }} text-white text-xl font-bold">
                    <span id="avatarInitials">
                        @php
                            $initials = collect(explode(' ', $officeManager->name))
                                        ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                        ->implode('');
                        @endphp
                        {{ $initials ?: 'O' }}
                    </span>
                </div>
            </div>

            {{-- Manager Info --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl">
                <div class="flex items-center gap-3 mb-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-sm font-semibold text-gray-900">Manager Information</h3>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="p-3 bg-white rounded-lg">
                        <p class="text-xs text-gray-500">Manager ID</p>
                        <p class="text-sm font-medium text-gray-900">{{ $officeManager->id }}</p>
                    </div>

                    <div class="p-3 bg-white rounded-lg">
                        <p class="text-xs text-gray-500">Created</p>
                        <p class="text-sm text-gray-900">
                            {{ optional($officeManager->created_at)->format('M d, Y') }}
                        </p>
                    </div>

                    <div class="p-3 bg-white rounded-lg">
                        <p class="text-xs text-gray-500">Last Updated</p>
                        <p class="text-sm text-gray-900">
                            {{ optional($officeManager->updated_at)->format('M d, Y') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col sm:flex-row gap-4 justify-between">
                <button type="button"
                        onclick="confirmDelete(this)"
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition shadow-sm">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                    Delete Manager
                </button>

                <div class="flex gap-4">
                    <a href="{{ route('admin.office-managers.index') }}"
                       class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition">
                        Cancel
                    </a>

                    <button type="submit"
                            class="px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition shadow-sm">
                        Update Manager
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Delete Form --}}
<form id="deleteForm"
      action="{{ route('admin.office-managers.destroy', $officeManager) }}"
      method="POST" class="hidden">
    @csrf
    @method('DELETE')
</form>

{{-- Avatar Initials Script --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const nameInput = document.getElementById('name');
    const avatarInitials = document.getElementById('avatarInitials');

    if(nameInput && avatarInitials) {
        nameInput.addEventListener('input', function() {
            const initials = this.value
                .split(' ')
                .map(n => n.charAt(0).toUpperCase())
                .join('');
            avatarInitials.textContent = initials || 'O';
        });
    }
});

function confirmDelete(btn) {
    if (confirm('Are you sure you want to delete "{{ $officeManager->name }}"? This action cannot be undone.')) {
        btn.disabled = true;
        document.getElementById('deleteForm').submit();
    }
}
</script>

@endsection
