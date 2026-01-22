

<?php $__env->startSection('title', 'Menu Categories'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 space-y-6">

    <!-- Header -->
    <div class="flex items-center justify-between">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Menu Categories</h2>
            <p class="text-sm text-gray-500">Manage navigation categories for the menu</p>
        </div>
        <a href="<?php echo e(route('admin.menu-categories.create')); ?>"
           class="px-5 py-2.5 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
            + Add Category
        </a>
    </div>

    <!-- Success Message -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="p-4 bg-green-100 text-green-700 rounded-lg shadow">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Table -->
    <div class="bg-white shadow-xl rounded-xl overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Order</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Icon</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Slug</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $menuCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 font-semibold text-gray-700">
                            <?php echo e($category->order); ?>

                        </td>

                        <td class="px-6 py-4">
                            <div class="w-10 h-10 rounded-lg flex items-center justify-center bg-gray-100">
                                <i class="<?php echo e($category->icon); ?> <?php echo e($category->icon_color); ?> text-lg"></i>
                            </div>
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-800">
                            <?php echo e($category->name); ?>

                        </td>

                        <td class="px-6 py-4 text-gray-500">
                            <?php echo e($category->slug); ?>

                        </td>

                        <td class="px-6 py-4 text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->is_active): ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-red-100 text-red-700 rounded-full">
                                    Inactive
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>

                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="<?php echo e(route('admin.menu-categories.edit', $category)); ?>"
                               class="px-3 py-1 bg-blue-500 text-white rounded-lg hover:bg-blue-600">
                                Edit
                            </a>

                            <form action="<?php echo e(route('admin.menu-categories.destroy', $category)); ?>"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this category?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                            No menu categories found.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/menu-categories/index.blade.php ENDPATH**/ ?>