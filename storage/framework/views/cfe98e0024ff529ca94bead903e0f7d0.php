<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Dashboard Overview'); ?>
<?php $__env->startSection('page-description'); ?>
    Welcome back, <?php echo e(Auth::user()->name); ?>! Here's what's happening with your site.
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="space-y-6">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="stat-card bg-gradient-to-br <?php echo e($stat['bg']); ?> text-white rounded-2xl p-6 shadow-lg">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-<?php echo e($stat['color']); ?>-100 text-sm font-medium"><?php echo e($stat['label']); ?></p>
                            <h3 class="text-3xl font-bold mt-2"><?php echo e($stat['value']); ?></h3>
                            <p class="text-<?php echo e($stat['color']); ?>-100 text-sm mt-2"><?php echo e($stat['sub']); ?></p>
                        </div>
                        <div class="bg-white/20 p-4 rounded-full">
                            <i class="<?php echo e($stat['icon']); ?> text-xl"></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- News Trends Chart -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">News Publication Trends</h3>
                <div class="relative h-64 w-full">
                    <canvas id="newsTrendsChart"></canvas>
                </div>
            </div>

            <!-- Visitor Growth Chart -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Visitors website</h3>
                <div class="relative h-64 w-full">
                    <canvas id="visitorGrowthChart"></canvas>
                </div>
            </div>

            <!-- Content Distribution Chart -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Content Distribution</h3>
                <div class="relative h-64 w-full">
                    <canvas id="contentDistributionChart"></canvas>
                </div>
            </div>

            <!-- CAEDA Staff Distribution Chart -->
            <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">CAEDA Staff Roles</h3>
                    <span class="text-xs font-medium text-blue-600 bg-blue-50 px-2 py-1 rounded-full">By Position</span>
                </div>
                <div class="relative h-64 w-full">
                    <canvas id="staffRolesChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div>
            <h2 class="text-xl font-bold text-gray-900 mb-4">Quick Actions</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <?php $__currentLoopData = $actions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $action): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo e(route($action['route'])); ?>"
                        class="group bg-white border border-gray-200 rounded-xl p-4 hover:border-<?php echo e($action['color']); ?>-300 hover:shadow-md transition-all duration-300">
                        <div class="flex items-center space-x-4">
                            <div
                                class="w-12 h-12 <?php echo e($action['bg']); ?> rounded-lg flex items-center justify-center group-hover:bg-<?php echo e($action['color']); ?>-100 transition-colors">
                                <i class="<?php echo e($action['icon']); ?> text-<?php echo e($action['color']); ?>-600 text-xl"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 group-hover:text-<?php echo e($action['color']); ?>-700">
                                    <?php echo e($action['title']); ?>

                                </h3>
                                <p class="text-sm text-gray-500"><?php echo e($action['desc']); ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Activity -->
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-900">Recent Activity</h3>
                    <a href="<?php echo e(route('admin.activity.index')); ?>"
                        class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">View All</a>
                </div>
                <div class="space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $recent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="flex items-center space-x-4 p-3 hover:bg-gray-50 rounded-lg transition-colors">
                            <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user text-indigo-600"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-900">
                                    <span class="font-medium"><?php echo e($activity['user']); ?></span>
                                    <span class="text-indigo-600 font-medium"><?php echo e($activity['action']); ?></span>
                                    <?php echo e($activity['item']); ?>

                                </p>
                                <p class="text-xs text-gray-500 mt-1"><?php echo e(\Carbon\Carbon::parse($activity['time'])->diffForHumans()); ?></p>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-gray-500">No recent activity.</p>
                    <?php endif; ?>
                </div>
            </div>

            <!-- System Status -->
            <div class="bg-white border border-gray-200 rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-6">System Status</h3>
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">Storage Usage</span>
                            <span class="font-medium text-gray-900"><?php echo e($storageUsedPercent); ?>%</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-indigo-600 h-2 rounded-full" style="width: <?php echo e($storageUsedPercent); ?>%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">Database</span>
                            <span
                                class="font-medium <?php echo e($dbStatus === 'Healthy' ? 'text-green-600' : 'text-red-600'); ?>"><?php echo e($dbStatus); ?></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="<?php echo e($dbStatus === 'Healthy' ? 'bg-green-600' : 'bg-red-600'); ?> h-2 rounded-full"
                                style="width: <?php echo e($dbPercent); ?>%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-700">PHP Version</span>
                            <span class="font-medium text-gray-900"><?php echo e($phpVersion); ?></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                        <div class="text-center p-4 bg-indigo-50 rounded-lg">
                            <div class="text-2xl font-bold text-indigo-700"><?php echo e($uptime); ?>h</div>
                            <div class="text-sm text-indigo-600">App Uptime</div>
                        </div>
                        <div class="text-center p-4 bg-green-50 rounded-lg">
                            <div class="text-2xl font-bold text-green-700"><?php echo e($userCount); ?></div>
                            <div class="text-sm text-green-600">Total Users</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Visitor Growth Chart
            const visitorCtx = document.getElementById('visitorGrowthChart').getContext('2d');
            new Chart(visitorCtx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($chartVisitorLabels, 15, 512) ?>,
                    datasets: [{
                        label: 'Website Visitors',
                        data: <?php echo json_encode($chartVisitorData, 15, 512) ?>,
                        backgroundColor: 'rgba(99, 102, 241, 0.2)', // Indigo-500 with opacity
                        borderColor: 'rgba(99, 102, 241, 1)', // Indigo-500
                        borderWidth: 2,
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });

            // Content Distribution Chart
            const contentCtx = document.getElementById('contentDistributionChart').getContext('2d');
            new Chart(contentCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($chartContentLabels, 15, 512) ?>,
                    datasets: [{
                        data: <?php echo json_encode($chartContentData, 15, 512) ?>,
                        backgroundColor: [
                            'rgba(245, 158, 11, 0.8)', // Amber (Workshops/Goods)
                            'rgba(16, 185, 129, 0.8)', // Emerald (Menus)
                            'rgba(59, 130, 246, 0.8)', // Blue (Locations)
                            'rgba(139, 92, 246, 0.8)'  // Purple (News)
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 20
                            }
                        }
                    },
                    cutout: '70%'
                }
            });

            // News Trends Chart
            const newsCtx = document.getElementById('newsTrendsChart').getContext('2d');
            new Chart(newsCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($chartNewsLabels, 15, 512) ?>,
                    datasets: [{
                        label: 'New Articles',
                        data: <?php echo json_encode($chartNewsData, 15, 512) ?>,
                        backgroundColor: 'rgba(139, 92, 246, 0.5)', // Purple-500
                        borderColor: 'rgba(139, 92, 246, 1)',
                        borderWidth: 1,
                        borderRadius: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: { precision: 0 },
                            grid: { color: 'rgba(0, 0, 0, 0.05)' }
                        },
                        x: { grid: { display: false } }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });

            // Staff Roles Chart
            const staffCtx = document.getElementById('staffRolesChart').getContext('2d');
            new Chart(staffCtx, {
                type: 'polarArea',
                data: {
                    labels: <?php echo json_encode($chartStaffLabels, 15, 512) ?>,
                    datasets: [{
                        data: <?php echo json_encode($chartStaffData, 15, 512) ?>,
                        backgroundColor: [
                            'rgba(59, 130, 246, 0.6)', // Blue
                            'rgba(139, 92, 246, 0.6)', // Purple
                            'rgba(236, 72, 153, 0.6)', // Pink
                            'rgba(245, 158, 11, 0.6)', // Amber
                            'rgba(16, 185, 129, 0.6)'  // Emerald
                        ],
                        borderColor: '#fff',
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        r: {
                            ticks: { display: false },
                            grid: { color: 'rgba(0, 0, 0, 0.05)' }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 15,
                                boxWidth: 8
                            }
                        }
                    }
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>