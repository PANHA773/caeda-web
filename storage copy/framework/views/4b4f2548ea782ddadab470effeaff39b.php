

<?php $__env->startSection('title', 'Edit Leader Team'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <!-- Header with Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo e(route('admin.leader-teams.index')); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Team Members
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Edit Member</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Edit Team Member</h1>
            <p class="text-gray-600 mt-2">Update details for <?php echo e($leaderTeam->name); ?></p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="<?php echo e(route('admin.leader-teams.index')); ?>" 
               class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Team
            </a>
        </div>
    </div>

    <!-- Main Form Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Column -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-yellow-50">
                    <h2 class="text-xl font-semibold text-gray-800">Edit Member Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Update the details for this team member</p>
                </div>
                
                <div class="p-6">
                    <form action="<?php echo e(route('admin.leader-teams.update', $leaderTeam->id)); ?>" 
                          method="POST" 
                          enctype="multipart/form-data" 
                          id="teamMemberForm">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('PUT'); ?>

                        <div class="space-y-6">
                            <!-- Name Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="name"
                                           value="<?php echo e(old('name', $leaderTeam->name)); ?>"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Enter full name"
                                           required>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Position Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Position
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="position"
                                           value="<?php echo e(old('position', $leaderTeam->position)); ?>"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="e.g., CEO, Marketing Director">
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['position'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Current Image -->
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->image): ?>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Current Image
                                </label>
                                <div class="flex items-center space-x-4">
                                    <div class="relative">
                                        <img src="<?php echo e(asset('storage/'.$leaderTeam->image)); ?>" 
                                             class="h-24 w-24 rounded-xl object-cover border-2 border-gray-200 shadow-sm">
                                        <div class="absolute inset-0 bg-black bg-opacity-20 rounded-xl flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                            <span class="text-white text-xs font-medium">Current</span>
                                        </div>
                                    </div>
                                    <div class="text-sm text-gray-600">
                                        <p>Current profile image</p>
                                        <p class="text-xs text-gray-500 mt-1">Upload a new image below to replace</p>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <!-- Image Upload Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    <?php echo e($leaderTeam->image ? 'Change Image' : 'Upload Image'); ?>

                                </label>
                                <div class="mt-1 flex items-center space-x-4">
                                    <!-- Image Preview -->
                                    <div id="imagePreview" class="hidden">
                                        <div class="relative">
                                            <img id="previewImage" class="h-24 w-24 rounded-xl object-cover border-2 border-gray-200">
                                            <button type="button" onclick="removeImage()" class="absolute -top-2 -right-2 h-6 w-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <!-- Upload Area -->
                                    <div id="uploadArea" class="flex-1">
                                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 transition-colors cursor-pointer" onclick="document.getElementById('imageInput').click()">
                                            <input type="file" 
                                                   name="image"
                                                   id="imageInput"
                                                   class="hidden"
                                                   accept="image/*"
                                                   onchange="previewFile()">
                                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="mt-2 text-sm text-gray-600">Click to <?php echo e($leaderTeam->image ? 'change' : 'upload'); ?> image</p>
                                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                        </div>
                                    </div>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Two Column Grid for Gradient and Order -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Gradient Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Gradient Color
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               name="gradient"
                                               value="<?php echo e(old('gradient', $leaderTeam->gradient)); ?>"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['gradient'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="from-blue-500 to-purple-500">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Tailwind CSS gradient classes</p>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['gradient'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>

                                <!-- Order Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Display Order
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"/>
                                            </svg>
                                        </div>
                                        <input type="number" 
                                               name="order"
                                               value="<?php echo e(old('order', $leaderTeam->order ?? 0)); ?>"
                                               min="0"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="0">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Lower numbers appear first</p>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['order'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            </div>

                            <!-- Status Toggle -->
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl border border-gray-200">
                                <div>
                                    <h3 class="text-sm font-medium text-gray-900">Member Status</h3>
                                    <p class="text-sm text-gray-500">Set the active status of this member</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_active" 
                                           value="1"
                                           class="sr-only peer"
                                           <?php echo e(old('is_active', $leaderTeam->is_active) ? 'checked' : ''); ?>>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        <span id="statusText"><?php echo e($leaderTeam->is_active ? 'Active' : 'Inactive'); ?></span>
                                    </span>
                                </label>
                            </div>

                            <!-- Form Actions -->
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between pt-6 border-t border-gray-200">
                                <div class="mb-4 sm:mb-0">
                                    <p class="text-sm text-gray-600">
                                        Fields marked with <span class="text-red-500">*</span> are required
                                    </p>
                                </div>
                                <div class="flex space-x-3">
                                    <a href="<?php echo e(route('admin.leader-teams.index')); ?>" 
                                       class="inline-flex items-center px-5 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-yellow-500 to-amber-500 text-white font-medium rounded-lg hover:from-yellow-600 hover:to-amber-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition-all shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                        Update Member
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Column -->
        <div class="space-y-6">
            <!-- Current State Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Current State</h2>
                    <p class="text-sm text-gray-600 mt-1">How this member currently appears</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <div class="mb-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->image): ?>
                                <img src="<?php echo e(asset('storage/'.$leaderTeam->image)); ?>" 
                                     class="h-24 w-24 mx-auto rounded-xl object-cover border-2 border-gray-200 shadow-sm">
                            <?php else: ?>
                                <div class="h-24 w-24 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center">
                                    <span class="text-blue-600 font-bold text-3xl"><?php echo e(strtoupper(substr($leaderTeam->name, 0, 1))); ?></span>
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-1"><?php echo e($leaderTeam->name); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo e($leaderTeam->position ?? 'Position'); ?></p>
                        
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium <?php echo e($leaderTeam->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'); ?> mb-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->is_active): ?>
                                <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3"/>
                                </svg>
                                Active
                            <?php else: ?>
                                <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                                    <circle cx="4" cy="4" r="3"/>
                                </svg>
                                Inactive
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Current Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium"><?php echo e($leaderTeam->order ?? '0'); ?></div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium"><?php echo e($leaderTeam->is_active ? 'Active' : 'Inactive'); ?></div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->gradient): ?>
                                    <div class="text-gray-700">Gradient:</div>
                                    <div class="font-medium truncate"><?php echo e($leaderTeam->gradient); ?></div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Live Preview Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Live Preview</h2>
                    <p class="text-sm text-gray-600 mt-1">How changes will appear</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <div class="mb-4">
                            <div id="previewAvatar" class="h-24 w-24 mx-auto rounded-xl flex items-center justify-center text-3xl font-bold">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->image): ?>
                                    <img id="previewCurrentImage" src="<?php echo e(asset('storage/'.$leaderTeam->image)); ?>" class="h-24 w-24 rounded-xl object-cover">
                                <?php else: ?>
                                    <span id="avatarInitials"><?php echo e(strtoupper(substr($leaderTeam->name, 0, 1))); ?></span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <h3 id="previewName" class="text-xl font-bold text-gray-900 mb-1"><?php echo e($leaderTeam->name); ?></h3>
                        <p id="previewPosition" class="text-gray-600 mb-4"><?php echo e($leaderTeam->position ?? 'Position'); ?></p>
                        
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium mb-4" id="previewStatus">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leaderTeam->is_active): ?>
                                <div class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                                    <svg class="mr-1.5 h-2 w-2 text-green-500 inline" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"/>
                                    </svg>
                                    Active
                                </div>
                            <?php else: ?>
                                <div class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm font-medium">
                                    <svg class="mr-1.5 h-2 w-2 text-red-500 inline" fill="currentColor" viewBox="0 0 8 8">
                                        <circle cx="4" cy="4" r="3"/>
                                    </svg>
                                    Inactive
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Updated Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium" id="previewOrder"><?php echo e($leaderTeam->order ?? '0'); ?></div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium" id="previewStatusText"><?php echo e($leaderTeam->is_active ? 'Active' : 'Inactive'); ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="bg-white rounded-2xl shadow-lg border border-red-200 border-t-4 border-t-red-500">
                <div class="px-6 py-4 border-b border-red-100 bg-red-50">
                    <h2 class="text-xl font-semibold text-red-800">Danger Zone</h2>
                </div>
                <div class="p-6">
                    <p class="text-sm text-red-600 mb-4">Permanently delete this team member.</p>
                    <form action="<?php echo e(route('admin.leader-teams.destroy', $leaderTeam->id)); ?>" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this team member? This action cannot be undone.');">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" 
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-lg text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Delete Member
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Smooth transitions */
    input, select, textarea {
        transition: all 0.2s ease-in-out;
    }
    
    /* Custom file upload hover */
    #uploadArea:hover {
        border-color: #3b82f6;
        background-color: #f8fafc;
    }
    
    /* Status toggle animation */
    input:checked ~ .peer-checked\:bg-blue-600 {
        background-color: #2563eb;
    }
    
    /* Preview animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    #previewAvatar, #previewName, #previewPosition {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Yellow accent for edit */
    .bg-yellow-50 {
        background-color: #fffbeb;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get form elements for live preview
    const nameInput = document.querySelector('input[name="name"]');
    const positionInput = document.querySelector('input[name="position"]');
    const orderInput = document.querySelector('input[name="order"]');
    const gradientInput = document.querySelector('input[name="gradient"]');
    const statusToggle = document.querySelector('input[name="is_active"]');
    const statusText = document.getElementById('statusText');
    const previewStatusText = document.getElementById('previewStatusText');
    const previewStatus = document.getElementById('previewStatus');
    
    // Preview elements
    const previewName = document.getElementById('previewName');
    const previewPosition = document.getElementById('previewPosition');
    const previewAvatar = document.getElementById('previewAvatar');
    const previewCurrentImage = document.getElementById('previewCurrentImage');
    const avatarInitials = document.getElementById('avatarInitials');
    const previewOrder = document.getElementById('previewOrder');
    
    // Check if there's an existing image
    const hasExistingImage = <?php echo e($leaderTeam->image ? 'true' : 'false'); ?>;
    const existingImageUrl = '<?php echo e($leaderTeam->image ? asset("storage/".$leaderTeam->image) : ""); ?>';
    
    // Live preview updates
    function updatePreview() {
        // Name preview
        if (nameInput.value.trim()) {
            previewName.textContent = nameInput.value;
            
            // Update avatar initials if no image is shown
            if (!hasExistingImage && !document.getElementById('imageInput').files.length) {
                const nameParts = nameInput.value.trim().split(' ');
                let initials = '';
                if (nameParts.length >= 2) {
                    initials = (nameParts[0][0] + nameParts[nameParts.length - 1][0]).toUpperCase();
                } else if (nameInput.value.trim().length >= 2) {
                    initials = nameInput.value.trim().substring(0, 2).toUpperCase();
                } else {
                    initials = nameInput.value.trim().toUpperCase() || 'TM';
                }
                if (avatarInitials) avatarInitials.textContent = initials;
            }
        } else {
            previewName.textContent = 'Team Member';
            if (avatarInitials) avatarInitials.textContent = 'TM';
        }
        
        // Position preview
        previewPosition.textContent = positionInput.value || 'Position';
        
        // Order preview
        previewOrder.textContent = orderInput.value || '0';
        
        // Gradient preview - only apply if no image
        const fileInput = document.getElementById('imageInput');
        if (gradientInput.value.trim() && (!hasExistingImage || fileInput.files.length > 0)) {
            previewAvatar.style.background = gradientInput.value.trim();
            previewAvatar.className = 'h-24 w-24 mx-auto rounded-xl flex items-center justify-center text-3xl font-bold text-white';
            if (previewCurrentImage) previewCurrentImage.classList.add('hidden');
            if (avatarInitials) {
                avatarInitials.classList.remove('hidden');
                avatarInitials.style.color = 'white';
            }
        } else {
            previewAvatar.style.background = '';
            previewAvatar.className = 'h-24 w-24 mx-auto rounded-xl flex items-center justify-center';
            if (previewCurrentImage && hasExistingImage && !fileInput.files.length) {
                previewCurrentImage.classList.remove('hidden');
                if (avatarInitials) avatarInitials.classList.add('hidden');
            } else {
                previewAvatar.className = 'h-24 w-24 mx-auto bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl font-bold text-blue-600';
                if (avatarInitials) {
                    avatarInitials.classList.remove('hidden');
                    avatarInitials.style.color = '';
                }
            }
        }
        
        // Status preview
        const isActive = statusToggle.checked;
        statusText.textContent = isActive ? 'Active' : 'Inactive';
        previewStatusText.textContent = isActive ? 'Active' : 'Inactive';
        
        if (isActive) {
            previewStatus.innerHTML = `
                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                    <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3"/>
                    </svg>
                    Active
                </div>
            `;
        } else {
            previewStatus.innerHTML = `
                <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                    <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                        <circle cx="4" cy="4" r="3"/>
                    </svg>
                    Inactive
                </div>
            `;
        }
    }
    
    // Add event listeners for live preview
    nameInput.addEventListener('input', updatePreview);
    positionInput.addEventListener('input', updatePreview);
    orderInput.addEventListener('input', updatePreview);
    gradientInput.addEventListener('input', updatePreview);
    statusToggle.addEventListener('change', updatePreview);
    
    // Initialize preview
    updatePreview();
    
    // Form validation
    const form = document.getElementById('teamMemberForm');
    form.addEventListener('submit', function(e) {
        const nameValue = nameInput.value.trim();
        if (!nameValue) {
            e.preventDefault();
            nameInput.focus();
            nameInput.classList.add('border-red-500');
            return false;
        }
        return true;
    });
});

// Image preview functionality
function previewFile() {
    const fileInput = document.getElementById('imageInput');
    const preview = document.getElementById('previewImage');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const previewCurrentImage = document.getElementById('previewCurrentImage');
    const avatarInitials = document.getElementById('avatarInitials');
    
    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
            // Update the main preview
            if (previewCurrentImage) {
                previewCurrentImage.src = e.target.result;
                previewCurrentImage.classList.remove('hidden');
            }
            
            // Show remove button for new image
            if (imagePreview) {
                if (preview) preview.src = e.target.result;
                imagePreview.classList.remove('hidden');
            }
            
            uploadArea.classList.add('hidden');
            
            // Update the live preview
            document.querySelector('input[name="name"]').dispatchEvent(new Event('input'));
        }
        
        reader.readAsDataURL(fileInput.files[0]);
    }
}

function removeImage() {
    const fileInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadArea = document.getElementById('uploadArea');
    const previewCurrentImage = document.getElementById('previewCurrentImage');
    
    fileInput.value = '';
    if (imagePreview) imagePreview.classList.add('hidden');
    uploadArea.classList.remove('hidden');
    
    // Restore original image if it exists
    if (previewCurrentImage && '<?php echo e($leaderTeam->image); ?>') {
        previewCurrentImage.src = '<?php echo e(asset("storage/".$leaderTeam->image)); ?>';
        previewCurrentImage.classList.remove('hidden');
    }
    
    // Update preview
    document.querySelector('input[name="name"]').dispatchEvent(new Event('input'));
}

// Character counter for name
const nameInput = document.querySelector('input[name="name"]');
nameInput.addEventListener('input', function() {
    const maxLength = 255;
    const currentLength = this.value.length;
    
    // Remove any existing counter
    const existingCounter = this.parentElement.querySelector('.char-counter');
    if (existingCounter) {
        existingCounter.remove();
    }
    
    // Add counter if length > 0
    if (currentLength > 0) {
        const counter = document.createElement('div');
        counter.className = 'char-counter text-xs mt-1 text-gray-500';
        counter.textContent = `${currentLength}/${maxLength} characters`;
        this.parentElement.appendChild(counter);
    }
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/leader-teams/edit.blade.php ENDPATH**/ ?>