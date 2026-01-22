

<?php $__env->startSection('title', 'Menu Items'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold">Menu Items</h2>
            <p class="text-sm text-gray-500">Manage goods and menu entries</p>
        </div>
        <a href="<?php echo e(route('admin.menu_items.create')); ?>" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">+ Add Item</a>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="p-3 bg-green-100 text-green-700 mb-4 rounded"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-600 text-xs uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Image</th>
                    <th class="px-4 py-3 text-left">Title</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-center">Status</th>
                    <th class="px-4 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td class="px-4 py-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->image): ?>
                            <img src="<?php echo e(asset('storage/'.$item->image)); ?>" class="w-20 h-16 object-cover rounded">
                        <?php else: ?>
                            <div class="w-20 h-16 bg-gray-100 rounded flex items-center justify-center text-gray-400">No</div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </td>
                    <td class="px-4 py-3"><?php echo e($item->title); ?></td>
                    <td class="px-4 py-3"><?php echo e($item->category->name ?? '—'); ?></td>
                    <td class="px-4 py-3">$<?php echo e(number_format($item->price,2)); ?></td>
                    <td class="px-4 py-3 text-center"><?php echo e($item->is_active ? 'Active' : 'Hidden'); ?></td>
                    <td class="px-4 py-3 text-center">
                        <a href="<?php echo e(route('admin.menu_items.edit', $item)); ?>" class="px-3 py-1 bg-blue-100 text-blue-700 rounded">Edit</a>
                        <form action="<?php echo e(route('admin.menu_items.destroy', $item)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button class="px-3 py-1 bg-red-100 text-red-700 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="6" class="p-6 text-center text-gray-500">No items found.</td>
                </tr>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4"><?php echo e($items->links()); ?></div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/menu_items/index.blade.php ENDPATH**/ ?>