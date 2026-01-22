

<?php $__env->startSection('title', 'Workshop Benefits Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto px-6 py-8">

    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Workshop Benefits</h1>

        <a href="<?php echo e(route('admin.workshop_benefits.create')); ?>"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add Benefit
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-6 bg-green-100 text-green-700 px-4 py-3 rounded">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Icon</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Description</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php $__empty_1 = true; $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3"><?php echo e($index + 1); ?></td>
                        <td class="px-4 py-3 text-2xl"><?php echo e($benefit->icon); ?></td>
                        <td class="px-4 py-3 font-semibold text-gray-800"><?php echo e($benefit->title); ?></td>
                        <td class="px-4 py-3 text-gray-600 max-w-md"><?php echo e(Str::limit($benefit->description ?? '', 80)); ?></td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded font-semibold
                                <?php echo e($benefit->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                <?php echo e($benefit->status ? 'Active' : 'Inactive'); ?>

                            </span>
                        </td>
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="<?php echo e(route('admin.workshop_benefits.edit', $benefit)); ?>"
                                   class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700 text-sm">
                                    Edit
                                </a>

                                <form method="POST" action="<?php echo e(route('admin.workshop_benefits.destroy', $benefit)); ?>"
                                      onsubmit="return confirm('Delete this benefit?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center py-8 text-gray-500">
                            No workshop benefits found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/workshop_benefits/index.blade.php ENDPATH**/ ?>