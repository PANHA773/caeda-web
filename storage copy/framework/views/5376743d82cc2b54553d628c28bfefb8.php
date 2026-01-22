

<?php $__env->startSection('title', 'Programs - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    @keyframes fade-in-up { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes gradient-x { 0%,100%{background-position:0% 50%}50%{background-position:100% 50%} }
    @keyframes pulse { 0%,100%{opacity:1}50%{opacity:.5} }

    .animate-fade-in-up { animation: fade-in-up .8s ease-out forwards; }
    .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
    .animate-pulse { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }

    .font-cinzel { font-family: 'Cinzel', serif; }
    .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }

    .program-card { transition: all 0.3s cubic-bezier(0.4,0,0.2,1); }
    .program-card:hover { transform: translateY(-10px) scale(1.02); box-shadow: 0 25px 50px -12px rgba(0,0,0,0.25); }

    .level-beginner { background: linear-gradient(135deg, #10b981, #34d399); }
    .level-intermediate { background: linear-gradient(135deg, #3b82f6, #60a5fa); }
    .level-advanced { background: linear-gradient(135deg, #8b5cf6, #a78bfa); }
    .level-expert { background: linear-gradient(135deg, #ef4444, #f87171); }

    .discount-badge {
        background: linear-gradient(135deg, #ef4444, #f97316);
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%, 20% 50%);
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php
    // Fallback for testing - remove when controller is properly set up
    if (!isset($programs)) {
        // Temporary: fetch programs directly for testing
        try {
            $programs = \App\Models\Program::where('is_active', true)->get();
        } catch (Exception $e) {
            $programs = collect();
        }
    }
?>


<section class="relative py-24 px-4 md:px-8 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 text-white overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative max-w-7xl mx-auto text-center">
        <h1 class="text-5xl md:text-7xl font-bold font-cinzel mb-6 animate-fade-in-up">
            Transformative <span class="text-yellow-400">Programs</span> for Future Leaders
        </h1>
        <p class="text-xl md:text-2xl max-w-3xl mx-auto mb-12 animate-fade-in-up" style="animation-delay: 0.2s">
            Discover our comprehensive range of academic programs designed to equip you with cutting-edge skills and knowledge.
        </p>
        <div class="animate-fade-in-up" style="animation-delay: 0.4s">
            <button onclick="scrollToPrograms()" class="px-10 py-4 bg-yellow-400 text-blue-900 font-bold rounded-xl hover:bg-yellow-300 transition-all transform hover:-translate-y-1 hover:shadow-2xl shadow-lg text-lg">
                Explore All Programs <i class="fas fa-arrow-down ml-2"></i>
            </button>
        </div>
    </div>
</section>


<div class="bg-white shadow-lg -mt-8 relative z-10 mx-4 md:mx-8 rounded-2xl">
    <div class="max-w-7xl mx-auto grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-200">
        <div class="text-center py-6">
            <div class="text-3xl md:text-4xl font-bold text-blue-900"><?php echo e($programs->count()); ?>+</div>
            <div class="text-gray-600 mt-1">Programs</div>
        </div>
        <div class="text-center py-6">
            <div class="text-3xl md:text-4xl font-bold text-blue-900"><?php echo e(number_format($programs->sum('students'))); ?></div>
            <div class="text-gray-600 mt-1">Students Enrolled</div>
        </div>
        <div class="text-center py-6">
            <div class="text-3xl md:text-4xl font-bold text-blue-900">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($programs->count() > 0): ?>
                    <?php echo e(number_format($programs->avg('rating'), 1)); ?>

                <?php else: ?>
                    0.0
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="text-gray-600 mt-1">Avg. Rating</div>
        </div>
        <div class="text-center py-6">
            <div class="text-3xl md:text-4xl font-bold text-blue-900">98%</div>
            <div class="text-gray-600 mt-1">Success Rate</div>
        </div>
    </div>
</div>


<section class="py-8 px-4 md:px-8 bg-gray-50">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <h2 class="text-3xl font-bold font-cinzel text-gray-900">Our Programs</h2>

            <div class="flex flex-wrap gap-4">
                
                <div class="flex bg-gray-100 p-1 rounded-xl">
                    <button id="grid-view" class="px-4 py-2 rounded-lg bg-white shadow-sm text-blue-600 transition">
                        <i class="fas fa-th-large"></i>
                    </button>
                    <button id="list-view" class="px-4 py-2 rounded-lg text-gray-600 hover:text-gray-900 transition">
                        <i class="fas fa-list"></i>
                    </button>
                </div>

                
                <div class="relative">
                    <select id="sort-programs" class="appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="featured">Featured First</option>
                        <option value="newest">Newest First</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="rating">Highest Rated</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="mb-8 flex flex-wrap gap-2">
            <button class="category-filter px-4 py-2 bg-blue-600 text-white rounded-xl transition" data-category="all">All Programs</button>
            <?php
                // Get unique categories safely
                $categories = $programs->pluck('category')->unique()->filter()->values();
            ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button class="category-filter px-4 py-2 bg-gray-200 text-gray-800 rounded-xl hover:bg-gray-300 transition" data-category="<?php echo e(strtolower(str_replace(' ', '-', $category))); ?>">
                    <?php echo e($category); ?>

                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div id="programs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    // Calculate price and discount
                    $finalPrice = $program->discount ?? $program->tuition ?? 0;
                    $hasDiscount = !empty($program->discount) && $program->discount < $program->tuition;
                    $levelClass = isset($program->level) ? 'level-' . $program->level : 'level-beginner';
                    $levelText = isset($program->level) ? ucfirst($program->level) : 'Beginner';
                ?>

                <div class="program-card bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col"
                     data-category="<?php echo e(strtolower(str_replace(' ', '-', $program->category ?? 'general'))); ?>"
                     data-price="<?php echo e($finalPrice); ?>"
                     data-rating="<?php echo e($program->rating ?? 0); ?>"
                     data-featured="<?php echo e($program->is_featured ? '1' : '0'); ?>">

                    
                    <div class="relative h-56 overflow-hidden">
                            <img src="<?php echo e($program->image_url ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'); ?>" 
                             alt="<?php echo e($program->title ?? 'Program'); ?>" 
                             class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($program->is_featured ?? false): ?>
                            <div class="absolute top-4 left-0 bg-yellow-400 text-blue-900 px-4 py-1 font-bold text-sm shadow-lg">
                                <i class="fas fa-star mr-1"></i> FEATURED
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($program->badge)): ?>
                            <div class="absolute top-4 right-4 <?php echo e($program->badge_color ?? 'bg-blue-600'); ?> text-white px-3 py-1 rounded-full text-xs font-bold">
                                <?php echo e($program->badge); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasDiscount): ?>
                            <div class="absolute bottom-0 left-0 discount-badge text-white px-4 py-2 font-bold">
                                SAVE $<?php echo e(number_format(($program->tuition ?? 0) - $finalPrice)); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="flex justify-between items-start mb-3">
                            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                <?php echo e($program->category ?? 'General'); ?>

                            </span>
                            <span class="text-xs font-semibold <?php echo e($levelClass); ?> text-white px-3 py-1 rounded-full">
                                <?php echo e($levelText); ?>

                            </span>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-2"><?php echo e($program->title ?? 'Untitled Program'); ?></h3>

                        <p class="text-gray-600 mb-4 line-clamp-2 flex-grow">
                            <?php echo e($program->short_description ?? Str::limit($program->description ?? 'No description available.', 120)); ?>

                        </p>

                        
                        <div class="flex items-center text-gray-500 text-sm mb-4">
                            <div class="flex items-center mr-4">
                                <i class="far fa-clock mr-1"></i> 
                                <span><?php echo e($program->duration ?? 'Flexible'); ?></span>
                            </div>
                            <div class="flex items-center mr-4">
                                <i class="fas fa-user-graduate mr-1"></i> 
                                <span><?php echo e($program->mode ?? 'Online'); ?></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-1"></i> 
                                <span><?php echo e($program->rating ?? '0.0'); ?></span>
                                <span class="ml-1">(<?php echo e(number_format($program->students ?? 0)); ?>)</span>
                            </div>
                        </div>

                        
                        <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-100">
                            <div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasDiscount && ($program->tuition ?? 0) > 0): ?>
                                    <div class="text-sm text-gray-500 line-through">$<?php echo e(number_format($program->tuition)); ?></div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div class="text-2xl font-bold text-gray-900">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($finalPrice > 0): ?>
                                        $<?php echo e(number_format($finalPrice)); ?>

                                    <?php else: ?>
                                        Free
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>

                            <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition-all hover:shadow-lg font-semibold group">
                                Apply Now <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </div>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($program->application_deadline)): ?>
                            <div class="mt-4 text-sm text-gray-600 bg-gray-50 p-2 rounded-lg">
                                <i class="far fa-calendar-alt mr-2"></i>
                                Apply by <?php echo e(\Carbon\Carbon::parse($program->application_deadline)->format('M d, Y')); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-3 text-center py-20">
                    <i class="fas fa-graduation-cap text-6xl text-gray-300 mb-4"></i>
                    <p class="text-2xl text-gray-600 mb-4">No programs available at the moment.</p>
                    <p class="text-gray-500">Please check back soon or contact our admissions office.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div id="programs-list" class="hidden space-y-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <?php
                    $finalPrice = $program->discount ?? $program->tuition ?? 0;
                    $hasDiscount = !empty($program->discount) && $program->discount < $program->tuition;
                    $levelClass = isset($program->level) ? 'level-' . $program->level : 'level-beginner';
                    $levelText = isset($program->level) ? ucfirst($program->level) : 'Beginner';
                ?>

                <div class="program-card bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col md:flex-row"
                     data-category="<?php echo e(strtolower(str_replace(' ', '-', $program->category ?? 'general'))); ?>">
                    
                    
                    <div class="md:w-1/3 lg:w-1/4 h-64 md:h-auto">
                            <img src="<?php echo e($program->image_url ?? 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'); ?>" 
                             alt="<?php echo e($program->title ?? 'Program'); ?>"
                             class="w-full h-full object-cover">
                    </div>
                    
                    
                    <div class="md:w-2/3 lg:w-3/4 p-6 flex flex-col">
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                <?php echo e($program->category ?? 'General'); ?>

                            </span>
                            <span class="text-xs font-semibold <?php echo e($levelClass); ?> text-white px-3 py-1 rounded-full">
                                <?php echo e($levelText); ?>

                            </span>
                            <span class="text-xs font-semibold text-gray-600 bg-gray-100 px-3 py-1 rounded-full">
                                <i class="fas fa-user-graduate mr-1"></i><?php echo e($program->mode ?? 'Online'); ?>

                            </span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(!empty($program->badge)): ?>
                                <span class="text-xs font-semibold <?php echo e($program->badge_color ?? 'bg-blue-600'); ?> text-white px-3 py-1 rounded-full">
                                    <?php echo e($program->badge); ?>

                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <h3 class="text-2xl font-bold text-gray-900 mb-2"><?php echo e($program->title ?? 'Untitled Program'); ?></h3>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">
                            <?php echo e($program->short_description ?? Str::limit($program->description ?? 'No description available.', 200)); ?>

                        </p>
                        
                        <div class="flex flex-wrap items-center gap-4 mb-4 text-gray-600">
                            <div class="flex items-center">
                                <i class="far fa-clock mr-2"></i>
                                <span><?php echo e($program->duration ?? 'Flexible'); ?></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-users mr-2"></i>
                                <span><?php echo e(number_format($program->students ?? 0)); ?> students</span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-star text-yellow-400 mr-2"></i>
                                <span><?php echo e($program->rating ?? '0.0'); ?> rating</span>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center mt-auto pt-4 border-t border-gray-100">
                            <div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasDiscount && ($program->tuition ?? 0) > 0): ?>
                                    <div class="flex items-center">
                                        <span class="text-3xl font-bold text-gray-900">
                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($finalPrice > 0): ?>
                                                $<?php echo e(number_format($finalPrice)); ?>

                                            <?php else: ?>
                                                Free
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </span>
                                        <span class="ml-3 text-sm text-gray-500 line-through">$<?php echo e(number_format($program->tuition)); ?></span>
                                        <span class="ml-2 text-sm font-semibold text-green-600">
                                            Save $<?php echo e(number_format(($program->tuition ?? 0) - $finalPrice)); ?>

                                        </span>
                                    </div>
                                <?php else: ?>
                                    <div class="text-3xl font-bold text-gray-900">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($finalPrice > 0): ?>
                                            $<?php echo e(number_format($finalPrice)); ?>

                                        <?php else: ?>
                                            Free
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            
                            <div class="flex gap-3">
                                <button class="px-5 py-2.5 border border-blue-600 text-blue-600 rounded-xl hover:bg-blue-50 transition font-semibold">
                                    Learn More
                                </button>
                                <button class="px-5 py-2.5 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold">
                                    Apply Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="text-center py-20">
                    <i class="fas fa-graduation-cap text-6xl text-gray-300 mb-4"></i>
                    <p class="text-2xl text-gray-600 mb-4">No programs found.</p>
                    <p class="text-gray-500">Please check back soon.</p>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(method_exists($programs, 'links')): ?>
            <div class="mt-12">
                <?php echo e($programs->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</section>


<section class="py-20 px-4 md:px-8 bg-gradient-to-r from-blue-900 to-purple-900 text-white">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-4xl md:text-5xl font-bold font-cinzel mb-6">Ready to Transform Your Future?</h2>
        <p class="text-xl mb-10 max-w-2xl mx-auto">Join thousands of successful graduates who started their journey with CAEDA programs.</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <button class="px-8 py-4 bg-yellow-400 text-blue-900 font-bold rounded-xl hover:bg-yellow-300 transition transform hover:-translate-y-1 shadow-lg">
                Schedule a Consultation
            </button>
            <button class="px-8 py-4 bg-transparent border-2 border-white text-white font-bold rounded-xl hover:bg-white hover:text-blue-900 transition">
                Download Brochure
            </button>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // View Toggle
    const gridViewBtn = document.getElementById('grid-view');
    const listViewBtn = document.getElementById('list-view');
    const gridView = document.getElementById('programs-grid');
    const listView = document.getElementById('programs-list');
    
    if (gridViewBtn && listViewBtn && gridView && listView) {
        gridViewBtn.addEventListener('click', () => {
            gridView.classList.remove('hidden');
            listView.classList.add('hidden');
            gridViewBtn.classList.add('bg-white', 'shadow-sm', 'text-blue-600');
            gridViewBtn.classList.remove('text-gray-600');
            listViewBtn.classList.remove('bg-white', 'shadow-sm', 'text-blue-600');
            listViewBtn.classList.add('text-gray-600');
        });
        
        listViewBtn.addEventListener('click', () => {
            gridView.classList.add('hidden');
            listView.classList.remove('hidden');
            listViewBtn.classList.add('bg-white', 'shadow-sm', 'text-blue-600');
            listViewBtn.classList.remove('text-gray-600');
            gridViewBtn.classList.remove('bg-white', 'shadow-sm', 'text-blue-600');
            gridViewBtn.classList.add('text-gray-600');
        });
    }
    
    // Category Filter
    const categoryFilters = document.querySelectorAll('.category-filter');
    const programCards = document.querySelectorAll('.program-card');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active filter button
            categoryFilters.forEach(f => {
                f.classList.remove('bg-blue-600', 'text-white');
                f.classList.add('bg-gray-200', 'text-gray-800');
            });
            this.classList.remove('bg-gray-200', 'text-gray-800');
            this.classList.add('bg-blue-600', 'text-white');
            
            // Filter programs
            programCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'flex';
                    setTimeout(() => {
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, 10);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });
    
    // Sort Programs
    const sortSelect = document.getElementById('sort-programs');
    if (sortSelect) {
        sortSelect.addEventListener('change', function() {
            const sortValue = this.value;
            const cards = Array.from(programCards);
            
            cards.sort((a, b) => {
                switch(sortValue) {
                    case 'featured':
                        return (b.dataset.featured === '1') - (a.dataset.featured === '1');
                    case 'price-low':
                        return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
                    case 'price-high':
                        return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
                    case 'rating':
                        return parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating);
                    default:
                        return 0;
                }
            });
            
            // Reorder cards
            const container = listView.classList.contains('hidden') ? gridView : listView;
            cards.forEach(card => {
                container.appendChild(card);
            });
        });
    }
    
    // Apply Now button handler
    document.querySelectorAll('.program-card button:contains("Apply Now")').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const card = this.closest('.program-card');
            const title = card.querySelector('h3').textContent;
            alert(`Thank you for your interest in "${title}"! Our admissions team will contact you shortly.`);
        });
    });
    
    // Animation on scroll
    function animateOnScroll() {
        const cards = document.querySelectorAll('.program-card');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: 0.1 });
        
        cards.forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    }
    
    // Initialize animations
    window.addEventListener('load', animateOnScroll);
});

// Scroll to programs function
function scrollToPrograms() {
    const programsSection = document.querySelector('#programs-grid');
    if (programsSection) {
        programsSection.scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/programs.blade.php ENDPATH**/ ?>