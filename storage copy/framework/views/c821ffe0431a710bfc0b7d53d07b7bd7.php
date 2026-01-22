

<?php $__env->startSection('title', 'Upcoming Workshops Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto px-6 py-8">

    
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Upcoming Workshops</h1>
        <a href="<?php echo e(route('admin.upcoming_workshops.create')); ?>"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add Workshop
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full text-left">
            <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
                <tr>
                    <th class="px-4 py-3">#</th>
                    <th class="px-4 py-3">Thumbnail</th>
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Instructor</th>
                    <th class="px-4 py-3">Instructor Image</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $upcomingWorkshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-4 py-3"><?php echo e($index + 1); ?></td>

                        
                        <td class="px-4 py-3">
                            <img src="<?php echo e($workshop->image ? asset('storage/'.$workshop->image) : 'https://via.placeholder.com/64'); ?>"
                                 alt="<?php echo e($workshop->title); ?>"
                                 class="w-16 h-16 object-cover rounded-lg shadow">
                        </td>

                        
                        <td class="px-4 py-3 font-medium"><?php echo e($workshop->title); ?></td>

                        
                        <td class="px-4 py-3"><?php echo e($workshop->instructor); ?></td>

                        
                        <td class="px-4 py-3">
                            <img src="<?php echo e($workshop->instructor_image ? asset('storage/'.$workshop->instructor_image) : 'https://via.placeholder.com/48'); ?>"
                                 alt="<?php echo e($workshop->instructor); ?>"
                                 class="w-12 h-12 object-cover rounded-full">
                        </td>

                        
                        <td class="px-4 py-3"><?php echo e($workshop->date ? $workshop->date->format('M d, Y') : '-'); ?></td>

                        
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 rounded text-xs font-semibold
                                <?php echo e($workshop->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                <?php echo e($workshop->status ? 'Active' : 'Inactive'); ?>

                            </span>
                        </td>

                        
                        <td class="px-4 py-3 flex gap-2">
                            <a href="<?php echo e(route('admin.upcoming_workshops.edit', $workshop->id)); ?>"
                               class="px-3 py-1 text-white bg-blue-600 rounded hover:bg-blue-700 text-sm transition">
                                Edit
                            </a>

                            <form action="<?php echo e(route('admin.upcoming_workshops.destroy', $workshop->id)); ?>"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this workshop?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit"
                                        class="px-3 py-1 text-white bg-red-600 rounded hover:bg-red-700 text-sm transition">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="text-center py-6 text-gray-500">
                            No upcoming workshops found.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/upcoming_workshops/index.blade.php ENDPATH**/ ?>