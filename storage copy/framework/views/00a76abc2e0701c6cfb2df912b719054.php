

<?php $__env->startSection('title', 'Recent Activity'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto px-6 py-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Recent Activity</h1>
            <p class="text-gray-500">All recent changes across the site</p>
        </div>
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-sm text-gray-600">Back to Dashboard</a>
    </div>

    <div class="bg-white border rounded-xl shadow p-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activities->count()): ?>
            <ul class="divide-y">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $act): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="p-4 flex items-start justify-between">
                    <div>
                        <div class="text-sm text-gray-700">
                            <span class="font-medium"><?php echo e($act['user']); ?></span>
                            <span class="text-indigo-600 font-medium"> updated </span>
                            <span class="font-semibold"><?php echo e($act['model']); ?></span>
                            <span class="text-gray-600"> — <?php echo e($act['label']); ?></span>
                        </div>
                        <div class="text-xs text-gray-400 mt-1"><?php echo e(\Carbon\Carbon::parse($act['time'])->toDayDateTimeString()); ?></div>
                    </div>
                    <div class="text-sm text-gray-500">
                        ID: <?php echo e($act['id'] ?? '—'); ?>

                    </div>
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>

            <div class="mt-4">
                <?php echo e($activities->links()); ?>

            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 p-8">No recent activity found.</p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/activity/index.blade.php ENDPATH**/ ?>