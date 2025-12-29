@extends('admin.layouts.app')

@section('title', 'Add New Impact Story')

@section('content')
<div class="max-w-4xl mx-auto">

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Add New Impact Story</h1>
            <p class="text-gray-500 mt-1">Create a new inspiring story for the donation page</p>
        </div>
        
        <a href="{{ route('admin.stories.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2.5 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-xl hover:from-gray-600 hover:to-gray-700 transition-all shadow-sm hover:shadow-md">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Stories
        </a>
    </div>

    {{-- Success / Error Messages --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    @if($errors->any())
        <div class="mb-6 p-4 bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800 mb-1">Please correct the following errors:</h3>
                    <ul class="list-disc list-inside text-sm text-red-700 space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    {{-- Form Card --}}
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="px-6 py-8">
            <form action="{{ route('admin.stories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Two Column Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    
                    {{-- Name --}}
                    <div>
                        <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                            Name <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="name" 
                               id="name"
                               value="{{ old('name') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400
                               @error('name') border-red-300 @enderror"
                               placeholder="Enter full name">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Impact --}}
                    <div>
                        <label for="impact" class="block text-sm font-semibold text-gray-700 mb-2">
                            Impact Program <span class="text-red-500">*</span>
                        </label>
                        <input type="text" 
                               name="impact" 
                               id="impact"
                               value="{{ old('impact') }}"
                               required
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400
                               @error('impact') border-red-300 @enderror"
                               placeholder="e.g., Education Scholarship, Medical Aid">
                        @error('impact')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Story --}}
                <div class="mb-6">
                    <label for="story" class="block text-sm font-semibold text-gray-700 mb-2">
                        Story <span class="text-red-500">*</span>
                    </label>
                    <textarea name="story" 
                              id="story" 
                              rows="5"
                              required
                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400 resize-none
                              @error('story') border-red-300 @enderror"
                              placeholder="Share the inspiring story...">{{ old('story') }}</textarea>
                    @error('story')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Two Column Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    
                    {{-- Color Gradient --}}
                    <div>
                        <label for="color" class="block text-sm font-semibold text-gray-700 mb-2">
                            Badge Color Gradient
                        </label>
                        <input type="text" 
                               name="color" 
                               id="color"
                               value="{{ old('color') }}"
                               class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400
                               @error('color') border-red-300 @enderror"
                               placeholder="from-blue-500 to-cyan-500">
                        <p class="mt-2 text-sm text-gray-500">Use Tailwind gradient classes (from-{color} to-{color})</p>
                        @error('color')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Display Order --}}
                    <div>
                        <label for="order" class="block text-sm font-semibold text-gray-700 mb-2">
                            Display Order
                        </label>
                        <div class="relative">
                            <input type="number" 
                                   name="order" 
                                   id="order"
                                   value="{{ old('order', 0) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition placeholder-gray-400"
                                   placeholder="0">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                </svg>
                            </div>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Lower numbers appear first</p>
                    </div>
                </div>

                {{-- Image Upload --}}
                <div class="mb-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Image Upload
                    </label>
                    
                    {{-- Upload Area --}}
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 transition-colors
                        @error('image') border-red-300 @enderror">
                        <input type="file" 
                               name="image" 
                               id="image" 
                               accept="image/*"
                               class="hidden"
                               onchange="previewImage(event)">
                        
                        <div id="upload-area" onclick="document.getElementById('image').click()" class="cursor-pointer">
                            <svg class="w-12 h-12 text-gray-400 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-gray-600 mb-1">Click to upload an image</p>
                            <p class="text-sm text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>

                        {{-- Preview --}}
                        <div id="preview-container" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-2">Preview:</p>
                            <img id="preview" 
                                 alt="Image preview" 
                                 class="mx-auto rounded-xl shadow-md max-h-64 object-cover">
                            <button type="button" 
                                    onclick="removeImage()"
                                    class="mt-3 inline-flex items-center gap-1 px-3 py-1.5 text-sm bg-red-50 text-red-600 hover:bg-red-100 rounded-lg transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Remove Image
                            </button>
                        </div>
                    </div>
                    
                    @error('image')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Status Toggle --}}
                <div class="mb-8">
                    <label class="flex items-center cursor-pointer">
                        <div class="relative">
                            <input type="checkbox" 
                                   id="is_active" 
                                   name="is_active" 
                                   value="1" 
                                   class="sr-only" 
                                   {{ old('is_active', true) ? 'checked' : '' }}>
                            <div class="block bg-gray-300 w-12 h-6 rounded-full transition"></div>
                            <div class="dot absolute left-1 top-1 bg-white w-4 h-4 rounded-full transition"></div>
                        </div>
                        <div class="ml-3">
                            <span class="font-semibold text-gray-700">Active Story</span>
                            <p class="text-sm text-gray-500">Story will be visible on the donation page</p>
                        </div>
                    </label>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-end pt-6 border-t border-gray-100">
                    <button type="submit"
                            class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold rounded-xl hover:from-blue-600 hover:to-indigo-700 transition-all shadow-sm hover:shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4"/>
                        </svg>
                        Save Story
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Image Preview Script --}}
<script>
    function previewImage(event) {
        const input = event.target;
        const uploadArea = document.getElementById('upload-area');
        const previewContainer = document.getElementById('preview-container');
        const preview = document.getElementById('preview');
        
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                uploadArea.style.display = 'none';
                previewContainer.classList.remove('hidden');
                previewContainer.classList.add('block');
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function removeImage() {
        const input = document.getElementById('image');
        const uploadArea = document.getElementById('upload-area');
        const previewContainer = document.getElementById('preview-container');
        
        input.value = '';
        uploadArea.style.display = 'block';
        previewContainer.classList.remove('block');
        previewContainer.classList.add('hidden');
    }
    
    // Toggle switch functionality
    document.getElementById('is_active').addEventListener('change', function() {
        const toggle = this;
        const block = toggle.nextElementSibling;
        const dot = block.nextElementSibling;
        
        if (toggle.checked) {
            block.style.backgroundColor = '#10b981';
            dot.style.transform = 'translateX(150%)';
        } else {
            block.style.backgroundColor = '#d1d5db';
            dot.style.transform = 'translateX(0)';
        }
    });
    
    // Initialize toggle state
    document.addEventListener('DOMContentLoaded', function() {
        const toggle = document.getElementById('is_active');
        const block = toggle.nextElementSibling;
        const dot = block.nextElementSibling;
        
        if (toggle.checked) {
            block.style.backgroundColor = '#10b981';
            dot.style.transform = 'translateX(150%)';
        } else {
            block.style.backgroundColor = '#d1d5db';
            dot.style.transform = 'translateX(0)';
        }
    });
</script>

{{-- Custom Toggle Styles --}}
<style>
    input:checked ~ .block {
        background-color: #10b981;
    }
    input:checked ~ .dot {
        transform: translateX(150%);
        background-color: white;
    }
    .block {
        background-color: #d1d5db;
        transition: background-color 0.3s;
    }
    .dot {
        transition: transform 0.3s, background-color 0.3s;
    }
</style>

@endsection