

<?php $__env->startSection('title', 'Edit Hero Achievement'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Hero Achievement</h1>
            <p class="text-gray-500">Update the achievement details for the Hero section</p>
        </div>
        <a href="<?php echo e(route('admin.hero-achievements.index')); ?>"
           class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow">
            Back to List
        </a>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc pl-5">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <div class="bg-white rounded-xl shadow p-6">
        <form action="<?php echo e(route('admin.hero-achievements.update', $heroAchievement->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                
                <div>
                    <label for="title" class="block font-semibold text-gray-700 mb-2">Title</label>
                    <input type="text" name="title" id="title"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="<?php echo e(old('title', $heroAchievement->title)); ?>" required>
                </div>

                
                <div>
                    <label for="value" class="block font-semibold text-gray-700 mb-2">Value</label>
                    <input type="text" name="value" id="value"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="<?php echo e(old('value', $heroAchievement->value)); ?>" required>
                </div>

                
                <div>
                    <label for="icon" class="block font-semibold text-gray-700 mb-2">Icon (Emoji or FontAwesome)</label>
                    <input type="text" name="icon" id="icon"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="<?php echo e(old('icon', $heroAchievement->icon)); ?>">
                    <small class="text-gray-400 text-xs">Use an emoji or FontAwesome class, e.g., 🏆</small>
                </div>

                
                <div>
                    <label for="order" class="block font-semibold text-gray-700 mb-2">Order</label>
                    <input type="number" name="order" id="order"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-indigo-200"
                           value="<?php echo e(old('order', $heroAchievement->order)); ?>" min="1">
                </div>

            </div>

            
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow">
                    <i class="fas fa-edit mr-2"></i> Update Achievement
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/hero-achievements/edit.blade.php ENDPATH**/ ?>