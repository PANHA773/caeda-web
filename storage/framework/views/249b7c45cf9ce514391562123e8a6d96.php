<?php $__env->startSection('title', 'Edit Menu Item'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Edit Menu Item</h2>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.menu_items.update', $item)); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Title</label>
            <input name="title" class="w-full border rounded px-3 py-2" value="<?php echo e(old('title', $item->title)); ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Category</label>
            <select name="menu_category_id" class="w-full border rounded px-3 py-2" required>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($cat->id); ?>" <?php echo e($item->menu_category_id == $cat->id ? 'selected' : ''); ?>><?php echo e($cat->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Description</label>
            <textarea name="description" class="w-full border rounded px-3 py-2"><?php echo e(old('description', $item->description)); ?></textarea>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Price</label>
                <input name="price" class="w-full border rounded px-3 py-2" value="<?php echo e(old('price', $item->price)); ?>">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Old Price</label>
                <input name="old_price" class="w-full border rounded px-3 py-2" value="<?php echo e(old('old_price', $item->old_price)); ?>">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Current Image</label>
            <?php if($item->image): ?>
                <img src="<?php echo e(asset('storage/'.$item->image)); ?>" class="w-40 h-28 object-cover rounded mb-3">
            <?php else: ?>
                <div class="w-40 h-28 bg-gray-100 rounded mb-3 flex items-center justify-center text-gray-400">No Image</div>
            <?php endif; ?>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div class="flex items-center gap-3">
            <input type="hidden" name="is_active" value="0">
            <input type="checkbox" name="is_active" value="1" <?php echo e($item->is_active ? 'checked' : ''); ?>>
            <label class="text-sm">Active</label>
        </div>

        <div class="mt-6 text-right">
            <a href="<?php echo e(route('admin.menu_items.index')); ?>" class="px-4 py-2 border rounded mr-2">Cancel</a>
            <button class="px-6 py-2 bg-indigo-600 text-white rounded">Update Item</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/menu_items/edit.blade.php ENDPATH**/ ?>