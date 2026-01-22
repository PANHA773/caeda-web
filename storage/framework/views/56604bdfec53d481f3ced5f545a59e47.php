

<?php $__env->startSection('title', 'Edit Footer'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6 bg-gray-50 min-h-screen">

    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-4">
        <h1 class="text-2xl font-bold text-gray-800">Edit Footer</h1>
        <a href="<?php echo e(route('admin.footer.index')); ?>"
           class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition">
            Back to Footer Settings
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    
    <div class="bg-white shadow rounded-lg p-6">
        <form action="<?php echo e(route('admin.footer.update', $footer->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Logo</label>
                <input type="text" name="logo" value="<?php echo e(old('logo', $footer->logo)); ?>"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                <?php $__errorArgs = ['logo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Tagline</label>
                <input type="text" name="tagline" value="<?php echo e(old('tagline', $footer->tagline)); ?>"
                       class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300">
                <?php $__errorArgs = ['tagline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><?php echo e(old('description', $footer->description)); ?></textarea>
                <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Social Links (JSON format)</label>
                <textarea name="social_links" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><?php echo e(old('social_links', json_encode($footer->social_links, JSON_PRETTY_PRINT))); ?></textarea>
                <p class="text-gray-500 text-sm mt-1">Example: {"facebook":"https://fb.com","twitter":"https://twitter.com"}</p>
                <?php $__errorArgs = ['social_links'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Quick Links (JSON format)</label>
                <textarea name="quick_links" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><?php echo e(old('quick_links', json_encode($footer->quick_links, JSON_PRETTY_PRINT))); ?></textarea>
                <p class="text-gray-500 text-sm mt-1">Example: [{"name":"Home","route":"home"},{"name":"Courses","route":"courses"}]</p>
                <?php $__errorArgs = ['quick_links'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Contact Info (JSON format)</label>
                <textarea name="contact_info" rows="3"
                          class="w-full border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-300"><?php echo e(old('contact_info', json_encode($footer->contact_info, JSON_PRETTY_PRINT))); ?></textarea>
                <p class="text-gray-500 text-sm mt-1">Example: {"address":"123 Street","phone":"(01) 800 433 633","email":"info@example.com"}</p>
                <?php $__errorArgs = ['contact_info'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            
            <div class="mt-6">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                    Update Footer
                </button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/footer/edit.blade.php ENDPATH**/ ?>