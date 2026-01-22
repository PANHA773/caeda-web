

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-4xl mx-auto">

    
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Testimonial
        </h1>

        <a href="<?php echo e(route('admin.testimonials.index')); ?>"
           class="text-gray-600 hover:text-gray-900">
            ← Back
        </a>
    </div>

    
    <div class="bg-white rounded-xl shadow p-6">
        <form action="<?php echo e(route('admin.testimonials.update', $testimonial->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Name
                    </label>
                    <input
                        type="text"
                        name="name"
                        value="<?php echo e(old('name', $testimonial->name)); ?>"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                        required
                    >
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-sm mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Role / Position
                    </label>
                    <input
                        type="text"
                        name="role"
                        value="<?php echo e(old('role', $testimonial->role)); ?>"
                        class="w-full rounded-lg border-gray-300"
                        required
                    >
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Company
                    </label>
                    <input
                        type="text"
                        name="company"
                        value="<?php echo e(old('company', $testimonial->company)); ?>"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Avatar URL
                    </label>
                    <input
                        type="url"
                        name="avatar"
                        value="<?php echo e(old('avatar', $testimonial->avatar)); ?>"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Workshop Name
                    </label>
                    <input
                        type="text"
                        name="workshop"
                        value="<?php echo e(old('workshop', $testimonial->workshop)); ?>"
                        class="w-full rounded-lg border-gray-300"
                    >
                </div>

                
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Testimonial Quote
                    </label>
                    <textarea
                        name="quote"
                        rows="4"
                        class="w-full rounded-lg border-gray-300 focus:ring focus:ring-blue-200"
                        required
                    ><?php echo e(old('quote', $testimonial->quote)); ?></textarea>
                </div>

                
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Rating
                    </label>
                    <select name="rating" class="w-full rounded-lg border-gray-300">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 5; $i >= 1; $i--): ?>
                            <option value="<?php echo e($i); ?>"
                                <?php echo e(old('rating', $testimonial->rating) == $i ? 'selected' : ''); ?>>
                                <?php echo e($i); ?> Stars
                            </option>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </select>
                </div>

                
                <div class="flex items-center gap-3 mt-6">
                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        class="w-5 h-5 text-blue-600"
                        <?php echo e(old('status', $testimonial->status) ? 'checked' : ''); ?>

                    >
                    <span class="text-gray-700 font-medium">
                        Active
                    </span>
                </div>

            </div>

            
            <div class="flex justify-end gap-4 mt-8">
                <a href="<?php echo e(route('admin.testimonials.index')); ?>"
                   class="px-5 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200">
                    Cancel
                </a>

                <button
                    type="submit"
                    class="px-6 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow">
                    Update Testimonial
                </button>
            </div>
        </form>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/testimonials/edit.blade.php ENDPATH**/ ?>