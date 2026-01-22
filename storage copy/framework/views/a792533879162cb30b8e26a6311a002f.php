

<?php $__env->startSection('title', 'Create Milestone'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-4xl mx-auto">

    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Create Milestone</h1>
        <p class="text-gray-500">Add a new milestone to the timeline</p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-800">
            <ul class="list-disc list-inside text-sm">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.milestones.store')); ?>" method="POST"
          class="bg-white rounded-xl shadow p-6 space-y-6">
        <?php echo csrf_field(); ?>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Year</label>
                <input type="text" name="year" value="<?php echo e(old('year')); ?>"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="2024">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Order</label>
                <input type="number" name="order" value="<?php echo e(old('order', 0)); ?>"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
            </div>
        </div>

        
        <div>
            <label class="block text-sm font-semibold mb-1">Title</label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>"
                   class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                   placeholder="Global Innovation Award">
        </div>

        
        <div>
            <label class="block text-sm font-semibold mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                      placeholder="Describe this milestone..."><?php echo e(old('description')); ?></textarea>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold mb-1">Icon (Emoji)</label>
                <input type="text" name="icon" value="<?php echo e(old('icon')); ?>"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="🚀">
                <p class="text-xs text-gray-500 mt-1">Example: 🚀 ⭐ 🎓 🏛️</p>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Color (Tailwind Class)</label>
                <input type="text" name="color" value="<?php echo e(old('color')); ?>"
                       class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                       placeholder="bg-gradient-to-br from-blue-500 to-cyan-500">
            </div>
        </div>

        
        <div>
            <label class="block text-sm font-semibold mb-1">
                Achievements
                <span class="text-xs text-gray-500">(One per line)</span>
            </label>
            <textarea name="achievements[]" rows="3"
                      class="w-full rounded-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                      placeholder="AI Research Excellence
Digital Transformation Leader"></textarea>
        </div>

        
        <div class="flex justify-end gap-3">
            <a href="<?php echo e(route('admin.milestones.index')); ?>"
               class="px-4 py-2 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-5 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 text-white shadow">
                Save Milestone
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/milestones/create.blade.php ENDPATH**/ ?>