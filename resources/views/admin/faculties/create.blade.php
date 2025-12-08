@extends('admin.layouts.app')

@section('title', 'Add New Faculty')

@section('content')
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <div class="flex items-center space-x-3 mb-2">
                <a href="{{ route('admin.faculties.index') }}" 
                   class="text-indigo-600 hover:text-indigo-800 transition-colors">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Add New Faculty</h1>
            </div>
            <p class="text-gray-600">Create a new faculty department for your university</p>
        </div>
        <div class="flex items-center space-x-3">
            <a href="{{ route('admin.faculties.index') }}" 
               class="px-5 py-2.5 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 flex items-center space-x-2">
                <i class="fas fa-list"></i>
                <span>View All</span>
            </a>
        </div>
    </div>

    <!-- Form Container -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form -->
        <div class="lg:col-span-2">
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">
                <!-- Form Header -->
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 px-6 py-5 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-900">Faculty Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Fill in the details below to create a new faculty</p>
                </div>

                <!-- Form Content -->
                <form action="{{ route('admin.faculties.store') }}" method="POST" class="p-6 space-y-6">
                    @csrf

                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 rounded-xl p-4 animate-fade-in">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-5 h-5 bg-red-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-exclamation-circle text-red-600 text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-medium text-red-800 mb-2">Please fix the following errors:</h3>
                                    <ul class="list-disc pl-5 space-y-1 text-sm text-red-700">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Name Field -->
                    <div class="space-y-2">
                        <label for="name" class="block">
                            <span class="text-gray-900 font-medium">Faculty Name</span>
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-graduation-cap text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   placeholder="e.g., Faculty of Information Technology"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300"
                                   required>
                        </div>
                        <p class="text-sm text-gray-500">Enter the full name of the faculty</p>
                    </div>

                    <!-- Slug Field (Optional) -->
                    <div class="space-y-2">
                        <label for="slug" class="block">
                            <span class="text-gray-900 font-medium">URL Slug</span>
                            <span class="text-gray-500 text-sm ml-2">(Optional)</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fas fa-link text-gray-400"></i>
                            </div>
                            <input type="text" 
                                   id="slug" 
                                   name="slug" 
                                   value="{{ old('slug') }}" 
                                   placeholder="e.g., information-technology"
                                   class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                        </div>
                        <p class="text-sm text-gray-500">SEO-friendly URL identifier</p>
                    </div>

                    <!-- Description Field -->
                    <div class="space-y-2">
                        <label for="description" class="block">
                            <span class="text-gray-900 font-medium">Description</span>
                        </label>
                        <div class="relative">
                            <div class="absolute top-3 left-3 pointer-events-none">
                                <i class="fas fa-align-left text-gray-400"></i>
                            </div>
                            <textarea id="description" 
                                      name="description" 
                                      rows="6"
                                      placeholder="Describe the faculty's mission, programs, and key features..."
                                      class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300 resize-none">{{ old('description') }}</textarea>
                        </div>
                        <div class="flex justify-between items-center">
                            <p class="text-sm text-gray-500">Brief overview of the faculty</p>
                            <span id="charCount" class="text-sm text-gray-400">0/500</span>
                        </div>
                    </div>

                    <!-- Additional Fields Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Order Field -->
                        <div class="space-y-2">
                            <label for="order" class="block">
                                <span class="text-gray-900 font-medium">Display Order</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-sort-numeric-up text-gray-400"></i>
                                </div>
                                <input type="number" 
                                       id="order" 
                                       name="order" 
                                       value="{{ old('order', 0) }}" 
                                       min="0"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            </div>
                            <p class="text-sm text-gray-500">Controls display sequence</p>
                        </div>

                        <!-- Established Date -->
                        <div class="space-y-2">
                            <label for="established_at" class="block">
                                <span class="text-gray-900 font-medium">Established Date</span>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <i class="fas fa-calendar-alt text-gray-400"></i>
                                </div>
                                <input type="date" 
                                       id="established_at" 
                                       name="established_at" 
                                       value="{{ old('established_at') }}"
                                       class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300">
                            </div>
                            <p class="text-sm text-gray-500">When was this faculty established?</p>
                        </div>
                    </div>

                    <!-- Status Toggles -->
                    <div class="space-y-4">
                        <h3 class="font-medium text-gray-900">Status & Visibility</h3>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Active Status -->
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Active</h4>
                                        <p class="text-sm text-gray-500">Show on website</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_active" 
                                           value="1" 
                                           {{ old('is_active', true) ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-green-500"></div>
                                </label>
                            </div>

                            <!-- Featured Status -->
                            <div class="flex items-center justify-between p-4 border border-gray-200 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-star text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Featured</h4>
                                        <p class="text-sm text-gray-500">Highlight on homepage</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_featured" 
                                           value="1" 
                                           {{ old('is_featured') ? 'checked' : '' }}
                                           class="sr-only peer">
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-indigo-100 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-yellow-500"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-500">
                            <i class="fas fa-info-circle text-indigo-500"></i>
                            <span>All fields marked with <span class="text-red-500">*</span> are required</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <a href="{{ route('admin.faculties.index') }}" 
                               class="px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-xl hover:bg-gray-50 transition-all duration-300 flex items-center space-x-2">
                                <i class="fas fa-times"></i>
                                <span>Cancel</span>
                            </a>
                            <button type="submit" 
                                    class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                                <i class="fas fa-plus"></i>
                                <span>Create Faculty</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Sidebar - Help & Tips -->
        <div class="space-y-6">
            <!-- Help Card -->
            <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-200 rounded-2xl p-6">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-question-circle text-blue-600 text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Quick Tips</h3>
                </div>
                <ul class="space-y-3 text-sm text-gray-700">
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                        <span>Use descriptive names that clearly identify the faculty</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                        <span>Add a compelling description to attract students</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                        <span>Set display order to control listing sequence</span>
                    </li>
                    <li class="flex items-start space-x-2">
                        <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                        <span>Featured faculties appear prominently on the homepage</span>
                    </li>
                </ul>
            </div>

            <!-- Preview Card -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center space-x-3 mb-4">
                    <div class="w-10 h-10 bg-purple-100 rounded-xl flex items-center justify-center">
                        <i class="fas fa-eye text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="font-semibold text-gray-900">Live Preview</h3>
                </div>
                <div id="previewCard" class="border border-gray-200 rounded-xl p-4 bg-gray-50">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900" id="previewName">Faculty Name</h4>
                            <div class="flex items-center space-x-2 mt-1">
                                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full font-medium" id="previewStatus">Active</span>
                                <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full font-medium hidden" id="previewFeatured">Featured</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm text-gray-600 mt-3 line-clamp-2" id="previewDescription">
                        Description will appear here...
                    </p>
                </div>
                <p class="text-xs text-gray-500 mt-3">This is how the faculty will appear on the website</p>
            </div>

            <!-- Recent Faculties -->
            <div class="bg-white border border-gray-200 rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="font-semibold text-gray-900">Recent Faculties</h3>
                    <span class="text-xs text-indigo-600 bg-indigo-50 px-2 py-1 rounded-full">
                        {{ $recentFaculties->count() }} added
                    </span>
                </div>
                <div class="space-y-3">
                    @forelse($recentFaculties as $faculty)
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-xl transition-colors">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-lg flex items-center justify-center">
                                    <i class="fas fa-building text-white text-xs"></i>
                                </div>
                                <div>
                                    <h4 class="text-sm font-medium text-gray-900">{{ $faculty->name }}</h4>
                                    <p class="text-xs text-gray-500">{{ $faculty->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            @if($faculty->is_active)
                                <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                            @endif
                        </div>
                    @empty
                        <p class="text-sm text-gray-500 text-center py-4">No faculties added yet</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in-out;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    /* Custom checkbox styling */
    input:checked + div {
        background-color: #10B981; /* green-500 */
    }
    
    input:checked + div:after {
        transform: translateX(100%);
    }
    
    /* Character count warning */
    #charCount.warning {
        color: #F59E0B; /* amber-500 */
    }
    
    #charCount.danger {
        color: #DC2626; /* red-600 */
    }
</style>
@endpush

@push('scripts')
<script>
    // Character count for description
    const descriptionTextarea = document.getElementById('description');
    const charCount = document.getElementById('charCount');
    const maxLength = 500;

    if (descriptionTextarea && charCount) {
        descriptionTextarea.addEventListener('input', function() {
            const length = this.value.length;
            charCount.textContent = `${length}/${maxLength}`;
            
            // Update color based on length
            if (length > maxLength * 0.9) {
                charCount.classList.remove('warning');
                charCount.classList.add('danger');
            } else if (length > maxLength * 0.7) {
                charCount.classList.add('warning');
                charCount.classList.remove('danger');
            } else {
                charCount.classList.remove('warning', 'danger');
            }
        });

        // Initial count
        charCount.textContent = `${descriptionTextarea.value.length}/${maxLength}`;
    }

    // Live preview updates
    const nameInput = document.getElementById('name');
    const descriptionInput = document.getElementById('description');
    const isActiveCheckbox = document.querySelector('input[name="is_active"]');
    const isFeaturedCheckbox = document.querySelector('input[name="is_featured"]');
    
    const previewName = document.getElementById('previewName');
    const previewDescription = document.getElementById('previewDescription');
    const previewStatus = document.getElementById('previewStatus');
    const previewFeatured = document.getElementById('previewFeatured');

    function updatePreview() {
        // Update name
        previewName.textContent = nameInput.value || 'Faculty Name';
        
        // Update description
        const description = descriptionInput.value || 'Description will appear here...';
        previewDescription.textContent = description.length > 100 ? description.substring(0, 100) + '...' : description;
        
        // Update status
        if (isActiveCheckbox && isActiveCheckbox.checked) {
            previewStatus.textContent = 'Active';
            previewStatus.className = 'px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full font-medium';
        } else {
            previewStatus.textContent = 'Inactive';
            previewStatus.className = 'px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full font-medium';
        }
        
        // Update featured
        if (isFeaturedCheckbox && isFeaturedCheckbox.checked) {
            previewFeatured.classList.remove('hidden');
        } else {
            previewFeatured.classList.add('hidden');
        }
    }

    // Add event listeners for live preview
    if (nameInput) nameInput.addEventListener('input', updatePreview);
    if (descriptionInput) descriptionInput.addEventListener('input', updatePreview);
    if (isActiveCheckbox) isActiveCheckbox.addEventListener('change', updatePreview);
    if (isFeaturedCheckbox) isFeaturedCheckbox.addEventListener('change', updatePreview);

    // Auto-generate slug from name
    nameInput.addEventListener('blur', function() {
        const name = this.value;
        const slugInput = document.getElementById('slug');
        
        if (name && (!slugInput.value || slugInput.value === '')) {
            // Generate slug: lowercase, replace spaces with hyphens, remove special chars
            const slug = name
                .toLowerCase()
                .replace(/[^a-z0-9\s-]/g, '') // Remove special chars
                .replace(/\s+/g, '-')         // Replace spaces with hyphens
                .replace(/-+/g, '-')          // Replace multiple hyphens with single
                .trim();
            
            slugInput.value = slug;
        }
    });

    // Form validation
    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(event) {
            const name = nameInput.value.trim();
            
            if (!name) {
                event.preventDefault();
                nameInput.focus();
                nameInput.classList.add('border-red-500');
                
                // Show error message
                Swal.fire({
                    icon: 'error',
                    title: 'Required Field',
                    text: 'Faculty name is required',
                    confirmButtonColor: '#4F46E5',
                });
            }
        });
    }

    // Auto-focus on first input
    document.addEventListener('DOMContentLoaded', function() {
        if (nameInput) {
            nameInput.focus();
        }
        updatePreview(); // Initialize preview
    });

    // Add keyboard shortcut for submit (Ctrl/Cmd + Enter)
    document.addEventListener('keydown', function(e) {
        if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.click();
            }
        }
    });
</script>

<!-- Include SweetAlert2 for better alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endpush