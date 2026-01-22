

<?php $__env->startSection('title', 'Speakers'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Speakers</h1>

        <a href="<?php echo e(route('admin.speakers.create')); ?>"
            class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">Add Speaker</a>

        <?php if(session('success')): ?>
            <div class="bg-green-200 text-green-800 p-2 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Topic</th>
                    <th class="border px-4 py-2">Active</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $speakers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $speaker): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="border px-4 py-2">
                            <?php if($speaker->image): ?>
                                <img src="<?php echo e($speaker->image_url); ?>" alt="<?php echo e($speaker->name); ?>"
                                    class="w-16 h-16 object-cover rounded-full">
                            <?php else: ?>
                                <span class="text-gray-400">No Image</span>
                            <?php endif; ?>
                        </td>
                        <td class="border px-4 py-2"><?php echo e($speaker->name); ?></td>
                        <td class="border px-4 py-2"><?php echo e($speaker->title); ?></td>
                        <td class="border px-4 py-2"><?php echo e($speaker->topic); ?></td>
                        <td class="border px-4 py-2"><?php echo e($speaker->is_active ? 'Yes' : 'No'); ?></td>
                        <td class="border px-4 py-2">
                            <a href="<?php echo e(route('admin.speakers.edit', $speaker)); ?>" class="text-blue-500 mr-2">Edit</a>
                            <form action="<?php echo e(route('admin.speakers.destroy', $speaker)); ?>" method="POST" class="inline-block">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-red-500"
                                    onclick="return confirm('Delete this speaker?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/speakers/index.blade.php ENDPATH**/ ?>