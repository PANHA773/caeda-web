

<?php $__env->startSection('title', 'Hero Achievements'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Hero Achievements</h1>
            <p class="text-gray-500">Manage key stats displayed on the hero section</p>
        </div>
        <a href="<?php echo e(route('admin.hero-achievements.create')); ?>" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Achievement
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Order</th>
                    <th class="px-6 py-4">Icon</th>
                    <th class="px-6 py-4">Value</th>
                    <th class="px-6 py-4">Label</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $heroAchievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold"><?php echo e($achievement->order); ?></td>

                        <td class="px-6 py-4 text-2xl">
                            <?php echo $achievement->icon; ?>

                        </td>

                        <td class="px-6 py-4 font-bold text-gray-800"><?php echo e($achievement->value); ?></td>

                        <td class="px-6 py-4 text-gray-700"><?php echo e($achievement->label); ?></td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo e(route('admin.hero-achievements.edit', $achievement->id)); ?>" class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('admin.hero-achievements.destroy', $achievement->id)); ?>" method="POST" onsubmit="return confirm('Delete this achievement?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-10 text-center text-gray-500">
                            No hero achievements found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    
    <?php if($heroAchievements->hasPages()): ?>
        <div class="mt-4 flex justify-end">
            <?php echo e($heroAchievements->links('pagination::tailwind')); ?>

        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/hero-achievements/index.blade.php ENDPATH**/ ?>