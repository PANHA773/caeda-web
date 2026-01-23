{{-- admin/partners/form.blade.php --}}
@csrf

@if(isset($partner))
    @method('PUT')
@endif

<div class="space-y-6">
    <!-- Basic Information -->
    <div class="space-y-6">
        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Basic Information</h3>
        
        <!-- Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Partner Name <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="name" 
                   id="name" 
                   value="{{ old('name', $partner->name ?? '') }}"
                   required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                   placeholder="Enter partner name">
            @error('name')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Website URL Field -->
        <div>
            <label for="website_url" class="block text-sm font-medium text-gray-700 mb-2">
                Website URL
            </label>
            <input type="url" 
                   name="website_url" 
                   id="website_url" 
                   value="{{ old('website_url', $partner->website_url ?? '') }}"
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                   placeholder="https://example.com">
            @error('website_url')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Description
            </label>
            <textarea name="description" 
                      id="description" 
                      rows="4"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                      placeholder="Enter partner description">{{ old('description', $partner->description ?? '') }}</textarea>
            @error('description')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <!-- Logo Section -->
    <div class="space-y-6">
        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Logo</h3>
        
        <!-- Current Logo Preview (for edit) -->
        @if(isset($partner) && $partner->logo)
            @php
                $currentLogo = $partner->logo;
                if (!preg_match('/^https?:\/\//', $currentLogo)) {
                    $currentLogo = asset('storage/' . $currentLogo);
                }
            @endphp
            <div class="bg-gray-50 rounded-xl p-6 border border-gray-200">
                <div class="flex items-start justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-700 mb-2">Current Logo</p>
                        <div class="flex items-center space-x-4">
                            <div class="relative group">
                                <div class="h-24 w-24 bg-white border border-gray-200 rounded-lg p-3 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-300 transition-all duration-200"
                                     onclick="openImageViewer('{{ $currentLogo }}', '{{ $partner->name }} Logo')">
                                    <img src="{{ $currentLogo }}" 
                                         alt="{{ $partner->name }}" 
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
                                <p class="mt-1">Upload a new logo to replace this one</p>
                            </div>
                        </div>
                    </div>
                    <button type="button" 
                            onclick="openImageViewer('{{ $currentLogo }}', '{{ $partner->name }} Logo')"
                            class="text-indigo-600 hover:text-indigo-800 text-sm font-medium whitespace-nowrap">
                        View Full Size
                    </button>
                </div>
            </div>
        @elseif(!isset($partner))
            <div class="bg-blue-50 border border-blue-100 rounded-xl p-6">
                <div class="flex items-center">
                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-blue-800">No logo has been uploaded yet. Upload a logo to display for this partner.</p>
                </div>
            </div>
        @endif

        <!-- Upload New Logo -->
        <div>
            <label for="logo" class="block text-sm font-medium text-gray-700 mb-2">
                @if(isset($partner) && $partner->logo)
                    Upload New Logo (Optional)
                @else
                    Upload Logo
                @endif
            </label>
            
            <!-- File Upload Area -->
            <div class="mt-1">
                <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors relative group">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400 group-hover:text-indigo-400 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600 justify-center">
                            <label for="logo" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span class="group-hover:text-indigo-500 transition-colors">Click to upload</span>
                                <input id="logo" name="logo" type="file" class="sr-only" accept="image/*">
                            </label>
                            <p class="pl-1 group-hover:text-gray-700 transition-colors">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500 group-hover:text-gray-600 transition-colors">PNG, JPG, GIF up to 5MB</p>
                    </div>
                    <div class="absolute inset-0 bg-indigo-50 opacity-0 group-hover:opacity-100 transition-opacity duration-200 rounded-xl pointer-events-none"></div>
                </div>
                
                <!-- Image Preview (for new uploads) -->
                <div id="logo-preview" class="mt-4 hidden">
                    <p class="text-sm text-gray-600 mb-2">
                        @if(isset($partner) && $partner->logo)
                            New Logo Preview:
                        @else
                            Logo Preview:
                        @endif
                    </p>
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <div id="logo-preview-container" class="h-24 w-24 bg-white border border-gray-200 rounded-lg p-3 flex items-center justify-center overflow-hidden cursor-pointer hover:ring-2 hover:ring-indigo-300 transition-all duration-200"
                                 onclick="openImageViewer(document.getElementById('logo-preview-image').src, 'Logo Preview')">
                                <img id="logo-preview-image" class="max-h-full max-w-full object-contain">
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
                                <p id="logo-file-name" class="font-medium"></p>
                                <p id="logo-file-size" class="text-gray-500"></p>
                                <p id="logo-file-dimensions" class="text-gray-500"></p>
                            </div>
                            <div class="mt-2 flex items-center space-x-3">
                                <button type="button" 
                                        onclick="removeLogo()"
                                        class="text-sm text-red-600 hover:text-red-800 hover:underline flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    @if(isset($partner) && $partner->logo)
                                        Remove new logo
                                    @else
                                        Remove logo
                                    @endif
                                </button>
                                @if(isset($partner) && $partner->logo)
                                <button type="button" 
                                        onclick="keepCurrentLogo()"
                                        class="text-sm text-green-600 hover:text-green-800 hover:underline flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Keep current logo
                                </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                
                @error('logo')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    <!-- Settings -->
    <div class="space-y-6">
        <h3 class="text-lg font-medium text-gray-900 pb-2 border-b border-gray-200">Settings</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Sort Order Field -->
            <div>
                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">
                    Display Order
                </label>
                <div class="relative">
                    <input type="number" 
                           name="sort_order" 
                           id="sort_order" 
                           value="{{ old('sort_order', $partner->sort_order ?? 0) }}"
                           min="0"
                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition"
                           placeholder="0">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <span class="text-gray-500">#</span>
                    </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Lower numbers appear first</p>
                @error('sort_order')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status Field -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <div class="flex items-center space-x-6">
                    <label class="flex items-center">
                        <input type="radio" 
                               name="is_active" 
                               value="1" 
                               {{ old('is_active', isset($partner) ? $partner->is_active : true) ? 'checked' : '' }}
                               class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                        <span class="ml-3 text-gray-700">Active</span>
                    </label>
                    <label class="flex items-center">
                        <input type="radio" 
                               name="is_active" 
                               value="0" 
                               {{ !old('is_active', isset($partner) ? $partner->is_active : true) ? 'checked' : '' }}
                               class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                        <span class="ml-3 text-gray-700">Inactive</span>
                    </label>
                </div>
                @error('is_active')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- Script for image preview -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const logoInput = document.getElementById('logo');
    const preview = document.getElementById('logo-preview');
    const previewImage = document.getElementById('logo-preview-image');
    const fileName = document.getElementById('logo-file-name');
    const fileSize = document.getElementById('logo-file-size');
    const fileDimensions = document.getElementById('logo-file-dimensions');
    
    if (logoInput) {
        logoInput.addEventListener('change', function(e) {
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
});

// Image viewer functions
let currentImageUrl = '';

function openImageViewer(imageUrl, title) {
    currentImageUrl = imageUrl;
    const modal = document.getElementById('imageViewerModal');
    const viewerImage = document.getElementById('viewerImage');
    const modalTitle = document.getElementById('modalTitle');
    const imageInfo = document.getElementById('imageInfo');
    
    // Check if modal exists, if not create it
    if (!modal) {
        createImageViewerModal();
    }
    
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

function createImageViewerModal() {
    // Create modal HTML
    const modalHTML = `
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
    `;
    
    // Append modal to body
    document.body.insertAdjacentHTML('beforeend', modalHTML);
    
    // Add event listeners
    const modalBackdrop = document.getElementById('modalBackdrop');
    if (modalBackdrop) {
        modalBackdrop.addEventListener('click', function() {
            closeImageViewer();
        });
    }
    
    // Add ESC key listener
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageViewer();
        }
    });
}

function closeImageViewer() {
    const modal = document.getElementById('imageViewerModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
}

function downloadImage() {
    if (currentImageUrl) {
        const link = document.createElement('a');
        link.href = currentImageUrl;
        link.download = 'partner-logo-' + Date.now() + '.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

function removeLogo() {
    const logoInput = document.getElementById('logo');
    const preview = document.getElementById('logo-preview');
    
    // Reset file input
    if (logoInput) {
        logoInput.value = '';
    }
    
    // Hide preview
    if (preview) {
        preview.classList.add('hidden');
    }
}

function keepCurrentLogo() {
    const logoInput = document.getElementById('logo');
    const preview = document.getElementById('logo-preview');
    
    // Reset file input
    if (logoInput) {
        logoInput.value = '';
    }
    
    // Hide preview
    if (preview) {
        preview.classList.add('hidden');
    }
    
    // Show a notification or message
    showNotification('Current logo will be kept', 'success');
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
</script>

<style>
#imageViewerModal {
    backdrop-filter: blur(4px);
}

#viewerImage {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>