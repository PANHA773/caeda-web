

<?php $__env->startSection('title', 'Add Upcoming Workshop'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto px-6 py-8">

    
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Upcoming Workshop</h1>
        <p class="text-gray-500">Fill out the details to add a new upcoming workshop</p>
    </div>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
            <ul class="list-disc list-inside">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </ul>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <form action="<?php echo e(route('admin.upcoming_workshops.store')); ?>" 
          method="POST" 
          enctype="multipart/form-data"
          class="bg-white shadow rounded-xl p-6 space-y-6">

        <?php echo csrf_field(); ?>

        
        <div>
            <label class="block text-sm font-medium text-gray-700">Workshop Title</label>
            <input type="text" name="title" 
                   value="<?php echo e(old('title')); ?>"
                   class="w-full mt-1 border rounded-lg px-4 py-2" 
                   placeholder="Enter workshop title" required>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700">Date</label>
            <input type="date" name="date"
                   value="<?php echo e(old('date')); ?>"
                   class="w-full mt-1 border rounded-lg px-4 py-2" required>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor Name</label>
            <input type="text" name="instructor"
                   value="<?php echo e(old('instructor')); ?>"
                   class="w-full mt-1 border rounded-lg px-4 py-2" 
                   placeholder="Enter instructor name" required>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700">Workshop Thumbnail</label>
            <input type="file" name="image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*" required>
        </div>

        
        <div>
            <label class="block text-sm font-medium text-gray-700">Instructor Image</label>
            <input type="file" name="instructor_image"
                   class="w-full mt-1 border rounded-lg px-4 py-2"
                   accept="image/*" required>
        </div>

        
        <div class="flex items-center gap-3">
            <input type="checkbox" name="status" value="1" <?php echo e(old('status', true) ? 'checked' : ''); ?>>
            <label class="text-sm text-gray-700">Active</label>
        </div>

        
        <div class="flex justify-end gap-3">
            <a href="<?php echo e(route('admin.upcoming_workshops.index')); ?>"
               class="px-4 py-2 border rounded-lg text-gray-700 hover:bg-gray-100">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Add Workshop
            </button>
        </div>

    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/upcoming_workshops/create.blade.php ENDPATH**/ ?>