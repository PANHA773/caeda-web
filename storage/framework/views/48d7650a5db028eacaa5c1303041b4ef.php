

<?php $__env->startSection('title', 'News Articles'); ?>
<?php $__env->startSection('page-title', 'News Management'); ?>
<?php $__env->startSection('page-description', 'Manage and publish news articles for your website.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-4 md:p-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900">All Articles</h2>
                <p class="text-sm text-gray-500 mt-1">Total <?php echo e($news->total()); ?> articles found.</p>
            </div>
            <a href="<?php echo e(route('admin.news.create')); ?>"
                class="btn-gradient px-5 py-2.5 rounded-xl text-white font-semibold shadow-lg shadow-indigo-200 flex items-center justify-center space-x-2 transition-all hover:scale-105 active:scale-95">
                <i class="fas fa-plus-circle"></i>
                <span>Create New Article</span>
            </a>
        </div>

        <?php if(session('success')): ?>
            <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-r-xl animate-fadeIn">
                <div class="flex items-center">
                    <i class="fas fa-check-circle mr-3"></i>
                    <p class="font-medium"><?php echo e(session('success')); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-separate border-spacing-0">
                    <thead>
                        <tr class="bg-gray-50/50">
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Article</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Status</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Engagement</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100">
                                Published At</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b border-gray-100 text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-indigo-50/30 transition-colors group">
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-12 w-16 flex-shrink-0 rounded-lg overflow-hidden border border-gray-100 shadow-sm bg-gray-50">
                                            <?php if($item->image): ?>
                                                <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->title); ?>"
                                                    class="h-full w-full object-cover">
                                            <?php else: ?>
                                                <div class="h-full w-full flex items-center justify-center text-gray-300">
                                                    <i class="fas fa-image text-xl"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="min-w-0 max-w-[250px]">
                                            <p
                                                class="text-sm font-bold text-gray-900 truncate group-hover:text-indigo-600 transition-colors">
                                                <?php echo e($item->title); ?></p>
                                            <p class="text-xs text-gray-500 truncate mt-0.5">
                                                <?php echo e($item->excerpt ?? 'No excerpt provided...'); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <?php if($item->published_at && $item->published_at <= now()): ?>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5 animate-pulse"></span>
                                            Published
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-400 mr-1.5"></span>
                                            Draft
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <div class="flex items-center space-x-3 text-sm text-gray-500">
                                        <span title="Likes" class="flex items-center">
                                            <i class="far fa-heart mr-1.5 text-pink-400"></i> <?php echo e($item->likes); ?>

                                        </span>
                                        <span title="Comments" class="flex items-center">
                                            <i class="far fa-comment mr-1.5 text-blue-400"></i> <?php echo e($item->comments); ?>

                                        </span>
                                        <span title="Shares" class="flex items-center">
                                            <i class="far fa-share-square mr-1.5 text-green-400"></i> <?php echo e($item->shares); ?>

                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50">
                                    <span class="text-sm text-gray-600">
                                        <?php echo e($item->published_at ? $item->published_at->format('M d, Y') : 'Not scheduled'); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 border-b border-gray-50 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <a href="<?php echo e(route('admin.news.edit', $item->id)); ?>"
                                            class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition-colors"
                                            title="Edit Article">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.news.destroy', $item->id)); ?>" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this article?');"
                                            class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors"
                                                title="Delete Article">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 bg-gray-50 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-newspaper text-3xl text-gray-200"></i>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900">No articles yet</h3>
                                        <p class="text-gray-500 mt-1">Start by creating your first news article today.</p>
                                        <a href="<?php echo e(route('admin.news.create')); ?>"
                                            class="mt-4 text-indigo-600 font-semibold hover:text-indigo-800">
                                            + Create New Article
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($news->hasPages()): ?>
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    <?php echo e($news->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/news/index.blade.php ENDPATH**/ ?>