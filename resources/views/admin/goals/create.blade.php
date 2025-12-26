@extends('admin.layouts.app')

@section('title', 'Add New Goal')

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
                    <span class="text-gray-400">Add New Goal</span>
                </nav>
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 font-english">Add New Goal</h1>
                        <p class="mt-1 text-sm text-gray-600">Create a new strategic goal for your organization</p>
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
        
        {{-- Progress Steps --}}
        <div class="mb-8">
            <div class="flex items-center justify-center">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold">
                        1
                    </div>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-600 to-indigo-600"></div>
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-semibold">
                        2
                    </div>
                    <div class="w-20 h-1 bg-gray-200"></div>
                    <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-200 text-gray-500 font-semibold">
                        3
                    </div>
                </div>
            </div>
            <div class="flex justify-center mt-2 text-sm text-gray-600">
                <span class="w-28 text-center">Basic Info</span>
                <span class="w-28 text-center">Details</span>
                <span class="w-28 text-center">Review</span>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-white via-white to-gray-50 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            {{-- Form Header --}}
            <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100/30">
                <h2 class="text-xl font-semibold text-gray-800">Goal Information</h2>
                <p class="text-sm text-gray-600 mt-1">Fill in the details below to create a new strategic goal</p>
            </div>
            
            {{-- Form Content --}}
            <form action="{{ route('admin.goals.store') }}" method="POST" class="p-8">
                @csrf
                
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
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
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
                                      placeholder="Describe the goal in detail...">{{ old('description') }}</textarea>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-gray-500">Briefly describe what this goal aims to achieve</span>
                                <span class="text-xs text-gray-400" id="charCount">0 characters</span>
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
                                        @if(old('icon'))
                                            <i class="{{ old('icon') }} text-indigo-600"></i>
                                        @else
                                            <span class="text-gray-400">?</span>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Icon Preview</p>
                                        <p class="text-xs text-gray-500">Will appear in lists and cards</p>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="text" name="icon" id="icon" value="{{ old('icon') }}"
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
                                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}"
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
                                        <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                                        <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-green-600 peer-checked:to-emerald-600"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900" id="statusText">Active</span>
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
                            <button type="submit" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 transition-all shadow-lg hover:shadow-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Create Goal
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        {{-- Tips Section --}}
        <div class="mt-6 p-6 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
            <div class="flex items-start">
                <div class="p-2 rounded-lg bg-blue-100 mr-4">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h4 class="font-semibold text-gray-900 mb-1">Tips for creating effective goals</h4>
                    <ul class="text-sm text-gray-600 space-y-1">
                        <li>• Make titles clear and action-oriented</li>
                        <li>• Use specific, measurable descriptions</li>
                        <li>• Assign meaningful order numbers for proper sequencing</li>
                        <li>• Keep goals active only when they're relevant</li>
                    </ul>
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
        // Initialize count
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