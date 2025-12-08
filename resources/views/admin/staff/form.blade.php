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
                           value="{{ old('name', $staff->name ?? '') }}"
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
                           value="{{ old('position', $staff->position ?? '') }}"
                           required
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="e.g., Professor, Director">
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
                           value="{{ old('order', $staff->order ?? 0) }}"
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

    {{-- Contact Information Section --}}
    <div class="pb-6 border-b border-gray-200">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-gradient-to-r from-green-100 to-emerald-100 rounded-lg">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Contact Information (Optional)</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Email Field --}}
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Email Address
                </label>
                <div class="relative">
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email', $staff->email ?? '') }}"
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="john.doe@caeda.edu.kh">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                </div>
                @error('email') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Phone Field --}}
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                    Phone Number
                </label>
                <div class="relative">
                    <input type="tel" 
                           name="phone" 
                           id="phone" 
                           value="{{ old('phone', $staff->phone ?? '') }}"
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="+855 12 345 678">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                        </svg>
                    </div>
                </div>
                @error('phone') 
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

    {{-- Department & Bio Section --}}
    <div class="pb-6 border-b border-gray-200">
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-gradient-to-r from-purple-100 to-violet-100 rounded-lg">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h3 class="text-lg font-semibold text-gray-900">Department & Biography</h3>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Department Field --}}
            <div>
                <label for="department" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    Department
                </label>
                <div class="relative">
                    <input type="text" 
                           name="department" 
                           id="department" 
                           value="{{ old('department', $staff->department ?? '') }}"
                           class="w-full pl-11 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                           placeholder="e.g., Computer Science, Administration">
                    <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                </div>
                @error('department') 
                    <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                @enderror
            </div>
        </div>

        {{-- Bio Field --}}
        <div class="mt-6">
            <label for="bio" class="block text-sm font-medium text-gray-700 mb-2 flex items-center gap-2">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                Biography (Optional)
            </label>
            <div class="relative">
                <textarea name="bio" 
                          id="bio" 
                          rows="4"
                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"
                          placeholder="Brief biography about the staff member...">{{ old('bio', $staff->bio ?? '') }}</textarea>
                <div class="absolute right-3 top-3">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                    </svg>
                </div>
            </div>
            <div class="flex justify-between items-center mt-2">
                <p class="text-xs text-gray-500">Optional: Short description of the staff member's role and background</p>
                <span id="charCount" class="text-xs text-gray-400">0/1000 characters</span>
            </div>
            @error('bio') 
                <p class="mt-2 text-sm text-red-600 flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $message }}
                </p>
            @enderror
        </div>
    </div>

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
        @if(isset($staff) && $staff->image)
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Photo</label>
                <div class="relative w-48 h-48 rounded-2xl overflow-hidden border-4 border-white shadow-lg">
                    <img src="{{ asset('storage/' . $staff->image) }}" 
                         alt="{{ $staff->name }}" 
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
                {{ isset($staff) && $staff->image ? 'Update Photo (Optional)' : 'Upload Photo (Optional)' }}
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
                            @if(isset($staff) && $staff->image)
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

{{-- Character Count Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const bioTextarea = document.getElementById('bio');
        const charCount = document.getElementById('charCount');
        
        if (bioTextarea && charCount) {
            function updateCharCount() {
                const length = bioTextarea.value.length;
                charCount.textContent = `${length}/1000 characters`;
                
                if (length > 1000) {
                    charCount.classList.remove('text-gray-400');
                    charCount.classList.add('text-red-500');
                } else {
                    charCount.classList.remove('text-red-500');
                    charCount.classList.add('text-gray-400');
                }
            }
            
            // Initial count
            updateCharCount();
            
            // Update on input
            bioTextarea.addEventListener('input', updateCharCount);
            
            // Prevent typing beyond limit
            bioTextarea.addEventListener('keydown', function(e) {
                if (this.value.length >= 1000 && 
                    e.keyCode !== 8 && // backspace
                    e.keyCode !== 46 && // delete
                    e.keyCode !== 37 && // left arrow
                    e.keyCode !== 38 && // up arrow
                    e.keyCode !== 39 && // right arrow
                    e.keyCode !== 40 && // down arrow
                    !e.ctrlKey && !e.metaKey) {
                    e.preventDefault();
                }
            });
        }

        // Image upload preview
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
                    @if(isset($staff) && $staff->image)
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
</script>