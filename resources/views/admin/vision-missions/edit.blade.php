@extends('admin.layouts.app')

@section('title', 'Edit Vision/Mission')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    
    {{-- Page Header --}}
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6">
            <div>
                <nav class="flex items-center space-x-2 text-sm text-gray-500 mb-3">
                    <a href="{{ route('admin.vision-missions.index') }}" class="hover:text-blue-600 transition">Vision & Missions</a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-gray-400">Edit #{{ $visionMission->id }}</span>
                </nav>
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900 font-english">Edit Vision/Mission</h1>
                        <p class="mt-1 text-sm text-gray-600">Update details for "{{ ucfirst($visionMission->type) }}" statement</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('admin.vision-missions.index') }}"
               class="mt-4 sm:mt-0 inline-flex items-center px-4 py-3 bg-gradient-to-r from-gray-100 to-gray-50 text-gray-700 font-medium rounded-lg hover:from-gray-200 hover:to-gray-100 transition-all shadow-sm hover:shadow-md border border-gray-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to List
            </a>
        </div>
        
        {{-- Quick Stats --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl p-4 border border-blue-200">
                <p class="text-sm font-medium text-gray-600">Type</p>
                <div class="mt-1 flex items-center">
                    @if($visionMission->type == 'vision')
                        <div class="p-1.5 rounded-lg bg-indigo-100 mr-2">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-indigo-700">Vision</span>
                    @else
                        <div class="p-1.5 rounded-lg bg-purple-100 mr-2">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <span class="font-semibold text-purple-700">Mission</span>
                    @endif
                </div>
            </div>
            <div class="bg-gradient-to-r from-green-50 to-green-100 rounded-xl p-4 border border-green-200">
                <p class="text-sm font-medium text-gray-600">Status</p>
                <div class="mt-1 flex items-center">
                    @if($visionMission->is_active)
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
                        Hidden
                    </span>
                    @endif
                </div>
            </div>
            <div class="bg-gradient-to-r from-purple-50 to-purple-100 rounded-xl p-4 border border-purple-200">
                <p class="text-sm font-medium text-gray-600">Characters</p>
                <p class="text-lg font-semibold text-gray-900">{{ strlen($visionMission->description) }}</p>
            </div>
            <div class="bg-gradient-to-r from-amber-50 to-amber-100 rounded-xl p-4 border border-amber-200">
                <p class="text-sm font-medium text-gray-600">Last Updated</p>
                <p class="text-lg font-semibold text-gray-900">{{ $visionMission->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <div class="max-w-4xl mx-auto">
        <div class="bg-gradient-to-br from-white via-white to-gray-50 rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            {{-- Form Header --}}
            <div class="px-8 py-6 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-gray-100/30">
                <h2 class="text-xl font-semibold text-gray-800">Edit Vision/Mission Entry</h2>
                <p class="text-sm text-gray-600 mt-1">Update the details below to modify this statement</p>
            </div>

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="mx-8 mt-6 bg-gradient-to-r from-red-50 to-red-100/50 border border-red-200 text-red-700 p-4 rounded-lg">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="font-medium">Please fix the following errors:</h4>
                            <ul class="list-disc list-inside text-sm mt-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Form Content --}}
            <form action="{{ route('admin.vision-missions.update', $visionMission->id) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    {{-- Left Column --}}
                    <div class="space-y-6">
                        {{-- Type Selection with Preview --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Type
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            
                            {{-- Type Preview --}}
                            <div class="mb-4">
                                <div id="typePreview" class="flex flex-col space-y-4">
                                    {{-- Vision Preview --}}
                                    <div id="visionPreview" class="{{ $visionMission->type == 'vision' ? '' : 'hidden' }} p-4 bg-gradient-to-r from-indigo-50 to-indigo-100/50 rounded-xl border border-indigo-200">
                                        <div class="flex items-center space-x-3">
                                            <div class="p-2 rounded-lg bg-indigo-100">
                                                <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-indigo-700">Vision Statement</h4>
                                                <p class="text-sm text-gray-600">Describes the desired future state and long-term goals</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Mission Preview --}}
                                    <div id="missionPreview" class="{{ $visionMission->type == 'mission' ? '' : 'hidden' }} p-4 bg-gradient-to-r from-purple-50 to-purple-100/50 rounded-xl border border-purple-200">
                                        <div class="flex items-center space-x-3">
                                            <div class="p-2 rounded-lg bg-purple-100">
                                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-purple-700">Mission Statement</h4>
                                                <p class="text-sm text-gray-600">Describes purpose, values, and what the organization does</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    {{-- Empty Preview --}}
                                    <div id="emptyPreview" class="{{ !in_array($visionMission->type, ['vision', 'mission']) ? '' : 'hidden' }} p-4 bg-gradient-to-r from-gray-50 to-gray-100/50 rounded-xl border border-gray-200">
                                        <div class="flex items-center space-x-3">
                                            <div class="p-2 rounded-lg bg-gray-100">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                                </svg>
                                            </div>
                                            <div>
                                                <h4 class="font-semibold text-gray-600">No Type Selected</h4>
                                                <p class="text-sm text-gray-500">Select a type to see preview</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="relative">
                                <select name="type"
                                        class="w-full px-4 py-3 pl-11 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400 appearance-none">
                                    <option value="">-- Select Type --</option>
                                    <option value="vision" {{ old('type', $visionMission->type) == 'vision' ? 'selected' : '' }}>Vision Statement</option>
                                    <option value="mission" {{ old('type', $visionMission->type) == 'mission' ? 'selected' : '' }}>Mission Statement</option>
                                </select>
                                <div class="absolute left-3 top-3 text-gray-400">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">Choose whether this is a Vision (future goals) or Mission (current purpose)</p>
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
                                    <input type="checkbox"
                                           name="is_active"
                                           id="is_active"
                                           value="1"
                                           {{ old('is_active', $visionMission->is_active) ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="w-14 h-7 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-green-600 peer-checked:to-emerald-600"></div>
                                </div>
                                <div>
                                    <span class="text-sm font-medium text-gray-900" id="statusText">{{ $visionMission->is_active ? 'Active' : 'Hidden' }}</span>
                                    <p class="text-xs text-gray-500">Visible to users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Right Column --}}
                    <div class="space-y-6">
                        {{-- Description --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Description
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <textarea name="description"
                                      rows="8"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all bg-white hover:border-gray-400">{{ old('description', $visionMission->description) }}</textarea>
                            <div class="flex justify-between mt-1">
                                <span class="text-xs text-gray-500">Write a clear and inspiring statement</span>
                                <span class="text-xs text-gray-400" id="charCount">{{ strlen($visionMission->description) }} characters</span>
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
                            <a href="{{ route('admin.vision-missions.index') }}"
                               class="px-6 py-3 bg-gradient-to-r from-gray-100 to-gray-50 text-gray-700 font-medium rounded-lg hover:from-gray-200 hover:to-gray-100 transition-all shadow-sm hover:shadow-md border border-gray-200">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-8 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 transition-all shadow-lg hover:shadow-xl flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Entry
                            </button>
                            <a href="{{ route('admin.vision-missions.create') }}" class="px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 text-white font-medium rounded-lg hover:from-green-700 hover:to-emerald-700 transition-all shadow-sm hover:shadow-md flex items-center">
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
                        <h3 class="font-medium text-gray-900">Delete this entry</h3>
                        <p class="text-sm text-gray-600 mt-1">Once deleted, this vision/mission entry cannot be recovered.</p>
                    </div>
                    <form action="{{ route('admin.vision-missions.destroy', $visionMission->id) }}" 
                          method="POST"
                          onsubmit="return confirm('⚠️ Are you absolutely sure? This will permanently delete this {{ $visionMission->type }} statement and cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white font-medium rounded-lg hover:from-red-700 hover:to-pink-700 transition-all shadow-sm hover:shadow-md flex items-center whitespace-nowrap">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Delete Entry
                        </button>
                    </form>
                </div>
            </div>
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
                    <h4 class="font-semibold text-gray-900 mb-1">Writing Effective Statements</h4>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-3">
                        <div class="p-3 bg-white/50 rounded-lg">
                            <h5 class="font-medium text-indigo-700 mb-1">Vision Statement Tips</h5>
                            <ul class="text-xs text-gray-600 space-y-1">
                                <li>• Focus on the future (5-10 years ahead)</li>
                                <li>• Be inspirational and aspirational</li>
                                <li>• Keep it concise and memorable</li>
                                <li>• Describe the impact you want to make</li>
                            </ul>
                        </div>
                        <div class="p-3 bg-white/50 rounded-lg">
                            <h5 class="font-medium text-purple-700 mb-1">Mission Statement Tips</h5>
                            <ul class="text-xs text-gray-600 space-y-1">
                                <li>• Focus on the present</li>
                                <li>• Describe what you do and for whom</li>
                                <li>• Include your core values</li>
                                <li>• Be clear about your purpose</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Character counter for description
    const description = document.querySelector('textarea[name="description"]');
    const charCount = document.getElementById('charCount');
    
    if (description && charCount) {
        description.addEventListener('input', function() {
            charCount.textContent = this.value.length + ' characters';
        });
        // Initialize count with current value
        charCount.textContent = description.value.length + ' characters';
    }
    
    // Type selection preview
    const typeSelect = document.querySelector('select[name="type"]');
    const visionPreview = document.getElementById('visionPreview');
    const missionPreview = document.getElementById('missionPreview');
    const emptyPreview = document.getElementById('emptyPreview');
    
    if (typeSelect) {
        typeSelect.addEventListener('change', function() {
            // Hide all previews
            visionPreview.classList.add('hidden');
            missionPreview.classList.add('hidden');
            emptyPreview.classList.add('hidden');
            
            // Show selected preview
            if (this.value === 'vision') {
                visionPreview.classList.remove('hidden');
            } else if (this.value === 'mission') {
                missionPreview.classList.remove('hidden');
            } else {
                emptyPreview.classList.remove('hidden');
            }
        });
    }
    
    // Status toggle text
    const statusToggle = document.getElementById('is_active');
    const statusText = document.getElementById('statusText');
    
    if (statusToggle && statusText) {
        statusToggle.addEventListener('change', function() {
            statusText.textContent = this.checked ? 'Active' : 'Hidden';
        });
    }
});
</script>

<style>
/* Custom checkbox/toggle styles */
input[type="checkbox"]:checked ~ div {
    background-color: #059669;
}

/* Custom select arrow */
select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 2.5rem;
    -webkit-print-color-adjust: exact;
    print-color-adjust: exact;
}
</style>
@endsection