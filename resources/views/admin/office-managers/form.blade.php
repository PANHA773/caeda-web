<div class="space-y-8">

    {{-- Basic Information Section --}}
    <div class="pb-6 border-b border-gray-200">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-gradient-to-r from-blue-100 to-indigo-100 rounded-lg">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Basic Information</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Name Field --}}
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                    Full Name *
                </label>
                <div class="relative">
                    <input type="text" 
                           name="name" 
                           id="name" 
                           value="{{ old('name', $officeManager->name ?? '') }}"
                           required
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="John Doe">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                </div>
                @error('name') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Position Field --}}
            <div>
                <label for="position" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Position *
                </label>
                <div class="relative">
                    <input type="text" 
                           name="position" 
                           id="position" 
                           value="{{ old('position', $officeManager->position ?? '') }}"
                           required
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="e.g., Office Manager, Senior Manager">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                @error('position') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Gradient Field --}}
            <div>
                <label for="gradient" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                    </svg>
                    Gradient Classes
                </label>
                <div class="relative">
                    <input type="text" 
                           name="gradient" 
                           id="gradient" 
                           value="{{ old('gradient', $officeManager->gradient ?? '') }}"
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="from-blue-500 to-indigo-600">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                        </svg>
                    </div>
                </div>
                <div class="mt-2 space-y-2">
                    <p class="text-xs text-gray-500">Tailwind gradient classes for avatar background</p>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" onclick="setGradient('from-blue-500 to-indigo-600')" 
                                class="text-xs px-3 py-1 rounded-lg bg-gradient-to-r from-blue-500 to-indigo-600 text-white hover:opacity-90 transition">
                            Blue-Indigo
                        </button>
                        <button type="button" onclick="setGradient('from-purple-500 to-pink-600')" 
                                class="text-xs px-3 py-1 rounded-lg bg-gradient-to-r from-purple-500 to-pink-600 text-white hover:opacity-90 transition">
                            Purple-Pink
                        </button>
                        <button type="button" onclick="setGradient('from-green-500 to-emerald-600')" 
                                class="text-xs px-3 py-1 rounded-lg bg-gradient-to-r from-green-500 to-emerald-600 text-white hover:opacity-90 transition">
                            Green-Emerald
                        </button>
                        <button type="button" onclick="setGradient('from-orange-500 to-red-600')" 
                                class="text-xs px-3 py-1 rounded-lg bg-gradient-to-r from-orange-500 to-red-600 text-white hover:opacity-90 transition">
                            Orange-Red
                        </button>
                    </div>
                </div>
                @error('gradient') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Order Field --}}
            <div>
                <label for="order" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                    Display Order
                </label>
                <div class="relative w-32">
                    <input type="number" 
                           name="order" 
                           id="order" 
                           value="{{ old('order', $officeManager->order ?? 0) }}"
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">Lower numbers appear first in the list</p>
                @error('order') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Gradient Preview --}}
    @if(isset($officeManager) && $officeManager->gradient || old('gradient'))
    <div class="pb-6 border-b border-gray-200">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-gradient-to-r from-purple-100 to-violet-100 rounded-lg">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Gradient Preview</h3>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p class="text-sm text-gray-500 mb-2">Current Gradient:</p>
                <div class="flex items-center gap-3">
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-r {{ old('gradient', $officeManager->gradient ?? 'from-blue-500 to-indigo-600') }} flex items-center justify-center text-white font-semibold text-lg">
                        {{ strtoupper(substr(old('name', $officeManager->name ?? 'OM'), 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Avatar Preview</p>
                        <p class="text-xs text-gray-500">{{ old('gradient', $officeManager->gradient ?? 'from-blue-500 to-indigo-600') }}</p>
                    </div>
                </div>
            </div>
            
            <div>
                <p class="text-sm text-gray-500 mb-2">Gradient Classes:</p>
                <div class="p-4 bg-gray-50 rounded-xl">
                    <code class="text-sm bg-white p-2 rounded border block">
                        bg-gradient-to-r {{ old('gradient', $officeManager->gradient ?? 'from-blue-500 to-indigo-600') }}
                    </code>
                    <p class="text-xs text-gray-500 mt-2">Copy these classes for other styling</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- Image Upload Section --}}
    <div>
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-gradient-to-r from-orange-100 to-amber-100 rounded-lg">
                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Profile Photo</h3>
        </div>

        {{-- Current Photo Display --}}
        @if(isset($officeManager) && $officeManager->image_url)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Photo</label>
                <div class="relative w-48 h-48 rounded-2xl overflow-hidden border-4 border-white shadow-lg">
                    <img src="{{ $officeManager->image_url }}" 
                         alt="{{ $officeManager->name }}" 
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 text-white">
                        <p class="text-sm font-medium">Current Photo</p>
                    </div>
                </div>
                <p class="text-xs text-gray-500 mt-2">This is the currently uploaded photo</p>
            </div>
        @endif

        {{-- New Photo Upload --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                {{ isset($officeManager) && $officeManager->image ? 'Update Photo (Optional)' : 'Upload Photo (Optional)' }}
            </label>
            
            <div class="space-y-4">
                {{-- Preview --}}
                <div id="previewContainer" class="hidden">
                    <div class="text-sm text-gray-500 mb-2">Preview:</div>
                    <div class="relative w-48 h-48 rounded-2xl overflow-hidden border-4 border-white shadow-lg">
                        <img id="previewImage" 
                             class="w-full h-full object-cover">
                        <button type="button" 
                                onclick="removeImage()"
                                class="absolute top-2 right-2 p-1 bg-red-500 text-white rounded-full hover:bg-red-600 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Upload Area --}}
                <div id="uploadArea" 
                     class="border-2 border-dashed border-gray-300 rounded-2xl p-8 text-center hover:border-blue-400 hover:bg-blue-50 transition cursor-pointer"
                     onclick="document.getElementById('image').click()">
                    <input type="file" 
                           name="image" 
                           id="image" 
                           accept="image/*"
                           class="hidden">
                    
                    <div class="flex flex-col items-center">
                        <div class="w-12 h-12 mb-4 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-1">
                                <span class="text-blue-500">Click to upload</span> or drag and drop
                            </p>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                            @if(isset($officeManager) && $officeManager->image_url)
                                <p class="text-xs text-gray-400 mt-1">Leave empty to keep current photo</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @error('image') 
                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

</div>

{{-- Scripts --}}
<script>
    // Gradient preset buttons
    function setGradient(gradient) {
        document.getElementById('gradient').value = gradient;
        
        // Trigger a change event to update preview if it exists
        const event = new Event('input', { bubbles: true });
        document.getElementById('gradient').dispatchEvent(event);
        
        // Show a success message
        showToast('Gradient set to: ' + gradient);
    }

    // Image upload preview
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        if (imageInput) {
            imageInput.addEventListener('change', function(e) {
                let file = e.target.files[0];
                let preview = document.getElementById('previewImage');
                let previewContainer = document.getElementById('previewContainer');
                let uploadArea = document.getElementById('uploadArea');

                if (file) {
                    // Show preview
                    preview.src = URL.createObjectURL(file);
                    previewContainer.classList.remove('hidden');
                    uploadArea.classList.add('hidden');
                    
                    // Add file info
                    uploadArea.innerHTML = `
                        <input type="file" name="image" id="image" accept="image/*" class="hidden">
                        <div class="flex flex-col items-center">
                            <div class="w-12 h-12 mb-4 bg-green-100 rounded-xl flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                            </div>
                            <div class="text-center">
                                <p class="text-sm font-medium text-gray-700 mb-1">${file.name}</p>
                                <p class="text-xs text-gray-500">${(file.size / 1024 / 1024).toFixed(2)} MB</p>
                                <button type="button" onclick="changeImage()" class="mt-2 text-sm text-blue-500 hover:text-blue-600">
                                    Change Image
                                </button>
                            </div>
                        </div>
                    `;
                }
            });
        }

        // Gradient preview update on input
        const gradientInput = document.getElementById('gradient');
        if (gradientInput) {
            gradientInput.addEventListener('input', function() {
                // This would update the preview if we had a live preview element
                // For now, we just update the preview section if it exists
                const previewSection = document.querySelector('[id^="gradientPreview"]');
                if (previewSection) {
                    // Update preview logic here
                }
            });
        }
    });

    function removeImage() {
        document.getElementById('image').value = '';
        document.getElementById('previewContainer').classList.add('hidden');
        document.getElementById('uploadArea').classList.remove('hidden');
        
        // Reset upload area to original state
        document.getElementById('uploadArea').innerHTML = `
            <input type="file" name="image" id="image" accept="image/*" class="hidden">
            <div class="flex flex-col items-center">
                <div class="w-12 h-12 mb-4 bg-blue-100 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-700 mb-1">
                        <span class="text-blue-500">Click to upload</span> or drag and drop
                    </p>
                    <p class="text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                    @if(isset($officeManager) && $officeManager->image)
                        <p class="text-xs text-gray-400 mt-1">Leave empty to keep current photo</p>
                    @endif
                </div>
            </div>
        `;
        
        // Reattach event listener
        document.getElementById('image').addEventListener('change', function(e) {
            window.dispatchEvent(new Event('imageChange'));
        });
    }

    function changeImage() {
        document.getElementById('image').click();
    }

    // Make upload area draggable
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('uploadArea');
        
        if (uploadArea) {
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, preventDefaults, false);
            });

            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }

            ['dragenter', 'dragover'].forEach(eventName => {
                uploadArea.addEventListener(eventName, highlight, false);
            });

            ['dragleave', 'drop'].forEach(eventName => {
                uploadArea.addEventListener(eventName, unhighlight, false);
            });

            function highlight() {
                uploadArea.classList.add('border-blue-400', 'bg-blue-50');
            }

            function unhighlight() {
                uploadArea.classList.remove('border-blue-400', 'bg-blue-50');
            }

            uploadArea.addEventListener('drop', handleDrop, false);

            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                document.getElementById('image').files = files;
                
                // Trigger change event
                const event = new Event('change');
                document.getElementById('image').dispatchEvent(event);
            }
        }
    });

    // Toast notification function
    function showToast(message) {
        // Create toast element
        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-gray-800 text-white px-4 py-3 rounded-lg shadow-lg z-50 transform translate-x-full transition-transform duration-300';
        toast.textContent = message;
        
        // Add to page
        document.body.appendChild(toast);
        
        // Animate in
        setTimeout(() => {
            toast.classList.remove('translate-x-full');
        }, 10);
        
        // Remove after 3 seconds
        setTimeout(() => {
            toast.classList.add('translate-x-full');
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 300);
        }, 3000);
    }
</script>