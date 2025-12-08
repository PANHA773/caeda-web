@extends('admin.layouts.app')

@section('title', 'Add Program - Admin CAEDA')

@section('extra-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; }
    .animate-delay-100 { animation-delay: 0.1s; }
    .animate-delay-200 { animation-delay: 0.2s; }
    
    .form-card {
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.18);
    }
    
    .form-group:hover .form-label {
        color: #3b82f6;
    }
    
    .form-section {
        transition: all 0.3s ease;
    }
    
    .form-section:hover {
        background: rgba(59, 130, 246, 0.02);
    }
    
    .image-preview {
        transition: all 0.3s ease;
    }
    
    .image-preview:hover {
        transform: scale(1.02);
        box-shadow: 0 10px 30px rgba(59, 130, 246, 0.15);
    }
    
    .price-input:focus-within {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .rich-editor {
        min-height: 200px;
        max-height: 400px;
        overflow-y: auto;
    }
    
    .rich-editor:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .price-summary {
        background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
    }
</style>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">
        
        {{-- Header --}}
        <div class="mb-8 animate-fade-in-up">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Add New Program</h1>
                    <p class="text-gray-600 mt-2">Create a new educational program for CAEDA platform</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.programs.index') }}" 
                       class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-xl hover:bg-gray-50 transition-all duration-200 shadow-sm hover:shadow">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Programs
                    </a>
                </div>
            </div>
            
            {{-- Progress Steps --}}
            <div class="mt-8 flex items-center space-x-4">
                <div class="flex-1 h-2 bg-gray-200 rounded-full overflow-hidden">
                    <div class="h-full bg-gradient-to-r from-blue-500 to-indigo-600 w-1/3"></div>
                </div>
                <div class="text-sm text-gray-600">
                    <span class="font-semibold text-blue-600">Step 1</span> of 3
                </div>
            </div>
        </div>

        @if($errors->any())
            <div class="mb-8 p-5 bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 rounded-xl animate-fade-in-up animate-delay-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 text-xl mt-0.5"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-semibold text-red-800">
                            {{ count($errors) }} error(s) need to be fixed:
                        </h3>
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

        <form action="{{ route('admin.programs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8" id="programForm">
            @csrf
            
            {{-- Main Form Card --}}
            <div class="form-card rounded-2xl p-8 animate-fade-in-up animate-delay-100">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    
                    {{-- Left Column: Basic Info --}}
                    <div class="lg:col-span-2 space-y-8">
                        
                        {{-- Program Title --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-blue-100 rounded-xl mr-4">
                                    <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Program Information</h2>
                                    <p class="text-gray-600 text-sm">Basic details about the program</p>
                                </div>
                            </div>
                            
                            <div class="space-y-6">
                                <div class="form-group">
                                    <label for="title" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-heading mr-2"></i>Program Title *
                                    </label>
                                    <input type="text" 
                                           id="title" 
                                           name="title" 
                                           value="{{ old('title') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-lg"
                                           placeholder="e.g., Advanced Data Science & AI">
                                    <p class="text-gray-500 text-sm mt-2">Enter a clear and descriptive title</p>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="form-group">
                                        <label for="category" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-tag mr-2"></i>Category *
                                        </label>
                                        <select id="category" 
                                                name="category" 
                                                required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                            <option value="">Select Category</option>
                                            <option value="Technology" {{ old('category') == 'Technology' ? 'selected' : '' }}>Technology</option>
                                            <option value="Business" {{ old('business') == 'Business' ? 'selected' : '' }}>Business</option>
                                            <option value="Science" {{ old('category') == 'Science' ? 'selected' : '' }}>Science</option>
                                            <option value="Arts" {{ old('category') == 'Arts' ? 'selected' : '' }}>Arts</option>
                                            <option value="Health" {{ old('category') == 'Health' ? 'selected' : '' }}>Health</option>
                                            <option value="Engineering" {{ old('category') == 'Engineering' ? 'selected' : '' }}>Engineering</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="level" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fas fa-chart-line mr-2"></i>Level *
                                        </label>
                                        <select id="level" 
                                                name="level" 
                                                required
                                                class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                            <option value="">Select Level</option>
                                            <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Beginner</option>
                                            <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediate</option>
                                            <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Advanced</option>
                                            <option value="expert" {{ old('level') == 'expert' ? 'selected' : '' }}>Expert</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="short_description" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-align-left mr-2"></i>Short Description *
                                    </label>
                                    <textarea id="short_description" 
                                              name="short_description" 
                                              rows="3"
                                              required
                                              class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                                              placeholder="Brief overview of the program">{{ old('short_description') }}</textarea>
                                    <p class="text-gray-500 text-sm mt-2">Max 200 characters. This appears in cards and previews.</p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Program Details --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-green-100 rounded-xl mr-4">
                                    <i class="fas fa-info-circle text-green-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Program Details</h2>
                                    <p class="text-gray-600 text-sm">Duration, mode, and other specifics</p>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="form-group">
                                    <label for="duration" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="far fa-clock mr-2"></i>Duration *
                                    </label>
                                    <input type="text" 
                                           id="duration" 
                                           name="duration" 
                                           value="{{ old('duration') }}"
                                           required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                           placeholder="e.g., 12 weeks, 6 months">
                                </div>
                                
                                <div class="form-group">
                                    <label for="mode" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-desktop mr-2"></i>Mode *
                                    </label>
                                    <select id="mode" 
                                            name="mode" 
                                            required
                                            class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                        <option value="">Select Mode</option>
                                        <option value="online" {{ old('mode') == 'online' ? 'selected' : '' }}>Online</option>
                                        <option value="offline" {{ old('mode') == 'offline' ? 'selected' : '' }}>On-campus</option>
                                        <option value="hybrid" {{ old('mode') == 'hybrid' ? 'selected' : '' }}>Hybrid</option>
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="application_deadline" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="far fa-calendar-alt mr-2"></i>Application Deadline
                                    </label>
                                    <input type="date" 
                                           id="application_deadline" 
                                           name="application_deadline" 
                                           value="{{ old('application_deadline') }}"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                </div>
                                
                                <div class="form-group">
                                    <label for="students" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-users mr-2"></i>Initial Students Count
                                    </label>
                                    <input type="number" 
                                           id="students" 
                                           name="students" 
                                           value="{{ old('students', 0) }}"
                                           min="0"
                                           class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                </div>
                            </div>
                        </div>
                        
                        {{-- Full Description --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-purple-100 rounded-xl mr-4">
                                    <i class="fas fa-file-alt text-purple-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Full Description</h2>
                                    <p class="text-gray-600 text-sm">Detailed program description with rich text</p>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="description" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-align-justify mr-2"></i>Program Description *
                                </label>
                                <textarea id="description" 
                                          name="description" 
                                          rows="10"
                                          required
                                          class="rich-editor w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                          placeholder="Detailed description including curriculum, learning outcomes, prerequisites...">{{ old('description') }}</textarea>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('bold')">
                                        <i class="fas fa-bold"></i>
                                    </button>
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('italic')">
                                        <i class="fas fa-italic"></i>
                                    </button>
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('ul')">
                                        <i class="fas fa-list-ul"></i>
                                    </button>
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('ol')">
                                        <i class="fas fa-list-ol"></i>
                                    </button>
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('h2')">
                                        <i class="fas fa-heading"></i> H2
                                    </button>
                                    <button type="button" class="format-btn px-3 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 text-sm" onclick="formatText('h3')">
                                        <i class="fas fa-heading"></i> H3
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    {{-- Right Column: Media & Pricing --}}
                    <div class="space-y-8">
                        
                        {{-- Program Image --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-yellow-100 rounded-xl mr-4">
                                    <i class="fas fa-image text-yellow-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Program Image</h2>
                                    <p class="text-gray-600 text-sm">Upload a cover image</p>
                                </div>
                            </div>
                            
                            <div class="image-preview mb-6">
                                <div id="image-preview-container" class="w-full h-48 bg-gradient-to-br from-gray-100 to-gray-200 rounded-xl flex items-center justify-center overflow-hidden">
                                    <div class="text-center">
                                        <i class="fas fa-image text-gray-400 text-4xl mb-3"></i>
                                        <p class="text-gray-500 text-sm">Image preview</p>
                                        <p class="text-gray-400 text-xs mt-1">Recommended: 1200x800px</p>
                                    </div>
                                    <img id="image-preview" class="hidden w-full h-full object-cover" alt="Preview">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="image" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                    <i class="fas fa-upload mr-2"></i>Upload Image
                                </label>
                                <div class="relative">
                                    <input type="file" 
                                           id="image" 
                                           name="image" 
                                           accept="image/*"
                                           class="hidden"
                                           onchange="previewImage(this)">
                                    <label for="image" 
                                           class="cursor-pointer flex items-center justify-center w-full px-4 py-3 border-2 border-dashed border-gray-300 rounded-xl hover:border-blue-400 hover:bg-blue-50 transition text-center">
                                        <div class="space-y-2">
                                            <i class="fas fa-cloud-upload-alt text-3xl text-gray-400"></i>
                                            <p class="text-gray-600">
                                                <span class="font-medium text-blue-600">Click to upload</span>
                                                or drag and drop
                                            </p>
                                            <p class="text-gray-400 text-xs">PNG, JPG, GIF up to 5MB</p>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Pricing Section --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-red-100 rounded-xl mr-4">
                                    <i class="fas fa-dollar-sign text-red-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Pricing</h2>
                                    <p class="text-gray-600 text-sm">Set tuition and discounts</p>
                                </div>
                            </div>
                            
                            {{-- Hidden final_price field --}}
                            <input type="hidden" id="final_price" name="final_price" value="{{ old('final_price', old('tuition', 0)) }}">
                            
                            <div class="space-y-6">
                                <div class="form-group price-input">
                                    <label for="tuition" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-money-bill-wave mr-2"></i>Regular Tuition *
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 font-medium">$</span>
                                        </div>
                                        <input type="number" 
                                               id="tuition" 
                                               name="tuition" 
                                               value="{{ old('tuition') }}"
                                               required
                                               step="0.01"
                                               min="0"
                                               class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                               placeholder="0.00"
                                               oninput="calculateFinalPrice()">
                                    </div>
                                </div>
                                
                                <div class="form-group price-input">
                                    <label for="discount" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-percentage mr-2"></i>Discounted Price
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 font-medium">$</span>
                                        </div>
                                        <input type="number" 
                                               id="discount" 
                                               name="discount" 
                                               value="{{ old('discount') }}"
                                               step="0.01"
                                               min="0"
                                               class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                               placeholder="Optional"
                                               oninput="calculateFinalPrice()">
                                    </div>
                                    <p class="text-gray-500 text-sm mt-2">Leave empty for no discount</p>
                                </div>
                                
                                {{-- Price Summary --}}
                                <div id="price-summary" class="price-summary p-4 rounded-xl border border-blue-200 hidden">
                                    <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <i class="fas fa-calculator mr-2 text-blue-600"></i> Price Summary
                                    </h4>
                                    <div class="space-y-2">
                                        <div class="flex justify-between items-center">
                                            <span class="text-gray-600">Regular Tuition:</span>
                                            <span id="tuition-summary" class="font-medium">$0.00</span>
                                        </div>
                                        <div id="discount-row" class="flex justify-between items-center hidden">
                                            <span class="text-gray-600">Discount:</span>
                                            <span id="discount-summary" class="font-medium text-green-600">-$0.00</span>
                                        </div>
                                        <div class="border-t border-blue-200 pt-2 mt-2 flex justify-between items-center">
                                            <span class="text-gray-900 font-semibold">Final Price:</span>
                                            <span id="final-price-summary" class="text-xl font-bold text-blue-700">$0.00</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="savings-calc" class="hidden p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-xl border border-green-200">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <p class="text-sm text-gray-600">Students save</p>
                                            <p class="text-2xl font-bold text-green-700" id="savings-amount">$0</p>
                                        </div>
                                        <i class="fas fa-tags text-3xl text-green-500"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Additional Settings --}}
                        <div class="form-section p-6 bg-white rounded-xl border border-gray-200">
                            <div class="flex items-center mb-6">
                                <div class="p-3 bg-indigo-100 rounded-xl mr-4">
                                    <i class="fas fa-cog text-indigo-600 text-xl"></i>
                                </div>
                                <div>
                                    <h2 class="text-xl font-bold text-gray-900">Settings</h2>
                                    <p class="text-gray-600 text-sm">Additional program settings</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-blue-50 rounded-lg mr-3">
                                            <i class="fas fa-star text-blue-600"></i>
                                        </div>
                                        <div>
                                            <label for="is_featured" class="font-medium text-gray-700">Featured Program</label>
                                            <p class="text-gray-500 text-sm">Show in featured section</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               id="is_featured" 
                                               name="is_featured" 
                                               value="1"
                                               class="sr-only peer"
                                               {{ old('is_featured') ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    </label>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div class="p-2 bg-green-50 rounded-lg mr-3">
                                            <i class="fas fa-eye text-green-600"></i>
                                        </div>
                                        <div>
                                            <label for="is_active" class="font-medium text-gray-700">Active Status</label>
                                            <p class="text-gray-500 text-sm">Make program visible to users</p>
                                        </div>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" 
                                               id="is_active" 
                                               name="is_active" 
                                               value="1"
                                               class="sr-only peer"
                                               {{ old('is_active', true) ? 'checked' : '' }}>
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-600"></div>
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                    <label for="badge" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-certificate mr-2"></i>Badge Text
                                    </label>
                                    <input type="text" 
                                           id="badge" 
                                           name="badge" 
                                           value="{{ old('badge') }}"
                                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                           placeholder="e.g., New, Popular, Limited">
                                </div>
                                
                                <div class="form-group">
                                    <label for="badge_color" class="form-label block text-sm font-medium text-gray-700 mb-2">
                                        <i class="fas fa-palette mr-2"></i>Badge Color
                                    </label>
                                    <select id="badge_color" 
                                            name="badge_color" 
                                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                        <option value="">Default</option>
                                        <option value="bg-blue-600" {{ old('badge_color') == 'bg-blue-600' ? 'selected' : '' }}>Blue</option>
                                        <option value="bg-red-600" {{ old('badge_color') == 'bg-red-600' ? 'selected' : '' }}>Red</option>
                                        <option value="bg-green-600" {{ old('badge_color') == 'bg-green-600' ? 'selected' : '' }}>Green</option>
                                        <option value="bg-yellow-600" {{ old('badge_color') == 'bg-yellow-600' ? 'selected' : '' }}>Yellow</option>
                                        <option value="bg-purple-600" {{ old('badge_color') == 'bg-purple-600' ? 'selected' : '' }}>Purple</option>
                                        <option value="bg-pink-600" {{ old('badge_color') == 'bg-pink-600' ? 'selected' : '' }}>Pink</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- Form Actions --}}
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row justify-between items-center space-y-4 sm:space-y-0">
                        <div class="flex items-center text-gray-600">
                            <i class="fas fa-exclamation-circle mr-2 text-yellow-500"></i>
                            <span class="text-sm">Fields marked with * are required</span>
                        </div>
                        <div class="flex space-x-4">
                            <button type="reset" 
                                    class="px-6 py-3 border-2 border-gray-300 text-gray-700 font-semibold rounded-xl hover:bg-gray-50 transition-all duration-200 hover:shadow">
                                <i class="fas fa-redo mr-2"></i>Reset Form
                            </button>
                            <button type="submit" 
                                    class="px-8 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                                <i class="fas fa-plus-circle mr-2"></i>Create Program
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@section('extra-js')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Image preview functionality
    window.previewImage = function(input) {
        const preview = document.getElementById('image-preview');
        const container = document.getElementById('image-preview-container');
        const file = input.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                
                // Hide placeholder content
                container.querySelector('.text-center').style.display = 'none';
            };
            
            reader.readAsDataURL(file);
        }
    };
    
    // Format text buttons for description
    window.formatText = function(command) {
        const textarea = document.getElementById('description');
        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;
        const selectedText = textarea.value.substring(start, end);
        let formattedText = '';
        
        switch(command) {
            case 'bold':
                formattedText = `**${selectedText}**`;
                break;
            case 'italic':
                formattedText = `*${selectedText}*`;
                break;
            case 'ul':
                formattedText = `\n• ${selectedText.replace(/\n/g, '\n• ')}\n`;
                break;
            case 'ol':
                const lines = selectedText.split('\n');
                formattedText = lines.map((line, i) => `${i + 1}. ${line}`).join('\n');
                break;
            case 'h2':
                formattedText = `## ${selectedText}\n`;
                break;
            case 'h3':
                formattedText = `### ${selectedText}\n`;
                break;
        }
        
        textarea.value = textarea.value.substring(0, start) + formattedText + textarea.value.substring(end);
        textarea.focus();
        textarea.selectionStart = textarea.selectionEnd = start + formattedText.length;
    };
    
    // Calculate final price and savings
    window.calculateFinalPrice = function() {
        const tuition = parseFloat(document.getElementById('tuition').value) || 0;
        const discount = parseFloat(document.getElementById('discount').value) || 0;
        const savingsCalc = document.getElementById('savings-calc');
        const savingsAmount = document.getElementById('savings-amount');
        const priceSummary = document.getElementById('price-summary');
        const discountRow = document.getElementById('discount-row');
        const tuitionSummary = document.getElementById('tuition-summary');
        const discountSummary = document.getElementById('discount-summary');
        const finalPriceSummary = document.getElementById('final-price-summary');
        const finalPriceInput = document.getElementById('final_price');
        
        let finalPrice = tuition;
        let hasDiscount = false;
        
        // Update tuition summary
        tuitionSummary.textContent = `$${tuition.toFixed(2)}`;
        
        // Check if there's a valid discount
        if (discount > 0 && discount < tuition) {
            finalPrice = discount;
            hasDiscount = true;
            
            // Calculate savings
            const savings = tuition - discount;
            savingsAmount.textContent = `$${savings.toFixed(2)}`;
            savingsCalc.classList.remove('hidden');
            
            // Update discount row
            discountRow.classList.remove('hidden');
            discountSummary.textContent = `-$${savings.toFixed(2)}`;
        } else {
            savingsCalc.classList.add('hidden');
            discountRow.classList.add('hidden');
        }
        
        // Update final price
        finalPriceSummary.textContent = `$${finalPrice.toFixed(2)}`;
        finalPriceInput.value = finalPrice.toFixed(2);
        
        // Show price summary if tuition is set
        if (tuition > 0) {
            priceSummary.classList.remove('hidden');
        } else {
            priceSummary.classList.add('hidden');
        }
    };
    
    // Character counter for short description
    const shortDescInput = document.getElementById('short_description');
    const shortDescCounter = document.createElement('div');
    shortDescCounter.className = 'text-sm text-gray-500 mt-1 text-right';
    shortDescInput.parentNode.appendChild(shortDescCounter);
    
    function updateShortDescCounter() {
        const length = shortDescInput.value.length;
        shortDescCounter.textContent = `${length}/200 characters`;
        shortDescCounter.className = `text-sm mt-1 text-right ${length > 200 ? 'text-red-500' : 'text-gray-500'}`;
    }
    
    shortDescInput.addEventListener('input', updateShortDescCounter);
    updateShortDescCounter();
    
    // Auto-save draft functionality
    let autoSaveTimeout;
    function autoSaveDraft() {
        // Get form data except file inputs
        const formData = new FormData(document.getElementById('programForm'));
        const data = {};
        
        for (let [key, value] of formData.entries()) {
            if (key !== 'image') { // Skip file inputs
                data[key] = value;
            }
        }
        
        // Store in localStorage
        localStorage.setItem('programDraft', JSON.stringify(data));
        localStorage.setItem('programDraftTime', new Date().toLocaleTimeString());
        
        // Show notification
        const notification = document.createElement('div');
        notification.className = 'fixed bottom-4 right-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg transition-opacity duration-300 z-50';
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-save mr-2"></i>
                <span>Draft saved at ${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</span>
            </div>
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }
    
    // Auto-save every 30 seconds
    document.getElementById('programForm').addEventListener('input', function() {
        clearTimeout(autoSaveTimeout);
        autoSaveTimeout = setTimeout(autoSaveDraft, 30000);
    });
    
    // Load draft if exists
    const savedDraft = localStorage.getItem('programDraft');
    if (savedDraft) {
        const loadDraft = confirm('You have a saved draft. Would you like to load it?');
        if (loadDraft) {
            const draft = JSON.parse(savedDraft);
            for (const [key, value] of Object.entries(draft)) {
                const input = document.querySelector(`[name="${key}"]`);
                if (input) {
                    if (input.type === 'checkbox') {
                        input.checked = value === '1' || value === true;
                    } else if (input.type === 'radio') {
                        if (input.value === value) {
                            input.checked = true;
                        }
                    } else if (input.type === 'select-multiple') {
                        // Handle multiple select
                        const values = Array.isArray(value) ? value : [value];
                        Array.from(input.options).forEach(option => {
                            option.selected = values.includes(option.value);
                        });
                    } else if (input.type === 'file') {
                        // Skip file inputs
                    } else {
                        input.value = value;
                    }
                    
                    // Trigger change event for fields that need calculation
                    if (key === 'tuition' || key === 'discount') {
                        input.dispatchEvent(new Event('input', { bubbles: true }));
                    }
                }
            }
            
            // Recalculate final price after loading draft
            calculateFinalPrice();
            updateShortDescCounter();
        }
    }
    
    // Clear draft on successful submit
    document.getElementById('programForm').addEventListener('submit', function() {
        localStorage.removeItem('programDraft');
        localStorage.removeItem('programDraftTime');
        
        // Ensure final_price is set before submit
        const tuition = parseFloat(document.getElementById('tuition').value) || 0;
        const discount = parseFloat(document.getElementById('discount').value) || 0;
        const finalPriceInput = document.getElementById('final_price');
        
        let finalPrice = tuition;
        if (discount > 0 && discount < tuition) {
            finalPrice = discount;
        }
        
        finalPriceInput.value = finalPrice.toFixed(2);
    });
    
    // Reset form handler
    document.querySelector('button[type="reset"]').addEventListener('click', function() {
        setTimeout(() => {
            calculateFinalPrice();
            updateShortDescCounter();
        }, 100);
    });
    
    // Initialize calculations
    calculateFinalPrice();
});
</script>
@endsection