<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name')); ?></title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(-6px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in .25s ease-out forwards; }
    </style>
    <style>
        /* Dark mode variables */
        :root {
            --site-bg: #f8fafc;
            --text-color: #0f172a;
            --nav-bg: linear-gradient(90deg, #1e3a8a, #7c3aed);
        }

        body.dark {
            --site-bg: #000000;
            --text-color: #ffffff;
            --nav-bg: linear-gradient(90deg, #000000, #000000);
            background-color: var(--site-bg) !important;
            color: var(--text-color) !important;
        }

        body.dark nav { background: var(--nav-bg) !important; }
        body.dark footer { background: #000000 !important; color: #cbd5e1 !important; }
        body.dark .card { background: #050505 !important; color: #ffffff !important; }
        body.dark .text-gray-700 { color: #e5e7eb !important; }
        body.dark a.text-white, body.dark a { color: #ffffff !important; }
        body.dark #mobileMenu { background: #050505 !important; color: #e5e7eb !important; }
        body.dark .absolute.bg-white { background: #050505 !important; color: #e5e7eb !important; }
    </style>
</head>
<body class="font-sans bg-gray-50">

<?php
    $user = Auth::user();
    $currentLang = session('lang', 'en');

    // Ensure footer data exists so footer renders on all pages
    $footer = $footer ?? (object) [
        'logo' => config('app.name'),
        'tagline' => null,
        'description' => null,
        'social_links' => [],
        'quick_links' => [],
        'contact_info' => [],
    ];

    $languages = [
        ['code' => 'en', 'label' => 'English', 'flag' => '🇬🇧'],
        ['code' => 'kh', 'label' => 'ខ្មែរ', 'flag' => '🇰🇭'],
        // ['code' => 'zh', 'label' => '中文', 'flag' => '🇨🇳'],
    ];

    $menuItems = [
        ['name' => 'home', 'href' => route('home')],
        ['name' => 'about', 'href' => route('about')],
        ['name' => 'ourteam', 'href' => route('project')],
        [
            'name' => 'programs',
            'dropdown' => [
                ['label' => 'Caeda-Programs', 'href' => route('programs')],
                ['label' => 'Workshops', 'href' => route('workshop')],
                ['label' => 'PSBU-Vision', 'href' => route('psbu-vison')],
                ['label' => 'PSBU-weekly news', 'href' => route('psbu-weekly-news')],
                ['label' => 'PSBU-Youth', 'href' => route('psbu-youth')],
            ]
        ],
        ['name' => 'membership', 'href' => route('our-team')],
        ['name' => 'events', 'href' => route('events')],
        [
            'name' => 'news',
            'dropdown' => [
                ['label' => 'Latest News', 'href' => route('news')],
          
                ['label' => 'Donation', 'href' => route('donation.show')],

                ['label' => 'Achieve', 'href' => route('achieve')],
            
                 ['label' => 'Coffee', 'href' => route('coffee')],

            
            ]
        ],
        ['name' => 'contact', 'href' => route('contact')],
    ];

    $activeItem = request()->route()->getName();
?>


<!-- ======================== NAVBAR ======================== -->
<nav class="fixed w-full z-50 py-4 bg-gradient-to-r from-blue-700 via-purple-700 to-indigo-700 shadow-lg backdrop-blur-xl">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center">

        <!-- Logo -->
        <a href="<?php echo e(route('home')); ?>" class="flex items-center gap-3">
            <img src="/assets/ASEAN-01-01.png" class="h-14 w-14 object-contain">
            <span class="text-white text-2xl font-bold hidden sm:block tracking-wide">CAEDA</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex items-center gap-1">

            <!-- Dark mode toggle -->
            <button id="darkModeToggle" title="Toggle dark mode"
                    class="bg-white/20 text-white px-3 py-2 rounded-lg font-semibold hover:bg-white/30">
                <i class="fa fa-moon"></i>
            </button>

            <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(isset($item['dropdown'])): ?>
                    <div class="relative group">
                        <button
                            class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-white/20 transition flex items-center gap-1">
                            <?php echo e(__($item['name'])); ?>

                            <i class="fa fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                        </button>

                        <!-- Dropdown -->
                        <div
                            class="absolute left-0 mt-3 w-56 bg-white rounded-xl shadow-xl py-3
                                   opacity-0 invisible group-hover:opacity-100 group-hover:visible
                                   translate-y-2 group-hover:translate-y-0
                                   transition-all duration-200 ease-out animate-fade-in">

                            <?php $__currentLoopData = $item['dropdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a href="<?php echo e($sub['href']); ?>"
                                   class="block px-4 py-2.5 text-gray-700 font-medium
                                          hover:bg-blue-100/70 hover:text-blue-700 rounded-lg transition">
                                    <?php echo e($sub['label']); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="<?php echo e($item['href']); ?>"
                       class="text-white font-semibold px-4 py-2 rounded-lg hover:bg-white/20 transition
                       <?php echo e($activeItem === $item['name'] ? 'bg-white/30' : ''); ?>">
                        <?php echo e(__($item['name'])); ?>

                    </a>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Right Controls -->
        <div class="hidden lg:flex items-center gap-4">

            <!-- Language -->
            <form method="POST" action="<?php echo e(route('language.switch')); ?>">
                <?php echo csrf_field(); ?>
                <select name="lang" onchange="this.form.submit()"
                        class="bg-white/20 text-white px-3 py-2 rounded-lg font-semibold cursor-pointer hover:bg-white/30">
                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($lang['code']); ?>" class="text-black"
                                <?php echo e($currentLang === $lang['code'] ? 'selected' : ''); ?>>
                            <?php echo e($lang['flag']); ?> <?php echo e($lang['label']); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </form>

            <!-- Auth -->
            <?php if($user): ?>
                <a href="<?php echo e(route('profile')); ?>"
                   class="bg-white text-blue-700 px-4 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Profile
                </a>

                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button class="text-white px-4 py-2 rounded-lg hover:bg-white/20 transition">
                        Logout
                    </button>
                </form>
            <?php else: ?>
                <!-- <a href="<?php echo e(route('login')); ?>"
                   class="bg-white text-blue-700 px-5 py-2 rounded-lg font-semibold hover:bg-gray-200 transition">
                    Login
                </a> -->
            <?php endif; ?>
        </div>

        <!-- Mobile Menu Icon -->
        <button id="mobileMenuButton" class="lg:hidden text-white text-3xl">
            <i class="fa fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu"
         class="hidden bg-white shadow-xl rounded-xl mt-4 p-4 text-gray-700 lg:hidden animate-fade-in">

        <?php $__currentLoopData = $menuItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($item['dropdown'])): ?>
                <details class="mb-3 group">
                    <summary
                        class="px-3 py-2 flex justify-between items-center font-semibold cursor-pointer
                               hover:text-blue-600">
                        <?php echo e(__($item['name'])); ?>

                        <i class="fa fa-chevron-down text-xs transition-transform group-open:rotate-180"></i>
                    </summary>

                    <div class="mt-2 space-y-1">
                        <?php $__currentLoopData = $item['dropdown']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($sub['href']); ?>"
                               class="block pl-6 pr-3 py-2 text-gray-600 hover:text-blue-600 transition">
                                <?php echo e($sub['label']); ?>

                            </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </details>
            <?php else: ?>
                <a href="<?php echo e($item['href']); ?>"
                   class="block px-3 py-2 rounded-lg hover:bg-blue-50 transition">
                    <?php echo e(__($item['name'])); ?>

                </a>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <hr class="my-4">

        <?php if($user): ?>
            <a href="<?php echo e(route('profile')); ?>" class="block px-4 py-2 font-semibold text-blue-700">Profile</a>
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button class="px-4 py-2 text-red-600 w-full text-left">Logout</button>
            </form>
        <?php else: ?>
            <a href="<?php echo e(route('admin.login')); ?>"
               class="block bg-blue-600 text-white text-center py-2 rounded-lg font-semibold">
                Login
            </a>
        <?php endif; ?>

    </div>
</nav>


<!-- CONTENT -->
<main class="pt-36">
    <?php echo $__env->yieldContent('content'); ?>
</main>


<!-- ======================== FOOTER ======================== -->
<footer class="bg-gray-900 text-white py-12 px-6 mt-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-10">

        
        <div>
            <h2 class="text-3xl font-bold"><?php echo e($footer->logo ?? 'CAEDA'); ?><span class="text-blue-500">.</span></h2>
            <p class="text-gray-400 mt-3 italic"><?php echo e($footer->tagline ?? __('Education Of Best')); ?></p>
            <p class="text-gray-500 mt-4"><?php echo e($footer->description ?? __('Grow your skills with modern technology courses.')); ?></p>

            
            <div class="flex space-x-4 mt-6">
                <?php $__currentLoopData = $footer->social_links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $icon = match($key){
                            'facebook'=>'fab fa-facebook',
                            'twitter'=>'fab fa-twitter',
                            'instagram'=>'fab fa-instagram',
                            'youtube'=>'fab fa-youtube',
                            default=>'fab fa-globe'
                        };
                    ?>
                    <a href="<?php echo e($link); ?>" class="text-gray-400 hover:text-blue-500">
                        <i class="<?php echo e($icon); ?> text-xl"></i>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        
        <div>
            <h3 class="text-xl font-semibold mb-4"><?php echo e(__('Quick Links')); ?></h3>
            <ul class="space-y-3 text-gray-400">
                <?php $__currentLoopData = $footer->quick_links ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route($link['route'])); ?>" class="hover:text-white"><?php echo e(__($link['name'])); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>

        
        <div>
            <h3 class="text-xl font-semibold mb-4"><?php echo e(__('Contact Info')); ?></h3>
            <p class="text-gray-400"><i class="fa-solid fa-location-dot mr-2"></i> <?php echo e($footer->contact_info['address'] ?? ''); ?></p>
            <p class="text-gray-400 mt-2"><i class="fa-solid fa-phone mr-2"></i> <?php echo e($footer->contact_info['phone'] ?? ''); ?></p>
            <p class="text-gray-400 mt-2"><i class="fa-solid fa-envelope mr-2"></i> <?php echo e($footer->contact_info['email'] ?? ''); ?></p>
        </div>

    </div>

    <div class="text-center text-gray-500 mt-10">
        © <?php echo e(date('Y')); ?> <?php echo e($footer->logo ?? 'CAEDA'); ?>. All Rights Reserved.
    </div>
</footer>



<script>
document.getElementById("mobileMenuButton").onclick = () =>
    document.getElementById("mobileMenu").classList.toggle("hidden");
</script>

<script>
// Dark mode toggle (persists in localStorage)
(function(){
    const btn = document.getElementById('darkModeToggle');
    function applyTheme(t){
        if(t === 'dark') document.body.classList.add('dark');
        else document.body.classList.remove('dark');
        if(btn) btn.innerHTML = document.body.classList.contains('dark') ? '<i class="fa fa-sun"></i>' : '<i class="fa fa-moon"></i>';
    }
    const saved = localStorage.getItem('site-theme') || (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    applyTheme(saved);
    if(btn) btn.addEventListener('click', function(){
        const next = document.body.classList.contains('dark') ? 'light' : 'dark';
        localStorage.setItem('site-theme', next);
        applyTheme(next);
    });
})();
</script>

</body>
</html><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/layouts/app.blade.php ENDPATH**/ ?>