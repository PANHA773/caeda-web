

<?php $__env->startSection('title', 'PSBU-Vison Workshops - CAEDA'); ?>

<?php $__env->startSection('extra-css'); ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        @keyframes fade-in-up {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes gradient-x {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-15px) rotate(1deg); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.1); }
        }
        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }
        @keyframes bounce-subtle {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes spin-slow {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @keyframes slide-in-left {
            from { transform: translateX(-50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes slide-in-right {
            from { transform: translateX(50px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        @keyframes scale-in {
            from { transform: scale(0.9); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }
        
        .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; }
        .animate-gradient-x { animation: gradient-x 3s ease infinite; background-size: 200% 200%; }
        .animate-float { animation: float 3s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse-slow 6s ease-in-out infinite; }
        .animate-shimmer { animation: shimmer 2s infinite; }
        .animate-bounce-subtle { animation: bounce-subtle 2s ease-in-out infinite; }
        .animate-spin-slow { animation: spin-slow 15s linear infinite; }
        .animate-slide-in-left { animation: slide-in-left 0.8s ease-out forwards; }
        .animate-slide-in-right { animation: slide-in-right 0.8s ease-out forwards; }
        .animate-scale-in { animation: scale-in 0.5s ease-out forwards; }
        
        .font-cinzel { font-family: 'Cinzel', serif; }
        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .text-gradient {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .workshop-card-hover {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        .workshop-card-hover:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .video-container {
            position: relative;
            overflow: hidden;
        }
        .video-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0, 0, 0, 0.7));
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .video-container:hover::before {
            opacity: 1;
        }
        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(1);
            transition: all 0.3s ease;
            z-index: 2;
        }
        .video-container:hover .play-button {
            transform: translate(-50%, -50%) scale(1.1);
        }
        .category-btn-active {
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            color: white;
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        .instructor-image {
            position: relative;
            overflow: hidden;
        }
        .instructor-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 60%, rgba(0, 0, 0, 0.3));
            z-index: 1;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .level-badge {
            position: relative;
            overflow: hidden;
        }
        .level-badge::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transform: rotate(45deg);
            animation: shimmer 2s infinite;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<section class="relative py-24 px-4 md:px-8 overflow-hidden bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900">
    
    <div class="absolute inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-32 w-80 h-80 bg-blue-200/20 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute -bottom-40 -left-32 w-80 h-80 bg-purple-200/20 rounded-full blur-3xl animate-pulse-slow delay-1000"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-96 h-96 bg-cyan-200/10 rounded-full blur-3xl animate-pulse-slow delay-500"></div>
    </div>
    
    <div class="max-w-7xl mx-auto relative z-10">
        <div class="text-center">
            <div class="inline-flex items-center gap-3 bg-white/20 backdrop-blur-lg px-6 py-3 rounded-full shadow-lg border border-white/50 mb-6 animate-slide-in-left">
                <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                <span class="text-white font-semibold text-sm md:text-base uppercase tracking-wider">INTERACTIVE LEARNING • PSBU-VISON</span>
            </div>
            
            <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-6 font-cinzel">
                <span class="block animate-gradient-x bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent">
                    PSBU-Vison
                </span>
                <span class="text-4xl md:text-5xl block mt-4">Workshop Series</span>
            </h1>
            
            <p class="text-xl md:text-2xl text-blue-100 mb-10 max-w-3xl mx-auto leading-relaxed glass-effect p-6 rounded-2xl">
                Enhance your skills and knowledge through our comprehensive workshop series. 
                Learn from expert instructors and join our vibrant learning community.
            </p>
            
            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-in-right">
                <button onclick="scrollToWorkshops()" class="group bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-4 px-8 rounded-2xl transition-all duration-300 transform hover:-translate-y-1 hover:shadow-2xl shadow-lg flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                    </svg>
                    <span>Start Learning</span>
                </button>
                <button onclick="scrollToUpcoming()" class="group border-2 border-white/60 hover:border-white text-white hover:bg-white/10 font-medium py-4 px-8 rounded-2xl transition-all duration-300 backdrop-blur-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>View Schedule</span>
                </button>
            </div>
        </div>
    </div>
</section>


<section class="py-16 bg-gradient-to-r from-gray-50 via-blue-50/30 to-purple-50/30">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-wrap justify-center gap-4">
            <?php
                $categories = [
                    ['id' => 'all', 'name' => 'All Workshops', 'icon' => '🎯'],
                    ['id' => 'technology', 'name' => 'Technology', 'icon' => '💻'],
                    ['id' => 'buddhist', 'name' => 'Buddhist Studies', 'icon' => '🧘'],
                    ['id' => 'education', 'name' => 'Education', 'icon' => '📚'],
                    ['id' => 'research', 'name' => 'Research', 'icon' => '🔬']
                ];
            ?>
            
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <button
                    data-category="<?php echo e($category['id']); ?>"
                    class="category-filter group px-6 py-4 rounded-2xl font-semibold transition-all duration-500 transform hover:scale-105 flex items-center animate-fade-in-up <?php echo e($category['id'] == 'all' ? 'category-btn-active' : 'bg-white/80 backdrop-blur-sm text-gray-700 hover:bg-white hover:shadow-lg border border-gray-200/50'); ?>"
                    style="animation-delay: <?php echo e($index * 100); ?>ms"
                >
                    <span class="text-xl mr-3 transform transition-all duration-500 group-hover:scale-110 group-hover:rotate-12">
                        <?php echo e($category['icon']); ?>

                    </span>
                    <?php echo e($category['name']); ?>

                    <?php if($category['id'] == 'all'): ?>
                        <div class="ml-2 w-2 h-2 bg-white rounded-full animate-pulse"></div>
                    <?php endif; ?>
                </button>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section id="workshops-grid" class="py-20 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
                $workshops = [
                    [
                        'id' => 1,
                        'title' => "Web Development Fundamentals",
                        'category' => "technology",
                        'instructor' => "Dr. Sarah Johnson",
                        'date' => "2024-03-15",
                        'duration' => "3 hours",
                        'level' => "Beginner",
                        'image' => "https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Learn the basics of web development including HTML, CSS, and JavaScript fundamentals.",
                        'attendees' => 45,
                        'rating' => 4.8,
                        'instructorImage' => "https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ],
                    [
                        'id' => 2,
                        'title' => "Buddhist Philosophy in Modern Life",
                        'category' => "buddhist",
                        'instructor' => "Ven. Dr. Somnang Pich",
                        'date' => "2024-03-20",
                        'duration' => "2 hours",
                        'level' => "All Levels",
                        'image' => "https://images.unsplash.com/photo-1547981609-4b6bf67b9d7a?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Explore how ancient Buddhist teachings can be applied to contemporary challenges.",
                        'attendees' => 32,
                        'rating' => 4.9,
                        'instructorImage' => "https://images.unsplash.com/photo-1545235617-9465d2a55698?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ],
                    [
                        'id' => 3,
                        'title' => "Data Science for Educators",
                        'category' => "education",
                        'instructor' => "Prof. Michael Chen",
                        'date' => "2024-03-25",
                        'duration' => "4 hours",
                        'level' => "Intermediate",
                        'image' => "https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Learn how to use data analysis techniques to improve educational outcomes.",
                        'attendees' => 28,
                        'rating' => 4.7,
                        'instructorImage' => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ],
                    [
                        'id' => 4,
                        'title' => "Mobile App Development",
                        'category' => "technology",
                        'instructor' => "Ms. Emma Rodriguez",
                        'date' => "2024-04-01",
                        'duration' => "5 hours",
                        'level' => "Intermediate",
                        'image' => "https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Build cross-platform mobile applications using modern frameworks.",
                        'attendees' => 38,
                        'rating' => 4.6,
                        'instructorImage' => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ],
                    [
                        'id' => 5,
                        'title' => "Mindfulness and Meditation",
                        'category' => "buddhist",
                        'instructor' => "Dr. Bona Than",
                        'date' => "2024-04-05",
                        'duration' => "2.5 hours",
                        'level' => "Beginner",
                        'image' => "https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Practical techniques for developing mindfulness and meditation practice.",
                        'attendees' => 51,
                        'rating' => 4.9,
                        'instructorImage' => "https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ],
                    [
                        'id' => 6,
                        'title' => "Academic Research Methods",
                        'category' => "research",
                        'instructor' => "Dr. Sokunthea Rin",
                        'date' => "2024-04-10",
                        'duration' => "6 hours",
                        'level' => "Advanced",
                        'image' => "https://images.unsplash.com/photo-1532094349884-543bc11b234d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                        'video' => "https://www.youtube.com/embed/dQw4w9WgXcQ",
                        'description' => "Comprehensive guide to academic research methodologies and publication.",
                        'attendees' => 22,
                        'rating' => 4.8,
                        'instructorImage' => "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                    ]
                ];
            ?>
            
            <?php $__currentLoopData = $workshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div 
                    data-category="<?php echo e($workshop['category']); ?>"
                    data-workshop-id="<?php echo e($workshop['id']); ?>"
                    class="workshop-card glass-effect rounded-3xl overflow-hidden workshop-card-hover animate-fade-in-up group"
                    style="animation-delay: <?php echo e($index * 150); ?>ms"
                >
                    
                    <div class="video-container relative h-48 bg-gray-900 overflow-hidden">
                        <div id="video-player-<?php echo e($workshop['id']); ?>" class="hidden w-full h-full">
                            <iframe
                                src="<?php echo e($workshop['video']); ?>?autoplay=1"
                                class="w-full h-full"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen
                                title="<?php echo e($workshop['title']); ?>"
                            ></iframe>
                        </div>
                        
                        <img
                            id="thumbnail-<?php echo e($workshop['id']); ?>"
                            src="<?php echo e($workshop['image']); ?>"
                            alt="<?php echo e($workshop['title']); ?>"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                        />
                        
                        <button
                            onclick="playWorkshopVideo(<?php echo e($workshop['id']); ?>)"
                            class="play-button w-16 h-16 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center transform group-hover:scale-110 transition-all duration-300 shadow-2xl"
                        >
                            <svg class="w-8 h-8 text-blue-600 ml-1" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z"/>
                            </svg>
                        </button>
                        
                        <div class="absolute top-4 right-4 level-badge bg-gradient-to-r from-blue-600 to-purple-600 text-white text-xs font-semibold px-3 py-2 rounded-xl shadow-lg">
                            <?php echo e($workshop['level']); ?>

                        </div>
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-blue-600 text-xs font-semibold px-3 py-2 rounded-xl shadow-lg">
                            <?php echo e($workshop['duration']); ?>

                        </div>
                    </div>

                    
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <span class="text-sm font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full group-hover:bg-blue-100 transition-colors duration-300">
                                <?php echo e(ucfirst($workshop['category'])); ?>

                            </span>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1 text-yellow-400 animate-pulse" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                                <span class="font-semibold text-gray-900"><?php echo e($workshop['rating']); ?></span>
                                <span class="text-gray-500 ml-1">(<?php echo e($workshop['attendees']); ?>)</span>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300 line-clamp-2">
                            <?php echo e($workshop['title']); ?>

                        </h3>

                        <p class="text-gray-600 mb-4 text-sm leading-relaxed line-clamp-2">
                            <?php echo e($workshop['description']); ?>

                        </p>

                        
                        <div class="flex items-center mb-4 p-3 bg-gray-50 rounded-xl group-hover:bg-blue-50 transition-colors duration-300">
                            <div class="relative w-10 h-10 rounded-full overflow-hidden border-2 border-white shadow-md instructor-image">
                                <img
                                    src="<?php echo e($workshop['instructorImage']); ?>"
                                    alt="<?php echo e($workshop['instructor']); ?>"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-semibold text-gray-900"><?php echo e($workshop['instructor']); ?></p>
                                <p class="text-xs text-gray-500">Expert Instructor</p>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="text-sm text-gray-500">
                                <?php echo e(date('M d, Y', strtotime($workshop['date']))); ?>

                            </div>
                            <button 
                                onclick="playWorkshopVideo(<?php echo e($workshop['id']); ?>)"
                                class="bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-2 px-4 rounded-xl hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform group-hover:scale-105 shadow-lg hover:shadow-xl text-sm"
                            >
                                Watch Now
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        
        
        <div id="no-workshops" class="hidden text-center py-12 animate-scale-in">
            <div class="inline-block bg-gradient-to-r from-gray-100 to-gray-200 rounded-2xl p-8 max-w-md shadow-lg">
                <div class="text-4xl mb-4 animate-bounce-subtle">🔍</div>
                <h3 class="text-xl font-bold text-gray-900 mb-2">No Workshops Found</h3>
                <p class="text-gray-600 mb-4">Try selecting a different category or check back later for new workshops.</p>
                <button onclick="resetFilters()" class="text-blue-600 hover:text-blue-800 font-medium">
                    Reset Filters
                </button>
            </div>
        </div>
    </div>
</section>


<section id="upcoming-workshops" class="py-20 bg-gradient-to-r from-blue-50/80 to-purple-50/80 backdrop-blur-sm px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="glass-effect rounded-3xl p-8 md:p-12 border border-blue-200/50 shadow-lg">
            <div class="text-center mb-12 animate-fade-in-up">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                    Upcoming <span class="text-blue-600">PSBU-Vison</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Don't miss these exciting workshops coming soon. Register early to secure your spot!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                    $upcomingWorkshops = [
                        [
                            'id' => 7,
                            'title' => "AI in Education Workshop",
                            'date' => "2024-04-20",
                            'instructor' => "Dr. Karl Meneghella",
                            'image' => "https://images.unsplash.com/photo-1677442136019-21780ecad995?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'instructorImage' => "https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                        ],
                        [
                            'id' => 8,
                            'title' => "Buddhist Art and Culture",
                            'date' => "2024-04-25",
                            'instructor' => "Ven. Samnang Phally",
                            'image' => "https://images.unsplash.com/photo-1547036967-23d11aacaee0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'instructorImage' => "https://images.unsplash.com/photo-1545235617-9465d2a55698?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                        ],
                        [
                            'id' => 9,
                            'title' => "Digital Literacy for Teachers",
                            'date' => "2024-05-01",
                            'instructor' => "Ms. Somaly Rin",
                            'image' => "https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80",
                            'instructorImage' => "https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80"
                        ]
                    ];
                ?>
                
                <?php $__currentLoopData = $upcomingWorkshops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $workshop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div 
                        class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 border border-white/50 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up"
                        style="animation-delay: <?php echo e($index * 200); ?>ms"
                    >
                        <div class="flex items-start space-x-4">
                            <div class="relative flex-shrink-0">
                                <img
                                    src="<?php echo e($workshop['image']); ?>"
                                    alt="<?php echo e($workshop['title']); ?>"
                                    class="w-20 h-20 rounded-2xl object-cover shadow-lg transform group-hover:scale-105 transition-transform duration-300"
                                />
                                <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-gradient-to-r from-green-400 to-green-500 rounded-full border-2 border-white shadow-lg animate-pulse"></div>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-tight group-hover:text-blue-600 transition-colors duration-300">
                                    <?php echo e($workshop['title']); ?>

                                </h3>
                                <div class="flex items-center mb-3">
                                    <div class="relative w-6 h-6 rounded-full overflow-hidden border border-white shadow-sm instructor-image mr-2">
                                        <img
                                            src="<?php echo e($workshop['instructorImage']); ?>"
                                            alt="<?php echo e($workshop['instructor']); ?>"
                                            class="w-full h-full object-cover"
                                        />
                                    </div>
                                    <p class="text-gray-600 text-sm">by <?php echo e($workshop['instructor']); ?></p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 text-sm font-semibold bg-blue-50 px-3 py-1 rounded-full">
                                        <?php echo e(date('M d, Y', strtotime($workshop['date']))); ?>

                                    </span>
                                    <button 
                                        onclick="registerWorkshop(<?php echo e($workshop['id']); ?>)"
                                        class="text-blue-600 hover:text-blue-700 font-semibold text-sm transform group-hover:translate-x-1 transition-transform duration-300"
                                    >
                                        Register →
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>


<section class="py-20 px-4 md:px-8 bg-white">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                Why Choose <span class="text-gradient">PSBU-Vison</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Discover the unique advantages of learning through our interactive workshop experiences
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
                $benefits = [
                    [
                        'icon' => "🎯",
                        'title' => "Expert Instructors",
                        'description' => "Learn from industry professionals and academic experts with years of experience"
                    ],
                    [
                        'icon' => "📚",
                        'title' => "Practical Skills",
                        'description' => "Hands-on learning with real-world applications and projects"
                    ],
                    [
                        'icon' => "🤝",
                        'title' => "Networking",
                        'description' => "Connect with like-minded learners and professionals in your field"
                    ],
                    [
                        'icon' => "📜",
                        'title' => "Certification",
                        'description' => "Receive certificates of completion to enhance your professional portfolio"
                    ]
                ];
            ?>
            
            <?php $__currentLoopData = $benefits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div 
                    class="bg-white/90 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/50 hover:shadow-xl transition-all duration-500 transform hover:-translate-y-2 group animate-fade-in-up"
                    style="animation-delay: <?php echo e($index * 150); ?>ms"
                >
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center text-white text-2xl mx-auto mb-4 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 shadow-lg">
                        <?php echo e($benefit['icon']); ?>

                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors duration-300">
                        <?php echo e($benefit['title']); ?>

                    </h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        <?php echo e($benefit['description']); ?>

                    </p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="py-20 bg-gradient-to-br from-gray-50 via-blue-50/30 to-purple-50/30 px-4 md:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16 animate-fade-in-up">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-gray-900 mb-4 font-cinzel">
                What Participants <span class="text-gradient">Say</span>
            </h2>
            <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                Hear from professionals who have transformed their skills through our workshops
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
                $testimonials = [
                    [
                        'name' => 'Sokha Rin',
                        'role' => 'Software Developer',
                        'company' => 'Tech Solutions Inc.',
                        'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The web development workshop completely transformed my career. I went from beginner to landing my dream job in just 6 months!',
                        'workshop' => 'Web Development Fundamentals',
                        'rating' => 5
                    ],
                    [
                        'name' => 'Bopha Chen',
                        'role' => 'Teacher',
                        'company' => 'International School',
                        'avatar' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The Data Science for Educators workshop gave me practical skills I use every day in my classroom. Highly recommended!',
                        'workshop' => 'Data Science for Educators',
                        'rating' => 5
                    ],
                    [
                        'name' => 'Dara Wilson',
                        'role' => 'Researcher',
                        'company' => 'University of Phnom Penh',
                        'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=200&q=80',
                        'quote' => 'The research methods workshop helped me publish my first academic paper. The instructors are true experts in their field.',
                        'workshop' => 'Academic Research Methods',
                        'rating' => 4
                    ]
                ];
            ?>
            
            <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="group glass-effect rounded-3xl p-6 hover:shadow-xl transition-all duration-500 hover:-translate-y-2 animate-fade-in-up" style="animation-delay: <?php echo e($index * 150); ?>ms">
                    <div class="flex items-center mb-6">
                        <div class="relative w-14 h-14 rounded-full overflow-hidden border-4 border-white shadow-lg mr-4 transform transition-all duration-500 group-hover:scale-110 instructor-image">
                            <img
                                src="<?php echo e($testimonial['avatar']); ?>"
                                alt="<?php echo e($testimonial['name']); ?>"
                                class="w-full h-full object-cover"
                            />
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900"><?php echo e($testimonial['name']); ?></h4>
                            <p class="text-sm text-gray-600"><?php echo e($testimonial['role']); ?> at <?php echo e($testimonial['company']); ?></p>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <?php for($i = 0; $i < 5; $i++): ?>
                            <span class="text-xl transform transition-all duration-300 <?php echo e($i < $testimonial['rating'] ? 'text-yellow-400 group-hover:scale-125' : 'text-gray-300'); ?>">
                                ★
                            </span>
                        <?php endfor; ?>
                    </div>
                    
                    <p class="text-gray-600 italic mb-4 leading-relaxed group-hover:text-gray-700 transition-colors duration-300">"<?php echo e($testimonial['quote']); ?>"</p>
                    
                    <div class="border-t border-gray-200 pt-4">
                        <p class="text-sm text-blue-600 font-semibold">Workshop: <?php echo e($testimonial['workshop']); ?></p>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>


<section class="py-20 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-700 text-white relative overflow-hidden">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute -top-20 -right-20 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-float"></div>
        <div class="absolute -bottom-20 -left-20 w-40 h-40 bg-white/10 rounded-full blur-2xl animate-float" style="animation-delay: 1s"></div>
    </div>
    
    <div class="max-w-4xl mx-auto text-center relative z-10 px-4 md:px-8">
        <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 animate-fade-in-up font-cinzel">
            Ready to Enhance Your Skills?
        </h2>
        <p class="text-blue-100 text-lg mb-10 max-w-2xl mx-auto leading-relaxed animate-fade-in-up" style="animation-delay: 200ms">
            Join our workshop community and take the next step in your learning journey. 
            Whether you're a beginner or advanced learner, we have something for everyone.
        </p>
        
        <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up" style="animation-delay: 400ms">
            <button onclick="scrollToWorkshops()" class="group bg-white text-blue-600 hover:bg-gray-100 font-bold py-4 px-8 rounded-2xl transition-all duration-500 transform hover:scale-105 hover:shadow-2xl shadow-lg">
                <span class="flex items-center gap-2">
                    Browse All Workshops
                    <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </span>
            </button>
            <button onclick="contactCoordinator()" class="group border-2 border-white text-white hover:bg-white/10 font-bold py-4 px-8 rounded-2xl transition-all duration-500 transform hover:scale-105">
                <span class="flex items-center gap-2">
                    Contact Coordinator
                    <svg class="w-5 h-5 transform group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </span>
            </button>
        </div>
    </div>
</section>


<div id="video-modal" class="hidden fixed inset-0 bg-black/90 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="relative w-full max-w-4xl animate-scale-in">
        <button 
            onclick="closeVideoModal()"
            class="absolute -top-12 right-0 text-white hover:text-gray-300 transition-colors duration-300 z-10"
        >
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        
        <div class="bg-black rounded-2xl overflow-hidden shadow-2xl">
            <div class="aspect-w-16 aspect-h-9">
                <iframe
                    id="workshop-video-frame"
                    class="w-full h-full"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                ></iframe>
            </div>
        </div>
        
        <div class="mt-4 text-center">
            <h3 id="video-title" class="text-xl font-bold text-white mb-2"></h3>
            <p id="video-instructor" class="text-gray-300"></p>
        </div>
    </div>
</div>


<div id="registration-modal" class="hidden fixed inset-0 bg-black/70 backdrop-blur-sm z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-2xl max-w-md w-full p-8 animate-scale-in">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-check text-white text-2xl"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-2">Registration Successful!</h3>
            <p class="text-gray-600">You've been registered for the workshop. We'll send you the details via email.</p>
        </div>
        
        <div class="space-y-4 mb-6">
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                <span class="text-gray-600">Workshop:</span>
                <span id="registered-workshop" class="font-semibold text-gray-900"></span>
            </div>
            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                <span class="text-gray-600">Date:</span>
                <span id="registered-date" class="font-semibold text-gray-900"></span>
            </div>
        </div>
        
        <button 
            onclick="closeRegistrationModal()"
            class="w-full bg-gradient-to-r from-blue-500 to-purple-500 hover:from-blue-600 hover:to-purple-600 text-white font-bold py-3 rounded-xl transition-all duration-300"
        >
            Continue Browsing
        </button>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Workshop filtering
    const categoryFilters = document.querySelectorAll('.category-filter');
    const workshopCards = document.querySelectorAll('.workshop-card');
    const noWorkshopsMessage = document.getElementById('no-workshops');
    
    categoryFilters.forEach(filter => {
        filter.addEventListener('click', function() {
            const category = this.dataset.category;
            
            // Update active filter
            categoryFilters.forEach(f => {
                f.classList.remove('category-btn-active', 'bg-gradient-to-r', 'from-blue-600', 'to-purple-600', 'text-white');
                f.classList.add('bg-white/80', 'backdrop-blur-sm', 'text-gray-700', 'hover:bg-white', 'hover:shadow-lg', 'border', 'border-gray-200/50');
            });
            
            this.classList.remove('bg-white/80', 'backdrop-blur-sm', 'text-gray-700', 'hover:bg-white', 'hover:shadow-lg', 'border', 'border-gray-200/50');
            this.classList.add('category-btn-active');
            
            // Add active indicator
            categoryFilters.forEach(f => {
                const indicator = f.querySelector('.w-2.h-2');
                if (indicator) indicator.remove();
            });
            
            const indicator = document.createElement('div');
            indicator.className = 'ml-2 w-2 h-2 bg-white rounded-full animate-pulse';
            this.appendChild(indicator);
            
            // Filter workshops
            let visibleCount = 0;
            workshopCards.forEach(card => {
                if (category === 'all' || card.dataset.category === category) {
                    card.style.display = 'block';
                    card.classList.add('animate-scale-in');
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                    card.classList.remove('animate-scale-in');
                }
            });
            
            // Show/hide no results message
            if (visibleCount === 0) {
                noWorkshopsMessage.classList.remove('hidden');
                noWorkshopsMessage.classList.add('animate-scale-in');
            } else {
                noWorkshopsMessage.classList.add('hidden');
                noWorkshopsMessage.classList.remove('animate-scale-in');
            }
            
            // Scroll to workshops section
            scrollToWorkshops();
        });
    });
    
    // Intersection Observer for animations
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        },
        { threshold: 0.1 }
    );
    
    // Observe all animated elements
    document.querySelectorAll('.animate-fade-in-up').forEach((el) => {
        observer.observe(el);
    });
    
    // Workshop card hover effects
    workshopCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            const levelBadge = this.querySelector('.level-badge');
            if (levelBadge) {
                levelBadge.classList.add('scale-110');
            }
        });
        
        card.addEventListener('mouseleave', function() {
            const levelBadge = this.querySelector('.level-badge');
            if (levelBadge) {
                levelBadge.classList.remove('scale-110');
            }
        });
    });
});

// Global functions
function scrollToWorkshops() {
    document.getElementById('workshops-grid').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

function scrollToUpcoming() {
    document.getElementById('upcoming-workshops').scrollIntoView({ 
        behavior: 'smooth',
        block: 'start'
    });
}

function playWorkshopVideo(workshopId) {
    // Get workshop data
    const workshops = <?php echo json_encode($workshops, 15, 512) ?>;
    const workshop = workshops.find(w => w.id === workshopId);
    
    if (workshop && workshop.video) {
        const modal = document.getElementById('video-modal');
        const videoFrame = document.getElementById('workshop-video-frame');
        const videoTitle = document.getElementById('video-title');
        const videoInstructor = document.getElementById('video-instructor');
        
        videoFrame.src = workshop.video;
        videoTitle.textContent = workshop.title;
        videoInstructor.textContent = `Instructor: ${workshop.instructor}`;
        
        modal.classList.remove('hidden');
        
        // In a real app, you might want to track video views
        // fetch(`/api/workshops/${workshopId}/view`, { method: 'POST' });
    }
}

function registerWorkshop(workshopId) {
    // Get workshop data
    const upcomingWorkshops = <?php echo json_encode($upcomingWorkshops, 15, 512) ?>;
    const workshop = upcomingWorkshops.find(w => w.id === workshopId);
    
    if (workshop) {
        const modal = document.getElementById('registration-modal');
        const workshopTitle = document.getElementById('registered-workshop');
        const workshopDate = document.getElementById('registered-date');
        
        workshopTitle.textContent = workshop.title;
        workshopDate.textContent = new Date(workshop.date).toLocaleDateString('en-US', {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        modal.classList.remove('hidden');
        
        // In a real application, you would:
        // 1. Send registration data to Laravel backend
        // 2. Process payment if needed
        // 3. Send confirmation email
        // 
        // Example:
        // fetch('/api/workshops/register', {
        //     method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json',
        //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        //     },
        //     body: JSON.stringify({ workshop_id: workshopId })
        // })
        // .then(response => response.json())
        // .then(data => {
        //     if (data.success) {
        //         showRegistrationModal(workshop);
        //     } else {
        //         alert(data.message);
        //     }
        // });
    }
}

function contactCoordinator() {
    // Redirect to contact page or open contact modal
    window.location.href = '/contact';
}

function closeVideoModal() {
    const modal = document.getElementById('video-modal');
    const videoFrame = document.getElementById('workshop-video-frame');
    
    // Stop video playback
    videoFrame.src = '';
    
    modal.classList.add('hidden');
}

function closeRegistrationModal() {
    document.getElementById('registration-modal').classList.add('hidden');
}

function resetFilters() {
    document.querySelector('.category-filter[data-category="all"]').click();
    document.getElementById('no-workshops').classList.add('hidden');
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/psbu-vison.blade.php ENDPATH**/ ?>