


<?php $__env->startSection('title', 'Add Contact Method'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Add Contact Method</h1>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form action="<?php echo e(route('admin.contact-information.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="title">Title</label>
            <input type="text" name="title" id="title"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="<?php echo e(old('title')); ?>" required>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="icon">Icon (FontAwesome class)</label>
            <input type="text" name="icon" id="icon"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="<?php echo e(old('icon')); ?>" required>
            <p class="text-sm text-gray-500 mt-1">Example: fas fa-phone</p>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="content">Content</label>
            <textarea name="content" id="content" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required><?php echo e(old('content')); ?></textarea>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="color">Color (Tailwind gradient)</label>
            <input type="text" name="color" id="color"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="<?php echo e(old('color')); ?>" required>
            <p class="text-sm text-gray-500 mt-1">Example: from-blue-500 to-cyan-500</p>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="action">Action Text (optional)</label>
            <input type="text" name="action" id="action"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="<?php echo e(old('action')); ?>">
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1" for="action_icon">Action Icon (optional)</label>
            <input type="text" name="action_icon" id="action_icon"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="<?php echo e(old('action_icon')); ?>">
            <p class="text-sm text-gray-500 mt-1">Example: fas fa-phone-alt</p>
        </div>

        
        <div class="mb-6 flex items-center space-x-2">
            <input type="checkbox" name="is_active" id="is_active"
                   class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                   <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
            <label for="is_active" class="text-gray-700 font-medium">Active</label>
        </div>

        
        <div class="flex justify-end space-x-2">
            <a href="<?php echo e(route('admin.contact-information.index')); ?>"
               class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">Cancel</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Add</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/contact-information/create.blade.php ENDPATH**/ ?>