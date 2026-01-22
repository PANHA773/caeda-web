

<?php $__env->startSection('title', $post->title ?? 'News'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto py-12 px-4">
    <div class="bg-white rounded-2xl p-8 shadow">
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900"><?php echo e($post->title); ?></h1>
            <div class="text-sm text-gray-500 mt-2">Published <?php echo e(optional($post->published_at)->format('M d, Y')); ?></div>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($post->image): ?>
            <div class="mb-6">
                <img src="<?php echo e($post->image); ?>" alt="<?php echo e($post->title); ?>" class="w-full h-64 object-cover rounded-lg">
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="prose max-w-none text-gray-800 mb-6">
            <?php echo $post->content; ?>

        </div>

        <div class="flex items-center gap-3 mb-6">
            <button id="likeBtn" class="px-4 py-2 bg-indigo-600 text-white rounded">Like (<span id="likesCount"><?php echo e($post->likes); ?></span>)</button>
            <button onclick="document.getElementById('commentForm').scrollIntoView({behavior:'smooth'})" class="px-4 py-2 bg-gray-100 rounded">Comment (<?php echo e($post->comments); ?>)</button>
        </div>

        
        <div class="space-y-4">
            <h3 class="text-lg font-semibold">Comments</h3>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $post->commentsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="p-4 bg-gray-50 rounded">
                    <div class="text-sm text-gray-700 font-semibold"><?php echo e($c->name ?? 'Anonymous'); ?></div>
                    <div class="text-xs text-gray-500"><?php echo e(optional($c->created_at)->diffForHumans()); ?></div>
                    <div class="mt-2 text-gray-800"><?php echo e($c->body); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="text-sm text-gray-500">No comments yet.</p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>

        
        <div id="commentForm" class="mt-8">
            <form method="POST" action="<?php echo e(route('news.comments.store', $post->id)); ?>">
                <?php echo csrf_field(); ?>
                <div class="grid grid-cols-1 gap-3">
                    <input type="text" name="name" placeholder="Your name" class="px-3 py-2 border rounded">
                    <textarea name="body" rows="4" placeholder="Write your comment..." class="px-3 py-2 border rounded"></textarea>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded">Submit Comment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('likeBtn')?.addEventListener('click', function(){
    fetch("<?php echo e(route('news.like', $post->id)); ?>", { method: 'POST', headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' } })
        .then(r => r.json()).then(data => {
            document.getElementById('likesCount').textContent = data.likes;
        });
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/news/show.blade.php ENDPATH**/ ?>