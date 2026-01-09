@extends('admin.layouts.app')

@section('title', 'Edit Strategy')

@section('content')
<div class="p-6">
    <!-- Header with Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.strategies.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Strategies
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit: {{ $strategy->title }}</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Edit Strategy</h1>
            <p class="text-gray-600 mt-2">Update details for {{ $strategy->title }}</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.strategies.index') }}" 
               class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Strategies
            </a>
        </div>
    </div>

    <!-- Validation Errors -->
    @if($errors->any())
        <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Main Form Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Column -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-yellow-50">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Strategy Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Update the details for this strategy</p>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.strategies.update', $strategy->id) }}" 
                          method="POST" 
                          id="strategyForm">
                        @csrf
                        @method('PUT')

                        <div class="space-y-6">
                            <!-- Title Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="title"
                                           id="titleInput"
                                           value="{{ old('title', $strategy->title) }}"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                                           placeholder="Enter strategy title"
                                           required
                                           autofocus>
                                </div>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="titleCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                    </div>
                                    <textarea name="description" 
                                              id="descriptionInput"
                                              rows="5"
                                              class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                              placeholder="Enter strategy description"
                                              required>{{ old('description', $strategy->description) }}</textarea>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="descriptionCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Two Column Grid for Icon and Order -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Icon Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Icon (Emoji)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               name="icon"
                                               id="iconInput"
                                               value="{{ old('icon', $strategy->icon) }}"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('icon') border-red-500 @enderror"
                                               placeholder="Enter emoji (e.g., 🚀, 💡, ⚡)"
                                               maxlength="2">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Single emoji recommended (max 2 characters)</p>
                                    @error('icon')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Order Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Display Order
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                            </svg>
                                        </div>
                                        <input type="number" 
                                               name="order"
                                               id="orderInput"
                                               value="{{ old('order', $strategy->order) }}"
                                               min="0"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('order') border-red-500 @enderror"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Lower numbers appear first</p>
                                    @error('order')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Toggle -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Status</h3>
                                    <p class="text-sm text-gray-500">Set the active status of this strategy</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_active" 
                                           value="1"
                                           class="sr-only peer"
                                           {{ old('is_active', $strategy->is_active) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        <span id="statusText">{{ $strategy->is_active ? 'Active' : 'Inactive' }}</span>
                                    </span>
                                </label>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-6 border-t border-gray-200">
                                <div class="mb-4 sm:mb-0">
                                    <p class="text-sm text-gray-600">
                                        Fields marked with <span class="text-red-500">*</span> are required
                                    </p>
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('admin.strategies.index') }}" 
                                       class="inline-flex items-center px-5 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-medium rounded-lg hover:from-yellow-600 hover:to-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Update Strategy
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Column -->
        <div class="space-y-6">
            <!-- Current State Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Current State</h2>
                    <p class="text-sm text-gray-600 mt-1">How this strategy currently appears</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <!-- Icon Preview -->
                        <div class="mb-4 flex justify-center">
                            @if($strategy->icon)
                                <div class="h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center text-3xl">
                                    {{ $strategy->icon }}
                                </div>
                            @else
                                <div class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl">
                                    🚀
                                </div>
                            @endif
                        </div>
                        
                        <!-- Title Preview -->
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $strategy->title }}</h3>
                        
                        <!-- Description Preview -->
                        <p class="text-gray-600 text-sm mb-4">
                            {{ $strategy->description }}
                        </p>
                        
                        <!-- Status Badge -->
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $strategy->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} mb-4">
                            @if($strategy->is_active)
                                <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3"/>
                                </svg>
                                Active
                            @else
                                <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3"/>
                                </svg>
                                Inactive
                            @endif
                        </div>
                        
                        <!-- Order Display -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Current Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium">{{ $strategy->order }}</div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium">{{ $strategy->is_active ? 'Active' : 'Inactive' }}</div>
                                @if($strategy->icon)
                                    <div class="text-gray-700">Icon:</div>
                                    <div class="font-medium truncate">{{ $strategy->icon }}</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Preview Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Live Preview</h2>
                    <p class="text-sm text-gray-600 mt-1">How changes will appear</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <!-- Icon Preview -->
                        <div class="mb-4 flex justify-center">
                            <div id="previewIcon" class="h-16 w-16 rounded-xl flex items-center justify-center text-3xl">
                                @if($strategy->icon)
                                    <div class="h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center text-3xl">
                                        {{ $strategy->icon }}
                                    </div>
                                @else
                                    <div class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl">
                                        🚀
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <!-- Title Preview -->
                        <h3 id="previewTitle" class="text-xl font-bold text-gray-900 mb-3">{{ $strategy->title }}</h3>
                        
                        <!-- Description Preview -->
                        <p id="previewDescription" class="text-gray-600 text-sm mb-4">
                            {{ $strategy->description }}
                        </p>
                        
                        <!-- Status Badge -->
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mb-4" id="previewStatus">
                            @if($strategy->is_active)
                                <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                    <svg class="mr-1.5 h-2 w-2 text-green-500 inline" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"/>
                                    </svg>
                                    Active
                                </div>
                            @else
                                <div class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                                    <svg class="mr-1.5 h-2 w-2 text-red-500 inline" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"/>
                                    </svg>
                                    Inactive
                                </div>
                            @endif
                        </div>
                        
                        <!-- Order Display -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Updated Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium" id="previewOrder">{{ $strategy->order }}</div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium" id="previewStatusText">{{ $strategy->is_active ? 'Active' : 'Inactive' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-2xl shadow-lg border border-red-200 border-t-4 border-t-red-500">
                <div class="px-6 py-4 border-b border-red-100 bg-red-50">
                    <h2 class="text-xl font-semibold text-red-800">Danger Zone</h2>
                </div>
                <div class="p-6">
                    <p class="text-sm text-red-600 mb-4">Permanently delete this strategy.</p>
                    <form action="{{ route('admin.strategies.destroy', $strategy->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this strategy? This action cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Strategy
                        </button>
                    </form>
                </div>
            </div>

            <!-- Popular Emojis -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Popular Emojis</h2>
                    <p class="text-sm text-gray-600 mt-1">Click to add to icon field</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-4 gap-3">
                        <button type="button" onclick="addEmoji('🚀')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🚀
                        </button>
                        <button type="button" onclick="addEmoji('💡')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💡
                        </button>
                        <button type="button" onclick="addEmoji('⚡')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            ⚡
                        </button>
                        <button type="button" onclick="addEmoji('🎯')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🎯
                        </button>
                        <button type="button" onclick="addEmoji('🌟')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🌟
                        </button>
                        <button type="button" onclick="addEmoji('🔥')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🔥
                        </button>
                        <button type="button" onclick="addEmoji('💎')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💎
                        </button>
                        <button type="button" onclick="addEmoji('📈')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            📈
                        </button>
                        <button type="button" onclick="addEmoji('🛡️')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🛡️
                        </button>
                        <button type="button" onclick="addEmoji('🤝')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🤝
                        </button>
                        <button type="button" onclick="addEmoji('🎨')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🎨
                        </button>
                        <button type="button" onclick="addEmoji('💼')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💼
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions */
    input, select, textarea {
        transition: all 0.2s ease-in-out;
    }
    
    /* Status toggle animation */
    input:checked ~ .peer-checked\:bg-blue-600 {
        background-color: #2563eb;
    }
    
    /* Preview animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    #previewTitle, #previewDescription, #previewIcon {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Yellow accent for edit */
    .bg-yellow-50 {
        background-color: #fffbeb;
    }
    
    /* Emoji button hover effect */
    button:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get form elements for live preview
    const titleInput = document.getElementById('titleInput');
    const descriptionInput = document.getElementById('descriptionInput');
    const orderInput = document.getElementById('orderInput');
    const iconInput = document.getElementById('iconInput');
    const statusToggle = document.querySelector('input[name="is_active"]');
    const statusText = document.getElementById('statusText');
    const previewStatusText = document.getElementById('previewStatusText');
    const previewStatus = document.getElementById('previewStatus');
    
    // Preview elements
    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewIcon = document.getElementById('previewIcon');
    const previewOrder = document.getElementById('previewOrder');
    
    // Check if there's an existing icon
    const hasExistingIcon = '{{ $strategy->icon ?? '' }}'.length > 0;
    const existingIcon = '{{ $strategy->icon ?? '' }}';
    
    // Live preview updates
    function updatePreview() {
        // Title preview
        if (titleInput.value.trim()) {
            previewTitle.textContent = titleInput.value;
        } else {
            previewTitle.textContent = '{{ $strategy->title }}';
        }
        
        // Description preview
        if (descriptionInput.value.trim()) {
            previewDescription.textContent = descriptionInput.value;
        } else {
            previewDescription.textContent = '{{ $strategy->description }}';
        }
        
        // Order preview
        previewOrder.textContent = orderInput.value || '{{ $strategy->order }}';
        
        // Icon preview
        if (iconInput.value.trim()) {
            previewIcon.innerHTML = `
                <div class="h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center text-3xl">
                    ${iconInput.value}
                </div>
            `;
        } else if (hasExistingIcon) {
            previewIcon.innerHTML = `
                <div class="h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center text-3xl">
                    ${existingIcon}
                </div>
            `;
        } else {
            previewIcon.innerHTML = `
                <div class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl">
                    🚀
                </div>
            `;
        }
        
        // Status preview
        const isActive = statusToggle.checked;
        statusText.textContent = isActive ? 'Active' : 'Inactive';
        previewStatusText.textContent = isActive ? 'Active' : 'Inactive';
        
        if (isActive) {
            previewStatus.innerHTML = `
                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3"/>
                    </svg>
                    Active
                </div>
            `;
        } else {
            previewStatus.innerHTML = `
                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                    <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3"/>
                    </svg>
                    Inactive
                </div>
            `;
        }
    }
    
    // Add event listeners for live preview
    titleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
    orderInput.addEventListener('input', updatePreview);
    iconInput.addEventListener('input', updatePreview);
    statusToggle.addEventListener('change', updatePreview);
    
    // Character counters
    function setupCharacterCounter(inputElement, counterElementId, maxLength) {
        inputElement.addEventListener('input', function() {
            const currentLength = this.value.length;
            const counter = document.getElementById(counterElementId);
            if (counter) {
                counter.textContent = `${currentLength}/${maxLength} characters`;
                if (currentLength > maxLength * 0.8) {
                    counter.classList.add('text-yellow-600');
                    counter.classList.remove('text-gray-500');
                } else {
                    counter.classList.remove('text-yellow-600');
                    counter.classList.add('text-gray-500');
                }
                if (currentLength > maxLength) {
                    counter.classList.add('text-red-600');
                    counter.classList.remove('text-yellow-600', 'text-gray-500');
                }
            }
        });
        
        // Initialize counter
        const counter = document.getElementById(counterElementId);
        if (counter) {
            const initialLength = inputElement.value.length;
            counter.textContent = `${initialLength}/${maxLength} characters`;
            if (initialLength > maxLength * 0.8) {
                counter.classList.add('text-yellow-600');
            }
            if (initialLength > maxLength) {
                counter.classList.add('text-red-600');
                counter.classList.remove('text-yellow-600');
            }
        }
    }
    
    setupCharacterCounter(titleInput, 'titleCounter', 255);
    setupCharacterCounter(descriptionInput, 'descriptionCounter', 500);
    
    // Initialize preview
    updatePreview();
    
    // Form validation
    const form = document.getElementById('strategyForm');
    form.addEventListener('submit', function(e) {
        const titleValue = titleInput.value.trim();
        const descriptionValue = descriptionInput.value.trim();
        
        if (!titleValue) {
            e.preventDefault();
            titleInput.focus();
            titleInput.classList.add('border-red-500');
            return false;
        }
        
        if (!descriptionValue) {
            e.preventDefault();
            descriptionInput.focus();
            descriptionInput.classList.add('border-red-500');
            return false;
        }
        
        return true;
    });
});

function addEmoji(emoji) {
    const iconInput = document.getElementById('iconInput');
    iconInput.value = emoji;
    iconInput.focus();
    
    // Update preview
    document.getElementById('titleInput').dispatchEvent(new Event('input'));
    
    // Show visual feedback
    const button = event.target.closest('button');
    const originalBg = button.className;
    button.className = originalBg.replace('bg-gray-50', 'bg-green-50').replace('hover:bg-blue-50', 'hover:bg-green-100');
    
    setTimeout(() => {
        button.className = originalBg;
    }, 500);
}
</script>
@endsection