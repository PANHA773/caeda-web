

<?php $__env->startSection('title', 'Edit Timeline Event'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6 max-w-3xl">
    <h1 class="text-3xl font-bold mb-6 text-gray-900">Edit Timeline Event</h1>

    <a href="<?php echo e(route('admin.timeline_events.index')); ?>"
       class="inline-block mb-6 bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300 transition">
        ← Back to Timeline Events
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5 space-y-1">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form action="<?php echo e(route('admin.timeline_events.update', $event)); ?>" method="POST" class="bg-white p-6 rounded-xl shadow space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        
        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title"
                   value="<?php echo e(old('title', $event->title)); ?>"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Event title" required>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Date</label>
            <input type="date" name="date"
                   value="<?php echo e(old('date', $event->date->format('Y-m-d'))); ?>"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border rounded px-3 py-2"
                      placeholder="Describe the event" required><?php echo e(old('description', $event->description)); ?></textarea>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Status</label>
            <select name="status" class="w-full border rounded px-3 py-2">
                <option value="completed" <?php echo e(old('status', $event->status) == 'completed' ? 'selected' : ''); ?>>Completed</option>
                <option value="active" <?php echo e(old('status', $event->status) == 'active' ? 'selected' : ''); ?>>Active</option>
                <option value="upcoming" <?php echo e(old('status', $event->status) == 'upcoming' ? 'selected' : ''); ?>>Upcoming</option>
            </select>
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Icon (FontAwesome class)</label>
            <input type="text" name="icon"
                   value="<?php echo e(old('icon', $event->icon)); ?>"
                   class="w-full border rounded px-3 py-2"
                   placeholder="e.g., fas fa-calendar-check">
        </div>

        
        <div>
            <label class="block font-semibold mb-1">Sort Order</label>
            <input type="number" name="sort_order"
                   value="<?php echo e(old('sort_order', $event->sort_order)); ?>"
                   class="w-full border rounded px-3 py-2"
                   placeholder="Sort order (numeric)">
        </div>

        
        <div>
            <label class="inline-flex items-center gap-2">
                <input type="hidden" name="is_active" value="0">
                <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active', $event->is_active) ? 'checked' : ''); ?> class="form-checkbox">
                <span class="font-semibold">Active</span>
            </label>
        </div>

        
        <div>
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
                Update Event
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/timeline_events/edit.blade.php ENDPATH**/ ?>