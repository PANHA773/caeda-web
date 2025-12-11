@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-900 via-purple-900 to-indigo-900 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-md">
        <!-- Login Card -->
        <div class="bg-white rounded-2xl shadow-2xl p-8 backdrop-blur-sm">
            <div class="text-center mb-8">
                <h1 class="text-4xl font-bold text-gray-900 font-cinzel">
                    CAEDA<span class="text-blue-600">.</span>
                </h1>
                <p class="text-gray-600 mt-2 font-medium">User Login</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                    <p class="text-red-700 font-semibold text-sm">{{ __('Login failed') }}</p>
                    @foreach ($errors->all() as $error)
                        <p class="text-red-600 text-xs mt-1">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">
                        {{ __('Email Address') }}
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition {{ $errors->has('email') ? 'border-red-500' : '' }}"
                           placeholder="your@email.com" required>
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">
                        {{ __('Password') }}
                    </label>
                    <input type="password" id="password" name="password"
                           class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:outline-none focus:border-blue-600 transition {{ $errors->has('password') ? 'border-red-500' : '' }}"
                           placeholder="••••••••" required>
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 rounded focus:ring-blue-600 cursor-pointer">
                    <label for="remember" class="ml-2 text-gray-600 font-medium text-sm cursor-pointer">
                        {{ __('Remember me') }}
                    </label>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                        class="w-full bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-bold py-3 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                    {{ __('Login') }}
                </button>
            </form>

            <p class="text-center text-gray-600 text-sm mt-6">
                {{ __('Are you an admin?') }}
                <a href="{{ route('admin.login') }}" class="text-blue-600 font-semibold hover:underline">
                    {{ __('Admin Login') }}
                </a>
            </p>
        </div>

        <!-- Footer Info -->
        <div class="text-center mt-8">
            <p class="text-white/70 text-sm">
                © 2025 CAEDA. {{ __('All rights reserved.') }}
            </p>
        </div>
    </div>
</div>
@endsection
