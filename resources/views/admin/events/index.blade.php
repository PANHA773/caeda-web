@extends('admin.layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 p-4 md:p-6">

    <!-- Header -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Events Management</h1>
                <p class="text-gray-600 mt-2">Manage all your events here</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.events.create') }}"
                   class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-medium rounded-lg hover:from-indigo-700 hover:to-purple-700 focus:ring-4 focus:ring-indigo-100 transition-all duration-200 shadow-md hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Add New Event
                </a>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Events</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $events->total() }}</p>
                </div>
                <div class="p-3 bg-indigo-50 rounded-lg">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Upcoming</p>
                    <p class="text-2xl font-bold text-green-600 mt-1">
                        @php
                            $upcoming = $events->filter(function($event) {
                                return $event->date && $event->date->isFuture();
                            })->count();
                        @endphp
                        {{ $upcoming }}
                    </p>
                </div>
                <div class="p-3 bg-green-50 rounded-lg">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Ongoing</p>
                    <p class="text-2xl font-bold text-blue-600 mt-1">
                        @php
                            $ongoing = $events->filter(function($event) {
                                return $event->date && $event->date->isToday();
                            })->count();
                        @endphp
                        {{ $ongoing }}
                    </p>
                </div>
                <div class="p-3 bg-blue-50 rounded-lg">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Past Events</p>
                    <p class="text-2xl font-bold text-gray-600 mt-1">
                        @php
                            $past = $events->filter(function($event) {
                                return $event->date && $event->date->isPast() && !$event->date->isToday();
                            })->count();
                        @endphp
                        {{ $past }}
                    </p>
                </div>
                <div class="p-3 bg-gray-50 rounded-lg">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">All Events</h2>
                <div class="relative">
                    <input type="text" placeholder="Search events..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-100 focus:border-indigo-500 outline-none transition">
                    <svg class="w-4 h-4 text-gray-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-50 border-b border-gray-200">
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">#</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Image</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Event Details</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Type</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Date & Time</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Tag</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Status</th>
                        <th class="py-4 px-6 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($events as $event)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="py-4 px-6 text-sm font-medium text-gray-900">{{ ($events->currentPage() - 1) * $events->perPage() + $loop->iteration }}</td>
                        
                        <td class="py-4 px-6">
                            @if ($event->image)
                                @php
                                    $image = $event->image;
                                    if (!preg_match('/^https?:\/\//', $image)) {
                                        $image = asset('storage/' . $image);
                                    }
                                @endphp
                                <div class="flex items-center space-x-3">
                                    <div class="relative group">
                                        <div class="flex-shrink-0 h-12 w-12 bg-gray-100 rounded-lg overflow-hidden p-1 cursor-pointer hover:ring-2 hover:ring-indigo-300 transition-all duration-200"
                                             onclick="openImageViewer('{{ $image }}', '{{ $event->title }}')">
                                            <img src="{{ $image }}" 
                                                 alt="{{ $event->title }}" 
                                                 class="h-full w-full object-cover">
                                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-200 rounded-lg flex items-center justify-center">
                                                <svg class="w-5 h-5 text-white opacity-0 group-hover:opacity-100 transition-all duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-2 py-1 bg-gray-900 text-white text-xs rounded opacity-0 group-hover:opacity-100 transition-opacity duration-200 whitespace-nowrap pointer-events-none">
                                            Click to view
                                            <div class="absolute top-full left-1/2 transform -translate-x-1/2 -mt-1">
                                                <div class="w-2 h-2 bg-gray-900 rotate-45"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" 
                                            onclick="openImageViewer('{{ $image }}', '{{ $event->title }}')"
                                            class="text-xs text-indigo-600 hover:text-indigo-800 hover:underline hidden md:inline">
                                        View
                                    </button>
                                </div>
                            @else
                                <div class="flex-shrink-0 h-12 w-12 bg-gray-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </td>
                        
                        <td class="py-4 px-6">
                            <div>
                                <p class="text-sm font-medium text-gray-900">{{ $event->title }}</p>
                                @if($event->description)
                                    <p class="text-xs text-gray-500 mt-1 truncate max-w-xs">{{ Str::limit($event->description, 50) }}</p>
                                @endif
                            </div>
                        </td>
                        
                        <td class="py-4 px-6">
                            @if($event->type)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $event->type == 'online' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ ucfirst($event->type) }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>
                        
                        <td class="py-4 px-6">
                            <div class="text-sm text-gray-900">
                                @if($event->date)
                                    <div class="font-medium">{{ $event->date->format('M d, Y') }}</div>
                                    @if($event->start_time || $event->end_time)
                                        <div class="text-xs text-gray-500 mt-1">
                                            @if($event->start_time && $event->end_time)
                                                {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }} - {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                            @elseif($event->start_time)
                                                Starts at {{ \Carbon\Carbon::parse($event->start_time)->format('h:i A') }}
                                            @elseif($event->end_time)
                                                Ends at {{ \Carbon\Carbon::parse($event->end_time)->format('h:i A') }}
                                            @endif
                                        </div>
                                    @endif
                                @else
                                    <span class="text-gray-400">—</span>
                                @endif
                            </div>
                        </td>
                        
                        <td class="py-4 px-6">
                            @if($event->tag)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                    {{ $event->tag }}
                                </span>
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>
                        
                        <td class="py-4 px-6">
                            @if($event->date)
                                @if($event->date->isFuture())
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Upcoming
                                    </span>
                                @elseif($event->date->isToday())
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Today
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 8 8">
                                            <circle cx="4" cy="4" r="3" />
                                        </svg>
                                        Past
                                    </span>
                                @endif
                            @else
                                <span class="text-sm text-gray-400">—</span>
                            @endif
                        </td>
                        
                        <td class="py-4 px-6">
                            <div class="flex items-center space-x-3">
                                <a href="{{ route('admin.events.edit', $event->id) }}"
                                   class="text-indigo-600 hover:text-indigo-900 p-1 hover:bg-indigo-50 rounded-lg transition"
                                   title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                
                                <form action="{{ route('admin.events.destroy', $event->id) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('Are you sure you want to delete this event? This action cannot be undone.');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900 p-1 hover:bg-red-50 rounded-lg transition"
                                            title="Delete">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-16 h-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">No events found</h3>
                                <p class="text-gray-500 mb-4">Get started by adding your first event</p>
                                <a href="{{ route('admin.events.create') }}"
                                   class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add Event
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($events->hasPages())
        <div class="px-6 py-4 border-t border-gray-200">
            {{ $events->links() }}
        </div>
        @endif
    </div>

</div>

<!-- Image Viewer Modal (Same as partners) -->
<div id="imageViewerModal" class="fixed inset-0 z-50 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div id="modalBackdrop" class="fixed inset-0 bg-gray-900 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

        <!-- Modal panel -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
            <!-- Header -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" 
                        onclick="closeImageViewer()"
                        class="ml-auto flex-shrink-0 rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
                <h3 id="modalTitle" class="text-lg leading-6 font-medium text-gray-900 flex-1 text-center sm:text-left"></h3>
            </div>
            
            <!-- Image content -->
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                        <div class="flex justify-center items-center">
                            <img id="viewerImage" 
                                 class="max-w-full max-h-[70vh] object-contain rounded-lg" 
                                 src="" 
                                 alt="">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <div class="w-full flex justify-between items-center">
                    <button type="button" 
                            onclick="downloadImage()"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                        </svg>
                        Download
                    </button>
                    <div class="text-sm text-gray-500" id="imageInfo"></div>
                    <button type="button" 
                            onclick="closeImageViewer()"
                            class="inline-flex justify-center items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Image Viewer Script -->
<script>
let currentImageUrl = '';

function openImageViewer(imageUrl, eventTitle) {
    currentImageUrl = imageUrl;
    const modal = document.getElementById('imageViewerModal');
    const viewerImage = document.getElementById('viewerImage');
    const modalTitle = document.getElementById('modalTitle');
    const imageInfo = document.getElementById('imageInfo');
    
    // Set image source
    viewerImage.src = imageUrl;
    modalTitle.textContent = eventTitle;
    
    // Remove previous event listeners and add new ones
    viewerImage.onload = function() {
        const width = this.naturalWidth;
        const height = this.naturalHeight;
        imageInfo.textContent = `${width} × ${height} pixels`;
    };
    
    viewerImage.onerror = function() {
        imageInfo.textContent = 'Failed to load image';
    };
    
    // Show modal
    modal.classList.remove('hidden');
    document.body.classList.add('overflow-hidden');
}

function closeImageViewer() {
    const modal = document.getElementById('imageViewerModal');
    modal.classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
}

function downloadImage() {
    if (currentImageUrl) {
        const link = document.createElement('a');
        link.href = currentImageUrl;
        link.download = 'event-image-' + Date.now() + '.png';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
}

// Close modal on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeImageViewer();
    }
});

// Close modal when clicking on backdrop
document.getElementById('modalBackdrop').addEventListener('click', function() {
    closeImageViewer();
});
</script>

<style>
#imageViewerModal {
    backdrop-filter: blur(4px);
}

#viewerImage {
    box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}
</style>

@endsection