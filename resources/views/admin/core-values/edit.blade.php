@extends('admin.layouts.app')

@section('title', 'Edit Core Value - ' . $coreValue->name)

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="mb-8">
        <div class="flex items-center gap-3 mb-2">
            <a href="{{ route('admin.core-values.index') }}" 
               class="text-gray-500 hover:text-gray-700 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
            </a>
            <h1 class="text-3xl font-bold text-gray-900">Edit Core Value</h1>
        </div>
        <p class="text-gray-500">Update the details of "{{ $coreValue->name }}"</p>
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
                    <h2 class="text-lg font-semibold text-gray-900">Edit Value Information</h2>
                    <p class="text-sm text-gray-500">Update the details below</p>
                </div>
            </div>
        </div>

        {{-- Form Content --}}
        <form action="{{ route('admin.core-values.update', $coreValue->id) }}" 
              method="POST"
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

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                
                {{-- Left Column --}}
                <div class="space-y-6">
                    
                    {{-- Name Field --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Value Name *
                        </label>
                        <div class="relative">
                            <input type="text" 
                                   name="name" 
                                   id="name" 
                                   value="{{ old('name', $coreValue->name) }}"
                                   required
                                   class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                   placeholder="e.g., Integrity">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">The main title of your core value</p>
                    </div>

                    {{-- Order Field --}}
                    <div>
                        <label for="order" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                            </svg>
                            Display Order
                        </label>
                        <div class="relative w-32">
                            <input type="number" 
                                   name="order" 
                                   id="order" 
                                   value="{{ old('order', $coreValue->order) }}"
                                   class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                            <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500 mt-2">Lower numbers appear first in the list</p>
                    </div>

                </div>

                {{-- Right Column --}}
                <div class="space-y-6">
                    
                    {{-- Status Toggle --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Status
                        </label>
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <div class="p-2 {{ $coreValue->is_active ? 'bg-green-100' : 'bg-gray-100' }} rounded-lg">
                                    @if($coreValue->is_active)
                                        <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                    @else
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <label for="is_active" class="block text-sm font-medium text-gray-700">Active Status</label>
                                    <p class="text-xs text-gray-500">Active values will be displayed on the site</p>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" 
                                       name="is_active" 
                                       value="1" 
                                       id="is_active" 
                                       class="sr-only peer"
                                       {{ old('is_active', $coreValue->is_active) ? 'checked' : '' }}>
                                <div class="w-12 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-6 peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-green-500 peer-checked:to-emerald-600"></div>
                            </label>
                        </div>
                    </div>

                    {{-- Value ID --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                            Value Information
                        </label>
                        <div class="p-4 bg-gray-50 rounded-xl space-y-2">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Value ID:</span>
                                <span class="text-sm font-medium text-gray-900">{{ $coreValue->id }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Created:</span>
                                <span class="text-sm text-gray-900">{{ $coreValue->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Last Updated:</span>
                                <span class="text-sm text-gray-900">{{ $coreValue->updated_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- Description Field (Full Width) --}}
            <div class="mt-8">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    Description
                </label>
                <div class="relative">
                    <textarea name="description" 
                              id="description" 
                              rows="6"
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                              placeholder="Describe what this core value means to your organization...">{{ old('description', $coreValue->description) }}</textarea>
                    <div class="absolute right-3 top-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                        </svg>
                    </div>
                </div>
                <div class="flex justify-between items-center mt-2">
                    <p class="text-xs text-gray-500">Brief description of the core value</p>
                    <span id="charCount" class="text-xs text-gray-400">0/500 characters</span>
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
                        Delete Value
                    </button>
                </div>

                <div class="flex gap-4">
                    <a href="{{ route('admin.core-values.index') }}"
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
                        Update Value
                    </button>
                </div>
            </div>

        </form>
    </div>

</div>

{{-- Delete Confirmation Form --}}
<form id="deleteForm" 
      action="{{ route('admin.core-values.destroy', $coreValue->id) }}" 
      method="POST" 
      class="hidden">
    @csrf
    @method('DELETE')
</form>

{{-- Character Count Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const descriptionTextarea = document.getElementById('description');
        const charCount = document.getElementById('charCount');
        
        function updateCharCount() {
            const length = descriptionTextarea.value.length;
            charCount.textContent = `${length}/500 characters`;
            
            if (length > 500) {
                charCount.classList.remove('text-gray-400');
                charCount.classList.add('text-red-500');
            } else {
                charCount.classList.remove('text-red-500');
                charCount.classList.add('text-gray-400');
            }
        }
        
        // Initial count
        updateCharCount();
        
        // Update on input
        descriptionTextarea.addEventListener('input', updateCharCount);
        
        // Prevent typing beyond limit
        descriptionTextarea.addEventListener('keydown', function(e) {
            if (this.value.length >= 500 && 
                e.keyCode !== 8 && // backspace
                e.keyCode !== 46 && // delete
                e.keyCode !== 37 && // left arrow
                e.keyCode !== 38 && // up arrow
                e.keyCode !== 39 && // right arrow
                e.keyCode !== 40 && // down arrow
                !e.ctrlKey && !e.metaKey) {
                e.preventDefault();
            }
        });
    });

    function confirmDelete() {
        if (confirm('Are you sure you want to delete "{{ $coreValue->name }}"? This action cannot be undone.')) {
            document.getElementById('deleteForm').submit();
        }
    }
</script>

@endsection