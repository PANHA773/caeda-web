

<?php $__env->startSection('title', 'Notifications'); ?>

<?php $__env->startSection('content'); ?>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Notifications</h1>
                <p class="text-gray-600 outline-none">Stay updated with the latest activities.</p>
            </div>
            <?php if(auth()->user()->unreadNotifications->count() > 0): ?>
                <form action="<?php echo e(route('admin.notifications.read_all')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg transition-colors flex items-center space-x-2">
                        <i class="fas fa-check-double"></i>
                        <span>Mark all as read</span>
                    </button>
                </form>
            <?php endif; ?>
        </div>

        <div class="card overflow-hidden">
            <div class="divide-y divide-gray-100">
                <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div
                        class="p-4 hover:bg-gray-50 transition-colors <?php echo e($notification->read_at ? 'opacity-75' : 'bg-indigo-50/30'); ?>">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 mt-1">
                                <span
                                    class="inline-flex items-center justify-center h-10 w-10 rounded-full <?php echo e($notification->data['type'] === 'success' ? 'bg-green-100 text-green-600' : ($notification->data['type'] === 'warning' ? 'bg-yellow-100 text-yellow-600' : ($notification->data['type'] === 'danger' ? 'bg-red-100 text-red-600' : 'bg-indigo-100 text-indigo-600'))); ?>">
                                    <i class="<?php echo e($notification->data['icon'] ?? 'fas fa-bell'); ?>"></i>
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p
                                            class="text-sm font-bold text-gray-900 <?php echo e(!$notification->read_at ? 'text-indigo-900' : ''); ?>">
                                            <?php echo e($notification->data['title']); ?>

                                        </p>
                                        <p class="text-sm text-gray-600 mt-1">
                                            <?php echo e($notification->data['message']); ?>

                                        </p>
                                    </div>
                                    <div class="flex items-center space-x-2 ml-4">
                                        <span class="text-xs text-gray-400 whitespace-nowrap">
                                            <?php echo e($notification->created_at->diffForHumans()); ?>

                                        </span>

                                        <div class="flex space-x-1">
                                            <?php if(!$notification->read_at): ?>
                                                <button onclick="markAsRead('<?php echo e($notification->id); ?>', this)"
                                                    class="text-indigo-600 hover:text-indigo-900 p-1 rounded-md hover:bg-indigo-50 transition-colors"
                                                    title="Mark as read">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                            <?php endif; ?>
                                            <form action="<?php echo e(route('admin.notifications.destroy', $notification->id)); ?>"
                                                method="POST" onsubmit="return confirm('Delete this notification?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit"
                                                    class="text-red-400 hover:text-red-600 p-1 rounded-md hover:bg-red-50 transition-colors"
                                                    title="Delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php if(isset($notification->data['url']) && $notification->data['url'] !== '#'): ?>
                                    <div class="mt-2">
                                        <a href="<?php echo e($notification->data['url']); ?>"
                                            class="text-xs font-semibold text-indigo-600 hover:text-indigo-800 flex items-center space-x-1">
                                            <span>View Details</span>
                                            <i class="fas fa-arrow-right text-[10px]"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="p-12 text-center">
                        <div
                            class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 text-gray-400 mb-4">
                            <i class="fas fa-bell-slash text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900">No notifications yet</h3>
                        <p class="text-gray-500">We'll notify you when something important happens.</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($notifications->hasPages()): ?>
                <div class="px-4 py-3 bg-gray-50 border-t border-gray-100">
                    <?php echo e($notifications->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        function markAsRead(id, btn) {
            fetch(`<?php echo e(url('/admin/notifications')); ?>/${id}/read`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Re-load the page or update UI
                        window.location.reload();
                    }
                });
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/notifications/index.blade.php ENDPATH**/ ?>