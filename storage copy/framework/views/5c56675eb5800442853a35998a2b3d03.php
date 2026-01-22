

<?php $__env->startSection('title', 'Add ' . ucfirst($type) . ' Metric'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-3xl mx-auto space-y-6">

    
    <div>
        <h1 class="text-2xl font-bold text-gray-800 mb-2">
            Add <?php echo e(ucfirst($type)); ?> Metric
        </h1>
        <p class="text-gray-500">Fill out the details below to add a new <?php echo e($type); ?> metric.</p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded-lg">
            <ul class="list-disc list-inside">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.progress-metrics.store')); ?>?type=<?php echo e($type); ?>" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block font-semibold mb-1">Label</label>
            <input type="text" name="label" value="<?php echo e(old('label')); ?>" required
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-1">Value</label>
            <input type="text" name="value" value="<?php echo e(old('value')); ?>" required
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-1">Order</label>
            <input type="number" name="order" value="<?php echo e(old('order', 0)); ?>"
                   class="w-full border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-500">
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($type === 'performance'): ?>
            <div>
                <label class="block font-semibold mb-1">Color</label>
                <input type="color" name="color" value="<?php echo e(old('color', '#3b82f6')); ?>"
                       class="w-20 h-10 border-gray-300 rounded-lg p-1">
            </div>
        <?php else: ?>
            <div>
                <label class="block font-semibold mb-1">Trend</label>
                <select name="trend" class="w-full border-gray-300 rounded-lg p-2">
                    <option value="up" <?php echo e(old('trend') == 'up' ? 'selected' : ''); ?>>Up</option>
                    <option value="down" <?php echo e(old('trend') == 'down' ? 'selected' : ''); ?>>Down</option>
                </select>
            </div>

            <div>
                <label class="block font-semibold mb-1">Icon (FontAwesome)</label>
                <input type="text" name="icon" value="<?php echo e(old('icon', 'chart-line')); ?>"
                       placeholder="e.g., users, globe, dollar-sign"
                       class="w-full border-gray-300 rounded-lg p-2">
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="flex justify-end gap-4 mt-4">
            <a href="<?php echo e(route('admin.progress-metrics.index')); ?>" 
               class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">Cancel</a>
            <button type="submit" 
                    class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Save</button>
        </div>

    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/progress-metrics/create.blade.php ENDPATH**/ ?>