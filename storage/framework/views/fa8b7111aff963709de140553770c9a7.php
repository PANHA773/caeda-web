<?php $__env->startSection('content'); ?>
<div class="container mx-auto px-4 md:px-8 py-8">

    
    <div class="flex flex-col md:flex-row md:justify-between items-center mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900">
            Edit Office Manager
        </h1>
        <a href="<?php echo e(route('admin.office-managers.index')); ?>"
           class="mt-4 md:mt-0 inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700
                  text-white font-semibold rounded-lg shadow transition">
            ← Back to Managers
        </a>
    </div>

    
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8">
        <form action="<?php echo e(route('admin.office-managers.update', $officeManager)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="mb-6">
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" name="name" id="name"
                       value="<?php echo e(old('name', $officeManager->name)); ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-6">
                <label for="position" class="block text-gray-700 font-semibold mb-2">Position</label>
                <input type="text" name="position" id="position"
                       value="<?php echo e(old('position', $officeManager->position)); ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-6">
                <label for="gradient" class="block text-gray-700 font-semibold mb-2">Gradient (Tailwind classes)</label>
                <input type="text" name="gradient" id="gradient"
                       value="<?php echo e(old('gradient', $officeManager->gradient)); ?>"
                       placeholder="e.g., from-green-500 to-teal-600"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none">
                <span class="text-gray-500 text-sm">Optional: used as fallback background if no image.</span>
                <?php $__errorArgs = ['gradient'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-6">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Profile Image</label>
                <input type="file" name="image" id="image"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                       accept="image/*">

                
                <div class="mt-4">
                    <span class="block text-gray-600 mb-2 font-medium">Current Image / Fallback:</span>
                    <div class="w-32 h-32 rounded-xl overflow-hidden relative">
                        <?php
                            $imagePath = $officeManager->image && file_exists(public_path('storage/' . $officeManager->image))
                                         ? asset('storage/' . $officeManager->image)
                                         : null;

                            $initials = collect(explode(' ', $officeManager->name))
                                        ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                        ->implode('');
                        ?>

                        <?php if($imagePath): ?>
                            <img src="<?php echo e($imagePath); ?>" alt="<?php echo e($officeManager->name); ?>"
                                 class="w-full h-full object-cover rounded-xl">
                        <?php endif; ?>

                        
                        <div class="absolute inset-0 flex items-center justify-center
                                    text-white font-bold text-xl
                                    bg-gradient-to-br <?php echo e($officeManager->gradient ?? 'from-green-500 to-teal-600'); ?>

                                    rounded-xl">
                            <?php echo e($initials); ?>

                        </div>
                    </div>
                </div>

                <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-6">
                <label for="order" class="block text-gray-700 font-semibold mb-2">Order (priority)</label>
                <input type="number" name="order" id="order"
                       value="<?php echo e(old('order', $officeManager->order)); ?>"
                       class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 focus:outline-none"
                       min="1">
                <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm mt-1"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="flex justify-end space-x-4">
                <a href="<?php echo e(route('admin.office-managers.index')); ?>"
                   class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition">
                    Cancel
                </a>
                <button type="submit"
                        class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow transition">
                    Update Manager
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/office-managers/edit.blade.php ENDPATH**/ ?>