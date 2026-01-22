

<?php $__env->startSection('title', 'Add Pricing Plan'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-gray-50 min-h-screen">

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Add New Pricing Plan</h1>
        <a href="<?php echo e(route('admin.pricing.index')); ?>" class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 transition">
            ← Back to Plans
        </a>
    </div>

    
    <div class="bg-white shadow rounded-lg p-6">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <form action="<?php echo e(route('admin.pricing.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Plan Name</label>
                <input type="text" name="name" value="<?php echo e(old('name')); ?>" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Monthly Price ($)</label>
                <input type="number" step="0.01" name="monthly_price" value="<?php echo e(old('monthly_price')); ?>" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Annual Price ($)</label>
                <input type="number" step="0.01" name="annual_price" value="<?php echo e(old('annual_price')); ?>" 
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" rows="3" 
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"><?php echo e(old('description')); ?></textarea>
            </div>

            
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="is_popular" id="is_popular" value="1" class="mr-2" <?php echo e(old('is_popular') ? 'checked' : ''); ?>>
                <label for="is_popular" class="text-gray-700 font-medium">Mark as Most Popular</label>
            </div>

            
            <div class="mb-6 flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" class="mr-2" <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                <label for="is_active" class="text-gray-700 font-medium">Active</label>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                Create Plan
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/pricing/create.blade.php ENDPATH**/ ?>