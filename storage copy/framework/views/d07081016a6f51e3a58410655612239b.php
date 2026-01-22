

<?php $__env->startSection('title', 'Faculties Management'); ?>

<?php $__env->startSection('content'); ?>
<div class="space-y-6">
    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Faculties Management</h1>
            <p class="text-gray-600 mt-2">Manage all faculty departments and their information</p>
        </div>
        <div class="flex items-center space-x-3">
            <div class="relative">
                <input type="search" 
                       placeholder="Search faculties..." 
                       class="pl-10 pr-4 py-2.5 bg-white border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-transparent w-full sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="<?php echo e(route('admin.faculties.create')); ?>" 
               class="px-5 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2">
                <i class="fas fa-plus"></i>
                <span>Add Faculty</span>
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-gradient-to-br from-blue-50 to-indigo-50 border border-blue-100 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-blue-600">Total Faculties</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($faculties->count()); ?></p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-building text-blue-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-green-50 to-emerald-50 border border-green-100 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-green-600">Active Faculties</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($faculties->where('is_active', true)->count()); ?></p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                </div>
            </div>
        </div>
        
        <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-100 rounded-2xl p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-purple-600">Featured</p>
                    <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($faculties->where('is_featured', true)->count()); ?></p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                    <i class="fas fa-star text-purple-600 text-xl"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-2xl p-4 flex items-start space-x-3 animate-fade-in">
        <div class="flex-shrink-0 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
            <i class="fas fa-check text-green-600 text-sm"></i>
        </div>
        <div class="flex-1">
            <p class="text-green-800 font-medium"><?php echo e(session('success')); ?></p>
        </div>
        <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
            <i class="fas fa-times"></i>
        </button>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Faculties Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group bg-white border border-gray-200 rounded-2xl p-6 hover:border-indigo-300 hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                <!-- Faculty Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex-1">
                        <div class="flex items-center space-x-2 mb-2">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-900 text-lg group-hover:text-indigo-700 transition-colors">
                                    <?php echo e($faculty->name); ?>

                                </h3>
                                <div class="flex items-center space-x-2 mt-1">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculty->is_active): ?>
                                        <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full font-medium">
                                            Active
                                        </span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 bg-red-100 text-red-800 text-xs rounded-full font-medium">
                                            Inactive
                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculty->is_featured): ?>
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full font-medium">
                                            Featured
                                        </span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Description -->
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                            <?php echo e($faculty->description ?? 'No description available'); ?>

                        </p>
                    </div>
                </div>

                <!-- Faculty Details -->
                <div class="space-y-3 mb-6">
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-list-ol w-4 text-center mr-2 text-indigo-500"></i>
                        <span>Order: <span class="font-medium text-gray-900"><?php echo e($faculty->order ?? 0); ?></span></span>
                    </div>
                    
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculty->established_at): ?>
                    <div class="flex items-center text-sm text-gray-500">
                        <i class="fas fa-calendar-alt w-4 text-center mr-2 text-indigo-500"></i>
                        <span>Established: <span class="font-medium text-gray-900"><?php echo e($faculty->established_at->format('M d, Y')); ?></span></span>
                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                    <div class="flex items-center space-x-2">
                        <a href="<?php echo e(route('admin.faculties.edit', $faculty->id)); ?>" 
                           class="px-4 py-2 bg-indigo-50 text-indigo-700 rounded-xl hover:bg-indigo-100 transition-colors duration-200 flex items-center space-x-2 group/edit">
                            <i class="fas fa-edit text-sm"></i>
                            <span class="text-sm font-medium">Edit</span>
                        </a>
                        
                        <button onclick="showFacultyDetails(<?php echo e($faculty->id); ?>)" 
                                class="px-4 py-2 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-colors duration-200 flex items-center space-x-2">
                            <i class="fas fa-eye text-sm"></i>
                            <span class="text-sm font-medium">View</span>
                        </button>
                    </div>
                    
                    <form action="<?php echo e(route('admin.faculties.destroy', $faculty->id)); ?>" method="POST" 
                          onsubmit="return confirmDelete(event)">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="px-4 py-2 bg-red-50 text-red-700 rounded-xl hover:bg-red-100 transition-colors duration-200 flex items-center space-x-2">
                            <i class="fas fa-trash text-sm"></i>
                            <span class="text-sm font-medium">Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <!-- Empty State -->
            <div class="md:col-span-2 lg:col-span-3">
                <div class="text-center py-12">
                    <div class="w-24 h-24 bg-gradient-to-br from-gray-100 to-gray-200 rounded-full flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-building text-gray-400 text-3xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No faculties yet</h3>
                    <p class="text-gray-600 max-w-md mx-auto mb-6">
                        Get started by adding your first faculty department. This will help organize your university structure.
                    </p>
                    <a href="<?php echo e(route('admin.faculties.create')); ?>" 
                       class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-xl hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-xl inline-flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Add Your First Faculty</span>
                    </a>
                </div>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    <!-- Pagination -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculties->hasPages()): ?>
    <div class="bg-white border border-gray-200 rounded-2xl px-6 py-4 flex items-center justify-between">
        <div class="text-sm text-gray-700">
            Showing <?php echo e($faculties->firstItem()); ?> to <?php echo e($faculties->lastItem()); ?> of <?php echo e($faculties->total()); ?> results
        </div>
        <div class="flex items-center space-x-2">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculties->onFirstPage()): ?>
                <span class="px-3 py-1.5 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    <i class="fas fa-chevron-left"></i>
                </span>
            <?php else: ?>
                <a href="<?php echo e($faculties->previousPageUrl()); ?>" 
                   class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-chevron-left"></i>
                </a>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faculties->getUrlRange(1, $faculties->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($page == $faculties->currentPage()): ?>
                    <span class="px-3 py-1.5 bg-indigo-600 text-white rounded-lg"><?php echo e($page); ?></span>
                <?php else: ?>
                    <a href="<?php echo e($url); ?>" 
                       class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                        <?php echo e($page); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($faculties->hasMorePages()): ?>
                <a href="<?php echo e($faculties->nextPageUrl()); ?>" 
                   class="px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition-colors">
                    <i class="fas fa-chevron-right"></i>
                </a>
            <?php else: ?>
                <span class="px-3 py-1.5 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                    <i class="fas fa-chevron-right"></i>
                </span>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

<!-- Faculty Details Modal -->
<div id="facultyModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center p-4 z-50">
    <div class="bg-white rounded-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden">
        <div class="p-6 border-b border-gray-200 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-900">Faculty Details</h3>
            <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>
        <div id="facultyDetails" class="p-6 overflow-y-auto max-h-[calc(90vh-120px)]">
            <!-- Content will be loaded via AJAX -->
        </div>
        <div class="p-6 border-t border-gray-200 flex justify-end space-x-3">
            <button onclick="closeModal()" 
                    class="px-5 py-2.5 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition-colors">
                Close
            </button>
            <a id="editFacultyBtn" 
               class="px-5 py-2.5 bg-indigo-600 text-white rounded-xl hover:bg-indigo-700 transition-colors">
                Edit Faculty
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
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
    
    .shadow-hover {
        transition: all 0.3s ease;
    }
    
    .shadow-hover:hover {
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
    // Confirm delete
    function confirmDelete(event) {
        event.preventDefault();
        const form = event.target;
        
        Swal.fire({
            title: 'Are you sure?',
            text: "This faculty will be permanently deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#DC2626',
            cancelButtonColor: '#6B7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    }
    
    // Show faculty details modal
    function showFacultyDetails(facultyId) {
        fetch(`/admin/faculties/${facultyId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('facultyDetails').innerHTML = `
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-white text-2xl"></i>
                            </div>
                            <div>
                                <h4 class="text-xl font-bold text-gray-900">${data.name}</h4>
                                <div class="flex items-center space-x-2 mt-2">
                                    ${data.is_active ? 
                                        '<span class="px-3 py-1 bg-green-100 text-green-800 text-sm rounded-full font-medium">Active</span>' : 
                                        '<span class="px-3 py-1 bg-red-100 text-red-800 text-sm rounded-full font-medium">Inactive</span>'
                                    }
                                    ${data.is_featured ? 
                                        '<span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-sm rounded-full font-medium">Featured</span>' : 
                                        ''
                                    }
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <h5 class="font-semibold text-gray-900 mb-2">Description</h5>
                            <p class="text-gray-600 bg-gray-50 p-4 rounded-xl">${data.description || 'No description available'}</p>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-blue-50 p-4 rounded-xl">
                                <p class="text-sm text-blue-600 mb-1">Order Position</p>
                                <p class="text-2xl font-bold text-gray-900">${data.order || 0}</p>
                            </div>
                            ${data.established_at ? `
                                <div class="bg-green-50 p-4 rounded-xl">
                                    <p class="text-sm text-green-600 mb-1">Established</p>
                                    <p class="text-lg font-bold text-gray-900">${new Date(data.established_at).toLocaleDateString('en-US', { month: 'long', day: 'numeric', year: 'numeric' })}</p>
                                </div>
                            ` : ''}
                        </div>
                        
                        ${data.created_at ? `
                            <div class="border-t border-gray-200 pt-4">
                                <div class="grid grid-cols-2 gap-4 text-sm text-gray-500">
                                    <div>
                                        <p class="font-medium text-gray-700">Created</p>
                                        <p>${new Date(data.created_at).toLocaleDateString('en-US', { 
                                            year: 'numeric', 
                                            month: 'long', 
                                            day: 'numeric',
                                            hour: '2-digit',
                                            minute: '2-digit'
                                        })}</p>
                                    </div>
                                    ${data.updated_at ? `
                                        <div>
                                            <p class="font-medium text-gray-700">Last Updated</p>
                                            <p>${new Date(data.updated_at).toLocaleDateString('en-US', { 
                                                year: 'numeric', 
                                                month: 'long', 
                                                day: 'numeric',
                                                hour: '2-digit',
                                                minute: '2-digit'
                                            })}</p>
                                        </div>
                                    ` : ''}
                                </div>
                            </div>
                        ` : ''}
                    </div>
                `;
                
                // Set edit button href
                document.getElementById('editFacultyBtn').href = `/admin/faculties/${facultyId}/edit`;
                
                // Show modal
                document.getElementById('facultyModal').classList.remove('hidden');
                document.getElementById('facultyModal').classList.add('flex');
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'Failed to load faculty details', 'error');
            });
    }
    
    // Close modal
    function closeModal() {
        document.getElementById('facultyModal').classList.add('hidden');
        document.getElementById('facultyModal').classList.remove('flex');
    }
    
    // Close modal on ESC key
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
    
    // Close modal when clicking outside
    document.getElementById('facultyModal').addEventListener('click', (event) => {
        if (event.target === document.getElementById('facultyModal')) {
            closeModal();
        }
    });
    
    // Search functionality
    const searchInput = document.querySelector('input[type="search"]');
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const facultyCards = document.querySelectorAll('.group.bg-white');
            
            facultyCards.forEach(card => {
                const name = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                
                if (name.includes(searchTerm) || description.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        }, 300));
    }
    
    // Debounce function for search
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
</script>

<!-- SweetAlert2 for better alerts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/faculties/index.blade.php ENDPATH**/ ?>