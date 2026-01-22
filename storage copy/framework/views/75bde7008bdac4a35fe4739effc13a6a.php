

<?php $__env->startSection('title', 'Social Links'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-7xl mx-auto px-4 py-6">

    
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Social Media Links</h1>
            <p class="text-gray-500 text-sm">
                Manage your website social media links
            </p>
        </div>

        <a href="<?php echo e(route('admin.social.create')); ?>"
           class="inline-flex items-center justify-center
                  bg-blue-600 hover:bg-blue-700 text-white
                  px-5 py-2.5 rounded-lg font-semibold
                  transition">
            <i class="fas fa-plus mr-2"></i> Add Social Link
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-800">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                        Platform
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                        Icon
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase">
                        URL
                    </th>
                    <th class="px-6 py-3 text-center text-xs font-semibold text-gray-600 uppercase">
                        Status
                    </th>
                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase">
                        Actions
                    </th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $socialLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-800">
                            <?php echo e($social->platform); ?>

                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center justify-center
                                         w-10 h-10 rounded-lg text-white <?php echo e($social->color); ?>">
                                <i class="<?php echo e($social->icon); ?>"></i>
                            </span>
                        </td>

                        <td class="px-6 py-4 text-sm text-blue-600">
                            <a href="<?php echo e($social->url); ?>" target="_blank">
                                <?php echo e($social->url); ?>

                            </a>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($social->is_active): ?>
                                <span class="px-3 py-1 text-xs rounded-full
                                             bg-green-100 text-green-700">
                                    Active
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs rounded-full
                                             bg-gray-200 text-gray-600">
                                    Disabled
                                </span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </td>

                        <td class="px-6 py-4 text-right space-x-2">
                            <a href="<?php echo e(route('admin.social.edit', $social->id)); ?>"
                               class="inline-flex items-center px-3 py-1.5
                                      bg-yellow-500 hover:bg-yellow-600
                                      text-white text-sm rounded">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="<?php echo e(route('admin.social.destroy', $social->id)); ?>"
                                  method="POST"
                                  class="inline-block"
                                  onsubmit="return confirm('Delete this social link?')">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="inline-flex items-center px-3 py-1.5
                                               bg-red-600 hover:bg-red-700
                                               text-white text-sm rounded">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="px-6 py-8 text-center text-gray-400">
                            No social media links found.
                        </td>
                    </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/social/index.blade.php ENDPATH**/ ?>