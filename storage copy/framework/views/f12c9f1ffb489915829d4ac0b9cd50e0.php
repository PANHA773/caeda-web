

<?php $__env->startSection('title', 'Success Stories'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Success Stories</h1>
            <p class="text-gray-500">Manage alumni achievements & website carousel</p>
        </div>
        <a href="<?php echo e(route('admin.success-stories.create')); ?>"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Story
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full text-sm text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Order</th>
                    <th class="px-6 py-4">Profile</th>
                    <th class="px-6 py-4">Role</th>
                    <th class="px-6 py-4">Achievement</th>
                    <th class="px-6 py-4">Year</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $successStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold"><?php echo e($story->order); ?></td>

                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="<?php echo e($story->image); ?>" 
                                 alt="<?php echo e($story->name); ?>" 
                                 class="w-12 h-12 rounded-full shadow-sm object-cover">
                            <span class="font-medium text-gray-800"><?php echo e($story->name); ?></span>
                        </td>

                        <td class="px-6 py-4"><?php echo e($story->role); ?></td>
                        <td class="px-6 py-4 line-clamp-2"><?php echo e($story->achievement); ?></td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full bg-indigo-100 text-indigo-700 text-xs font-semibold">
                                <?php echo e($story->year); ?>

                            </span>
                        </td>

                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo e(route('admin.success-stories.edit', $story->id)); ?>"
                                   class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>
                                <form action="<?php echo e(route('admin.success-stories.destroy', $story->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Delete this story?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button
                                        class="px-3 py-1 text-sm bg-red-500 hover:bg-red-600 text-white rounded">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No success stories found.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/success-stories/index.blade.php ENDPATH**/ ?>