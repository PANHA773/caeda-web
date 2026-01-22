

<?php $__env->startSection('title', 'Create FAQ'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow">

    
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">Create FAQ</h1>

        <a href="<?php echo e(route('admin.faqs.index')); ?>"
           class="text-sm text-gray-600 hover:text-gray-900">
            ← Back to FAQs
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.faqs.store')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Question <span class="text-red-500">*</span>
            </label>
            <input type="text"
                   name="question"
                   value="<?php echo e(old('question')); ?>"
                   required
                   placeholder="Enter FAQ question"
                   class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Answer <span class="text-red-500">*</span>
            </label>
            <textarea name="answer"
                      rows="5"
                      required
                      placeholder="Enter FAQ answer"
                      class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"><?php echo e(old('answer')); ?></textarea>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Status <span class="text-red-500">*</span>
            </label>
            <select name="is_active"
                    required
                    class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500">
                <option value="">-- Select Status --</option>
                <option value="1" <?php echo e(old('is_active') == '1' ? 'selected' : ''); ?>>Active</option>
                <option value="0" <?php echo e(old('is_active') == '0' ? 'selected' : ''); ?>>Inactive</option>
            </select>
        </div>

        
        <div class="flex justify-end gap-3">
            <a href="<?php echo e(route('admin.faqs.index')); ?>"
               class="px-5 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                Save FAQ
            </button>
        </div>
    </form>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/faqs/create.blade.php ENDPATH**/ ?>