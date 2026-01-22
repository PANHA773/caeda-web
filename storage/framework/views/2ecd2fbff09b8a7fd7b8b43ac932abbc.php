

<?php $__env->startSection('title', $aboutContent->page_title . ' - CAEDA'); ?>

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

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .5;
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up .8s ease-out forwards;
    }

    .animate-gradient-x {
        animation: gradient-x 3s ease infinite;
        background-size: 200% 200%;
    }

    .animate-pulse {
        animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
    }

    .font-cinzel {
        font-family: 'Cinzel', serif;
    }

    .prose p {
        margin-bottom: 1rem;
    }

    .prose p:last-child {
        margin-bottom: 0;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        
        <div data-animate class="text-center mb-16 transform transition-all duration-1000">
            <div class="inline-flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 mb-6 shadow-lg border border-gray-200/50">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700">CAMBODIA-ASEAN EDUCATIONAL DEVELOPMENT ASSOCIATION</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent animate-gradient-x font-cinzel">
                <?php echo e($aboutContent->header_title ?? 'About CAEDA'); ?>

            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse"></div>
            <p class="text-gray-600 text-lg md:text-xl max-w-4xl mx-auto leading-relaxed bg-white/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-200/50 shadow-sm">
                <?php echo e($aboutContent->page_description ?? ''); ?>

            </p>
        </div>

        
        <div class="mb-16 space-y-8">
            <div data-animate class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 md:p-10 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    Our Foundation
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    <?php $__currentLoopData = $aboutContent->foundation_content ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($paragraph['is_special'] ?? false): ?>
                    <p class="font-medium text-gray-900 transform transition-all duration-500 hover:scale-105 bg-yellow-50 p-4 rounded-xl border border-yellow-200">
                        <?php echo e($paragraph['content']); ?>

                    </p>
                    <?php else: ?>
                    <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900"
                        style="animation-delay: <?php echo e($index * 75); ?>ms">
                        <?php echo e($paragraph['content']); ?>

                    </p>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div data-animate class="group bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm rounded-3xl p-8 md:p-10 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    CAEDA Today
                </h2>
                <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6">
                    <?php $__currentLoopData = $aboutContent->today_content ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900"
                        style="animation-delay: <?php echo e($index * 75); ?>ms">
                        <?php echo e($paragraph); ?>

                    </p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        
        <div data-animate class="grid md:grid-cols-2 gap-8 mb-16">
            <?php
            $sections = [
            ['title'=>'Our Mission','content'=>$aboutContent->mission ?? '','icon'=>'<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"></svg>','color_from'=>'blue-500','color_to'=>'blue-600'],
            ['title'=>'Our Vision','content'=>$aboutContent->vision ?? '','icon'=>'<svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"></svg>','color_from'=>'purple-500','color_to'=>'pink-600'],
            ];
            ?>
            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                <div class="flex items-center mb-6">
                    <div class="w-14 h-14 bg-gradient-to-br from-<?php echo e($section['color_from']); ?> to-<?php echo e($section['color_to']); ?> rounded-2xl flex items-center justify-center mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                        <?php echo $section['icon']; ?>

                    </div>
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                        <?php echo e($section['title']); ?>

                    </h3>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg transform transition-all duration-500 group-hover:translate-x-2 group-hover:text-gray-900">
                    <?php echo e($section['content']); ?>

                </p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <div data-animate class="bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-indigo-900 bg-clip-text text-transparent font-cinzel">
                    University Faculties
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full animate-pulse"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-6">
                <?php $__currentLoopData = $faculties ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-gray-200/50 hover:shadow-lg transition-all duration-500 hover:-translate-y-2 hover:border-blue-300/50 cursor-pointer" style="animation-delay: <?php echo e($index*150); ?>ms">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center text-white font-bold text-lg transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg flex-shrink-0">
                            <?php echo e($index+1); ?>

                        </div>
                        <p class="text-gray-700 font-medium text-lg group-hover:text-gray-900 transition-colors duration-300">
                            <?php echo e($faculty->name); ?>

                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div data-animate class="bg-gradient-to-br from-gray-800 via-gray-900 to-blue-900 rounded-3xl p-8 md:p-10 text-white shadow-2xl hover:shadow-3xl transition-all duration-500 hover:-translate-y-2 relative overflow-hidden">
            
            <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -translate-x-1/3 translate-y-1/3"></div>

            <div class="relative z-10 font-english">
                <div class="text-center mb-10">
                    <h2 class="text-2xl md:text-3xl font-bold mb-4 bg-gradient-to-r from-blue-300 to-purple-300 bg-clip-text text-transparent">
                        Accreditations & Recognition
                    </h2>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-blue-400 to-purple-400 mx-auto rounded-full animate-pulse"></div>
                </div>

                <p class="text-gray-300 text-center mb-10 text-lg max-w-3xl mx-auto font-english">
                    PSBU's commitment to academic excellence is reflected in our prestigious accreditations and international recognitions.
                </p>

                <div class="grid md:grid-cols-2 gap-8">
                    
                    <div class="transform transition-all duration-500 hover:-translate-y-1">
                        <h3 class="text-xl md:text-2xl font-bold mb-6 text-blue-300 bg-blue-900/30 p-4 rounded-2xl text-center font-english">
                            International Accreditations
                        </h3>
                        <ul class="space-y-3 text-gray-300">
                            <?php $__currentLoopData = $accreditations->where('type', 'international'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-center space-x-3 group">
                                <div class="w-2 h-2 bg-blue-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                                <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                    <?php echo e($item->title); ?>

                                </span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>

                    
                    <div class="transform transition-all duration-500 hover:-translate-y-1">
                        <h3 class="text-xl md:text-2xl font-bold mb-6 text-purple-300 bg-purple-900/30 p-4 rounded-2xl text-center font-english">
                            Memberships
                        </h3>
                        <ul class="space-y-3 text-gray-300">
                            <?php $__currentLoopData = $accreditations->where('type', 'membership'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="flex items-center space-x-3 group">
                                <div class="w-2 h-2 bg-purple-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                                <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                    <?php echo e($item->title); ?>

                                </span>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        
        <div data-animate class="mb-20">

            
            <div class="text-center mb-14">


                <h2 class="mt-8 text-3xl md:text-4xl lg:text-5xl font-bold
           bg-gradient-to-r from-blue-900 via-indigo-900 to-purple-900
           bg-clip-text text-transparent mb-5 tracking-wide">
                    Cambodia-ASEAN Educational Development Association
                </h2>


                <div class="w-28 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 
                    mx-auto rounded-full animate-pulse"></div>

                <p class="mt-6 text-gray-600 max-w-3xl mx-auto text-lg leading-relaxed">
                    Our leadership team is committed to advancing education, regional cooperation,
                    and institutional excellence across ASEAN.
                </p>
            </div>

            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
                <?php $__currentLoopData = $leaderTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <div class="group relative bg-white/85 backdrop-blur-md border border-gray-200/60 
                    rounded-3xl p-8 shadow-lg hover:shadow-2xl 
                    transition-all duration-500 hover:-translate-y-3"
                    style="animation-delay: <?php echo e($index * 120); ?>ms">

                    
                    <div class="absolute inset-0 rounded-3xl bg-gradient-to-br 
                        from-blue-500 to-purple-600 opacity-0 
                        group-hover:opacity-5 transition duration-500"></div>

                    <div class="relative flex flex-col items-center text-center gap-5">

                        
                        <div class="relative w-36 h-36 rounded-2xl overflow-hidden 
                            shadow-xl ring-4 ring-white/80 
                            transform transition-all duration-500 
                            group-hover:scale-110 group-hover:-rotate-3">

                            <?php
                            $imagePath = $leader->image && file_exists(public_path('storage/' . $leader->image))
                            ? asset('storage/' . $leader->image)
                            : null;

                            $initials = implode('', array_map(
                            fn($n) => strtoupper(substr($n, 0, 1)),
                            explode(' ', $leader->name)
                            ));
                            ?>

                            <?php if($imagePath): ?>
                            <img src="<?php echo e($imagePath); ?>"
                                alt="<?php echo e($leader->name); ?>"
                                loading="lazy"
                                class="w-full h-full object-cover">
                            <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center 
                                    text-white text-3xl font-bold 
                                    bg-gradient-to-br <?php echo e($leader->gradient ?? 'from-blue-500 to-indigo-600'); ?>">
                                <?php echo e($initials); ?>

                            </div>
                            <?php endif; ?>
                        </div>

                        
                        <div class="space-y-1">
                            <h3 class="text-xl font-semibold text-gray-900 tracking-wide">
                                <?php echo e($leader->name); ?>

                            </h3>

                            <p class="text-sm font-medium text-gray-600 uppercase tracking-wide">
                                <?php echo e($leader->position); ?>

                            </p>
                        </div>

                        
                        <div class="w-16 h-1 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full opacity-70"></div>
                    </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>



        
        <div data-animate class="bg-white/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 border border-gray-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-cinzel">
                    Our Core Values
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php $__currentLoopData = $coreValues ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-gradient-to-br from-white to-gray-50 rounded-2xl p-6 border border-gray-200/50 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 cursor-pointer relative" style="animation-delay: <?php echo e($index*100); ?>ms">
                    <div class="text-center mb-4">
                        <div class="text-4xl mb-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 inline-block"><?php echo e($value->icon); ?></div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300"><?php echo e($value->title); ?></h3>
                        <p class="text-gray-600 text-sm leading-relaxed group-hover:text-gray-700 transition-colors duration-300"><?php echo e($value->description); ?></p>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-br <?php echo e($value->color_class ?? 'from-blue-500 to-cyan-500'); ?> opacity-0 group-hover:opacity-5 rounded-2xl transition-opacity duration-500 -z-10"></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) entry.target.classList.add('animate-fade-in-up');
            });
        }, {
            threshold: 0.1
        });
        document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));

        // Initialize delayed animations
        document.querySelectorAll('[style*="animation-delay"]').forEach(el => {
            const delay = parseInt(el.style.animationDelay || 0);
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
            }, delay);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/about.blade.php ENDPATH**/ ?>