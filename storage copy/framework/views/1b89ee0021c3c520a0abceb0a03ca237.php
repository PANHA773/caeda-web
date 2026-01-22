

<?php $__env->startSection('title', 'CAEDA Coffee Shop | Premium Coffee & Cafe'); ?>

<?php $__env->startSection('content'); ?>

<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-amber-900 via-amber-800 to-gray-900">
    <div class="absolute inset-0">
        <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80"
            alt="Coffee beans background"
            class="w-full h-full object-cover opacity-30">
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
        <div class="max-w-3xl">
            <span class="inline-flex items-center gap-2 px-4 py-2 bg-amber-500/20 backdrop-blur-sm rounded-full text-amber-200 text-sm font-semibold mb-6 border border-amber-500/30">
                <i class="fas fa-mug-hot"></i>
                Brewing Excellence Since 2023
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Freshly Roasted<br>
                <span class="text-amber-300">Campus Coffee</span>
            </h1>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl">
                Artisan coffee crafted with passion. Perfect for your study sessions, meetings, or just a quiet moment.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#menu" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl hover:from-amber-700 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-coffee"></i>
                    Explore Our Menu
                </a>
                <a href="#order" class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 backdrop-blur-sm text-white font-semibold rounded-xl hover:bg-white/20 transition-all border border-white/20">
                    <i class="fas fa-mobile-alt"></i>
                    Order Online
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quick Stats -->
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">100+</div>
                <div class="text-gray-600 font-medium">Coffee Varieties</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">24/7</div>
                <div class="text-gray-600 font-medium">Open During Exams</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">15%</div>
                <div class="text-gray-600 font-medium">Student Discount</div>
            </div>
            <div class="text-center p-6">
                <div class="text-3xl md:text-4xl font-bold text-amber-600 mb-2">4.9★</div>
                <div class="text-gray-600 font-medium">Student Rating</div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Menu -->
<section id="menu" class="py-20 bg-amber-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Header -->
        <div class="text-center mb-16">
            <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                STUDENT FAVORITES
            </span>
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Signature Drinks</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Perfect companions for your academic journey
            </p>
        </div>

        <!-- Menu Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div
                    class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">

                    <!-- Image -->
                    <div class="relative h-64 overflow-hidden">
                        <img
                            src="<?php echo e(asset('storage/' . $menu->image)); ?>"
                            alt="<?php echo e($menu->title); ?>"
                            class="w-full h-full object-cover">

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menu->badge): ?>
                            <div class="absolute top-4 right-4">
                                <span
                                    class="px-3 py-1 bg-amber-500 text-white text-sm font-semibold rounded-full shadow-lg">
                                    <?php echo e(strtoupper($menu->badge)); ?>

                                </span>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Content -->
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-3">
                            <h3 class="text-xl font-bold text-gray-900">
                                <?php echo e($menu->title); ?>

                            </h3>

                            <div class="text-right">
                                <span class="text-2xl font-bold text-amber-600">
                                    $<?php echo e(number_format($menu->price, 2)); ?>

                                </span>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menu->old_price): ?>
                                    <div class="text-sm text-gray-500 line-through">
                                        $<?php echo e(number_format($menu->old_price, 2)); ?>

                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>

                        <p class="text-gray-600 mb-4">
                            <?php echo e($menu->description); ?>

                        </p>

                        <!-- Rating & Action -->
                        <div class="flex items-center justify-between">

                            <!-- Rating -->
                            <div class="flex items-center space-x-1">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($i = 1; $i <= 5; $i++): ?>
                                    <i class="fas fa-star <?php echo e($i <= floor($menu->rating) ? 'text-amber-400' : 'text-gray-300'); ?>"></i>
                                <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                <span class="ml-2 text-sm text-gray-600">
                                    (<?php echo e($menu->reviews); ?>)
                                </span>
                            </div>

                            <!-- Button -->
                            <button
                                class="px-4 py-2 bg-amber-100 text-amber-700 font-semibold rounded-lg hover:bg-amber-200 transition-colors">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="col-span-3 text-center text-gray-500">
                    No featured menu available.
                </p>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>

        <!-- View Full Menu -->
        <div class="text-center mt-16">
            <a href="<?php echo e(route('menu.index')); ?>"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl hover:from-amber-700 hover:to-orange-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                View Full Menu
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>


<!-- Why Choose Us -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">


<div>
    <div class="relative">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($promotion) && $promotion->image): ?>
            <img 
                src="<?php echo e(asset('storage/' . $promotion->image)); ?>" 
                alt="<?php echo e($promotion->title); ?>" 
                class="rounded-2xl shadow-2xl">
        <?php else: ?>
            <img 
                src="https://images.unsplash.com/photo-1447933601403-0c6688de566e?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
                alt="Campus Coffee" 
                class="rounded-2xl shadow-2xl">
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="absolute -bottom-6 -right-6 bg-amber-500 p-6 rounded-2xl shadow-xl">
            <div class="text-white">
                <div class="text-3xl font-bold">
                    <?php echo e($promotion->title ?? '15% OFF'); ?>

                </div>
                <div class="text-sm">
                    <?php echo e($promotion->subtitle ?? 'For CAEDA Students'); ?>

                </div>
            </div>
        </div>
    </div>
</div>


            
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($items) && $items->isNotEmpty()): ?>
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($items->first()->badge): ?>
                <span class="inline-block px-4 py-2 bg-amber-100 text-amber-700 rounded-full text-sm font-semibold mb-4">
                    <?php echo e($items->first()->badge); ?>

                </span>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <h2 class="text-4xl font-bold text-gray-900 mb-6">
                    Why Students Love Our Coffee
                </h2>

                <div class="space-y-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex items-start gap-4 group">

                        
                        <div class="flex-shrink-0 w-12 h-12
                                    bg-gradient-to-br <?php echo e($item->color); ?>

                                    rounded-xl flex items-center justify-center
                                    shadow-md group-hover:scale-110 transition-transform duration-300">
                            <i class="<?php echo e($item->icon); ?> text-white text-xl"></i>
                        </div>

                        
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <?php echo e($item->title); ?>

                            </h3>
                            <p class="text-gray-600 leading-relaxed">
                                <?php echo e($item->description); ?>

                            </p>
                        </div>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <?php else: ?>
                <p class="text-gray-500">No items found.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

        </div>
    </div>
</section>

<!-- Order Online Section -->
<section id="order" class="py-20 bg-gradient-to-r from-amber-900 to-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-4xl font-bold text-white mb-4">Skip the Line, Order Online</h2>
            <p class="text-xl text-amber-200 mb-8 max-w-2xl mx-auto">
                Order ahead and pick up your coffee without waiting. Perfect for busy class schedules!
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orderSteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-6 border border-white/20">
                    <div class="w-12 h-12 bg-amber-500 rounded-xl flex items-center justify-center mb-4 mx-auto">
                        <i class="<?php echo e($step->icon); ?> text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2">
                        <?php echo e($loop->iteration); ?>. <?php echo e($step->title); ?>

                    </h3>
                    <p class="text-amber-100"><?php echo e($step->description); ?></p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>

            <div class="mt-12">
                <button class="inline-flex items-center gap-2 px-8 py-4 bg-white text-amber-700 font-bold rounded-xl hover:bg-amber-50 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class="fas fa-play-circle"></i>
                    Start Your Order Now
                </button>
            </div>
        </div>
    </div>
</section>


<!-- Location & Hours -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div>
                <h2 class="text-4xl font-bold text-gray-900 mb-6">Visit Our Campus Cafe</h2>

                <div class="space-y-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($location->status): ?> 
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <i class="<?php echo e($location->icon); ?> <?php echo e($location->color); ?> text-xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-1"><?php echo e($location->title); ?></h3>
                                <p class="text-gray-600"><?php echo $location->description; ?></p>
                            </div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-xl">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.0138882091787!2d104.8924793153644!3d11.55085804758059!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310951add5e2cd81%3A0x171e0b69c7c6f7ba!2sPhnom%20Penh%2C%20Cambodia!5e0!3m2!1sen!2s!4v1678880000000!5m2!1sen!2s"
                    width="100%"
                    height="100%"
                    style="min-height: 400px; border:0;"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>
    </div>
</section>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
<style>
    /* Custom animation for coffee beans */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    /* Custom scroll behavior */
    html {
        scroll-behavior: smooth;
    }

    /* Coffee gradient text */
    .coffee-gradient {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 50%, #92400e 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add to cart functionality
        document.querySelectorAll('button:contains("Add to Cart")').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.bg-white');
                const itemName = card.querySelector('h3').textContent;
                const itemPrice = card.querySelector('.text-2xl').textContent;

                // Create success toast
                createToast(`${itemName} added to cart! ${itemPrice}`);

                // Add animation effect
                this.innerHTML = '<i class="fas fa-check"></i> Added!';
                this.classList.add('bg-green-100', 'text-green-700', 'hover:bg-green-200');

                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = 'Add to Cart';
                    this.classList.remove('bg-green-100', 'text-green-700', 'hover:bg-green-200');
                }, 2000);
            });
        });

        // Order button animation
        document.querySelector('button:contains("Start Your Order Now")').addEventListener('click', function() {
            createToast('Redirecting to online ordering system...');
        });

        // Helper function to create toast notifications
        function createToast(message) {
            const toast = document.createElement('div');
            toast.className = 'fixed top-4 right-4 z-50 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-6 py-3 rounded-xl shadow-xl flex items-center gap-3 animate-slideIn';
            toast.innerHTML = `
                <i class="fas fa-check-circle text-xl"></i>
                <span class="font-medium">${message}</span>
            `;

            document.body.appendChild(toast);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove('animate-slideIn');
                toast.classList.add('animate-slideOut');
                setTimeout(() => {
                    document.body.removeChild(toast);
                }, 300);
            }, 3000);
        }

        // Add animation styles
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from {
                    transform: translateX(100%);
                    opacity: 0;
                }
                to {
                    transform: translateX(0);
                    opacity: 1;
                }
            }
            
            @keyframes slideOut {
                from {
                    transform: translateX(0);
                    opacity: 1;
                }
                to {
                    transform: translateX(100%);
                    opacity: 0;
                }
            }
            
            .animate-slideIn {
                animation: slideIn 0.3s ease-out forwards;
            }
            
            .animate-slideOut {
                animation: slideOut 0.3s ease-in forwards;
            }
        `;
        document.head.appendChild(style);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/coffee.blade.php ENDPATH**/ ?>