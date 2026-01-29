@extends('admin.layouts.app')

@section('title', 'Add New User')

@section('content')
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">

        {{-- Page Header --}}
        <div class="mb-6 flex justify-between items-center">
            <h1 class="text-2xl font-semibold text-gray-900">Add New User</h1>
            <a href="{{ route('admin.users.index') }}"
                class="bg-gray-200 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-300 transition duration-200">
                Back to Users
            </a>
        </div>

        {{-- Flash Message --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-700 rounded shadow">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-4 px-4 py-2 bg-red-100 text-red-700 rounded shadow">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form --}}
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Profile Image --}}
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

                {{-- Name --}}
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Password Confirmation --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                        Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200"
                        required>
                </div>

                {{-- Role (optional) --}}
                {{-- Admin Status --}}
                <div class="mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <span class="ml-2 text-sm text-gray-700 font-medium">Grant Full Admin Access</span>
                    </label>
                    <p class="text-xs text-gray-500 mt-1 ml-6">Admins have full access to all modules regardless of specific
                        permissions below.</p>
                </div>

                {{-- Permissions --}}
                <div class="mb-6">
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-sm font-medium text-gray-700">Specific Permissions</label>
                        <button type="button" onclick="selectAllPermissions()" class="text-xs text-blue-600 hover:text-blue-800 font-semibold">
                            Select All
                        </button>
                    </div>

                    <div class="space-y-4">
                        @php
                            $permissionGroups = [
                                'Core Management' => [
                                    'dashboard' => 'Dashboard Access',
                                    'users' => 'User Management',
                                    'staff' => 'Staff Directory',
                                    'office_managers' => 'Office Managers',
                                    'notifications' => 'System Notifications',
                                    'activities' => 'Activity Logs'
                                ],
                                'Page Content' => [
                                    'home_page' => 'Home Page',
                                    'about_page' => 'About Page',
                                    'team_page' => 'Our Team Page',
                                    'programs' => 'Academic Programs',
                                    'news' => 'News/Blog',
                                    'membership_page' => 'Partners & Pricing',
                                    'events' => 'Events & Speakers',
                                    'donation_page' => 'Donation & Stories',
                                    'achieve_page' => 'Achievements',
                                    'contact_page' => 'Contact & FAQs',
                                    'workshop_page' => 'Workshops',
                                    'caffe_page' => 'Caffe Menu'
                                ],
                                'System' => [
                                    'backup' => 'Database Backups'
                                ]
                            ];
                        @endphp

                        @foreach($permissionGroups as $groupName => $permissions)
                            <div class="border border-gray-100 rounded-xl overflow-hidden">
                                <div class="bg-gray-50 px-4 py-2 border-b border-gray-100">
                                    <h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider">{{ $groupName }}</h3>
                                </div>
                                <div class="p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 bg-white">
                                    @foreach($permissions as $key => $label)
                                        <label class="inline-flex items-center space-x-3 cursor-pointer group">
                                            <input type="checkbox" name="permissions[]" value="{{ $key }}" 
                                                {{ in_array($key, old('permissions', [])) ? 'checked' : '' }}
                                                class="permission-checkbox rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 transition-all cursor-pointer">
                                            <span class="text-sm text-gray-600 group-hover:text-gray-900 transition-colors">{{ $label }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="mt-6">
                    <button type="submit"
                        class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                        Save User
                    </button>
                </div>

            </form>
        </div>

    </div>
    @section('scripts')
        <script>
            function selectAllPermissions() {
                const checkboxes = document.querySelectorAll('.permission-checkbox');
                const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                checkboxes.forEach(cb => cb.checked = !allChecked);
            }

            document.getElementById('avatar-input').onchange = function (evt) {
                const [file] = this.files;
                if (file) {
                    document.getElementById('avatar-preview').src = URL.createObjectURL(file);
                }
            }
        </script>
    @endsection
@endsection