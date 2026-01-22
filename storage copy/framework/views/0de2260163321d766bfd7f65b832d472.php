

<?php $__env->startSection('title', 'Edit Hero'); ?>
<?php $__env->startSection('page-title', 'Edit Hero Section'); ?>
<?php $__env->startSection('page-description', 'Update an existing hero section.'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow">
    <form action="<?php echo e(route('admin.heroes.update', $hero->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Badge Text -->
        <div class="mb-4">
            <label for="badge_text" class="block font-medium text-gray-700">Badge Text</label>
            <input type="text" name="badge_text" id="badge_text" value="<?php echo e(old('badge_text', $hero->badge_text)); ?>"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['badge_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Title -->
        <div class="mb-4">
            <label for="title" class="block font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="<?php echo e(old('title', $hero->title)); ?>"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Highlight Title -->
        <div class="mb-4">
            <label for="highlight_title" class="block font-medium text-gray-700">Highlight Title</label>
            <input type="text" name="highlight_title" id="highlight_title" value="<?php echo e(old('highlight_title', $hero->highlight_title)); ?>"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['highlight_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Subtitle -->
        <div class="mb-4">
            <label for="subtitle" class="block font-medium text-gray-700">Subtitle</label>
            <textarea name="subtitle" id="subtitle" rows="3"
                      class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300"><?php echo e(old('subtitle', $hero->subtitle)); ?></textarea>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Image Upload -->
        <div class="mb-4">
            <label for="image" class="block font-medium text-gray-700">Image</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="text-red-600 text-sm"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero->image): ?>
                <div class="mt-2">
                    <p class="text-gray-600 text-sm mb-1">Current Image:</p>
                    <img src="<?php echo e(asset('storage/' . $hero->image)); ?>" alt="Hero Image" class="w-64 h-40 object-cover rounded">
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        <!-- Stats -->
        <div class="mb-4">
            <label class="block font-medium text-gray-700">Stats</label>
            <div id="stats-container">
                <?php
                    $oldStats = old('stats', $hero->stats ?? []);
                    if (!count($oldStats)) {
                        $oldStats = [['value' => '', 'label' => '', 'icon' => '']];
                    }
                ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $oldStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex gap-2 mb-2 stat-item">
                        <input type="text" name="stats[<?php echo e($i); ?>][value]" placeholder="Value" value="<?php echo e($stat['value'] ?? ''); ?>" class="border p-2 rounded">
                        <input type="text" name="stats[<?php echo e($i); ?>][label]" placeholder="Label" value="<?php echo e($stat['label'] ?? ''); ?>" class="border p-2 rounded">
                        <input type="text" name="stats[<?php echo e($i); ?>][icon]" placeholder="Icon" value="<?php echo e($stat['icon'] ?? ''); ?>" class="border p-2 rounded">
                        <button type="button" class="remove-stat bg-red-500 text-white px-2 rounded">Remove</button>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <button type="button" id="add-stat" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Stat</button>
        </div>

        <!-- Active -->
        <div class="mb-4 flex items-center gap-2">
            <input type="checkbox" name="is_active" id="is_active" value="1" <?php echo e(old('is_active', $hero->is_active) ? 'checked' : ''); ?> class="rounded">
            <label for="is_active" class="text-gray-700 font-medium">Active</label>
        </div>

        <div class="flex justify-end gap-2">
            <a href="<?php echo e(route('admin.heroes.index')); ?>" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white font-bold">Update Hero</button>
        </div>
    </form>
</div>

<script>
document.getElementById('add-stat').addEventListener('click', function() {
    let container = document.getElementById('stats-container');
    let index = container.children.length;
    let div = document.createElement('div');
    div.classList.add('flex', 'gap-2', 'mb-2', 'stat-item');
    div.innerHTML = `
        <input type="text" name="stats[${index}][value]" placeholder="Value" class="border p-2 rounded">
        <input type="text" name="stats[${index}][label]" placeholder="Label" class="border p-2 rounded">
        <input type="text" name="stats[${index}][icon]" placeholder="Icon" class="border p-2 rounded">
        <button type="button" class="remove-stat bg-red-500 text-white px-2 rounded">Remove</button>
    `;
    container.appendChild(div);
});

document.addEventListener('click', function(e) {
    if (e.target && e.target.classList.contains('remove-stat')) {
        e.target.closest('.stat-item').remove();
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/heroes/edit.blade.php ENDPATH**/ ?>