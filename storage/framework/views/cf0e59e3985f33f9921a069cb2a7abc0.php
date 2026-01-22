<?php $__env->startSection('title', 'Home - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

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
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            25% {
                transform: translateX(-5px);
            }

            75% {
                transform: translateX(5px);
            }
        }

        @keyframes pulse-slow {

            0%,
            100% {
                opacity: 0.3;
            }

            50% {
                opacity: 0.6;
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up .8s ease-out forwards;
        }

        .animate-gradient-x {
            animation: gradient-x 3s ease infinite;
            background-size: 200% 200%;
        }

        .animate-shake {
            animation: shake .5s ease-in-out;
        }

        .animate-pulse-slow {
            animation: pulse-slow 4s ease-in-out infinite;
        }

        .font-cinzel {
            font-family: 'Cinzel', serif;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    
    <section
        class="relative py-20 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-blue-800 to-purple-900 min-h-screen flex items-center">

        <div class="absolute inset-0 bg-black/10 -z-10"></div>
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-600/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div
            class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse-slow delay-1000">
        </div>

        <div class="max-w-7xl mx-auto w-full relative z-10">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-12">

                
                <div class="lg:w-1/2 text-white">
                    <div class="mb-8" data-animate>
                        <h2 class="text-xl md:text-2xl text-blue-200">Create Your Future with</h2>

                        <h3
                            class="text-5xl md:text-7xl lg:text-8xl font-bold leading-tight mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent animate-gradient-x font-cinzel">
                            Caeda
                        </h3>

                        <div class="flex items-center gap-4 mb-8">
                            <div class="w-16 h-1 bg-yellow-400 animate-pulse"></div>
                            <span class="text-lg md:text-xl font-semibold text-red-500 animate-bounce">U.S</span>
                        </div>
                    </div>

                    
                    <div class="space-y-4 mb-8" data-animate>
                        <h3 class="text-2xl md:text-3xl font-bold mb-6 text-white font-cinzel">University Faculties</h3>

                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center gap-3 text-lg md:text-xl group cursor-pointer hover:translate-x-2 transition-all"
                                style="animation-delay: <?php echo e($index * 200); ?>ms">
                                <div class="w-2 h-2 bg-yellow-400 rounded-full group-hover:scale-150 transition"></div>
                                <span class="text-blue-100 group-hover:text-white"><?php echo e($faculty); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    
                    <div class="flex flex-col sm:flex-row gap-4 mt-12" data-animate>
                        <button
                            class="group bg-yellow-400 text-blue-900 hover:bg-yellow-300 font-bold py-4 px-8 rounded-xl shadow-lg hover:-translate-y-1 transition-all">
                            Apply Now
                        </button>

                        <button
                            class="group border-2 border-white text-white hover:bg-white/10 font-semibold py-4 px-8 rounded-xl backdrop-blur-sm transition-all">
                            Learn More
                        </button>
                    </div>
                </div>
                
                <div class="lg:w-1/2 relative">
                    <div class="relative overflow-hidden rounded-3xl shadow-2xl w-full border-4 border-white/20 backdrop-blur-sm"
                        style="min-height: 500px">

                        <div id="hero-carousel">
                            <?php $__currentLoopData = $heroSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <img src="<?php echo e($slide->image_url); ?>" alt="<?php echo e($slide->title); ?>"
                                    class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 <?php echo e($index === 0 ? 'opacity-100' : 'opacity-0'); ?>"
                                    onerror="this.src='/assets/defaultcourse.jpg'">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        
                        <button id="prev-slide"
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-lg hover:bg-white hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>

                        <button id="next-slide"
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 p-2 rounded-full shadow-lg hover:bg-white hover:scale-110 transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>

                        
                        <div id="hero-dots" class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2"></div>
                    </div>
                </div>



            </div>
        </div>
    </section>





    
    <section data-animate
        class="py-20 bg-gradient-to-r from-gray-50 to-blue-50 border-y border-gray-200/50 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center group transform transition-all duration-500 hover:scale-105"
                        style="animation-delay: <?php echo e($index * 150); ?>ms">
                        <div
                            class="text-4xl md:text-5xl font-bold mb-2 bg-gradient-to-r <?php echo e($stat['color']); ?> bg-clip-text text-transparent group-hover:scale-110 transition-transform duration-300">
                            <?php echo e($stat['number']); ?>

                        </div>
                        <div class="text-gray-600 font-medium group-hover:text-gray-800 transition-colors duration-300">
                            <?php echo e($stat['label']); ?>

                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <?php
        // Fetch the first active welcome section
        $welcome = \App\Models\WelcomeSection::where('is_active', true)->first();
    ?>

    <?php if($welcome): ?>
        <section data-animate class="py-20 px-4 md:px-8 bg-white/80 backdrop-blur-sm">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col lg:flex-row items-start gap-12">

                    
                    <div class="lg:w-1/2">
                        <div class="mb-8">
                            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 font-cinzel">
                                <?php echo $welcome->title; ?>

                            </h2>

                            <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                                <?php $__currentLoopData = $welcome->description; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <p
                                        class="text-gray-800 transform transition-all duration-500 hover:translate-x-2 delay-<?php echo e($index * 100); ?>">
                                        <?php echo $paragraph; ?>

                                    </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>

                        
                        <div
                            class="border-t-2 border-blue-200 pt-8 mt-8 transform transition-all duration-500 hover:shadow-lg rounded-xl p-6">
                            <div class="text-gray-900 space-y-2">
                                <p class="text-xl font-semibold text-blue-900">
                                    <?php echo e($welcome->signature_name); ?>,
                                </p>
                                <p class="text-lg text-gray-700"><?php echo e($welcome->signature_title); ?></p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="lg:w-1/2 relative">
                        <div class="relative transform transition-all duration-500 hover:scale-105">
                            <img src="<?php echo e($welcome->image_url); ?>" alt="Caeda Campus"
                                class="rounded-3xl shadow-2xl w-full h-96 object-cover border-4 border-white shadow-lg backdrop-blur-sm">

                            
                            <?php if($welcome->badges): ?>
                                <?php $__currentLoopData = $welcome->badges; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $badge): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="absolute <?php echo e($badge['position'] ?? '-top-4 -right-4'); ?> 
                                                                                                        bg-<?php echo e($badge['color'] ?? 'yellow'); ?>-400 text-<?php echo e($badge['text_color'] ?? 'blue'); ?>-900 
                                                                                                        px-4 py-2 rounded-xl font-bold shadow-lg animate-bounce">
                                        <?php echo e($badge['text']); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>

                        
                        <?php if($welcome->stats): ?>
                            <div class="grid grid-cols-2 gap-6 mt-12">
                                <?php $__currentLoopData = $welcome->stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div
                                        class="text-center p-6 bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl border border-blue-200 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
                                        <div class="text-3xl font-bold text-blue-900 mb-2"><?php echo e($stat['number']); ?></div>
                                        <div class="text-gray-700 font-medium"><?php echo e($stat['label']); ?></div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>



    
    <section data-animate class="py-20 px-4 md:px-8 bg-gradient-to-b from-gray-50 to-white/80 backdrop-blur-sm">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Popular <span class="text-red-600 animate-pulse">Programs</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Discover our most popular programs and start your learning journey today
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <?php $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl
                                                            transition-all duration-500 hover:-translate-y-2 group
                                                            flex flex-col h-full">

                        <div class="relative overflow-hidden">
                            <img src="<?php echo e($program->image_url); ?>" alt="<?php echo e($program->title); ?>"
                                class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-500">

                            <?php if($program->is_featured): ?>
                                <div
                                    class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    Featured
                                </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="p-6 flex flex-col h-full">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                                        <?php echo e($program->category); ?>

                                    </span>
                                    <h3
                                        class="text-xl font-bold text-gray-900 mt-2 group-hover:text-blue-600 transition-colors duration-300">
                                        <?php echo e($program->title); ?>

                                    </h3>
                                </div>
                                <div class="text-2xl font-bold text-green-600">
                                    $<?php echo e(number_format($program->tuition ?? 0, 2)); ?>

                                </div>
                            </div>

                            
                            <p class="text-gray-600 mb-4 line-clamp-2 min-h-[3rem]">
                                <?php echo e($program->short_description ?? Str::limit($program->description, 120)); ?>

                            </p>

                            
                            <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                                <span class="flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <?php echo e($program->rating); ?>

                                </span>
                                <span><?php echo e(number_format($program->students ?? 0)); ?> students</span>
                            </div>

                            
                            <div class="flex items-center justify-between mb-6">
                                <span class="text-gray-700 font-medium"><?php echo e($program->duration ?? ''); ?></span>
                                <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-sm">
                                    <?php echo e($program->level ?? ''); ?>

                                </span>
                            </div>

                            
                            <div class="mt-auto">
                                <a href="<?php echo e(route('programs')); ?>" class="w-full inline-block text-center
                                                                      bg-gradient-to-r from-blue-600 to-purple-600
                                                                      hover:from-blue-700 hover:to-purple-700
                                                                      text-white font-semibold py-3 rounded-xl
                                                                      transition-all duration-300
                                                                      transform group-hover:-translate-y-1">
                                    View Program
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section data-animate class="py-20 bg-gradient-to-b from-white to-blue-50/30 backdrop-blur-sm px-4 md:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Why Choose <span class="text-red-600 animate-pulse">Us</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    We provide the best learning experience with cutting-edge technology and expert instructors
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="group bg-white/80 backdrop-blur-sm p-8 rounded-3xl shadow-lg text-center hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-gray-100/50"
                        style="animation-delay: <?php echo e($index * 200); ?>ms">
                        <div
                            class="w-20 h-20 bg-gradient-to-br <?php echo e($feature->color); ?> rounded-3xl flex items-center justify-center mx-auto mb-6 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="<?php echo e($feature->icon); ?>">
                                </path>
                            </svg>
                        </div>
                        <h3
                            class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-gray-800 transition-colors duration-300">
                            <?php echo e($feature->title); ?>

                        </h3>
                        <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">
                            <?php echo e($feature->description); ?>

                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>





    
    <section data-animate class="py-20 px-4 md:px-8 bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Our <span class="text-blue-900 animate-pulse">Instructors</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Hear from our experienced instructors about their teaching journey
                </p>
            </div>

            <div class="relative max-w-4xl mx-auto" style="min-height: 300px">
                <?php
                    $instructors = [
                        [
                            'id' => 1,
                            'name' => 'Sarah Johnson',
                            'role' => 'Web Developer',
                            'bio' => 'The courses completely transformed my career. I went from beginner to landing my dream job in just 6 months!',
                            'image_url' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'Web Development',
                            'contact' => 'sarah.johnson@example.com',
                            'rating' => 5
                        ],
                        [
                            'id' => 2,
                            'name' => 'Michael Chen',
                            'role' => 'Data Scientist',
                            'bio' => 'The instructors are experts in their fields and the curriculum is always up-to-date with industry trends.',
                            'image_url' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'Data Science',
                            'rating' => 4
                        ],
                        [
                            'id' => 3,
                            'name' => 'Emma Rodriguez',
                            'role' => 'UI/UX Designer',
                            'bio' => 'The project-based learning approach helped me build a portfolio that impressed employers.',
                            'image_url' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                            'course' => 'UI/UX Design',
                            'rating' => 5
                        ]
                    ];
                ?>

                <?php $__currentLoopData = $instructors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $instructor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div data-testimonial
                        class="bg-white/90 backdrop-blur-sm p-8 md:p-10 rounded-3xl shadow-lg transition-all duration-500 absolute inset-0 <?php echo e($index === 0 ? 'opacity-100 z-10 transform translate-x-0 scale-100' : 'opacity-0 z-0 transform translate-x-4 scale-95'); ?>">
                        <div class="flex flex-col md:flex-row items-start gap-6 mb-6">
                            <div class="relative">
                                <img src="<?php echo e($instructor['image_url']); ?>" alt="<?php echo e($instructor['name']); ?>"
                                    class="w-20 h-20 rounded-2xl object-cover border-4 border-blue-100 transform transition-all duration-500 hover:scale-110">
                                <div
                                    class="absolute -bottom-2 -right-2 w-6 h-6 bg-green-400 rounded-full border-2 border-white">
                                </div>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-2xl font-bold text-gray-900"><?php echo e($instructor['name']); ?></h3>
                                <p class="text-gray-600 font-medium"><?php echo e($instructor['role']); ?></p>
                                <p class="text-sm text-blue-600 font-semibold">Course: <?php echo e($instructor['course']); ?></p>
                                <div class="flex mt-2">
                                    <?php for($i = 0; $i < 5; $i++): ?>
                                        <span
                                            class="text-xl transform transition-all duration-300 <?php echo e($i < $instructor['rating'] ? 'text-yellow-400 hover:scale-125' : 'text-gray-300'); ?>">
                                            ★
                                        </span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <p
                            class="text-lg text-gray-700 italic leading-relaxed transform transition-all duration-500 hover:translate-x-2">
                            "<?php echo e($instructor['bio']); ?>"
                        </p>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="flex justify-center mt-8 pt-8">
                <div id="testimonial-dots" class="flex"></div>
            </div>
        </div>
    </section>

    

    
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Get In <span class="text-blue-900 animate-pulse">Touch</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Have questions? We'd love to hear from you. Send us a message and we'll respond as soon as possible.
                </p>
            </div>

            
            <div id="form-submitted"
                class="hidden bg-gradient-to-br from-green-50 to-teal-50 border border-green-200 text-green-800 px-6 py-8 rounded-3xl text-center shadow-lg transform transition-all duration-500 hover:scale-105">
                <div class="text-4xl mb-4 animate-bounce">🎉</div>
                <p class="font-bold text-xl mb-2">Thank you for your message!</p>
                <p class="text-lg">We'll get back to you within 24 hours.</p>
            </div>

            

            
            <section
                class="w-full relative overflow-hidden py-32 bg-gradient-to-r from-blue-900 via-purple-900 to-indigo-900 text-white">
                
                <div class="absolute inset-0 bg-black/20"></div>

                
                <div class="absolute top-0 -left-16 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl animate-pulse-slow">
                </div>
                <div
                    class="absolute bottom-0 -right-16 w-96 h-96 bg-purple-600/30 rounded-full blur-3xl animate-pulse-slow delay-1000">
                </div>

                
                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    
                    <h2
                        class="text-4xl sm:text-5xl lg:text-6xl font-extrabold mb-6 bg-gradient-to-r from-white to-blue-100 bg-clip-text text-transparent font-cinzel">
                        Ready to Start Your Learning Journey?
                    </h2>

                    
                    <p class="text-lg sm:text-xl md:text-2xl mb-10 max-w-3xl mx-auto text-blue-100/90">
                        Join thousands of students who have transformed their careers with our expert-led courses.
                    </p>

                    
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-5">
                        <button
                            class="group relative bg-yellow-400 text-blue-900 font-bold py-4 px-10 rounded-xl shadow-xl hover:bg-yellow-300 hover:-translate-y-1 transform transition-all duration-300">
                            Get Started Now
                            <span
                                class="absolute inset-0 rounded-xl border-2 border-yellow-300 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        </button>

                        <button
                            class="group relative border-2 border-white text-white font-semibold py-4 px-10 rounded-xl backdrop-blur-sm hover:bg-white/20 transition-all duration-300">
                            Contact Us
                            <span
                                class="absolute inset-0 rounded-xl bg-white/10 opacity-0 group-hover:opacity-100 transition-all duration-300"></span>
                        </button>
                    </div>
                </div>
            </section>


<?php $__env->stopSection(); ?>

        <?php $__env->startSection('extra-js'); ?>
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    /* -------------------- Hero Carousel -------------------- */
                    let currentSlide = 0;
                    const heroCarousel = document.getElementById('hero-carousel');
                    const slides = heroCarousel.querySelectorAll('img');
                    const dotsContainer = document.getElementById('hero-dots');

                    // Create dots
                    slides.forEach((_, i) => {
                        const dot = document.createElement('button');
                        dot.className = "w-3 h-3 rounded-full transition-all duration-300 " + (i === 0 ? "bg-white shadow-lg scale-125" : "bg-white/50 hover:bg-white/75");
                        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
                        dot.onclick = () => {
                            currentSlide = i;
                            updateHeroCarousel();
                        };
                        dotsContainer.appendChild(dot);
                    });

                    function updateHeroCarousel() {
                        slides.forEach((img, i) => {
                            img.classList.toggle('opacity-100', i === currentSlide);
                            img.classList.toggle('opacity-0', i !== currentSlide);
                        });

                        dotsContainer.querySelectorAll('button').forEach((dot, i) => {
                            if (i === currentSlide) {
                                dot.className = "w-3 h-3 rounded-full transition-all duration-300 bg-white shadow-lg scale-125";
                            } else {
                                dot.className = "w-3 h-3 rounded-full transition-all duration-300 bg-white/50 hover:bg-white/75";
                            }
                        });
                    }

                    // Auto rotate
                    const heroInterval = setInterval(() => {
                        currentSlide = (currentSlide + 1) % slides.length;
                        updateHeroCarousel();
                    }, 5000);

                    // Manual controls
                    document.getElementById('prev-slide').onclick = () => {
                        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                        updateHeroCarousel();
                        clearInterval(heroInterval);
                    };

                    document.getElementById('next-slide').onclick = () => {
                        currentSlide = (currentSlide + 1) % slides.length;
                        updateHeroCarousel();
                        clearInterval(heroInterval);
                    };

                    /* -------------------- Testimonial Carousel -------------------- */
                    let currentTestimonial = 0;
                    const testimonials = document.querySelectorAll('[data-testimonial]');
                    const testimonialDots = document.getElementById('testimonial-dots');

                    if (testimonials.length > 0 && testimonialDots) {
                        // Create dots for testimonials
                        testimonials.forEach((_, i) => {
                            const dot = document.createElement('button');
                            dot.className = `w-4 h-4 rounded-full mx-2 transition-all duration-300 transform hover:scale-125 ${i === 0 ? 'bg-blue-900 scale-125 shadow-lg' : 'bg-gray-300 hover:bg-gray-400'}`;
                            dot.setAttribute('aria-label', `View testimonial ${i + 1}`);
                            dot.onclick = () => {
                                currentTestimonial = i;
                                updateTestimonials();
                                clearInterval(testimonialInterval);
                            };
                            testimonialDots.appendChild(dot);
                        });

                        function updateTestimonials() {
                            testimonials.forEach((testimonial, i) => {
                                if (i === currentTestimonial) {
                                    testimonial.classList.remove('opacity-0', 'z-0', 'translate-x-4', 'scale-95');
                                    testimonial.classList.add('opacity-100', 'z-10', 'translate-x-0', 'scale-100');
                                } else {
                                    testimonial.classList.remove('opacity-100', 'z-10', 'translate-x-0', 'scale-100');
                                    testimonial.classList.add('opacity-0', 'z-0', 'translate-x-4', 'scale-95');
                                }
                            });

                            testimonialDots.querySelectorAll('button').forEach((dot, i) => {
                                if (i === currentTestimonial) {
                                    dot.classList.add('bg-blue-900', 'scale-125', 'shadow-lg');
                                    dot.classList.remove('bg-gray-300', 'hover:bg-gray-400');
                                } else {
                                    dot.classList.remove('bg-blue-900', 'scale-125', 'shadow-lg');
                                    dot.classList.add('bg-gray-300', 'hover:bg-gray-400');
                                }
                            });
                        }

                        // Auto rotate testimonials
                        const testimonialInterval = setInterval(() => {
                            currentTestimonial = (currentTestimonial + 1) % testimonials.length;
                            updateTestimonials();
                        }, 5000);
                    }

                    /* -------------------- Intersection Observer -------------------- */
                    const observer = new IntersectionObserver(
                        (entries) => {
                            entries.forEach((entry) => {
                                if (entry.isIntersecting) {
                                    entry.target.classList.add('animate-fade-in-up');
                                }
                            });
                        }, {
                        threshold: 0.1
                    }
                    );

                    document.querySelectorAll('[data-animate]').forEach((el) => {
                        observer.observe(el);
                    });

                    /* -------------------- Contact Form -------------------- */
                    const contactForm = document.getElementById('contact-form');
                    const formError = document.getElementById('form-error');
                    const formSubmitted = document.getElementById('form-submitted');

                    if (contactForm) {
                        contactForm.addEventListener('submit', async function (e) {
                            e.preventDefault();

                            const formData = new FormData(this);
                            const name = formData.get('name');
                            const email = formData.get('email');
                            const message = formData.get('message');

                            // Validation
                            if (!name || !email || !message) {
                                showError('Please fill in all fields');
                                return;
                            }

                            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                            if (!emailRegex.test(email)) {
                                showError('Please enter a valid email address');
                                return;
                            }

                            try {
                                // Simulate API call
                                await new Promise(resolve => setTimeout(resolve, 1500));

                                // Show success
                                contactForm.style.display = 'none';
                                formSubmitted.style.display = 'block';

                                // Reset form
                                contactForm.reset();

                            } catch (error) {
                                showError('Failed to submit form. Please try again.');
                            }
                        });
                    }

                    function showError(message) {
                        if (formError) {
                            formError.textContent = message;
                            formError.classList.remove('hidden');
                            formError.classList.add('animate-shake');

                            setTimeout(() => {
                                formError.classList.remove('animate-shake');
                            }, 500);
                        }
                    }
                });
            </script>
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/home.blade.php ENDPATH**/ ?>