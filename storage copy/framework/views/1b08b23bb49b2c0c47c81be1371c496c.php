

<?php $__env->startSection('title', 'Add New Feature - Admin CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
    /* Animate fade-in and slide-in */
    @keyframes fade-in-up { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    @keyframes slide-in-right { from { opacity: 0; transform: translateX(30px); } to { opacity: 1; transform: translateX(0); } }
    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; }
    .animate-slide-in-right { animation: slide-in-right 0.4s ease-out forwards; }

    .form-card { background: #fff; box-shadow: 0 20px 60px rgba(0,0,0,0.08); border-radius: 1rem; padding: 2rem; }
    .form-input { width: 100%; padding: 0.75rem 1rem; border: 2px solid #e5e7eb; border-radius: 1rem; transition: all 0.3s; }
    .form-input:focus { border-color: #3b82f6; box-shadow: 0 0 0 4px rgba(59,130,246,0.1); outline: none; }
    .form-label { font-weight: 600; color: #374151; }
    .color-preview, .icon-preview { width: 40px; height: 40px; border-radius: 0.5rem; display: flex; align-items: center; justify-content: center; transition: all 0.3s ease; }
    .color-preview:hover, .icon-preview:hover { transform: scale(1.1); }
    .color-option { width: 32px; height: 32px; border-radius: 0.5rem; cursor: pointer; border: 2px solid transparent; transition: all 0.2s ease; }
    .color-option.selected { border-color: #1f2937; box-shadow: 0 4px 12px rgba(0,0,0,0.15); transform: scale(1.1); }
    .section-divider { border-bottom: 2px solid #f3f4f6; margin: 2rem 0; position: relative; }
    .section-divider::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 60px; height: 2px; background: linear-gradient(90deg,#3b82f6,#8b5cf6); border-radius:2px; }
    .submit-btn { background: linear-gradient(135deg,#10b981,#059669); color: #fff; transition: all 0.3s; padding: 0.75rem 2rem; border-radius: 1rem; }
    .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(16,185,129,0.3); background: linear-gradient(135deg,#059669,#047857); }
    .cancel-btn { background: #f3f4f6; color: #374151; padding: 0.75rem 1.5rem; border-radius: 1rem; }
    .cancel-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); background: #e5e7eb; }
    .status-badge { padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; }
    .status-active { background: #d1fae5; color: #059669; }
    .status-inactive { background: #fef2f2; color: #b91c1c; }
    .gradient-badge { padding: 0.25rem 0.75rem; border-radius: 9999px; font-size: 0.75rem; font-weight: 600; background: linear-gradient(135deg,#e0f2fe,#bae6fd); color:#0369a1; }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        
        <div class="mb-8 animate-fade-in-up flex justify-between items-start">
            <div>
                <a href="<?php echo e(route('admin.features.index')); ?>" class="inline-flex items-center text-blue-600 hover:text-blue-800 mb-2">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Features
                </a>
                <h1 class="text-3xl font-bold text-gray-900">Add New Feature</h1>
                <p class="text-gray-600 mt-1">Create a new feature to showcase on the CAEDA platform</p>
            </div>
            <span class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full flex items-center">
                <i class="fas fa-info-circle mr-1"></i> All fields are required
            </span>
        </div>

        
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="mb-8 p-5 bg-red-50 border-l-4 border-red-500 rounded-xl animate-fade-in-up">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle text-red-500 text-xl mr-3"></i>
                <div>
                    <h3 class="text-sm font-semibold text-red-800">Please fix the following errors:</h3>
                    <ul class="text-sm text-red-700 mt-2 list-disc list-inside">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2">
                <div class="form-card animate-slide-in-right">
                    <form action="<?php echo e(route('admin.features.store')); ?>" method="POST" id="featureForm">
                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-10">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-blue-100 flex items-center justify-center mr-3"><i class="fas fa-info-circle text-blue-600"></i></div> Basic Information
                            </h2>
                            <div class="space-y-6">
                                <div>
                                    <label for="title" class="form-label">Feature Title *</label>
                                    <input type="text" name="title" id="title" maxlength="50" value="<?php echo e(old('title')); ?>"
                                        class="form-input" placeholder="Enter feature title">
                                    <div class="text-xs text-gray-500 mt-1 flex justify-between"><span>Main heading</span><span id="titleCount">0/50</span></div>
                                </div>
                                <div>
                                    <label for="description" class="form-label">Description *</label>
                                    <textarea name="description" id="description" rows="3" maxlength="200" class="form-input resize-none" placeholder="Describe the feature"><?php echo e(old('description')); ?></textarea>
                                    <div class="text-xs text-gray-500 mt-1 flex justify-between"><span>Brief and compelling</span><span id="descriptionCount">0/200</span></div>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"></div>

                        
                        <div class="mb-10">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-purple-100 flex items-center justify-center mr-3"><i class="fas fa-palette text-purple-600"></i></div> Visual Elements
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="icon" class="form-label">Icon (Font Awesome class)</label>
                                    <input type="text" name="icon" id="icon" value="<?php echo e(old('icon', 'fas fa-star')); ?>" class="form-input" placeholder="fas fa-star">
                                    <div class="mt-4 flex items-center space-x-3">
                                        <div class="icon-preview" id="iconPreview"><i class="<?php echo e(old('icon', 'fas fa-star')); ?>"></i></div>
                                        <span class="text-sm text-gray-600">Icon Preview</span>
                                    </div>
                                </div>
                                <div>
                                    <label for="color" class="form-label">Color Gradient *</label>
                                    <input type="text" name="color" id="color" value="<?php echo e(old('color','from-blue-500 to-cyan-500')); ?>" class="form-input" placeholder="from-blue-500 to-cyan-500">
                                    <div class="mt-4 flex items-center space-x-3">
                                        <div class="color-preview" id="colorPreview" style="background: linear-gradient(135deg,#3b82f6,#06b6d4)"></div>
                                        <span class="text-sm text-gray-600">Color Preview</span>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm font-medium text-gray-700 mb-2">Quick Color Options:</p>
                                        <div class="grid grid-cols-6 gap-2">
                                            <div class="color-option bg-gradient-to-r from-blue-500 to-cyan-500" data-color="from-blue-500 to-cyan-500"></div>
                                            <div class="color-option bg-gradient-to-r from-purple-500 to-pink-500" data-color="from-purple-500 to-pink-500"></div>
                                            <div class="color-option bg-gradient-to-r from-green-500 to-emerald-500" data-color="from-green-500 to-emerald-500"></div>
                                            <div class="color-option bg-gradient-to-r from-yellow-500 to-orange-500" data-color="from-yellow-500 to-orange-500"></div>
                                            <div class="color-option bg-gradient-to-r from-red-500 to-rose-500" data-color="from-red-500 to-rose-500"></div>
                                            <div class="color-option bg-gradient-to-r from-indigo-500 to-blue-500" data-color="from-indigo-500 to-blue-500"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section-divider"></div>

                        
                        <div class="mb-10">
                            <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                <div class="w-8 h-8 rounded-lg bg-green-100 flex items-center justify-center mr-3"><i class="fas fa-cog text-green-600"></i></div> Configuration
                            </h2>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="sort_order" class="form-label">Sort Order *</label>
                                    <input type="number" name="sort_order" id="sort_order" value="<?php echo e(old('sort_order',0)); ?>" min="0" max="999" class="form-input">
                                </div>
                                <div class="space-y-4">
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox" name="is_active" value="1" <?php echo e(old('is_active',1)?'checked':''); ?> class="form-checkbox">
                                        <span class="font-medium text-gray-900">Active</span>
                                    </label>
                                    <label class="flex items-center space-x-3 cursor-pointer">
                                        <input type="checkbox" name="is_popular" value="1" <?php echo e(old('is_popular')?'checked':''); ?> class="form-checkbox">
                                        <span class="font-medium text-gray-900">Popular</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        
                        <div class="flex justify-end space-x-4 pt-6 border-t border-gray-200">
                            <a href="<?php echo e(route('admin.features.index')); ?>" class="cancel-btn">Cancel</a>
                            <button type="submit" class="submit-btn"><i class="fas fa-plus-circle mr-2"></i>Create Feature</button>
                        </div>
                    </form>
                </div>
            </div>

            
            <div class="lg:col-span-1">
                <div class="sticky top-8">
                    <div class="form-card animate-fade-in-up">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center"><i class="fas fa-eye mr-2"></i>Live Preview</h2>
                        <div class="space-y-6">
                            <div class="p-6 rounded-xl border border-gray-200 bg-white flex space-x-4">
                                <div id="previewIcon" class="w-12 h-12 rounded-xl flex items-center justify-center bg-gradient-to-r from-blue-500 to-cyan-500 text-white"><i class="fas fa-star"></i></div>
                                <div>
                                    <h3 id="previewTitle" class="text-lg font-semibold text-gray-900">Feature Title</h3>
                                    <p id="previewDescription" class="text-gray-600 text-sm mt-1">Feature description will appear here...</p>
                                </div>
                            </div>
                            <div class="p-4 bg-gray-50 rounded-lg">
                                <div class="grid grid-cols-2 gap-2 text-xs text-gray-500">
                                    <div>Sort Order: <span id="previewSort">0</span></div>
                                    <div>Status: <span id="previewStatus" class="status-badge status-active">Active</span></div>
                                    <div>Popular: <span id="previewPopular" class="gradient-badge">No</span></div>
                                    <div>Color: <span id="previewColor">Blue</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function(){
    const titleInput = document.getElementById('title');
    const descriptionInput = document.getElementById('description');
    const colorInput = document.getElementById('color');
    const sortInput = document.getElementById('sort_order');
    const iconInput = document.getElementById('icon');
    const isActive = document.querySelector('input[name="is_active"]');
    const isPopular = document.querySelector('input[name="is_popular"]');

    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewIcon = document.getElementById('previewIcon');
    const previewColor = document.getElementById('previewColor');
    const previewSort = document.getElementById('previewSort');
    const previewStatus = document.getElementById('previewStatus');
    const previewPopular = document.getElementById('previewPopular');
    const colorPreview = document.getElementById('colorPreview');

    const titleCount = document.getElementById('titleCount');
    const descriptionCount = document.getElementById('descriptionCount');
    const colorOptions = document.querySelectorAll('.color-option');

    const gradients = {
        "from-blue-500 to-cyan-500":["#3b82f6","#06b6d4"],
        "from-purple-500 to-pink-500":["#8b5cf6","#ec4899"],
        "from-green-500 to-emerald-500":["#10b981","#059669"],
        "from-yellow-500 to-orange-500":["#f59e0b","#f97316"],
        "from-red-500 to-rose-500":["#ef4444","#f43f5e"],
        "from-indigo-500 to-blue-500":["#6366f1","#3b82f6"]
    };

    function parseGradient(val){ return gradients[val]||["#3b82f6","#06b6d4"]; }
    function getColorName(val){ return val.split('-')[1]?.charAt(0).toUpperCase()+val.split('-')[1].slice(1)||'Blue'; }

    function updatePreview(){
        previewTitle.textContent = titleInput.value || 'Feature Title';
        previewDescription.textContent = descriptionInput.value || 'Feature description will appear here...';
        const [from,to] = parseGradient(colorInput.value);
        previewIcon.style.background = colorPreview.style.background = `linear-gradient(135deg, ${from}, ${to})`;
        previewColor.textContent = getColorName(colorInput.value);
        previewSort.textContent = sortInput.value||'0';
        previewStatus.textContent = isActive.checked?'Active':'Inactive';
        previewStatus.className = 'status-badge '+(isActive.checked?'status-active':'status-inactive');
        previewPopular.textContent = isPopular.checked?'Yes':'No';
        previewPopular.className = isPopular.checked?'gradient-badge text-xs':'text-xs text-gray-600';
        previewIcon.innerHTML = `<i class="${iconInput.value||'fas fa-star'}"></i>`;
    }

    function updateCounts(){
        titleCount.textContent = `${titleInput.value.length}/50`;
        descriptionCount.textContent = `${descriptionInput.value.length}/200`;
        titleCount.classList.toggle('text-red-600', titleInput.value.length>50);
        descriptionCount.classList.toggle('text-red-600', descriptionInput.value.length>200);
    }

    titleInput.addEventListener('input', ()=>{ updatePreview(); updateCounts(); });
    descriptionInput.addEventListener('input', ()=>{ updatePreview(); updateCounts(); });
    colorInput.addEventListener('input', updatePreview);
    sortInput.addEventListener('input', updatePreview);
    iconInput.addEventListener('input', updatePreview);
    isActive.addEventListener('change', updatePreview);
    isPopular.addEventListener('change', updatePreview);

    colorOptions.forEach(option=>{
        option.addEventListener('click', ()=>{
            colorOptions.forEach(c=>c.classList.remove('selected'));
            option.classList.add('selected');
            colorInput.value = option.dataset.color;
            updatePreview();
        });
    });

    updatePreview();
    updateCounts();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/features/create.blade.php ENDPATH**/ ?>