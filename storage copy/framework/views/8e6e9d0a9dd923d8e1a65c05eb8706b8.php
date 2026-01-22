

<?php $__env->startSection('title', 'Our Achievements - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css">

    <style>
        :root {
            --primary: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #8b5cf6;
            --accent: #10b981;
            --dark: #111827;
            --light: #f9fafb;
        }
        
        * {
            font-family: 'Inter', sans-serif;
        }
        
        .font-display {
            font-family: 'Inter', sans-serif;
            font-weight: 900;
        }
        
        /* Smooth animations */
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
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
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
        
        .animate-fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.6s ease-out forwards;
        }
        
        .animate-float {
            animation: float 6s ease-in-out infinite;
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
        
        /* Custom scrollbar */
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
        
        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .glass-dark {
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        /* Custom card hover effects */
        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Timeline custom styling */
        .timeline-container {
            position: relative;
        }
        
        .timeline-container::before {
            content: '';
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            height: 100%;
            background: linear-gradient(to bottom, transparent, var(--primary), var(--secondary), transparent);
        }
        
        /* Progress ring */
        .progress-ring {
            transform: rotate(-90deg);
        }
        
        .progress-ring-circle {
            stroke-linecap: round;
            transition: stroke-dashoffset 1.5s ease;
        }
        
        /* Glowing borders */
        .glow-border {
            position: relative;
        }
        
        .glow-border::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(45deg, var(--primary), var(--secondary), var(--accent));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .glow-border:hover::before {
            opacity: 1;
        }
        
        /* Text gradient */
        .text-gradient {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .text-gradient-accent {
            background: linear-gradient(135deg, var(--accent), #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Animated background -->
    <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-gray-800 to-slate-900">
        <div class="absolute inset-0 opacity-30">
            <div class="absolute top-20 left-10 w-72 h-72 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float"></div>
            <div class="absolute bottom-20 right-10 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 2s;"></div>
            <div class="absolute top-1/2 left-1/3 w-64 h-64 bg-emerald-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-float" style="animation-delay: 4s;"></div>
        </div>

        <!-- Grid pattern -->
        <div class="absolute inset-0 opacity-5" style="background-image: url('data:image/svg+xml,...');"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 py-20">
        <div class="text-center mb-16 animate-fade-up">
            <div class="inline-flex items-center gap-3 mb-6 px-4 py-2 rounded-full glass text-white text-sm font-medium">
                <i class="fas fa-trophy text-yellow-400"></i>
                <span>Since 2010 • 500+ Awards</span>
            </div>

            <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-black text-white mb-6 leading-tight">
                <span class="text-gradient">Achievements</span> <br>
                <span class="text-4xl md:text-6xl opacity-80">That Define Excellence</span>
            </h1>

            <p class="text-xl text-gray-300 max-w-3xl mx-auto mb-10 leading-relaxed">
                Celebrating a decade of innovation, academic excellence, and transformative impact in education.
            </p>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#milestones" class="group inline-flex items-center gap-3 bg-white text-gray-900 hover:bg-gray-100 font-semibold py-4 px-8 rounded-xl transition-all duration-300 hover:scale-105 shadow-2xl">
                    Explore Milestones
                    <i class="fas fa-arrow-down group-hover:translate-y-1 transition-transform"></i>
                </a>
                <a href="#stats" class="group inline-flex items-center gap-3 glass border border-white/20 text-white hover:bg-white/10 font-semibold py-4 px-8 rounded-xl transition-all duration-300">
                    <i class="fas fa-chart-line"></i>
                    View Statistics
                </a>
            </div>
        </div>

        <!-- Achievement Stats Floating -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-20">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $heroStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="glass p-6 rounded-2xl text-center backdrop-blur-sm transform transition-all duration-500 hover:scale-105 animate-scale-in" style="animation-delay: <?php echo e($loop->index * 0.1); ?>s;">
                    <div class="<?php echo e($stat->color); ?> w-16 h-16 rounded-2xl flex items-center justify-center mx-auto mb-4 text-2xl">
                        <?php echo $stat->icon; ?>

                    </div>
                    <div class="text-3xl font-bold text-white mb-2"><?php echo e($stat->value); ?></div>
                    <div class="text-gray-300 text-sm"><?php echo e($stat->label); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <!-- Scroll indicator -->
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
        <div class="w-6 h-10 border-2 border-white/30 rounded-full flex justify-center">
            <div class="w-1 h-3 bg-white/50 rounded-full mt-2 animate-pulse"></div>
        </div>
    </div>
</section>


<section id="milestones" class="py-28 px-4 md:px-8 bg-gradient-to-br from-slate-50 via-white to-slate-100">
    <div class="max-w-6xl mx-auto">

        
        <div class="text-center mb-20 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-5">
                Our <span class="text-gradient">Journey</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Key moments that shaped our legacy of growth, impact, and innovation
            </p>
        </div>

        
        <div class="relative">

            
            <div class="hidden md:block absolute left-1/2 top-0 h-full w-[2px]
                        bg-gradient-to-b from-blue-200 via-purple-200 to-pink-200
                        transform -translate-x-1/2">
            </div>

            <?php
                use App\Models\Milestone;
                $milestones = Milestone::orderBy('order')->get();
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $milestone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div
                    class="relative mb-20 md:mb-28 flex flex-col md:flex-row
                           <?php echo e($index % 2 == 0 ? 'md:flex-row-reverse' : ''); ?>

                           animate-fade-up"
                    style="animation-delay: <?php echo e($index * 0.12); ?>s;"
                >

                    
                    <div class="hidden md:flex absolute left-1/2 top-10 transform -translate-x-1/2 z-10">
                        <span
                            class="w-5 h-5 rounded-full border-4 border-white shadow-lg
                                   <?php echo e($milestone->color); ?>">
                        </span>
                    </div>

                    
                    <div class="w-full md:w-1/2 px-0 md:px-10">
                        <div
                            class="relative bg-white/80 backdrop-blur-xl rounded-3xl
                                   shadow-lg hover:shadow-2xl transition-all duration-500
                                   hover:-translate-y-2 overflow-hidden group"
                        >

                            <div class="p-8 md:p-10">

                                
                                <div class="flex items-start gap-5 mb-6">
                                    <div
                                        class="w-14 h-14 rounded-2xl flex items-center justify-center
                                               text-2xl text-white shadow-md <?php echo e($milestone->color); ?>">
                                        <?php echo e($milestone->icon); ?>

                                    </div>

                                    <div>
                                        <span
                                            class="inline-block px-3 py-1 rounded-full text-sm font-semibold
                                                   <?php echo e($milestone->color); ?> bg-opacity-15 text-gray-900">
                                            <?php echo e($milestone->year); ?>

                                        </span>

                                        <h3 class="text-2xl font-bold text-gray-900 mt-3">
                                            <?php echo e($milestone->title); ?>

                                        </h3>
                                    </div>
                                </div>

                                
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    <?php echo e($milestone->description); ?>

                                </p>

                                
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($milestone->achievements): ?>
                                    <div class="flex flex-wrap gap-2">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $milestone->achievements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $achievement): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span
                                                class="px-4 py-1.5 rounded-full text-sm
                                                       bg-gray-100 text-gray-700
                                                       group-hover:bg-gray-200 transition">
                                                <?php echo e($achievement); ?>

                                            </span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </div>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>

                            
                            <div
                                class="absolute bottom-0 left-0 h-1 w-full
                                       <?php echo e(str_replace('bg-gradient-to-br', 'bg-gradient-to-r', $milestone->color)); ?>

                                       scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500">
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        </div>
    </div>
</section>




<section class="py-24 px-4 md:px-8 bg-gradient-to-b from-gray-900 to-slate-900 text-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-black mb-4">
                Prestigious <span class="text-gradient">Awards</span>
            </h2>
            <p class="text-xl text-gray-300 max-w-2xl mx-auto">
                Recognitions that validate our commitment to excellence
            </p>
        </div>

        
        <div class="flex flex-wrap justify-center gap-3 mb-12">
            <button class="filter-btn active px-5 py-2 rounded-full bg-white text-gray-900 font-semibold transition-all duration-300 hover:scale-105" data-filter="all">
                All Awards
            </button>
            <button class="filter-btn px-5 py-2 rounded-full glass border border-white/20 font-medium transition-all duration-300 hover:bg-white/10" data-filter="international">
                International
            </button>
            <button class="filter-btn px-5 py-2 rounded-full glass border border-white/20 font-medium transition-all duration-300 hover:bg-white/10" data-filter="education">
                Education
            </button>
            <button class="filter-btn px-5 py-2 rounded-full glass border border-white/20 font-medium transition-all duration-300 hover:bg-white/10" data-filter="innovation">
                Innovation
            </button>
            <button class="filter-btn px-5 py-2 rounded-full glass border border-white/20 font-medium transition-all duration-300 hover:bg-white/10" data-filter="research">
                Research
            </button>
        </div>

        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
                use App\Models\Award;
                $awards = Award::orderBy('order')->get();
            ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $awards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $award): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="award-card glass-dark p-8 rounded-2xl border border-white/10 card-hover transform transition-all duration-500 animate-scale-in"
                     data-category="<?php echo e($award->category); ?>"
                     style="animation-delay: <?php echo e($index * 0.05); ?>s;">

                    <div class="flex justify-between items-start mb-6">
                        <div class="w-14 h-14 rounded-xl bg-gradient-to-br <?php echo e($award->color); ?> flex items-center justify-center">
                            <i class="fas fa-<?php echo e($award->icon); ?> text-white text-xl"></i>
                        </div>
                        <span class="px-3 py-1 bg-white/10 rounded-full text-sm font-medium">
                            <?php echo e($award->year); ?>

                        </span>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-3">
                        <?php echo e($award->title); ?>

                    </h3>

                    <p class="text-gray-300 mb-6">
                        <?php echo e($award->description); ?>

                    </p>

                    <div class="flex items-center justify-between pt-6 border-t border-white/10">
                        <span class="text-gray-400 text-sm">Awarded by</span>
                        <span class="font-semibold">
                            <?php echo e($award->organization); ?>

                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>




<section id="stats" class="py-24 px-4 md:px-8 bg-gradient-to-b from-white to-slate-50">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-display font-black text-gray-900 mb-4">
                By The <span class="text-gradient">Numbers</span>
            </h2>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Quantifying our impact and growth over the years
            </p>
        </div>
        
      <!-- Progress Metrics -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">

    
    <div>
        <h3 class="text-2xl font-bold text-gray-900 mb-8">Performance Metrics</h3>
        
        <div class="space-y-8">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $performanceMetrics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $metric): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group">
                    <div class="flex justify-between mb-3">
                        <span class="font-semibold text-gray-800"><?php echo e($metric->label); ?></span>
                        <span class="font-bold text-gray-900"><?php echo e($metric->value); ?>%</span>
                    </div>
                    
                    <div class="h-3 bg-gray-200 rounded-full overflow-hidden">
                        <div class="h-full rounded-full transition-all duration-1000 ease-out" 
                             style="width: <?php echo e($metric->value); ?>%; background-color: <?php echo e($metric->color); ?>;"></div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
    
    
    <div>
        <h3 class="text-2xl font-bold text-gray-900 mb-8">Annual Growth</h3>
        
        <div class="grid grid-cols-2 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $growthStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white p-6 rounded-2xl shadow-lg card-hover">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                            <i class="fas fa-<?php echo e($stat->icon); ?> text-blue-600 text-lg"></i>
                        </div>
                        <div class="flex items-center gap-1 text-<?php echo e($stat->trend == 'up' ? 'green' : 'red'); ?>-600 font-semibold">
                            <i class="fas fa-arrow-<?php echo e($stat->trend); ?>"></i>
                            <span><?php echo e($stat->value); ?></span>
                        </div>
                    </div>
                    <div class="text-gray-600"><?php echo e($stat->label); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

</div>

        
        <!-- Impact Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            <?php
                $impactStats = [
                    ['value' => '250+', 'label' => 'Industry Partners', 'icon' => 'building', 'color' => 'bg-gradient-to-br from-blue-500 to-cyan-500'],
                    ['value' => '75+', 'label' => 'Countries Represented', 'icon' => 'flag', 'color' => 'bg-gradient-to-br from-emerald-500 to-green-500'],
                    ['value' => '500+', 'label' => 'Research Projects', 'icon' => 'microscope', 'color' => 'bg-gradient-to-br from-purple-500 to-pink-500'],
                    ['value' => '1M+', 'label' => 'Learning Hours', 'icon' => 'clock', 'color' => 'bg-gradient-to-br from-amber-500 to-orange-500'],
                ];
            ?>
            
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $impactStats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="text-center transform transition-all duration-500 hover:scale-105">
                    <div class="<?php echo e($stat['color']); ?> w-20 h-20 rounded-2xl flex items-center justify-center mx-auto mb-6 text-white text-2xl shadow-lg">
                        <i class="fas fa-<?php echo e($stat['icon']); ?>"></i>
                    </div>
                    <div class="text-4xl font-bold text-gray-900 mb-2"><?php echo e($stat['value']); ?></div>
                    <div class="text-gray-600 font-medium"><?php echo e($stat['label']); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>
</section>


<section class="py-28 px-4 md:px-8 bg-gradient-to-br from-slate-50 via-white to-slate-100">
    <div class="max-w-7xl mx-auto">

        
        <div class="text-center mb-20 animate-fade-up">
            <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 mb-5">
                Success <span class="text-gradient">Stories</span>
            </h2>
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Hear from our alumni who turned skills into real-world success
            </p>
        </div>

        
        <div class="splide" id="success-carousel">
            <div class="splide__track">
                <div class="splide__list">

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $successStories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $story): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="splide__slide px-2">
                            <div
                                class="relative bg-white/80 backdrop-blur-xl rounded-3xl shadow-xl
                                       hover:shadow-2xl transition-all duration-500 hover:-translate-y-2
                                       overflow-hidden group"
                            >

                                
                                <div class="p-8 md:p-10">

                                    
                                    <div class="flex items-center gap-5 mb-8">
                                        <div class="relative">
                                            <img
                                                src="<?php echo e($story->image); ?>"
                                                alt="<?php echo e($story->name); ?>"
                                                class="w-20 h-20 rounded-2xl object-cover border-4 border-white shadow-md"
                                            >
                                            <span class="absolute -bottom-2 -right-2 w-6 h-6 rounded-full
                                                         bg-gradient-to-r from-blue-500 to-purple-500 border-2 border-white">
                                            </span>
                                        </div>

                                        <div>
                                            <h3 class="text-xl font-bold text-gray-900">
                                                <?php echo e($story->name); ?>

                                            </h3>
                                            <p class="text-sm font-semibold text-blue-600">
                                                <?php echo e($story->role); ?>

                                            </p>
                                            <p class="text-xs text-gray-500">
                                                <?php echo e($story->year); ?>

                                            </p>
                                        </div>
                                    </div>

                                    
                                    <div class="relative mb-10">
                                        <svg class="absolute -top-4 -left-2 w-12 h-12 text-gray-200"
                                             fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M7.17 6A5.001 5.001 0 0 0 3 11v7h7v-7H7.17zM21 11v7h-7v-7h3.17A5.001 5.001 0 0 0 21 6z"/>
                                        </svg>

                                        <p class="text-gray-700 italic leading-relaxed pl-8 relative z-10">
                                            <?php echo e($story->quote); ?>

                                        </p>
                                    </div>

                                    
                                    <div class="flex items-center gap-3 text-sm font-semibold
                                                text-emerald-600 bg-emerald-50 px-4 py-2 rounded-xl w-fit">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9 2a1 1 0 00-1 1v1H5a1 1 0 00-1 1v3a5 5 0 004 4.9V15H6a1 1 0 000 2h8a1 1 0 000-2h-2v-2.1A5 5 0 0016 8V5a1 1 0 00-1-1h-3V3a1 1 0 00-1-1z"/>
                                        </svg>
                                        <span><?php echo e($story->achievement); ?></span>
                                    </div>
                                </div>

                                
                                <div
                                    class="absolute bottom-0 left-0 h-1 w-full
                                           bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500
                                           scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-500">
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                </div>
            </div>
        </div>

    </div>
</section>




<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.4/ScrollTrigger.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Splide Carousel
    new Splide('#success-carousel', {
        type: 'loop',
        perPage: 1,
        perMove: 1,
        gap: '2rem',
        autoplay: true,
        interval: 5000,
        pauseOnHover: true,
        breakpoints: {
            768: {
                perPage: 1,
            }
        }
    }).mount();
    
    // GSAP Animations
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
    
    gsap.utils.toArray('.animate-scale-in').forEach(element => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: 'top 85%',
            },
            scale: 0.9,
            opacity: 0,
            duration: 0.8,
            ease: 'back.out(1.7)'
        });
    });
    
    // Animate progress bars
    gsap.utils.toArray('.h-full.rounded-full').forEach(bar => {
        gsap.from(bar, {
            scrollTrigger: {
                trigger: bar.parentElement,
                start: 'top 90%',
            },
            width: '0%',
            duration: 1.5,
            ease: 'power2.out'
        });
    });
    
    // Awards filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const awardCards = document.querySelectorAll('.award-card');
    
    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active', 'bg-white', 'text-gray-900'));
            this.classList.add('active', 'bg-white', 'text-gray-900');
            
            const filter = this.dataset.filter;
            
            // Filter cards
            awardCards.forEach(card => {
                if (filter === 'all' || card.dataset.category === filter) {
                    gsap.to(card, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.4,
                        ease: 'power2.out'
                    });
                } else {
                    gsap.to(card, {
                        opacity: 0.3,
                        scale: 0.95,
                        duration: 0.4,
                        ease: 'power2.out'
                    });
                }
            });
        });
    });
    
    // Counter animation for stats
    const counters = document.querySelectorAll('.text-4xl.font-bold.text-gray-900');
    
    counters.forEach(counter => {
        const target = parseInt(counter.textContent.replace(/[^0-9]/g, ''));
        const suffix = counter.textContent.replace(/[0-9]/g, '');
        
        gsap.to(counter, {
            scrollTrigger: {
                trigger: counter,
                start: 'top 90%',
                once: true
            },
            innerText: target,
            duration: 2,
            ease: 'power2.out',
            snap: { innerText: 1 },
            onUpdate: function() {
                counter.textContent = Math.floor(counter.innerText) + suffix;
            }
        });
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
    
    // Hover effect for cards
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            gsap.to(this, {
                scale: 1.02,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
        
        card.addEventListener('mouseleave', function() {
            gsap.to(this, {
                scale: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });
    
    // Floating elements animation
    const floatElements = document.querySelectorAll('.animate-float');
    floatElements.forEach((el, index) => {
        gsap.to(el, {
            y: '15px',
            duration: 3,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut',
            delay: index * 0.5
        });
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/achieve.blade.php ENDPATH**/ ?>