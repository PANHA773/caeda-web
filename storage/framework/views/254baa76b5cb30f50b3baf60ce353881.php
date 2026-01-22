

<?php $__env->startSection('title', 'Staffs'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Staffs</h1>
            <a href="<?php echo e(route('admin.users.create')); ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                + Create New Staff
            </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php $__empty_1 = true; $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo e($loop->iteration); ?></td>
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-3">
                                    <img src="<?php echo e($user->avatar_url); ?>" alt="<?php echo e($user->name); ?>"
                                        class="w-10 h-10 rounded-lg object-cover border border-gray-200 shadow-sm">
                                    <span class="font-medium text-gray-900"><?php echo e($user->name); ?></span>
                                </div>
                            </td>
                            <td class="px-6 py-4"><?php echo e($user->email); ?></td>
                            <td class="px-6 py-4 text-center space-x-2">

                                
                                <a href="<?php echo e(route('admin.users.show', $user->id)); ?>"
                                    class="px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600 transition duration-200">
                                    View
                                </a>
                                
                                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition duration-200">
                                    Edit
                                </a>

                                
                                <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST" class="inline-block"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition duration-200">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No users found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/users/index.blade.php ENDPATH**/ ?>