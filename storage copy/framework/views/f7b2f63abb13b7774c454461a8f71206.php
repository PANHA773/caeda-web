

<?php $__env->startSection('title', 'Leadership Team - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
<link href="https://fonts.googleapis.com/css2?family=Odor+Mean+Chey&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
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

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .5;
        }
    }

    .font-khmer {
        font-family: 'Odor Mean Chey', cursive;
    }

    .font-english {
        font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/30 to-purple-50/30 py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-6xl mx-auto">

        
        <div data-animate class="text-center mb-16 transform transition-all duration-1000">
            <div class="inline-flex items-center bg-white/80 backdrop-blur-sm rounded-full px-6 py-3 mb-6 shadow-lg border border-gray-200/50">
                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2 animate-pulse"></div>
                <span class="text-sm font-semibold text-gray-700 font-english">PSBU International Project Committee</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent animate-gradient-x">
                Leadership Team
            </h1>
            <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto mb-6 rounded-full animate-pulse"></div>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto bg-white/50 backdrop-blur-sm p-6 rounded-2xl border border-gray-200/50 shadow-sm">
                Leading the transformation of higher education through international collaboration and innovative initiatives
            </p>
            
            <div class="mt-6 flex justify-center">
                <img src="/assets/ASEAN-01-01.png" alt="PSBU Leadership Academy" class="h-40 object-contain">
            </div>
        </div>


<div data-animate class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent mb-4">
            Cambodia-ASEAN Educational Development Association
        </h2>
        <div class="w-24 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $leaderTeams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $leader): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-2xl transition-transform duration-500 hover:-translate-y-3"
            style="animation-delay: <?php echo e($index * 100); ?>ms">
            
            <div class="flex flex-col items-center text-center gap-4">

                
                <div class="w-36 h-36 rounded-2xl overflow-hidden relative flex items-center justify-center shadow-lg transform transition-all duration-500 group-hover:scale-105 group-hover:rotate-3">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($leader->image): ?>
                    <img src="<?php echo e($leader->image); ?>" alt="<?php echo e($leader->name); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                    <?php
                        $initials = implode('', array_map(fn($n) => strtoupper(substr($n, 0, 1)), explode(' ', $leader->name)));
                    ?>
                    <div class="w-full h-full bg-gradient-to-br <?php echo e($leader->gradient); ?> flex items-center justify-center text-white text-2xl font-bold">
                        <?php echo e($initials); ?>

                    </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                
                <div class="flex flex-col gap-1">
                    <h3 class="text-lg font-bold text-gray-900"><?php echo e($leader->name); ?></h3>
                    <p class="text-gray-600 text-sm font-medium"><?php echo e($leader->position); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>


<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($projectOverviews->count()): ?>
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $projectOverviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $overview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div data-animate
            class="group bg-gradient-to-br from-blue-50/50 to-purple-50/50 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">

            
            <h2
                class="text-3xl md:text-4xl font-bold text-gray-900 mb-6 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent text-center font-english">
                <?php echo e($overview->title); ?>

            </h2>

            
            <div class="prose prose-lg max-w-none text-gray-700 leading-relaxed space-y-6 font-english">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = explode("\n\n", $overview->description); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p class="transform transition-all duration-500 hover:translate-x-2 hover:text-gray-900">
                        <?php echo e($paragraph); ?>

                    </p>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>




   
<div data-animate class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-green-900 to-teal-900 bg-clip-text text-transparent font-english mb-4">
            Office Manager
        </h2>
        <div class="w-20 h-1.5 bg-gradient-to-r from-green-500 to-teal-500 mx-auto rounded-full animate-pulse"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $managers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div
            class="group bg-white/90 backdrop-blur-md border border-gray-200/60 rounded-3xl p-6
                   hover:shadow-2xl transition-all duration-500 hover:-translate-y-3"
            style="animation-delay: <?php echo e($index * 100); ?>ms"
        >
            <div class="flex items-center gap-5">

                <!-- IMAGE -->
                <div class="relative flex-shrink-0">
                    <div
                        class="w-20 h-24 rounded-2xl overflow-hidden
                               ring-2 ring-white shadow-lg
                               bg-gradient-to-br <?php echo e($member->gradient); ?>

                               transform transition-all duration-500
                               group-hover:scale-110 group-hover:rotate-3"
                    >
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->image && file_exists(public_path('storage/' . $member->image))): ?>
                            <img
                                src="<?php echo e(asset('storage/' . $member->image)); ?>"
                                alt="<?php echo e($member->name); ?>"
                                class="w-full h-full object-cover"
                            >
                        <?php else: ?>
                            <?php
                                $initials = collect(explode(' ', $member->name))
                                    ->map(fn($n) => strtoupper(substr($n, 0, 1)))
                                    ->implode('');
                            ?>
                            <div class="w-full h-full flex items-center justify-center
                                        text-white text-lg font-bold tracking-wide">
                                <?php echo e($initials); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <!-- Glow Effect -->
                    <div class="absolute inset-0 rounded-2xl blur-lg opacity-30
                                bg-gradient-to-br <?php echo e($member->gradient); ?>

                                -z-10 group-hover:opacity-60 transition"></div>
                </div>

                <!-- TEXT -->
                <div class="flex-1 min-w-0">
                    <h3
                        class="text-lg font-bold text-gray-900 leading-tight
                               group-hover:text-green-700 transition font-english"
                    >
                        <?php echo e($member->name); ?>

                    </h3>
                    <p
                        class="text-sm text-gray-600 font-medium mt-1
                               group-hover:text-gray-700 transition font-english"
                    >
                        <?php echo e($member->position); ?>

                    </p>
                </div>

            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    </div>
</div>




        

        <div data-animate class="bg-gradient-to-br from-blue-50/80 to-indigo-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-1">
            <div class="text-center mb-10">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-indigo-900 bg-clip-text text-transparent font-english">
                    Caeda​ Staff
                </h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto rounded-full animate-pulse"></div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                <?php
                $staffMembers = \App\Models\Staff::orderBy('order', 'asc')->get();
                ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $staffMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $member->name));
                $initials = implode('', array_map(function($name) {
                return strtoupper(substr($name, 0, 1));
                }, explode(' ', $member->name)));
                ?>

                <div class="group bg-white/90 backdrop-blur-sm rounded-xl p-4 text-center border border-gray-200/50 hover:shadow-lg transition-all duration-300 hover:-translate-y-2 cursor-pointer"
                    style="animation-delay: <?php echo e($index * 50); ?>ms">
                    <div class="w-24 h-24 rounded-[15px] overflow-hidden mx-auto mb-3 relative">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($member->image && file_exists(public_path('storage/' . $member->image))): ?>
                            <img src="<?php echo e(asset('storage/' . $member->image)); ?>"
                                alt="<?php echo e($member->name); ?>"
                                class="w-full h-full object-cover rounded-[15px]"
                                onerror="this.style.display='none'; this.nextElementSibling.style.display='flex'">
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold text-xl hidden rounded-[15px]">
                                <?php echo e($initials); ?>

                            </div>
                        <?php else: ?>
                            <div class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white font-semibold text-xl rounded-[15px]">
                                <?php echo e($initials); ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p class="text-gray-800 text-sm font-medium group-hover:text-gray-900 transition-colors duration-300 leading-tight font-english">
                        <?php echo e($member->name); ?>

                    </p>
                    <p class="text-gray-600 text-xs font-medium group-hover:text-gray-700 transition-colors duration-300 font-english">
                        <?php echo e($member->position); ?>

                    </p>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>


<div data-animate class="grid md:grid-cols-2 gap-8 mb-16">
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $visionMissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
            <div class="flex items-center mb-6">
                <div class="w-14 h-14 
                    <?php echo e($vm->type === 'vision' ? 'bg-gradient-to-br from-purple-500 to-pink-600' : 'bg-gradient-to-br from-blue-500 to-cyan-600'); ?> 
                    rounded-2xl flex items-center justify-center mr-4 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12 shadow-lg">
                    <span class="text-2xl">
                        <?php echo e($vm->type === 'vision' ? '🌍' : '🎯'); ?>

                    </span>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 
                    <?php echo e($vm->type === 'vision' ? 'bg-gradient-to-r from-purple-900 to-pink-900' : 'bg-gradient-to-r from-blue-900 to-cyan-900'); ?> 
                    bg-clip-text text-transparent font-english">
                    <?php echo e(ucfirst($vm->type)); ?>

                </h3>
            </div>
            <p class="text-gray-700 leading-relaxed text-lg transform transition-all duration-500 group-hover:translate-x-2 group-hover:text-gray-900 font-english">
                <?php echo e($vm->description); ?>

            </p>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</div>



  
<div data-animate class="mb-16">
    <div class="text-center mb-12">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-english">
            Goals & Strategies
        </h2>
        <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
    </div>

    <div class="grid md:grid-cols-2 gap-8">
        
        <div>
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-gray-200/50 font-english">
                Our Goals
            </h3>
            <div class="space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $goals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $goal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2"
                    style="animation-delay: <?php echo e($index * 100); ?>ms">
                    <div class="flex items-start space-x-4">
                        <div class="text-3xl transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                            <?php echo e($goal->icon); ?>

                        </div>
                        <div class="flex-1">
                            <h4 class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300 font-english">
                                <?php echo e($goal->title); ?>

                            </h4>
                            <p class="text-gray-600 text-lg leading-relaxed group-hover:text-gray-700 transition-colors duration-300 font-english">
                                <?php echo e($goal->description); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>

        
        <div>
            <h3 class="text-2xl font-bold text-gray-900 mb-8 text-center bg-white/80 backdrop-blur-sm p-4 rounded-2xl border border-gray-200/50 font-english">
                Our Strategies
            </h3>
            <div class="space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $strategies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $strategy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group bg-white/80 backdrop-blur-sm border border-gray-200/50 rounded-2xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2"
                    style="animation-delay: <?php echo e($index * 100); ?>ms">
                    <div class="flex items-start space-x-4">
                        <div class="text-3xl transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                            <?php echo e($strategy->icon); ?>

                        </div>
                        <div class="flex-1">
                            <h4 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-gray-800 transition-colors duration-300 font-english">
                                <?php echo e($strategy->title); ?>

                            </h4>
                            <p class="text-gray-600 leading-relaxed group-hover:text-gray-700 transition-colors duration-300 font-english">
                                <?php echo e($strategy->description); ?>

                            </p>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </div>
</div>


   
<div data-animate
    class="bg-gradient-to-br from-blue-50/80 to-purple-50/80 backdrop-blur-sm rounded-3xl p-8 md:p-10 mb-16 border border-blue-200/50 shadow-lg hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">

    
    <div class="text-center mb-10">
        <h2
            class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 bg-gradient-to-r from-blue-900 to-purple-900 bg-clip-text text-transparent font-english">
            Values and Benefits of Studying at PSBU
        </h2>
        <div class="w-20 h-1.5 bg-gradient-to-r from-blue-500 to-purple-500 mx-auto rounded-full animate-pulse"></div>
    </div>

    
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $valuesBenefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="group bg-white/90 backdrop-blur-sm rounded-xl p-4 border border-gray-200/50
                        hover:shadow-lg transition-all duration-300 hover:-translate-y-2 cursor-pointer"
                style="animation-delay: <?php echo e($index * 60); ?>ms">

                <div class="flex items-center space-x-3">
                    
                    <div
                        class="w-8 h-8 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full
                               flex items-center justify-center text-white font-bold text-xs
                               transform transition-all duration-300
                               group-hover:scale-110 group-hover:rotate-12 shadow-md flex-shrink-0">
                        <?php echo e($index + 1); ?>

                    </div>

                    
                    <p
                        class="text-gray-700 text-sm font-medium leading-relaxed
                               group-hover:text-gray-900 transition-colors duration-300 font-english">
                        <?php echo e($benefit->title); ?>

                    </p>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="col-span-full text-center text-gray-500 text-sm">
                No values & benefits available at the moment.
            </p>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $accreditations->where('type', 'international'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center space-x-3 group">
                            <div class="w-2 h-2 bg-blue-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                <?php echo e($item->title); ?>

                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>

            
            <div class="transform transition-all duration-500 hover:-translate-y-1">
                <h3 class="text-xl md:text-2xl font-bold mb-6 text-purple-300 bg-purple-900/30 p-4 rounded-2xl text-center font-english">
                    Memberships
                </h3>
                <ul class="space-y-3 text-gray-300">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $accreditations->where('type', 'membership'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="flex items-center space-x-3 group">
                            <div class="w-2 h-2 bg-purple-400 rounded-full group-hover:scale-150 transition-transform duration-300"></div>
                            <span class="group-hover:text-white transition-colors duration-300 text-sm">
                                <?php echo e($item->title); ?>

                            </span>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>




    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Intersection Observer for animations
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

        // Observe all elements with data-animate attribute
        document.querySelectorAll('[data-animate]').forEach((el) => {
            observer.observe(el);
        });

        // Hover effects for cards
        const cards = document.querySelectorAll('.group');

        cards.forEach(card => {
            // Add hover scale effect
            card.addEventListener('mouseenter', () => {
                card.style.transform = 'translateY(-10px)';
            });

            card.addEventListener('mouseleave', () => {
                card.style.transform = 'translateY(0)';
            });
        });

        // Image error handler
        function handleImageError(img) {
            const current = img.getAttribute('src') || '';
            const slug = img.getAttribute('data-slug');

            // Try primary image -> slug-based secondary -> default fallback
            if (!current.includes(`/assets/${slug}.jpg`)) {
                img.src = `/assets/${slug}.jpg`;
                return;
            }
            if (current.includes(`/assets/${slug}.jpg`)) {
                img.src = `/assets/default-profile.jpg`;
                return;
            }
            // final fallback: hide image and show initials box
            img.style.display = 'none';
            const fallback = img.nextElementSibling;
            if (fallback) fallback.style.display = 'flex';
        }

        // Initialize animations with delays
        function initializeAnimations() {
            const animatedElements = document.querySelectorAll('[style*="animation-delay"]');

            animatedElements.forEach((el, index) => {
                const style = el.getAttribute('style') || '';
                const delayMatch = style.match(/animation-delay:\s*(\d+)ms/);
                const delay = delayMatch ? parseInt(delayMatch[1]) : 0;

                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, delay);
            });
        }

        // Initialize on page load
        initializeAnimations();

        // Sluggify function for image paths
        function sluggify(name) {
            return name
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        }

        // Initialize all image error handlers
        document.querySelectorAll('img[data-slug]').forEach(img => {
            img.onerror = () => handleImageError(img);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/project.blade.php ENDPATH**/ ?>