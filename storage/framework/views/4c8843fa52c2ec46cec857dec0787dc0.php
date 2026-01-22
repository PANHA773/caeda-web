

<?php $__env->startSection('title', 'Edit Speaker'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Edit Speaker</h1>

    <?php if($errors->any()): ?>
        <div class="bg-red-200 text-red-800 p-4 rounded mb-6">
            <ul class="list-disc pl-5">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('admin.speakers.update', $speaker)); ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-4">
            <label class="block font-bold mb-2">Name</label>
            <input type="text" name="name" value="<?php echo e(old('name', $speaker->name)); ?>" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Title</label>
            <input type="text" name="title" value="<?php echo e(old('title', $speaker->title)); ?>" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Topic</label>
            <input type="text" name="topic" value="<?php echo e(old('topic', $speaker->topic)); ?>" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Social Platforms (comma-separated)</label>
            <input type="text" name="social" value="<?php echo e(old('social', implode(',', $speaker->social ?? []))); ?>" placeholder="twitter,linkedin,github" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block font-bold mb-2">Current Image</label>
            <?php if($speaker->image): ?>
                <div class="mb-2">
                    <img src="<?php echo e(asset('storage/'.$speaker->image)); ?>" alt="<?php echo e($speaker->name); ?>" class="w-32 h-32 object-cover rounded-full">
                </div>
            <?php endif; ?>
            <label class="block font-bold mb-2">Change Image</label>
            <input type="file" name="image" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-4 flex items-center space-x-2">
            <input type="checkbox" name="is_active" value="1" <?php echo e($speaker->is_active ? 'checked' : ''); ?> class="form-checkbox">
            <label class="font-bold">Active</label>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition-all">Update Speaker</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/speakers/edit.blade.php ENDPATH**/ ?>