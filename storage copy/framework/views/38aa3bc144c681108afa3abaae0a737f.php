

<?php $__env->startSection('title', 'Edit Menu Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto p-6">

    <!-- Page Header -->
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Edit Menu Category</h2>
        <a href="<?php echo e(route('admin.menu-categories.index')); ?>"
           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
            ← Back
        </a>
    </div>

    <!-- Validation Errors -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 rounded-lg p-4">
            <ul class="list-disc list-inside space-y-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Form Card -->
    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="<?php echo e(route('admin.menu-categories.update', $category->id)); ?>"
              method="POST"
              class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <!-- Category Name -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Category Name <span class="text-red-500">*</span>
                </label>
                <input type="text"
                       name="name"
                       value="<?php echo e(old('name', $category->name)); ?>"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500"
                       required>
            </div>

            <!-- Icon -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Icon (FontAwesome class)
                </label>
                <input type="text"
                       name="icon"
                       value="<?php echo e(old('icon', $category->icon)); ?>"
                       placeholder="fas fa-fire"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($category->icon): ?>
                    <div class="mt-2 flex items-center gap-2 text-gray-600">
                        <i class="<?php echo e($category->icon); ?> text-xl"></i>
                        <span class="text-sm">Current icon preview</span>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <!-- Order -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                    Display Order
                </label>
                <input type="number"
                       name="order"
                       value="<?php echo e(old('order', $category->order)); ?>"
                       class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <!-- Status -->
            <div class="flex items-center gap-3">
                <input type="checkbox"
                       name="is_active"
                       id="is_active"
                       value="1"
                       <?php echo e(old('is_active', $category->is_active) ? 'checked' : ''); ?>

                       class="w-5 h-5 text-amber-600 border-gray-300 rounded focus:ring-amber-500">
                <label for="is_active" class="text-sm font-medium text-gray-700">
                    Active (visible on website)
                </label>
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3 pt-4 border-t">
                <a href="<?php echo e(route('admin.menu-categories.index')); ?>"
                   class="px-5 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-amber-600 text-white font-semibold hover:bg-amber-700 transition">
                    Update Category
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/menu-categories/edit.blade.php ENDPATH**/ ?>