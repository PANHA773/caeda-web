

<?php $__env->startSection('title', 'Add Hero Slide'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add New Hero Slide</h1>

    <a href="<?php echo e(route('admin.hero_carousels.index')); ?>"
       class="mb-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">
        Back to List
    </a>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.hero_carousels.store')); ?>"
          method="POST"
          enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        
        <div class="mb-4">
            <label class="block font-bold mb-1">Title (optional)</label>
            <input type="text"
                   name="title"
                   value="<?php echo e(old('title')); ?>"
                   class="w-full border px-3 py-2 rounded"
                   placeholder="Slide title">
        </div>

        
        <div class="mb-4">
            <label class="block font-bold mb-1">Hero Image</label>
            <input type="file"
                   name="image"
                   accept="image/*"
                   class="w-full border px-3 py-2 rounded"
                   required>
            <p class="text-sm text-gray-500 mt-1">
                Allowed: JPG, PNG, WEBP (Max 2MB)
            </p>
        </div>

        
        <div class="mb-4">
            <label class="block font-bold mb-1">Order</label>
            <input type="number"
                   name="order"
                   value="<?php echo e(old('order', 0)); ?>"
                   class="w-full border px-3 py-2 rounded">
        </div>

        
        <div class="mb-4 flex items-center">
            <input type="checkbox"
                   name="is_active"
                   value="1"
                   <?php echo e(old('is_active', true) ? 'checked' : ''); ?>

                   class="mr-2">
            <label class="font-bold">Active</label>
        </div>

        
        <button type="submit"
                class="bg-blue-500 text-white px-6 py-2 rounded font-bold hover:bg-blue-600 transition">
            Add Slide
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/hero_carousels/create.blade.php ENDPATH**/ ?>