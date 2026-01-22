

<?php $__env->startSection('title', 'Awards'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Awards</h1>
            <p class="text-gray-500">Manage website awards & recognitions</p>
        </div>
        <a href="<?php echo e(route('admin.awards.create')); ?>"
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg shadow">
            + Add Award
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
                    <th class="px-6 py-4">#</th>
                    <th class="px-6 py-4">Title</th>
                    <th class="px-6 py-4">Organization</th>
                    <th class="px-6 py-4">Year</th>
                    <th class="px-6 py-4">Category</th>
                    <th class="px-6 py-4 text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold">
                            <?php echo e($loop->iteration + ($awards->currentPage()-1)*$awards->perPage()); ?>

                        </td>
                        <td class="px-6 py-4 font-semibold text-gray-800"><?php echo e($award->title); ?></td>
                        <td class="px-6 py-4 text-gray-600"><?php echo e($award->organization); ?></td>
                        <td class="px-6 py-4"><?php echo e($award->year); ?></td>
                        <td class="px-6 py-4">
                            <span class="px-3 py-1 rounded-full text-xs font-semibold 
                                <?php if($award->category == 'international'): ?> bg-blue-100 text-blue-800
                                <?php elseif($award->category == 'innovation'): ?> bg-green-100 text-green-800
                                <?php elseif($award->category == 'education'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($award->category == 'research'): ?> bg-indigo-100 text-indigo-800
                                <?php else: ?> bg-gray-200 text-gray-800
                                <?php endif; ?>">
                                <?php echo e(ucfirst($award->category)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end gap-2">
                                <a href="<?php echo e(route('admin.awards.edit', $award->id)); ?>"
                                   class="px-3 py-1 text-sm bg-blue-500 hover:bg-blue-600 text-white rounded">
                                    Edit
                                </a>

                                <form action="<?php echo e(route('admin.awards.destroy', $award->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Delete this award?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
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
                            No awards found.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($awards->hasPages()): ?>
            <div class="mt-3 flex justify-end">
                <?php echo e($awards->links()); ?>

            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/awards/index.blade.php ENDPATH**/ ?>