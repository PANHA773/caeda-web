

<?php $__env->startSection('content'); ?>
<div class="p-6 max-w-5xl mx-auto">

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Add Featured Menu</h1>
        <p class="text-gray-500">Create a new featured drink for homepage</p>
    </div>

    <!-- Form -->
    <form action="<?php echo e(route('admin.featured_menus.store')); ?>"
          method="POST"
          enctype="multipart/form-data"
          class="bg-white rounded-xl shadow p-6 space-y-6">
        <?php echo csrf_field(); ?>

        <!-- Title -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Menu Title <span class="text-red-500">*</span>
            </label>
            <input type="text" name="title" value="<?php echo e(old('title')); ?>"
                   class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                   placeholder="Double Shot Espresso" required>
        </div>

        <!-- Description -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Description
            </label>
            <textarea name="description" rows="3"
                      class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                      placeholder="Short description of the drink"><?php echo e(old('description')); ?></textarea>
        </div>

        <!-- Prices -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Price ($) <span class="text-red-500">*</span>
                </label>
                <input type="number" step="0.01" name="price" value="<?php echo e(old('price')); ?>"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Old Price ($)
                </label>
                <input type="number" step="0.01" name="old_price" value="<?php echo e(old('old_price')); ?>"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500"
                       placeholder="Optional">
            </div>
        </div>

        <!-- Badge & Rating -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Badge
                </label>
                <select name="badge"
                        class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
                    <option value="">None</option>
                    <option value="bestseller">Bestseller</option>
                    <option value="student_pick">Student Pick</option>
                    <option value="trending">Trending</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Rating (0–5)
                </label>
                <input type="number" step="0.1" max="5" min="0" name="rating"
                       value="<?php echo e(old('rating', 5)); ?>"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>
        </div>

        <!-- Reviews & Order -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Reviews Count
                </label>
                <input type="number" name="reviews" value="<?php echo e(old('reviews', 0)); ?>"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Display Order
                </label>
                <input type="number" name="order" value="<?php echo e(old('order', 0)); ?>"
                       class="w-full rounded-lg border-gray-300 focus:ring-amber-500 focus:border-amber-500">
            </div>
        </div>

        <!-- Image Upload -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Image <span class="text-red-500">*</span>
            </label>

            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center">
                <input type="file" name="image" id="imageInput"
                       class="hidden" accept="image/*" required>

                <label for="imageInput" class="cursor-pointer">
                    <div class="text-gray-500">
                        <i class="fas fa-cloud-upload-alt text-3xl mb-2"></i>
                        <p class="font-semibold">Click to upload image</p>
                        <p class="text-sm">PNG, JPG (max 2MB)</p>
                    </div>
                </label>

                <img id="previewImage"
                     class="hidden mt-4 mx-auto w-48 h-32 object-cover rounded-lg shadow">
            </div>
        </div>

        <!-- Status -->
        <div class="flex items-center gap-3">
            <input type="checkbox" name="is_active" value="1" checked
                   class="rounded border-gray-300 text-amber-600 focus:ring-amber-500">
            <span class="text-sm font-semibold text-gray-700">
                Active (Show on website)
            </span>
        </div>

        <!-- Buttons -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="<?php echo e(route('admin.featured_menus.index')); ?>"
               class="px-6 py-2 rounded-lg bg-gray-200 hover:bg-gray-300 font-semibold">
                Cancel
            </a>

            <button type="submit"
                    class="px-6 py-2 rounded-lg bg-amber-600 hover:bg-amber-700 text-white font-semibold shadow">
                Save Menu
            </button>
        </div>

    </form>
</div>

<!-- Image Preview Script -->
<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('previewImage');

    input.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/featured_menus/create.blade.php ENDPATH**/ ?>