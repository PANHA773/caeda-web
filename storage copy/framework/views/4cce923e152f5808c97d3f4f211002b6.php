

<?php $__env->startSection('title', 'Add Award'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Add New Award</h1>
            <p class="text-gray-500">Create a new award entry for the website</p>
        </div>
        <a href="<?php echo e(route('admin.awards.index')); ?>"
           class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg shadow">
            <i class="fas fa-arrow-left"></i> Back
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc list-inside">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-white rounded-xl shadow p-6">
        <form action="<?php echo e(route('admin.awards.store')); ?>" method="POST" class="space-y-4">
            <?php echo csrf_field(); ?>

            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-1">Award Title</label>
                <input type="text" name="title" id="title"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="<?php echo e(old('title')); ?>" required>
            </div>

            <div>
                <label for="organization" class="block text-gray-700 font-semibold mb-1">Organization</label>
                <input type="text" name="organization" id="organization"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="<?php echo e(old('organization')); ?>" required>
            </div>

            <div>
                <label for="year" class="block text-gray-700 font-semibold mb-1">Year</label>
                <input type="number" name="year" id="year"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       value="<?php echo e(old('year', date('Y'))); ?>" min="2000" max="<?php echo e(date('Y')); ?>" required>
            </div>

            <div>
                <label for="category" class="block text-gray-700 font-semibold mb-1">Category</label>
                <select name="category" id="category"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                        required>
                    <option value="" disabled selected>Select Category</option>
                    <option value="international" <?php echo e(old('category') == 'international' ? 'selected' : ''); ?>>International</option>
                    <option value="education" <?php echo e(old('category') == 'education' ? 'selected' : ''); ?>>Education</option>
                    <option value="innovation" <?php echo e(old('category') == 'innovation' ? 'selected' : ''); ?>>Innovation</option>
                    <option value="research" <?php echo e(old('category') == 'research' ? 'selected' : ''); ?>>Research</option>
                </select>
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                          required><?php echo e(old('description')); ?></textarea>
            </div>

            <div>
                <label for="icon" class="block text-gray-700 font-semibold mb-1">Icon (FontAwesome)</label>
                <input type="text" name="icon" id="icon"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                       placeholder="e.g., trophy, lightbulb"
                       value="<?php echo e(old('icon')); ?>">
                <p class="text-gray-400 text-sm mt-1">Use a valid FontAwesome 6 icon class.</p>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-5 py-2 rounded-lg shadow flex items-center gap-2">
                    <i class="fas fa-save"></i> Save Award
                </button>
            </div>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/awards/create.blade.php ENDPATH**/ ?>