

<?php $__env->startSection('title', 'Edit Success Story'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">

    
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Edit Success Story</h1>
            <p class="text-gray-500">Update alumni achievement details</p>
        </div>
        <a href="<?php echo e(route('admin.success-stories.index')); ?>"
           class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg shadow">
            ← Back
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
        <form action="<?php echo e(route('admin.success-stories.update', $successStory->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                
                <div>
                    <label for="name" class="block text-gray-700 font-medium mb-1">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name', $successStory->name)); ?>"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                </div>

                
                <div>
                    <label for="role" class="block text-gray-700 font-medium mb-1">Role / Position</label>
                    <input type="text" name="role" id="role" value="<?php echo e(old('role', $successStory->role)); ?>"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           required>
                </div>

                
                <div class="md:col-span-2">
                    <label for="achievement" class="block text-gray-700 font-medium mb-1">Achievement</label>
                    <textarea name="achievement" id="achievement" rows="3"
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                              required><?php echo e(old('achievement', $successStory->achievement)); ?></textarea>
                </div>

                
                <div>
                    <label for="image" class="block text-gray-700 font-medium mb-1">Image URL</label>
                    <input type="text" name="image" id="image" value="<?php echo e(old('image', $successStory->image)); ?>"
                           placeholder="https://example.com/photo.jpg"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                
                <div>
                    <label for="year" class="block text-gray-700 font-medium mb-1">Year / Class</label>
                    <input type="text" name="year" id="year" value="<?php echo e(old('year', $successStory->year)); ?>"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                
                <div class="md:col-span-2">
                    <label for="quote" class="block text-gray-700 font-medium mb-1">Quote / Testimonial</label>
                    <textarea name="quote" id="quote" rows="4"
                              class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                              required><?php echo e(old('quote', $successStory->quote)); ?></textarea>
                </div>

                
                <div>
                    <label for="order" class="block text-gray-700 font-medium mb-1">Order</label>
                    <input type="number" name="order" id="order" value="<?php echo e(old('order', $successStory->order)); ?>"
                           class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                           min="1">
                </div>

            </div>

            
            <div class="mt-6 flex justify-end">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg shadow">
                    Update Story
                </button>
            </div>

        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/success-stories/edit.blade.php ENDPATH**/ ?>