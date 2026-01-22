

<?php $__env->startSection('title', 'Add Welcome Section'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add Welcome Section</h1>

    <a href="<?php echo e(route('admin.welcome_sections.index')); ?>" 
       class="mb-4 inline-block bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
       Back to List
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-800 p-3 rounded mb-4">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form action="<?php echo e(route('admin.welcome_sections.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>" 
                   class="w-full border rounded px-3 py-2" required>
        </div>

        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Description (Paragraphs)</label>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2 mb-2" placeholder="Paragraph 1"><?php echo e(old('description.0')); ?></textarea>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2 mb-2" placeholder="Paragraph 2"><?php echo e(old('description.1')); ?></textarea>
            <textarea name="description[]" rows="3" 
                      class="w-full border rounded px-3 py-2" placeholder="Paragraph 3"><?php echo e(old('description.2')); ?></textarea>
        </div>

        
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Signature Name</label>
                <input type="text" name="signature_name" value="<?php echo e(old('signature_name')); ?>" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Signature Title</label>
                <input type="text" name="signature_title" value="<?php echo e(old('signature_title')); ?>" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Image URL</label>
            <input type="text" name="image" value="<?php echo e(old('image')); ?>" class="w-full border rounded px-3 py-2">
        </div>

        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Badges</label>
            <div class="space-y-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 3; $i++): ?>
                <div class="flex gap-2">
                    <input type="text" name="badges[<?php echo e($i); ?>][text]" placeholder="Badge Text" value="<?php echo e(old("badges.$i.text")); ?>" class="border rounded px-2 py-1 w-1/2">
                    <input type="color" name="badges[<?php echo e($i); ?>][color]" value="<?php echo e(old("badges.$i.color", '#facc15')); ?>" class="border rounded px-2 py-1 w-1/2">
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div>
            <label class="block text-gray-700 font-semibold mb-2">Stats</label>
            <div class="space-y-2">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 0; $i < 3; $i++): ?>
                <div class="flex gap-2">
                    <input type="text" name="stats[<?php echo e($i); ?>][number]" placeholder="Number" value="<?php echo e(old("stats.$i.number")); ?>" class="border rounded px-2 py-1 w-1/2">
                    <input type="text" name="stats[<?php echo e($i); ?>][label]" placeholder="Label" value="<?php echo e(old("stats.$i.label")); ?>" class="border rounded px-2 py-1 w-1/2">
                </div>
                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', true) ? 'checked' : ''); ?> class="form-checkbox">
                <span class="text-gray-700 font-semibold">Active</span>
            </label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition">
            Save Section
        </button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/welcome_sections/create.blade.php ENDPATH**/ ?>