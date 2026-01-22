

<?php $__env->startSection('title', 'Edit Welcome Section'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 max-w-4xl">
    <h1 class="text-3xl font-bold mb-6">Edit Welcome Section</h1>

    <a href="<?php echo e(route('admin.welcome_sections.index')); ?>"
       class="inline-block mb-6 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to List
    </a>

    
    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php
        $descriptions = old('description', $section->description ?? []);
        $badges = old('badges', $section->badges ?? []);
        $stats = old('stats', $section->stats ?? []);
    ?>

    <form action="<?php echo e(route('admin.welcome_sections.update', $section->id)); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="space-y-6 bg-white p-6 rounded-xl shadow">

        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text"
                   name="title"
                   value="<?php echo e(old('title', $section->title)); ?>"
                   class="w-full border rounded px-3 py-2">
        </div>

        
        <div>
            <label class="block font-semibold mb-2">Description (Paragraphs)</label>
            <?php for($i = 0; $i < 3; $i++): ?>
                <textarea name="description[]"
                          rows="3"
                          class="w-full border rounded px-3 py-2 mb-2"
                          placeholder="Paragraph <?php echo e($i + 1); ?>"><?php echo e($descriptions[$i] ?? ''); ?></textarea>
            <?php endfor; ?>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block font-semibold mb-1">Signature Name</label>
                <input type="text"
                       name="signature_name"
                       value="<?php echo e(old('signature_name', $section->signature_name)); ?>"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold mb-1">Signature Title</label>
                <input type="text"
                       name="signature_title"
                       value="<?php echo e(old('signature_title', $section->signature_title)); ?>"
                       class="w-full border rounded px-3 py-2">
            </div>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Image URL</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
            <p class="text-xs text-gray-500 mt-1">Leave blank to keep current photo. Max 2MB</p>

            <?php if($section->image): ?>
                <img src="<?php echo e($section->image_url); ?>"
                     class="mt-3 w-40 h-40 object-cover rounded-lg border">
            <?php endif; ?>
        </div>

        
        <div>
            <label class="block font-semibold mb-2">Badges</label>
            <div class="space-y-2">
                <?php for($i = 0; $i < 3; $i++): ?>
                    <div class="flex gap-3">
                        <input type="text"
                               name="badges[<?php echo e($i); ?>][text]"
                               placeholder="Badge Text"
                               value="<?php echo e($badges[$i]['text'] ?? ''); ?>"
                               class="border rounded px-3 py-2 w-1/2">

                        <input type="color"
                               name="badges[<?php echo e($i); ?>][color]"
                               value="<?php echo e($badges[$i]['color'] ?? '#facc15'); ?>"
                               class="border rounded px-3 py-2 w-1/2">
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        
        <div>
            <label class="block font-semibold mb-2">Stats</label>
            <div class="space-y-2">
                <?php for($i = 0; $i < 3; $i++): ?>
                    <div class="flex gap-3">
                        <input type="text"
                               name="stats[<?php echo e($i); ?>][number]"
                               placeholder="Number"
                               value="<?php echo e($stats[$i]['number'] ?? ''); ?>"
                               class="border rounded px-3 py-2 w-1/2">

                        <input type="text"
                               name="stats[<?php echo e($i); ?>][label]"
                               placeholder="Label"
                               value="<?php echo e($stats[$i]['label'] ?? ''); ?>"
                               class="border rounded px-3 py-2 w-1/2">
                    </div>
                <?php endfor; ?>
            </div>
        </div>

        
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox"
                       name="is_active"
                       value="1"
                       <?php echo e(old('is_active', $section->is_active) ? 'checked' : ''); ?>

                       class="form-checkbox">
                <span class="font-semibold">Active</span>
            </label>
        </div>

        
        <div class="pt-4">
            <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Update Section
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/welcome_sections/edit.blade.php ENDPATH**/ ?>