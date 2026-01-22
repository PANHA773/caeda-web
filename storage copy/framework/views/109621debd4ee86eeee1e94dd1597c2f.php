

<?php $__env->startSection('title', 'Featured Events'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Featured Events</h1>

    <a href="<?php echo e(route('admin.featured_events.create')); ?>"
       class="mb-6 inline-block bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow transition">
       + Add Featured Event
    </a>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border rounded-lg shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-3 text-left">Title</th>
                    <th class="border px-4 py-3 text-left">Start Date</th>
                    <th class="border px-4 py-3 text-left">End Date</th>
                    <th class="border px-4 py-3 text-left">Status</th>
                    <th class="border px-4 py-3 text-left">Speakers</th>
                    <th class="border px-4 py-3 text-left">Sessions</th>
                    <th class="border px-4 py-3 text-left">Attendees</th>
                    <th class="border px-4 py-3 text-left">Active</th>
                    <th class="border px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $featuredEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="border px-4 py-3 font-medium"><?php echo e($event->title); ?></td>
                        <td class="border px-4 py-3"><?php echo e($event->start_date->format('M d, Y')); ?></td>
                        <td class="border px-4 py-3"><?php echo e($event->end_date ? $event->end_date->format('M d, Y') : '-'); ?></td>
                        <td class="border px-4 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                <?php if($event->status == 'upcoming'): ?> bg-yellow-100 text-yellow-800
                                <?php elseif($event->status == 'active'): ?> bg-green-100 text-green-800
                                <?php else: ?> bg-gray-200 text-gray-800 <?php endif; ?>">
                                <?php echo e(ucfirst($event->status)); ?>

                            </span>
                        </td>
                        <td class="border px-4 py-3 text-center"><?php echo e($event->speakers_count); ?></td>
                        <td class="border px-4 py-3 text-center"><?php echo e($event->sessions_count); ?></td>
                        <td class="border px-4 py-3 text-center"><?php echo e($event->attendees_count); ?></td>
                        <td class="border px-4 py-3 text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($event->is_active): ?>
                                <span class="text-green-600 font-semibold">Yes</span>
                            <?php else: ?>
                                <span class="text-red-600 font-semibold">No</span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>
                        <td class="border px-4 py-3 text-center space-x-2">
                            <a href="<?php echo e(route('admin.featured_events.edit', $event)); ?>"
                               class="text-blue-600 hover:text-blue-800 font-medium">Edit</a>
                            <form action="<?php echo e(route('admin.featured_events.destroy', $event)); ?>" method="POST" class="inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium" onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="9" class="text-center py-6 text-gray-400">No featured events found.</td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <?php echo e($featuredEvents->links()); ?> 
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/featured_events/index.blade.php ENDPATH**/ ?>