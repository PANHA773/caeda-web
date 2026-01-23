@extends('admin.layouts.app')

@section('title', 'Features Management - Admin CAEDA')

@section('extra-css')
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slide-in-right {
        from { opacity: 0; transform: translateX(30px); }
        to { opacity: 1; transform: translateX(0); }
    }

    .animate-fade-in-up { animation: fade-in-up 0.5s ease-out forwards; }
    .animate-slide-in-right { animation: slide-in-right 0.4s ease-out forwards; }

    .stats-card {
        background: linear-gradient(145deg, #ffffff, #f8fafc);
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(255, 255, 255, 0.18);
        transition: all 0.3s ease;
    }

    .stats-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
    }

    .feature-row {
        transition: all 0.3s ease;
        border-left: 4px solid transparent;
        opacity: 0;
        transform: translateY(10px);
        animation: fade-in-up 0.4s forwards;
    }

    .feature-row:hover {
        background: linear-gradient(90deg, rgba(59,130,246,0.05), rgba(59,130,246,0));
        border-left-color: #3b82f6;
        transform: translateX(4px);
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .status-active { 
        background: linear-gradient(135deg, #10b981, #34d399); 
        color: white; 
    }

    .status-inactive { 
        background: linear-gradient(135deg, #6b7280, #9ca3af); 
        color: white; 
    }

    .color-indicator {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        border: 2px solid #e5e7eb;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .search-input:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .filter-btn {
        transition: all 0.2s ease;
    }

    .filter-btn:hover {
        transform: translateY(-2px);
    }

    .action-btn {
        transition: all 0.2s ease;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .sort-order-badge {
        background: linear-gradient(135deg, #e0e7ff, #c7d2fe);
        color: #4f46e5;
        padding: 2px 8px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
    }

    .empty-state {
        background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    }

    /* Responsive Table */
    @media (max-width: 768px) {
        .hide-sm { display: none; }
    }
</style>
@endsection

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-50 to-blue-50 py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">

        {{-- Header --}}
        <div class="mb-8 animate-fade-in-up">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-4 mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Features Management</h1>
                    <p class="text-gray-600 mt-2">Manage all features displayed on the CAEDA platform</p>
                </div>
                <div class="flex items-center space-x-3">
                    <a href="{{ route('admin.features.create') }}" 
                       class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 hover:shadow-lg transform hover:-translate-y-0.5">
                        <i class="fas fa-plus-circle mr-2"></i>
                        Add New Feature
                    </a>
                </div>
            </div>

            {{-- Stats Cards --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.1s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Total Features</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">{{ $features->total() }}</p>
                        </div>
                        <div class="p-3 bg-blue-100 rounded-xl">
                            <i class="fas fa-star text-blue-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.2s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Active Features</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $features->where('is_active', true)->count() }}
                            </p>
                        </div>
                        <div class="p-3 bg-green-100 rounded-xl">
                            <i class="fas fa-check-circle text-green-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.3s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Featured Colors</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ $features->unique('color')->count() }}
                            </p>
                        </div>
                        <div class="p-3 bg-purple-100 rounded-xl">
                            <i class="fas fa-palette text-purple-600 text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="stats-card rounded-2xl p-6 animate-slide-in-right" style="animation-delay: 0.4s">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600">Avg. Sort Order</p>
                            <p class="text-3xl font-bold text-gray-900 mt-2">
                                {{ number_format($features->avg('sort_order') ?? 0, 0) }}
                            </p>
                        </div>
                        <div class="p-3 bg-yellow-100 rounded-xl">
                            <i class="fas fa-sort-amount-up text-yellow-600 text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-8 p-5 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-500 rounded-xl animate-fade-in-up">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-sm font-semibold text-green-800">Success!</h3>
                        <p class="text-sm text-green-700 mt-1">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Search and Filters --}}
        <div class="mb-8 bg-white rounded-2xl shadow-lg p-6 animate-fade-in-up">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               placeholder="Search features by title or description..." 
                               value="{{ request('search') }}"
                               class="search-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-xl focus:outline-none transition">
                    </div>
                </div>

                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <select class="filter-btn appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2.5 pr-8 focus:outline-none focus:border-blue-500 text-sm">
                            <option value="">All Colors</option>
                            @foreach(['blue','red','green','yellow','purple','pink','indigo'] as $color)
                                <option value="{{ $color }}" {{ request('color') == $color ? 'selected' : '' }}>{{ ucfirst($color) }}</option>
                            @endforeach
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>

                    <div class="relative">
                        <select class="filter-btn appearance-none bg-white border border-gray-300 rounded-xl px-4 py-2.5 pr-8 focus:outline-none focus:border-blue-500 text-sm">
                            <option value="">All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2">
                            <i class="fas fa-chevron-down text-gray-400"></i>
                        </div>
                    </div>

                    <button type="button" class="filter-btn inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white font-medium rounded-xl hover:from-blue-600 hover:to-blue-700 transition">
                        <i class="fas fa-filter mr-2"></i> Apply Filters
                    </button>
                </div>
            </div>
        </div>

        {{-- Features Table --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden animate-fade-in-up">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider hide-sm">ID</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Feature Details</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Color</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider hide-sm">Sort Order</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider hide-sm">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($features as $feature)
                        <tr class="feature-row" style="animation-delay: {{ $loop->index * 0.05 }}s">
                            <td class="px-6 py-5 hide-sm">#{{ $feature->id }}</td>
                            <td class="px-6 py-5">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-blue-100 to-indigo-100 flex items-center justify-center">
                                            <i class="fas fa-star text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-gray-900 truncate">{{ $feature->title }}</p>
                                        <p class="text-sm text-gray-600 mt-1 line-clamp-2">{{ $feature->description }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-3">
                                    <div class="color-indicator" style="background-color: {{ $feature->color }}"></div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900 capitalize">{{ $feature->color }}</div>
                                        <div class="text-xs text-gray-500">HEX: {{ $feature->color }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-5 hide-sm">
                                <span class="sort-order-badge">{{ $feature->sort_order }}</span>
                            </td>
                            <td class="px-6 py-5 hide-sm">
                                @if($feature->is_active)
                                <span class="status-badge status-active"><i class="fas fa-check-circle mr-1"></i> Active</span>
                                @else
                                <span class="status-badge status-inactive"><i class="fas fa-times-circle mr-1"></i> Inactive</span>
                                @endif
                            </td>
                            <td class="px-6 py-5">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.features.edit', $feature->id) }}" 
                                       class="action-btn inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-lg hover:from-blue-600 hover:to-blue-700 transition-all duration-200"
                                       title="Edit Feature">
                                        <i class="fas fa-edit text-xs"></i>
                                        <span class="ml-1 text-xs font-medium">Edit</span>
                                    </a>
                                    <form action="{{ route('admin.features.destroy', $feature->id) }}" method="POST" class="inline" onsubmit="return confirmDelete(event, '{{ addslashes($feature->title) }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="action-btn inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-red-500 to-red-600 text-white rounded-lg hover:from-red-600 hover:to-red-700 transition-all duration-200"
                                                title="Delete Feature">
                                            <i class="fas fa-trash text-xs"></i>
                                            <span class="ml-1 text-xs font-medium">Delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <div class="w-24 h-24 rounded-full empty-state flex items-center justify-center">
                                        <i class="fas fa-star text-gray-400 text-3xl"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No features found</h3>
                                        <p class="text-gray-600 mb-4">Get started by creating your first feature</p>
                                        <a href="{{ route('admin.features.create') }}" 
                                           class="inline-flex items-center px-6 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-semibold rounded-xl hover:from-blue-700 hover:to-indigo-800 transition-all duration-200 hover:shadow-lg">
                                            <i class="fas fa-plus-circle mr-2"></i> Create Feature
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($features->hasPages())
                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-t border-gray-200">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700">
                            Showing <span class="font-medium">{{ $features->firstItem() }}</span> to <span class="font-medium">{{ $features->lastItem() }}</span> of <span class="font-medium">{{ $features->total() }}</span> features
                        </div>
                        <div>
                            {{ $features->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection

@section('extra-js')
<script>
    function confirmDelete(event, featureTitle) {
        event.preventDefault();
        if (confirm(`Are you sure you want to delete the feature: "${featureTitle}"?`)) {
            event.target.submit();
        }
    }
</script>
@endsection
