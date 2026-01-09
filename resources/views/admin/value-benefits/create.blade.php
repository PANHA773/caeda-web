@extends('admin.layouts.app')

@section('title', 'Add Value & Benefit')

@section('content')
<div class="p-6">
    <!-- Header with Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('admin.value-benefits.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Values & Benefits
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Add New</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Add New Value / Benefit</h1>
            <p class="text-gray-600 mt-2">Add a new core value or benefit for your company</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="{{ route('admin.value-benefits.index') }}" 
               class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to List
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Column -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Value / Benefit Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Fill in the details for the new value or benefit</p>
                </div>
                
                <div class="p-6">
                    <form action="{{ route('admin.value-benefits.store') }}" method="POST" id="valueForm">
                        @csrf

                        <div class="space-y-6">
                            <!-- Title Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="title"
                                           id="titleInput"
                                           value="{{ old('title') }}"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror"
                                           placeholder="Enter value or benefit title"
                                           required
                                           autofocus>
                                </div>
                                @error('title')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="titleCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Description Field (Optional) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Description (Optional)
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                    </div>
                                    <textarea name="description" 
                                              id="descriptionInput"
                                              rows="4"
                                              class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror"
                                              placeholder="Enter a brief description (optional)">{{ old('description') }}</textarea>
                                </div>
                                @error('description')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <div id="descriptionCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Two Column Grid for Order and Icon -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                                               value="{{ old('order', 0) }}"
                                               min="0"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('order') border-red-500 @enderror"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Lower numbers appear first</p>
                                    @error('order')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Icon Field (Optional) -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Icon Class (Optional)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               name="icon"
                                               value="{{ old('icon') }}"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 @error('icon') border-red-500 @enderror"
                                               placeholder="e.g., fas fa-check-circle">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Font Awesome or custom icon class</p>
                                    @error('icon')
                                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Status Toggle -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Status</h3>
                                    <p class="text-sm text-gray-500">Set the active status of this item</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_active" 
                                           value="1"
                                           class="sr-only peer"
                                           {{ old('is_active', true) ? 'checked' : '' }}>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        <span id="statusText">Active</span>
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
                                    <a href="{{ route('admin.value-benefits.index') }}" 
                                       class="inline-flex items-center px-5 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Save Value
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
            <!-- Live Preview Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Live Preview</h2>
                    <p class="text-sm text-gray-600 mt-1">How this will appear</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <!-- Icon Preview -->
                        <div class="mb-4 flex justify-center">
                            <div id="previewIcon" class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Title Preview -->
                        <h3 id="previewTitle" class="text-xl font-bold text-gray-900 mb-2">Value / Benefit Title</h3>
                        
                        <!-- Description Preview -->
                        <p id="previewDescription" class="text-gray-600 text-sm mb-4">
                            This is a preview of the description. It will appear here when you type.
                        </p>
                        
                        <!-- Status Badge -->
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 mb-4" id="previewStatus">
                            <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3"/>
                            </svg>
                            Active
                        </div>
                        
                        <!-- Order Display -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Display Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium" id="previewOrder">0</div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium" id="previewStatusText">Active</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-gray-900">Tips for Creating Values & Benefits</h3>
                        <div class="mt-2 text-sm text-gray-600 space-y-2">
                            <p>• Keep titles clear and concise</p>
                            <p>• Order determines display sequence (lower = first)</p>
                            <p>• Inactive items won't appear on the website</p>
                            <p>• Add icons for better visual appeal</p>
                            <p>• Descriptions help explain the value</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Icons -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Popular Icons</h2>
                    <p class="text-sm text-gray-600 mt-1">Click to copy icon class</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-3 gap-3">
                        <button type="button" onclick="copyIcon('fas fa-check-circle')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-blue-600 text-lg mb-1">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">check-circle</div>
                        </button>
                        <button type="button" onclick="copyIcon('fas fa-star')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-yellow-500 text-lg mb-1">
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">star</div>
                        </button>
                        <button type="button" onclick="copyIcon('fas fa-heart')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-red-500 text-lg mb-1">
                                <i class="fas fa-heart"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">heart</div>
                        </button>
                        <button type="button" onclick="copyIcon('fas fa-shield-alt')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-green-500 text-lg mb-1">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">shield-alt</div>
                        </button>
                        <button type="button" onclick="copyIcon('fas fa-users')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-purple-500 text-lg mb-1">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">users</div>
                        </button>
                        <button type="button" onclick="copyIcon('fas fa-lightbulb')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center group transition-colors">
                            <div class="text-yellow-500 text-lg mb-1">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="text-xs text-gray-600 truncate group-hover:text-blue-600">lightbulb</div>
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
    
    #previewTitle, #previewDescription {
        animation: fadeIn 0.3s ease-out;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get form elements for live preview
    const titleInput = document.getElementById('titleInput');
    const descriptionInput = document.getElementById('descriptionInput');
    const orderInput = document.getElementById('orderInput');
    const iconInput = document.querySelector('input[name="icon"]');
    const statusToggle = document.querySelector('input[name="is_active"]');
    const statusText = document.getElementById('statusText');
    const previewStatusText = document.getElementById('previewStatusText');
    const previewStatus = document.getElementById('previewStatus');
    
    // Preview elements
    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewIcon = document.getElementById('previewIcon');
    const previewOrder = document.getElementById('previewOrder');
    
    // Live preview updates
    function updatePreview() {
        // Title preview
        if (titleInput.value.trim()) {
            previewTitle.textContent = titleInput.value;
        } else {
            previewTitle.textContent = 'Value / Benefit Title';
        }
        
        // Description preview
        if (descriptionInput.value.trim()) {
            previewDescription.textContent = descriptionInput.value;
        } else {
            previewDescription.textContent = 'This is a preview of the description. It will appear here when you type.';
        }
        
        // Order preview
        previewOrder.textContent = orderInput.value || '0';
        
        // Icon preview
        if (iconInput.value.trim()) {
            // If you have Font Awesome loaded, you could update the icon here
            // For now, we'll just change the color to indicate an icon is set
            previewIcon.className = 'h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center';
            previewIcon.innerHTML = `
                <div class="text-green-600 text-2xl">
                    <i class="${iconInput.value.trim()}"></i>
                </div>
            `;
        } else {
            previewIcon.className = 'h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center';
            previewIcon.innerHTML = `
                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                </svg>
            `;
        }
        
        // Status preview
        const isActive = statusToggle.checked;
        statusText.textContent = isActive ? 'Active' : 'Inactive';
        previewStatusText.textContent = isActive ? 'Active' : 'Inactive';
        
        if (isActive) {
            previewStatus.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 mb-4';
            previewStatus.innerHTML = `
                <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3"/>
                </svg>
                Active
            `;
        } else {
            previewStatus.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 mb-4';
            previewStatus.innerHTML = `
                <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3"/>
                </svg>
                Inactive
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
            counter.textContent = `0/${maxLength} characters`;
        }
    }
    
    setupCharacterCounter(titleInput, 'titleCounter', 255);
    setupCharacterCounter(descriptionInput, 'descriptionCounter', 500);
    
    // Initialize preview
    updatePreview();
    
    // Form validation
    const form = document.getElementById('valueForm');
    form.addEventListener('submit', function(e) {
        const titleValue = titleInput.value.trim();
        if (!titleValue) {
            e.preventDefault();
            titleInput.focus();
            titleInput.classList.add('border-red-500');
            return false;
        }
        return true;
    });
});

function copyIcon(iconClass) {
    const iconInput = document.querySelector('input[name="icon"]');
    iconInput.value = iconClass;
    iconInput.focus();
    
    // Update preview
    document.getElementById('titleInput').dispatchEvent(new Event('input'));
    
    // Show copied feedback
    const button = event.target.closest('button');
    const originalBg = button.className;
    button.className = originalBg.replace('bg-gray-50', 'bg-green-50').replace('hover:bg-blue-50', 'hover:bg-green-100');
    button.querySelector('.text-xs').classList.remove('text-gray-600', 'group-hover:text-blue-600');
    button.querySelector('.text-xs').classList.add('text-green-600');
    
    setTimeout(() => {
        button.className = originalBg;
        button.querySelector('.text-xs').classList.remove('text-green-600');
        button.querySelector('.text-xs').classList.add('text-gray-600', 'group-hover:text-blue-600');
    }, 1000);
}

// Auto-focus title input
window.onload = function() {
    const titleInput = document.getElementById('titleInput');
    if (titleInput) {
        titleInput.focus();
    }
};
</script>

<!-- Include Font Awesome for icon previews -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endsection