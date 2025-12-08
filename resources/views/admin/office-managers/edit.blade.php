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
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-lg font-semibold text-gray-900">Edit Manager Information</h2>
                    <p class="text-sm text-gray-500">Update the details below</p>
                </div>
            </div>
        </div>

        {{-- Form Content --}}
        <form action="{{ route('admin.office-managers.update', $officeManager->id) }}" 
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
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

            @include('admin.office-managers.form')

            {{-- Manager Information --}}
            <div class="mt-8 p-4 bg-gray-50 rounded-xl">
                <div class="flex items-center gap-3 mb-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
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
                        <p class="text-sm text-gray-900">{{ $officeManager->created_at->format('M d, Y') }}</p>
                    </div>
                    <div class="p-3 bg-white rounded-lg">
                        <p class="text-xs text-gray-500">Last Updated</p>
                        <p class="text-sm text-gray-900">{{ $officeManager->updated_at->format('M d, Y') }}</p>
                    </div>
                </div>
            </div>

            {{-- Form Actions --}}
            <div class="mt-12 pt-8 border-t border-gray-200 flex flex-col sm:flex-row gap-4 justify-between">
                <div class="flex gap-4">
                    <button type="button"
                            onclick="confirmDelete()"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl hover:from-red-600 hover:to-red-700 transition shadow-sm hover:shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                        Delete Manager
                    </button>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('admin.office-managers.index') }}"
                       class="inline-flex items-center justify-center gap-2 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Cancel
                    </a>
                    
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white rounded-xl hover:from-blue-600 hover:to-indigo-700 transition shadow-sm hover:shadow">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Update Manager
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>

{{-- Delete Confirmation Form --}}
<form id="deleteForm" 
      action="{{ route('admin.office-managers.destroy', $officeManager->id) }}" 
      method="POST" 
      class="hidden">
    @csrf
    @method('DELETE')
</form>

{{-- Toast Notification Styles --}}
<style>
    .toast-enter {
        transform: translateX(100%);
        opacity: 0;
    }
    .toast-enter-active {
        transform: translateX(0);
        opacity: 1;
        transition: transform 0.3s ease-out, opacity 0.3s ease-out;
    }
    .toast-exit {
        transform: translateX(0);
        opacity: 1;
    }
    .toast-exit-active {
        transform: translateX(100%);
        opacity: 0;
        transition: transform 0.3s ease-in, opacity 0.3s ease-in;
    }
</style>

{{-- Script for Delete Confirmation --}}
<script>
    function confirmDelete() {
        if (confirm('Are you sure you want to delete "{{ $officeManager->name }}"? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }

    // Toast notification function
    function showToast(message) {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-gray-800 text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        toast.textContent = message;
        
        // Add to page
        document.body.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }

    // Listen for gradient changes if needed
    document.addEventListener('DOMContentLoaded', function() {
        const gradientInput = document.getElementById('gradient');
        if (gradientInput) {
            gradientInput.addEventListener('input', function() {
                // Update preview if needed
                const nameInput = document.getElementById('name');
                const previewInitial = document.querySelector('[id^="gradientPreview"] .initial-preview');
                if (previewInitial && nameInput) {
                    const initial = nameInput.value ? nameInput.value.charAt(0).toUpperCase() : 'O';
                    previewInitial.textContent = initial;
                }
            });

            const nameInput = document.getElementById('name');
            if (nameInput) {
                nameInput.addEventListener('input', function() {
                    // Update preview initial
                    const previewInitial = document.querySelector('[id^="gradientPreview"] .initial-preview');
                    if (previewInitial) {
                        const initial = this.value ? this.value.charAt(0).toUpperCase() : 'O';
                        previewInitial.textContent = initial;
                    }
                });
            }
        }
    });
</script>

@endsection