 

<?php $__env->startSection('title', 'Order Steps'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto py-10">

    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Order Steps</h1>
        <a href="<?php echo e(route('admin.order_steps.create')); ?>"
           class="px-4 py-2 bg-amber-500 text-white rounded-lg shadow hover:bg-amber-600 transition">
           + Add New Step
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Icon</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $orderSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="px-6 py-4"><?php echo e($loop->iteration); ?></td>
                        <td class="px-6 py-4"><?php echo e($step->title); ?></td>
                        <td class="px-6 py-4"><?php echo e(Str::limit($step->description, 50)); ?></td>
                        <td class="px-6 py-4">
                            <i class="<?php echo e($step->icon); ?>"></i> <?php echo e($step->icon); ?>

                        </td>
                        <td class="px-6 py-4"><?php echo e($step->order ?? '-'); ?></td>
                        <td class="px-6 py-4">
                            <?php if($step->status): ?>
                                <span class="px-2 py-1 bg-green-500 text-white rounded-full text-xs">Active</span>
                            <?php else: ?>
                                <span class="px-2 py-1 bg-red-500 text-white rounded-full text-xs">Inactive</span>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="<?php echo e(route('admin.order_steps.edit', $step->id)); ?>"
                               class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition">Edit</a>

                            <form action="<?php echo e(route('admin.order_steps.destroy', $step->id)); ?>" method="POST" class="inline-block"
                                  onsubmit="return confirm('Are you sure you want to delete this step?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                            No order steps found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/order_steps/index.blade.php ENDPATH**/ ?>