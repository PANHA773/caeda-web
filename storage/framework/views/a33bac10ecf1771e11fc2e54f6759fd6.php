<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 md:px-8 py-8">

    
    <div class="flex flex-col md:flex-row md:justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Office Managers
        </h1>
        <a href="<?php echo e(route('admin.office-managers.create')); ?>"
           class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700
                  text-white font-semibold rounded-lg shadow transition">
            + Add Manager
        </a>
    </div>

    
    <form action="<?php echo e(route('admin.office-managers.index')); ?>" method="GET" class="mb-6">
        <input type="text" name="search" placeholder="Search by name or position..."
               value="<?php echo e(request('search')); ?>"
               class="w-full md:w-1/3 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
    </form>

    
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Total Managers</span>
            <span class="text-2xl font-bold text-gray-900"><?php echo e($totalManagers); ?></span>
        </div>
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Senior Managers</span>
            <span class="text-2xl font-bold text-gray-900"><?php echo e($seniorManagers); ?></span>
        </div>
        <div class="bg-white rounded-xl p-5 shadow flex flex-col items-center">
            <span class="text-sm text-gray-500">Assistant Managers</span>
            <span class="text-2xl font-bold text-gray-900"><?php echo e($assistantManagers); ?></span>
        </div>
    </div>

    
    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
        <?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $manager): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
                $imagePath = $manager->image && file_exists(public_path('storage/' . $manager->image))
                             ? asset('storage/' . $manager->image)
                             : asset('images/placeholder.jpg');

                $initials = collect(explode(' ', $manager->name))
                            ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                            ->implode('');
            ?>

            <div class="group relative bg-white/95 backdrop-blur-sm rounded-xl p-4 text-center
                        border border-gray-200/50 hover:shadow-lg
                        transition-all duration-300 hover:-translate-y-2 cursor-pointer">

                    
                    <div class="w-28 h-28 rounded-xl overflow-hidden mx-auto mb-3 relative">
                    <?php if($manager->image): ?>
                        <div class="w-24 h-24">
                            <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($manager->name); ?>"
                                class="w-full h-full object-cover rounded">
                        </div>

                    <?php else: ?>
                        

                    <div class="absolute inset-0 bg-gradient-to-br
                                <?php echo e($manager->gradient ?? 'from-green-500 to-teal-600'); ?>

                                flex items-center justify-center
                                text-white font-semibold text-xl rounded-xl">
                        <?php echo e($initials); ?>

                    </div>
                    <?php endif; ?>
                </div>

                
                <p class="text-gray-800 text-sm font-medium
                          group-hover:text-gray-900 transition-colors duration-300 leading-tight">
                    <?php echo e($manager->name); ?>

                </p>
                <p class="text-gray-600 text-xs font-medium
                          group-hover:text-gray-700 transition-colors duration-300">
                    <?php echo e($manager->position); ?>

                </p>

                
                <div class="flex justify-center mt-3 space-x-2">
                    <a href="<?php echo e(route('admin.office-managers.edit', $manager)); ?>"
                       class="px-3 py-1 text-sm bg-blue-600 hover:bg-blue-700 text-white rounded-md transition">
                        Edit
                    </a>
                    <form action="<?php echo e(route('admin.office-managers.destroy', $manager)); ?>" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this manager?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit"
                                class="px-3 py-1 text-sm bg-red-600 hover:bg-red-700 text-white rounded-md transition">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    
    <div class="mt-8">
        <?php echo e($managers->withQueryString()->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/office-managers/index.blade.php ENDPATH**/ ?>