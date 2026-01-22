

<?php $__env->startSection('title', 'View Staff'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Staff Details</h1>
            <a href="<?php echo e(route('admin.users.index')); ?>"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                Back to Users
            </a>
        </div>

        
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
            <div class="md:flex">
                
                <div class="md:w-1/3 bg-gray-50 p-8 border-r border-gray-100 flex flex-col items-center justify-center">
                    <div class="relative mb-4">
                        <img src="<?php echo e($user->avatar_url); ?>" alt="<?php echo e($user->name); ?>"
                            class="w-32 h-32 rounded-2xl object-cover border-4 border-white shadow-lg">
                        <?php if($user->is_admin): ?>
                            <div
                                class="absolute -top-2 -right-2 bg-yellow-400 text-yellow-900 text-xs font-bold px-2 py-1 rounded-lg border-2 border-white shadow-sm">
                                Admin
                            </div>
                        <?php endif; ?>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900 text-center"><?php echo e($user->name); ?></h2>
                    <p class="text-gray-500 text-sm"><?php echo e($user->email); ?></p>
                    <div
                        class="mt-4 px-3 py-1 bg-blue-50 text-blue-700 text-xs font-bold rounded-full uppercase tracking-wider">
                        <?php echo e($user->is_admin ? 'Full Administrator' : 'Staff Member'); ?>

                    </div>
                </div>

                
                <div class="md:w-2/3 p-8">
                    <h3 class="text-lg font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">Account Information</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-6">
                        <?php $__currentLoopData = $columns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $column): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!in_array($column, ['password', 'remember_token', 'avatar', 'is_admin', 'name', 'email'])): ?>
                                <div class="flex flex-col">
                                    <span
                                        class="text-gray-500 text-xs font-bold uppercase tracking-wider mb-1"><?php echo e(str_replace('_', ' ', $column)); ?></span>
                                    <div class="text-gray-900 font-medium">
                                        <?php $val = $user->$column; ?>
                                        <?php if(is_array($val)): ?>
                                            <div class="flex flex-wrap gap-1 mt-1">
                                                <?php $__empty_1 = true; $__currentLoopData = $val; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <span
                                                        class="bg-indigo-100 text-indigo-700 text-xs px-2 py-0.5 rounded-md font-semibold capitalize"><?php echo e($p); ?></span>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <span class="text-gray-400 italic">No permissions assigned</span>
                                                <?php endif; ?>
                                            </div>
                                        <?php elseif(is_bool($val)): ?>
                                            <?php echo e($val ? 'Yes' : 'No'); ?>

                                        <?php else: ?>
                                            <?php echo e($val ?? '-'); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            
            <div class="mt-6 flex space-x-2">
                <a href="<?php echo e(route('admin.users.edit', $user->id)); ?>"
                    class="px-4 py-2 bg-blue-600 text-white rounded shadow hover:bg-blue-700 transition duration-200">
                    Edit
                </a>

                <form action="<?php echo e(route('admin.users.destroy', $user->id)); ?>" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit"
                        class="px-4 py-2 bg-red-500 text-white rounded shadow hover:bg-red-600 transition duration-200">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/users/show.blade.php ENDPATH**/ ?>