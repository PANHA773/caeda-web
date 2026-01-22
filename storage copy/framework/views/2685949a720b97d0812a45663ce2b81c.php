

<?php $__env->startSection('title', 'Add New Strategy'); ?>

<?php $__env->startSection('content'); ?>
<div class="p-6">
    <!-- Header with Breadcrumb -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8">
        <div>
            <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="<?php echo e(route('admin.strategies.index')); ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Strategies
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Add New</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <h1 class="text-3xl font-bold text-gray-900">Add New Strategy</h1>
            <p class="text-gray-600 mt-2">Create a new business strategy</p>
        </div>
        <div class="mt-4 sm:mt-0">
            <a href="<?php echo e(route('admin.strategies.index')); ?>" 
               class="inline-flex items-center px-4 py-2.5 bg-gray-100 text-gray-700 font-medium rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Strategies
            </a>
        </div>
    </div>

    <!-- Validation Errors -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
        <div class="bg-gradient-to-r from-red-50 to-pink-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Please fix the following errors:</h3>
                    <div class="mt-2 text-sm text-red-700">
                        <ul class="list-disc pl-5 space-y-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <!-- Main Form Card -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Form Column -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Strategy Information</h2>
                    <p class="text-sm text-gray-600 mt-1">Fill in the details for the new strategy</p>
                </div>
                
                <div class="p-6">
                    <form action="<?php echo e(route('admin.strategies.store')); ?>" method="POST" id="strategyForm">
                        <?php echo csrf_field(); ?>

                        <div class="space-y-6">
                            <!-- Title Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Title <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                        </svg>
                                    </div>
                                    <input type="text" 
                                           name="title"
                                           id="titleInput"
                                           value="<?php echo e(old('title')); ?>"
                                           class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                           placeholder="Enter strategy title"
                                           required
                                           autofocus>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div id="titleCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Description Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Description <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 pt-3 pointer-events-none">
                                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                        </svg>
                                    </div>
                                    <textarea name="description" 
                                              id="descriptionInput"
                                              rows="5"
                                              class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                              placeholder="Enter strategy description"
                                              required><?php echo e(old('description')); ?></textarea>
                                </div>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <p class="mt-2 text-sm text-red-600"><?php echo e($message); ?></p>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <div id="descriptionCounter" class="mt-2 text-xs text-gray-500"></div>
                            </div>

                            <!-- Two Column Grid for Icon and Order -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Icon Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">
                                        Icon (Emoji)
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <input type="text" 
                                               name="icon"
                                               id="iconInput"
                                               value="<?php echo e(old('icon')); ?>"
                                               class="pl-10 pr-4 py-3 w-full border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 <?php $__errorArgs = ['icon'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> border-red-500 <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                               placeholder="Enter emoji (e.g., 🚀, 💡, ⚡)"
                                               maxlength="2">
                                    </div>
                                    <p class="mt-2 text-sm text-gray-500">Single emoji recommended (max 2 characters)</p>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['icon'];
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
                                               id="orderInput"
                                               value="<?php echo e(old('order', 0)); ?>"
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
                                    <h3 class="text-sm font-medium text-gray-900">Status</h3>
                                    <p class="text-sm text-gray-500">Set the active status of this strategy</p>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" 
                                           name="is_active" 
                                           value="1"
                                           class="sr-only peer"
                                           <?php echo e(old('is_active', true) ? 'checked' : ''); ?>>
                                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-900">
                                        <span id="statusText">Active</span>
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
                                    <a href="<?php echo e(route('admin.strategies.index')); ?>" 
                                       class="inline-flex items-center px-5 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all">
                                        Cancel
                                    </a>
                                    <button type="submit" 
                                            class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium rounded-lg hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                        </svg>
                                        Save Strategy
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
            <!-- Live Preview Card -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                    <h2 class="text-xl font-semibold text-gray-800">Live Preview</h2>
                    <p class="text-sm text-gray-600 mt-1">How this strategy will appear</p>
                </div>
                <div class="p-6">
                    <div class="text-center">
                        <!-- Icon Preview -->
                        <div class="mb-4 flex justify-center">
                            <div id="previewIcon" class="h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl">
                                <span id="previewIconText">🚀</span>
                            </div>
                        </div>
                        
                        <!-- Title Preview -->
                        <h3 id="previewTitle" class="text-xl font-bold text-gray-900 mb-3">Strategy Title</h3>
                        
                        <!-- Description Preview -->
                        <p id="previewDescription" class="text-gray-600 text-sm mb-4">
                            This is a preview of the strategy description. It will appear here when you type.
                        </p>
                        
                        <!-- Status Badge -->
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 mb-4" id="previewStatus">
                            <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3"/>
                            </svg>
                            Active
                        </div>
                        
                        <!-- Order Display -->
                        <div class="mt-6 p-4 bg-gray-50 rounded-lg">
                            <div class="text-sm text-gray-600 mb-2">Display Information</div>
                            <div class="grid grid-cols-2 gap-2 text-sm">
                                <div class="text-gray-700">Order:</div>
                                <div class="font-medium" id="previewOrder">0</div>
                                <div class="text-gray-700">Status:</div>
                                <div class="font-medium" id="previewStatusText">Active</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Popular Emojis -->
            <div class="bg-white rounded-2xl shadow-lg border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Popular Emojis</h2>
                    <p class="text-sm text-gray-600 mt-1">Click to add to icon field</p>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-4 gap-3">
                        <button type="button" onclick="addEmoji('🚀')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🚀
                        </button>
                        <button type="button" onclick="addEmoji('💡')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💡
                        </button>
                        <button type="button" onclick="addEmoji('⚡')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            ⚡
                        </button>
                        <button type="button" onclick="addEmoji('🎯')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🎯
                        </button>
                        <button type="button" onclick="addEmoji('🌟')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🌟
                        </button>
                        <button type="button" onclick="addEmoji('🔥')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🔥
                        </button>
                        <button type="button" onclick="addEmoji('💎')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💎
                        </button>
                        <button type="button" onclick="addEmoji('📈')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            📈
                        </button>
                        <button type="button" onclick="addEmoji('🛡️')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🛡️
                        </button>
                        <button type="button" onclick="addEmoji('🤝')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🤝
                        </button>
                        <button type="button" onclick="addEmoji('🎨')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            🎨
                        </button>
                        <button type="button" onclick="addEmoji('💼')" 
                                class="p-3 bg-gray-50 hover:bg-blue-50 rounded-lg text-center text-2xl transition-colors">
                            💼
                        </button>
                    </div>
                </div>
            </div>

            <!-- Tips Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border border-blue-100">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-semibold text-gray-900">Tips for Creating Strategies</h3>
                        <div class="mt-2 text-sm text-gray-600 space-y-2">
                            <p>• Keep titles clear and action-oriented</p>
                            <p>• Descriptions should explain the strategy's purpose</p>
                            <p>• Emojis make strategies more visually appealing</p>
                            <p>• Order determines display sequence</p>
                            <p>• Inactive strategies won't appear on the website</p>
                        </div>
                    </div>
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
    
    /* Status toggle animation */
    input:checked ~ .peer-checked\:bg-blue-600 {
        background-color: #2563eb;
    }
    
    /* Preview animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    #previewTitle, #previewDescription, #previewIcon {
        animation: fadeIn 0.3s ease-out;
    }
    
    /* Emoji button hover effect */
    button:hover {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get form elements for live preview
    const titleInput = document.getElementById('titleInput');
    const descriptionInput = document.getElementById('descriptionInput');
    const orderInput = document.getElementById('orderInput');
    const iconInput = document.getElementById('iconInput');
    const statusToggle = document.querySelector('input[name="is_active"]');
    const statusText = document.getElementById('statusText');
    const previewStatusText = document.getElementById('previewStatusText');
    const previewStatus = document.getElementById('previewStatus');
    
    // Preview elements
    const previewTitle = document.getElementById('previewTitle');
    const previewDescription = document.getElementById('previewDescription');
    const previewIcon = document.getElementById('previewIcon');
    const previewIconText = document.getElementById('previewIconText');
    const previewOrder = document.getElementById('previewOrder');
    
    // Live preview updates
    function updatePreview() {
        // Title preview
        if (titleInput.value.trim()) {
            previewTitle.textContent = titleInput.value;
        } else {
            previewTitle.textContent = 'Strategy Title';
        }
        
        // Description preview
        if (descriptionInput.value.trim()) {
            previewDescription.textContent = descriptionInput.value;
        } else {
            previewDescription.textContent = 'This is a preview of the strategy description. It will appear here when you type.';
        }
        
        // Order preview
        previewOrder.textContent = orderInput.value || '0';
        
        // Icon preview
        if (iconInput.value.trim()) {
            previewIconText.textContent = iconInput.value;
            previewIcon.className = 'h-16 w-16 bg-gradient-to-br from-green-100 to-emerald-100 rounded-xl flex items-center justify-center text-3xl';
        } else {
            previewIconText.textContent = '🚀';
            previewIcon.className = 'h-16 w-16 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-xl flex items-center justify-center text-3xl';
        }
        
        // Status preview
        const isActive = statusToggle.checked;
        statusText.textContent = isActive ? 'Active' : 'Inactive';
        previewStatusText.textContent = isActive ? 'Active' : 'Inactive';
        
        if (isActive) {
            previewStatus.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800 mb-4';
            previewStatus.innerHTML = `
                <svg class="mr-1.5 h-2 w-2 text-green-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3"/>
                </svg>
                Active
            `;
        } else {
            previewStatus.className = 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800 mb-4';
            previewStatus.innerHTML = `
                <svg class="mr-1.5 h-2 w-2 text-red-500" fill="currentColor" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="3"/>
                </svg>
                Inactive
            `;
        }
    }
    
    // Add event listeners for live preview
    titleInput.addEventListener('input', updatePreview);
    descriptionInput.addEventListener('input', updatePreview);
    orderInput.addEventListener('input', updatePreview);
    iconInput.addEventListener('input', updatePreview);
    statusToggle.addEventListener('change', updatePreview);
    
    // Character counters
    function setupCharacterCounter(inputElement, counterElementId, maxLength) {
        inputElement.addEventListener('input', function() {
            const currentLength = this.value.length;
            const counter = document.getElementById(counterElementId);
            if (counter) {
                counter.textContent = `${currentLength}/${maxLength} characters`;
                if (currentLength > maxLength * 0.8) {
                    counter.classList.add('text-yellow-600');
                    counter.classList.remove('text-gray-500');
                } else {
                    counter.classList.remove('text-yellow-600');
                    counter.classList.add('text-gray-500');
                }
                if (currentLength > maxLength) {
                    counter.classList.add('text-red-600');
                    counter.classList.remove('text-yellow-600', 'text-gray-500');
                }
            }
        });
        
        // Initialize counter
        const counter = document.getElementById(counterElementId);
        if (counter) {
            counter.textContent = `0/${maxLength} characters`;
        }
    }
    
    setupCharacterCounter(titleInput, 'titleCounter', 255);
    setupCharacterCounter(descriptionInput, 'descriptionCounter', 500);
    
    // Initialize preview
    updatePreview();
    
    // Form validation
    const form = document.getElementById('strategyForm');
    form.addEventListener('submit', function(e) {
        const titleValue = titleInput.value.trim();
        const descriptionValue = descriptionInput.value.trim();
        
        if (!titleValue) {
            e.preventDefault();
            titleInput.focus();
            titleInput.classList.add('border-red-500');
            return false;
        }
        
        if (!descriptionValue) {
            e.preventDefault();
            descriptionInput.focus();
            descriptionInput.classList.add('border-red-500');
            return false;
        }
        
        return true;
    });
});

function addEmoji(emoji) {
    const iconInput = document.getElementById('iconInput');
    iconInput.value = emoji;
    iconInput.focus();
    
    // Update preview
    document.getElementById('titleInput').dispatchEvent(new Event('input'));
    
    // Show visual feedback
    const button = event.target.closest('button');
    const originalBg = button.className;
    button.className = originalBg.replace('bg-gray-50', 'bg-green-50').replace('hover:bg-blue-50', 'hover:bg-green-100');
    
    setTimeout(() => {
        button.className = originalBg;
    }, 500);
}

// Auto-focus title input
window.onload = function() {
    const titleInput = document.getElementById('titleInput');
    if (titleInput) {
        titleInput.focus();
    }
};
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/strategies/create.blade.php ENDPATH**/ ?>