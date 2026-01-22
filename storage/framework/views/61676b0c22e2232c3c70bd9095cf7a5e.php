

<?php $__env->startSection('title', 'Edit News Article'); ?>
<?php $__env->startSection('page-title', 'Edit Article'); ?>
<?php $__env->startSection('page-description', 'Update the details of your news article.'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-4xl mx-auto p-4 md:p-6">
        <div class="mb-6 flex items-center justify-between">
            <a href="<?php echo e(route('admin.news.index')); ?>"
                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-indigo-600 transition-colors">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Articles
            </a>
            <div class="flex items-center space-x-2 text-xs text-gray-400">
                <span>Last updated: <?php echo e($news->updated_at->diffForHumans()); ?></span>
            </div>
        </div>

        <?php if($errors->any()): ?>
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-r-xl animate-fadeIn">
                <div class="flex items-center mb-2">
                    <i class="fas fa-exclamation-circle mr-3"></i>
                    <p class="font-bold">Please fix the following errors:</p>
                </div>
                <ul class="list-disc pl-10 text-sm">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="<?php echo e(route('admin.news.update', $news->id)); ?>" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
                        <h3 class="text-lg font-bold text-gray-900 border-b border-gray-50 pb-4">Article Content</h3>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Title <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" value="<?php echo e(old('title', $news->title)); ?>"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                                placeholder="Enter a catchy title...">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Excerpt</label>
                            <textarea name="excerpt" rows="3"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                                placeholder="Short summary for previews..."><?php echo e(old('excerpt', $news->excerpt)); ?></textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Main Content <span
                                    class="text-red-500">*</span></label>
                            <textarea name="content" rows="12"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400 font-mono text-sm"
                                placeholder="Write your article content here..."><?php echo e(old('content', $news->content)); ?></textarea>
                        </div>
                    </div>
                </div>

                
                <div class="space-y-6">
                    
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
                        <h3 class="text-lg font-bold text-gray-900 border-b border-gray-50 pb-4">Media</h3>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-3">Cover Image</label>
                            <div class="relative group">
                                <div id="image-preview-container"
                                    class="aspect-video w-full rounded-xl bg-gray-50 border-2 border-dashed border-gray-200 flex flex-col items-center justify-center overflow-hidden transition-all group-hover:border-indigo-300">
                                    <?php if($news->image): ?>
                                        <img id="image-preview" src="<?php echo e($news->image); ?>" alt="Preview"
                                            class="absolute inset-0 w-full h-full object-cover">
                                    <?php else: ?>
                                        <i
                                            class="fas fa-cloud-upload-alt text-3xl text-gray-300 mb-2 group-hover:text-indigo-400 transition-colors"></i>
                                        <p class="text-xs text-gray-500 group-hover:text-indigo-500">Click to upload image</p>
                                        <img id="image-preview" src="#" alt="Preview"
                                            class="hidden absolute inset-0 w-full h-full object-cover">
                                    <?php endif; ?>
                                </div>
                                <input type="file" name="image" id="image-input" accept="image/*"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                            </div>
                            <p class="text-[10px] text-gray-400 mt-2">Recommended size: 1200x675px (16:9). Max 2MB.</p>
                        </div>
                    </div>

                    
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4">
                        <h3 class="text-lg font-bold text-gray-900 border-b border-gray-50 pb-4">Publishing</h3>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Slug (URL)</label>
                            <input type="text" name="slug" value="<?php echo e(old('slug', $news->slug)); ?>"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                                placeholder="article-url-slug">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Tags</label>
                            <input type="text" name="tags"
                                value="<?php echo e(old('tags', is_array($news->tags) ? implode(', ', $news->tags) : $news->tags)); ?>"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all placeholder:text-gray-400"
                                placeholder="tag1, tag2, tag3">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Publish Date</label>
                            <input type="date" name="published_at"
                                value="<?php echo e(old('published_at', optional($news->published_at)->format('Y-m-d'))); ?>"
                                class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition-all">
                        </div>
                    </div>

                    
                    <div class="flex flex-col space-y-3">
                        <button type="submit"
                            class="btn-gradient w-full py-4 rounded-xl text-white font-bold shadow-lg shadow-indigo-100 hover:scale-[1.02] active:scale-[0.98] transition-all">
                            Update Article
                        </button>
                        <a href="<?php echo e(route('admin.news.index')); ?>"
                            class="w-full py-3 text-center text-sm font-bold text-gray-500 hover:text-gray-700 transition-colors">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script>
        const imageInput = document.getElementById('image-input');
        const imagePreview = document.getElementById('image-preview');
        const previewContainer = document.getElementById('image-preview-container');

        imageInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    if (imagePreview) {
                        imagePreview.src = e.target.result;
                        imagePreview.classList.remove('hidden');
                    }

                    // Hide placeholders if any
                    const icon = previewContainer.querySelector('i');
                    const p = previewContainer.querySelector('p');
                    if (icon) icon.classList.add('hidden');
                    if (p) p.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/news/edit.blade.php ENDPATH**/ ?>