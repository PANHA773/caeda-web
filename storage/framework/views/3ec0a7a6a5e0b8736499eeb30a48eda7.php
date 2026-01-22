

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Testimonials
        </h1>

        <a href="<?php echo e(route('admin.testimonials.create')); ?>"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Testimonial
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        #
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        User
                    </th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600">
                        Quote
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">
                        Rating
                    </th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600">
                        Status
                    </th>
                    <th class="px-6 py-3 text-right text-sm font-semibold text-gray-600">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <?php echo e($index + 1); ?>

                        </td>

                        
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img
                                src="<?php echo e($testimonial->avatar); ?>"
                                class="w-10 h-10 rounded-full object-cover border"
                            >
                            <div>
                                <p class="font-semibold text-gray-800">
                                    <?php echo e($testimonial->name); ?>

                                </p>
                                <p class="text-sm text-gray-500">
                                    <?php echo e($testimonial->role); ?>

                                </p>
                            </div>
                        </td>

                        
                        <td class="px-6 py-4 max-w-md">
                            <p class="text-gray-600 line-clamp-2">
                                "<?php echo e($testimonial->quote); ?>"
                            </p>
                        </td>

                        
                        <td class="px-6 py-4 text-center">
                            <?php for($i = 1; $i <= 5; $i++): ?>
                                <span class="<?php echo e($i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300'); ?>">
                                    ★
                                </span>
                            <?php endfor; ?>
                        </td>

                        
                        <td class="px-6 py-4 text-center">
                            <?php if($testimonial->status): ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-600 rounded-full">
                                    Hidden
                                </span>
                            <?php endif; ?>
                        </td>

                        
                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="<?php echo e(route('admin.testimonials.edit', $testimonial)); ?>"
                               class="inline-flex items-center px-3 py-1 text-sm bg-yellow-100 text-yellow-700 rounded hover:bg-yellow-200">
                                Edit
                            </a>

                            <form action="<?php echo e(route('admin.testimonials.destroy', $testimonial)); ?>"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this testimonial?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="px-3 py-1 text-sm bg-red-100 text-red-700 rounded hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                            No testimonials found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/testimonials/index.blade.php ENDPATH**/ ?>