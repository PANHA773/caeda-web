

<?php $__env->startSection('title', 'News'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold">News</h1>
        <a href="<?php echo e(route('admin.news.create')); ?>" class="px-4 py-2 btn-gradient rounded text-white">+ New Article</a>
    </div>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
        <div class="mb-4 p-3 bg-green-100 text-green-800 rounded"><?php echo e(session('success')); ?></div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <div class="card overflow-hidden">
        <table class="w-full border-collapse">
            <thead class="bg-gray-50">
                <tr class="text-left text-sm text-gray-600">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Published</th>
                    <th class="px-4 py-3">Likes</th>
                    <th class="px-4 py-3">Comments</th>
                    <th class="px-4 py-3">Shares</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="px-4 py-3"><?php echo e($item->title); ?></td>
                        <td class="px-4 py-3"><?php echo e(optional($item->published_at)->format('Y-m-d')); ?></td>
                        <td class="px-4 py-3"><?php echo e($item->likes); ?></td>
                        <td class="px-4 py-3"><?php echo e($item->comments); ?></td>
                        <td class="px-4 py-3"><?php echo e($item->shares); ?></td>
                        <td class="px-4 py-3">
                            <a href="<?php echo e(route('admin.news.edit', $item->id)); ?>" class="px-3 py-1 bg-blue-600 text-white rounded">Edit</a>
                            <form action="<?php echo e(route('admin.news.destroy', $item->id)); ?>" method="POST" class="inline-block" onsubmit="return confirm('Delete this article?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button class="px-3 py-1 bg-red-500 text-white rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <?php echo e($news->links()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/news/index.blade.php ENDPATH**/ ?>