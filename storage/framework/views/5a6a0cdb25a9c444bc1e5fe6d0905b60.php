

<?php $__env->startSection('title', 'Welcome Sections'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Welcome Sections</h1>

        <a href="<?php echo e(route('admin.welcome_sections.create')); ?>"
            class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
            Add Section
        </a>

        <?php if(session('success')): ?>
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <div class="overflow-x-auto bg-white rounded shadow border">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Title</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Description</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Signature</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Image</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Badges</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Stats</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Active</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2"><?php echo e($section->title); ?></td>
                            <td class="px-4 py-2 max-w-xs truncate">
                                <?php echo e(is_array($section->description) ? implode(' ', $section->description) : $section->description); ?>

                            </td>
                            <td class="px-4 py-2">
                                <div class="text-gray-900 font-semibold"><?php echo e($section->signature_name); ?></div>
                                <div class="text-gray-600 text-sm"><?php echo e($section->signature_title); ?></div>
                            </td>
                            <td class="px-4 py-2">
                                <?php if($section->image): ?>
                                    <img src="<?php echo e($section->image_url); ?>" alt="Image"
                                        class="w-24 h-24 object-cover rounded-xl border">
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php if($section->badges): ?>
                                    <?php $__currentLoopData = $section->badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="inline-block px-2 py-1 text-xs font-bold rounded-full mb-1"
                                            style="background-color: <?php echo e($badge['color'] ?? '#ddd'); ?>; color: white;">
                                            <?php echo e($badge['text']); ?>

                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2">
                                <?php if($section->stats): ?>
                                    <ul class="space-y-1 text-sm">
                                        <?php $__currentLoopData = $section->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <span class="font-bold"><?php echo e($stat['number']); ?></span> - <?php echo e($stat['label']); ?>

                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 py-2"><?php echo e($section->is_active ? 'Yes' : 'No'); ?></td>
                            <td class="px-4 py-2 space-x-2">
                                <a href="<?php echo e(route('admin.welcome_sections.edit', $section)); ?>"
                                    class="text-blue-500 hover:underline">Edit</a>
                                <form action="<?php echo e(route('admin.welcome_sections.destroy', $section)); ?>" method="POST"
                                    class="inline-block">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-500 hover:underline"
                                        onclick="return confirm('Delete this section?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/welcome_sections/index.blade.php ENDPATH**/ ?>