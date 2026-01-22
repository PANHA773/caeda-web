

<?php $__env->startSection('title', 'Programs Management - Admin CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slide-in-right {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }
    
    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; }
    .animate-slide-in-right { animation: slide-in-right 0.4s ease-out forwards; }
    
    .stats-card {
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.18);
        transition: all 0.3s ease;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }
    
    .program-row {
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }
    
    .program-row:hover {
        background: rgba(59, 130, 246, 0.03);
        border-left-color: #3b82f6;
        transform: translateX(4px);
    }
    
    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .status-active { 
        background: linear-gradient(135deg, #10b981, #34d399); 
        color: white; 
    }
    
    .status-inactive { 
        background: linear-gradient(135deg, #6b7280, #9ca3af); 
        color: white; 
    }
    
    .status-featured { 
        background: linear-gradient(135deg, #f59e0b, #fbbf24); 
        color: #7c2d12; 
    }
    
    .level-badge {
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    
    .level-beginner { background: linear-gradient(135deg, #dbeafe, #93c5fd); color: #1e40af; }
    .level-intermediate { background: linear-gradient(135deg, #fef3c7, #fcd34d); color: #92400e; }
    .level-advanced { background: linear-gradient(135deg, #fce7f3, #f9a8d4); color: #831843; }
    .level-expert { background: linear-gradient(135deg, #dcfce7, #86efac); color: #14532d; }
    
    .category-tag {
        background: linear-gradient(135deg, #e0f2fe, #bae6fd);
        color: #0369a1;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 500;
    }
    
    .search-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    
    .filter-btn {
        transition: all 0.2s ease;
    }
    
    .filter-btn:hover {
        transform: translateY(-2px);
    }
    
    .pagination-btn {
        transition: all 0.2s ease;
    }
    
    .pagination-btn:hover:not(.disabled) {
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        transform: translateY(-2px);
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        
        
        <div class="mb-8 animate-fade-in-up">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Programs Management</h1>
                    <p class="text-gray-600 mt-2">Manage all educational programs on CAEDA platform</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="<?php echo e(route('admin.programs.create')); ?>" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Add New Program
                    </a>
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Programs</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($totalPrograms); ?></p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <i class="fas fa-graduation-cap text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Programs</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($activePrograms); ?></p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-xl">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Featured Programs</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e($featuredPrograms); ?></p>
                        </div>
                        <div class="p-3 bg-yellow-100 rounded-xl">
                            <i class="fas fa-star text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Students</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2"><?php echo e(number_format($totalStudents)); ?></p>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-xl">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <?php if(session('success')): ?>
            <div class="mb-8 p-5 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-xl animate-fade-in-up">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-semibold text-green-800">Success!</h3>
                        <p class="text-sm text-green-700 mt-1"><?php echo e(session('success')); ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="mb-8 bg-white rounded-2xl shadow-lg p-6 animate-fade-in-up">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               placeholder="Search programs by title, category, or description..." 
                               class="search-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none transition">
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <select class="filter-btn appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2.5 pr-8 focus:outline-none focus:border-blue-500 text-sm">
                            <option value="">All Categories</option>
                            <option value="Technology">Technology</option>
                            <option value="Business">Business</option>
                            <option value="Science">Science</option>
                            <option value="Arts">Arts</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                    
                    <div class="relative">
                        <select class="filter-btn appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2.5 pr-8 focus:outline-none focus:border-blue-500 text-sm">
                            <option value="">All Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                            <option value="featured">Featured</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in-up">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-graduation-cap mr-2 text-blue-600"></i> Program Details
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-chart-line mr-2 text-blue-600"></i> Level
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2 text-blue-600"></i> Students
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-dollar-sign mr-2 text-blue-600"></i> Price
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-info-circle mr-2 text-blue-600"></i> Status
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center">
                                    <i class="fas fa-cog mr-2 text-blue-600"></i> Actions
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="program-row">
                                <td class="px-6 py-5">
                                    <div class="flex items-start space-x-4">
                                        <div class="flex-shrink-0">
                                            <?php if($program->image): ?>
                                                <img class="h-12 w-12 rounded-lg object-cover" src="<?php echo e($program->image_url); ?>" alt="<?php echo e($program->title); ?>">
                                            <?php else: ?>
                                                <div class="h-12 w-12 rounded-lg bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                                                    <i class="fas fa-graduation-cap text-white"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="flex items-center">
                                                <p class="text-sm font-semibold text-gray-900 truncate">
                                                    <?php echo e($program->title); ?>

                                                </p>
                                                <?php if($program->has_discount): ?>
                                                    <span class="ml-2 text-xs font-bold bg-gradient-to-r from-green-500 to-emerald-600 text-white px-2 py-0.5 rounded">
                                                        <i class="fas fa-tag mr-1"></i> Discount
                                                    </span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mt-1 flex items-center space-x-2">
                                                <span class="category-tag"><?php echo e($program->category ?? 'General'); ?></span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="far fa-clock mr-1"></i><?php echo e($program->duration ?? 'Flexible'); ?>

                                                </span>
                                                <span class="text-xs text-gray-500">
                                                    <i class="fas fa-desktop mr-1"></i><?php echo e($program->mode ?? 'Online'); ?>

                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="level-badge level-<?php echo e($program->level ?? 'beginner'); ?>">
                                        <?php echo e(ucfirst($program->level ?? 'Beginner')); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center">
                                        <div class="mr-3">
                                            <div class="text-sm font-semibold text-gray-900"><?php echo e(number_format($program->students)); ?></div>
                                            <div class="text-xs text-gray-500">enrolled</div>
                                        </div>
                                        <div class="w-16">
                                            <div class="h-1.5 bg-gray-200 rounded-full overflow-hidden">
                                                   <div class="h-full bg-gradient-to-r from-blue-500 to-cyan-500" 
                                                       style="width: <?php echo e(min(100, ($program->students / max(100, $maxStudents)) * 100)); ?>%">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="space-y-1">
                                        <?php if($program->has_discount): ?>
                                            <div class="flex items-center">
                                                <span class="text-lg font-bold text-gray-900">
                                                    $<?php echo e(number_format($program->final_price, 2)); ?>

                                                </span>
                                                <span class="ml-2 text-sm text-gray-500 line-through">
                                                    $<?php echo e(number_format($program->tuition, 2)); ?>

                                                </span>
                                                <span class="ml-2 text-xs font-bold text-green-600 bg-green-50 px-2 py-0.5 rounded">
                                                    Save <?php echo e($program->discount_percentage); ?>%
                                                </span>
                                            </div>
                                        <?php else: ?>
                                            <div class="text-lg font-bold text-gray-900">
                                                $<?php echo e(number_format($program->final_price, 2)); ?>

                                            </div>
                                        <?php endif; ?>
                                        <div class="text-xs text-gray-500">
                                            <i class="fas fa-star text-yellow-400 mr-1"></i>
                                            <?php echo e(number_format($program->rating, 1)); ?> rating
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex flex-col space-y-2">
                                        <?php if($program->is_active): ?>
                                            <span class="status-badge status-active">Active</span>
                                        <?php else: ?>
                                            <span class="status-badge status-inactive">Inactive</span>
                                        <?php endif; ?>
                                        
                                        <?php if($program->is_featured): ?>
                                            <span class="status-badge status-featured">Featured</span>
                                        <?php endif; ?>
                                        
                                        <?php if($program->application_deadline): ?>
                                            <div class="text-xs text-gray-600">
                                                <i class="far fa-calendar-alt mr-1"></i>
                                                Apply by <?php echo e($program->application_deadline->format('M d')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-2">
                                        <a href="<?php echo e(route('admin.programs.edit', $program)); ?>" 
                                           class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow"
                                           title="Edit Program">
                                            <i class="fas fa-edit text-xs"></i>
                                        </a>
                                        
                                        <form action="<?php echo e(route('admin.programs.destroy', $program)); ?>" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirmDelete(event, '<?php echo e(addslashes($program->title)); ?>')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" 
                                                    class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow"
                                                    title="Delete Program">
                                                <i class="fas fa-trash text-xs"></i>
                                            </button>
                                        </form>
                                        
                                        <a href="#" 
                                           class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg hover:from-gray-600 hover:to-gray-700 transition-all duration-200 transform hover:-translate-y-0.5 hover:shadow"
                                           title="View Program">
                                            <i class="fas fa-eye text-xs"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center space-y-4">
                                        <div class="w-24 h-24 rounded-full bg-gradient-to-r from-gray-100 to-gray-200 flex items-center justify-center">
                                            <i class="fas fa-graduation-cap text-gray-400 text-3xl"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-2">No programs found</h3>
                                            <p class="text-gray-600 mb-4">Get started by creating your first program</p>
                                            <a href="<?php echo e(route('admin.programs.create')); ?>" 
                                               class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 hover:shadow-lg">
                                                <i class="fas fa-plus-circle mr-2"></i>
                                                Create Program
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <?php if($programs->hasPages()): ?>
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing <span class="font-semibold"><?php echo e($programs->firstItem()); ?></span> to 
                            <span class="font-semibold"><?php echo e($programs->lastItem()); ?></span> of 
                            <span class="font-semibold"><?php echo e($programs->total()); ?></span> programs
                        </div>
                        <div class="flex items-center space-x-2">
                            
                            <?php if($programs->onFirstPage()): ?>
                                <span class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-left text-xs"></i>
                                </span>
                            <?php else: ?>
                                <a href="<?php echo e($programs->previousPageUrl()); ?>" 
                                   class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow">
                                    <i class="fas fa-chevron-left text-xs"></i>
                                </a>
                            <?php endif; ?>

                            
                            <?php $__currentLoopData = range(1, $programs->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page == $programs->currentPage()): ?>
                                    <span class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white rounded-lg font-semibold">
                                        <?php echo e($page); ?>

                                    </span>
                                <?php elseif($page >= $programs->currentPage() - 2 && $page <= $programs->currentPage() + 2): ?>
                                    <a href="<?php echo e($programs->url($page)); ?>" 
                                       class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-700 rounded-lg hover:bg-blue-50 hover:text-blue-600">
                                        <?php echo e($page); ?>

                                    </a>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            
                            <?php if($programs->hasMorePages()): ?>
                                <a href="<?php echo e($programs->nextPageUrl()); ?>" 
                                   class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:shadow">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </a>
                            <?php else: ?>
                                <span class="pagination-btn inline-flex items-center px-3 py-1.5 bg-gray-100 text-gray-400 rounded-lg cursor-not-allowed">
                                    <i class="fas fa-chevron-right text-xs"></i>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        
        <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-blue-100 rounded-xl mr-4">
                        <i class="fas fa-chart-line text-blue-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Avg. Program Price</p>
                        <p class="text-xl font-bold text-gray-900">
                            $<?php echo e(number_format($avgFinalPrice, 2)); ?>

                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-2xl p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-green-100 rounded-xl mr-4">
                        <i class="fas fa-award text-green-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Avg. Rating</p>
                        <p class="text-xl font-bold text-gray-900">
                            <?php echo e(number_format($avgRating, 1)); ?> ⭐
                        </p>
                    </div>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 rounded-2xl p-6">
                <div class="flex items-center">
                    <div class="p-3 bg-purple-100 rounded-xl mr-4">
                        <i class="fas fa-tags text-purple-600"></i>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-600">Discount Programs</p>
                        <p class="text-xl font-bold text-gray-900">
                            <?php echo e($discountPrograms); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchInput = document.querySelector('.search-input');
    if (searchInput) {
        searchInput.addEventListener('keyup', function(e) {
            if (e.key === 'Enter') {
                searchPrograms(this.value);
            }
        });
    }
    
    // Filter functionality
    const filterSelects = document.querySelectorAll('.filter-btn');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            applyFilters();
        });
    });
    
    // Delete confirmation
    window.confirmDelete = function(event, programTitle) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Delete Program?',
            html: `Are you sure you want to delete <strong>"${programTitle}"</strong>?<br><br>
                   <span class="text-sm text-gray-500">This action cannot be undone.</span>`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ef4444',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
            reverseButtons: true,
            backdrop: true,
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                event.target.closest('form').submit();
            }
        });
        
        return false;
    };
    
    // Search programs function
    function searchPrograms(query) {
        if (query.trim()) {
            window.location.href = `<?php echo e(route('admin.programs.index')); ?>?search=${encodeURIComponent(query)}`;
        }
    }
    
    // Apply filters function
    function applyFilters() {
        const categoryFilter = document.querySelector('select:nth-of-type(1)').value;
        const statusFilter = document.querySelector('select:nth-of-type(2)').value;
        const searchQuery = searchInput ? searchInput.value : '';
        
        let url = '<?php echo e(route('admin.programs.index')); ?>?';
        const params = new URLSearchParams();
        
        if (searchQuery) params.append('search', searchQuery);
        if (categoryFilter) params.append('category', categoryFilter);
        if (statusFilter) params.append('status', statusFilter);
        
        window.location.href = url + params.toString();
    }
    
    // Add keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Ctrl/Cmd + F for search
        if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
            e.preventDefault();
            if (searchInput) {
                searchInput.focus();
                searchInput.select();
            }
        }
        
        // Ctrl/Cmd + N for new program
        if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
            e.preventDefault();
            window.location.href = '<?php echo e(route('admin.programs.create')); ?>';
        }
    });
    
    // Row click functionality (view details)
    const programRows = document.querySelectorAll('.program-row');
    programRows.forEach(row => {
        row.addEventListener('click', function(e) {
            // Don't trigger if clicking on action buttons
            if (!e.target.closest('a') && !e.target.closest('button') && !e.target.closest('form')) {
                const editLink = this.querySelector('a[href*="edit"]');
                if (editLink) {
                    window.location.href = editLink.href;
                }
            }
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/programs/index.blade.php ENDPATH**/ ?>