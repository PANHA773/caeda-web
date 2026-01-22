

<?php $__env->startSection('title', 'Timeline Events'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Timeline Events</h1>
        <a href="<?php echo e(route('admin.timeline_events.create')); ?>"
           class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition">
            + Add Event
        </a>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-6 shadow">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="overflow-x-auto bg-white rounded-lg shadow border">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Sort Order</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Active</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-3 text-gray-800"><?php echo e($event->title); ?></td>
                        <td class="px-6 py-3 text-gray-600"><?php echo e($event->date->format('M d, Y')); ?></td>
                        <td class="px-6 py-3">
                            <span class="px-2 py-1 rounded-full text-sm font-semibold
                                <?php echo e($event->status === 'completed' ? 'bg-green-100 text-green-800' : ''); ?>

                                <?php echo e($event->status === 'active' ? 'bg-blue-100 text-blue-800' : ''); ?>

                                <?php echo e($event->status === 'upcoming' ? 'bg-gray-100 text-gray-800' : ''); ?>">
                                <?php echo e(ucfirst($event->status)); ?>

                            </span>
                        </td>
                        <td class="px-6 py-3 text-gray-600"><?php echo e($event->sort_order); ?></td>
                        <td class="px-6 py-3 text-gray-600"><?php echo e($event->is_active ? 'Yes' : 'No'); ?></td>
                        <td class="px-6 py-3 flex gap-2">
                            <a href="<?php echo e(route('admin.timeline_events.edit', $event)); ?>"
                               class="text-blue-500 hover:underline">Edit</a>
                            <form action="<?php echo e(route('admin.timeline_events.destroy', $event)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="text-red-500 hover:underline"
                                        onclick="return confirm('Delete this event?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/timeline_events/index.blade.php ENDPATH**/ ?>