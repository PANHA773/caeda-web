

<?php $__env->startSection('title', 'Add Featured Event'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Add Featured Event</h1>

    <a href="<?php echo e(route('admin.featured_events.index')); ?>"
       class="mb-6 inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg transition">
       ← Back to Featured Events
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="bg-white rounded-lg shadow p-6">
        <form action="<?php echo e(route('admin.featured_events.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-medium mb-2">Title</label>
                <input type="text" name="title" id="title"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                       value="<?php echo e(old('title')); ?>" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="start_date" class="block text-gray-700 font-medium mb-2">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="<?php echo e(old('start_date')); ?>" required>
                </div>
                <div>
                    <label for="end_date" class="block text-gray-700 font-medium mb-2">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="<?php echo e(old('end_date')); ?>">
                </div>
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Description</label>
                <textarea name="description" id="description" rows="4"
                          class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                          required><?php echo e(old('description')); ?></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
                    <select name="status" id="status"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                            required>
                        <option value="upcoming" <?php echo e(old('status') == 'upcoming' ? 'selected' : ''); ?>>Upcoming</option>
                        <option value="active" <?php echo e(old('status') == 'active' ? 'selected' : ''); ?>>Active</option>
                        <option value="completed" <?php echo e(old('status') == 'completed' ? 'selected' : ''); ?>>Completed</option>
                    </select>
                </div>
                <div>
                    <label for="is_active" class="block text-gray-700 font-medium mb-2">Active</label>
                    <select name="is_active" id="is_active"
                            class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                        <option value="1" <?php echo e(old('is_active', 1) == 1 ? 'selected' : ''); ?>>Yes</option>
                        <option value="0" <?php echo e(old('is_active') == 0 ? 'selected' : ''); ?>>No</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                <div>
                    <label for="speakers_count" class="block text-gray-700 font-medium mb-2">Speakers</label>
                    <input type="number" name="speakers_count" id="speakers_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="<?php echo e(old('speakers_count', 0)); ?>">
                </div>
                <div>
                    <label for="sessions_count" class="block text-gray-700 font-medium mb-2">Sessions</label>
                    <input type="number" name="sessions_count" id="sessions_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="<?php echo e(old('sessions_count', 0)); ?>">
                </div>
                <div>
                    <label for="attendees_count" class="block text-gray-700 font-medium mb-2">Attendees</label>
                    <input type="number" name="attendees_count" id="attendees_count" min="0"
                           class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                           value="<?php echo e(old('attendees_count', 0)); ?>">
                </div>
            </div>

            <div class="mb-6">
                <label for="icon" class="block text-gray-700 font-medium mb-2">Icon (FontAwesome class)</label>
                <input type="text" name="icon" id="icon"
                       class="w-full border border-gray-300 rounded px-4 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                       value="<?php echo e(old('icon')); ?>">
            </div>

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-3 rounded-lg shadow transition">
                Save Featured Event
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/featured_events/create.blade.php ENDPATH**/ ?>