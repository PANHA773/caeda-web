

<?php $__env->startSection('title', 'Hero Carousel'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Hero Carousel Slides</h1>

    <a href="<?php echo e(route('admin.hero_carousels.create')); ?>"
       class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
        Add Slide
    </a>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Image</th>
                <th class="border px-4 py-2">Title</th>
                <th class="border px-4 py-2">Order</th>
                <th class="border px-4 py-2">Active</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr class="text-center">
                    
                    <td class="border px-4 py-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slide->image): ?>
                            <img
                                src="<?php echo e(asset('storage/' . $slide->image)); ?>"
                                alt="<?php echo e($slide->title); ?>"
                                class="w-32 h-20 object-cover rounded mx-auto shadow"
                                onerror="this.src='/assets/defaultcourse.jpg'"
                            >
                        <?php else: ?>
                            <span class="text-gray-400">No Image</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>

                    
                    <td class="border px-4 py-2">
                        <?php echo e($slide->title ?? '-'); ?>

                    </td>

                    
                    <td class="border px-4 py-2">
                        <?php echo e($slide->order); ?>

                    </td>

                    
                    <td class="border px-4 py-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($slide->is_active): ?>
                            <span class="text-green-600 font-bold">Yes</span>
                        <?php else: ?>
                            <span class="text-red-500 font-bold">No</span>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>

                    
                    <td class="border px-4 py-2">
                        <a href="<?php echo e(route('admin.hero_carousels.edit', $slide)); ?>"
                           class="text-blue-600 hover:underline mr-3">
                            Edit
                        </a>

                        <form action="<?php echo e(route('admin.hero_carousels.destroy', $slide)); ?>"
                              method="POST"
                              class="inline-block"
                              onsubmit="return confirm('Delete this slide?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="text-red-600 hover:underline">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="5" class="border px-4 py-6 text-center text-gray-500">
                        No slides found.
                    </td>
                </tr>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/hero_carousels/index.blade.php ENDPATH**/ ?>