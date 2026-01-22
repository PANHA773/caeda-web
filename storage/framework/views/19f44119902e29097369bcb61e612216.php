<?php $__env->startSection('content'); ?>
<div class="p-6">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Featured Menus</h1>
            <p class="text-gray-500">Manage homepage featured drinks</p>
        </div>

        <a href="<?php echo e(route('admin.featured_menus.create')); ?>"
           class="inline-flex items-center gap-2 px-5 py-2.5 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow">
            <i class="fas fa-plus"></i>
            Add Menu
        </a>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Badge</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-left">Rating</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Order</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                <?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">

                        <!-- Image -->
                        <td class="px-4 py-3">
                            <?php
                                $menuImage = $menu->image ?? null;
                                $storagePath = $menuImage ? public_path('storage/' . $menuImage) : null;
                                $hasStorageImage = $storagePath && file_exists($storagePath);
                            ?>

                            <?php if($hasStorageImage): ?>
                                <img src="<?php echo e(asset('storage/' . $menuImage)); ?>"
                                     class="w-20 h-16 object-cover rounded-lg shadow">
                            <?php else: ?>
                                <div class="w-20 h-16 flex items-center justify-center bg-gray-100 rounded-lg text-gray-400 overflow-hidden">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-10 h-8 text-gray-300" fill="none" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h14v6a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-6z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 10v1a3 3 0 0 1-3 3"></path>
                                    </svg>
                                </div>
                            <?php endif; ?>
                        </td>

                        <!-- Title -->
                        <td class="px-4 py-3 font-semibold text-gray-800">
                            <?php echo e($menu->title); ?>

                        </td>

                        <!-- Badge -->
                        <td class="px-4 py-3">
                            <?php if($menu->badge): ?>
                                <span class="px-3 py-1 text-xs font-semibold rounded-full
                                    <?php if($menu->badge === 'bestseller'): ?> bg-amber-100 text-amber-700
                                    <?php elseif($menu->badge === 'trending'): ?> bg-blue-100 text-blue-700
                                    <?php else: ?> bg-green-100 text-green-700
                                    <?php endif; ?>">
                                    <?php echo e(strtoupper($menu->badge)); ?>

                                </span>
                            <?php else: ?>
                                <span class="text-gray-400">—</span>
                            <?php endif; ?>
                        </td>

                        <!-- Price -->
                        <td class="px-4 py-3">
                            <div class="font-bold text-amber-600">
                                $<?php echo e(number_format($menu->price, 2)); ?>

                            </div>

                            <?php if($menu->old_price): ?>
                                <div class="text-xs text-gray-400 line-through">
                                    $<?php echo e(number_format($menu->old_price, 2)); ?>

                                </div>
                            <?php endif; ?>
                        </td>

                        <!-- Rating -->
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-1">
                                <i class="fas fa-star text-amber-400"></i>
                                <span class="font-semibold"><?php echo e($menu->rating ?? '0.0'); ?></span>
                                <span class="text-gray-400">(<?php echo e($menu->reviews ?? 0); ?>)</span>
                            </div>
                        </td>

                        <!-- Status -->
                        <td class="px-4 py-3 text-center">
                            <?php if($menu->is_active): ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-green-100 text-green-700 rounded-full">
                                    Active
                                </span>
                            <?php else: ?>
                                <span class="px-3 py-1 text-xs font-semibold bg-gray-200 text-gray-600 rounded-full">
                                    Hidden
                                </span>
                            <?php endif; ?>
                        </td>

                        <!-- Order -->
                        <td class="px-4 py-3 text-center font-semibold">
                            <?php echo e($menu->order ?? 0); ?>

                        </td>

                        <!-- Actions -->
                        <td class="px-4 py-3 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="<?php echo e(route('admin.featured_menus.edit', $menu->id)); ?>"
                                   class="px-3 py-1.5 bg-blue-100 text-blue-700 rounded-lg hover:bg-blue-200">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="<?php echo e(route('admin.featured_menus.destroy', $menu->id)); ?>"
                                      method="POST"
                                      onsubmit="return confirm('Delete this menu?')">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button
                                        class="px-3 py-1.5 bg-red-100 text-red-700 rounded-lg hover:bg-red-200">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-4 py-10 text-center text-gray-500">
                            No featured menus found.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/featured_menus/index.blade.php ENDPATH**/ ?>