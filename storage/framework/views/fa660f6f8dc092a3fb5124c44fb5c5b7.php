

<?php $__env->startSection('title', ($program->title ?? 'Program Detail') . ' - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradient-x {

            0%,
            100% {
                background-position: 0% 50%
            }

            50% {
                background-position: 100% 50%
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up .8s ease-out forwards;
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
            background-size: 200% 200%;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .hero-gradient {
            background: linear-gradient(135deg, #1e3a8a 0%, #4c1d95 50%, #312e81 100%);
        }

        .level-beginner {
            background: linear-gradient(135deg, #10b981, #34d399);
        }

        .level-intermediate {
            background: linear-gradient(135deg, #3b82f6, #60a5fa);
        }

        .level-advanced {
            background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        }

        .level-expert {
            background: linear-gradient(135deg, #ef4444, #f87171);
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-gray-50 min-h-screen pb-20">
        
        <section class="hero-gradient text-white py-20 px-4 md:px-8 relative overflow-hidden">
            <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
            </div>
            <div class="max-w-7xl mx-auto relative z-10">
                <nav class="flex mb-8 text-sm font-medium text-blue-200" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="<?php echo e(route('home')); ?>" class="hover:text-white transition-colors">Home</a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-[10px] mx-2"></i>
                                <a href="<?php echo e(route('programs')); ?>" class="hover:text-white transition-colors">Programs</a>
                            </div>
                        </li>
                        <li aria-current="page">
                            <div class="flex items-center">
                                <i class="fas fa-chevron-right text-[10px] mx-2"></i>
                                <span class="text-white"><?php echo e($program->title); ?></span>
                            </div>
                        </li>
                    </ol>
                </nav>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <div class="animate-fade-in-up">
                        <div
                            class="inline-block px-4 py-1.5 rounded-full bg-blue-500/30 border border-blue-400/50 text-blue-100 text-xs font-bold uppercase tracking-wider mb-6">
                            <?php echo e($program->category); ?>

                        </div>
                        <h1 class="text-4xl md:text-6xl font-bold font-cinzel mb-6 leading-tight">
                            <?php echo e($program->title); ?>

                        </h1>
                        <p class="text-xl text-blue-100 mb-8 leading-relaxed max-w-2xl">
                            <?php echo e($program->short_description ?? 'Unlock your potential with this comprehensive academic program designed for excellence.'); ?>

                        </p>

                        <div class="flex flex-wrap gap-6 mb-10">
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mr-4">
                                    <i class="far fa-clock text-xl text-yellow-400"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-blue-200 uppercase font-bold">Duration</div>
                                    <div class="font-bold text-lg"><?php echo e($program->duration ?? 'Standard'); ?></div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mr-4">
                                    <i class="fas fa-signal text-xl text-yellow-400"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-blue-200 uppercase font-bold">Level</div>
                                    <div class="font-bold text-lg"><?php echo e(ucfirst($program->level ?? 'Beginner')); ?></div>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-xl bg-white/10 flex items-center justify-center mr-4">
                                    <i class="fas fa-graduation-cap text-xl text-yellow-400"></i>
                                </div>
                                <div>
                                    <div class="text-xs text-blue-200 uppercase font-bold">Students</div>
                                    <div class="font-bold text-lg"><?php echo e(number_format($program->students ?? 0)); ?>+</div>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <button
                                class="px-8 py-4 bg-yellow-400 text-blue-900 font-bold rounded-xl hover:bg-yellow-300 transition-all transform hover:-translate-y-1 shadow-2xl flex items-center">
                                Apply Now <i class="fas fa-paper-plane ml-2"></i>
                            </button>
                            <button
                                class="px-8 py-4 bg-white/10 border border-white/20 text-white font-bold rounded-xl hover:bg-white/20 transition-all">
                                Download Syllabus
                            </button>
                        </div>
                    </div>

                    <div class="animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl border-4 border-white/10 group">
                            <img src="<?php echo e($program->image_url); ?>" alt="<?php echo e($program->title); ?>"
                                class="w-full h-auto object-cover transform scale-100 group-hover:scale-110 transition-transform duration-700">
                            <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="max-w-7xl mx-auto px-4 md:px-8 -mt-10 relative z-20">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                
                <div class="lg:col-span-2 space-y-10">
                    <div class="glass-card rounded-3xl p-8 md:p-12 shadow-xl">
                        <h2 class="text-3xl font-bold text-gray-900 mb-8 font-cinzel border-b border-gray-100 pb-4">Program
                            Overview</h2>
                        <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed">
                            <?php echo nl2br(e($program->description ?? 'No detailed description provided for this program.')); ?>

                        </div>

                        <div class="mt-12 grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="p-6 bg-blue-50 rounded-2xl border border-blue-100">
                                <h4 class="font-bold text-blue-900 mb-3 flex items-center">
                                    <i class="fas fa-check-circle mr-2 text-blue-600"></i> What You'll Learn
                                </h4>
                                <p class="text-sm text-blue-800 leading-relaxed">Gain industry-standard expertise and
                                    practical knowledge tailored for modern professional success.</p>
                            </div>
                            <div class="p-6 bg-purple-50 rounded-2xl border border-purple-100">
                                <h4 class="font-bold text-purple-900 mb-3 flex items-center">
                                    <i class="fas fa-briefcase mr-2 text-purple-600"></i> Career Opportunities
                                </h4>
                                <p class="text-sm text-purple-800 leading-relaxed">This course prepares you for high-impact
                                    roles in various sectors globally.</p>
                            </div>
                        </div>
                    </div>

                    <?php if($program->metadata && isset($program->metadata['curriculum'])): ?>
                        <div class="glass-card rounded-3xl p-8 md:p-12 shadow-xl">
                            <h2 class="text-3xl font-bold text-gray-900 mb-8 font-cinzel border-b border-gray-100 pb-4">
                                Curriculum</h2>
                            <div class="space-y-4">
                                <?php $__currentLoopData = $program->metadata['curriculum']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="border border-gray-200 rounded-2xl overflow-hidden">
                                        <div
                                            class="bg-gray-50 px-6 py-4 flex justify-between items-center cursor-pointer hover:bg-gray-100 transition-colors">
                                            <span class="font-bold text-gray-800">Module <?php echo e($index + 1); ?>:
                                                <?php echo e($module['title'] ?? 'Module Title'); ?></span>
                                            <i class="fas fa-plus text-gray-400"></i>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                
                <div class="space-y-8">
                    <div class="glass-card rounded-3xl p-8 shadow-xl sticky top-28 border-2 border-indigo-100">
                        <div class="mb-6">
                            <?php
                                $finalPrice = $program->discount ?? $program->tuition ?? 0;
                                $hasDiscount = !empty($program->discount) && $program->discount < $program->tuition;
                            ?>

                            <div class="text-sm text-gray-500 uppercase font-bold tracking-widest mb-1">Pricing Plan</div>
                            <div class="flex items-baseline gap-3">
                                <span class="text-5xl font-extrabold text-blue-900">$<?php echo e(number_format($finalPrice)); ?></span>
                                <?php if($hasDiscount): ?>
                                    <span
                                        class="text-xl text-gray-400 line-through">$<?php echo e(number_format($program->tuition)); ?></span>
                                <?php endif; ?>
                            </div>
                            <?php if($hasDiscount): ?>
                                <div class="mt-2 text-green-600 font-bold flex items-center text-sm">
                                    <i class="fas fa-tag mr-1"></i> Save
                                    $<?php echo e(number_format(($program->tuition ?? 0) - $finalPrice)); ?>

                                    (<?php echo e(round((($program->tuition - $program->discount) / $program->tuition) * 100)); ?>% off)
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="space-y-4 mb-8">
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-50">
                                <span class="text-gray-500 font-medium">Mode</span>
                                <span class="text-gray-900 font-bold uppercase"><?php echo e($program->mode ?? 'Online'); ?></span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-50">
                                <span class="text-gray-500 font-medium">Application Deadline</span>
                                <span class="text-gray-900 font-bold">
                                    <?php echo e($program->application_deadline ? \Carbon\Carbon::parse($program->application_deadline)->format('M d, Y') : 'Open'); ?>

                                </span>
                            </div>
                            <div class="flex items-center justify-between text-sm py-3 border-b border-gray-50">
                                <span class="text-gray-500 font-medium">Start Date</span>
                                <span class="text-gray-900 font-bold">
                                    <?php echo e($program->start_date ? \Carbon\Carbon::parse($program->start_date)->format('M d, Y') : 'TBD'); ?>

                                </span>
                            </div>
                        </div>

                        <button
                            class="w-full py-5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold rounded-2xl shadow-lg hover:shadow-indigo-200 transition-all transform hover:-translate-y-1 mb-4">
                            Secure Admission Now
                        </button>
                        <p class="text-center text-xs text-gray-400">100% Secure Transaction & Academic Guarantee</p>
                    </div>

                    
                    <div class="bg-indigo-900 rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                        <div class="absolute -right-4 -bottom-4 opacity-10 w-32 h-32">
                            <i class="fas fa-award text-9xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-4">Award-Winning Program</h3>
                        <p class="text-indigo-200 text-sm leading-relaxed">This course has been recognized globally for its
                            excellence in professional and academic development.</p>
                    </div>
                </div>
            </div>
        </section>

        
        <?php if(isset($relatedPrograms) && $relatedPrograms->count() > 0): ?>
            <section class="max-w-7xl mx-auto px-4 md:px-8 mt-20">
                <h2 class="text-3xl font-bold text-gray-900 mb-10 font-cinzel">More Programs in <span
                        class="text-blue-600"><?php echo e($program->category); ?></span></h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <?php $__currentLoopData = $relatedPrograms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div
                            class="bg-white rounded-2xl shadow-lg overflow-hidden flex flex-col hover:shadow-2xl transition-all duration-300 group">
                            <div class="h-48 overflow-hidden relative">
                                <img src="<?php echo e($rel->image_url); ?>" alt="<?php echo e($rel->title); ?>"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            </div>
                            <div class="p-6">
                                <h4 class="font-bold text-xl mb-3 line-clamp-1"><?php echo e($rel->title); ?></h4>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2">
                                    <?php echo e($rel->short_description ?? Str::limit($rel->description, 80)); ?></p>
                                <a href="<?php echo e(route('programs.show', $rel->slug)); ?>"
                                    class="text-blue-600 font-bold items-center inline-flex hover:text-blue-800 transition-colors">
                                    Explore Details <i class="fas fa-arrow-right ml-2 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </section>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/programs-show.blade.php ENDPATH**/ ?>