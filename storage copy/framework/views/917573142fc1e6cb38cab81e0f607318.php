<?php $__env->startSection('title', __('Donation for Helpless Children')); ?>

<?php $__env->startSection('extra-css'); ?>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --primary: #3b82f6;
        --primary-dark: #1d4ed8;
        --secondary: #8b5cf6;
        --accent: #10b981;
        --light: #f8fafc;
        --dark: #0f172a;
    }

    * {
        font-family: 'Inter', sans-serif;
    }

    .font-display {
        font-family: 'Inter', sans-serif;
        font-weight: 900;
    }

    /* Animations */
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes shimmer {
        0% { background-position: -1000px 0; }
        100% { background-position: 1000px 0; }
    }

    @keyframes gradientShift {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    @keyframes pulse-glow {
        0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.5); }
        50% { box-shadow: 0 0 40px rgba(59, 130, 246, 0.8); }
    }

    @keyframes progress-fill {
        from { width: 0%; }
        to { width: var(--progress); }
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-fade-up {
        animation: fadeUp 0.8s ease-out forwards;
    }

    .animate-shimmer {
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.3) 50%, rgba(255,255,255,0) 100%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite;
    }

    .animate-gradient {
        background-size: 200% 200%;
        animation: gradientShift 4s ease infinite;
    }

    .animate-pulse-glow {
        animation: pulse-glow 2s ease-in-out infinite;
    }

    .animate-progress {
        animation: progress-fill 1.5s ease-out forwards;
    }

    /* Glass Morphism */
    .glass {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .glass-dark {
        background: rgba(15, 23, 42, 0.8);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    /* Custom Utilities */
    .text-gradient {
        background: linear-gradient(135deg, var(--primary), var(--secondary));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .bg-gradient-radial {
        background-image: radial-gradient(circle at 50% 50%, var(--tw-gradient-stops));
    }

    .card-hover {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
        width: 8px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }

    ::-webkit-scrollbar-thumb {
        background: linear-gradient(to bottom, var(--primary), var(--secondary));
        border-radius: 10px;
    }

    /* Progress Bar */
    .progress-container {
        height: 8px;
        background: #e2e8f0;
        border-radius: 4px;
        overflow: hidden;
    }

    .progress-fill {
        height: 100%;
        border-radius: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
    }

    /* Ripple Effect */
    .ripple {
        position: relative;
        overflow: hidden;
    }

    .ripple::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 5px;
        height: 5px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 0;
        border-radius: 100%;
        transform: scale(1, 1) translate(-50%);
        transform-origin: 50% 50%;
    }

    .ripple:focus:not(:active)::after {
        animation: ripple 1s ease-out;
    }

    @keyframes ripple {
        0% {
            transform: scale(0, 0);
            opacity: 0.5;
        }
        100% {
            transform: scale(100, 100);
            opacity: 0;
        }
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero): ?>
<section class="relative min-h-screen flex items-center overflow-hidden">
    <!-- Animated Background -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
        <!-- Animated Orbs -->
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/20 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 2s;"></div>
        <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-pink-500/20 rounded-full blur-3xl animate-float" style="animation-delay: 4s;"></div>

        <!-- Grid Pattern -->
        <div class="absolute inset-0 opacity-10" 
             style="background-image: url('data:image/svg+xml,%3Csvg width=&quot;60&quot; height=&quot;60&quot; viewBox=&quot;0 0 60 60&quot; xmlns=&quot;http://www.w3.org/2000/svg&quot;%3E%3Cg fill=&quot;none&quot; fill-rule=&quot;evenodd&quot;%3E%3Cg fill=&quot;%239C92AC&quot; fill-opacity=&quot;0.4&quot;%3E%3Cpath d=&quot;M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z&quot;/ %3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>
    </div>

    <!-- Hero Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 py-16">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <!-- Left Column -->
            <div class="text-white">
                <!-- Badge -->
                <div class="inline-flex items-center gap-2 glass px-4 py-2 rounded-full mb-8 animate-fade-up">
                    <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                    <span class="text-sm font-medium"><?php echo e($hero->badge_text); ?></span>
                </div>

                <!-- Main Heading -->
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-display font-black mb-6 leading-tight animate-fade-up">
                    <?php echo e($hero->title); ?> <br>
                    <span class="text-gradient"><?php echo e($hero->highlight_title); ?></span>
                </h1>

                <!-- Subheading -->
                <p class="text-xl text-blue-100 mb-8 leading-relaxed animate-fade-up" style="animation-delay: 0.2s;">
                    <?php echo e($hero->subtitle); ?>

                </p>

                <!-- Stats -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero->stats): ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $hero->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="glass p-4 rounded-2xl text-center backdrop-blur-sm animate-fade-up" style="animation-delay: <?php echo e($index * 0.1 + 0.4); ?>s;">
                                <div class="text-2xl mb-2"><?php echo e($stat['icon'] ?? ''); ?></div>
                                <div class="text-2xl font-bold mb-1"><?php echo e($stat['value'] ?? ''); ?></div>
                                <div class="text-sm text-blue-200"><?php echo e($stat['label'] ?? ''); ?></div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <!-- CTA Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 animate-fade-up" style="animation-delay: 0.6s;">
                    <a href="#donate-form" 
                       class="group inline-flex items-center justify-center gap-3 bg-white text-gray-900 hover:bg-gray-100 font-bold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-2xl">
                        Donate Now
                        <i class="fas fa-heart group-hover:scale-125 transition-transform"></i>
                    </a>
                    <a href="#impact" 
                       class="group inline-flex items-center justify-center gap-3 glass border border-white/20 text-white hover:bg-white/10 font-semibold py-4 px-8 rounded-xl transition-all duration-300">
                        <i class="fas fa-play-circle"></i>
                        See Our Impact
                    </a>
                </div>
            </div>

            <!-- Right Column - Visual Impact -->
 <div class="relative">
    <!-- Main Image -->
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hero && $hero->image): ?>
        <div class="relative rounded-3xl overflow-hidden shadow-2xl transform rotate-3 animate-fade-up" style="animation-delay: 0.3s;">
            <img src="<?php echo e(asset('storage/' . $hero->image)); ?>" 
                 alt="<?php echo e($hero->highlight_title ?? 'Hero Image'); ?>"
                 class="w-full h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
    <?php else: ?>
        <!-- Fallback Image -->
        <div class="relative rounded-3xl overflow-hidden shadow-2xl transform rotate-3 animate-fade-up" style="animation-delay: 0.3s;">
            <img src="<?php echo e(asset('images/default-hero.jpg')); ?>" 
                 alt="Default Hero Image"
                 class="w-full h-96 object-cover">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
        </div>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>

        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
        <div class="animate-bounce">
            <svg class="w-6 h-6 text-white/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </div>
</section>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>


<section id="donate-form" class="py-24 px-4 md:px-8 bg-gradient-to-b from-slate-50 to-white">
    <div class="max-w-6xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-black text-gray-900 mb-4">
                Make Your <span class="text-gradient">Donation</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Choose an amount and cause. Your support will directly impact children's lives.
            </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Left Column - Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden card-hover">
                    <!-- Form Header -->
                    <div class="bg-gradient-to-r from-blue-600 to-purple-600 p-6 text-white">
                        <div class="flex items-center justify-between">
                            <div>
                                <h3 class="text-2xl font-bold">Donation Details</h3>
                                <p class="text-blue-100">Every dollar makes a difference</p>
                            </div>
                            <div class="text-3xl">❤️</div>
                        </div>
                    </div>

                    <!-- Progress Bar -->
                    <div class="px-6 pt-6">
                        <div class="mb-4">
                            <div class="flex justify-between text-sm text-gray-600 mb-2">
                                <span>Monthly Goal: $50,000</span>
                                <span class="font-bold">75% funded</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-fill animate-progress" style="--progress: 75%"></div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <form id="donationForm" method="POST" action="<?php echo e(route('donation.submit')); ?>" class="p-6 space-y-8">
                        <?php echo csrf_field(); ?>

                        <!-- Donation Amount -->
                        <div>
                            <label class="block text-lg font-semibold text-gray-900 mb-4">
                                Select Donation Amount
                            </label>
                            <div class="grid grid-cols-3 gap-3 mb-6">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = [25, 50, 100, 250, 500, 1000]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amount): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <button type="button"
                                            data-amount="<?php echo e($amount); ?>"
                                            class="donation-quick-amount group p-4 rounded-xl border-2 font-bold transition-all duration-300 transform hover:-translate-y-1 border-gray-200 text-gray-700 hover:border-blue-500 hover:shadow-lg bg-white">
                                        <div class="flex flex-col items-center">
                                            <span class="text-xl">$<?php echo e($amount); ?></span>
                                            <span class="text-xs text-gray-500 opacity-0 group-hover:opacity-100 transition-opacity mt-1">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($amount):
                                                    case (25): ?> Meals for 5 children <?php break; ?>
                                                    <?php case (50): ?> School supplies for 2 <?php break; ?>
                                                    <?php case (100): ?> Medical checkups <?php break; ?>
                                                    <?php case (250): ?> Monthly education <?php break; ?>
                                                    <?php case (500): ?> Shelter for a month <?php break; ?>
                                                    <?php case (1000): ?> Transform a life <?php break; ?>
                                                <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </span>
                                        </div>
                                    </button>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            <!-- Custom Amount -->
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-xl">$</span>
                                <input type="number"
                                       id="customAmount"
                                       name="amount"
                                       value=""
                                       class="w-full pl-12 pr-4 py-4 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300 bg-white text-lg font-medium"
                                       placeholder="Enter custom amount"
                                       min="1"
                                       step="0.01">
                            </div>
                        </div>

                        <!-- Donation Cause -->
                        <div>
                            <label class="block text-lg font-semibold text-gray-900 mb-4">
                                Choose Your Impact Area
                            </label>
                            <div class="grid grid-cols-2 gap-4">
                                <?php
                                    $causes = [
                                        ['id' => 'education', 'icon' => 'fas fa-graduation-cap', 'title' => 'Education', 'desc' => 'School supplies & tuition', 'color' => 'from-blue-500 to-cyan-500'],
                                        ['id' => 'nutrition', 'icon' => 'fas fa-utensils', 'title' => 'Nutrition', 'desc' => 'Daily meals & supplements', 'color' => 'from-green-500 to-emerald-500'],
                                        ['id' => 'healthcare', 'icon' => 'fas fa-heartbeat', 'title' => 'Healthcare', 'desc' => 'Medical treatments', 'color' => 'from-red-500 to-pink-500'],
                                        ['id' => 'shelter', 'icon' => 'fas fa-home', 'title' => 'Shelter', 'desc' => 'Safe housing', 'color' => 'from-orange-500 to-yellow-500'],
                                        ['id' => 'emergency', 'icon' => 'fas fa-first-aid', 'title' => 'Emergency', 'desc' => 'Crisis relief', 'color' => 'from-yellow-500 to-orange-500'],
                                        ['id' => 'general', 'icon' => 'fas fa-hands-helping', 'title' => 'General Fund', 'desc' => 'Where needed most', 'color' => 'from-purple-500 to-pink-500'],
                                    ];
                                ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $causes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cause): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div data-cause="<?php echo e($cause['id']); ?>"
                                         class="donation-cause group p-4 rounded-xl border-2 cursor-pointer transition-all duration-300 transform hover:-translate-y-1 border-gray-200 hover:border-blue-500 hover:shadow-lg bg-white">
                                        <div class="flex items-center">
                                            <div class="w-12 h-12 rounded-xl bg-gradient-to-r <?php echo e($cause['color']); ?> flex items-center justify-center text-white text-xl mr-4">
                                                <i class="<?php echo e($cause['icon']); ?>"></i>
                                            </div>
                                            <div class="flex-1">
                                                <h4 class="font-semibold text-gray-900"><?php echo e($cause['title']); ?></h4>
                                                <p class="text-sm text-gray-600"><?php echo e($cause['desc']); ?></p>
                                            </div>
                                            <div class="w-3 h-3 bg-blue-500 rounded-full hidden"></div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <input type="hidden" id="selectedCause" name="cause" value="education">
                        </div>

                        <!-- Recurring Donation -->
                        <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-2xl p-6 border border-blue-100">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-600 rounded-xl flex items-center justify-center text-white mr-4">
                                        <i class="fas fa-sync-alt"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-semibold text-gray-900">Monthly Impact</h4>
                                        <p class="text-sm text-gray-600">Provide sustainable support</p>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="recurringDonation" name="recurring" class="sr-only">
                                    <div id="recurringToggle" class="w-14 h-7 bg-gray-300 rounded-full transition-colors duration-300"></div>
                                    <div id="recurringHandle" class="absolute left-1 top-1 w-5 h-5 rounded-full bg-white transition-transform duration-300"></div>
                                </label>
                            </div>
                            <div id="recurringMessage" class="mt-4 p-3 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm hidden">
                                <i class="fas fa-star mr-2"></i>
                                Monthly donors provide consistent support for children in need!
                            </div>
                        </div>

                        <!-- Payment Method -->
                        <!-- <div>
                            <label class="block text-lg font-semibold text-gray-900 mb-4">
                                Payment Method
                            </label>
                            <div class="grid grid-cols-3 gap-4">
                                <?php
                                    $methods = [
                                        ['id' => 'card', 'icon' => 'fas fa-credit-card', 'name' => 'Card', 'color' => 'from-blue-500 to-indigo-600'],
                                        ['id' => 'paypal', 'icon' => 'fab fa-paypal', 'name' => 'PayPal', 'color' => 'from-blue-400 to-blue-600'],
                                        ['id' => 'bank', 'icon' => 'fas fa-university', 'name' => 'Bank', 'color' => 'from-green-500 to-emerald-600'],
                                    ];
                                ?>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $methods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div data-method="<?php echo e($method['id']); ?>"
                                         class="payment-method group p-4 rounded-xl border-2 cursor-pointer transition-all duration-300 transform hover:-translate-y-1 border-gray-200 hover:border-blue-500 hover:shadow-lg bg-white text-center">
                                        <div class="w-12 h-12 rounded-xl bg-gradient-to-r <?php echo e($method['color']); ?> flex items-center justify-center text-white text-xl mx-auto mb-3">
                                            <i class="<?php echo e($method['icon']); ?>"></i>
                                        </div>
                                        <span class="font-medium text-gray-900"><?php echo e($method['name']); ?></span>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                            <input type="hidden" id="paymentMethod" name="payment_method" value="card">
                        </div> -->

                        <!-- Donor Information -->
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Your Information</h4>
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text" name="first_name" placeholder="First Name" class="p-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" required>
                                <input type="text" name="last_name" placeholder="Last Name" class="p-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" required>
                                <input type="email" name="email" placeholder="Email Address" class="p-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300" required>
                                <input type="tel" name="phone" placeholder="Phone Number" class="p-3 border-2 border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-300">
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                id="donateButton"
                                class="w-full py-4 px-6 rounded-xl font-bold text-lg transition-all duration-300 transform hover:-translate-y-1 bg-gray-300 text-gray-500 cursor-not-allowed disabled:opacity-50 disabled:cursor-not-allowed">
                            <span class="flex items-center justify-center">
                                Enter Donation Amount
                                <i class="fas fa-arrow-right ml-2"></i>
                            </span>
                        </button>

                        <!-- Security Note -->
                        <p class="text-center text-sm text-gray-500 pt-4 border-t border-gray-200">
                            <i class="fas fa-lock mr-2"></i>
                            Your donation is secure and encrypted. Tax-deductible receipt provided.
                        </p>
                    </form>
                </div>
            </div>

            <!-- Right Column - Impact Preview -->
            <div class="space-y-8">
                <!-- Impact Preview -->
                <div class="bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 rounded-3xl p-8 text-white shadow-2xl">
                    <h3 class="text-2xl font-bold mb-6">Your Impact Preview</h3>
                    <div class="space-y-6" id="impact-preview">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center">
                                <i class="fas fa-gift text-2xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold" id="impact-amount">$0</div>
                                <div class="text-blue-200">Total Donation</div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold" id="impact-meals">0</div>
                                <div class="text-sm text-blue-200">Meals Provided</div>
                            </div>
                            <div class="bg-white/10 p-4 rounded-2xl text-center">
                                <div class="text-2xl font-bold" id="impact-education">0</div>
                                <div class="text-sm text-blue-200">School Days</div>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between text-sm">
                                <span>Education Support</span>
                                <span id="education-bar" class="font-bold">0%</span>
                            </div>
                            <div class="progress-container">
                                <div class="progress-fill" id="education-progress" style="width: 0%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Donors -->
                <div class="bg-white rounded-3xl p-8 shadow-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Recent Donors</h3>
                    <div class="space-y-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $recentDonors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $donor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex items-center justify-between p-3 hover:bg-gray-50 rounded-xl transition-colors duration-300">
                                <div class="flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-100 to-purple-100 rounded-full flex items-center justify-center text-blue-600 font-bold mr-3">
                                        <?php echo e(strtoupper(substr($donor->first_name, 0, 1))); ?>

                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-900"><?php echo e($donor->first_name); ?> <?php echo e($donor->last_name); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e(ucfirst($donor->cause)); ?></div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="font-bold text-gray-900">$<?php echo e(number_format($donor->amount, 2)); ?></div>
                                    <div class="text-xs text-gray-500"><?php echo e($donor->created_at->diffForHumans()); ?></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="text-center text-gray-500 py-4">
                                No donations yet. Be the first to give!
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>

                <!-- FAQ -->
                <div class="bg-white rounded-3xl p-8 shadow-xl">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Common Questions</h3>
                    <div class="space-y-4">
                        <?php
                            $faqs = [
                                ['q' => 'Is my donation tax-deductible?', 'a' => 'Yes, we are a registered 501(c)(3) organization.'],
                                ['q' => 'How are funds distributed?', 'a' => '95% goes directly to programs for children.'],
                                ['q' => 'Can I donate monthly?', 'a' => 'Yes, choose the recurring option above.'],
                                ['q' => 'Will I get a receipt?', 'a' => 'Yes, emailed immediately after donation.'],
                            ];
                        ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="group">
                                <div class="flex items-center justify-between p-3 cursor-pointer hover:bg-gray-50 rounded-xl transition-colors duration-300">
                                    <span class="font-medium text-gray-900"><?php echo e($faq['q']); ?></span>
                                    <i class="fas fa-chevron-down text-gray-400 group-hover:rotate-180 transition-transform duration-300"></i>
                                </div>
                                <div class="px-3 pb-3 text-sm text-gray-600 hidden group-hover:block">
                                    <?php echo e($faq['a']); ?>

                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>



<section id="impact" class="py-24 px-4 md:px-8 bg-gradient-to-b from-white to-blue-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-black text-gray-900 mb-4">
                Stories of <span class="text-gradient">Hope</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Real children, real stories - made possible by donors like you
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $impactStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white rounded-3xl overflow-hidden shadow-2xl card-hover animate-fade-up"
                     style="animation-delay: <?php echo e($loop->index * 0.2); ?>s;">
                     
                    <div class="relative h-64">
                        <img src="<?php echo e($story->image); ?>"
                             alt="<?php echo e($story->name); ?>"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

                        <div class="absolute bottom-4 left-4">
                            <div class="px-3 py-1 bg-gradient-to-r <?php echo e($story->color); ?>

                                text-white rounded-full text-sm font-bold">
                                <?php echo e($story->impact); ?>

                            </div>
                        </div>
                    </div>

                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">
                            <?php echo e($story->name); ?>

                        </h3>

                        <p class="text-gray-600 italic">
                            "<?php echo e($story->story); ?>"
                        </p>

                        <div class="flex items-center justify-between pt-4 mt-4 border-t border-gray-100">
                            <span class="text-sm text-gray-500">
                                Changed by donors like you
                            </span>
                            <span class="text-2xl">❤️</span>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>



<section class="py-16 px-4 md:px-8 bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h3 class="text-3xl font-bold mb-4">Trusted & Verified</h3>
            <p class="text-gray-300 max-w-2xl mx-auto">Our commitment to transparency and impact</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
                $indicators = [
                    ['icon' => 'fas fa-shield-alt', 'title' => 'Secure & Encrypted', 'desc' => 'Bank-level security'],
                    ['icon' => 'fas fa-chart-line', 'title' => 'Financial Transparency', 'desc' => 'Annual reports available'],
                    ['icon' => 'fas fa-award', 'title' => 'Top Rated Charity', 'desc' => '4.8/5 donor satisfaction'],
                    ['icon' => 'fas fa-globe', 'title' => 'Global Impact', 'desc' => '50+ communities served'],
                ];
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $indicators; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $indicator): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="glass-dark p-6 rounded-2xl text-center transform transition-all duration-300 hover:-translate-y-2 hover:bg-white/5">
                    <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center text-white text-2xl mx-auto mb-4">
                        <i class="<?php echo e($indicator['icon']); ?>"></i>
                    </div>
                    <h4 class="font-bold text-lg mb-2"><?php echo e($indicator['title']); ?></h4>
                    <p class="text-gray-300 text-sm"><?php echo e($indicator['desc']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize GSAP animations
    gsap.registerPlugin(ScrollTrigger);
    
    // Animate elements on scroll
    gsap.utils.toArray('.animate-fade-up').forEach(element => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: 'top 80%',
            },
            y: 40,
            opacity: 0,
            duration: 1,
            ease: 'power2.out'
        });
    });

    // Donation amount selection
    const quickAmountButtons = document.querySelectorAll('.donation-quick-amount');
    const customAmountInput = document.getElementById('customAmount');
    const donateButton = document.getElementById('donateButton');
    
    // Initialize with first amount selected
    if (quickAmountButtons.length > 0) {
        quickAmountButtons[0].click();
    }

    quickAmountButtons.forEach(button => {
        button.addEventListener('click', function() {
            const amount = this.getAttribute('data-amount');
            
            // Update input value
            customAmountInput.value = amount;
            
            // Remove active state from all buttons
            quickAmountButtons.forEach(btn => {
                btn.classList.remove('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg');
                btn.classList.add('border-gray-200', 'text-gray-700', 'hover:border-blue-500', 'bg-white');
            });
            
            // Add active state to clicked button
            this.classList.remove('border-gray-200', 'text-gray-700', 'hover:border-blue-500', 'bg-white');
            this.classList.add('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg');
            
            // Update donate button and impact preview
            updateDonateButton(amount);
            updateImpactPreview(amount);
        });
    });
    
    // Custom amount input
    customAmountInput.addEventListener('input', function() {
        const amount = this.value;
        
        // Remove active state from quick amount buttons
        quickAmountButtons.forEach(btn => {
            btn.classList.remove('border-blue-500', 'bg-gradient-to-r', 'from-blue-500', 'to-blue-600', 'text-white', 'shadow-lg');
            btn.classList.add('border-gray-200', 'text-gray-700', 'hover:border-blue-500', 'bg-white');
        });
        
        // Update donate button and impact preview
        updateDonateButton(amount);
        updateImpactPreview(amount);
    });
    
    // Donation cause selection
    const causeOptions = document.querySelectorAll('.donation-cause');
    const selectedCauseInput = document.getElementById('selectedCause');
    
    causeOptions.forEach(option => {
        option.addEventListener('click', function() {
            const causeId = this.getAttribute('data-cause');
            
            // Remove active state from all options
            causeOptions.forEach(opt => {
                opt.classList.remove('border-blue-500', 'bg-blue-50', 'shadow-lg');
                opt.classList.add('border-gray-200', 'hover:border-blue-500', 'bg-white');
                opt.querySelector('.w-3.h-3').classList.add('hidden');
            });
            
            // Add active state to clicked option
            this.classList.remove('border-gray-200', 'hover:border-blue-500', 'bg-white');
            this.classList.add('border-blue-500', 'bg-blue-50', 'shadow-lg');
            this.querySelector('.w-3.h-3').classList.remove('hidden');
            
            // Update selected cause
            selectedCauseInput.value = causeId;
        });
    });
    
    // Payment method selection
    const paymentOptions = document.querySelectorAll('.payment-method');
    const paymentMethodInput = document.getElementById('paymentMethod');
    
    paymentOptions.forEach(option => {
        option.addEventListener('click', function() {
            const methodId = this.getAttribute('data-method');
            
            // Remove active state from all options
            paymentOptions.forEach(opt => {
                opt.classList.remove('border-blue-500', 'bg-blue-50', 'shadow-lg');
                opt.classList.add('border-gray-200', 'hover:border-blue-500', 'bg-white');
            });
            
            // Add active state to clicked option
            this.classList.remove('border-gray-200', 'hover:border-blue-500', 'bg-white');
            this.classList.add('border-blue-500', 'bg-blue-50', 'shadow-lg');
            
            // Update payment method
            paymentMethodInput.value = methodId;
        });
    });
    
    // Recurring donation toggle
    const recurringToggle = document.getElementById('recurringToggle');
    const recurringHandle = document.getElementById('recurringHandle');
    const recurringCheckbox = document.getElementById('recurringDonation');
    const recurringMessage = document.getElementById('recurringMessage');
    
    if (recurringToggle) {
        recurringToggle.addEventListener('click', function() {
            const isChecked = recurringCheckbox.checked;
            
            recurringCheckbox.checked = !isChecked;
            
            if (!isChecked) {
                recurringToggle.classList.remove('bg-gray-300');
                recurringToggle.classList.add('bg-green-500');
                recurringHandle.style.transform = 'translateX(28px)';
                recurringMessage.classList.remove('hidden');
                
                // Animate the message
                gsap.from(recurringMessage, {
                    opacity: 0,
                    y: 20,
                    duration: 0.5,
                    ease: 'back.out(1.7)'
                });
            } else {
                recurringToggle.classList.remove('bg-green-500');
                recurringToggle.classList.add('bg-gray-300');
                recurringHandle.style.transform = 'translateX(0)';
                recurringMessage.classList.add('hidden');
            }
        });
    }
    
    // Form submission
    const donationForm = document.getElementById('donationForm');
    if (donationForm) {
        donationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const amount = customAmountInput.value;
            const cause = selectedCauseInput.value;
            const paymentMethod = paymentMethodInput.value;
            const isRecurring = recurringCheckbox.checked;
            
            // Validation
            if (!amount || amount <= 0) {
                showNotification('Please enter a valid donation amount.', 'error');
                return;
            }
            
            // Show loading state
            const originalText = donateButton.innerHTML;
            donateButton.disabled = true;
            donateButton.innerHTML = `
                <span class="flex items-center justify-center">
                    <i class="fas fa-spinner fa-spin mr-2"></i>
                    Processing...
                </span>
            `;
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                showNotification('Thank you for your generous donation! A receipt has been sent to your email.', 'success');
                
                // Reset form (in a real app, you'd redirect or show confirmation)
                setTimeout(() => {
                    donationForm.reset();
                    quickAmountButtons[0].click();
                    causeOptions[0].click();
                    paymentOptions[0].click();
                    updateDonateButton('');
                    updateImpactPreview(0);
                    
                    // Reset recurring toggle
                    recurringCheckbox.checked = false;
                    recurringToggle.classList.remove('bg-green-500');
                    recurringToggle.classList.add('bg-gray-300');
                    recurringHandle.style.transform = 'translateX(0)';
                    recurringMessage.classList.add('hidden');
                    
                    // Reset button
                    donateButton.disabled = false;
                    donateButton.innerHTML = originalText;
                }, 2000);
            }, 1500);
        });
    }
    
    // Update donate button function
    function updateDonateButton(amount) {
        if (amount && amount > 0) {
            donateButton.disabled = false;
            donateButton.classList.remove('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
            donateButton.classList.add('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700', 'text-white', 'shadow-lg', 'ripple');
            donateButton.innerHTML = `
                <span class="flex items-center justify-center">
                    Donate $${formatAmount(amount)} Now
                    <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </span>
            `;
        } else {
            donateButton.disabled = true;
            donateButton.classList.add('bg-gray-300', 'text-gray-500', 'cursor-not-allowed');
            donateButton.classList.remove('bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'hover:from-blue-700', 'hover:to-purple-700', 'text-white', 'shadow-lg', 'ripple');
            donateButton.innerHTML = `
                <span class="flex items-center justify-center">
                    Enter Donation Amount
                    <i class="fas fa-arrow-right ml-2"></i>
                </span>
            `;
        }
    }
    
    // Update impact preview
    function updateImpactPreview(amount) {
        const amountNum = parseFloat(amount) || 0;
        
        // Update amount display
        document.getElementById('impact-amount').textContent = '$' + formatAmount(amount);
        
        // Calculate impacts
        const meals = Math.floor(amountNum / 5); // $5 per meal
        const educationDays = Math.floor(amountNum / 10); // $10 per school day
        const educationPercent = Math.min(100, Math.floor((amountNum / 1000) * 100));
        
        // Update displays
        document.getElementById('impact-meals').textContent = meals;
        document.getElementById('impact-education').textContent = educationDays;
        document.getElementById('education-bar').textContent = educationPercent + '%';
        
        // Animate progress bars
        gsap.to('#education-progress', {
            width: educationPercent + '%',
            duration: 1,
            ease: 'power2.out'
        });
    }
    
    // Helper functions
    function formatAmount(amount) {
        const num = parseFloat(amount);
        return isNaN(num) ? '0' : num.toLocaleString('en-US', {
            minimumFractionDigits: 0,
            maximumFractionDigits: 2
        });
    }
    
    function showNotification(message, type) {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `fixed top-6 right-6 p-4 rounded-xl shadow-2xl text-white z-50 transform transition-all duration-300 ${
            type === 'success' ? 'bg-gradient-to-r from-green-500 to-emerald-600' : 'bg-gradient-to-r from-red-500 to-pink-600'
        }`;
        notification.innerHTML = `
            <div class="flex items-center">
                <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'} mr-3 text-xl"></i>
                <div>
                    <p class="font-semibold">${type === 'success' ? 'Success!' : 'Error'}</p>
                    <p class="text-sm opacity-90">${message}</p>
                </div>
            </div>
        `;
        
        // Add to page
        document.body.appendChild(notification);
        
        // Animate in
        gsap.from(notification, {
            x: 100,
            opacity: 0,
            duration: 0.5,
            ease: 'back.out(1.7)'
        });
        
        // Remove after 5 seconds
        setTimeout(() => {
            gsap.to(notification, {
                x: 100,
                opacity: 0,
                duration: 0.5,
                onComplete: () => notification.remove()
            });
        }, 5000);
    }
    
    // Initialize animations
    gsap.from('#header-section', {
        duration: 1,
        y: 50,
        opacity: 0,
        ease: 'power2.out'
    });
    
    // Parallax effect for hero background
    gsap.to('.absolute.inset-0.bg-gradient-to-br', {
        scrollTrigger: {
            trigger: 'section',
            start: 'top top',
            end: 'bottom top',
            scrub: true
        },
        y: 100,
        ease: 'none'
    });
    
    // Initialize first selections
    if (causeOptions.length > 0) causeOptions[0].click();
    if (paymentOptions.length > 0) paymentOptions[0].click();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/donation.blade.php ENDPATH**/ ?>