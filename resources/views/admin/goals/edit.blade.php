@extends('admin.layouts.app')

@section('title', 'Edit Goal')

@section('content')
<div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    
    {{-- Page Header --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                    <a href="{{ route('admin.goals.index') }}" class="hover:text-blue-600 transition">Goals & Strategies</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-400">Edit Goal #{{ $goal->id }}</span>
                </nav>
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 font-english">Edit Goal</h1>
                        <p class="mt-1 text-sm text-gray-600">Update goal details for "{{ $goal->title }}"</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.goals.index') }}" class="mt-4 sm:mt-0 inline-flex items-center px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-50 text-gray-700 font-medium rounded-lg hover:from-gray-200 hover:to-gray-100 transition-all shadow-sm hover:shadow-md border border-gray-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to Goals
            </a>
        </div>
        
        {{-- Quick Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                <p class="text-sm font-medium text-gray-600">Created</p>
                <p class="text-lg font-semibold text-gray-900">{{ $goal->created_at->format('M d, Y') }}</p>
            </div>
            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                <p class="text-sm font-medium text-gray-600">Status</p>
                <div class="flex items-center">
                    @if($goal->is_active)
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        Active
                    </span>
                    @else
                    <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        Inactive
                    </span>
                    @endif
                </div>
            </div>
            <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                <p class="text-sm font-medium text-gray-600">Display Order</p>
                <p class="text-lg font-semibold text-gray-900">{{ $goal->order }}</p>
            </div>
            <div class="bg-gradient-to-r from-yellow-50 to-yellow-100 rounded-xl p-4 border border-yellow-200">
                <p class="text-sm font-medium text-gray-600">Last Updated</p>
                <p class="text-lg font-semibold text-gray-900">{{ $goal->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-white via-white to-gray-50 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            {{-- Form Header --}}
            <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100/30">
                <h2 class="text-xl font-semibold text-gray-800">Edit Goal Information</h2>
                <p class="text-sm text-gray-600 mt-1">Update the details below to modify this strategic goal</p>
            </div>
            
            {{-- Form Content --}}
            <form action="{{ route('admin.goals.update', $goal->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- Left Column --}}
                    <div class="space-y-6">
                        {{-- Title --}}
                        <div class="relative">
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Goal Title
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <div class="relative">
                                <input type="text" name="title" id="title" value="{{ old('title', $goal->title) }}"
                                       class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400"
                                       placeholder="Enter goal title" required>
                                <div class="absolute left-3 top-3 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
                                    </svg>
                                </div>
                            </div>
                            @error('title')
                                <div class="mt-2 flex items-center text-red-600 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div>
                            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Description
                            </label>
                            <textarea name="description" id="description" rows="5"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400"
                                      placeholder="Describe the goal in detail...">{{ old('description', $goal->description) }}</textarea>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-gray-500">Briefly describe what this goal aims to achieve</span>
                                <span class="text-xs text-gray-400" id="charCount">{{ strlen($goal->description) }} characters</span>
                            </div>
                            @error('description')
                                <div class="mt-2 flex items-center text-red-600 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="space-y-6">
                        {{-- Icon Selection --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Icon Selection
                            </label>
                            <div class="mb-3">
                                <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-lg border border-gray-200">
                                    <div id="iconPreview" class="h-12 w-12 flex items-center justify-center rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 border border-indigo-200 text-2xl">
                                        @if($goal->icon)
                                            <i class="{{ $goal->icon }} text-indigo-600"></i>
                                        @else
                                            <span class="text-gray-400">?</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Current Icon</p>
                                        <p class="text-xs text-gray-500">{{ $goal->icon ?: 'No icon set' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="text" name="icon" id="icon" value="{{ old('icon', $goal->icon) }}"
                                       class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400"
                                       placeholder="Enter icon class (e.g., fas fa-rocket)">
                                <div class="absolute left-3 top-3 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Use Font Awesome icon classes (e.g., fas fa-rocket, far fa-star, fab fa-react)</p>
                            @error('icon')
                                <div class="mt-2 flex items-center text-red-600 text-sm">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Order & Active Status --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Order --}}
                            <div>
                                <label for="order" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                                    </svg>
                                    Display Order
                                </label>
                                <div class="relative">
                                    <input type="number" name="order" id="order" value="{{ old('order', $goal->order) }}"
                                           class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400">
                                    <div class="absolute left-3 top-3 text-gray-400">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                    </div>
                                </div>
                                <p class="mt-2 text-xs text-gray-500">Lower numbers appear first</p>
                                @error('order')
                                    <div class="mt-2 flex items-center text-red-600 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Active Status --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Status
                                </label>
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg border border-gray-200">
                                    <div class="relative">
                                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $goal->is_active) ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-green-600 peer-checked:to-emerald-600"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900" id="statusText">{{ $goal->is_active ? 'Active' : 'Inactive' }}</span>
                                        <p class="text-xs text-gray-500">Visible to users</p>
                                    </div>
                                </div>
                                @error('is_active')
                                    <div class="mt-2 flex items-center text-red-600 text-sm">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Form Actions --}}
                <div class="mt-10 pt-8 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between space-y-4 sm:space-y-0">
                        <div class="text-sm text-gray-500">
                            <p>All required fields are marked with <span class="text-red-500">*</span></p>
                        </div>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.goals.index') }}" class="px-6 py-3 bg-gradient-to-r from-gray-100 to-gray-50 text-gray-700 font-medium rounded-lg hover:from-gray-200 hover:to-gray-100 transition-all shadow-sm hover:shadow-md border border-gray-200">
                                Cancel
                            </a>
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Goal
                            </button>
                            <a href="{{ route('admin.goals.create') }}" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all shadow-sm hover:shadow-md flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Add New
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        {{-- Danger Zone --}}
        <div class="mt-8 bg-gradient-to-br from-white via-white to-gray-50 rounded-2xl shadow-lg border border-red-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-red-200 bg-gradient-to-r from-red-50 to-red-100/30">
                <h2 class="text-xl font-semibold text-red-800">Danger Zone</h2>
                <p class="text-sm text-red-600 mt-1">Irreversible actions - proceed with caution</p>
            </div>
            <div class="p-8">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="mb-4 md:mb-0">
                        <h3 class="font-medium text-gray-900">Delete this goal</h3>
                        <p class="text-sm text-gray-600 mt-1">Once deleted, this goal cannot be recovered. All associated data will be permanently removed.</p>
                    </div>
                    <form action="{{ route('admin.goals.destroy', $goal->id) }}" method="POST" 
                          onsubmit="return confirm('⚠️ Are you absolutely sure? This will permanently delete the goal \'{{ $goal->title }}\' and cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-medium rounded-lg hover:from-red-700 hover:to-pink-700 transition-all shadow-sm hover:shadow-md flex items-center whitespace-nowrap">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Goal
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for description
    const description = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    
    if (description && charCount) {
        description.addEventListener('input', function() {
            charCount.textContent = this.value.length + ' characters';
        });
        // Initialize count with current value
        charCount.textContent = description.value.length + ' characters';
    }
    
    // Icon preview
    const iconInput = document.getElementById('icon');
    const iconPreview = document.getElementById('iconPreview');
    
    if (iconInput && iconPreview) {
        iconInput.addEventListener('input', function() {
            if (this.value.trim()) {
                iconPreview.innerHTML = `<i class="${this.value} text-indigo-600 text-2xl"></i>`;
            } else {
                iconPreview.innerHTML = '<span class="text-gray-400 text-2xl">?</span>';
            }
        });
    }
    
    // Status toggle text
    const statusToggle = document.getElementById('is_active');
    const statusText = document.getElementById('statusText');
    
    if (statusToggle && statusText) {
        statusToggle.addEventListener('change', function() {
            statusText.textContent = this.checked ? 'Active' : 'Inactive';
        });
    }
});
</script>

<style>
/* Custom checkbox/toggle styles */
input[type="checkbox"]:checked ~ div {
    background-color: #059669;
}
</style>
@endsection