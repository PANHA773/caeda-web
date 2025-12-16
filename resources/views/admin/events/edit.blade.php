@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-6">

    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.events.index') }}" 
                       class="text-gray-400 hover:text-gray-600 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Edit Event</h1>
                        <p class="text-gray-600 text-sm mt-1 ml-0.5">Editing: {{ $event->title }}</p>
                    </div>
                </div>
            </div>
            
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.events.index') }}"
                   class="inline-flex items-center px-4 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Back to Events
                </a>
            </div>
        </div>
    </div>

    <!-- Form Card -->
    <div class="max-w-5xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            
            <!-- Form Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-gray-50 to-white">
                <div class="flex items-center">
                    <div class="p-3 bg-indigo-50 rounded-lg mr-4">
                        <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900">Update Event Information</h2>
                        <p class="text-gray-600 text-sm mt-1">Make changes to the event details below</p>
                    </div>
                </div>
            </div>

            <!-- Form Content -->
            <div class="p-6 md:p-8">
                <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                    @csrf
                    @method('PUT')

                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Basic Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                    Event Title <span class="text-red-500">*</span>
                                </label>
                                <input type="text" 
                                       name="title" 
                                       id="title" 
                                       value="{{ old('title', $event->title) }}"
                                       required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                       placeholder="Enter event title">
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Type -->
                            <div>
                                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Event Type
                                </label>
                                <select name="type" 
                                        id="type"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                                    <option value="">Select event type</option>
                                    <option value="conference" {{ old('type', $event->type) == 'conference' ? 'selected' : '' }}>Conference</option>
                                    <option value="workshop" {{ old('type', $event->type) == 'workshop' ? 'selected' : '' }}>Workshop</option>
                                    <option value="webinar" {{ old('type', $event->type) == 'webinar' ? 'selected' : '' }}>Webinar</option>
                                    <option value="seminar" {{ old('type', $event->type) == 'seminar' ? 'selected' : '' }}>Seminar</option>
                                    <option value="networking" {{ old('type', $event->type) == 'networking' ? 'selected' : '' }}>Networking</option>
                                    <option value="exhibition" {{ old('type', $event->type) == 'exhibition' ? 'selected' : '' }}>Exhibition</option>
                                </select>
                                @error('type')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Date -->
                            <div>
                                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">
                                    Event Date
                                </label>
                                <input type="date" 
                                       name="date" 
                                       id="date" 
                                       value="{{ old('date', $event->date ? $event->date->format('Y-m-d') : '') }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                                @error('date')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Time Range -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Event Time
                                </label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div>
                                        <label for="start_time" class="block text-xs text-gray-500 mb-1">Start Time</label>
                                        <input type="time" 
                                               name="start_time" 
                                               id="start_time" 
                                               value="{{ old('start_time', $event->start_time) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                                    </div>
                                    <div>
                                        <label for="end_time" class="block text-xs text-gray-500 mb-1">End Time</label>
                                        <input type="time" 
                                               name="end_time" 
                                               id="end_time" 
                                               value="{{ old('end_time', $event->end_time) }}"
                                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                                    </div>
                                </div>
                                @error('start_time')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @error('end_time')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Location -->
                            <div>
                                <label for="location" class="block text-sm font-medium text-gray-700 mb-2">
                                    Location
                                </label>
                                <input type="text" 
                                       name="location" 
                                       id="location" 
                                       value="{{ old('location', $event->location) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                       placeholder="Enter event location">
                                @error('location')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Tag -->
                            <div>
                                <label for="tag" class="block text-sm font-medium text-gray-700 mb-2">
                                    Tag
                                </label>
                                <input type="text" 
                                       name="tag" 
                                       id="tag" 
                                       value="{{ old('tag', $event->tag) }}"
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                       placeholder="e.g., Popular, Free, New">
                                @error('tag')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Event Details</h3>
                        
                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description
                            </label>
                            <textarea name="description" 
                                      id="description" 
                                      rows="5"
                                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                      placeholder="Enter event description">{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Event Image -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Event Image</h3>
                        
                        <!-- Current Image -->
                        @if($event->image)
                            @php
                                $currentImage = $event->image;
                                if (!preg_match('/^https?:\/\//', $currentImage)) {
                                    $currentImage = asset('storage/' . $currentImage);
                                }
                            @endphp
                            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700 mb-2">Current Image</p>
                                        <div class="flex items-center space-x-4">
                                            <div class="relative group">
                                                <div class="h-24 w-24 bg-white border border-gray-200 rounded-lg p-3 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-300 transition-all duration-200"
                                                     onclick="openImageViewer('{{ $currentImage }}', '{{ $event->title }}')">
                                                    <img src="{{ $currentImage }}" 
                                                         alt="{{ $event->title }}" 
                                                         class="max-h-full max-w-full object-contain">
                                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-200 rounded-lg flex items-center justify-center">
                                                        <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none">
                                                    Click to view full size
                                                    <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                                        <div class="w-2 h-2 bg-gray-900 rotate-45"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                <p>Click the image to view full size</p>
                                                <p class="mt-1">Upload a new image to replace this one</p>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" 
                                            onclick="openImageViewer('{{ $currentImage }}', '{{ $event->title }}')"
                                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium whitespace-nowrap">
                                        View Full Size
                                    </button>
                                </div>
                            </div>
                        @else
                            <div class="bg-yellow-50 border border-yellow-100 rounded-xl p-6">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                    </svg>
                                    <p class="text-sm text-yellow-800">No image has been uploaded for this event.</p>
                                </div>
                            </div>
                        @endif

                        <!-- Upload New Image -->
                        <div>
                            <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ $event->image ? 'Upload New Image (Optional)' : 'Upload Image' }}
                            </label>
                            
                            <!-- File Upload Area -->
                            <div class="mt-1">
                                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors relative group">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-400 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600 justify-center">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                <span class="group-hover:text-indigo-500 transition-colors">Click to upload</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1 group-hover:text-gray-700 transition-colors">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors">PNG, JPG, GIF up to 5MB</p>
                                    </div>
                                    <div class="absolute inset-0 bg-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded-xl pointer-events-none"></div>
                                </div>
                                
                                <!-- Image Preview (for new uploads) -->
                                <div id="image-preview" class="mt-4 hidden">
                                    <p class="text-sm text-gray-600 mb-2">New Image Preview:</p>
                                    <div class="flex items-center space-x-4">
                                        <div class="relative group">
                                            <div id="image-preview-container" class="h-24 w-24 bg-white border border-gray-200 rounded-lg p-3 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-300 transition-all duration-200"
                                                 onclick="openImageViewer(document.getElementById('image-preview-image').src, 'New Image Preview')">
                                                <img id="image-preview-image" class="max-h-full max-w-full object-contain">
                                                <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-200 rounded-lg flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none">
                                                Click to view full size
                                                <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                                    <div class="w-2 h-2 bg-gray-900 rotate-45"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-1">
                                            <div class="text-sm text-gray-600 space-y-1">
                                                <p id="image-file-name" class="font-medium"></p>
                                                <p id="image-file-size" class="text-gray-500"></p>
                                                <p id="image-file-dimensions" class="text-gray-500"></p>
                                            </div>
                                            <div class="mt-2 flex items-center space-x-3">
                                                <button type="button" 
                                                        onclick="removeImage()"
                                                        class="text-sm text-red-600 hover:text-red-800 hover:underline flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    {{ $event->image ? 'Remove new image' : 'Remove image' }}
                                                </button>
                                                @if($event->image)
                                                <button type="button" 
                                                        onclick="keepCurrentImage()"
                                                        class="text-sm text-green-600 hover:text-green-800 hover:underline flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    Keep current image
                                                </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                @error('image')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="space-y-6">
                        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Additional Information</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <!-- Seats -->
                            <div>
                                <label for="seats" class="block text-sm font-medium text-gray-700 mb-2">
                                    Available Seats
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           name="seats" 
                                           id="seats" 
                                           value="{{ old('seats', $event->seats) }}"
                                           min="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                           placeholder="0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-6.291a4 4 0 10-5.25-5.25"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('seats')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Speakers -->
                            <div>
                                <label for="speakers" class="block text-sm font-medium text-gray-700 mb-2">
                                    Number of Speakers
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           name="speakers" 
                                           id="speakers" 
                                           value="{{ old('speakers', $event->speakers) }}"
                                           min="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                                           placeholder="0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0-8H4m0 0l4 4m-4-4l4-4"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('speakers')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Featured Event -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Event Status</label>
                                <div class="space-y-3">
                                    <label class="flex items-center">
                                        <input type="checkbox" 
                                               name="is_featured" 
                                               value="1" 
                                               {{ old('is_featured', $event->is_featured) ? 'checked' : '' }}
                                               class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                        <span class="ml-3 text-gray-700">Featured Event</span>
                                    </label>
                                    @error('is_featured')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="pt-8 border-t border-gray-200">
                        <div class="flex flex-col-reverse sm:flex-row sm:justify-end sm:space-x-4 space-y-4 sm:space-y-0">
                            <a href="{{ route('admin.events.index') }}"
                               class="inline-flex justify-center items-center px-6 py-3.5 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:ring-4 focus:ring-gray-100 transition-all duration-200 shadow-sm">
                                Cancel
                            </a>
                            
                            <button type="submit"
                                    class="inline-flex justify-center items-center px-6 py-3.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 shadow-md hover:shadow-lg">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Event
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        
        <!-- Additional Actions -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Delete Card -->
            <div class="bg-red-50 border border-red-100 rounded-xl p-6">
                <div class="flex items-start">
                    <svg class="w-5 h-5 text-red-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.998-.833-2.732 0L4.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                    </svg>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium text-red-900 mb-2">Danger Zone</h3>
                        <p class="text-sm text-red-800 mb-4">Once you delete an event, there is no going back. Please be certain.</p>
                        <form action="{{ route('admin.events.destroy', $event->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('Are you absolutely sure you want to delete this event? This action cannot be undone.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 border border-red-300 text-red-700 font-medium rounded-lg hover:bg-red-50 focus:ring-4 focus:ring-red-100 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Delete Event
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Stats Card -->
            <div class="bg-gray-50 border border-gray-200 rounded-xl p-6">
                <h3 class="text-sm font-medium text-gray-900 mb-4">Event Information</h3>
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Created</span>
                        <span class="text-sm font-medium text-gray-900">{{ $event->created_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Last Updated</span>
                        <span class="text-sm font-medium text-gray-900">{{ $event->updated_at->format('M d, Y') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Featured</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $event->is_featured ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $event->is_featured ? 'Yes' : 'No' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- Image Viewer Modal -->
<div id="imageViewerModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div id="modalBackdrop" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <!-- Header -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" 
                        onclick="closeImageViewer()"
                        class="ml-auto flex-shrink-0 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h3 id="modalTitle" class="text-lg leading-6 font-medium text-gray-900 flex-1 text-center sm:text-left"></h3>
            </div>
            
            <!-- Image content -->
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <div class="flex justify-center items-center">
                            <img id="viewerImage" 
                                 class="max-w-full max-h-[70vh] object-contain rounded-lg" 
                                 src="" 
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <div class="w-full flex justify-between items-center">
                    <button type="button" 
                            onclick="downloadImage()"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download
                    </button>
                    <div class="text-sm text-gray-500" id="imageInfo"></div>
                    <button type="button" 
                            onclick="closeImageViewer()"
                            class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    const previewImage = document.getElementById('image-preview-image');
    const fileName = document.getElementById('image-file-name');
    const fileSize = document.getElementById('image-file-size');
    const fileDimensions = document.getElementById('image-file-dimensions');
    
    if (imageInput) {
        imageInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const file = this.files[0];
                const reader = new FileReader();
                
                // Show file info
                fileName.textContent = file.name;
                fileSize.textContent = formatFileSize(file.size);
                
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    
                    // Get image dimensions
                    const img = new Image();
                    img.onload = function() {
                        fileDimensions.textContent = `${this.naturalWidth} × ${this.naturalHeight} pixels`;
                    };
                    img.src = e.target.result;
                    
                    preview.classList.remove('hidden');
                }
                
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });
    }
    
    // Form submission loading state
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    form.addEventListener('submit', function(e) {
        // Disable submit button and show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = `
            <svg class="animate-spin w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
            </svg>
            Updating...
        `;
        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
    });
});

// Image viewer functions
let currentImageUrl = '';

function openImageViewer(imageUrl, title) {
    currentImageUrl = imageUrl;
    const modal = document.getElementById('imageViewerModal');
    const viewerImage = document.getElementById('viewerImage');
    const modalTitle = document.getElementById('modalTitle');
    const imageInfo = document.getElementById('imageInfo');
    
    // Set image source
    viewerImage.src = imageUrl;
    modalTitle.textContent = title;
    
    // Remove previous event listeners and add new ones
    viewerImage.onload = function() {
        const width = this.naturalWidth;
        const height = this.naturalHeight;
        imageInfo.textContent = `${width} × ${height} pixels`;
    };
    
    viewerImage.onerror = function() {
        imageInfo.textContent = 'Failed to load image';
    };
    
    // Show modal
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeImageViewer() {
    const modal = document.getElementById('imageViewerModal');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

function downloadImage() {
    if (currentImageUrl) {
        const link = document.createElement('a');
        link.href = currentImageUrl;
        link.download = 'event-image-' + Date.now() + '.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

function removeImage() {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    
    // Reset file input
    imageInput.value = '';
    
    // Hide preview
    preview.classList.add('hidden');
}

function keepCurrentImage() {
    const imageInput = document.getElementById('image');
    const preview = document.getElementById('image-preview');
    
    // Reset file input
    imageInput.value = '';
    
    // Hide preview
    preview.classList.add('hidden');
    
    // Show a notification or message
    showNotification('Current image will be kept', 'success');
}

// Helper function to format file size
function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Helper function to show notifications
function showNotification(message, type = 'info') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `fixed top-4 right-4 z-50 px-4 py-3 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full ${type === 'success' ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-blue-100 text-blue-800 border border-blue-200'}`;
    notification.innerHTML = `
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.remove('translate-x-full');
        notification.classList.add('translate-x-0');
    }, 10);
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.classList.remove('translate-x-0');
        notification.classList.add('translate-x-full');
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Close modal on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageViewer();
    }
});

// Close modal when clicking on backdrop
const modalBackdrop = document.getElementById('modalBackdrop');
if (modalBackdrop) {
    modalBackdrop.addEventListener('click', function() {
        closeImageViewer();
    });
}
</script>

<style>
#imageViewerModal {
    backdrop-filter: blur(4px);
}

#viewerImage {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>

@endsection