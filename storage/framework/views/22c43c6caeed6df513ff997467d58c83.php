

<?php $__env->startSection('title', 'Add New User'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Add New User</h1>
            <a href="<?php echo e(route('admin.users.index')); ?>"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                Back to Users
            </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc pl-5">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="<?php echo e(route('admin.users.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                
                <div class="mb-6 flex flex-col items-center sm:flex-row sm:space-x-4">
                    <div class="mb-4 sm:mb-0">
                        <img id="avatar-preview"
                            src="https://ui-avatars.com/api/?name=New+User&background=4F46E5&color=fff&bold=true&size=128"
                            alt="Avatar Preview" class="w-24 h-24 rounded-xl object-cover border-2 border-gray-200">
                    </div>
                    <div class="flex-1">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Profile Photo</label>
                        <input type="file" name="avatar" id="avatar-input" accept="image/*"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-200">
                        <p class="mt-1 text-xs text-gray-500">JPG, PNG or GIF. Max 2MB.</p>
                    </div>
                </div>

                
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="<?php echo e(old('name')); ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                
                
                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_admin" value="1" <?php echo e(old('is_admin') ? 'checked' : ''); ?>

                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-700 font-medium">Grant Full Admin Access</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-6">Admins have full access to all modules regardless of specific
                        permissions below.</p>
                </div>

                
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Specific Permissions</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 border border-gray-200 rounded-lg p-4 bg-gray-50">
                        <?php
                            $availablePermissions = [
                                'home_page',
                                'about_page',
                                'programs',
                                'staff',
                                'news',
                                'users',
                                'membership_page',
                                'events',
                                'donation_page',
                                'achieve_page',
                                'contact_page',
                                'workshop_page',
                                'caffe_page',
                                'team_page'
                            ];
                        ?>
                        <?php $__currentLoopData = $availablePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="inline-flex items-center space-x-2">
                                <input type="checkbox" name="permissions[]" value="<?php echo e($perm); ?>" <?php echo e(in_array($perm, old('permissions', [])) ? 'checked' : ''); ?>

                                    class="rounded border-gray-300 text-indigo-600 shadow-sm">
                                <span class="text-sm text-gray-700 capitalize"><?php echo e($perm); ?></span>
                            </label>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                
                <div class="mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Save User
                    </button>
                </div>

            </form>
        </div>

    </div>
    <?php $__env->startSection('scripts'); ?>
        <script>
            document.getElementById('avatar-input').onchange = function (evt) {
                const [file] = this.files;
                if (file) {
                    document.getElementById('avatar-preview').src = URL.createObjectURL(file);
                }
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\web-caeda\caeda-web\resources\views/admin/users/create.blade.php ENDPATH**/ ?>