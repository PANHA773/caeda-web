

<?php $__env->startSection('title', 'Add Social Link'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto px-4 py-6">

    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Social Link</h1>
        <p class="text-gray-500 text-sm">Create a new social media link to show on your website</p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.social.store')); ?>" method="POST" class="bg-white p-6 rounded-xl shadow">
        <?php echo csrf_field(); ?>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="platform">Platform Name</label>
            <input type="text" name="platform" id="platform" 
                   value="<?php echo e(old('platform')); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300" 
                   placeholder="e.g. Facebook" required>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="icon">Icon (FontAwesome class)</label>
            <input type="text" name="icon" id="icon"
                   value="<?php echo e(old('icon')); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="e.g. fab fa-facebook-f" required>
            <p class="text-gray-400 text-sm mt-1">Use <a href="https://fontawesome.com/icons" target="_blank" class="text-blue-500 underline">FontAwesome icons</a>.</p>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="color">Color Classes</label>
            <input type="text" name="color" id="color"
                   value="<?php echo e(old('color')); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="e.g. bg-blue-600 hover:bg-blue-700" required>
            <p class="text-gray-400 text-sm mt-1">Tailwind CSS background color classes for hover and normal state.</p>
        </div>

        
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2" for="url">URL</label>
            <input type="url" name="url" id="url"
                   value="<?php echo e(old('url')); ?>"
                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                   placeholder="https://facebook.com/yourpage" required>
        </div>

        
        <div class="mb-4 flex items-center space-x-3">
            <input type="checkbox" name="is_active" id="is_active" value="1" checked>
            <label for="is_active" class="text-gray-700 font-semibold">Active</label>
        </div>

        
        <div class="flex justify-end space-x-3 mt-6">
            <a href="<?php echo e(route('admin.social.index')); ?>" 
               class="px-5 py-2.5 bg-gray-300 hover:bg-gray-400 rounded-lg font-semibold">
                Cancel
            </a>
            <button type="submit" 
                    class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold">
                Save
            </button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/social/create.blade.php ENDPATH**/ ?>