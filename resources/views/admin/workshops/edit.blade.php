@extends('admin.layouts.app')

@section('title', 'Edit Workshop')

@section('content')
<div class="max-w-6xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    {{-- Header --}}
    <div class="mb-8">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Edit Workshop</h1>
                <p class="mt-2 text-sm text-gray-600">Update workshop details and information</p>
            </div>
            <a href="{{ route('admin.workshops.index') }}" 
               class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 hover:shadow-sm transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Workshops
            </a>
        </div>
        
        {{-- Workshop Info Card --}}
        <div class="mt-6 bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    @if($workshop->image)
                        <img src="{{ asset('storage/'.$workshop->image) }}" 
                             alt="{{ $workshop->title }}" 
                             class="w-16 h-16 object-cover rounded-xl border border-gray-200">
                    @endif
                    <div>
                        <h3 class="font-semibold text-gray-900">{{ $workshop->title }}</h3>
                        <div class="flex items-center gap-3 mt-1">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                {{ $workshop->instructor }}
                            </span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-gray-500">{{ $workshop->date->format('M d, Y') }}</span>
                            <span class="text-sm text-gray-500">•</span>
                            <span class="text-sm text-gray-500">{{ $workshop->duration }}</span>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    @if($workshop->is_featured)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            Featured
                        </span>
                    @endif
                    
                    @if($workshop->status === 'active')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                            </svg>
                            Active
                        </span>
                    @elseif($workshop->status === 'completed')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Completed
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">
                            <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            Cancelled
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Form Container --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <form action="{{ route('admin.workshops.update', $workshop) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
            @csrf
            @method('PUT')

            <div class="p-8 space-y-8">
                {{-- Basic Information Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-blue-100 rounded-lg">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Basic Information</h2>
                    </div>

                    {{-- Title --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Workshop Title
                            <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                            <input type="text" 
                                   name="title" 
                                   value="{{ old('title', $workshop->title) }}" 
                                   class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('title') border-red-500 @enderror"
                                   placeholder="Enter workshop title"
                                   required>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Category & Level --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Category
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                                <select name="category"
                                        class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('category') border-red-500 @enderror"
                                        required>
                                    <option value="">-- Select Category --</option>
                                    <option value="technology" {{ old('category', $workshop->category) == 'technology' ? 'selected' : '' }}>Technology</option>
                                    <option value="buddhist" {{ old('category', $workshop->category) == 'buddhist' ? 'selected' : '' }}>Buddhist</option>
                                    <option value="education" {{ old('category', $workshop->category) == 'education' ? 'selected' : '' }}>Education</option>
                                    <option value="research" {{ old('category', $workshop->category) == 'research' ? 'selected' : '' }}>Research</option>
                                    <option value="creative" {{ old('category', $workshop->category) == 'creative' ? 'selected' : '' }}>Creative</option>
                                    <option value="wellness" {{ old('category', $workshop->category) == 'wellness' ? 'selected' : '' }}>Wellness</option>
                                </select>
                            </div>
                            @error('category')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Level
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                    </svg>
                                </div>
                                <select name="level"
                                        class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('level') border-red-500 @enderror"
                                        required>
                                    <option value="beginner" {{ old('level', $workshop->level) == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                    <option value="intermediate" {{ old('level', $workshop->level) == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                    <option value="advanced" {{ old('level', $workshop->level) == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                    <option value="all" {{ old('level', $workshop->level) == 'all' ? 'selected' : '' }}>All Levels</option>
                                </select>
                            </div>
                            @error('level')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Workshop Details Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-purple-100 rounded-lg">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Workshop Details</h2>
                    </div>

                    {{-- Instructor & Date --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Instructor Name
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       name="instructor"
                                       value="{{ old('instructor', $workshop->instructor) }}"
                                       class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('instructor') border-red-500 @enderror"
                                       placeholder="Enter instructor name"
                                       required>
                            </div>
                            @error('instructor')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Workshop Date
                                <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input type="date"
                                       name="date"
                                       value="{{ old('date', $workshop->date->format('Y-m-d')) }}"
                                       class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('date') border-red-500 @enderror"
                                       required>
                            </div>
                            @error('date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Duration & Seats --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Duration
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <input type="text"
                                       name="duration"
                                       value="{{ old('duration', $workshop->duration) }}"
                                       class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('duration') border-red-500 @enderror"
                                       placeholder="e.g., 2 hours, 1 day">
                            </div>
                            @error('duration')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Seats Available
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                </div>
                                <input type="number"
                                       name="seats_available"
                                       value="{{ old('seats_available', $workshop->seats_available) }}"
                                       class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('seats_available') border-red-500 @enderror"
                                       placeholder="Enter number of seats">
                            </div>
                            @error('seats_available')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Price & Status --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Price ($)
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-400">$</span>
                                </div>
                                <input type="number"
                                       step="0.01"
                                       name="price"
                                       value="{{ old('price', $workshop->price) }}"
                                       class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('price') border-red-500 @enderror"
                                       placeholder="0.00">
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Enter 0 for free workshops</p>
                            @error('price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <select name="status"
                                        class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('status') border-red-500 @enderror">
                                    <option value="active" {{ old('status', $workshop->status) == 'active' ? 'selected' : '' }}>Active</option>
                                    <option value="completed" {{ old('status', $workshop->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="cancelled" {{ old('status', $workshop->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </div>
                            @error('status')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Content Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-green-100 rounded-lg">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Content</h2>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Full Description
                        </label>
                        <textarea name="description"
                                  rows="6"
                                  class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-vertical @error('description') border-red-500 @enderror"
                                  placeholder="Describe the workshop in detail, including agenda, learning objectives, and requirements">{{ old('description', $workshop->description) }}</textarea>
                        <div class="mt-2 flex items-center justify-between text-sm text-gray-500">
                            <span>Detailed information about the workshop</span>
                            <span id="descCharCount">{{ strlen(old('description', $workshop->description)) }}/5000</span>
                        </div>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Short Description --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Short Description
                        </label>
                        <textarea name="short_description"
                                  rows="3"
                                  class="w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-vertical @error('short_description') border-red-500 @enderror"
                                  placeholder="Brief summary for listings and previews">{{ old('short_description', $workshop->short_description) }}</textarea>
                        <div class="mt-2 flex items-center justify-between text-sm text-gray-500">
                            <span>Brief summary for cards and listings</span>
                            <span id="shortDescCharCount">{{ strlen(old('short_description', $workshop->short_description)) }}/500</span>
                        </div>
                        @error('short_description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Media Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-orange-100 rounded-lg">
                            <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Media</h2>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        {{-- Current Image --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">
                                Current Image
                            </label>
                            @if($workshop->image)
                                <div class="relative group">
                                    <img src="{{ asset('storage/'.$workshop->image) }}" 
                                         alt="{{ $workshop->title }}" 
                                         class="w-full h-64 object-cover rounded-2xl border-2 border-gray-200 shadow-sm">
                                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl flex items-center justify-center">
                                        <span class="text-white font-medium">Current Workshop Image</span>
                                    </div>
                                </div>
                                <p class="mt-3 text-sm text-gray-500 text-center">This is the current workshop image</p>
                            @else
                                <div class="h-64 bg-gray-100 rounded-2xl border-2 border-dashed border-gray-300 flex flex-col items-center justify-center">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <p class="mt-2 text-sm text-gray-500">No image uploaded</p>
                                </div>
                            @endif
                        </div>

                        {{-- Upload New Image --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">
                                Upload New Image
                                <span class="text-sm font-normal text-gray-500">(Optional - leave empty to keep current)</span>
                            </label>
                            
                            <div class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-400 hover:bg-blue-50 transition-colors"
                                 id="dropzone">
                                <div class="space-y-4">
                                    <div class="mx-auto w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                        </svg>
                                    </div>
                                    <div class="space-y-2">
                                        <p class="text-sm font-medium text-gray-900">
                                            <label for="image" class="cursor-pointer text-blue-600 hover:text-blue-700">
                                                Click to upload
                                            </label>
                                            or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                                    </div>
                                </div>
                                <input type="file"
                                       name="image"
                                       id="image"
                                       class="hidden"
                                       accept="image/*">
                                <div id="fileName" class="mt-4 text-sm text-gray-600 hidden"></div>
                                <div id="imagePreview" class="mt-4"></div>
                            </div>
                            @error('image')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Video URL --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-4">
                            YouTube Embed URL
                            <span class="text-sm font-normal text-gray-500">(Optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input type="text"
                                   name="video"
                                   value="{{ old('video', $workshop->video) }}"
                                   class="pl-10 w-full border border-gray-300 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition @error('video') border-red-500 @enderror"
                                   placeholder="https://www.youtube.com/embed/...">
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Use the embed URL from YouTube</p>
                        @error('video')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Settings Section --}}
                <div class="space-y-6">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-indigo-100 rounded-lg">
                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h2 class="text-lg font-semibold text-gray-900">Settings</h2>
                    </div>

                    {{-- Featured & Registration --}}
                    <div class="bg-gray-50 rounded-xl p-6 space-y-6">
                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox"
                                               name="is_featured"
                                               value="1"
                                               class="sr-only peer"
                                               {{ old('is_featured', $workshop->is_featured) ? 'checked' : '' }}>
                                        <div class="w-10 h-5 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900">Featured Workshop</span>
                                        <p class="text-xs text-gray-500">Show this workshop prominently on the homepage</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="space-y-1">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox"
                                               name="registration_open"
                                               value="1"
                                               class="sr-only peer"
                                               {{ old('registration_open', $workshop->registration_open) ? 'checked' : '' }}>
                                        <div class="w-10 h-5 bg-gray-300 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-blue-500 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-600"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium text-gray-900">Registration Open</span>
                                        <p class="text-xs text-gray-500">Allow users to register for this workshop</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form Footer --}}
            <div class="px-8 py-6 bg-gray-50 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="text-sm text-gray-500">
                        <p><span class="text-red-500">*</span> Required fields</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.workshops.index') }}"
                           class="px-6 py-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 hover:shadow-sm transition-all">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-3 text-sm font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl hover:from-blue-700 hover:to-blue-800 hover:shadow-lg transition-all shadow-sm flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Update Workshop
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- Help Section --}}
    <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6">
        <div class="flex items-start gap-3">
            <svg class="w-5 h-5 text-blue-600 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 01118 0z"/>
            </svg>
            <div class="space-y-2">
                <h3 class="font-medium text-blue-900">Update Workshop Tips</h3>
                <ul class="text-sm text-blue-700 space-y-1 list-disc pl-5">
                    <li>Changing the image will replace the current workshop image</li>
                    <li>Update pricing or seats if workshop capacity has changed</li>
                    <li>Mark as completed once the workshop has finished</li>
                    <li>Featured workshops appear on the homepage for increased visibility</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Character count for descriptions
        const description = document.querySelector('textarea[name="description"]');
        const shortDescription = document.querySelector('textarea[name="short_description"]');
        const descCharCount = document.getElementById('descCharCount');
        const shortDescCharCount = document.getElementById('shortDescCharCount');
        
        description?.addEventListener('input', function() {
            descCharCount.textContent = this.value.length + '/5000';
        });

        shortDescription?.addEventListener('input', function() {
            shortDescCharCount.textContent = this.value.length + '/500';
        });

        // Drag & drop file upload functionality
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('image');
        const fileName = document.getElementById('fileName');
        const imagePreview = document.getElementById('imagePreview');

        dropzone?.addEventListener('click', () => fileInput.click());
        
        fileInput?.addEventListener('change', function(e) {
            if (this.files.length > 0) {
                handleFiles(this.files);
            }
        });

        // Drag and drop events
        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            dropzone?.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            dropzone?.addEventListener(eventName, highlight, false);
        });

        ['dragleave', 'drop'].forEach(eventName => {
            dropzone?.addEventListener(eventName, unhighlight, false);
        });

        function highlight() {
            dropzone.classList.add('border-blue-400', 'bg-blue-50');
        }

        function unhighlight() {
            dropzone.classList.remove('border-blue-400', 'bg-blue-50');
        }

        dropzone?.addEventListener('drop', handleDrop, false);

        function handleDrop(e) {
            const dt = e.dataTransfer;
            const files = dt.files;
            
            if (files.length > 0) {
                handleFiles(files);
                fileInput.files = files;
            }
        }

        function handleFiles(files) {
            const file = files[0];
            
            if (!file.type.startsWith('image/')) {
                alert('Please select an image file');
                return;
            }

            if (file.size > 5 * 1024 * 1024) {
                alert('File size must be less than 5MB');
                return;
            }

            fileName.textContent = `Selected: ${file.name}`;
            fileName.classList.remove('hidden');

            // Preview image
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `
                    <div class="relative group">
                        <img src="${e.target.result}" 
                             alt="Preview" 
                             class="w-full h-64 object-cover rounded-2xl border-2 border-gray-200 shadow-sm">
                        <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl flex items-center justify-center">
                            <span class="text-white font-medium">New Image Preview</span>
                        </div>
                    </div>
                `;
            };
            reader.readAsDataURL(file);
        }

        // Form validation
        (function () {
            'use strict'
            const forms = document.querySelectorAll('.needs-validation')
            
            Array.from(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
        })()
    });
</script>
@endpush

@endsection