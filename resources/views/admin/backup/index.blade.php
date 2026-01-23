@extends('admin.layouts.app')

@section('title', 'Backup Management')
@section('page-title', 'Database Backup')
@section('page-description', 'Create and download a full backup of your database.')

@section('content')
    <div class="p-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900 line-height-1.2">System Backup</h2>
                            <p class="text-gray-500 mt-1">Download a complete SQL dump of your application database.</p>
                        </div>
                        <div class="w-16 h-16 bg-indigo-50 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-database text-indigo-600 text-2xl"></i>
                        </div>
                    </div>

                    @if(session('error'))
                        <div class="mb-6 p-4 bg-red-50 border border-red-100 rounded-xl flex items-center text-red-700">
                            <i class="fas fa-exclamation-circle mr-3"></i>
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="bg-indigo-50/50 rounded-2xl p-6 border border-indigo-100 mb-8">
                        <h3 class="font-semibold text-indigo-900 flex items-center">
                            <i class="fas fa-info-circle mr-2"></i>
                            Backup Information
                        </h3>
                        <ul class="mt-4 space-y-3 text-sm text-indigo-800">
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mt-1.5 mr-3 flex-shrink-0"></span>
                                The backup will include all tables, structure, and data.
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mt-1.5 mr-3 flex-shrink-0"></span>
                                Generated file format will be .sql (standard MySQL dump).
                            </li>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 bg-indigo-400 rounded-full mt-1.5 mr-3 flex-shrink-0"></span>
                                It is recommended to perform backups before major updates.
                            </li>
                        </ul>
                    </div>

                    <form action="{{ route('admin.backup.create') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="w-full sm:w-auto px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-700 hover:from-indigo-700 hover:to-purple-800 text-white font-bold rounded-xl shadow-lg shadow-indigo-200 transition-all duration-300 transform hover:-translate-y-1 flex items-center justify-center">
                            <i class="fas fa-download mr-3"></i>
                            Generate & Download Backup Now
                        </button>
                    </form>
                </div>
                <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 text-xs text-gray-500">
                    Last backup attempted: {{ now()->format('Y-m-d H:i:s') }}
                </div>
            </div>
        </div>
    </div>
@endsection