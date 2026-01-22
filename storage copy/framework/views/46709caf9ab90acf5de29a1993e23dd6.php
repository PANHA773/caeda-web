

<?php $__env->startSection('title', 'Workshops Management'); ?>

<?php $__env->startSection('content'); ?>

<div class="max-w-7xl mx-auto px-6 py-8">

    
        <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Goods</h1>

        <a href="<?php echo e(route('admin.workshops.create')); ?>"
           class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add Good
        </a>
    </div>

    
    <div class="flex flex-wrap gap-3 mb-8">
        <?php
            $categories = $workshops->pluck('category')->unique();
        ?>

        <button class="category-filter category-btn-active" data-category="all">
            All
        </button>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <button class="category-filter" data-category="<?php echo e($category); ?>">
                <?php echo e(ucfirst($category)); ?>

            </button>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>

    
    <section id="workshops-grid">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="workshop-card bg-white rounded-xl shadow" data-category="<?php echo e($workshop->category); ?>">

                    
                    <div class="relative">
                        
                        <?php
                            $img = $workshop->image ?? null;
                            $imgPath = $img ? public_path('storage/' . $img) : null;
                            $hasImg = $imgPath && file_exists($imgPath);
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasImg): ?>
                            <img id="thumb-<?php echo e($workshop->id); ?>"
                                 src="<?php echo e(asset('storage/'.$workshop->image)); ?>"
                                 class="w-full h-44 object-cover rounded-t-xl">
                        <?php else: ?>
                            <div id="thumb-<?php echo e($workshop->id); ?>" class="w-full h-44 bg-gray-100 rounded-t-xl flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h14v6a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-6z"></path>
                                </svg>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($workshop->video_url): ?>
                        <div id="video-<?php echo e($workshop->id); ?>" class="hidden">
                            <iframe class="w-full h-44 rounded-t-xl"
                                    data-src="<?php echo e($workshop->video_url); ?>"
                                    frameborder="0"
                                    allowfullscreen></iframe>
                        </div>

                        
                        <button onclick="playWorkshop(<?php echo e($workshop->id); ?>)"
                                class="absolute inset-0 flex items-center justify-center
                                       bg-black/40 text-white text-3xl hover:bg-black/60">
                            ▶
                        </button>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    
                    <div class="p-4 space-y-2">
                        <h3 class="font-semibold text-lg text-gray-800"><?php echo e($workshop->title); ?></h3>
                        <p class="text-sm text-gray-500">Instructor: <?php echo e($workshop->instructor); ?></p>

                        <div class="flex justify-between items-center">
                            <span class="level-badge px-3 py-1 text-xs rounded-full bg-gray-100 text-gray-700">
                                <?php echo e(ucfirst($workshop->level)); ?>

                            </span>

                            <span class="text-xs px-2 py-1 rounded
                                <?php echo e($workshop->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'); ?>">
                                <?php echo e($workshop->status ? 'Active' : 'Inactive'); ?>

                            </span>
                        </div>
                    </div>

                    
                    <div class="flex justify-between px-4 py-3 border-t bg-gray-50">
                        <a href="<?php echo e(route('admin.workshops.edit', $workshop->id)); ?>"
                           class="text-blue-600 hover:underline text-sm">
                            Edit
                        </a>

                        <form method="POST"
                              action="<?php echo e(route('admin.workshops.destroy', $workshop->id)); ?>"
                              onsubmit="return confirm('Delete this workshop?')">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit"
                                    class="text-red-600 hover:underline text-sm">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-gray-500">No workshops found.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

        
        <div id="no-workshops" class="hidden text-center text-gray-500 mt-10">
            No workshops in this category.
        </div>
    </section>

</div>


<script>
function playWorkshop(id) {
    const videoDiv = document.getElementById('video-' + id);
    const thumbImg = document.getElementById('thumb-' + id);
    const iframe = videoDiv.querySelector('iframe');

    // Hide thumbnail and show video
    thumbImg.classList.add('hidden');
    videoDiv.classList.remove('hidden');

    // Load video if not loaded
    if (!iframe.src) {
        iframe.src = iframe.dataset.src;
    }

    // Pause other videos
    document.querySelectorAll('[id^="video-"]').forEach(v => {
        if (v.id !== 'video-' + id) {
            v.classList.add('hidden');
            const f = v.querySelector('iframe');
            if (f) f.src = '';
        }
    });
    document.querySelectorAll('[id^="thumb-"]').forEach(t => {
        if (t.id !== 'thumb-' + id) {
            t.classList.remove('hidden');
        }
    });
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/workshops/index.blade.php ENDPATH**/ ?>