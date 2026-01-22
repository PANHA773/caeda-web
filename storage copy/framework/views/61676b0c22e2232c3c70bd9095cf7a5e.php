

<?php $__env->startSection('title', 'Edit News'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto p-6 bg-white rounded-2xl shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit News Article</h1>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <form action="<?php echo e(route('admin.news.update', $news->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Title</label>
            <input type="text" name="title" value="<?php echo e(old('title', $news->title)); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Slug (optional)</label>
            <input type="text" name="slug" value="<?php echo e(old('slug', $news->slug)); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Excerpt</label>
            <textarea name="excerpt" rows="3" class="w-full border rounded px-3 py-2"><?php echo e(old('excerpt', $news->excerpt)); ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Content</label>
            <textarea name="content" rows="8" class="w-full border rounded px-3 py-2"><?php echo e(old('content', $news->content)); ?></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Current Image</label>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($news->image): ?>
                <div class="mb-2">
                    <img src="<?php echo e($news->image); ?>" alt="<?php echo e($news->title); ?>" class="w-48 h-auto rounded">
                </div>
            <?php else: ?>
                <div class="mb-2 text-sm text-gray-500">No image uploaded.</div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <label class="block text-gray-700 font-medium mb-1">Replace Image (optional)</label>
            <input type="file" name="image" accept="image/*" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Tags (comma separated)</label>
            <input type="text" name="tags" value="<?php echo e(old('tags', is_array($news->tags) ? implode(', ', $news->tags) : $news->tags)); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Published At (optional)</label>
            <input type="date" name="published_at" value="<?php echo e(old('published_at', optional($news->published_at)->format('Y-m-d'))); ?>" class="w-full border rounded px-3 py-2">
        </div>

        <div class="flex justify-end space-x-2">
            <a href="<?php echo e(route('admin.news.index')); ?>" class="px-4 py-2 bg-gray-300 rounded">Cancel</a>
            <button class="px-4 py-2 btn-gradient rounded text-white">Save</button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>