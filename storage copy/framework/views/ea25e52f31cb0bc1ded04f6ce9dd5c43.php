

<?php $__env->startSection('title', 'Add Workshop Benefit'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-4xl mx-auto px-6 py-8">

    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Add Workshop Benefit
        </h1>
        <p class="text-gray-500">
            Create a new benefit for PSBU-Workshop
        </p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc list-inside text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.workshop_benefits.store')); ?>"
          method="POST"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Icon (Emoji)
            </label>
            <input type="text"
                   name="icon"
                   value="<?php echo e(old('icon')); ?>"
                   placeholder="🎯"
                   class="w-full border rounded-lg px-4 py-2 text-2xl"
                   required>
            <p class="text-xs text-gray-500 mt-1">
                Example: 🎯 📚 🤝 📜
            </p>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Title
            </label>
            <input type="text"
                   name="title"
                   value="<?php echo e(old('title')); ?>"
                   class="w-full border rounded-lg px-4 py-2"
                   required>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">
                Description
            </label>
            <textarea name="description"
                      rows="4"
                      class="w-full border rounded-lg px-4 py-2"
                      required><?php echo e(old('description')); ?></textarea>
        </div>

        
        <div class="flex items-center gap-3">
            <input type="checkbox"
                   name="status"
                   value="1"
                   checked
                   class="rounded border-gray-300">
            <label class="text-sm text-gray-700">
                Active
            </label>
        </div>

        
        <div class="flex justify-end gap-3">
            <a href="<?php echo e(route('admin.workshop_benefits.index')); ?>"
               class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-50">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg
                           hover:bg-blue-700 transition">
                Save Benefit
            </button>
        </div>

    </form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/workshop_benefits/create.blade.php ENDPATH**/ ?>